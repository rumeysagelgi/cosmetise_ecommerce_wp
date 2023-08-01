<?php
/**
 * Back In Stock Functions
 *
 * @package  WooCommerce Back In Stock Notifications
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*---------------------------------------------------*/
/*  Data functions.                                  */
/*---------------------------------------------------*/

/**
 * Get notification types.
 *
 * @return array
 */
function wc_bis_get_notification_types() {
	return array(
		'one-time' => __( 'One time', 'woocommerce-back-in-stock-notifications' )
	);
}

/**
 * Get activity events.
 *
 * @return array
 */
function wc_bis_get_activity_types() {
	return array(
		'created'                => __( 'Created', 'woocommerce-back-in-stock-notifications' ),
		'reactivated'            => __( 'Reactivated', 'woocommerce-back-in-stock-notifications' ),
		'deactivated'            => __( 'Deactivated', 'woocommerce-back-in-stock-notifications' ),
		'deleted'                => __( 'Deleted', 'woocommerce-back-in-stock-notifications' ),
		'queued'                 => __( 'Queued', 'woocommerce-back-in-stock-notifications' ),
		'aborted'                => __( 'Aborted', 'woocommerce-back-in-stock-notifications' ),
		'delivered'              => __( 'Delivered', 'woocommerce-back-in-stock-notifications' ),
		'unsubscribed'           => __( 'Unsubscribed', 'woocommerce-back-in-stock-notifications' ),
		'verification_sent'      => __( 'Verification sent', 'woocommerce-back-in-stock-notifications' ),
		'verification_cancelled' => __( 'Verification cancelled', 'woocommerce-back-in-stock-notifications' ),
		'verified'               => __( 'Verified and activated', 'woocommerce-back-in-stock-notifications' )
	);
}

/**
 * Get activity events.
 *
 * @return array
 */
function wc_bis_get_supported_types() {
	return (array) apply_filters( 'woocommerce_bis_supported_product_types', array(
		'simple',
		'variable',
		'variation'
	) );
}

/**
 * Get min stock threshold for broadcasting notifications.
 *
 * @return int
 */
function wc_bis_get_stock_threshold() {
	return absint( get_option( 'wc_bis_stock_threshold', 0 ) );
}

/**
 * Is account required for signing up.
 *
 * @return bool
 */
function wc_bis_is_account_required() {
	return 'yes' === get_option( 'wc_bis_account_required', 'no' );
}

/**
 * Is opt-in required for signing up.
 *
 * @return bool
 */
function wc_bis_is_opt_in_required() {
	return 'yes' === get_option( 'wc_bis_opt_in_required', 'no' );
}

/**
 * Create an account on signing up.
 *
 * @return bool
 */
function wc_bis_create_account_on_registration() {
	return 'yes' === get_option( 'wc_bis_create_new_account_on_registration', 'no' );
}

/**
 * Returns verification codes expiration time threshold (in seconds).
 *
 * @since 1.2.0
 *
 * @return int
 */
function wc_bis_get_verification_expiration_time_threshold() {
	return (int) apply_filters( 'woocommerce_bis_verification_expiration_time_threshold', HOUR_IN_SECONDS );
}

/**
 * Time period required to keep unverified notifications in the system (in seconds). @see WC_BIS_Sync_Tasks::do_wc_bis_daily()
 *
 * @since 1.2.0
 *
 * @return int
 */
function wc_bis_get_delete_unverified_time_threshold() {
	$delete_after_days = absint( get_option( 'wc_bis_delete_unverified_days_threshold', 0 ) );
	if ( $delete_after_days > 0 ) {
		$delete_after_days = $delete_after_days * DAY_IN_SECONDS;
	}

	return $delete_after_days;
}


/**
 * Is signup prompt enabled?
 *
 * @since 1.2.0
 *
 * @return bool
 */
function wc_bis_is_loop_signup_prompt_enabled() {
	return 'yes' === get_option( 'wc_bis_loop_signup_prompt_status', 'no' );
}

/*---------------------------------------------------*/
/*  DB.                                              */
/*---------------------------------------------------*/

/**
 * Get a notification object controller.
 *
 * @param  mixed $notification
 * @return WC_BIS_Notification|false
 */
function wc_bis_get_notification( $notification ) {
	$object = new WC_BIS_Notification_Data( $notification );
	if ( $object->get_id() ) {
		return $object;
	}

	return false;
}

/**
 * Get a notification object controller.
 *
 * @param  array $query_args
 * @return array|int|false Array of WC_BIS_Notification_Data objects | int if count is true, and we have notifications | false if count is used, and no notifications.
 */
function wc_bis_get_notifications( $query_args ) {
	if ( ! is_array( $query_args ) ) {
		$query_args = array( $query_args );
	}

	if ( ! isset( $query_args[ 'return' ] ) ) {
		$query_args[ 'return' ] = 'objects';
	}

	$results = WC_BIS()->db->notifications->query( $query_args );
	if ( $results ) {
		return $results;
	}

	return false;
}

/**
 * Checks if a notification configuration exists.
 *
 * @param  array  $query_args
 * @param  array  $attributes
 * @param  bool   $active
 * @return WC_BIS_Notification_Data|false
 */
