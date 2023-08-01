<?php
/**
 * Recommendations Product grid placeholder
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/placeholder.php.
 *
 * HOWEVER, on occasion SomewhereWarm will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @package  WooCommerce Product Recommendations
 * @since    1.0.0
 * @version  2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $deployment ) : ?>

	<div class="<?php echo esc_attr( $container_class ); ?>">

		<div class="<?php echo esc_attr($message_class); ?>" style="margin: 15px 0;">
			<?php echo wp_kses_post( $message ); ?>
		</div>

	</div>

<?php endif;

wp_reset_postdata();
