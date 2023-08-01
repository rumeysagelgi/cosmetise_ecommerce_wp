<?php
/**
 * WC_BIS_Sync_Tasks class
 *
 * @package  WooCommerce Back In Stock Notifications
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sync stock Queue Controller Class.
 *
 * @class    WC_BIS_Sync_Tasks
 * @version  1.4.0
 */
class WC_BIS_Sync_Tasks {

	/**
	 * Setup.
	 */
	public static function init() {

		// Main triggers for stock tasks.
		add_action( 'woocommerce_bis_sync_handle_outofstock_products', array( __CLASS__, 'handle_outofstock_products' ) );
		add_action( 'woocommerce_bis_sync_handle_instock_products', array( __CLASS__, 'handle_instock_products' ) );

		// Async tasks.
		add_action( 'wc_bis_daily', array( __CLASS__, 'do_wc_bis_daily' ) );

		add_action( 'wc_bis_process_outofstock_products', array( __CLASS__, 'async_process_outofstock_products' ), 10, 2 );
		add_action( 'wc_bis_process_notifications_batch', array( __CLASS__, 'async_process_notifications_batch' ), 10, 2 );

		// Sync product delete.
		add_action( 'before_delete_post', array( __CLASS__, 'handle_product_delete' ), 0 );

		// Force queue notifications.
		add_action( 'admin_init', array( __CLASS__, 'force_queue_notifications' ) );
	}

	/*---------------------------------------------------*/
	/*  Instock tasks.
	/*---------------------------------------------------*/

	/**
	 * Prepare notifications, mark queue status.
	 *
	 * @param  array  $product_ids
	 * @param  bool   $force (Optional)
	 * @return void
	 */
	public static function handle_instock_products( $product_ids, $force = false ) {
		if ( ! is_array( $product_ids ) ) {
			$product_ids = array( $product_ids );
		}

		// Get notifications.
		$query_args = array(
			'product_id' => $product_ids,
			'is_active'  => 'on',
			'is_queued'  => 'off',
			'return'     => 'ids'
		);

		/**
		 * Filter: woocommerce_bis_last_sent_throttle
		 *
		 * @param int   $throttle Throttle time in seconds should pass from the last notification delivery time.
		 * @param array $query_args
		 */
		$last_sent_throttle = (int) apply_filters( 'woocommerce_bis_last_sent_throttle', HOUR_IN_SECONDS, $query_args );
		if ( 0 < $last_sent_throttle && ! $force ) {
			$query_args[ 'last_sent_throttle' ] = $last_sent_throttle;
		}

		/**
		 * Filter: woocommerce_bis_notification_ids_to_send
		 * 
		 * @since 1.4.0
		 *
		 * @param array $notification_ids Array of WC_BIS_Notification_Data objects | int if count is true, and we have notifications | false if count is used, and no notifications.
		 * @param array $query_args
		 */
		$notification_ids   = apply_filters( 'woocommerce_bis_notification_ids_to_send', wc_bis_get_notifications( $query_args ), $query_args );
		$notification_count = false === $notification_ids || ! is_array( $notification_ids )  ? 0 : count( $notification_ids );

		// Check for recently sent notifications.
		if ( class_exists( 'WC_BIS_Admin_Notices' ) && isset( $query_args[ 'last_sent_throttle' ] ) ) {

			unset( $query_args[ 'last_sent_throttle' ] );
			$query_args[ 'count' ]             = true;
			$notification_ids_without_throttle = WC_BIS()->db->notifications->query( $query_args );
			if ( $notification_ids_without_throttle > $notification_count ) {
				$diff        = $notification_ids_without_throttle - $notification_count;
				/* translators: $d number of notifications */
				$notice_text = sprintf( _n( '%d identical back-in-stock notification was sent to the same customer recently. This time, we skipped it to prevent spamming.', '%d identical back-in-stock notifications were sent to the same customers recently. This time, we skipped them to prevent spamming.', $diff, 'woocommerce-back-in-stock-notifications' ), $diff );

				// Grap current product id based on product or variation save.
				if ( isset( $_REQUEST[ 'ID' ] ) ) {
					$post_id = absint( $_REQUEST[ 'ID' ] );
				} elseif ( isset( $_REQUEST[ 'product_id' ] ) ) {
					$post_id = absint( $_REQUEST[ 'product_id' ] );
				}

				if ( isset( $post_id ) && 0 < $post_id ) {
					$notice_text .= ' <a href="' . add_query_arg( array( 'wc_bis_force_queue' => implode( ',', $product_ids ) ), admin_url( sprintf( 'post.php?post=%d&action=edit', $post_id ) ) ) . '">' . __( 'Send anyway', 'woocommerce-back-in-stock-notifications' ) . '</a>';
				}

				/* translators: notifications count */
				WC_BIS_Admin_Notices::add_notice( $notice_text, 'info', true );
			}
		}

		if ( empty( $notification_ids ) ) {
			return;
		}

		if ( wc_bis_debug_enabled() ) {
			WC_BIS()->log( 'Notification IDs: ' . print_r( $notification_ids, true ), 'info', 'wc_bis_sync_logs' );
		}

		// Run bulk query.
		WC_BIS()->db->notifications->bulk_set_queue_status( $notification_ids, 'on' );

		foreach ( $notification_ids as $id ) {

			$notification = wc_bis_get_notification( $id );
			if ( ! $notification ) {
				continue;
			}

			$notification->add_event( 'queued' );
		}

		self::start_notifications_queue( $product_ids, $notification_count );
	}

