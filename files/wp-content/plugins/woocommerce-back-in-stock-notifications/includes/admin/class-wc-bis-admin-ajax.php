<?php
/**
 * WC_BIS_Admin_Ajax class
 *
 * @package  WooCommerce Back In Stock Notifications
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin AJAX meta-box handlers.
 *
 * @class    WC_BIS_Admin_Ajax
 * @version  1.4.0
 */
class WC_BIS_Admin_Ajax {

	/**
	 * Hook in.
	 */
	public static function init() {

		// Notices.
		add_action( 'wp_ajax_wc_bis_dismiss_notice', array( __CLASS__ , 'dismiss_notice' ) );

		// Ajax handler for performing loopback tests.
		add_action( 'wp_ajax_wc_bis_loopback_test', array( __CLASS__, 'ajax_loopback_test' ) );

		// Render notifications export modal.
		add_action( 'wp_ajax_wc_bis_modal_export_notifications_html', array( __CLASS__, 'modal_export_notifications_html' ) );

		// Dashboard most subscribed list.
		add_action( 'wp_ajax_woocommerce_bis_get_most_subscribed_date_range_results', array( __CLASS__, 'get_most_subscribed_date_range_results' ) );

		// Select2 product search handler.
		add_action( 'wp_ajax_wc_bis_json_search_products_for_notification', array( __CLASS__, 'json_search_products_for_notification' ) );

		// New notification product meta fetch.
		add_action( 'wp_ajax_wc_bis_new_notification_get_product_data_html', array( __CLASS__, 'new_notification_get_product_data_html' ) );
	}

	/*
	|--------------------------------------------------------------------------
	| Notices.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Dismisses notices.
	 *
	 * @return void
	 */
	public static function dismiss_notice() {

		$failure = array(
			'result' => 'failure'
		);

		if ( ! check_ajax_referer( 'wc_bis_dismiss_notice_nonce', 'security', false ) ) {
			wp_send_json( $failure );
		}

		if ( empty( $_POST[ 'notice' ] ) ) {
			wp_send_json( $failure );
		}

		if ( ! current_user_can( 'manage_woocommerce' ) ) {
			wp_send_json( $failure );
		}

		$dismissed = WC_BIS_Admin_Notices::dismiss_notice( wc_clean( $_POST[ 'notice' ] ) );

		if ( ! $dismissed ) {
			wp_send_json( $failure );
		}

		$response = array(
			'result' => 'success'
		);

		wp_send_json( $response );
	}

	/*
	|--------------------------------------------------------------------------
	| Partials.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Returns product data partial html for new notification.
	 *
	 * @return void
	 */
	public static function new_notification_get_product_data_html() {

		$failure = array(
			'result' => 'failure'
		);

		if ( ! check_ajax_referer( 'wc-bis-new-notification-product-data', 'security', false ) ) {
			wp_send_json( $failure );
		}

		$product_id = isset( $_POST[ 'product_id' ] ) ? absint( $_POST[ 'product_id' ] ) : 0;
		if ( $product_id ) {
			$product = wc_get_product( $product_id );
			if ( is_a( $product, 'WC_Product' ) ) {

				ob_start();
				include WC_BIS_ABSPATH . 'includes/admin/views/html-product-data-admin.php';
				$html = ob_get_clean();

				$response = array(
					'result' => 'success',
					'html'   => $html
				);
			}
		}

		wp_send_json( $response );
	}

	/*
	|--------------------------------------------------------------------------
	| Modals.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Returns export notifications modal's html.
	 *
	 * @return void
	 */
	public static function modal_export_notifications_html() {

		$failure = array(
			'result' => 'failure'
		);

		if ( ! check_ajax_referer( 'wc-bis-modal-notifications-export', 'security', false ) ) {
			wp_send_json( $failure );
		}

		ob_start();
		include  'views/html-admin-modal-notifications-export.php' ;
		$html = ob_get_clean();

		$response = array(
			'result' => 'success',
			'html'   => $html
		);

		wp_send_json( $response );
	}

