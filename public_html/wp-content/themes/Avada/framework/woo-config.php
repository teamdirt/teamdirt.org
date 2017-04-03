<?php
/**
 * Fusion Framework
 *
 * WARNING: This file is part of the Fusion Core Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 *
 * @package  Fusion/Template
 * @author   ThemeFusion
 * @link	 http://theme-fusion.com
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

// Don't duplicate me!
if( ! class_exists( 'FusionTemplateWoo' ) ) {

	/**
	 * Class to apply woocommerce templates
	 *
	 * @since 4.0.0
	 */
	class FusionTemplateWoo {

		function __construct() {

			add_filter( 'woocommerce_show_page_title', array( $this, 'shop_title'), 10 );

			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
			add_action( 'woocommerce_before_main_content', array( $this, 'before_container' ), 10 );
			add_action( 'woocommerce_after_main_content', array( $this, 'after_container' ), 10 );

			remove_action( 'woocommerce_sidebar' , 'woocommerce_get_sidebar', 10 );
			add_action( 'woocommerce_sidebar', array( $this, 'add_sidebar' ), 10 );

			/**
			 * Products Loop
			 */
			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'before_shop_item_buttons' ), 9 );
			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'after_shop_item_buttons' ), 11 );

			/**
			 * Single Product Page
			 */
			add_action( 'woocommerce_single_product_summary', array( $this, 'add_product_border' ), 19 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11 );

			/**
			 * WooCommerce 2.3 Remove extra checkout button
			 */
			remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 10 );
			// Backwards compatability to 2.2
			add_filter('woocommerce_template_path', array($this, 'backwards_compatability'));


		} // end __construct();

		/**
		 * Filter method to modify path to WooCommerce files if WooCommerce is a version less than 2.3
		 *
		 * @since 3.7.2
		 * @return relative path of WooCommerce template files within the theme
		 */
		function backwards_compatability( $path ) {
			if ( ! self::is_wc_version_gte_2_3() ) {
				$path = "woocommerce/compatability/2.2/";
			}
			return $path;
		}

		/**
		 * Helper method to get the version of the currently installed WooCommerce
		 *
		 * @since 3.7.2
		 * @return string woocommerce version number or null
		 */
		private static function get_wc_version() {
			return defined( 'WC_VERSION' ) && WC_VERSION ? WC_VERSION : null;
		}

		/**
		 * Returns true if the installed version of WooCommerce is 2.3 or greater
		 *
		 * @since 3.7.2
		 * @return boolean true if the installed version of WooCommerce is 2.3 or greater
		 */
		public static function is_wc_version_gte_2_3() {
			return self::get_wc_version() && version_compare( self::get_wc_version(), '2.3', '>=' );
		}

		function before_container() {
			global $smof_data, $post;

			if( is_shop() ) {
				$pageID = get_option('woocommerce_shop_page_id');
			} elseif( is_product_category() || is_product_tag() ) {
				$pageID = '';
			} else {
				$pageID = $post->ID;
			}

			$custom_fields = get_post_custom_values('_wp_page_template', $pageID);
			if(is_array($custom_fields) && !empty($custom_fields)) {
				$page_template = $custom_fields[0];
			} else {
				$page_template = '';
			}

			$content_css = '';
			$sidebar_css = '';
			$sidebar_exists = true;
			$sidebar_left = '';
			$double_sidebars = false;

			$sidebar_1 = get_post_meta( $pageID, 'sbg_selected_sidebar_replacement', true );
			$sidebar_2 = get_post_meta( $pageID, 'sbg_selected_sidebar_2_replacement', true );

			if( is_product() || is_shop() ) {
				if( $smof_data['woo_global_sidebar'] ) {
					if( $smof_data['woo_sidebar'] != 'None' ) {
						$sidebar_1 = array( $smof_data['woo_sidebar'] );
					} else {
						$sidebar_1 = '';
					}

					if( $smof_data['woo_sidebar_2'] != 'None' ) {
						$sidebar_2 = array( $smof_data['woo_sidebar_2'] );
					} else {
						$sidebar_2 = '';
					}
				}
			}

			if( ( is_array( $sidebar_1 ) && $sidebar_1[0] ) && ( is_array( $sidebar_2 ) && $sidebar_2[0] ) ) {
				$double_sidebars = true;
			}

			if( is_array( $sidebar_1 ) &&
				( $sidebar_1[0] || $sidebar_1[0] === '0' ) 
			) {
				$sidebar_exists = true;
			} else {
				$sidebar_exists = false;
			}

			if( is_product_category() || is_product_tag() ) {
				$sidebar_1 = $smof_data['woocommerce_archive_sidebar'];
				$sidebar_2 = $smof_data['woocommerce_archive_sidebar_2'];
				if( $sidebar_1 != 'None' && $sidebar_2 != 'None' ) {
					$double_sidebars = true;
				}

				if( $sidebar_1 == 'None' ) {
					$sidebar_exists = false;
				} else {
					$sidebar_exists = true;
				}
			}

			if( $page_template == '100-width.php' ) {
				$content_css = 'width:100%';
				$sidebar_css = 'display:none';
			} elseif( ! $sidebar_exists ) {
				$content_css = 'width:100%';
				$sidebar_css = 'display:none';
				$sidebar_exists = false;
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'left') {
				$content_css = 'float:right;';
				$sidebar_css = 'float:left;';
				$sidebar_left = 1;
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'right') {
				$content_css = 'float:left;';
				$sidebar_css = 'float:right;';
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'default' || ! metadata_exists( 'post', $pageID, 'pyre_sidebar_position' )) {
				if($smof_data['woo_sidebar_position'] == 'Left') {
					$content_css = 'float:right;';
					$sidebar_css = 'float:left;';
					$sidebar_exists = true;
					$sidebar_left = 1;
				} elseif($smof_data['woo_sidebar_position'] == 'Right') {
					$content_css = 'float:left;';
					$sidebar_css = 'float:right;';
					$sidebar_exists = true;
					$sidebar_left = 2;
				}
			}

			if(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'right') {
				$sidebar_left = 2;
			}

			if( $smof_data['woo_global_sidebar'] ) {
				if( is_product() || is_shop() ) {
					if( $smof_data['woo_sidebar'] != 'None' ) {
						if($smof_data['woo_sidebar_position'] == 'Left') {
							$content_css = 'float:right;';
							$sidebar_css = 'float:left;';
							$sidebar_left = 1;
						} elseif($smof_data['woo_sidebar_position'] == 'Right') {
							$content_css = 'float:left;';
							$sidebar_css = 'float:right;';
							$sidebar_left = 2;
						}
					}

					if( $smof_data['woo_sidebar'] != 'None' && $smof_data['woo_sidebar_2'] != 'None' ) {
						$double_sidebars = true;
					}
				}
				
				if( is_product_category() || is_product_tag() ) {
					if( $smof_data['woocommerce_archive_sidebar'] != 'None' ) {
						if($smof_data['woo_sidebar_position'] == 'Left') {
							$content_css = 'float:right;';
							$sidebar_css = 'float:left;';
							$sidebar_left = 1;
						} elseif($smof_data['woo_sidebar_position'] == 'Right') {
							$content_css = 'float:left;';
							$sidebar_css = 'float:right;';
							$sidebar_left = 2;
						}
					}

					if( $smof_data['woocommerce_archive_sidebar'] != 'None' && $smof_data['woocommerce_archive_sidebar_2'] != 'None' ) {
						$double_sidebars = true;
					}				
				}
			}
			
			if( is_product_category() || is_product_tag() ) {
				if( $smof_data['woocommerce_archive_sidebar'] != 'None' ) {
					if($smof_data['woo_sidebar_position'] == 'Left') {
						$content_css = 'float:right;';
						$sidebar_css = 'float:left;';
						$sidebar_left = 1;
					} elseif($smof_data['woo_sidebar_position'] == 'Right') {
						$content_css = 'float:left;';
						$sidebar_css = 'float:right;';
						$sidebar_left = 2;
					}
				}

				if( $smof_data['woocommerce_archive_sidebar'] != 'None' && $smof_data['woocommerce_archive_sidebar_2'] != 'None' ) {
					$double_sidebars = true;
				}				
			}				

			if($double_sidebars == true) {
				$content_css = 'float:left;';
				$sidebar_css = 'float:left;';
				$sidebar_2_css = 'float:left;';
			} else {
				$sidebar_left = 1;
			}

			if( is_product() || is_shop() ) {
				if( $smof_data['woo_global_sidebar'] ) {
					if( $smof_data['woo_sidebar'] != 'None' ) {
						$sidebar_1 = $smof_data['woo_sidebar'];
					}

					if( $smof_data['woo_sidebar_2'] != 'None' ) {
						$sidebar_2 = $smof_data['woo_sidebar_2'];
					}
				} else {
					$sidebar_1 = '0';
					$sidebar_2 = '0';
				}
			}

			echo '<div class="woocommerce-container"><div id="content" style="' . $content_css . '">';
		}

		function shop_title() {
			return false;
		}

		function after_container() {
			echo '</div></div>';
		}

		function add_sidebar() {
			global $smof_data, $post;

			if( is_shop() ) {
				$pageID = get_option('woocommerce_shop_page_id');
			} elseif( is_product_category() || is_product_tag() ) {
				$pageID = '';
			} else {
				$pageID = $post->ID;
			}

			$custom_fields = get_post_custom_values('_wp_page_template', $pageID);
			if(is_array($custom_fields) && !empty($custom_fields)) {
				$page_template = $custom_fields[0];
			} else {
				$page_template = '';
			};

			$content_css = '';
			$sidebar_css = '';
			$sidebar_2_css = '';
			$sidebar_exists = true;
			$sidebar_left = '';
			$double_sidebars = false;

			$sidebar_1 = get_post_meta( $pageID, 'sbg_selected_sidebar_replacement', true );
			$sidebar_2 = get_post_meta( $pageID, 'sbg_selected_sidebar_2_replacement', true );

			if( is_product() || is_shop() ) {
				if( $smof_data['woo_global_sidebar'] ) {
					if( $smof_data['woo_sidebar'] != 'None' ) {
						$sidebar_1 = array( $smof_data['woo_sidebar'] );
					} else {
						$sidebar_1 = '';
					}

					if( $smof_data['woo_sidebar_2'] != 'None' ) {
						$sidebar_2 = array( $smof_data['woo_sidebar_2'] );
					} else {
						$sidebar_2 = '';
					}
				}
			}

			if( ( is_array( $sidebar_1 ) && $sidebar_1[0] ) && ( is_array( $sidebar_2 ) && $sidebar_2[0] ) ) {
				$double_sidebars = true;
			}

			if( is_array( $sidebar_1 ) &&
				( $sidebar_1[0] || $sidebar_1[0] === '0' ) 
			) {
				$sidebar_exists = true;
			} else {
				$sidebar_exists = false;
			}

			if( is_product_category() || is_product_tag() ) {
				$sidebar_1 = $smof_data['woocommerce_archive_sidebar'];
				$sidebar_2 = $smof_data['woocommerce_archive_sidebar_2'];
				if( $sidebar_1 != 'None' && $sidebar_2 != 'None' ) {
					$double_sidebars = true;
				}

				if( $sidebar_1 == 'None' ) {
					$sidebar_exists = false;
				} else {
					$sidebar_exists = true;
				}
			}

			if( $page_template == '100-width.php' ) {
				$content_css = 'width:100%';
				$sidebar_css = 'display:none';
			} elseif( ! $sidebar_exists ) {
				$content_css = 'width:100%';
				$sidebar_css = 'display:none';
				$sidebar_exists = false;
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'left') {
				$content_css = 'float:right;';
				$sidebar_css = 'float:left;';
				$sidebar_left = 1;
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'right') {
				$content_css = 'float:left;';
				$sidebar_css = 'float:right;';
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'default' || ! metadata_exists( 'post', $pageID, 'pyre_sidebar_position' )) {
				if($smof_data['woo_sidebar_position'] == 'Left') {
					$content_css = 'float:right;';
					$sidebar_css = 'float:left;';
					$sidebar_exists = true;
					$sidebar_left = 1;
				} elseif($smof_data['woo_sidebar_position'] == 'Right') {
					$content_css = 'float:left;';
					$sidebar_css = 'float:right;';
					$sidebar_exists = true;
					$sidebar_left = 2;
				}
			}

			if(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'right') {
				$sidebar_left = 2;
			}

			if( $smof_data['woo_global_sidebar'] ) {
				if( is_product() || is_shop() ) {
					if( $smof_data['woo_sidebar'] != 'None' ) {
						if($smof_data['woo_sidebar_position'] == 'Left') {
							$content_css = 'float:right;';
							$sidebar_css = 'float:left;';
							$sidebar_left = 1;
						} elseif($smof_data['woo_sidebar_position'] == 'Right') {
							$content_css = 'float:left;';
							$sidebar_css = 'float:right;';
							$sidebar_left = 2;
						}
					}

					if( $smof_data['woo_sidebar'] != 'None' && $smof_data['woo_sidebar_2'] != 'None' ) {
						$double_sidebars = true;
					}
				}
				
				if( is_product_category() || is_product_tag() ) {
					if( $smof_data['woocommerce_archive_sidebar'] != 'None' ) {
						if($smof_data['woo_sidebar_position'] == 'Left') {
							$content_css = 'float:right;';
							$sidebar_css = 'float:left;';
							$sidebar_left = 1;
						} elseif($smof_data['woo_sidebar_position'] == 'Right') {
							$content_css = 'float:left;';
							$sidebar_css = 'float:right;';
							$sidebar_left = 2;
						}
					}

					if( $smof_data['woocommerce_archive_sidebar'] != 'None' && $smof_data['woocommerce_archive_sidebar_2'] != 'None' ) {
						$double_sidebars = true;
					}				
				}
			}
			
			if( is_product_category() || is_product_tag() ) {
				if( $smof_data['woocommerce_archive_sidebar'] != 'None' ) {
					if($smof_data['woo_sidebar_position'] == 'Left') {
						$content_css = 'float:right;';
						$sidebar_css = 'float:left;';
						$sidebar_left = 1;
					} elseif($smof_data['woo_sidebar_position'] == 'Right') {
						$content_css = 'float:left;';
						$sidebar_css = 'float:right;';
						$sidebar_left = 2;
					}
				}

				if( $smof_data['woocommerce_archive_sidebar'] != 'None' && $smof_data['woocommerce_archive_sidebar_2'] != 'None' ) {
					$double_sidebars = true;
				}				
			}			

			if($double_sidebars == true) {
				$content_css = 'float:left;';
				$sidebar_css = 'float:left;';
				$sidebar_2_css = 'float:left;';
			} else {
				$sidebar_left = 1;
			}

			if( is_product() || is_shop() ) {
				if( $smof_data['woo_global_sidebar'] ) {
					if( $smof_data['woo_sidebar'] != 'None' ) {
						$sidebar_1 = $smof_data['woo_sidebar'];
					}

					if( $smof_data['woo_sidebar_2'] != 'None' ) {
						$sidebar_2 = $smof_data['woo_sidebar_2'];
					}
				} else {
					if( ( is_array( $sidebar_1 ) && $sidebar_1[0] != '' ) ) {
						$sidebar_1 = $sidebar_1[0];
					}
					if( ( is_array( $sidebar_2 ) && $sidebar_2[0] != '' ) ) {
						$sidebar_2 = $sidebar_2[0];
					}
				}
			}

			if( $sidebar_exists == true ) {
				echo '<div id="sidebar" class="sidebar" style="' . $sidebar_css . '">';

				wp_reset_query();

				if( $sidebar_left == 1 ) {
					if(is_product() || is_shop()) {
						generated_dynamic_sidebar($sidebar_1);
					} elseif(is_product_category() || is_product_tag()) {
						generated_dynamic_sidebar($smof_data['woocommerce_archive_sidebar']);
					} else {
						$shop_page_id = get_option('woocommerce_shop_page_id');
						$name = get_post_meta($shop_page_id, 'sbg_selected_sidebar_replacement', true);
						if($name) {
							generated_dynamic_sidebar($name[0]);
						}
					}
				}
				if( $sidebar_left == 2 ) {
					wp_reset_query();
					if(is_product() || is_shop()) {
						generated_dynamic_sidebar_2($sidebar_2);
					} elseif(is_product_category() || is_product_tag()) {
						generated_dynamic_sidebar($smof_data['woocommerce_archive_sidebar_2']);
					} else {
						$shop_page_id = get_option('woocommerce_shop_page_id');
						$name = get_post_meta($shop_page_id, 'sbg_selected_sidebar_2_replacement', true);
						if($name) {
							generated_dynamic_sidebar($name[0]);
						}
					}
				}

				echo '</div>';

				if( $double_sidebars == true ) {

					echo '<div id="sidebar-2" class="sidebar" style="' . $sidebar_2_css . '">';

					if( $sidebar_left == 1 ) {
						wp_reset_query();
						if(is_product() || is_shop()) {
							generated_dynamic_sidebar_2($sidebar_2);
						} elseif(is_product_category() || is_product_tag()) {
							generated_dynamic_sidebar($smof_data['woocommerce_archive_sidebar_2']);
						} else {
							$shop_page_id = get_option('woocommerce_shop_page_id');
							$name = get_post_meta($shop_page_id, 'sbg_selected_sidebar_2_replacement', true);
							if($name) {
								generated_dynamic_sidebar($name[0]);
							}
						}
					}
					if( $sidebar_left == 2 ) {
						if(is_product() || is_shop()) {
							generated_dynamic_sidebar($sidebar_1);
						} elseif(is_product_category() || is_product_tag()) {
							generated_dynamic_sidebar($smof_data['woocommerce_archive_sidebar']);
						} else {
							$shop_page_id = get_option('woocommerce_shop_page_id');
							$name = get_post_meta($shop_page_id, 'sbg_selected_sidebar_replacement', true);
							if($name) {
								generated_dynamic_sidebar($name[0]);
							}
						}
					}
					
					echo '</div>';
				}				
			}
		}

		function before_shop_item_buttons() {
			echo '<div class="product-buttons"><div class="product-buttons-container clearfix">';
		}

		function after_shop_item_buttons() {
			echo '<a href="' . get_permalink() . '" class="show_details_button">' . __( 'Details', 'Avada' ) . '</a></div></div>';
		}

		function add_product_border() {
			echo '<div class="product-border"></div>';
		}

	} // end FusionTemplateWoo() class

}
new FusionTemplateWoo();

