<ul class="pyre_metabox_tabs">
	<li class="active"><a href="sliders"><?php _e('Sliders', 'Avada'); ?></a></li>
	<li><a href="page"><?php _e('Page', 'Avada'); ?></a></li>
	<li><a href="header"><?php _e('Header', 'Avada'); ?></a></li>
	<li><a href="footer"><?php _e('Footer', 'Avada'); ?></a></li>
	<li><a href="sidebars"><?php _e('Sidebars', 'Avada'); ?></a></li>
	<li><a href="background"><?php _e('Background', 'Avada'); ?></a></li>
	<li><a href="portfolio"><?php _e('Portfolio', 'Avada'); ?></a></li>
	<li><a href="pagetitlebar"><?php _e('Page Title Bar', 'Avada'); ?></a></li>
</ul>
<div class="pyre_metabox">
	<div class="pyre_metabox_tab active" id="pyre_tab_sliders">
		<?php
		$this->select(	'slider_position',
						__('Slider Position', 'Avada'),
						array('default' => __('Default', 'Avada'), 'below' => __('Below', 'Avada'), 'above' => __('Above', 'Avada')),
						__('Select if the slider shows below or above the header. Only works for top header position.', 'Avada')
					);
		?>
		<?php
		$this->select(	'slider_type',
						__('Slider Type', 'Avada'),
						array('no' => __('No Slider', 'Avada'), 'layer' => 'LayerSlider', 'flex' => 'Fusion Slider', 'rev' => 'Revolution Slider', 'elastic' => 'Elastic Slider'),
						__('Select the type of slider that displays.', 'Avada')
					);
		?>
		<?php
		global $wpdb;
		$slides_array[0] = __('Select A Slider', 'Avada');
		if( class_exists( 'LS_Sliders' ) ) {
			// Table name
			$table_name = $wpdb->prefix . "layerslider";

			// Get sliders
			$sliders = $wpdb->get_results( "SELECT * FROM $table_name
												WHERE flag_hidden = '0' AND flag_deleted = '0'
												ORDER BY date_c ASC" );

			if(!empty($sliders)):
			foreach($sliders as $key => $item):
				$slides[$item->id] = '';
			endforeach;
			endif;

			if(isset($slides) && $slides){
			foreach($slides as $key => $val){
				$slides_array[$key] = 'LayerSlider #'.($key);
			}
			}
		}
		$this->select(	'slider',
						__('Select LayerSlider', 'Avada'),
						$slides_array,
						__('Select the unique name of the slider.', 'Avada')
					);
		?>
		<?php
		$slides_array = array();
		$slides = array();
		$slides_array[0] = __('Select a slider', 'Avada');
		$slides = get_terms('slide-page');
		if($slides && !isset($slides->errors)){
		$slides = is_array($slides) ? $slides : unserialize($slides);
		foreach($slides as $key => $val){
			$slides_array[$val->slug] = $val->name;
		}
		}
		$this->select(	'wooslider',
						__('Select Fusion Slider', 'Avada'),
						$slides_array,
						__('Select the unique name of the slider.', 'Avada')
					);
		?>
		<?php
		global $wpdb;
		$revsliders[0] = __('Select a slider', 'Avada');
		if(function_exists('rev_slider_shortcode')) {
			$get_sliders = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'revslider_sliders');
			if($get_sliders) {
				foreach($get_sliders as $slider) {
					$revsliders[$slider->alias] = $slider->title;
				}
			}
		}
		$this->select(	'revslider',
						__('Select Revolution Slider', 'Avada'),
						$revsliders,
						__('Select the unique name of the slider.', 'Avada')
					);
		?>
		<?php
		$slides_array = array();
		$slides_array[0] = __('Select a slider', 'Avada');
		$slides = get_terms('themefusion_es_groups');
		if($slides && !isset($slides->errors)){
		$slides = is_array($slides) ? $slides : unserialize($slides);
		foreach($slides as $key => $val){
			$slides_array[$val->slug] = $val->name;
		}
		}
		$this->select(	'elasticslider',
						__('Select Elastic Slider', 'Avada'),
						$slides_array,
						__('Select the unique name of the slider.', 'Avada')
					);
		?>
		<?php 
		$this->upload(	'fallback', 
						__('Slider Fallback Image', 'Avada'),
						__('This image will override the slider on mobile devices.', 'Avada')
					); 
		?>
		<?php 
		$this->select(	'avada_rev_styles',
						__('Disable Avada Styles For Revolution Slider', 'Avada'),
						array('default' => __('Default', 'Avada'), 'yes' => __('Yes', 'Avada'), 'no' => __('No', 'Avada')),
						__('Choose to enable or disable disable Avada styles for Revolution Slider.', 'Avada')
					);
		?>		
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_page">
		<?php
		$this->text(	'main_top_padding',
						__('Page Content Top Padding', 'Avada'),
						__('In pixels ex: 20px. Leave empty for default value.', 'Avada')
					);
		?>
		<?php
		$this->text(	'main_bottom_padding',
						__('Page Content Bottom Padding', 'Avada'),
						__('In pixels ex: 20px. Leave empty for default value.', 'Avada')
					);
		?>
		<?php
		$this->text(	'hundredp_padding',
						__('100% Width Left/Right Padding', 'Avada'),
						__('This option controls the left/right padding for page content when using 100% site width or 100% width page template.  Enter value in px. ex: 20px.', 'Avada')
					);
		?>
		<?php
		$this->select(	'show_first_featured_image',
						__('Disable First Featured Image', 'Avada'),
						array('no' => __('No', 'Avada'), 'yes' => __('Yes', 'Avada')),
						__('Disable the 1st featured image on page.', 'Avada')
					);
		?>		
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_header">
		<?php
		$this->select(	'display_header',
						__('Display Header', 'Avada'),
						array('yes' => __('Yes', 'Avada'), 'no' => __('No', 'Avada')),
						__('Choose to show or hide the header.', 'Avada')
					);
		?>
		<?php
		$this->select(	'header_100_width',
						__('100% Header Width', 'Avada'),
						array('default' => __('Default', 'Avada'), 'yes' => __('Yes', 'Avada'), 'no' => __('No', 'Avada')),
						__('Choose to set header width to 100% of the browser width. Select "No" for site width.', 'Avada')
					);
		?>
		<?php 
		$this->upload(	'header_bg', 
						__('Background Image', 'Avada'),
						__('Select an image to use for the header background.', 'Avada')
					); 
		?>
		<?php
		$this->text(	'header_bg_color',
						__('Background Color (Hex Code)', 'Avada'),
						__('Controls the background color of the header.', 'Avada')
					);
		?>
		<?php
		$this->text(	'header_bg_opacity',
						__('Background Opacity', 'Avada'),
						__('Controls the opacity of the header background when using the top position. Ranges between 0 (transparent) and 1 (opaque). ex: .4', 'Avada')
					);
		?>		
		<?php
		$this->select(	'header_bg_full',
						__('100% Background Image', 'Avada'),
						array('no' => __('No', 'Avada'), 'yes' => __('Yes', 'Avada')),
						__('Choose to have the background image display at 100%.', 'Avada')
					);
		?>
		<?php
		$this->select(	'header_bg_repeat',
						__('Background Repeat', 'Avada'),
						array('repeat' => __('Tile', 'Avada'), 'repeat-x' => __('Tile Horizontally', 'Avada'), 'repeat-y' => __('Tile Vertically', 'Avada'), 'no-repeat' => __('No Repeat', 'Avada')),
						__('Select how the background image repeats.', 'Avada')
					);
		?>
		<?php
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
		$menu_select['default'] = 'Default Menu';
		foreach ( $menus as $menu ) {
			$menu_select[$menu->term_id] = $menu->name;
		}
		$this->select(	'displayed_menu',
						__('Main Navigation Menu', 'Avada'),
						$menu_select,
						__('Select which menu displays on this page.', 'Avada')
					);
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_footer">
		<?php
		$this->select(	'display_footer',
						__('Display Footer Widget Area', 'Avada'),
						array('default' => __('Default', 'Avada'), 'yes' => __('Yes', 'Avada'), 'no' => __('No', 'Avada')),
						__('Choose to show or hide the footer.', 'Avada')
					);
		?>
		<?php
		$this->select(	'display_copyright',
						__('Display Copyright Area', 'Avada'),
						array('default' => __('Default', 'Avada'), 'yes' => __('Yes', 'Avada'), 'no' => __('No', 'Avada')),
						__('Choose to show or hide the copyright area.', 'Avada')
					);
		?>
		<?php
		$this->select(	'footer_100_width',
						__('100% Footer Width', 'Avada'),
						array('default' => __('Default', 'Avada'), 'yes' => __('Yes', 'Avada'), 'no' => __('No', 'Avada')),
						__('Choose to set footer width to 100% of the browser width. Select "No" for site width.', 'Avada')
					);
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_sidebars">
		<?php
		sidebar_generator::edit_form();
		?>
		<?php
		$this->select(	'sidebar_position',
						__('Sidebar 1 Position', 'Avada'),
						array('default' => __('Default', 'Avada'), 'right' => __('Right', 'Avada'), 'left' => __('Left', 'Avada')),
						__('Select the sidebar 1 position. If sidebar 2 is selected, it will display on the opposite side.', 'Avada')
					);
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_background">
		<?php
		$this->select(	'page_bg_layout',
						__('Layout', 'Avada'),
						array('default' => __('Default', 'Avada'), 'wide' => __('Wide', 'Avada'), 'boxed' => __('Boxed', 'Avada')),
						__('Select boxed or wide layout.', 'Avada')
					);
		?>
		<h3><?php _e('Following options only work in boxed mode:', 'Avada'); ?></h3>
		<?php
		$this->upload(	'page_bg', 
						__('Background Image for Outer Area', 'Avada'),
						__('Select an image to use for the outer background.', 'Avada')
					); 
		?>
		<?php
		$this->text(	'page_bg_color',
						__('Background Color (Hex Code)', 'Avada'),
						__('Controls the background color for the outer background.', 'Avada')
					);
		?>
		<?php
		$this->select(	'page_bg_full',
						__('100% Background Image', 'Avada'),
						array('no' => __('No', 'Avada'), 'yes' => __('Yes', 'Avada')),
						__('Choose to have the background image display at 100%.', 'Avada')
					);
		?>
		<?php
		$this->select(	'page_bg_repeat',
						__('Background Repeat', 'Avada'),
						array('repeat' => __('Tile', 'Avada'), 'repeat-x' => __('Tile Horizontally', 'Avada'), 'repeat-y' => __('Tile Vertically', 'Avada'), 'no-repeat' => __('No Repeat', 'Avada')),
						__('Select how the background image repeats.', 'Avada')
					);
		?>
		<h3><?php _e('Following options work in boxed and wide mode:', 'Avada'); ?></h3>
		<?php 
		$this->upload(	'wide_page_bg', 
						__('Background Image for Main Content Area', 'Avada'),
						__('Select an image to use for the main content area.', 'Avada')
					); 
		?>
		<?php
		$this->text(	'wide_page_bg_color',
						__('Background Color (Hex Code)', 'Avada'),
						__('Controls the background color for the main content area.', 'Avada')
					);
		?>
		<?php
		$this->select(	'wide_page_bg_full',
						__('100% Background Image', 'Avada'),
						array('no' => __('No', 'Avada'), 'yes' => __('Yes', 'Avada')),
						__('Choose to have the background image display at 100%.', 'Avada')
					);
		?>
		<?php
		$this->select(	'wide_page_bg_repeat',
						__('Background Repeat', 'Avada'),
						array('repeat' => __('Tile', 'Avada'), 'repeat-x' => __('Tile Horizontally', 'Avada'), 'repeat-y' => __('Tile Vertically', 'Avada'), 'no-repeat' => __('No Repeat', 'Avada')),
						__('Select how the background image repeats.', 'Avada')
					);
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_portfolio">
		<?php
		$this->select(	'portfolio_width_100',
						__('Use 100% Width Page', 'Avada'),
						array('no' => __('No', 'Avada'), 'yes' => __('Yes', 'Avada')),
						__('Choose to set a portfolio template page to 100% browser width.', 'Avada')
					);
		?>
		<?php
		$this->select(	'portfolio_content_length',
						__('Excerpt or Full Portfolio Content', 'Avada'),
						array('default' => __('Default', 'Avada'), 'excerpt' => __('Excerpt', 'Avada'), 'full_content' => __('Full Content', 'Avada') ),
						__('Choose to show a text excerpt or full content.', 'Avada')
					);
		?>	
		<?php
		$this->text(	'portfolio_excerpt',
						__('Excerpt Length', 'Avada'),
						__('Insert the number of words you want to show in the post excerpts.', 'Avada')
					);
		?>
		<?php
		$types = get_terms('portfolio_category', 'hide_empty=0');
		$types_array[0] = __('All categories', 'Avada');
		if($types) {
			foreach($types as $type) {
				$types_array[$type->term_id] = $type->name;
			}
		$this->multiple('portfolio_category',
						__('Portfolio Type', 'Avada'),
						$types_array,
						__('Choose what portfolio category you want to display on this page. Leave blank for all categories.', 'Avada')
					);
		}
		?>
		<?php
		$this->select(	'portfolio_filters',
						__('Show Portfolio Filters', 'Avada'),
						array('yes' => __('Show', 'Avada'), 'no' => __('Hide', 'Avada')),
						__('Choose to show or hide the portfolio filters.', 'Avada')
					);
		?>
		<?php
		$this->select(	'portfolio_text_layout',
						__('Portfolio Text Layout', 'Avada'),
						array('default' => __('Default', 'Avada'), 'boxed' => __('Boxed', 'Avada'), 'unboxed' => __('Unboxed', 'Avada')),
						__('Select if the portfolio text layouts are boxed or unboxed.', 'Avada')
					);
		?>		
		<?php
		$this->select(	'portfolio_featured_image_size',
						__('Portfolio Featured Image Size', 'Avada'),
						array('default' => __('Default', 'Avada'), 'cropped' => __('Fixed', 'Avada'), 'full' => __('Auto', 'Avada')),
						__('Choose if the featured images are fixed (cropped) or auto (full image ratio) for all portfolio column page templates. IMPORTANT: Fixed images work best with smaller site widths. Auto images work best with larger site widths.', 'Avada')
					);
		?>
		<?php
		$this->text(	'portfolio_column_spacing',
						__('Column Spacing', 'Avada'),
						__('Insert the amount of spacing between portfolio items. ex: 7px', 'Avada')
					);
		?>		
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_pagetitlebar">
		<?php
		$this->select(	'page_title',
						__('Page Title Bar', 'Avada'),
						array('default' => __('Default', 'Avada'), 'yes' => __('Show', 'Avada'), 'no' => __('Hide', 'Avada')),
						__('Choose to show or hide the page title bar.', 'Avada')
					);
		?>
		<?php
		$this->select(	'page_title_text',
						__('Page Title Bar Text', 'Avada'),
						array('yes' => __('Show', 'Avada'), 'no' => __('Hide', 'Avada')),
						__('Choose to show or hide the page title bar text.', 'Avada')
					);
		?>
        <?php
		$this->select(	'page_title_text_alignment',
						__('Page Title Bar Text Alignment', 'Avada'),
						array('default' => __('Default', 'Avada'), 'left' => __('Left', 'Avada'), 'center' => __('Center', 'Avada'), 'right' => __('Right', 'Avada')),
						__('Choose the title and subhead text alignment', 'Avada')
					);
		?>
		<?php
		$this->text(	'page_title_custom_text',
						__('Page Title Bar Custom Text', 'Avada'),
						__('Insert custom text for the page title bar.', 'Avada')
					);
		?>
		<?php
		$this->select(	'page_title_100_width',
						__('100% Page Title Width', 'Avada'),
						array('default' => __('Default', 'Avada'), 'yes' => __('Yes', 'Avada'), 'no' => __('No', 'Avada')),
						__('Choose to set the page title content to 100% of the browser width. Select "No" for site width. Only works with wide layout mode.', 'Avada')
					);
		?>		
        <?php
		$this->text(	'page_title_text_size',
						__('Page Title Bar Text Size', 'Avada'),
						__('In pixels, default is 18px.', 'Avada')
					);
		?>
		<?php
		$this->text(	'page_title_custom_subheader',
						__('Page Title Bar Custom Subheader Text', 'Avada'),
						__('Insert custom subhead text for the page title bar.', 'Avada')
					);
		?>
        <?php
		$this->text(	'page_title_custom_subheader_text_size',
						__('Page Title Bar Subhead Text Size', 'Avada'),
						__('In pixels, default is 10px.', 'Avada')
					);
		?>
        <?php
		$this->text(	'page_title_font_color',
						__('Page Title Font Color', 'Avada'),
						__('Controls the text color of the page title fonts.', 'Avada')
					);
		?>
		<?php
		$this->text(	'page_title_height',
						__('Page Title Bar Height', 'Avada'),
						__('Set the height of the page title bar. In pixels ex: 100px.', 'Avada')
					);
		?>
		<?php 
		$this->upload(	'page_title_bar_bg', 
						__('Page Title Bar Background', 'Avada'),
						__('Select an image to use for the page title bar background.', 'Avada')
					); 
		?>
		<?php 
		$this->upload(	'page_title_bar_bg_retina', 
						__('Page Title Bar Background Retina', 'Avada'),
						__('Select an image to use for retina devices.', 'Avada')
					); 
		?>
		<?php
		$this->text(	'page_title_bar_bg_color',
						__('Page Title Bar Background Color (Hex Code)', 'Avada'),
						__('Controls the background color of the page title bar.', 'Avada')
					);
		?>
		<?php
		$this->select(	'page_title_bar_bg_full',
						__('100% Background Image', 'Avada'),
						array('default' => __('Default', 'Avada'), 'no' => __('No', 'Avada'), 'yes' => __('Yes', 'Avada')),
						__('Choose to have the background image display at 100%.', 'Avada')
					);
		?>
		<?php
		$this->select(	'page_title_bg_parallax',
						__('Parallax Background Image', 'Avada'),
						array('default' => __('Default', 'Avada'), 'no' => __('No', 'Avada'), 'yes' => __('Yes', 'Avada')),
						__('Choose a parallax scrolling effect for the background image.', 'Avada')
					);
		?>
        <?php
		$this->select(	'page_title_breadcrumbs_search_bar',
						__('Breadcrumbs/Search Bar', 'Avada'),
						array('default' => __('Default', 'Avada'), 'breadcrumbs' => __('Breadcrumbs', 'Avada'), 'searchbar' => __('Search Bar', 'Avada'), 'none' => __('None', 'Avada')),
						__('Choose to display the breadcrumbs, search bar or none.', 'Avada')
					);
		?>
	</div>
</div>
<div class="clear"></div>