function wc_bis_notification_exists( $query_args, $attributes = array(), $active = false ) {
	if ( empty( $query_args ) ) {
		return false;
	}

	$exists_args                 = array();
	$handle_posted_attributes    = ! empty( $attributes );
	$exists_args[ 'product_id' ] = $query_args[ 'product_id' ];

	if ( isset( $query_args[ 'user_id' ] ) ) {
		$exists_args[ 'user_id' ] = $query_args[ 'user_id' ];
	}

	if ( isset( $query_args[ 'user_email' ] ) ) {
		$exists_args[ 'user_email' ] = $query_args[ 'user_email' ];
	}

	if ( empty( $exists_args[ 'user_id' ] ) && empty( $exists_args[ 'user_email' ] ) ) {
		return false;
	}

	if ( $active ) {
		$exists_args[ 'is_active' ] = 'on';
	}

	$existing_notification       = false;
	$notification_exists_results = wc_bis_get_notifications( $exists_args );
	if ( ! empty( $notification_exists_results ) ) {

		if ( $handle_posted_attributes ) {

			foreach ( $notification_exists_results as $notification ) {
				if ( $notification->get_meta( 'posted_attributes' ) === $attributes ) {
					$existing_notification = $notification;
				}
			}

		} else {
			$existing_notification = array_pop( $notification_exists_results );
		}
	}

	return $existing_notification;
}

/**
 * Get a sign ups for a product ID.
 *
 * @param  array|int   $product_id
 * @param  bool        $active
 * @return int
 */
function wc_bis_get_notifications_count( $product_id, $active = false ) {
	if ( empty( $product_id ) ) {
		return 0;
	}

	$count_args = array(
		'product_id' => $product_id,
		'count'      => true
	);

	if ( $active ) {
		$count_args[ 'is_active' ] = 'on';
	}

	$count = WC_BIS()->db->notifications->query( $count_args );
	return absint( $count );
}

/*---------------------------------------------------*/
/*  Display functions.                               */
/*---------------------------------------------------*/

/**
 * Get notification type label.
 *
 * @param  string $slug
 * @return string
 */
function wc_bis_get_notification_type_label( $slug ) {

	$types = wc_bis_get_notification_types();

	if ( ! in_array( $slug, array_keys( $types ) ) ) {
		return '-';
	}

	return $types[ $slug ];
}

/**
 * Get activity type label.
 *
 * @param  string $slug
 * @return string
 */
function wc_bis_get_activity_type_label( $slug ) {

	$types = wc_bis_get_activity_types();

	if ( ! in_array( $slug, array_keys( $types ) ) ) {
		return '-';
	}

	return $types[ $slug ];
}

/*---------------------------------------------------*/
/*  Conditional.                                     */
/*---------------------------------------------------*/

/**
 * Is email format.
 *
 * @return bool
 */
function wc_bis_is_email( $value ) {
	return filter_var( $value, FILTER_VALIDATE_EMAIL );
}

/*---------------------------------------------------*/
/*  Utilities.                                       */
/*---------------------------------------------------*/

/**
 * Get debug status.
 *
 * @return bool
 */
function wc_bis_debug_enabled() {

	$debug = defined( 'WP_DEBUG' ) ? WP_DEBUG : false;

	/**
	 * 'woocommerce_bis_debug_enabled' filter.
	 */
	return apply_filters( 'woocommerce_bis_debug_enabled', $debug );
}

/**
 * Get double opt-in status.
 *
 * @since 1.2.0
 *
 * @return bool
 */
function wc_bis_double_opt_in_required() {
	return 'yes' === get_option( 'wc_bis_double_opt_in_required', 'no' );
}

/**
 * Generates a unique notification hash.
 *
 * @param  string  $input
 * @param  string  $action
 * @return string
 */
function wc_bis_notification_hash( $input, $action ) {

	// Hint: This will be deprecated after dropping support for lt 1.2.0. @see WC_BIS_Account::process_unsubscribe().

	$output        = '';
	$cyther_method = 'AES-256-CBC';
	$secret_key    = 'secret_wc_bis_key';
	$secret_iv     = 'secret_wc_bis_iv';

	// Hash it.
	$key            = hash( 'sha256', $secret_key );
	// Cyther method AES-256-CBC expects 16 bytes IV.
	$iv             = substr( hash( 'sha256', $secret_iv ), 0, 16 );

	if ( 'encrypt' === $action ) {
		$output = openssl_encrypt( $input, $cyther_method, $key, 0, $iv );
		$output = base64_encode( $output );
	} elseif ( 'decrypt' === $action ) {
		$output = openssl_decrypt( base64_decode( $input ), $cyther_method, $key, 0, $iv );
	}

	return $output;
}

/**
 * Get formatted screen id.
 *
 * @since 1.0.1
 *
 * @param  string $key
 * @return string
 */
function wc_bis_get_formatted_screen_id( $screen_id ) {

	if ( version_compare( WC()->version, '7.3.0' ) < 0 ) {
		$prefix = sanitize_title( __( 'WooCommerce', 'woocommerce' ) );
	} else {
		$prefix = 'woocommerce';
	}
	
	if ( 0 === strpos( $screen_id, 'woocommerce_' ) ) {
		$screen_id = str_replace( 'woocommerce_', $prefix . '_', $screen_id );
	}

	return $screen_id;
}

/**
 * Whether or not the store is using HTML caching for logged-in users.
 *
 * @since 1.0.7
 *
 * @return bool
 */
function wc_bis_is_using_html_caching_for_users() {

	/**
	 * 'woocommerce_bis_is_using_html_caching_for_users' filter.
	 *
	 * @since 1.0.7
	 *
	 * @return bool
	 */
	return (bool) apply_filters( 'woocommerce_bis_is_using_html_caching_for_users', false );
}
