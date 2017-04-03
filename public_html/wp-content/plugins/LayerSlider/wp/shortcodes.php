<?php


add_shortcode("layerslider","layerslider_init");

function layerslider_init($atts) {

	// ID check
	if(empty($atts['id'])) {
		return '[LayerSliderWP] '.__('Invalid shortcode', 'LayerSlider').'';
	}

	// Get slider
	$slider = LS_Sliders::find($atts['id']);

	// Get slider if any
	if(!$slider || $slider['flag_deleted'] == '1') {
		return '[LayerSliderWP] '.__('Slider not found', 'LayerSlider').'';
	}

	// Slider and markup data
	$slides = $slider['data'];
	$id = $slider['id'];
	$data = '';

	// Include slider file
	if(is_array($slides)) {

		// Get phpQuery
		if(!class_exists('phpQuery')) {
			libxml_use_internal_errors(true);
			include LS_ROOT_PATH.'/helpers/phpQuery.php';
		}

		include LS_ROOT_PATH.'/config/defaults.php';
		include LS_ROOT_PATH.'/includes/slider_markup_init.php';
		include LS_ROOT_PATH.'/includes/slider_markup_html.php';
		$data = implode('', $data);
	}

	// Return data
	if(get_option('ls_concatenate_output', true)) {
		$data = trim(preg_replace('/\s+/u', ' ', $data));
	}

	return $data;
}



function layerslider($id = 0, $page = '') {

	// Check id
	if(!isset($id) || empty($id)) {
		echo '[LayerSlider WP] You need to specify the "id" parameter for the layerslider() function call';
		return;
	}

	// Page filter
	if(isset($page) && !empty($page)) {

		// Get page name, ID and categories
		$pagename = basename(get_permalink());
		$pageid = (string) get_the_ID();
		$categories = get_the_category();

		// Get pages
		$pages = explode(',', $page);

		// Iterate over the pages
		foreach($pages as $page) {

			if($page == 'homepage' && is_front_page()) {
				echo layerslider_init(array('id' => $id));

			} elseif($pageid == $page) {
				echo layerslider_init(array('id' => $id));

			} elseif($pagename == $page) {
				echo layerslider_init(array('id' => $id));
			
			} elseif(in_category($page)) {
				echo layerslider_init(array('id' => $id));	
			}
		}


	// All pages
	} else {
		echo layerslider_init(array('id' => $id));
	}
}

?>