global $smof_data;

add_filter( 'get_product_search_form' , 'avada_product_search_form' );

function avada_product_search_form( $form )
{
	$form = '<form role="search" method="get" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
	<div>
	<input type="text" value="' . get_search_query() . '" name="s" class="s" placeholder="' . __( 'Search...', 'Avada' ) . '" />
	<input type="hidden" name="post_type" value="product" />
	</div>
	</form>';

	return $form;
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

if( ! $smof_data['woocommerce_avada_ordering'] ) {
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	add_action('woocommerce_before_shop_loop', 'avada_woocommerce_catalog_ordering', 30);
}
function avada_woocommerce_catalog_ordering() {
	global $smof_data;

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str($_SERVER['QUERY_STRING'], $params);

		$query_string = '?'.$_SERVER['QUERY_STRING'];
	} else {
		$query_string = '';
	}

	// replace it with theme option
	if($smof_data['woo_items']) {
		$per_page = $smof_data['woo_items'];
	} else {
		$per_page = 12;
	}

	$pob = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
	if( ! empty( $params['product_order'] ) ) {
		$po = $params['product_order'];
	} else {
		switch($pob) {
			case 'date':
				$po = 'desc';
			break;
			case 'price':
				$po = 'asc';
			break;
			case 'popularity':
				$po = 'asc';
			break;
			case 'rating':
				$po = 'desc';
			break;
			case 'name':
				$po = 'asc';
			break;
			case 'default':
				$po = 'asc';
			break;				
		}
	}
	
	
	$pc = !empty($params['product_count']) ? $params['product_count'] : $per_page;

	$html = '';
	$html .= '<div class="catalog-ordering clearfix">';

	$html .= '<div class="orderby-order-container">';

	$html .= '<ul class="orderby order-dropdown">';
	$html .= '<li>';
	$html .= '<span class="current-li"><span class="current-li-content"><a aria-haspopup="true">'.__('Sort by', 'Avada').' <strong>'.__('Default Order', 'Avada').'</strong></a></span></span>';
	$html .= '<ul>';
	$html .= '<li class="'.(($pob == 'default') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'default').'">'.__('Sort by', 'Avada').' <strong>'.__('Default Order', 'Avada').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'name') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'name').'">'.__('Sort by', 'Avada').' <strong>'.__('Name', 'Avada').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'price') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'price').'">'.__('Sort by', 'Avada').' <strong>'.__('Price', 'Avada').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'date') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'date').'">'.__('Sort by', 'Avada').' <strong>'.__('Date', 'Avada').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'popularity') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'popularity').'">'.__('Sort by', 'Avada').' <strong>'.__('Popularity', 'Avada').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'rating') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'rating').'">'.__('Sort by', 'Avada').' <strong>'.__('Rating', 'Avada').'</strong></a></li>';
	$html .= '</ul>';
	$html .= '</li>';
	$html .= '</ul>';


	$html .= '<ul class="order">';
	if($po == 'desc'):
	$html .= '<li class="desc"><a aria-haspopup="true" href="'.tf_addURLParameter($query_string, 'product_order', 'asc').'"><i class="fusionicon-arrow-down2 icomoon-up"></i></a></li>';
	endif;
	if($po == 'asc'):
	$html .= '<li class="asc"><a aria-haspopup="true" href="'.tf_addURLParameter($query_string, 'product_order', 'desc').'"><i class="fusionicon-arrow-down2"></i></a></li>';
	endif;
	$html .= '</ul>';

	$html .= '</div>';

	$html .= '<ul class="sort-count order-dropdown">';
	$html .= '<li>';
	$html .= '<span class="current-li"><a aria-haspopup="true">'.__('Show', 'Avada').' <strong>'.$per_page.' '.__(' Products', 'Avada').'</strong></a></span>';
	$html .= '<ul>';
	$html .= '<li class="'.(($pc == $per_page) ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', $per_page).'">'.__('Show', 'Avada').' <strong>'.$per_page.' '.__('Products', 'Avada').'</strong></a></li>';
	$html .= '<li class="'.(($pc == $per_page*2) ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', $per_page*2).'">'.__('Show', 'Avada').' <strong>'.($per_page*2).' '.__('Products', 'Avada').'</strong></a></li>';
	$html .= '<li class="'.(($pc == $per_page*3) ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', $per_page*3).'">'.__('Show', 'Avada').' <strong>'.($per_page*3).' '.__('Products', 'Avada').'</strong></a></li>';
	$html .= '</ul>';
	$html .= '</li>';
	$html .= '</ul>';
	$html .= '</div>';

	echo $html;
}

if( ! $smof_data['woocommerce_avada_ordering'] ) {
	add_action('woocommerce_get_catalog_ordering_args', 'avada_woocommerce_get_catalog_ordering_args', 20);
}
function avada_woocommerce_get_catalog_ordering_args($args)
{
	global $woocommerce;

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str($_SERVER['QUERY_STRING'], $params);
	}

	$pob = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
	$po = !empty($params['product_order'])  ? $params['product_order'] : 'asc';

	switch($pob) {
		case 'date':
			$orderby = 'date';
			$order = 'desc';
			$meta_key = '';
		break;
		case 'price':
			$orderby = 'meta_value_num';
			$order = 'asc';
			$meta_key = '_price';
		break;
		case 'popularity':
			$orderby = 'meta_value_num';
			$order = 'asc';
			$meta_key = 'total_sales';
		break;
		case 'rating':
			$orderby = 'meta_value_num';
			$order = 'desc';
			$meta_key = 'average_rating';
		break;
		case 'name':
			$orderby = 'title';
			$order = 'asc';
			$meta_key = '';
		break;
		case 'default':
			return $args;
		break;
	}

	switch($po) {
		case 'desc':
			$order = 'desc';
		break;
		case 'asc':
			$order = 'asc';
		break;
		default:
			$order = 'asc';
		break;
	}

	$args['orderby'] = $orderby;
	$args['order'] = $order;
	$args['meta_key'] = $meta_key;

	if( $pob == 'rating' ) {
		$args['orderby']  = 'menu_order title';
		$args['order']	= $po == 'desc' ? 'desc' : 'asc';
		$args['order']	  = strtoupper( $args['order'] );
		$args['meta_key'] = '';

		add_filter( 'posts_clauses', 'fusion_order_by_rating_post_clauses' );
	}

	return $args;
}

/**
 * fusion_order_by_rating_post_clauses function.
 *
 * @access public
 * @param array $args
 * @return array
 */
function fusion_order_by_rating_post_clauses( $args ) {
	global $wpdb;

	$args['fields'] .= ", AVG( $wpdb->commentmeta.meta_value ) as average_rating, SUM( $wpdb->comments.comment_approved ) as sum_of_comments_approved ";

	$args['where'] .= " AND ( $wpdb->commentmeta.meta_key = 'rating' OR $wpdb->commentmeta.meta_key IS null ) ";
	//$args['where'] .= " AND $wpdb->comments.comment_approved = 1";

	$args['join'] .= "
		LEFT OUTER JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
		LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
	";

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str($_SERVER['QUERY_STRING'], $params);
	}	
	$order = ! empty($params['product_order']) ? $params['product_order'] : 'desc';
	$order = strtoupper($order);

	$args['orderby'] = "sum_of_comments_approved DESC, average_rating {$order}, $wpdb->posts.post_date DESC";

	$args['groupby'] = "$wpdb->posts.ID";

	return $args;
}

