<?php
/**
 * WC_PRL_Filter_Vendor class
 *
 * @package  WooCommerce Product Recommendations
 * @since    1.4.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC_PRL_Filter_Vendor class for filtering products based on Vendor.
 *
 * @class    WC_PRL_Filter_Vendor
 * @version  2.4.0
 */
class WC_PRL_Filter_Vendor extends WC_PRL_Filter {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id                     = 'wc_vendor';
		$this->type                   = 'static';
		$this->title                  = __( 'Vendor', 'woocommerce-product-recommendations' );
		$this->supported_modifiers    = array(
			'in'     => _x( 'in', 'prl_modifiers', 'woocommerce-product-recommendations' ),
			'not-in' => _x( 'not in', 'prl_modifiers', 'woocommerce-product-recommendations' )
		);
		$this->supported_engine_types = array( 'cart', 'product', 'order', 'archive' );
		$this->needs_value            = true;
	}

	/**
	 * Apply the filter to the query args array.
	 *
	 * @param  array $query_args
	 * @param  WC_PRL_Deployment $deployment
	 * @param  array $data
	 * @return array
	 */
	public function filter( $query_args, $deployment, $data ) {

		if ( empty( $data[ 'value' ] ) ) {
			return $query_args;
		}

		if ( ! is_array( $data[ 'value' ] ) ) {
			$data[ 'value' ] = array( $data[ 'value' ] );
		}

		if ( ! isset( $query_args[ 'prl_tax_query' ] ) || ! is_array( $query_args[ 'prl_tax_query' ] ) ) {
			$query_args[ 'prl_tax_query' ] = array();
		}

		$query_args[ 'prl_tax_query' ][] = array(
			'taxonomy' => WC_PRODUCT_VENDORS_TAXONOMY,
			'field'    => 'slug',
			'terms'    => $data[ 'value' ],
			'operator' => strtolower( $data[ 'modifier' ] ) === 'in' ? 'IN' : 'NOT IN'
		);

		return $query_args;
	}

	/*---------------------------------------------------*/
	/*  Force methods.                                   */
	/*---------------------------------------------------*/

	/**
	 * Get admin html for filter inputs.
	 *
	 * @param  string|null $post_name
	 * @param  int      $filter_index
	 * @param  array    $filter_data
	 * @return void
	 */
	public function get_admin_fields_html( $post_name, $filter_index, $filter_data ) {
		$post_name       = ! is_null( $post_name ) ? $post_name : 'prl_engine';
		$product_vendors = ( array ) get_terms( WC_PRODUCT_VENDORS_TAXONOMY, array( 'get' => 'all' ) );
		$modifier        = '';
		$vendors         = array();

		// Default modifier.
		if ( ! empty( $filter_data[ 'modifier' ] ) ) {
			$modifier = $filter_data[ 'modifier' ];
		} else {
			$modifier = 'in';
		}

		// Price format.
		if ( isset( $filter_data[ 'value' ] ) ) {
			$vendors = is_array( $filter_data[ 'value' ] ) ? $filter_data[ 'value' ] : array( $filter_data[ 'value' ] );
		}

		?>
		<input type="hidden" name="<?php echo esc_attr( $post_name ); ?>[filters][<?php echo esc_attr( $filter_index ); ?>][id]" value="<?php echo esc_attr( $this->id ); ?>" />
		<div class="os_row_inner">
			<div class="os_modifier">
				<div class="sw-enhanced-select">
					<select name="<?php echo esc_attr( $post_name ); ?>[filters][<?php echo esc_attr( $filter_index ); ?>][modifier]">
						<?php $this->get_modifiers_select_options( $modifier ); ?>
					</select>
				</div>
			</div>
			<div class="os_value">
				<select name="<?php echo esc_attr( $post_name ); ?>[filters][<?php echo esc_attr( $filter_index ); ?>][value][]" class="multiselect sw-select2" multiple="multiple" data-placeholder="<?php esc_attr_e( 'Select vendors&hellip;', 'woocommerce-product-recommendations' ); ?>">
					<?php
						foreach ( $product_vendors as $vendor ) {
							echo '<option value="' . esc_attr( $vendor->slug ) . '" ' . selected( in_array( $vendor->slug, $vendors ), true, false ) . '>' . esc_html( $vendor->name ) . '</option>';
						}
					?>
				</select>
			</div>
		</div>
		<?php
	}
}
