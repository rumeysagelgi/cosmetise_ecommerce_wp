<?php
/**
 * WC_PRL_Core_Compatibility class
 *
 * @package  WooCommerce Product Recommendations
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Functions related to core back-compatibility.
 *
 * @class    WC_PRL_Core_Compatibility
 * @version  2.2.1
 */
class WC_PRL_Core_Compatibility {

	/**
	 * Cache 'gte' comparison results.
     *
	 * @var array
	 */
	private static $is_wc_version_gte = array();

	/**
	 * Cache 'gt' comparison results.
     *
	 * @var array
	 */
	private static $is_wc_version_gt = array();

	/**
	 * Cache 'gt' comparison results for WP version.
	 *
	 * @since  1.1.2
	 * @var    array
	 */
	private static $is_wp_version_gt = array();

	/**
	 * Cache 'gte' comparison results for WP version.
	 *
	 * @since  1.1.2
	 * @var    array
	 */
	private static $is_wp_version_gte = array();

	/**
	 * Cache wc admin status result.
	 *
	 * @since  1.2.3
	 * @var    bool
	 */
	private static $is_wc_admin_enabled = null;

	/**
	 * Cache HPOS status.
	 *
	 * @since  2.2.0
	 * @var    bool
	 */
	private static $is_hpos_enabled = null;

	/**
	 * Cache block based cart detection result.
	 *
	 * @since  2.2.1
	 * @var    bool
	 */
	private static $is_block_based_cart = null;

	/**
	 * Cache block based checkout detection result.
	 *
	 * @since  2.2.1
	 * @var    bool
	 */
	private static $is_block_based_checkout = null;

	/**
	 * Initialization and hooks.
	 */
	public static function init() {
		// ...
	}

	/*
	|--------------------------------------------------------------------------
	| WC version handling.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Helper method to get the version of the currently installed WooCommerce.
	 *
	 * @return string
	 */
	public static function get_wc_version() {
		return defined( 'WC_VERSION' ) && WC_VERSION ? WC_VERSION : null;
	}

	/**
	 * Helper method to get the class string for all versions.
	 *
	 * @return string
	 */
	public static function get_versions_class() {

		$classes = array();

		if ( self::is_wc_version_gte( '3.3' ) ) {
			$classes[] = 'wc_gte_33';
		}
		if ( self::is_wc_version_gte( '3.4' ) ) {
			$classes[] = 'wc_gte_34';
		}

		return implode( ' ', $classes );
	}

	/**
	 * Returns true if the installed version of WooCommerce is greater than or equal to $version.
	 *
	 * @param  string  $version
	 * @return bool
	 */
	public static function is_wc_version_gte( $version ) {
		if ( ! isset( self::$is_wc_version_gte[ $version ] ) ) {
			self::$is_wc_version_gte[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '>=' );
		}
		return self::$is_wc_version_gte[ $version ];
	}

	/**
	 * Returns true if the installed version of WooCommerce is greater than $version.
	 *
	 * @param  string  $version
	 * @return bool
	 */
	public static function is_wc_version_gt( $version ) {
		if ( ! isset( self::$is_wc_version_gt[ $version ] ) ) {
			self::$is_wc_version_gt[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '>' );
		}
		return self::$is_wc_version_gt[ $version ];
	}

	/**
	 * Returns true if the installed version of WooCommerce is lower than or equal $version.
	 *
	 * @param  string  $version
	 * @return bool
	 */
	public static function is_wc_version_lte( $version ) {
		if ( ! isset( self::$is_wc_version_gt[ $version ] ) ) {
			self::$is_wc_version_gt[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '<=' );
		}
		return self::$is_wc_version_gt[ $version ];
	}

	/**
	 * Returns true if the installed version of WooCommerce is lower than $version.
	 *
	 * @param  string  $version
	 * @return bool
	 */
	public static function is_wc_version_lt( $version ) {
		if ( ! isset( self::$is_wc_version_gt[ $version ] ) ) {
			self::$is_wc_version_gt[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '<' );
		}
		return self::$is_wc_version_gt[ $version ];
	}

	/**
	 * Returns true if the installed version of WooCommerce is greater than or equal to $version.
	 *
	 * @since  1.1.2
	 *
	 * @param  string  $version
	 * @return bool
	 */
	public static function is_wp_version_gt( $version ) {
		if ( ! isset( self::$is_wp_version_gt[ $version ] ) ) {
			global $wp_version;
			self::$is_wp_version_gt[ $version ] = $wp_version && version_compare( WC_PRL()->get_plugin_version( true, $wp_version ), $version, '>' );
		}
		return self::$is_wp_version_gt[ $version ];
	}

	/**
	 * Returns true if the installed version of WooCommerce is greater than or equal to $version.
	 *
	 * @since  1.1.2
	 *
	 * @param  string  $version
	 * @return bool
	 */
	public static function is_wp_version_gte( $version ) {
		if ( ! isset( self::$is_wp_version_gte[ $version ] ) ) {
			global $wp_version;
			self::$is_wp_version_gte[ $version ] = $wp_version && version_compare( WC_PRL()->get_plugin_version( true, $wp_version ), $version, '>=' );
		}
		return self::$is_wp_version_gte[ $version ];
	}