add_filter('loop_shop_per_page', 'avada_loop_shop_per_page');
function avada_loop_shop_per_page()
{
	global $smof_data;

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str($_SERVER['QUERY_STRING'], $params);
	}	

	if($smof_data['woo_items']) {
		$per_page = $smof_data['woo_items'];
	} else {
		$per_page = 12;
	}

	$pc = !empty($params['product_count']) ? $params['product_count'] : $per_page;

	return $pc;
}

add_action('woocommerce_before_shop_loop_item_title', 'avada_woocommerce_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
function avada_woocommerce_thumbnail() {
	global $product, $woocommerce;

	$items_in_cart = array();

	if($woocommerce->cart->get_cart() && is_array($woocommerce->cart->get_cart())) {
		foreach($woocommerce->cart->get_cart() as $cart) {
			$items_in_cart[] = $cart['product_id'];
		}
	}

	$id = get_the_ID();
	$in_cart = in_array($id, $items_in_cart);
	$size = 'shop_catalog';

	$gallery = get_post_meta($id, '_product_image_gallery', true);
	$attachment_image = '';
	if(!empty($gallery)) {
		$gallery = explode(',', $gallery);
		$first_image_id = $gallery[0];
		$attachment_image = wp_get_attachment_image($first_image_id , $size, false, array('class' => 'hover-image'));
	}
	$thumb_image = get_the_post_thumbnail($id , $size);

	if($attachment_image) {
		$classes = 'crossfade-images';
	} else {
		$classes = '';
	}

	echo '<span class="'.$classes.'">';
	echo $attachment_image;
	echo $thumb_image;
	if($in_cart) {
		echo '<span class="cart-loading"><i class="fusionicon-check-square-o"></i></span>';
	} else {
		echo '<span class="cart-loading"><i class="fusionicon-spinner"></i></span>';
	}
	echo '</span>';
}
add_filter('add_to_cart_fragments', 'avada_woocommerce_header_add_to_cart_fragment');
function avada_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
	<li class="cart">
		<?php if(!$woocommerce->cart->cart_contents_count): ?>
		<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><span><?php _e('Cart', 'Avada'); ?></span></a>
		<?php else: ?>
		<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php echo $woocommerce->cart->cart_contents_count; ?> <?php _e('Item(s)', 'Avada'); ?><span class="amount-with-sep"> - <?php echo wc_price($woocommerce->cart->subtotal); ?></span></a>
		<div class="cart-contents">
			<?php foreach($woocommerce->cart->cart_contents as $cart_item): ?>
			<div class="cart-content">
				<a href="<?php echo get_permalink($cart_item['product_id']); ?>">
				<?php $thumbnail_id = ($cart_item['variation_id']) ? $cart_item['variation_id'] : $cart_item['product_id']; ?>
				<?php echo get_the_post_thumbnail($thumbnail_id, 'recent-works-thumbnail'); ?>
				<div class="cart-desc">
					<span class="cart-title"><?php echo $cart_item['data']->post->post_title; ?></span>
					<span class="product-quantity"><span class="quantity-container"><?php echo $cart_item['quantity']; ?> x </span><?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>
				</div>
				</a>
			</div>
			<?php endforeach; ?>
			<div class="cart-checkout">
				<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Avada'); ?></a></div>
				<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><?php _e('Checkout', 'Avada'); ?></a></div>
			</div>
		</div>
		<?php endif; ?>
	</li>
	<?php
	$header_top_cart = ob_get_clean();
	$fragments['.header-wrapper .header-social .top-menu .cart'] = $header_top_cart;
	$fragments['#side-header .top-menu .cart'] = $header_top_cart;

	ob_start();
	?>
	<li class="cart">
		<?php if(!$woocommerce->cart->cart_contents_count): ?>
		<a class="my-cart-link" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>
		<?php else: ?>
		<a class="my-cart-link my-cart-link-active" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>
		<div class="cart-contents">
			<?php foreach($woocommerce->cart->cart_contents as $cart_item): ?>
			<div class="cart-content">
				<a href="<?php echo get_permalink($cart_item['product_id']); ?>">
				<?php $thumbnail_id = ($cart_item['variation_id']) ? $cart_item['variation_id'] : $cart_item['product_id']; ?>
				<?php echo get_the_post_thumbnail($thumbnail_id, 'recent-works-thumbnail'); ?>
				<div class="cart-desc">
					<span class="cart-title"><?php echo $cart_item['data']->post->post_title; ?></span>
					<span class="product-quantity"><span class="quantity-container"><?php echo $cart_item['quantity']; ?> x </span><?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>
				</div>
				</a>
			</div>
			<?php endforeach; ?>
			<div class="cart-checkout">
				<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Avada'); ?></a></div>
				<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><?php _e('Checkout', 'Avada'); ?></a></div>
			</div>
		</div>
		<?php endif; ?>
	</li>
	<?php
	$header_cart = ob_get_clean();
	$fragments['#header .cart'] = $header_cart;
	$fragments['#side-header #nav .cart'] = $header_cart;
	$fragments['#small-nav .cart'] = $header_cart;
	$fragments['#header-sticky .cart'] = str_replace( 'class="my-cart-link', 'style="height:63px;line-height:63px;" class="my-cart-link', $header_cart );

	return $fragments;

}