	/*
	|--------------------------------------------------------------------------
	| Dashboard.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Returns data for 'Most subscribed' dashboard table.
	 *
	 * @return void
	 */
	public static function get_most_subscribed_date_range_results() {

		$failure = array(
			'result' => 'failure'
		);

		if ( ! check_ajax_referer( 'wc-bis-most-subscribed-date-range', 'security', false ) ) {
			wp_send_json( $failure );
		}

		$range    = isset( $_POST[ 'date_range' ] ) ? wc_clean( $_POST[ 'date_range' ] ) : 'week';
		$limit    = (int) apply_filters( 'woocommerce_bis_most_subscribed_products_sql_limit', 5 );
		$products = array();
		$results  = array();

		switch ( $range ) {

			case 'week':
				$results = WC_BIS()->db->notifications->get_most_subscribed_products( strtotime( '-1 week' ), $limit );
				break;

			case 'month':
				$results = WC_BIS()->db->notifications->get_most_subscribed_products( strtotime( '-1 month' ), $limit );
				break;

			case 'quarter':
				$results = WC_BIS()->db->notifications->get_most_subscribed_products( strtotime( '-4 month' ), $limit );
				break;

			/**
			 * Filter: woocommerce_bis_most_subscribed_products_period.
			 *
			 * Fetch from custom periods.
			 *
			 * @param array $results
			 * @param string $range
			 * @return array
			 */
			$results = apply_filters( 'woocommerce_bis_most_subscribed_products_period', $results, $range );
		}

		foreach ( $results as $product_row ) {
			$product = wc_get_product( $product_row->product_id );
			if ( ! is_a( $product, 'WC_Product' ) ) {
				continue;
			}

			$link_product_id = $product->get_parent_id() ? $product->get_parent_id() : $product->get_id();

			$products[] = array(
				'url'   => admin_url( "post.php?post={$link_product_id}&action=edit" ),
				'name'  => $product->get_name(),
				'total' => $product_row->total
			);
		}

		$response = array(
			'result'   => 'success',
			'products' => $products
		);

		wp_send_json( $response );
	}

	/**
	 * Search for products and echo json for new notification product.
	 * We could use the Woo's native "json_search_for_products_and_varitions" but it doesn't include an `exclude_type` param prior to WC 3.9.
	 *
	 * @param  string  $term
	 * @return string (JSON)
	 */
	public static function json_search_products_for_notification( $term = '' ) {
		check_ajax_referer( 'search-products', 'security' );

		$include_variations = true;
		if ( empty( $term ) && isset( $_GET[ 'term' ] ) ) {
			$term = (string) wc_clean( wp_unslash( $_GET[ 'term' ] ) );
		}

		if ( empty( $term ) ) {
			wp_die();
		}

		if ( ! empty( $_GET[ 'limit' ] ) ) {
			$limit = absint( $_GET[ 'limit' ] );
		} else {
			$limit = absint( apply_filters( 'woocommerce_json_search_limit', 30 ) );
		}

		$include_ids = ! empty( $_GET[ 'include' ] ) ? array_map( 'absint', (array) wp_unslash( $_GET[ 'include' ] ) ) : array();
		$exclude_ids = ! empty( $_GET[ 'exclude' ] ) ? array_map( 'absint', (array) wp_unslash( $_GET[ 'exclude' ] ) ) : array();
		$data_store  = WC_Data_Store::load( 'product' );
		$ids         = $data_store->search_products( $term, '', (bool) $include_variations, false, $limit, $include_ids, $exclude_ids );

		$product_objects = array_filter( array_map( 'wc_get_product', $ids ), 'wc_products_array_filter_readable' );
		$products        = array();

		foreach ( $product_objects as $product_object ) {
			$formatted_name = $product_object->get_formatted_name();
			if ( ! $product_object->is_type( wc_bis_get_supported_types() ) ) {
				continue;
			}

			$products[ $product_object->get_id() ] = rawurldecode( $formatted_name );
		}

		wp_send_json( apply_filters( 'woocommerce_json_search_found_products', $products ) );
	}

	/*
	|--------------------------------------------------------------------------
	| Tests.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Checks if loopback requests work.
	 *
	 * @return void
	 */
	public static function ajax_loopback_test() {

		$failure = array(
			'result' => 'failure',
			'reason' => ''
		);

		if ( ! check_ajax_referer( 'wc_bis_loopback_notice_nonce', 'security', false ) ) {
			$failure[ 'reason' ] = 'nonce';
			wp_send_json( $failure );
		}

		if ( ! current_user_can( 'manage_woocommerce' ) ) {
			$failure[ 'reason' ] = 'user_role';
			wp_send_json( $failure );
		}

		if ( ! class_exists( 'WP_Site_Health' ) ) {
			require_once  ABSPATH . 'wp-admin/includes/class-wp-site-health.php' ;
		}

		$site_health = method_exists( 'WP_Site_Health', 'get_instance' ) ? WP_Site_Health::get_instance() : new WP_Site_Health();
		$result      = $site_health->can_perform_loopback();
		$passes_test = 'good' === $result->status;

		WC_BIS_Admin_Notices::set_notice_option( 'loopback', 'last_tested', gmdate( 'U' ) );
		WC_BIS_Admin_Notices::set_notice_option( 'loopback', 'last_result', $passes_test ? 'pass' : 'fail' );

		if ( ! $passes_test ) {
			$failure[ 'reason' ]  = 'status';
			$failure[ 'status' ]  = $result->status;
			$failure[ 'message' ] = $result->message;
			wp_send_json( $failure );
		}

		WC_BIS_Admin_Notices::remove_maintenance_notice( 'loopback' );

		$response = array(
			'result' => 'success'
		);

		wp_send_json( $response );
	}
}

WC_BIS_Admin_Ajax::init();
