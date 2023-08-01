<?php
/**
 * WC_BIS_Core_Compatibility class
 *
 * @package  WooCommerce Back In Stock Notifications
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Functions related to core back-compatibility.
 *
 * @class    WC_BIS_Core_Compatibility
 * @version  1.6.0
 */
class WC_BIS_Core_Compatibility {

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
	 * @var array
	 */
	private static $is_wp_version_gt = array();

	/**
	 * Cache 'gte' comparison results for WP version.
	 *
	 * @var array
	 */
	private static $is_wp_version_gte = array();

	/**
	 * Cache wc admin status result.
	 *
	 * @var bool
	 */
	private static $is_wc_admin_enabled = null;

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
	 * @return boolean
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
	 * @return boolean
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
	 * @return boolean
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
	 * @return boolean
	 */
	public static function is_wc_version_lt( $version ) {
		if ( ! isset( self::$is_wc_version_gt[ $version ] ) ) {
			self::$is_wc_version_gt[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '<' );
		}
		return self::$is_wc_version_gt[ $version ];
	}

	/*
	|--------------------------------------------------------------------------
	| WP version handling.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Returns true if the installed version of WooCommerce is greater than or equal to $version.
	 *
	 * @param  string  $version
	 * @return boolean
	 */
	public static function is_wp_version_gt( $version ) {
		if ( ! isset( self::$is_wp_version_gt[ $version ] ) ) {
			global $wp_version;
			self::$is_wp_version_gt[ $version ] = $wp_version && version_compare( WC_BIS()->get_plugin_version( true, $wp_version ), $version, '>' );
		}
		return self::$is_wp_version_gt[ $version ];
	}

	/**
	 * Returns true if the installed version of WooCommerce is greater than or equal to $version.
	 *
	 * @param  string  $version
	 * @return boolean
	 */
	public static function is_wp_version_gte( $version ) {
		if ( ! isset( self::$is_wp_version_gte[ $version ] ) ) {
			global $wp_version;
			self::$is_wp_version_gte[ $version ] = $wp_version && version_compare( WC_BIS()->get_plugin_version( true, $wp_version ), $version, '>=' );
		}
		return self::$is_wp_version_gte[ $version ];
	}

	/**
	 * Returns true if the WC Admin feature is installed and enabled.
	 *
	 * @return boolean
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
	 * Compatibility wrapper for invalidating cache groups.
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
	 * Compatibility wrapper for scheduling single actions.
	 *
	 * @param  int     $timestamp
	 * @param  string  $hook
	 * @param  array   $args (Optional)
	 * @param  string  $group (Optional)
	 * @return void
	 */
	public static function schedule_single_action( $timestamp, $hook, $args = array(), $group = '' ) {
		if ( self::is_wc_version_gte( '3.5' ) ) {
			return WC()->queue()->schedule_single( $timestamp, $hook, $args, $group );
		} else {
			return wp_schedule_single_event( $timestamp, $hook, $args );
		}
	}

	/**
	 * Compatibility wrapper for scheduling single actions.
	 *
	 * @param  string  $hook
	 * @param  array   $args
	 * @param  string  $group (Optional)
	 * @param  int     $timestamp (Optional)
	 * @return void
	 */
	public static function add_single_action( $hook, $args = array(), $group = '', $timestamp = 0 ) {
		if ( self::is_wc_version_gte( '3.5' ) ) {
			return WC()->queue()->add( $hook, $args, $group );
		} else {

			if ( ! $timestamp ) {
				$timestamp = time();
			}

			return wp_schedule_single_event( $timestamp, $hook, $args );
		}
	}

	/**
	 * Compatibility wrapper for unscheduling actions.
	 *
	 * @param  string  $group
	 * @return void
	 */
	public static function unschedule_action( $hook, $args = array(), $group = '' ) {
		if ( self::is_wc_version_gte( '3.5' ) ) {
			return WC()->queue()->cancel( $hook, $args, $group );
		} else {
			return wp_clear_scheduled_hook( $hook, $args );
		}
	}

	/**
	 * Compatibility wrapper for getting the date and time for the next scheduled occurence of an action with a given hook.
	 *
	 * @param  string  $group
	 * @return void
	 */
	public static function next_scheduled_action( $hook, $args = null, $group = '' ) {
		if ( self::is_wc_version_gte( '3.5' ) ) {
			return WC()->queue()->get_next( $hook, $args, $group );
		} else {
			return wp_next_scheduled( $hook, $args );
		}
	}

	/**
	 * Compatibility wrapper for getting the date of a AS action.
	 *
	 * @since 1.0.1
	 *
	 * @param  ActionScheduler_Action  $action
	 * @return DateTime
	 */
	public static function get_schedule_date( $action ) {

		if ( self::is_wc_version_gte( '4.0' ) ) {
			return $action->get_schedule()->get_date();
		} else {
			return $action->get_schedule()->next();
		}
	}

	/**
	 * Compatibility wrapper for getting the `get_available_variations` as objects.
	 *
	 * @since 1.0.8
	 *
	 * @param  WC_Product  $product
	 * @return array
	 */
	public static function get_available_variations( $product ) {

		if ( self::is_wc_version_gte( '4.4' ) ) {
			return $product->get_available_variations( 'objects' );
		} else {

			$variations_objects = array();
			$variations         = $product->get_available_variations();
			foreach ( $variations as $variation_data ) {
				if ( empty( $variation_data[ 'variation_id' ] ) ) {
					continue;
				}

				$variation = wc_get_product( $variation_data[ 'variation_id' ] );
				if ( ! is_a( $variation, 'WC_Product' ) || ! $variation->is_type( 'variation' ) ) {
					continue;
				}

				$variations_objects[] = $variation;
			}

			return $variations_objects;
		}
	}

	/**
	 * Returns true if site is using block theme.
	 *
	 * @since  1.6.0
	 *
	 * @return boolean
	 */
	public static function wc_current_theme_is_fse_theme() {
		return function_exists( 'wc_current_theme_is_fse_theme' ) ? wc_current_theme_is_fse_theme() : false;
	}
}

WC_BIS_Core_Compatibility::init();
