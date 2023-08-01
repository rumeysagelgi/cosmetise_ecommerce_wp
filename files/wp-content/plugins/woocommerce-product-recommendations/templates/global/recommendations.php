<?php
/**
 * Recommendations Product grid.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/recommendations.php.
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

if ( $deployment && $products ) : ?>
	<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<div class="<?php echo esc_attr( $container_class ); ?>" <?php echo $container_attributes; ?> id="wc-prl-deployment-<?php echo esc_attr( $deployment->get_id() ); ?>">

		<?php if ( ! empty( $deployment->get_title() ) ) : ?>
			<h<?php echo esc_attr( $title_level ); ?> class="<?php echo esc_attr( $title_class ); ?>"><?php echo wp_kses_post( $deployment->get_title() ); ?></h<?php echo esc_attr( $title_level ); ?>>
		<?php endif; ?>

		<?php if ( ! empty( $deployment->get_description() ) ) : ?>
			<div><?php echo wp_kses_post( $deployment->get_description( true ) ); ?></div>
		<?php endif; ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $products as $product ) : ?>

				<?php
					$post_object = get_post( $product );

					// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					setup_postdata( $GLOBALS[ 'post' ] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
