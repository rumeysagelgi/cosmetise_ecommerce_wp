<?php
/**
 * WC_BIS_Email_Notification_Confirm class
 *
 * @package  WooCommerce Back In Stock Notifications
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WC_BIS_Email_Notification_Confirm', false ) ) :

	/**
	 * Notification Confirm email controller.
	 *
	 * @class    WC_BIS_Email_Notification_Confirm
	 * @version  1.3.0
	 */
	class WC_BIS_Email_Notification_Confirm extends WC_Email {

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->id             = 'bis_notification_confirm';
			$this->customer_email = true;

			$this->title       = __( 'Back in stock sign-up confirmation', 'woocommerce-back-in-stock-notifications' );
			$this->description = __( 'Email sent to customers after completing the sign-up process successfully.', 'woocommerce-back-in-stock-notifications' );

			$this->template_html  = 'emails/back-in-stock-notification-confirm.php';
			$this->template_plain = 'emails/plain/back-in-stock-notification-confirm.php';
			$this->template_base  = WC_BIS()->get_plugin_path() . '/templates/';

			$this->setup_placeholders();

			// Call parent constructor.
			parent::__construct();
		}

		/*---------------------------------------------------*/
		/*  Triggers.                                        */
		/*---------------------------------------------------*/

		/**
		 * Trigger the sending of this email.
		 *
		 * @param WC_BIS_Notification_Data|int $notification
		 */
		public function trigger( $notification ) {
			$this->setup_locale();

			if ( is_numeric( $notification ) ) {
				$notification = wc_bis_get_notification( $notification );
			}

			if ( ! is_a( $notification, 'WC_BIS_Notification_Data' ) ) {
				return;
			}

			$this->object    = $notification;
			$this->recipient = $notification->get_user_email();
			$this->set_placeholders_value();

			if ( $this->is_enabled() && $this->get_recipient() ) {

				$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
			}

			$this->restore_locale();
		}

		/*---------------------------------------------------*/
		/*  Defaults.                                        */
		/*---------------------------------------------------*/

		/**
		 * Get email subject.
		 *
		 * @return string
		 */
		public function get_default_subject() {
			return __( 'You have joined the "{product_name}" waitlist.', 'woocommerce-back-in-stock-notifications' );
		}

		/**
		 * Get email heading.
		 *
		 * @return string
		 */
		public function get_default_heading() {
			return __( 'Sign-up successful', 'woocommerce-back-in-stock-notifications' );
		}

		/**
		 * Get default email content.
		 *
		 * @return string
		 */
		public function get_default_intro_content() {
			return __( 'Thanks for joining the waitlist! You will hear from us again when "{product_name}" is back in stock.', 'woocommerce-back-in-stock-notifications' );
		}

		/**
		 * Default content to show below main email content.
		 *
		 * @return string
		 */
		public function get_default_additional_content() {
			return __( 'Thanks for shopping with us.', 'woocommerce' );
		}

		/*---------------------------------------------------*/
		/*  Getters.                                         */
		/*---------------------------------------------------*/

		/**
		 * Get email content.
		 *
		 * @return string
		 */
		public function get_into_content() {
			return apply_filters( 'woocommerce_bis_email_intro_content', $this->format_string( $this->get_option( 'intro_content', $this->get_default_intro_content() ) ), $this->object, $this );
		}

		/**
		 * Get content html.
		 *
		 * @return string
		 */
		public function get_content_html() {

			// Default template params.
			$template_args = array(
				'notification'       => $this->object,
				'email_heading'      => $this->get_heading(),
				'intro_content'      => $this->get_into_content(),
				'additional_content' => WC_BIS_Core_Compatibility::is_wc_version_gte( '3.7' ) ? $this->get_additional_content() : false,
				'email'              => $this
			);

			// Get the template.
			return wc_get_template_html(
				$this->template_html,
				$template_args,
				false,
				WC_BIS()->get_plugin_path() . '/templates/'
			);
		}

		/**
		 * Get content plain.
		 *
		 * @return string
		 */
		public function get_content_plain() {
			return wc_get_template_html(
				$this->template_plain,
				array(
					'notification'       => $this->object,
					'product'            => $this->object->get_product(),
					'email_heading'      => $this->get_heading(),
					'intro_content'      => $this->get_into_content(),
					'additional_content' => WC_BIS_Core_Compatibility::is_wc_version_gte( '3.7' ) ? $this->get_additional_content() : false,
					'email'              => $this
				),
				false,
				WC_BIS()->get_plugin_path() . '/templates/'
			);
		}

		/**
		 * Setup placeholders.
		 *
		 * @since  1.3.0
		 */
		protected function setup_placeholders() {

			$placeholder_keys = (array) apply_filters( 'woocommerce_bis_confirmation_email_placeholders', array(
				'{site_title}' ,
				'{product_name}',
			) );

			$placeholders = array();
			foreach ( $placeholder_keys as $placeholder_key ) {
				$placeholders[ '{' . $placeholder_key . '}' ] = '';
			}

			$this->placeholders = $placeholders;
		}

		/**
		 * Set placeholders.
		 *
		 * @since  1.3.0
		 */
		public function set_placeholders_value() {
			$product = $this->object->get_product();

			$this->placeholders[ '{site_title}' ]   = preg_replace( $this->plain_search, $this->plain_replace, $this->get_blogname() );
			$this->placeholders[ '{product_name}' ] = preg_replace( $this->plain_search, $this->plain_replace, $product->get_name() );

			foreach ( $this->placeholders as $key => $value ) {
				$this->placeholders[ $key ] = apply_filters( 'woocommerce_bis_confirmation_email_placeholder_' . sanitize_title( $key ) . '_value', $value, $this->object );
			}
		}

		/*---------------------------------------------------*/
		/*  Init.                                            */
		/*---------------------------------------------------*/

		/**
		 * Initialize Settings Form Fields.
		 *
		 * @return void
		 */
		public function init_form_fields() {

			parent::init_form_fields();

			/* translators: %s: list of placeholders */
			$placeholder_text = sprintf( __( 'Available placeholders: %s', 'woocommerce' ), '<code>' . esc_html( implode( '</code>, <code>', array_keys( $this->placeholders ) ) ) . '</code>' );

			$intro_content_field = array(
				'title'       => __( 'Email content', 'woocommerce-back-in-stock-notifications' ),
				'description' => __( 'Text to appear below the main e-mail header.', 'woocommerce-back-in-stock-notifications' ) . ' ' . $placeholder_text,
				'css'         => 'width: 400px; height: 75px;',
				'placeholder' => $this->get_default_intro_content(),
				'type'        => 'textarea',
				'desc_tip'    => true,
			);

			// Find `heading` key.
			$inject_index = array_search( 'heading', array_keys( $this->form_fields ), true );
			if ( $inject_index ) {
				$inject_index++;
			} else {
				$inject_index = 0;
			}

			// Inject.
			$this->form_fields = array_slice( $this->form_fields, 0, $inject_index, true ) + array( 'intro_content' => $intro_content_field ) + array_slice( $this->form_fields, $inject_index, count( $this->form_fields ) - $inject_index, true );
		}

		/**
		 * Setup action hooks.
		 *
		 * @since 1.2.0
		 *
		 * @return void
		 */
		public function setup_hooks() {
			add_action( 'woocommerce_bis_confirm_notification_to_customer_notification', array( $this, 'trigger' ), 10 );
		}
	}

endif;

return new WC_BIS_Email_Notification_Confirm();
