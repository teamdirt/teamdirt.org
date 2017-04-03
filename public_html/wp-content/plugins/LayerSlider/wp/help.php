<?php

// Help menu
add_filter('contextual_help', 'layerslider_help', 10, 3);
function layerslider_help($contextual_help, $screen_id, $screen) {

	// Exit early if file_get_contens() is not available
	if(!function_exists('file_get_contents')) {
		$screen->add_help_tab(array(
			'id' => 'error',
			'title' => 'Error',
			'content' => 'This help section couldn\'t show you the documentation because your server don\'t support the "file_get_contents" function'
		));


	// Skin Editor
	} elseif(strpos($screen->base, 'ls-skin-editor') !== false) {
		$pages = array(array('title' => 'Overview', 'file' => '/docs/skin_overview.html'));


	// Style Editor
	} elseif(strpos($screen->base, 'ls-style-editor') !== false) {
		$pages = array(array('title' => 'Overview', 'file' => '/docs/styles_overview.html'));


	// Transition builder
	} elseif(strpos($screen->base, 'ls-transition-builder') !== false) {
		$pages = array(
			array('title' => 'Overview', 'file' => '/docs/transition_overview.html'),
			array('title' => 'Getting started', 'file' => '/docs/transition_start.html'),
			array('title' => '3D transitions', 'file' => '/docs/transition_3d.html'),
			array('title' => 'Easings', 'file' => '/docs/transition_easings.html')
		);


	} elseif(strpos($screen->base, 'layerslider') !== false) {

		// List view
		if(!isset($_GET['action']) || $_GET['action'] != 'edit') {
			$pages = array(
				array('title' => 'Overview', 'file' => '/docs/home_overview.html'),
				array('title' => 'Managing sliders', 'file' => '/docs/home_managing_sliders.html'),
				array('title' => 'Inserting sliders into pages', 'file' => '/docs/inserting_slider.html'),
				array('title' => 'Export / Import', 'file' => '/docs/home_exportimport.html'),
				array('title' => 'Sample sliders', 'file' => '/docs/home_sample_slider.html'),
				array('title' => 'Using Google Fonts', 'file' => '/docs/home_google_fonts.html'),
				array('title' => 'Advanced settings', 'file' => '/docs/home_advanced_settings.html'),
				array('title' => 'Need more help?', 'file' => '/docs/faq.html')
			);


		// Editor
		} else {
			$pages = array(
				array('title' => 'Overview', 'file' => '/docs/editor_overview.html'),
				array('title' => 'Interface tips', 'file' => '/docs/editor_interface.html'),
				array('title' => 'Inserting sliders into pages', 'file' => '/docs/inserting_slider.html'),
				array('title' => 'Backwards compatibility', 'file' => '/docs/editor_compatibility.html'),
				array('title' => 'Layout & Responsive mode', 'file' => '/docs/editor_layout.html'),
				array('title' => 'Layer options', 'file' => '/docs/editor_layer_options.html'),
				array('title' => 'Dynamic sliders from posts', 'file' => '/docs/editor_post_content.html'),
				array('title' => 'Embedding videos', 'file' => '/docs/editor_multimedia.html'),
				array('title' => 'Translation & Language support', 'file' => '/docs/editor_language_support.html'),
				array('title' => 'Other features', 'file' => '/docs/editor_other_features.html'),
				array('title' => 'Event callbacks', 'file' => '/docs/editor_event_callbacks.html'),
				array('title' => 'LayerSlider API', 'file' => '/docs/editor_api.html'),
				array('title' => 'Need more help?', 'file' => '/docs/faq.html')
			);
		}
	}


	// Add pages
	if(!empty($pages) && is_array($pages)){
		foreach($pages as $item) {
			$screen->add_help_tab(array(
				'id' => sanitize_title($item['title']),
				'title' => $item['title'],
				'content' => file_get_contents(LS_ROOT_PATH.$item['file'])
			));
		}
	}
}

?>
