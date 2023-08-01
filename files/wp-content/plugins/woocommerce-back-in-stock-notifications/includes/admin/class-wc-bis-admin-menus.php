<?php
/**
 * WC_BIS_Admin_Menus class
 *
 * @package  WooCommerce Back In Stock Notifications
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Automattic\WooCommerce\Admin\Features\Navigation\Menu;
use Automattic\WooCommerce\Admin\Features\Navigation\Screen;

/**
 * Setup BIS menus in WP admin.
 *
 * @version 1.6.3
 */
class WC_BIS_Admin_Menus {

	/**
	 * The CSS classes used to hide the submenu items in navigation.
	 *
	 * @var string
	 */
	protected static $HIDE_CSS_CLASS = 'hide-if-js';

	/**
	 * Setup.
	 */
	public static function init() {
		self::add_hooks();
	}

	/**
	 * Admin hooks.
	 */
	public static function add_hooks() {

		// Menu.
		add_action( 'admin_menu', array( __CLASS__, 'add_menu' ), 10 );

		// Tweak title.
		add_filter( 'admin_title', array( __CLASS__, 'tweak_page_title' ), 10, 2 );

		// Integrate WooCommerce breadcrumb bar.
		add_action( 'admin_menu', array( __CLASS__, 'wc_admin_connect_bis_pages' ) );
		add_filter( 'woocommerce_navigation_pages_with_tabs', array( __CLASS__, 'wc_admin_navigation_pages_with_tabs' ) );
		add_filter( 'woocommerce_navigation_page_tab_sections', array( __CLASS__, 'wc_admin_navigation_page_tab_sections' ) );

		// Integrate WooCommerce side navigation.
		add_action( 'admin_menu', array( __CLASS__, 'register_navigation_pages' ) );
		add_action( 'woocommerce_navigation_core_excluded_items', array( __CLASS__, 'exclude_navigation_items' ) );
	}

	/**
	 * Configure back in stock tabs.
	 *
	 * @param  array  $pages
	 * @return array
	 */
	public static function wc_admin_navigation_page_tab_sections( $pages ) {
		$pages[ 'notifications' ] = array( 'edit' );
		return $pages;
	}

	/**
	 * Configure back in stock page sections.
	 *
	 * @param  array  $pages
	 * @return array
	 */
	public static function wc_admin_navigation_pages_with_tabs( $pages ) {
		$pages[ 'bis_notifications' ] = 'notifications';
		return $pages;
	}

	/**
	 * Connect pages with navigation bar.
	 *
	 * @return void
	 */
	public static function wc_admin_connect_bis_pages() {

		if ( WC_BIS_Core_Compatibility::is_wc_admin_enabled() ) {

			wc_admin_connect_page(
				array(
					'id'        => 'woocommerce-bis_notifications',
					'screen_id' => wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_notifications' ) . '-notifications',
					'title'     => __( 'Stock Notifications', 'woocommerce-back-in-stock-notifications' ),
					'path'      => add_query_arg(
						array(
							'page' => 'bis_notifications'
						),
						'admin.php'
					)
				)
			);

			wc_admin_connect_page(
				array(
					'id'        => 'woocommerce-bis_dashboard',
					'parent'    => 'woocommerce-bis_notifications',
					'screen_id' => wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_dashboard' ),
					'title'     => __( 'Dashboard', 'woocommerce-back-in-stock-notifications' ),
					'path'      => add_query_arg(
						array(
							'page' => 'bis_dashboard'
						),
						'admin.php'
					)
				)
			);

			wc_admin_connect_page(
				array(
					'id'        => 'woocommerce-bis_notifications-create',
					'parent'    => 'woocommerce-bis_notifications',
					'screen_id' => wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_notifications' ) . '-notifications-create',
					'title'     => __( 'Add Notification', 'woocommerce-back-in-stock-notifications' ),
					'path'      => add_query_arg(
						array(
							'page'         => 'bis_notifications',
							'section'      => 'create',
							'notification' => 1
						),
						'admin.php'
					)
				)
			);

			wc_admin_connect_page(
				array(
					'id'        => 'woocommerce-bis_notifications-edit',
					'parent'    => 'woocommerce-bis_notifications',
					'screen_id' => wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_notifications' ) . '-notifications-edit',
					'title'     => __( 'Edit Notification', 'woocommerce-back-in-stock-notifications' ),
					'path'      => add_query_arg(
						array(
							'page'         => 'bis_notifications',
							'section'      => 'edit',
							'notification' => 1
						),
						'admin.php'
					)
				)
			);

			wc_admin_connect_page(
				array(
					'id'        => 'woocommerce-bis_notifications-activity',
					'parent'    => 'woocommerce-bis_notifications',
					'screen_id' => wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_activity' ),
					'title'     => __( 'Activity', 'woocommerce-back-in-stock-notifications' ),
					'path'      => add_query_arg(
						array(
							'page' => 'bis_activity'
						),
						'admin.php'
					)
				)
			);
		}
	}

