<?php global $smof_data, $social_icons;

$header_social_icon_options = array (
	'position'			=> 'header',
	'icon_colors' 		=> $smof_data['header_social_links_icon_color'],
	'box_colors' 		=> $smof_data['header_social_links_box_color'],
	'icon_boxed' 		=> $smof_data['header_social_links_boxed'],
	'icon_boxed_radius' => $smof_data['header_social_links_boxed_radius'],
	'tooltip_placement'	=> $smof_data['header_social_links_tooltip_placement'],
	'linktarget'		=> $smof_data['social_icons_new']
);

$social_icons_to_display = $social_icons->render_social_icons( $header_social_icon_options );
?>
<?php if( $social_icons_to_display ): ?>
<div class="fusion-social-links-header">
<?php echo $social_icons_to_display; ?>
</div>
<?php endif; ?>