	/**
	 * Returns true if the WC Admin feature is installed and enabled.
	 *
	 * @since  1.2.3
	 *
	 * @return bool
	 */
	public static function is_wc_admin_enabled() {

		if ( ! isset( self::$is_wc_admin_enabled ) ) {
			$enabled = self::is_wc_version_gte( '4.0' ) && defined( 'WC_ADMIN_VERSION_NUMBER' ) && version_compare( WC_ADMIN_VERSION_NUMBER, '1.0.0', '>=' );
			if ( $enabled && version_compare( WC_ADMIN_VERSION_NUMBER, '2.3.0', '>=' ) && true === apply_filters( 'woocommerce_admin_disabled', false ) ) {
				$enabled = false;
			}

			self::$is_wc_admin_enabled = $enabled;
		}

		return self::$is_wc_admin_enabled;
	}

	/**
	 * Escape JSON for use on HTML or attribute text nodes.
	 *
	 * @since  3.5.5
	 *
	 * @param  string  $json JSON to escape.
	 * @param  bool    $html True if escaping for HTML text node, false for attributes. Determines how quotes are handled.
	 * @return string  Escaped JSON.
	 */
	public static function wc_esc_json( $json, $html = false ) {

		if ( function_exists( 'wc_esc_json' ) ) {
			return wc_esc_json( $json, $html );
		}

		return _wp_specialchars(
			$json,
			$html ? ENT_NOQUOTES : ENT_QUOTES, // Escape quotes in attribute nodes only,
			'UTF-8',                           // json_encode() outputs UTF-8 (really just ASCII), not the blog's charset.
			true                               // Double escape entities: `&amp;` -> `&amp;amp;`
		);
	}

	/**
	 * Compatibility wrapper for invalidating cache groups.
	 *
	 * @since  1.3.0
	 *
	 * @param  string  $group
	 * @return void
	 */
	public static function invalidate_cache_group( $group ) {
		if ( self::is_wc_version_gte( '3.9' ) ) {
			WC_Cache_Helper::invalidate_cache_group( $group );
		} else {
			WC_Cache_Helper::incr_cache_prefix( $group );
		}
	}

	/**
	 * Returns true if is a react based admin page.
	 *
	 * @since 2.0.0
	 *
	 * @return bool
	 */
	public static function is_admin_or_embed_page() {

		if ( class_exists( '\Automattic\WooCommerce\Admin\PageController' ) && method_exists( '\Automattic\WooCommerce\Admin\PageController', 'is_admin_or_embed_page' ) ) {

			return \Automattic\WooCommerce\Admin\PageController::is_admin_or_embed_page();

		} elseif ( class_exists( '\Automattic\WooCommerce\Admin\Loader' ) && method_exists( '\Automattic\WooCommerce\Admin\Loader', 'is_admin_or_embed_page' ) ) {

			return \Automattic\WooCommerce\Admin\Loader::is_admin_or_embed_page();
		}

		return false;
	}

	/**
	 * Compatibility wrapper for checking if the current screen is a Gutenberg editor.
	 *
	 * @since  1.4.9
	 *
	 * @return bool
	 */
	public static function is_block_editor() {
		global $current_screen;
		if ( ! is_a( $current_screen, 'WP_Screen' ) ) {
			return false;
		}

		if ( self::is_wp_version_gte( '5.0' ) && method_exists( $current_screen, 'is_block_editor' ) ) {
			return $current_screen->is_block_editor();
		} elseif ( function_exists( 'is_gutenberg_page' ) ) {
			return is_gutenberg_page();
		}

		return false;
	}

	/**
	 * Check if the usage of the custom orders table is enabled.
	 *
	 * @since  2.2.0
	 *
	 * @return bool
	 */
	public static function is_hpos_enabled() {

		if ( ! isset( self::$is_hpos_enabled ) ) {
			self::$is_hpos_enabled = class_exists( 'Automattic\WooCommerce\Utilities\OrderUtil' ) && Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled();
		}

		return self::$is_hpos_enabled;
	}

	/**
	 * Whether the cart page contains the cart block.
	 *
	 * @since  2.2.1
	 * @return bool
	 */
	public static function is_block_based_cart() {

		if ( ! class_exists( 'Automattic\WooCommerce\Blocks\Package' ) ) {
			return false;
		}

		if ( is_null( self::$is_block_based_cart ) ) {
			self::$is_block_based_cart = class_exists( 'WC_Blocks_Utils' ) && ! empty( WC_Blocks_Utils::get_blocks_from_page( 'woocommerce/cart', 'cart' ) );
		}

		return self::$is_block_based_cart;
	}

	/**
	 * Whether the checkout page contains the checkout block.
	 *
	 * @since  2.2.1
	 * @return bool
	 */
	public static function is_block_based_checkout() {

		if ( ! class_exists( 'Automattic\WooCommerce\Blocks\Package' ) ) {
			return false;
		}

		if ( is_null( self::$is_block_based_checkout ) ) {
			self::$is_block_based_checkout = class_exists( 'WC_Blocks_Utils' ) && ! empty( WC_Blocks_Utils::get_blocks_from_page( 'woocommerce/checkout', 'checkout' ) );
		}

		return self::$is_block_based_checkout;
	}

}

WC_PRL_Core_Compatibility::init();