add_action( 'woocommerce_single_product_summary', 'avada_woocommerce_single_product_summary_open', 1 );
function avada_woocommerce_single_product_summary_open() {
	echo '<div class="summary-container">';
}

add_action( 'woocommerce_single_product_summary', 'avada_woocommerce_single_product_summary_close', 100 );
function avada_woocommerce_single_product_summary_close() {
	echo '</div>';
}

add_action('woocommerce_after_single_product_summary', 'avada_woocommerce_after_single_product_summary', 15);
function avada_woocommerce_after_single_product_summary()
{

	global $smof_data;

	$nofollow = '';
	if($smof_data['nofollow_social_links']) {
		$nofollow = ' rel="nofollow"';
	}
	$social = '<div style="clear:both;"></div>';
	if($smof_data['woocommerce_social_links']) {
		$social .= '<ul class="social-share clearfix">
			<li class="facebook">
				<a href="http://www.facebook.com/sharer.php?s=100&p&#91;url&#93;=' . get_permalink() . '&p&#91;title&#93;=' . wp_strip_all_tags(get_the_title(), true) .'" target="_blank"' . $nofollow .'>
					<i class="fontawesome-icon medium circle-yes fusionicon-facebook"></i>
					<span>' . __('Share On', 'Avada') .'</span>Facebook
				</a>
			</li>
			<li class="twitter">
				<a href="https://twitter.com/share?text=' . wp_strip_all_tags(get_the_title(), true) .' ' . get_permalink() . '" target="_blank"' . $nofollow .'>
					<i class="fontawesome-icon medium circle-yes fusionicon-twitter"></i>
					<span>' . __('Tweet This', 'Avada') . '</span>' . __('Product', 'Avada') . '
				</a>
			</li>
			<li class="pinterest">';
				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$social .= '<a href="http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . urlencode(wp_strip_all_tags(get_the_title(), true)) . '&amp;media=' . urlencode($full_image[0]) .'" target="_blank"' . $nofollow .'>
					<i class="fontawesome-icon medium circle-yes fusionicon-pinterest"></i>
					<span>' . __('Pin This', 'Avada') . '</span>' . __('Product', 'Avada') . '
				</a>
			</li>
			<li class="email">
				<a href="mailto:?subject=' . wp_strip_all_tags(get_the_title(), true) . '&amp;body=' . get_permalink() . '" target="_blank"' . $nofollow .'>
					<i class="fontawesome-icon medium circle-yes fusionicon-mail"></i>
					<span>' . __('Mail This', 'Avada') . '</span>' . __('Product', 'Avada') .'
				</a>
			</li>
		</ul>';

	echo $social;
	}
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action('woocommerce_after_single_product_summary', 'avada_woocommerce_output_related_products', 15);
function avada_woocommerce_output_related_products()
{
		global $post, $smof_data;
		
		if( get_post_meta($post->ID, 'pyre_number_of_related_products', true) == 'default' || 
			get_post_meta($post->ID, 'pyre_number_of_related_products', true) == ''  || 
			! get_post_meta($post->ID, 'pyre_number_of_related_products', true) 
		) {
			$number_of_columns = $smof_data['woocommerce_related_columns'];
		} else {
			$number_of_columns = get_post_meta($post->ID, 'pyre_number_of_related_products', true);
		}
		
		$args = array(
			'posts_per_page' => $number_of_columns,
			'columns' => $number_of_columns,
			'orderby' => 'rand'
		);

		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action('woocommerce_after_single_product_summary', 'avada_woocommerce_upsell_display', 10);
function avada_woocommerce_upsell_display()
{
		global $product, $woocommerce_loop, $post, $smof_data;
		
		$upsells = $product->get_upsells();
		
		if ( sizeof( $upsells ) == 0 ) return;
		
		if( get_post_meta($post->ID, 'pyre_number_of_related_products', true) == 'default' || 
			get_post_meta($post->ID, 'pyre_number_of_related_products', true) == ''  || 
			! get_post_meta($post->ID, 'pyre_number_of_related_products', true) 
		) {
			$number_of_columns = $smof_data['woocommerce_related_columns'];
		} else {
			$number_of_columns = get_post_meta($post->ID, 'pyre_number_of_related_products', true);
		}
		
		woocommerce_upsell_display( -1, $number_of_columns );
}

/* variations hooks */


/* end variations hooks */

/* cart hooks */
add_action('woocommerce_before_cart_table', 'avada_woocommerce_before_cart_table', 20);
function avada_woocommerce_before_cart_table( $args )
{
	global $woocommerce;

	$html = '<div class="woocommerce-content-box full-width clearfix">';

	$html .= '<h2>' . sprintf( __( 'You Have %d Items In Your Cart', 'Avada' ), $woocommerce->cart->cart_contents_count ) . '</h2>';

	echo $html;
}

add_action('woocommerce_after_cart_table', 'avada_woocommerce_after_cart_table', 20);
function avada_woocommerce_after_cart_table($args)
{
	$html = '</div>';

	echo $html;
}

function woocommerce_cross_sell_display( $posts_per_page = 3, $columns = 3, $orderby = 'rand' ) {
	wc_get_template( 'cart/cross-sells.php', array(
			'posts_per_page' => $posts_per_page,
			'orderby'		=> $orderby,
			'columns'		=> $columns
		) );
}

function cart_shipping_calc() {
	// Move this code to ~/woocommerce/cart/shipping-calculator.php and move the hook call accordingly.

	global $woocommerce, $smof_data;

	if ( get_option( 'woocommerce_enable_shipping_calc' ) === 'no' ||  ! WC()->cart->needs_shipping() ) {
		return;
	}
	?>

	<?php do_action( 'woocommerce_before_shipping_calculator' ); ?>

	<div class="shipping_calculator" action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

		<h2><a href="#" class="shipping-calculator-button"><?php _e( 'Calculate Shipping', 'woocommerce' ); ?></a></h2>

		<div class="avada-shipping-calculator-form">

			<p class="form-row form-row-wide">
				<select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state">
					<option value=""><?php _e( 'Select a country&hellip;', 'woocommerce' ); ?></option>
					<?php
						foreach( WC()->countries->get_shipping_countries() as $key => $value )
							echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
					?>
				</select>
			</p>

			<p class="<?php if( ! $smof_data['avada_styles_dropdowns'] ): ?>avada-select-parent<?php endif; ?>">
				<?php
					$current_cc = WC()->customer->get_shipping_country();
					$current_r  = WC()->customer->get_shipping_state();
					$states	 = WC()->countries->get_states( $current_cc );

					// Hidden Input
					if ( is_array( $states ) && empty( $states ) ) {

						?><input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>" /><?php

					// Dropdown Input
					} elseif ( is_array( $states ) ) {

						?><span>
							<select name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>">
								<option value=""><?php _e( 'Select a state&hellip;', 'woocommerce' ); ?></option>
								<?php
									foreach ( $states as $ckey => $cvalue )
										echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . __( esc_html( $cvalue ), 'woocommerce' ) .'</option>';
								?>
							</select>
						</span><?php

					// Standard Input
					} else {

						?><input type="text" class="input-text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>" name="calc_shipping_state" id="calc_shipping_state" /><?php

					}
				?>
			</p>

			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', false ) ) : ?>

				<p class="form-row form-row-wide">
					<input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_city() ); ?>" placeholder="<?php _e( 'City', 'woocommerce' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
				</p>

			<?php endif; ?>

			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>

				<p class="form-row form-row-wide">
					<input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_postcode() ); ?>" placeholder="<?php _e( 'Postcode / Zip', 'woocommerce' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
				</p>

			<?php endif; ?>

			<p><button type="submit" name="calc_shipping" value="1" class="fusion-button button-default button-small button default small"><?php _e( 'Update Totals', 'woocommerce' ); ?></button></p>

			<?php wp_nonce_field( 'woocommerce-cart' ); ?>
		</div>
	</div>

	<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>

	<?php
}

add_action('woocommerce_cart_collaterals', 'avada_woocommerce_cart_collaterals');
function avada_woocommerce_cart_collaterals($args)
{
	global $woocommerce;
	?>

	<div class="shipping-coupon">

	<?php echo cart_shipping_calc();

	if ( WC()->cart->coupons_enabled() ) { ?>
		<div class="coupon">

			<h2><?php _e( 'Have A Promotional Code?', 'Avada'); ?></h2>

			<input name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" />
			<input type="submit" class="fusion-button button-default button-small button default small" name="apply_coupon" value="<?php _e( 'Apply', 'Avada' ); ?>" />

			<?php do_action('woocommerce_cart_coupon'); ?>

		</div>
		<?php
	}
	?>
	</div>
	<?php
}

add_action('woocommerce_before_cart_totals', 'avada_woocommerce_before_cart_totals', 20);
function avada_woocommerce_before_cart_totals($args)
{
	global $woocommerce; ?>

	<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

	<?php
}

add_action('woocommerce_after_cart', 'avada_woocommerce_after_cart');
function avada_woocommerce_after_cart($args)
{
	?>

	</form>

	<?php
}

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_cart_collaterals', 'avada_woocommerce_cross_sell_display', 5 );
function avada_woocommerce_cross_sell_display()
{
		global $product, $woocommerce_loop, $post, $smof_data;
		
		$crosssells = WC()->cart->get_cross_sells();

		if ( sizeof( $crosssells ) == 0 ) return;
		
		$number_of_columns = $smof_data['woocommerce_related_columns'];
		
		woocommerce_cross_sell_display( apply_filters( 'woocommerce_cross_sells_total', -1 ), $number_of_columns );
}

/* end cart hooks */

/* begin checkout hooks */
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_before_checkout_form', 'avada_woocommerce_checkout_coupon_form', 10 );
function avada_woocommerce_checkout_coupon_form($args)
{
	global $woocommerce;

	if ( ! WC()->cart->coupons_enabled() )
		return;
	?>

	<form class="woocommerce-content-box full-width checkout_coupon" method="post">

		<h2 class="promo-code-heading alignleft"><?php _e( 'Have A Promotional Code?', 'Avada'); ?></h2>

		<div class="coupon-contents alignright">
			<div class="form-row form-row-first alignleft coupon-input">
				<input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
			</div>

			<div class="form-row form-row-last alignleft coupon-button">
				<input type="submit" class="fusion-button button-default button-small button default small" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
			</div>

			<div class="clear"></div>
		</div>
	</form>
	<?php
}

if( ! $smof_data['woocommerce_one_page_checkout'] ) {
	add_action('woocommerce_before_checkout_form', 'avada_woocommerce_before_checkout_form');
}
function avada_woocommerce_before_checkout_form($args)
{
	global $woocommerce;
	?>

	<ul class="woocommerce-side-nav woocommerce-checkout-nav">
		<li class="active">
			<a data-name="col-1" href="#">
				<?php _e('Billing Address' , 'Avada'); ?>
			</a>
		</li>
		<?php if ( WC()->cart->needs_shipping() && ! WC()->cart->ship_to_billing_address_only() ) : ?>
		<li>
			<a data-name="col-2" href="#">
				<?php _e('Shipping Address' , 'Avada'); ?>
			</a>
		</li>
		<?php elseif( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) :

		if ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() ) : ?>

		<li>
			<a data-name="col-2" href="#">
				<?php _e('Additional Information' , 'Avada'); ?>
			</a>
		</li>
		<?php endif; ?>
		<?php endif; ?>

		<li>
			<a data-name="#order_review" href="#">
				<?php _e('Review &amp; Payment' , 'Avada'); ?>
			</a>
		</li>
	</ul>

	<div class="woocommerce-content-box avada-checkout">

	<?php

}

if( ! $smof_data['woocommerce_one_page_checkout'] ) {
	add_action('woocommerce_after_checkout_form', 'avada_woocommerce_after_checkout_form');
}
function avada_woocommerce_after_checkout_form($args)
{
	?>

	</div>

	<?php

}

if( $smof_data['woocommerce_one_page_checkout'] ) {
	add_action('woocommerce_checkout_before_customer_details', 'avada_woocommerce_checkout_before_customer_details');
}
function avada_woocommerce_checkout_before_customer_details($args)
{
	global $smof_data, $woocommerce;

	if ( WC()->cart->needs_shipping() && ! WC()->cart->ship_to_billing_address_only() ||
			   apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) && ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() )
	) {
		return;
	} else {
	?>

	<div class="avada-checkout-no-shipping">

	<?php
	}

}

