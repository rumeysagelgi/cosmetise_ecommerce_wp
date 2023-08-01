<?php
/**
 * API initialization for ai plugin.
 *
 * @package Woo_AI
 */

defined( 'ABSPATH' ) || exit;

/**
 * API initialization for ai plugin.
 *
 * @package Woo_AI
 */

/**
 * Register the Woo AI route.
 */
function woo_ai_rest_api_init() {
	require_once dirname( __FILE__ ) . '/product-data-suggestion/class-product-data-suggestion-api.php';
}

add_action( 'rest_api_init', 'woo_ai_rest_api_init' );
