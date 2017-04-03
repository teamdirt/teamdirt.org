<?php
/**
 * Fusion Framework
 *
 * WARNING: This file is part of the Fusion Core Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 *
 * @version: 1.0.0
 * @package  Fusion/Template
 * @author   ThemeFusion
 * @link	 http://theme-fusion.com
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'wp_nav_menu_item_custom_fields', 'avada_add_megamenu_fields', 10, 4 );
function avada_add_megamenu_fields( $item_id, $item, $depth, $args ) { ?>
	<div class="clear"></div>
	<div class="fusion-mega-menu-options">
		<p class="field-megamenu-status description description-wide">
			<label for="edit-menu-item-megamenu-status-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-status-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-status" name="menu-item-fusion-megamenu-status[<?php echo $item_id; ?>]" value="enabled" <?php checked( $item->fusion_megamenu_status, 'enabled' ); ?> />
				<strong><?php _e( 'Enable Fusion Mega Menu (only for main menu)', 'Avada' ); ?></strong>
			</label>
		</p>
		<p class="field-megamenu-width description description-wide">
			<label for="edit-menu-item-megamenu-width-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-width-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-width" name="menu-item-fusion-megamenu-width[<?php echo $item_id; ?>]" value="fullwidth" <?php checked( $item->fusion_megamenu_width, 'fullwidth' ); ?> />
				<?php _e( 'Full Width Mega Menu (overrides column width)', 'Avada' ); ?>
			</label>
		</p>
		<p class="field-megamenu-columns description description-wide">
			<label for="edit-menu-item-megamenu-columns-<?php echo $item_id; ?>">
				<?php _e( 'Mega Menu Number of Columns', 'Avada' ); ?>
				<select id="edit-menu-item-megamenu-columns-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-columns" name="menu-item-fusion-megamenu-columns[<?php echo $item_id; ?>]">
					<option value="auto" <?php selected( $item->fusion_megamenu_columns, 'auto' ); ?>><?php _e( 'Auto', 'Avada' ); ?></option>
					<option value="1" <?php selected( $item->fusion_megamenu_columns, '1' ); ?>>1</option>
					<option value="2" <?php selected( $item->fusion_megamenu_columns, '2' ); ?>>2</option>
					<option value="3" <?php selected( $item->fusion_megamenu_columns, '3' ); ?>>3</option>
					<option value="4" <?php selected( $item->fusion_megamenu_columns, '4' ); ?>>4</option>
					<option value="5" <?php selected( $item->fusion_megamenu_columns, '5' ); ?>>5</option>
					<option value="6" <?php selected( $item->fusion_megamenu_columns, '6' ); ?>>6</option>
				</select>
			</label>
		</p>
		<p class="field-megamenu-columnwidth description description-wide">
			<label for="edit-menu-item-megamenu-columnwidth-<?php echo $item_id; ?>">
				<?php _e( 'Mega Menu Column Width (in percentage, ex: 30%)', 'Avada' ); ?>
				<input type="text" id="edit-menu-item-megamenu-columnwidth-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-columnwidth" name="menu-item-fusion-megamenu-columnwidth[<?php echo $item_id; ?>]" value="<?php echo $item->fusion_megamenu_columnwidth; ?>" />
			</label>
		</p>		
		<p class="field-megamenu-title description description-wide">
			<label for="edit-menu-item-megamenu-title-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-title-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-title" name="menu-item-fusion-megamenu-title[<?php echo $item_id; ?>]" value="disabled" <?php checked( $item->fusion_megamenu_title, 'disabled' ); ?> />
				<?php _e( 'Disable Mega Menu Column Title', 'Avada' ); ?>
			</label>
		</p>
		<p class="field-megamenu-widgetarea description description-wide">
			<label for="edit-menu-item-megamenu-widgetarea-<?php echo $item_id; ?>">
				<?php _e( 'Mega Menu Widget Area', 'Avada' ); ?>
				<select id="edit-menu-item-megamenu-widgetarea-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-widgetarea" name="menu-item-fusion-megamenu-widgetarea[<?php echo $item_id; ?>]">
					<option value="0"><?php _e( 'Select Widget Area', 'Avada' ); ?></option>
					<?php
					global $wp_registered_sidebars;
					if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ):
					foreach( $wp_registered_sidebars as $sidebar ):
					?>
					<option value="<?php echo $sidebar['id']; ?>" <?php selected( $item->fusion_megamenu_widgetarea, $sidebar['id'] ); ?>><?php echo $sidebar['name']; ?></option>
					<?php endforeach; endif; ?>
				</select>
			</label>
		</p>
		<p class="field-megamenu-icon description description-wide">
			<label for="edit-menu-item-megamenu-icon-<?php echo $item_id; ?>">
				<?php _e( 'Mega Menu Icon (use full font awesome name)', 'Avada' ); ?>
				<input type="text" id="edit-menu-item-megamenu-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-icon" name="menu-item-fusion-megamenu-icon[<?php echo $item_id; ?>]" value="<?php echo $item->fusion_megamenu_icon; ?>" />
			</label>
		</p>
		<a href="#" id="fusion-media-upload-<?php echo $item_id; ?>" class="fusion-open-media button button-primary fusion-megamenu-upload-thumbnail"><?php _e( 'Set Thumbnail', 'Avada' ); ?></a>
		<p class="field-megamenu-thumbnail description description-wide">
			<label for="edit-menu-item-megamenu-thumbnail-<?php echo $item_id; ?>">
				<input type="hidden" id="edit-menu-item-megamenu-thumbnail-<?php echo $item_id; ?>" class="fusion-new-media-image widefat code edit-menu-item-megamenu-thumbnail" name="menu-item-fusion-megamenu-thumbnail[<?php echo $item_id; ?>]" value="<?php echo $item->fusion_megamenu_thumbnail; ?>" />
				<img src="<?php echo $item->fusion_megamenu_thumbnail; ?>" id="fusion-media-img-<?php echo $item_id; ?>" class="fusion-megamenu-thumbnail-image" style="<?php echo ( trim( $item->fusion_megamenu_thumbnail ) ) ? 'display: inline;' : '';?>" />
				<a href="#" id="fusion-media-remove-<?php echo $item_id; ?>" class="remove-fusion-megamenu-thumbnail" style="<?php echo ( trim( $item->fusion_megamenu_thumbnail ) ) ? 'display: inline;' : '';?>">Remove Image</a>
			</label>
		</p>
	</div><!-- .fusion-mega-menu-options-->
<?php }

// Dont duplicate me!
if( ! class_exists( 'FusionCoreFrontendWalker' ) ) {
	class FusionCoreFrontendWalker extends Walker_Nav_Menu {

		/**
		 * @var string $menu_megamenu_status are we currently rendering a mega menu?
		 */
		private $menu_megamenu_status = "";

		/**
		 * @var string $menu_megamenu_width use full width mega menu?
		 */
		private $menu_megamenu_width = "";

		/**
		 * @var int $num_of_columns how many columns should the mega menu have?
		 */
		private $num_of_columns = 0;

		/**
		 * @var int $max_num_of_columns mega menu allow for 6 columns at max
		 */
		private $max_num_of_columns = 6;

		/**
		 * @var int $total_num_of_columns total number of columns for a single megamenu?
		 */
		private $total_num_of_columns = 0;

		/**
		 * @var int $num_of_rows number of rows in the mega menu
		 */
		private $num_of_rows = 1;

		/**
		 * @var array $submenu_matrix holds number of columns per row
		 */
		private $submenu_matrix = array();

		/**
		 * @var float $menu_megamenu_columnwidth how large is the width of a column?
		 */
		private $menu_megamenu_columnwidth = 0;
		
		/**
		 * @var array $menu_megamenu_rowwidth_matrix how large is the width of each row?
		 */
		private $menu_megamenu_rowwidth_matrix = array();	

		/**
		 * @var float $menu_megamenu_maxwidth how large is the overall width of a column?
		 */
		private $menu_megamenu_maxwidth = 0;

		/**
		 * @var string $menu_megamenu_title should a colum title be displayed?
		 */
		private $menu_megamenu_title = '';

		/**
		 * @var string $menu_megamenu_widget_area should one column be a widget area?
		 */
		private $menu_megamenu_widget_area = '';

		/**
		 * @var string $menu_megamenu_icon does the item have an icon?
		 */
		private $menu_megamenu_icon = '';

		/**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		private $menu_megamenu_thumbnail = '';

		/**
		 * Sets the overall width of the megamenu wrappers
		 *
		 */
		private function set_megamenu_max_width() {
			global $smof_data;
		
			// set overall width of megamenu
			$site_width = (int) str_replace( 'px', '', $smof_data['site_width'] );
			$megamenu_max_width = (int) str_replace( 'px', '', $smof_data['megamenu_max_width'] );
			$megmanu_width = 0;

			if( strpos( $smof_data['site_width'], 'px' ) !== false ) {
				if( $site_width > $megamenu_max_width ) {
					$megamenu_width = $megamenu_max_width;	
				} else {
					$megamenu_width = $site_width;
				}
			} else {
				$megamenu_width = $megamenu_max_width;
			}
			$this->menu_megamenu_maxwidth = $megamenu_width;
		}

		/**
		 * @see Walker::start_lvl()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );

			if( $depth === 0 && $this->menu_megamenu_status == "enabled" ) {
				// set overall width of megamenu				
				if( ! $this->menu_megamenu_maxwidth ) {
					$this->set_megamenu_max_width();
				}
				
				$output .= "\n{first_level}\n";
				$output .= "\n$indent<div class=\"fusion-megamenu-holder\" {megamenu_final_width}>\n<ul class='fusion-megamenu {megamenu_border}'>\n";
			} elseif( $depth >= 2 && $this->menu_megamenu_status == "enabled" ) {
				$output .= "\n$indent<ul class=\"sub-menu deep-level\">\n";
			} else {
				$output .= "\n$indent<ul class=\"sub-menu\">\n";
			}
		}

		/**
		 * @see Walker::end_lvl()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			global $smof_data;
		
			$indent = str_repeat( "\t", $depth );
			$row_width = '';

			if( $depth === 0  && $this->menu_megamenu_status == "enabled" ) {

				$output .= "\n</ul>\n</div><div style='clear:both;'></div>\n</div>\n</div>\n";

				if( $this->total_num_of_columns < $this->max_num_of_columns ) {
					$col_span = " col-span-" . $this->total_num_of_columns * 2;
				} else {
					$col_span = " col-span-" . $this->max_num_of_columns * 2;
				}

				if ( $this->menu_megamenu_width == "fullwidth" ) {
					$col_span = " col-span-12 fusion-megamenu-fullwidth";
					// overall megamenu wrapper width in px is max width for fullwidth megamenu
					$wrapper_width = $this->menu_megamenu_maxwidth;
				} else {
					// calc overall megamenu wrapper width in px
					$wrapper_width = max( $this->menu_megamenu_rowwidth_matrix ) * $this->menu_megamenu_maxwidth;
				}

				$output = str_replace( "{first_level}", "<div class='fusion-megamenu-wrapper {fusion_columns} columns-".$this->total_num_of_columns . $col_span . "' data-maxwidth='" . $this->menu_megamenu_maxwidth . "'><div class='row'>", $output );
				
				$output = str_replace( "{megamenu_final_width}", sprintf( 'style="width:%spx;" data-width="%s"', $wrapper_width, $wrapper_width ), $output );
				
				if ( $this->total_num_of_columns > $this->max_num_of_columns ) {
					$output = str_replace( "{megamenu_border}","fusion-megamenu-border", $output );
				} else {
					$output = str_replace( "{megamenu_border}","", $output );
				}

				foreach($this->submenu_matrix as $row => $columns) {
					$layout_columns = 12 / $columns;
					if( $columns == '5' ) {
						$layout_columns = 2;
					}

					if( $columns < $this->max_num_of_columns ) {
						$row_width = "style=\"width:" . $columns / $this->max_num_of_columns * 100 . "%!important;\"";
					}

					$output = str_replace( "{row_width_".$row."}", $row_width, $output);

					if( ( $row - 1 ) * $this->max_num_of_columns + $columns < $this->total_num_of_columns ) {
						$output = str_replace( "{row_number_".$row."}", "fusion-megamenu-row-columns-" . $columns . " fusion-megamenu-border", $output);
					} else {
						$output = str_replace( "{row_number_".$row."}", "fusion-megamenu-row-columns-" . $columns, $output);
					}
					$output = str_replace( "{current_row_".$row."}", "fusion-megamenu-columns-".$columns." col-lg-" . $layout_columns . " col-md-" . $layout_columns . " col-sm-" . $layout_columns, $output );
					
					$output = str_replace( "{fusion_columns}", sprintf( 'fusion-columns-%s columns-per-row-%s', $columns, $columns ), $output );
				}
			} else {
				$output .= "$indent</ul>\n";
			}
		}

		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $smof_data;

			$item_output = $class_columns = '';
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			/* set some vars */
			if( $depth === 0 ) {

				$this->menu_megamenu_status = get_post_meta( $item->ID, '_menu_item_fusion_megamenu_status', true );
				$this->menu_megamenu_width = get_post_meta( $item->ID, '_menu_item_fusion_megamenu_width', true);
				$allowed_columns = get_post_meta( $item->ID, '_menu_item_fusion_megamenu_columns', true );
				if( $allowed_columns != "auto" ) {
					$this->max_num_of_columns = $allowed_columns;
				}
				$this->num_of_columns = $this->total_num_of_columns = 0;
				$this->num_of_rows = 1;
				$this->menu_megamenu_rowwidth_matrix = array();
				$this->menu_megamenu_rowwidth_matrix[$this->num_of_rows] = 0;
			}

			$this->menu_megamenu_title = get_post_meta( $item->ID, '_menu_item_fusion_megamenu_title', true);
			$this->menu_megamenu_widgetarea = get_post_meta( $item->ID, '_menu_item_fusion_megamenu_widgetarea', true);
			$this->menu_megamenu_icon = get_post_meta( $item->ID, '_menu_item_fusion_megamenu_icon', true);
			$this->menu_megamenu_thumbnail = get_post_meta( $item->ID, '_menu_item_fusion_megamenu_thumbnail', true);

			/* we are inside a mega menu */
			if( $depth === 1 && $this->menu_megamenu_status == "enabled" ) {
			
				if( get_post_meta( $item->ID, '_menu_item_fusion_megamenu_columnwidth', true) ) {
					$this->menu_megamenu_columnwidth = get_post_meta( $item->ID, '_menu_item_fusion_megamenu_columnwidth', true);
				} else {
					if ( $this->menu_megamenu_width == "fullwidth" ) {
						$this->menu_megamenu_columnwidth = 100 / $this->max_num_of_columns . '%';
					} else {
						$this->menu_megamenu_columnwidth = '16.6666%';
					}
				}

				$this->num_of_columns++;
				$this->total_num_of_columns++;

				/* check if we need to start a new row */
				if( $this->num_of_columns > $this->max_num_of_columns ) {
					$this->num_of_columns = 1;
					$this->num_of_rows++;
					
					// start new row width calculation
					$this->menu_megamenu_rowwidth_matrix[$this->num_of_rows] =  floatval( $this->menu_megamenu_columnwidth ) / 100;
					
					$output .= "\n</ul>\n<ul class=\"fusion-megamenu fusion-megamenu-row-".$this->num_of_rows." {row_number_".$this->num_of_rows."}\" {row_width_".$this->num_of_rows."}>\n";
				} else {
					$this->menu_megamenu_rowwidth_matrix[$this->num_of_rows] +=  floatval( $this->menu_megamenu_columnwidth ) / 100;
				}

				$this->submenu_matrix[$this->num_of_rows] = $this->num_of_columns;

				if( $this->max_num_of_columns < $this->num_of_columns ) {
					$this->max_num_of_columns = $this->num_of_columns;
				}

				$title = apply_filters( 'the_title', $item->title, $item->ID );

				if( !(
						( empty( $item->url ) || $item->url == "#" || $item->url == 'http://' )  &&
						$this->menu_megamenu_title == 'disabled'
					)
				) {
					$heading = do_shortcode($title);
					$link = '';
					$link_closing = '';

					if( ! empty( $item->url ) &&
						$item->url != "#" &&
						$item->url != 'http://'
					) {
						$link = '<a href="' . $item->url . '">';
						$link_closing = '</a>';
					}

					/* check if we need to set an image */
					$title_enhance = '';
					if ( ! empty( $this->menu_megamenu_thumbnail ) ) {
						$title_enhance = '<span class="fusion-megamenu-icon"><img src="' . $this->menu_megamenu_thumbnail . '"></span>';
					} elseif( ! empty( $this->menu_megamenu_icon ) ) {
						$title_enhance = '<span class="fusion-megamenu-icon"><i class="fa glyphicon ' . avada_font_awesome_name_handler( $this->menu_megamenu_icon) . '"></i></span>';
					} elseif($this->menu_megamenu_title == 'disabled') {
						$title_enhance = '<span class="fusion-megamenu-bullet"></span>';
					}

					$heading = sprintf( '%s%s%s%s', $link, $title_enhance, $title, $link_closing );

					if( $this->menu_megamenu_title != 'disabled' ) {
						$item_output .= "<h3 class='fusion-megamenu-title'>" . $heading . "</h3>";
					} else {
						$item_output .= $heading;
					}
				}

				if( $this->menu_megamenu_widgetarea &&
					is_active_sidebar( $this->menu_megamenu_widgetarea )
				) {
					$item_output .= '<div class="fusion-megamenu-widgets-container second-level-widget">';
					ob_start();
						dynamic_sidebar( $this->menu_megamenu_widgetarea );

					$item_output .= ob_get_clean() . '</div>';
				}

				$class_columns  = ' {current_row_'.$this->num_of_rows.'}';

			} else if( $depth === 2 && $this->menu_megamenu_widgetarea && $this->menu_megamenu_status == "enabled" ) {

				if( is_active_sidebar( $this->menu_megamenu_widgetarea ) ) {
					$item_output .= '<div class="fusion-megamenu-widgets-container third-level-widget">';
					ob_start();
						dynamic_sidebar( $this->menu_megamenu_widgetarea );

					$item_output .= ob_get_clean() . '</div>';
				}

			} else {

				$atts = array();
				$atts['title']  = ! empty( $item->attr_title )	? 'title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$atts['target'] = ! empty( $item->target )		? 'target="' . esc_attr( $item->target	 ) .'"' : '';
				$atts['rel']	= ! empty( $item->xfn )			? 'rel="'	. esc_attr( $item->xfn		) .'"' : '';
				$atts['url']	= ! empty( $item->url )		 ? 'href="'   . esc_attr( $item->url		) .'"' : '';
				$attributes = implode( ' ', $atts );

				$item_output .= $args->before;
				/* check if ne need to set an image */
				if ( ! empty( $this->menu_megamenu_thumbnail ) && $this->menu_megamenu_status == "enabled" ) {
					$item_output .= '<a ' . $attributes . '><span class="fusion-megamenu-icon"><img src="' . $this->menu_megamenu_thumbnail . '"></span>';
				} elseif( ! empty( $this->menu_megamenu_icon ) && $this->menu_megamenu_status == "enabled" ) {
					$item_output .= '<a ' . $attributes . '><span class="fusion-megamenu-icon text-menu-icon"><i class="fa glyphicon ' . avada_font_awesome_name_handler( $this->menu_megamenu_icon ) . '"></i></span>';
				} elseif ( $depth !== 0 && $this->menu_megamenu_status == "enabled") {
					$item_output .= '<a ' . $attributes . '><span class="fusion-megamenu-bullet"></span>';
				} else {
					$item_output .= '<a '. $attributes .'>';
				}

				if( ! empty( $this->menu_megamenu_icon ) && $this->menu_megamenu_status == "enabled" ) {
					$item_output .=  '<span class="menu-text">';
				}

				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

				if( ! empty( $this->menu_megamenu_icon ) && $this->menu_megamenu_status == "enabled" ) {
					$item_output .=  '</span>';
				}

				if( $depth === 0 && $args->has_children ) {
					$item_output .= ' <span class="caret"></span></a>';
				} else {
					$item_output .= '</a>';
				}
				$item_output .= $args->after;

			}

			/* check if we need to apply a divider */
			if ( $this->menu_megamenu_status != "enabled" && ( ( strcasecmp( $item->attr_title, 'divider' ) == 0) ||
				 ( strcasecmp( $item->title, 'divider' ) == 0 ) )
			) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} else {

				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$class_names = '';
				$column_width = '';
				$classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );


				if( $depth === 0 && $args->has_children ) {
					if( $this->menu_megamenu_status == "enabled" ) {
						$class_names .= ' fusion-megamenu-menu';
					} else {
						$class_names .= ' fusion-dropdown-menu';
					}
				}

				if ( $depth === 1 ) {
					if( $this->menu_megamenu_status == "enabled" ) {
						$class_names .= ' fusion-megamenu-submenu';
						
						if ( $this->menu_megamenu_width != "fullwidth" ) {
							$width = $this->menu_megamenu_maxwidth * floatval( $this->menu_megamenu_columnwidth ) / 100;
							$column_width = sprintf( 'style="width:%spx;max-width:%spx;" data-width="%s"', $width, $width, $width );
						}
					} else {
						$class_names .= ' fusion-dropdown-submenu';
					}
				}

				$class_names = $class_names ? ' class="' . esc_attr( $class_names ). $class_columns . '"' : '';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= sprintf( '%s<li %s %s %s >', $indent, $id, $class_names, $column_width );

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}

		/**
		 * @see Walker::end_el()
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Page data object. Not used.
		 * @param int $depth Depth of page. Not Used.
		 */
		function end_el( &$output, $item, $depth = 0, $args = array() ) {
			$output .= "</li>\n";
		}

		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth.
		 *
		 * This method shouldn't be called directly, use the walk() method instead.
		 *
		 * @see Walker::start_el()
		 * @since 2.5.0
		 *
		 * @param object $element Data object
		 * @param array $children_elements List of elements to continue traversing.
		 * @param int $max_depth Max depth to traverse.
		 * @param int $depth Depth of current element.
		 * @param array $args
		 * @param string $output Passed by reference. Used to append additional content.
		 * @return null Null on failure with no changes to parameters.
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element )
				return;

			$id_field = $this->db_fields['id'];

			// Display this element.
			if ( is_object( $args[0] ) )
			   $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		/**
		 * Menu Fallback
		 * =============
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a manu has not been assigned to the theme location in the WordPress
		 * menu manager the function with display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 *
		 */
		public static function fallback( $args ) {
			if ( current_user_can( 'manage_options' ) ) {

				extract( $args );

				$fb_output = null;

				/*if ( $container ) {
					$fb_output = '<' . $container;

					if ( $container_id )
						$fb_output .= ' id="' . $container_id . '"';

					if ( $container_class )
						$fb_output .= ' class="' . $container_class . '"';

					$fb_output .= '>';
				}

				$fb_output .= '<ul';

				if ( $menu_id )
					$fb_output .= ' id="' . $menu_id . '"';

				if ( $menu_class )
					$fb_output .= ' class="' . $menu_class . '"';

				$fb_output .= '>';
				$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
				$fb_output .= '</ul>';
				*/
				return $fb_output;
			}
		}
	}  // end FusionCoreFrontendWalker() class
}

