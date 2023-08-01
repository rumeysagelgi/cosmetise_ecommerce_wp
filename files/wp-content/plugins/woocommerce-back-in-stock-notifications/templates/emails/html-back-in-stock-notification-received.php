<?php
/**
 * Notication email content.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/html-back-in-stock-notification-reveived.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce Back In Stock Notifications
 * @version 1.3.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<table border="0" cellpadding="0" cellspacing="0" id="notification__container"><tr><td>

	<div id="notification__into_content">
		<?php echo wp_kses_post( wpautop( wptexturize( $intro_content ) ) ); ?>
	</div>

	<div id="notification__product">

		<?php
		/**
		 * Hook: woocommerce_email_notification_product_before_title.
		 *
		 * @hooked woocommerce_email_notification_product_image - 10
		 */
		do_action( 'woocommerce_bis_email_notification_product_before_title', $product, $notification );

		/**
		 * Hook: woocommerce_email_notification_product_title.
		 *
		 * @hooked woocommerce_email_notification_product_title - 10
		 */
		do_action( 'woocommerce_bis_email_notification_product_title', $product, $notification );

		/**
		 * Hook: woocommerce_email_notification_product_after_title.
		 *
		 * @hooked woocommerce_email_notification_product_attributes - 10
		 * @hooked woocommerce_email_notification_product_price - 20
		 */
		do_action( 'woocommerce_bis_email_notification_product_after_title', $product, $notification );
		?>

		<a href="<?php echo esc_attr( apply_filters( 'woocommerce_bis_email_received_button_href', $notification->get_product_permalink(), $notification, $product ) ); ?>" id="notification__action_button"><?php echo esc_html( apply_filters( 'woocommerce_bis_email_received_button_text', _x( 'Shop Now', 'Email notification', 'woocommerce-back-in-stock-notifications' ), $notification ) ); ?></a>
	</div>

	<table id="notification__footer"><tr><td>
		<?php echo esc_html( sprintf( __( 'You have received this message because your e-mail address was used to sign up for stock notifications on our store.', 'woocommerce-back-in-stock-notifications' ), $product->get_name() ) ); ?>
		<?php

		if ( $is_user ) {
			// translators: %1$s placeholder is the unsubscribe link, %2$s placeholder is the Unsubscribe text link.
			$unsubscribe_link = sprintf( '<a href="%1$s" id="notification__unsubscribe_link">%2$s</a>', esc_url( $unsubscribe_href ), _x( 'click here', 'unsubscribe all cta for customer', 'woocommerce-back-in-stock-notifications' ) );
			// translators: %s placeholder is the text part from above.
			echo wp_kses_post( sprintf( __( 'To manage your notifications, %s to log in to your account.', 'woocommerce-back-in-stock-notifications' ), $unsubscribe_link ) );
		} else {
			// translators: %1$s placeholder is the unsubscribe link, %2$s placeholder is the Unsubscribe text link.
			$unsubscribe_link = sprintf( '<a href="%1$s" id="notification__unsubscribe_link">%2$s</a>', esc_url( $unsubscribe_href ), _x( 'click here', 'unsubscribe all cta for guest', 'woocommerce-back-in-stock-notifications' ) );
			// translators: %s placeholder is the text part from above.
			echo wp_kses_post( sprintf( __( 'To stop receiving these messages, %s to unsubscribe.', 'woocommerce-back-in-stock-notifications' ), $unsubscribe_link ) );
		}

		?>
		<br><br>
		<?php

		/**
		 * Show user-defined additional content - this is set in each email's settings.
		 */
		if ( $additional_content ) {
			echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
		}
		?>
	</td></tr></table>

</td></tr></table>