if( $smof_data['woocommerce_one_page_checkout'] ) {
	add_action('woocommerce_checkout_after_customer_details', 'avada_woocommerce_checkout_after_customer_details');
}
function avada_woocommerce_checkout_after_customer_details($args)
{
	global $smof_data, $woocommerce;

	if ( WC()->cart->needs_shipping() && ! WC()->cart->ship_to_billing_address_only() ||
			   apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) && ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() )
	) {
	?>

	<div class="clearboth"></div>

	<?php } else { ?>

	<div class="clearboth"></div>
	</div>

	<?php } ?>

	<div class="woocommerce-content-box full-width">

	<?php
}


add_action('woocommerce_checkout_billing', 'avada_woocommerce_checkout_billing', 20);
function avada_woocommerce_checkout_billing($args)
{
	global $smof_data, $woocommerce;

	if ( WC()->cart->needs_shipping() && ! WC()->cart->ship_to_billing_address_only() ||
			   apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) && ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() )
	) {
		$data_name = 'col-2';
	} else {
		$data_name = '#order_review';
	}

	if( ! $smof_data['woocommerce_one_page_checkout'] ) {
	?>

	<a data-name="<?php echo $data_name; ?>" href="#" class="fusion-button button-default button-medium  button default medium continue-checkout"><?php _e('Continue', 'Avada'); ?></a>
	<div class="clearboth"></div>

	<?php
	}

}