	/**
	 * Bypass throttle and force queue notifications.
	 *
	 * @return void
	 */
	public static function force_queue_notifications() {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		if ( isset( $_GET[ 'wc_bis_force_queue' ] ) ) {
			$product_ids = explode( ',', urldecode( wc_clean( $_GET[ 'wc_bis_force_queue' ] ) ) );
			self::handle_instock_products( $product_ids, true );
			$url         = remove_query_arg( 'wc_bis_force_queue' );
			wp_safe_redirect( $url );
			exit;
		}
	}

	/*---------------------------------------------------*/
	/*  Notification queue.
	/*---------------------------------------------------*/

	/**
	 * Trigger the notification queue.
	 *
	 * @param  array  $product_ids
	 * @param  int    $last_known_count
	 * @return void
	 */
	public static function start_notifications_queue( $product_ids, $last_known_count ) {

		// Give it some 'room' for last-minute calls.
		$batches = ceil( $last_known_count / self::get_batch_size() ) + 5;
		// Queue first batch.
		$args    = array(
			'product_id' => $product_ids,
			'batch'      => 1,
			'batches'    => $batches
		);

		if ( class_exists( 'WC_BIS_Admin_Notices' ) ) {
			/* translators: notifications count */
			WC_BIS_Admin_Notices::add_notice( sprintf( _n( '%2$d back-in-stock notification is now <a href="%1$s">queued for delivery</a> in the next few minutes.', '%2$d back-in-stock notifications are now <a href="%1$s">queued for delivery</a> in the next few minutes.', $last_known_count, 'woocommerce-back-in-stock-notifications' ), admin_url( 'admin.php?page=bis_notifications&status=queued_bis_notifications' ), $last_known_count ), 'info', true );
		}

		if ( ! WC_BIS_Core_Compatibility::next_scheduled_action( 'wc_bis_process_notifications_batch', array( 'args' => $args ), 'wc_bis_notifications' ) ) {

			/**
			 * Filter: woocommerce_bis_first_batch_delay
			 *
			 * Schedule the first batch with a 60 sec delay.
			 *
			 * @param int   $throttle Throttle time in seconds between each batch.
			 * @param array $product_ids
			 */
			$first_throttle = (int) apply_filters( 'woocommerce_bis_first_batch_delay', MINUTE_IN_SECONDS, $product_ids );
			WC_BIS_Core_Compatibility::schedule_single_action( time() + $first_throttle, 'wc_bis_process_notifications_batch', array( 'args' => $args ), 'wc_bis_notifications' );
		}
	}

	/**
	 * Process single batch of notifications for given product.
	 *
	 * @param  array  $args
	 * @return void
	 */
	public static function async_process_notifications_batch( $args ) {

		$query_args = array(
			'return'     => 'objects',
			'product_id' => $args[ 'product_id' ],
			'is_queued'  => 'on',
			'is_active'  => 'on',
			'limit'      => self::get_batch_size()
		);

		$notifications = wc_bis_get_notifications( $query_args );

		if ( ! empty( $notifications ) ) {

			// Do the work.
			foreach ( $notifications as $notification ) {
				do_action( 'woocommerce_bis_send_notification_to_customer', $notification );
			}

			if ( absint( $args[ 'batch' ] ) <= absint( $args[ 'batches' ] ) ) {

				// Queue next batch.
				$args[ 'batch' ] = absint( $args[ 'batch' ] ) + 1;
				WC_BIS_Core_Compatibility::add_single_action( 'wc_bis_process_notifications_batch', array( 'args' => $args ), 'wc_bis_notifications' );
			}
		}
	}

	/*---------------------------------------------------*/
	/*  Outofstock tasks.
	/*---------------------------------------------------*/

