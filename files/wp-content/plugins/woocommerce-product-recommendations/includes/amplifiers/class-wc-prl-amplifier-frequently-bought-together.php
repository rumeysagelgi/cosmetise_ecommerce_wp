<?php
/**
 * WC_PRL_Amplifier_Frequently_Bought_Together class
 *
 * @package  WooCommerce Product Recommendations
 * @since    1.4.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC_PRL_Amplifier_Frequently_Bought_Together class for amplifying products based on their price.
 *
 * @class    WC_PRL_Amplifier_Frequently_Bought_Together
 * @version  2.4.0
 */
class WC_PRL_Amplifier_Frequently_Bought_Together extends WC_PRL_Amplifier {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id                     = 'frequently_bought_together';
		$this->title                  = __( 'Bought Together', 'woocommerce-product-recommendations' );
		$this->supported_modifiers    = array();
		$this->supported_engine_types = array( 'product' );
	}

	/**
	 * Apply the amplifier to the query args array.
	 *
	 * @param  array             $query_args
	 * @param  WC_PRL_Deployment $deployment
	 * @param  array             $data
	 * @return array
	 */
	public function amp( $query_args, $deployment, $data ) {

		add_filter( 'posts_clauses', array( $this, 'add_order_clauses' ) );

		return $query_args;
	}

	/**
	 * Alters the raw query in order to create divisions for significant terms.
	 *
	 * @param  array $args
	 * @return array
	 */
	public function add_order_clauses( $args ) {
		global $wpdb;
		$shared_clauses = WC_PRL()->db->get_shared_posts_clauses();
		WC_PRL()->db->set_shared_posts_clauses( null );
		if ( isset( $shared_clauses[ 'fgt' ] ) ) {
			$args[ 'orderby' ] = 'FIELD(ID,' . implode( ',', $shared_clauses[ 'fgt' ] ) . ')';
		}

		return $args;
	}

	/**
	 * Removes any global amp settings.
	 *
	 * @return void
	 */
	public function remove_amp() {
		remove_filter( 'posts_clauses', array( $this, 'add_order_clauses' ) );
	}

	/**
	 * Get amplifiers substeps count.
	 *
	 * @return int
	 */
	public function get_steps_count() {
		return 5;
	}

	/**
	 * Run a step.
	 * Hint: Keys in $args array represent the return values of each step (non-zero index).
	 *
	 * @param  int                $step_index
	 * @param  WC_PRL_Deployment  $deployment
	 * @param  array              $args Includes a set of all previous steps return values.
	 * @return int
	 */
	public function run_step( $step_index, $deployment, $args = array() ) {

		// Product source ID.
		$source_data          = $deployment->get_source_data();
		$source_id            = (int) array_pop( $source_data );
		$time_period_in_weeks = (int) WC_PRL()->amplifiers->get_calibration_option( 'woocommerce_prl_amp_fgt_time_weeks', 'fgt', $deployment );

		if ( wc_prl_debug_enabled() ) {
			$starttime = microtime( true );
		}

		switch ( $step_index ) {

			case 1:
				// Find total orders container source.
				global $wpdb;
				$sql                            = "SELECT count( distinct( `order_id` ) )
						FROM `{$wpdb->prefix}wc_order_product_lookup`
						WHERE `product_id` = {$source_id}" .
						( $time_period_in_weeks > 0 ? ' AND `date_created` >= DATE_SUB( NOW(), INTERVAL ' . $time_period_in_weeks . ' WEEK )' : '' )
						;
				$total_orders_containing_source = (int) $wpdb->get_var( $sql ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared

				if ( wc_prl_debug_enabled() ) {
					$endtime  = microtime( true );
					$timediff = $endtime - $starttime;
					WC_PRL()->log( sprintf( '[Benchmarking] Step "%d" run for %.4f seconds.', $step_index, $timediff ), 'info', 'wc_prl_generator_tasks' );
				}

				$orders_count_min = (int) WC_PRL()->amplifiers->get_calibration_option( 'woocommerce_prl_amp_fgt_foreground_order_count_min', 'fgt', $deployment );
				if ( empty( $total_orders_containing_source ) || $total_orders_containing_source < $orders_count_min ) {
					if ( wc_prl_debug_enabled() ) {
						WC_PRL()->log( sprintf( '[Failed] Step "%d" for deployment #%d and product #%d failed with status `%s`.', $step_index, $deployment->get_id(), $source_id, "Total orders containing the source product: {$total_orders_containing_source}. Reference Count Threshold: {$orders_count_min}" ), 'info', 'wc_prl_generator_tasks' );
					}
					return null;
				}

				return $total_orders_containing_source;
				break;

			case 2:
				// Find the most significant products.
				$total_orders_containing_source = (int) $args[ 1 ];
				$having_support_percentage      = (float) WC_PRL()->amplifiers->get_calibration_option( 'woocommerce_prl_amp_fgt_foreground_support_pct_min', 'fgt', $deployment );
				$support_number                 = max( (int) $total_orders_containing_source * $having_support_percentage / 100, (int) WC_PRL()->amplifiers->get_calibration_option( 'woocommerce_prl_amp_fgt_foreground_count_min', 'fgt', $deployment ) );
				$results                        = array();

				if ( $total_orders_containing_source ) {

					global $wpdb;

					/**
					 * Use this filter to customize the method for querying foreground frequencies.
					 * Defaults to 'subquery'.
					 *
					 * @since 1.4.16
					 *
					 * @param  string  $method  Values: 'subquery' or 'join'.
					 */
					$foreground_query_type = (string) apply_filters( 'woocommerce_prl_amp_fgt_background_query_type', 'subquery', $deployment );

					if ( 'join' === $foreground_query_type ) {

						$sql = "SELECT `t1`.`product_id`, count( `t1`.`order_id` ) AS `count`
								FROM `{$wpdb->prefix}wc_order_product_lookup` AS `t1`
								INNER JOIN `{$wpdb->prefix}wc_order_product_lookup` AS `t2` ON `t1`.`order_id` = `t2`.`order_id`
								WHERE `t1`.`product_id` <> {$source_id}" .
								( $time_period_in_weeks > 0 ? " AND `t1`.`date_created` >= DATE_SUB( NOW(), INTERVAL " . $time_period_in_weeks . " WEEK )" : "" ) .
								" AND `t2`.`product_id` = {$source_id}
								GROUP BY `t1`.`product_id`
								HAVING count > {$support_number}
								ORDER BY `count` DESC
								LIMIT 100
								";
					} else {

						$sql = "SELECT `t1`.`product_id`, count( `t1`.`order_id` ) AS `count`
								FROM `{$wpdb->prefix}wc_order_product_lookup` AS `t1`
								WHERE `t1`.`product_id` <> {$source_id}" .
								( $time_period_in_weeks > 0 ? " AND `t1`.`date_created` >= DATE_SUB( NOW(), INTERVAL " . $time_period_in_weeks . " WEEK )" : "" ) .
								" AND `t1`.`order_id` IN (
									SELECT `t2`.`order_id`
									FROM `{$wpdb->prefix}wc_order_product_lookup` AS `t2`
									WHERE `t2`.`product_id` = {$source_id}" .
									( $time_period_in_weeks > 0 ? " AND `t2`.`date_created` >= DATE_SUB( NOW(), INTERVAL " . $time_period_in_weeks . " WEEK )" : "" ) .
								")
								GROUP BY `t1`.`product_id`
								HAVING count > {$support_number}
								ORDER BY `count` DESC
								LIMIT 100
								";
					}

					$results = $wpdb->get_results( $sql, ARRAY_A );
				}

				// Normalize return.
				$counts = array();
				foreach ( $results as $row ) {
					$counts[ $row[ 'product_id' ] ] = $row[ 'count' ];
				}

				if ( wc_prl_debug_enabled() ) {
					$endtime  = microtime( true );
					$timediff = $endtime - $starttime;
					WC_PRL()->log( sprintf( '[Benchmarking] Step "%d" run for %.4f seconds.', $step_index, $timediff ), 'info', 'wc_prl_generator_tasks' );
				}

				if ( empty( $counts ) ) {
					if ( wc_prl_debug_enabled() ) {
						$support_needed = ( $having_support_percentage / 100 ) * $total_orders_containing_source;

						$percentage             = sprintf( '%1$s%% of %2$s = %3$s', $having_support_percentage,
							$total_orders_containing_source,
							$support_needed );
						$support_changed_status = $support_needed != $support_number ? sprintf(
							'Fallback threshold value from %1$s to minimum required (=%2$s)',
							$percentage,
							$support_number
						 ) : sprintf( 'Threshold value %s', $percentage );

						$status = sprintf(
							'Foreground Threshold failed.
							Required at least %1$s orders.
							%2$s',
							$support_number,
							$support_changed_status
						);
						WC_PRL()->log( sprintf( '[Failed] Step "%1$d" for deployment #%2$d and product #%3$d failed with status `%4$s`.', $step_index, $deployment->get_id(), $source_id, $status ), 'info', 'wc_prl_generator_tasks' );
					}

					return null;
				}

				return $counts;
				break;

			case 3:
				// Find total orders.
				global $wpdb;
				$sql          = "SELECT count( * )
						FROM `{$wpdb->prefix}wc_order_stats` " .
						( $time_period_in_weeks > 0 ? ' WHERE `date_created` >= DATE_SUB( NOW(), INTERVAL ' . $time_period_in_weeks . ' WEEK )' : '' )
						;
				$total_orders = (int) $wpdb->get_var( $sql ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared

				if ( wc_prl_debug_enabled() ) {
					$endtime  = microtime( true );
					$timediff = $endtime - $starttime;
					WC_PRL()->log( sprintf( '[Benchmarking] Step "%d" run for %.4f seconds.', $step_index, $timediff ), 'info', 'wc_prl_generator_tasks' );
				}

				if ( ! $total_orders ) {
					if ( wc_prl_debug_enabled() ) {
						$status = 'Not enough orders in store. That doesn\'t look normal.';
						WC_PRL()->log( sprintf( '[Failed] Step "%1$d" for deployment #%2$d and product #%3$d failed with status `%4$s`.', $step_index, $deployment->get_id(), $source_id, $status ), 'info', 'wc_prl_generator_tasks' );
					}
					return null;
				}

				return $total_orders;
				break;

			case 4:
				// Find the background freq of the previous significant products.
				$background_support_min_count = (int) WC_PRL()->amplifiers->get_calibration_option( 'woocommerce_prl_amp_fgt_background_count_min', 'fgt', $deployment );

				// Get terms from step 2.
				$product_ids = array_filter( array_keys( $args[ 2 ] ) );

				// Init background frequencies.
				$background_frequencies = array();

				// Has cached data?
				$cached_frequencies = WC_PRL()->db->frequencies->query( array( 'product_id' => $product_ids, 'context' => 'order', 'has_expired' => false ) );
				foreach ( $cached_frequencies as $freq ) {
					// Limit based on support numbers.
					if ( $freq[ 'count' ] >= $background_support_min_count ) {
						$background_frequencies[ $freq[ 'product_id' ] ] = $freq[ 'count' ] / $freq[ 'base_total' ];
					}
				}

				// What's left to calculate?
				$product_ids_to_calculate = implode( ',', array_diff( $product_ids, wp_list_pluck( $cached_frequencies, 'product_id' ) ) );
				if ( ! empty( $product_ids_to_calculate ) ) {
					global $wpdb;
					$total_orders = (int) $args[ 3 ];
					$sql          = "SELECT `product_id`, count( `order_id` ) AS `count`
									FROM `{$wpdb->prefix}wc_order_product_lookup`
									WHERE `product_id` IN ( {$product_ids_to_calculate} )" .
									( $time_period_in_weeks > 0 ? ' AND `date_created` >= DATE_SUB( NOW(), INTERVAL ' . $time_period_in_weeks . ' WEEK )' : '' ) .
									' GROUP BY `product_id`
									';
					$results      = $wpdb->get_results( $sql, ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
					if ( ! empty( $results ) ) {

						$revalidation_period             = (int) apply_filters( 'woocommerce_prl_amp_fgt_background_cache_period', WEEK_IN_SECONDS, $deployment );
						$revalidation_diversity_interval = (int) apply_filters( 'woocommerce_prl_amp_fgt_background_cache_interval', HOUR_IN_SECONDS, $deployment );
						$revalidation_timestamp          = time() + $revalidation_period;

						foreach ( $results as $result ) {

							// Limit based on support numbers.
							if ( $result[ 'count' ] >= $background_support_min_count ) {
								$background_frequencies[ $result[ 'product_id' ] ] = $result[ 'count' ] / $total_orders;
							}

							$freq_cache_args = array(
								'product_id'  => absint( $result[ 'product_id' ] ),
								'context'     => 'order',
								'count'       => absint( $result[ 'count' ] ),
								'base_total'  => $total_orders,
								'expire_date' => $revalidation_timestamp
							);

							try {
								// Cache counts for products.
								WC_PRL()->db->frequencies->cache( $freq_cache_args );
							} catch ( Exception $e ) {
								WC_PRL()->log( sprintf( 'Failed to cache frequency. Input data: %s', print_r( $freq_cache_args, true ) ), 'warning', 'wc_prl_generator_tasks' );
							}

							// Diverse revalidation period to avoid bulk regeneration.
							$revalidation_timestamp = $revalidation_timestamp + $revalidation_diversity_interval;
						}
					}
				}

				if ( wc_prl_debug_enabled() ) {
					$endtime  = microtime( true );
					$timediff = $endtime - $starttime;
					WC_PRL()->log( sprintf( '[Benchmarking] Step "%d" run for %.4f seconds.', $step_index, $timediff ), 'info', 'wc_prl_generator_tasks' );
				}

				if ( empty( $background_frequencies ) ) {
					if ( wc_prl_debug_enabled() ) {

						$status = sprintf( 'Background Count Threshold: %s. Products searched: %s.', $background_support_min_count, print_r( $product_ids, true ) );
						WC_PRL()->log( sprintf( '[Failed] Step "%1$d" for deployment #%2$d and product #%3$d failed with status `%4$s`.', $step_index, $deployment->get_id(), $source_id, $status ), 'info', 'wc_prl_generator_tasks' );
					}
					return null;
				}

				return $background_frequencies;
				break;

			case 5:
				$total_orders_containing_source = (int) $args[ 1 ];
				$total_orders                   = (int) $args[ 3 ];
				$foreground_counts              = $args[ 2 ];
				$background_frequencies         = $args[ 4 ];
				$products_to_calc               = array_intersect( array_keys( $foreground_counts ), array_keys( $background_frequencies ) );

				if ( ! empty( $products_to_calc ) && 0 != $total_orders_containing_source ) {

					// Run.
					$significant_products = array();

					/**
					 * Significance scoring algorithm:
					 *
					 * - JLH
					 * - Google Normalized Distance
					 *
					 * @param  $scoring_algorithm  Values: 'jlh' | 'gnd'
					 */
					$significance_score = WC_PRL()->amplifiers->get_calibration_option( 'woocommerce_prl_fgt_significance_score', 'fgt', $deployment );

					if ( 'jlh' === $significance_score ) {
						$jlh_threshold = (float) WC_PRL()->amplifiers->get_calibration_option( 'woocommerce_prl_amp_fgt_jlh_threshold', 'fgt', $deployment );
					} elseif ( 'gnd' === $significance_score ) {
						$gnd_threshold = (float) WC_PRL()->amplifiers->get_calibration_option( 'woocommerce_prl_amp_fgt_gnd_threshold', 'fgt', $deployment );
					}

					foreach ( $products_to_calc as $product_id ) {

						// Sanity.
						if ( ! isset( $foreground_counts[ $product_id ] ) || ! isset( $background_frequencies[ $product_id ] ) ) {
							continue;
						}

						if ( 'jlh' === $significance_score ) {

							$ff        = $foreground_counts[ $product_id ] / $total_orders_containing_source;
							$fk        = $background_frequencies[ $product_id ];
							$jlh_score = ( $ff - $fk ) * ( $ff / $fk );

							if ( $jlh_score > $jlh_threshold ) {
								$significant_products[ $product_id ] = $jlh_score;
							}

						} elseif ( 'gnd' === $significance_score ) {

							$gnd_score = ( max( log( $total_orders_containing_source ), log( $background_frequencies[ $product_id ] * $total_orders ) ) - log( $foreground_counts[ $product_id ] ) ) / ( log( $total_orders ) - min( log( $total_orders_containing_source ), log( $background_frequencies[ $product_id ] * $total_orders ) ) );

							if ( $gnd_score < $gnd_threshold ) {
								$significant_products[ $product_id ] = $gnd_score;
							}
						}
					}

					if ( 'jlh' === $significance_score ) {
						arsort( $significant_products );
					} elseif ( 'gnd' === $significance_score ) {
						asort( $significant_products );
					}

					WC_PRL()->db->set_shared_posts_clauses( array( 'fgt' => array_keys( $significant_products ) ) );

					if ( wc_prl_debug_enabled() ) {
						$endtime  = microtime( true );
						$timediff = $endtime - $starttime;
						WC_PRL()->log( sprintf( '[Benchmarking] Step "%d" run for %.4f seconds.', $step_index, $timediff ), 'info', 'wc_prl_generator_tasks' );
					}

					if ( empty( $significant_products ) && wc_prl_debug_enabled() ) {

						$status = '';
						if ( 'jlh' === $significance_score ) {
							$status = sprintf( 'Cannot find significant products. Algo: JLH. Required threshold: %s.', $jlh_threshold, print_r( $products_to_calc, true ) );
						} else if ( 'gnd' === $significance_score ) {
							$status = sprintf( 'Cannot find significant products. Algo: GND. Required threshold: %s.', $gnd_threshold, print_r( $products_to_calc, true ) );
						}

						WC_PRL()->log( sprintf( '[Failed] Step "%d" for deployment #%d and product #%d failed with status `%s`.', $step_index, $deployment->get_id(), $source_id, $status ), 'info', 'wc_prl_generator_tasks' );
					}

					return array_keys( $significant_products );
				}

				break;
		}
	}

	/*---------------------------------------------------*/
	/*  Force methods.                                   */
	/*---------------------------------------------------*/

	/**
	 * Get admin html for filter inputs.
	 *
	 * @param  string|null $post_name
	 * @param  int         $amplifier_index
	 * @param  array       $amplifier_data
	 * @return void
	 */
	public function get_admin_fields_html( $post_name, $amplifier_index, $amplifier_data ) {

		$post_name = ! is_null( $post_name ) ? $post_name : 'prl_engine';

		// Default weight.
		if ( ! empty( $amplifier_data[ 'weight' ] ) ) {
			$weight = absint( $amplifier_data[ 'weight' ] );
		} else {
			$weight = 4;
		}

		?>
		<input type="hidden" name="<?php echo esc_attr( $post_name ); ?>[amplifiers][<?php echo esc_attr( $amplifier_index ); ?>][id]" value="<?php echo esc_attr( $this->id ); ?>" />
		<input type="hidden" name="<?php echo esc_attr( $post_name ); ?>[amplifiers][<?php echo esc_attr( $amplifier_index ); ?>][context]" value="yes" />
		<div class="os_row_inner">
			<div class="os_modifier">
				<div class="os--disabled"></div>
			</div>
			<div class="os_semi_value">
				<div class="os--disabled"></div>
			</div>
			<div class="os_slider column-wc_actions">
				<?php wc_prl_print_weight_select( $weight, $post_name . '[amplifiers][' . $amplifier_index . '][weight]' ) ?>
			</div>
		</div><?php
	}
}