add_action('woocommerce_checkout_shipping', 'avada_woocommerce_checkout_shipping', 20);
function avada_woocommerce_checkout_shipping($args)
{
	global $smof_data;

	if( ! $smof_data['woocommerce_one_page_checkout'] ) {
	?>

	<a data-name="#order_review" href="#" class="fusion-button button-default button-medium continue-checkout button default medium"><?php _e('Continue', 'Avada'); ?></a>
	<div class="clearboth"></div>

	<?php
	}

}


add_filter('woocommerce_enable_order_notes_field', 'avada_enable_order_notes_field');
function avada_enable_order_notes_field() {
	global $smof_data;

	if( ! $smof_data['woocommerce_enable_order_notes'] ) {
		return 0;
	}

	return 1;

}

//function under myaccount hooks
remove_action('woocommerce_thankyou', 'woocommerce_order_details_table', 10);
add_action('woocommerce_thankyou', 'avada_woocommerce_view_order', 10);
/* end checkout hooks */

/* begin my-account hooks */
add_action('woocommerce_before_customer_login_form', 'avada_woocommerce_before_customer_login_form');
function avada_woocommerce_before_customer_login_form()
{

	global $woocommerce;

	if ( get_option( 'woocommerce_enable_myaccount_registration' ) !== 'yes' ) :
	?>

	<div id="customer_login" class="woocommerce-content-box full-width">

	<?php
	endif;
}