// Don't duplicate me!
if( ! class_exists( 'FusionCoreMegaMenus' ) ) {

	class FusionCoreMegaMenus extends Walker_Nav_Menu {

		/**
		 * Starts the list before the elements are added.
		 *
		 * @see Walker_Nav_Menu::start_lvl()
		 *
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int	$depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {}

		/**
		 * Ends the list of after the elements are added.
		 *
		 * @see Walker_Nav_Menu::end_lvl()
		 *
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int	$depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 */
		function end_lvl( &$output, $depth = 0, $args = array() ) {}

		/**
		 * Start the element output.
		 *
		 * @see Walker_Nav_Menu::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int	$depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 * @param int	$id	 Not used.
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $_wp_nav_menu_max_depth, $wp_registered_sidebars;
			$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

			ob_start();
			$item_id = esc_attr( $item->ID );
			$removed_args = array(
				'action',
				'customlink-tab',
				'edit-menu-item',
				'menu-item',
				'page-tab',
				'_wpnonce',
			);

			$original_title = '';
			if ( 'taxonomy' == $item->type ) {
				$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
				if ( is_wp_error( $original_title ) )
					$original_title = false;
			} elseif ( 'post_type' == $item->type ) {
				$original_object = get_post( $item->object_id );
				$original_title = get_the_title( $original_object->ID );
			}

			$classes = array(
				'menu-item menu-item-depth-' . $depth,
				'menu-item-' . esc_attr( $item->object ),
				'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
			);

			$title = $item->title;

			if ( ! empty( $item->_invalid ) ) {
				$classes[] = 'menu-item-invalid';
				/* translators: %s: title of menu item which is invalid */
				$title = sprintf( __( '%s (Invalid)', 'Avada'), $item->title );
			} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
				$classes[] = 'pending';
				/* translators: %s: title of menu item in draft status */
				$title = sprintf( __('%s (Pending)', 'Avada'), $item->title );
			}

			$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

			$submenu_text = '';
			if ( 0 == $depth )
				$submenu_text = 'style="display: none;"';

			?>
			<li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
				<dl class="menu-item-bar">
					<dt class="menu-item-handle">
						<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php _e( 'sub item' , 'Avada'); ?></span></span>
						<span class="item-controls">
							<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
							<span class="item-order hide-if-js">
								<a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-up-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'Avada'); ?>">&#8593;</abbr></a>
								|
								<a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-down-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'Avada'); ?>">&#8595;</abbr></a>
							</span>
							<a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', 'Avada'); ?>" href="<?php
								echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
							?>"><?php _e( 'Edit Menu Item', 'Avada' ); ?></a>
						</span>
					</dt>
				</dl>

				<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
					<?php if( 'custom' == $item->type ) : ?>
						<p class="field-url description description-wide">
							<label for="edit-menu-item-url-<?php echo $item_id; ?>">
								<?php _e( 'URL', 'Avada' ); ?><br />
								<input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
							</label>
						</p>
					<?php endif; ?>
					<p class="description description-thin">
						<label for="edit-menu-item-title-<?php echo $item_id; ?>">
							<?php _e( 'Navigation Label', 'Avada' ); ?><br />
							<input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
						</label>
					</p>
					<p class="description description-thin">
						<label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
							<?php _e( 'Title Attribute', 'Avada' ); ?><br />
							<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
						</label>
					</p>
					<p class="field-link-target description">
						<label for="edit-menu-item-target-<?php echo $item_id; ?>">
							<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
							<?php _e( 'Open link in a new window/tab', 'Avada' ); ?>
						</label>
					</p>
					<p class="field-css-classes description description-thin">
						<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
							<?php _e( 'CSS Classes (optional)', 'Avada' ); ?><br />
							<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
						</label>
					</p>
					<p class="field-xfn description description-thin">
						<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
							<?php _e( 'Link Relationship (XFN)', 'Avada' ); ?><br />
							<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
						</label>
					</p>
					<p class="field-description description description-wide">
						<label for="edit-menu-item-description-<?php echo $item_id; ?>">
							<?php _e( 'Description', 'Avada' ); ?><br />
							<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
							<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'Avada' ); ?></span>
						</label>
					</p>

					<?php do_action( 'wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args ); ?>

					<p class="field-move hide-if-no-js description description-wide">
						<label>
							<span><?php _e( 'Move', 'Avada' ); ?></span>
							<a href="#" class="menus-move-up"><?php _e( 'Up one', 'Avada' ); ?></a>
							<a href="#" class="menus-move-down"><?php _e( 'Down one', 'Avada' ); ?></a>
							<a href="#" class="menus-move-left"></a>
							<a href="#" class="menus-move-right"></a>
							<a href="#" class="menus-move-top"><?php _e( 'To the top', 'Avada' ); ?></a>
						</label>
					</p>

					<div class="menu-item-actions description-wide submitbox">
						<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
							<p class="link-to-original">
								<?php printf( __('Original: %s', 'Avada' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
							</p>
						<?php endif; ?>
						<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
						echo wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'delete-menu-item',
									'menu-item' => $item_id,
								),
								admin_url( 'nav-menus.php' )
							),
							'delete-menu_item_' . $item_id
						); ?>"><?php _e( 'Remove', 'Avada' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
							?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', 'Avada' ); ?></a>
					</div>

					<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
					<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
					<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
					<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
					<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
					<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
				</div><!-- .menu-item-settings-->
				<ul class="menu-item-transport"></ul>
			<?php
			$output .= ob_get_clean();
		}

	} // end FusionCoreMegaMenus() class

}