	/**
	 * Renders tabs on our custom post types pages.
	 *
	 * @see includes/admin/views templates.
	 * @internal
	 */
	public static function render_tabs() {
		$screen = get_current_screen();

		// Handle tabs on the relevant WooCommerce pages.
		if ( $screen && ! in_array( $screen->id, WC_BIS()->get_screen_ids(), true ) ) {
			return;
		}

		$tabs = array();

		$tabs[ 'dashboard' ] = array(
			'title' => __( 'Dashboard', 'woocommerce-back-in-stock-notifications' ),
			'url'   => admin_url( 'admin.php?page=bis_dashboard' ),
		);

		$tabs[ 'notifications' ] = array(
			'title' => __( 'Notifications', 'woocommerce-back-in-stock-notifications' ),
			'url'   => admin_url( 'admin.php?page=bis_notifications' ),
		);

		$tabs[ 'activity' ] = array(
			'title' => __( 'Activity', 'woocommerce-back-in-stock-notifications' ),
			'url'   => admin_url( 'admin.php?page=bis_activity' ),
		);

		$tabs = apply_filters( 'woocommerce_bis_admin_tabs', $tabs );

		if ( is_array( $tabs ) ) {
			?>
			<nav class="nav-tab-wrapper woo-nav-tab-wrapper">
				<?php $current_tab = self::get_current_tab(); ?>
				<?php foreach ( $tabs as $tab_id => $tab ) : ?>
					<?php $class = $tab_id === $current_tab ? array( 'nav-tab', 'nav-tab-active' ) : array( 'nav-tab' ); ?>
					<?php printf( '<a href="%1$s" class="%2$s">%3$s</a>', esc_url( $tab[ 'url' ] ), implode( ' ', array_map( 'sanitize_html_class', $class ) ), esc_html( $tab[ 'title' ] ) ); ?>
				<?php endforeach; ?>
			</nav>
			<?php
		}
	}