add_action('woocommerce_after_customer_login_form', 'avada_woocommerce_after_customer_login_form');
function avada_woocommerce_after_customer_login_form()
{

	global $woocommerce;

	if ( get_option( 'woocommerce_enable_myaccount_registration' ) !== 'yes' ) :
	?>

	</div>

	<?php
	endif;
}

add_action('woocommerce_before_my_account', 'avada_woocommerce_before_my_account');
function avada_woocommerce_before_my_account( $order_count, $edit_address = false)
{
	global $smof_data, $woocommerce, $current_user;
	$edit_address = is_wc_endpoint_url('edit-address');
	?>
	<p class="avada_myaccount_user">
		<span class="myaccount_user_container">
			<span class="username">
			<?php
			printf(
				__( 'Hello, %s:', 'Avada' ),
				$current_user->display_name
			);
			?>
			</span>
			<?php if($smof_data['woo_acc_msg_1']): ?>
			<span class="msg">
				<?php echo $smof_data['woo_acc_msg_1']; ?>
			</span>
			<?php endif; ?>
			<?php if($smof_data['woo_acc_msg_2']): ?>
			<span class="msg">
				<?php echo $smof_data['woo_acc_msg_2']; ?>
			</span>
			<?php endif; ?>
			<span class="view-cart">
				<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Avada' ); ?></a>
			</span>
		</span>
	</p>

	<ul class="woocommerce-side-nav avada-myaccount-nav">
		<?php if( $downloads = WC()->customer->get_downloadable_products() ) : ?>
		<li <?php if( ! $edit_address ) { echo 'class="active"'; } ?>>
			<a class="downloads" href="#">
				<?php _e('View Downloads' , 'Avada' ); ?>
			</a>
		</li>
		<?php endif;
		
		if( function_exists( 'wc_get_order_types' ) && function_exists( 'wc_get_order_statuses' ) ) {
			$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
				'numberposts' => $order_count,
				'meta_key'    => '_customer_user',
				'meta_value'  => get_current_user_id(),
				'post_type'   => wc_get_order_types( 'view-orders' ),
				'post_status' => array_keys( wc_get_order_statuses() )
			) ) );
		} else {
			$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
				'numberposts' => $order_count,
				'meta_key'	=> '_customer_user',
				'meta_value'  => get_current_user_id(),
				'post_type'   => 'shop_order',
				'post_status' => 'publish'
			) ) );
		}

		if ( $customer_orders ) : ?>
		<li <?php if( ! $edit_address && ! WC()->customer->get_downloadable_products() ) { echo 'class="active"'; } ?>>
			<a class="orders" href="#">
				<?php _e('View Orders' , 'Avada' ); ?>
			</a>
		</li>
		<?php endif; ?>
		<li <?php if( $edit_address || ! WC()->customer->get_downloadable_products() && ! $customer_orders ) { echo 'class="active"'; } ?>>
			<a class="address" href="#">
				<?php _e('Change Address' , 'Avada' ); ?>
			</a>
		</li>
		<li>
			<a class="account" href="#">
				<?php _e('Edit Account' , 'Avada' ); ?>
			</a>
		</li>
	</ul>

	<div class="woocommerce-content-box avada-myaccount-data">

	<?php
}