	/**
	 * Hande outofstock product notifications.
	 *
	 * @param  array  $product_ids
	 * @return void
	 */
	public static function handle_outofstock_products( $product_ids ) {

		if ( ! is_array( $product_ids ) ) {
			$product_ids = array( $product_ids );
		}

		// Query to avoid creating an async task every time a product goes outofstock.
		$query_args = array(
			'product_id' => $product_ids,
			'is_active'  => 'on',
			'return'     => 'ids'
		);

		$notification_ids = wc_bis_get_notifications( $query_args );
		if ( empty( $notification_ids ) ) {
			return;
		}

		$args = array(
			'product_id' => $product_ids,
			'batch'      => 1,
			'batches'    => 1
		);

		WC_BIS_Core_Compatibility::add_single_action( 'wc_bis_process_outofstock_products', array( 'args' => $args ), 'wc_bis_notifications' );
	}

	/**
	 * Process outofstock notifications.
	 *
	 * @param  array  $product_id
	 * @return void
	 */
	public static function async_process_outofstock_products( $args ) {

		// Search notifications and sync data.
		$query_args = array(
			'product_id' => $args[ 'product_id' ],
			'is_active'  => 'on',
			'return'     => 'ids'
		);

		$notification_ids = wc_bis_get_notifications( $query_args );
		if ( empty( $notification_ids ) ) {
			return;
		}

		// Add Cancel activity.
		foreach ( $notification_ids as $id ) {

			$notification = wc_bis_get_notification( $id );
			if ( ! $notification ) {
				continue;
			}

			if ( $notification->is_queued() ) {
				$notification->add_event( 'aborted' );
			}

			if ( $notification->get_last_notified_date() > $notification->get_subscribe_date() || 0 === $notification->get_subscribe_date() ) {
				$notification->set_subscribe_date( time() );
				$notification->save();
			}
		}

		// Bulk cancel is_queued.
		WC_BIS()->db->notifications->bulk_set_queue_status( $notification_ids, 'off' );
	}

	/*---------------------------------------------------*/
	/*  MISC.
	/*---------------------------------------------------*/

	/**
	 * Number of notifications per batch.
	 *
	 * @return int
	 */
	protected static function get_batch_size() {
		return 50;
	}

	/**
	 * Deletes all notifications associated with the deleted product.
	 *
	 * @since 1.1.2
	 *
	 * @param  int     $post_id
	 * @param  object  $post
	 */
	public static function handle_product_delete( $post_id ) {
		if ( ! current_user_can( 'delete_posts' ) || ! $post_id ) {
			return;
		}

		$post_type = get_post_type( $post_id );
		if ( ! in_array( $post_type, array( 'product', 'product_variation' ) ) ) {
			return;
		}

		$notification_ids = wc_bis_get_notifications( array(
			'product_id' => $post_id
		) );

		if ( $notification_ids ) {
			foreach ( $notification_ids as $notification_id ) {
				WC_BIS()->db->notifications->delete( $notification_id );
			}
		}
	}

	/*---------------------------------------------------*/
	/*  Daily maintenance task.
	/*---------------------------------------------------*/

	/**
	 * Run daily for maintenance.
	 *
	 * @since 1.2.0
	 *
	 * @return void
	 */
	public static function do_wc_bis_daily() {

		// Delete overdue unverified notifications given a specified time threshold.
		$expiration_time_threshold = wc_bis_get_verification_expiration_time_threshold();
		$time_threshold            = wc_bis_get_delete_unverified_time_threshold();
		if ( 0 === $time_threshold ) {
			return;
		}

		$now                = time();
		$overdue_threshold  = $now - $expiration_time_threshold - $time_threshold;
		$overdue_query_args = array(
			'is_active'      => 'off',
			'is_verified'    => 'no',
			'meta_query'     => array(
				'relation' => 'AND',
				array(
					'key'     => 'awaiting_verification',
					'value'   => 'yes',
					'compare' => '='
				),
				array(
					'key'     => '_verification_created_at',
					'value'   => $overdue_threshold,
					'compare' => '<',
					'type'    => 'UNSIGNED'
				)
			),
			'order_by'       => array( 'id' => 'DESC' )
		);

		$overdue_notifications     = wc_bis_get_notifications( $overdue_query_args );
		$has_expired_notifications = ! empty( $overdue_notifications );

		if ( $has_expired_notifications ) {

			foreach ( $overdue_notifications as $notification ) {

				if ( $notification->is_active() || ! $notification->is_expired() || (int) $notification->get_meta( '_verification_created_at' ) > $overdue_threshold ) {
					continue;
				}

				// Force delete.
				$notification->delete();
			}
		}
	}
}

WC_BIS_Sync_Tasks::init();
