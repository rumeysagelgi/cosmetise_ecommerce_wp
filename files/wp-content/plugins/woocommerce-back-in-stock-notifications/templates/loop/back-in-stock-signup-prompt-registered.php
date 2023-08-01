<?php
/**
 * Back in Stock Sign-up Prompt
 *
 * Displays the sign-up prompt in product loop.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/back-in-stock-signup-prompt-registered.php.
 *
 * HOWEVER, on occasion WooCommerce Back In Stock Notifications will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce Back In Stock Notifications
 * @version 1.2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_bis_before_loop_signup_prompt_signed_up', $product );
?>
	<div class="wc_bis_loop_signup_prompt_container wc_bis_loop_signup_prompt_container--signed_up">
		<?php echo wp_kses_post( $signup_prompt_html ); ?>
	</div>
<?php
do_action( 'woocommerce_bis_after_loop_signup_prompt_signed_up', $product );