add_action('woocommerce_after_my_account', 'avada_woocommerce_after_my_account');
function avada_woocommerce_after_my_account($args)
{
	global $woocommerce, $wp;

	$user = wp_get_current_user();

	?>

	<h2 class="edit-account-heading"><?php _e( 'Edit Account', 'Avada' ); ?></h2>

	<form class="edit-account-form" action="" method="post">
		<p class="form-row form-row-first">
			<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="account_first_name" id="account_first_name" value="<?php esc_attr_e( $user->first_name ); ?>" />
		</p>
		<p class="form-row form-row-last">
			<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="account_last_name" id="account_last_name" value="<?php esc_attr_e( $user->last_name ); ?>" />
		</p>
		<p class="form-row form-row-wide">
			<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="email" class="input-text" name="account_email" id="account_email" value="<?php esc_attr_e( $user->user_email ); ?>" />
		</p>
		<p class="form-row form-row-thirds">
			<label for="password_current"><?php _e( 'Current Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="input-text" name="password_current" id="password_current" />
		</p>
		<p class="form-row form-row-thirds">
			<label for="password_1"><?php _e( 'New Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="input-text" name="password_1" id="password_1" />
		</p>
		<p class="form-row form-row-thirds">
			<label for="password_2"><?php _e( 'Confirm New Password', 'woocommerce' ); ?></label>
			<input type="password" class="input-text" name="password_2" id="password_2" />
		</p>
		<div class="clear"></div>

		<p><input type="submit" class="fusion-button button-default button-medium button default medium alignright" name="save_account_details" value="<?php _e( 'Save changes', 'woocommerce' ); ?>" /></p>

		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="hidden" name="action" value="save_account_details" />
		<div class="clearboth"></div>
	</form>

	</div>

	<?php

}
/* end my-account hooks */

/* begin order hooks */
remove_action('woocommerce_view_order', 'woocommerce_order_details_table', 10);
add_action('woocommerce_view_order', 'avada_woocommerce_view_order', 10);
function avada_woocommerce_view_order( $order_id  )
{
	global $woocommerce;

	$order = new WC_Order( $order_id );

	?>
	<div class="avada-order-details woocommerce-content-box full-width">
	<h2><?php _e( 'Order Details', 'woocommerce' ); ?></h2>
	<table class="shop_table order_details">
		<thead>
			<tr>
				<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
				<th class="product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead>
		<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) foreach ( $totals as $total ) :
				?>
				<tr>
					<td class="filler-td">&nbsp;</td>
					<th scope="row"><?php echo $total['label']; ?></th>
					<td class="product-total"><?php echo $total['value']; ?></td>
				</tr>
				<?php
			endforeach;
		?>
		</tfoot>
		<tbody>
			<?php
			if ( sizeof( $order->get_items() ) > 0 ) {

				foreach( $order->get_items() as $item ) {
					$_product	 = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
					$item_meta	= new WC_Order_Item_Meta( $item['item_meta'] );

					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
						<td class="product-name">
							<span class="product-thumbnail">
								<?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image() );

									if ( ! $_product->is_visible() )
										echo $thumbnail;
									else
										printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
								?>
							</span>
							<div class="product-info">
							<?php
								if ( $_product && ! $_product->is_visible() )
									echo apply_filters( 'woocommerce_order_item_name', $item['name'], $item );
								else
									echo apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item );

								$item_meta->display();

								if ( $_product && $_product->exists() && $_product->is_downloadable() && $order->is_download_permitted() ) {

									$download_files = $order->get_item_downloads( $item );
									$i			  = 0;
									$links		  = array();

									foreach ( $download_files as $download_id => $file ) {
										$i++;

										$links[] = '<small><a href="' . esc_url( $file['download_url'] ) . '">' . sprintf( __( 'Download file%s', 'woocommerce' ), ( count( $download_files ) > 1 ? ' ' . $i . ': ' : ': ' ) ) . esc_html( $file['name'] ) . '</a></small>';
									}

									echo '<br/>' . implode( '<br/>', $links );
								}
							?>
							</div>
						</td>
						<td class="product-quantity">
							<?php echo apply_filters( 'woocommerce_order_item_quantity_html', $item['qty'], $item ); ?>
						</td>
						<td class="product-total">
							<?php echo $order->get_formatted_line_subtotal( $item ); ?>
						</td>
					</tr>
					<?php

					if ( in_array( $order->status, array( 'processing', 'completed' ) ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) ) ) {
						?>
						<tr class="product-purchase-note">
							<td colspan="3"><?php echo apply_filters( 'the_content', $purchase_note ); ?></td>
						</tr>
						<?php
					}
				}
			}

			do_action( 'woocommerce_order_items_table', $order );
			?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
	</div>

	<div class="avada-customer-details woocommerce-content-box full-width">
	<header>
		<h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
	</header>
	<dl class="customer_details">
	<?php
		if ( $order->billing_email ) echo '<dt>' . __( 'Email:', 'woocommerce' ) . '</dt> <dd>' . $order->billing_email . '</dd><br />';
		if ( $order->billing_phone ) echo '<dt>' . __( 'Telephone:', 'woocommerce' ) . '</dt> <dd>' . $order->billing_phone . '</dd>';

		// Additional customer details hook
		do_action( 'woocommerce_order_details_after_customer_details', $order );
	?>
	</dl>

	<?php if ( get_option( 'woocommerce_ship_to_billing_address_only' ) === 'no' && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

	<div class="col2-set addresses">

		<div class="col-1">

	<?php endif; ?>

			<header class="title">
				<h3><?php _e( 'Billing Address', 'woocommerce' ); ?></h3>
			</header>
			<address><p>
				<?php
					if ( ! $order->get_formatted_billing_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_billing_address();
				?>
			</p></address>

	<?php if ( get_option( 'woocommerce_ship_to_billing_address_only' ) === 'no' && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

		</div><!-- /.col-1 -->

		<div class="col-2">

			<header class="title">
				<h3><?php _e( 'Shipping Address', 'woocommerce' ); ?></h3>
			</header>
			<address><p>
				<?php
					if ( ! $order->get_formatted_shipping_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_shipping_address();
				?>
			</p></address>

		</div><!-- /.col-2 -->

	</div><!-- /.col2-set -->

	<?php endif; ?>

	<div class="clear"></div>

	</div>

	<?php
}
/* end order hooks */