	/**
	 * Returns the current admin tab.
	 *
	 * @param  string  $current_tab (Optional)
	 * @return string
	 */
	public static function get_current_tab( $current_tab = false ) {

		// Default to Dashboard.
		if ( ! $current_tab ) {
			$current_tab = wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_dashboard' );
		}

		$screen = get_current_screen();
		if ( $screen ) {
			if ( in_array( $screen->id, array( wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_dashboard' ) ), true ) ) {
				$current_tab = 'dashboard';
			} elseif ( in_array( $screen->id, array( wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_notifications' ) ), true ) ) {
				$current_tab = 'notifications';
			} elseif ( in_array( $screen->id, array( wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_activity' ) ), true ) ) {
				$current_tab = 'activity';
			}
		}

		/**
		 * Filters the current Admin tab.
		 *
		 * @param  string    $current_tab
		 * @param  WP_Screen $screen
		 */
		return (string) apply_filters( 'woocommerce_bis_admin_current_tab', $current_tab, $screen );
	}

	/**
	 * Add menu items.
	 */
	public static function add_menu() {

		if ( ! current_user_can( 'manage_woocommerce' ) ) {
			return false;
		}

		$dashboard_page = add_submenu_page(
			'woocommerce',
			__( 'Stock Notifications Dashboard', 'woocommerce-back-in-stock-notifications' ),
			__( 'Stock Notifications', 'woocommerce-back-in-stock-notifications' ),
			'manage_woocommerce',
			'bis_dashboard',
			array( __CLASS__, 'dashboard_page' )
		);

		$backinstock_page = add_submenu_page(
			'woocommerce',
			__( 'Notifications', 'woocommerce-back-in-stock-notifications' ),
			__( 'Notifications', 'woocommerce-back-in-stock-notifications' ),
			'manage_woocommerce',
			'bis_notifications',
			array( __CLASS__, 'backinstock_page' )
		);

		$activity_page = add_submenu_page(
			'woocommerce',
			__( 'Activity', 'woocommerce-back-in-stock-notifications' ),
			__( 'Activity', 'woocommerce-back-in-stock-notifications' ),
			'manage_woocommerce',
			'bis_activity',
			array( __CLASS__, 'activity_page' )
		);

		add_action( 'load-' . $backinstock_page, array( __CLASS__, 'backinstock_page_init' ) );

		// Hide pages.
		self::hide_submenu_page( 'woocommerce', 'bis_notifications' );
		self::hide_submenu_page( 'woocommerce', 'bis_activity' );
	}

	/**
	 * Render "Dashboard" page.
	 */
	public static function dashboard_page() {
		WC_BIS_Admin_Dashboard_Page::output();
	}

	/**
	 * Render "Back In Stock" page.
	 */
	public static function backinstock_page() {

		// Select section.
		$section = '';

		if ( isset( $_GET[ 'section' ] ) ) {
			$section = wc_clean( $_GET[ 'section' ] );
		}

		switch ( $section ) {
			case 'delete':
				WC_BIS_Admin_Notifications_Page::delete();
				break;
			case 'create':
				WC_BIS_Admin_Notifications_Page::create_output();
				break;
			case 'edit':
				WC_BIS_Admin_Notifications_Page::edit_output();
				break;
			default:
				WC_BIS_Admin_Notifications_Page::output();
				break;
		}
	}

	/**
	 * Init admin page. Setups the `save` feature and adds messages.
	 */
	public static function backinstock_page_init() {

		WC_BIS_Admin_Notifications_Page::process();

		do_action( 'woocommerce_bis_notifications_page_init' );
	}

	/**
	 * Render "Activity" page.
	 */
	public static function activity_page() {
		WC_BIS_Admin_Activity_Page::output();
	}

	/**
	 * Changes the admin title based on the section.
	 */
	public static function tweak_page_title( $admin_title, $title ) {

		$screen = get_current_screen();

		if ( $screen && wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_notifications' ) === $screen->id ) {

			// Fix the main title issue cause by the remove_submenu_page.
			$title = __( 'Stock Notifications', 'woocommerce-back-in-stock-notifications' );
			if ( false === strpos( $admin_title, $title ) ) {
				$admin_title = $title . $admin_title;
			}

			if ( ! isset( $_GET[ 'section' ] ) ) {
				return $admin_title;
			}

			$section = wc_clean( $_GET[ 'section' ] );
			switch ( $section ) {
				case 'create':
					$admin_title = str_replace( $title, __( 'Add Notification', 'woocommerce-back-in-stock-notifications' ), $admin_title );
					break;
				case 'edit':
					$admin_title = str_replace( $title, __( 'Edit Notification', 'woocommerce-back-in-stock-notifications' ), $admin_title );
					break;
			}
		} elseif ( wc_bis_get_formatted_screen_id( 'woocommerce_page_bis_activity' ) === $screen->id ) {

			// Fix the main title issue cause by the null title.
			$title = __( 'Stock Notifications Activity', 'woocommerce-back-in-stock-notifications' );
			return $title . $admin_title;
		}

		return $admin_title;
	}

	/**
	 * Exclude menu items from WooCommerce menu migration.
	 *
	 * @since  1.0.9
	 *
	 * @param  array $excluded_items
	 * @return array
	 */
	public static function exclude_navigation_items( $excluded_items ) {
		$excluded_items[] = 'bis_activity';
		$excluded_items[] = 'bis_notifications';
		$excluded_items[] = 'bis_dashboard';

		return $excluded_items;
	}

	/**
	 * Register WooCommerce menu pages.
	 *
	 * @since  1.0.9
	 *
	 * @return void
	 */
	public static function register_navigation_pages() {

		if ( ! class_exists( '\Automattic\WooCommerce\Admin\Features\Navigation\Menu' ) || ! class_exists( '\Automattic\WooCommerce\Admin\Features\Navigation\Screen' ) ) {
			return;
		}

		Menu::add_plugin_category(
			array(
				'id'     => 'bis-notifications-category',
				'title'  => __( 'Stock Notifications', 'woocommerce-back-in-stock-notifications' ),
				'parent' => 'woocommerce',
			)
		);

		Menu::add_plugin_item(
			array(
				'id'         => 'bis-dashboard',
				'title'      => __( 'Dashboard', 'woocommerce-back-in-stock-notifications' ),
				'capability' => 'manage_woocommerce',
				'url'        => 'admin.php?page=bis_dashboard',
				'parent'     => 'bis-notifications-category',
				'order'      => 10
			)
		);

		Menu::add_plugin_item(
			array(
				'id'         => 'bis-notifications',
				'title'      => __( 'Notifications', 'woocommerce-back-in-stock-notifications' ),
				'capability' => 'manage_woocommerce',
				'url'        => 'admin.php?page=bis_notifications',
				'parent'     => 'bis-notifications-category',
				'order'      => 20
			)
		);

		Menu::add_plugin_item(
			array(
				'id'         => 'bis-activity',
				'title'      => __( 'Activity', 'woocommerce-back-in-stock-notifications' ),
				'capability' => 'manage_woocommerce',
				'url'        => 'admin.php?page=bis_activity',
				'parent'     => 'bis-notifications-category',
				'order'      => 30
			)
		);
	}

	/**
	 * Hide the submenu page based on slug and return the item that was hidden.
	 *
	 * @since 1.6.3
	 *
	 * Instead of actually removing the submenu item, a safer approach is to hide it and filter it in the API response.
	 * In this manner we'll avoid breaking third-party plugins depending on items that no longer exist.
	 *
	 * @param string $menu_slug The parent menu slug.
	 * @param string $submenu_slug The submenu slug that should be hidden.
	 * @return false|array
	 */
	protected static function hide_submenu_page( $menu_slug, $submenu_slug ) {
		global $submenu;

		if ( ! isset( $submenu[ $menu_slug ] ) ) {
			return false;
		}

		foreach ( $submenu[ $menu_slug ] as $i => $item ) {
			if ( $submenu_slug !== $item[2] ) {
				continue;
			}

			self::hide_submenu_element( $i, $menu_slug, $item );

			return $item;
		}

		return false;
	}

	/**
	 * Apply the hide-if-js CSS class to a submenu item.
	 *
	 * @since 1.6.3
	 * 
	 * @param int    $index The position of a submenu item in the submenu array.
	 * @param string $parent_slug The parent slug.
	 * @param array  $item The submenu item.
	 */
	protected static function hide_submenu_element( $index, $parent_slug, $item ) {
		global $submenu;

		$css_classes = empty( $item[4] ) ? self::$HIDE_CSS_CLASS : $item[4] . ' ' . self::$HIDE_CSS_CLASS;

		// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		$submenu[ $parent_slug ][ $index ][4] = $css_classes;
	}

	/*
	|--------------------------------------------------------------------------
	| Deprecated methods.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Removes multiple submenu links that are not being used as a menu item.
	 * 
	 * @deprecated
	 */
	public static function remove_submenu_link() {
		_deprecated_function( __METHOD__ . '()', '1.6.3' );
	}
}

WC_BIS_Admin_Menus::init();
