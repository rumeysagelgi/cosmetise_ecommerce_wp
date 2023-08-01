<?php
/**
 * WC_PRL_Condition_Archive_Tag class
 *
 * @package  WooCommerce Product Recommendations
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive Tag condition class.
 *
 * @class    WC_PRL_Condition_Archive_Tag
 * @version  2.4.0
 */
class WC_PRL_Condition_Archive_Tag extends WC_PRL_Condition {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id                     = 'archive_tag';
		$this->complexity             = WC_PRL_Condition::LOW_COMPLEXITY;
		$this->title                  = __( 'Archive tag', 'woocommerce-product-recommendations' );
		$this->supported_modifiers    = array(
			'in'     => _x( 'in', 'prl_modifiers', 'woocommerce-product-recommendations' ),
			'not-in' => _x( 'not in', 'prl_modifiers', 'woocommerce-product-recommendations' )
		);
		$this->supported_engine_types = array( 'archive' );
		$this->needs_value            = true;
	}

	/**
	 * Check the condition to the current request.
	 *
	 * @param  array  $data
	 * @param  WC_PRL_deployment  $deployment
	 * @return bool
	 */
	public function check( $data, $deployment ) {

		if ( empty( $data[ 'value' ] ) ) {
			return true;
		}

		if ( ! is_array( $data[ 'value' ] ) ) {
			$data[ 'value' ] = array( $data[ 'value' ] );
		}

		global $product;
		$found           = false;
		$current_archive = get_queried_object();
		if ( ! ( $current_archive instanceof WP_Term ) || 'product_tag' !== $current_archive->taxonomy ) {
			return false;
		}

		$data[ 'value' ] = array_map( 'absint', $data[ 'value' ] );

		foreach ( $data[ 'value' ] as $cat_id ) {
			if ( $cat_id === $current_archive->term_id ) {
				$found = true;
				break;
			}
		}

		if ( $found ) {
			return $this->modifier_is( $data[ 'modifier' ], 'in' );
		} else {
			return $this->modifier_is( $data[ 'modifier' ], 'not-in' );
		}
	}

	/*---------------------------------------------------*/
	/*  Force methods.                                   */
	/*---------------------------------------------------*/

	/**
	 * Get admin html for filter inputs.
	 *
	 * @param  string|null $post_name
	 * @param  int      $condition_index
	 * @param  array    $condition_data
	 * @return void
	 */
	public function get_admin_fields_html( $post_name, $condition_index, $condition_data ) {

		$post_name    = ! is_null( $post_name ) ? $post_name : 'prl_deploy';
		$product_tags = ( array ) get_terms( 'product_tag', array( 'get' => 'all' ) );
		$modifier     = '';
		$tags         = array();

		// Default modifier.
		if ( ! empty( $condition_data[ 'modifier' ] ) ) {
			$modifier = $condition_data[ 'modifier' ];
		} else {
			$modifier = 'max';
		}

		if ( isset( $condition_data[ 'value' ] ) ) {
			$tags = is_array( $condition_data[ 'value' ] ) ? $condition_data[ 'value' ] : array( $condition_data[ 'value' ] );
		}

		?>
		<input type="hidden" name="<?php echo esc_attr( $post_name ); ?>[conditions][<?php echo esc_attr( $condition_index ); ?>][id]" value="<?php echo esc_attr( $this->id ); ?>" />
		<div class="os_row_inner">
			<div class="os_modifier">
				<div class="sw-enhanced-select">
					<select name="<?php echo esc_attr( $post_name ); ?>[conditions][<?php echo esc_attr( $condition_index ); ?>][modifier]">
						<?php $this->get_modifiers_select_options( $modifier ); ?>
					</select>
				</div>
			</div>
			<div class="os_value">
				<select name="<?php echo esc_attr( $post_name ); ?>[conditions][<?php echo esc_attr( $condition_index ); ?>][value][]" class="multiselect sw-select2" multiple="multiple" data-placeholder="<?php esc_attr_e( 'Select tags&hellip;', 'woocommerce-product-recommendations' ); ?>">
					<?php
						foreach ( $product_tags as $product_tag ) {
							echo '<option value="' . esc_attr( $product_tag->term_id ) . '" ' . selected( in_array( $product_tag->term_id, $tags ), true, false ) . '>' . esc_html( $product_tag->name ) . '</option>';
                        }
					?>
				</select>
			</div>
		</div>
		<?php
	}
}