// Don't duplicate me!
if( ! class_exists( 'FusionMegaMenu' ) ) {

	/**
	 * Class to manipulate menus
	 *
	 * @since 3.4
	 */
	class FusionMegaMenu extends FusionMegaMenuFramework {

		function __construct() {

			add_action( 'wp_update_nav_menu_item', array( $this, 'save_custom_fields' ), 10, 3 );

			add_filter( 'wp_edit_nav_menu_walker', array( $this, 'add_custom_fields' ) );
			add_filter( 'wp_setup_nav_menu_item', array( $this, 'add_data_to_menu' ) );

		} // end __construct();


		/**
		 * Function to replace normal edit nav walker for fusion core mega menus
		 *
		 * @return string Class name of new navwalker
		 */
		function add_custom_fields() {

			return 'FusionCoreMegaMenus';

		}

		/**
		 * Add the custom fields menu item data to fields in database
		 *
		 * @return void
		 */
		function save_custom_fields( $menu_id, $menu_item_db_id, $args ) {

			$field_name_suffix = array( 'status', 'width', 'columns', 'columnwidth', 'title', 'widgetarea', 'icon', 'thumbnail' );

			foreach ( $field_name_suffix as $key ) {
				if( !isset( $_REQUEST['menu-item-fusion-megamenu-'.$key][$menu_item_db_id] ) ) {
					$_REQUEST['menu-item-fusion-megamenu-'.$key][$menu_item_db_id] = '';
				}

				$value = $_REQUEST['menu-item-fusion-megamenu-'.$key][$menu_item_db_id];
				update_post_meta( $menu_item_db_id, '_menu_item_fusion_megamenu_'.$key, $value );
			}
		}

		/**
		 * Add custom fields data to the menu
		 *
		 * @return object Add custom fields data to the menu object
		 */
		function add_data_to_menu( $menu_item ) {
			
			$menu_item->fusion_megamenu_status = get_post_meta( $menu_item->ID, '_menu_item_fusion_megamenu_status', true );

			$menu_item->fusion_megamenu_width = get_post_meta( $menu_item->ID, '_menu_item_fusion_megamenu_width', true );

			$menu_item->fusion_megamenu_columns = get_post_meta( $menu_item->ID, '_menu_item_fusion_megamenu_columns', true );
			
			$menu_item->fusion_megamenu_columnwidth = get_post_meta( $menu_item->ID, '_menu_item_fusion_megamenu_columnwidth', true );

			$menu_item->fusion_megamenu_title = get_post_meta( $menu_item->ID, '_menu_item_fusion_megamenu_title', true );

			$menu_item->fusion_megamenu_widgetarea = get_post_meta( $menu_item->ID, '_menu_item_fusion_megamenu_widgetarea', true );

			$menu_item->fusion_megamenu_icon = get_post_meta( $menu_item->ID, '_menu_item_fusion_megamenu_icon', true );

			$menu_item->fusion_megamenu_thumbnail = get_post_meta( $menu_item->ID, '_menu_item_fusion_megamenu_thumbnail', true );

			return $menu_item;

		}

	} // end FusionMegaMenu() class

}