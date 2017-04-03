<?php
get_header();

$portfolio_sep = false;
if($smof_data['portfolio_archive_layout'] == 'Portfolio Two Column') {
	$portfolio_layout = 'portfolio-two';
	$portfolio_image = 'portfolio-two';
	$portfolio_content = false;
	$content_class = 'portfolio-two-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Three Column') {
	$portfolio_layout = 'portfolio-three';
	$portfolio_image = 'portfolio-three';
	$portfolio_content = false;
	$content_class = 'portfolio-three-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Four Column') {
	$portfolio_layout = 'portfolio-four';
	$portfolio_image = 'portfolio-four';
	$portfolio_content = false;
	$content_class = 'portfolio-four-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Five Column') {
	$portfolio_layout = 'portfolio-five';
	$portfolio_image = 'portfolio-five';
	$portfolio_content = false;
	$content_class = 'portfolio-five-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Six Column') {
	$portfolio_layout = 'portfolio-six';
	$portfolio_image = 'portfolio-six';
	$portfolio_content = false;
	$content_class = 'portfolio-six-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio One Column Text') {
	$portfolio_layout = 'portfolio-text portfolio-one portfolio-one-text';
	$portfolio_image = 'portfolio-full';
	$portfolio_content = true;
	$portfolio_sep = true;
	$content_class = 'portfolio-one-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Two Column Text') {
	$portfolio_layout = 'portfolio-text portfolio-two portfolio-two-text';
	$portfolio_image = 'portfolio-two';
	$portfolio_content = true;
	$content_class = 'portfolio-two-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Three Column Text') {
	$portfolio_layout = 'portfolio-text portfolio-three portfolio-three-text';
	$portfolio_image = 'portfolio-three';
	$portfolio_content = true;
	$content_class = 'portfolio-three-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Four Column Text') {
	$portfolio_layout = 'portfolio-text portfolio-four portfolio-four-text';
	$portfolio_image = 'portfolio-four';
	$portfolio_content = true;
	$content_class = 'portfolio-four-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Five Column Text') {
	$portfolio_layout = 'portfolio-text portfolio-five portfolio-five-text';
	$portfolio_image = 'portfolio-five';
	$portfolio_content = true;
	$content_class = 'portfolio-five-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Six Column Text') {
	$portfolio_layout = 'portfolio-text portfolio-six portfolio-six-text';
	$portfolio_image = 'portfolio-six';
	$portfolio_content = true;
	$content_class = 'portfolio-six-sidebar';
} elseif($smof_data['portfolio_archive_layout'] == 'Portfolio Grid') {
	$portfolio_layout = 'portfolio-masonry';
	$portfolio_image = 'full';
	$portfolio_content = false;
	if($smof_data['grid_pagination_type'] == 'Infinite Scroll') {
		$portfolio_layout .= ' portfolio-infinite';
	}
} else {
	$portfolio_layout = 'portfolio-one';
	$portfolio_image = 'portfolio-one';
	$portfolio_content = true;
	$portfolio_sep = true;
	$content_class = 'portfolio-one-sidebar';
}

$sidebar_exists = false;
$sidebar_left = '';
$double_sidebars = false;

$sidebar_1 = $smof_data['portfolio_archive_sidebar'];
$sidebar_2 = $smof_data['portfolio_archive_sidebar_2'];
if( $sidebar_1 != 'None' && $sidebar_2 != 'None' ) {
	$double_sidebars = true;
}

if( $sidebar_1 != 'None' ) {
	$sidebar_exists = true;
} else {
	$sidebar_exists = false;
}

if( ! $sidebar_exists ) {
	$content_css = 'width:100%';
	$sidebar_css = 'display:none';
	$content_class= 'full-width';
	$sidebar_exists = false;
} elseif($smof_data['portfolio_sidebar_position'] == 'Left') {
	$content_css = 'float:right;';
	$sidebar_css = 'float:left;';
	$sidebar_left = 1;
} elseif($smof_data['portfolio_sidebar_position'] == 'Right') {
	$content_css = 'float:left;';
	$sidebar_css = 'float:right;';
	$sidebar_left = 2;
}

if($double_sidebars == true) {
	$content_css = 'float:left;';
	$sidebar_css = 'float:left;';
	$sidebar_2_css = 'float:left;';
} else {
	$sidebar_left = 1;
}

$entry_title = '';
if($portfolio_content == false) {
	$entry_title = 'class="entry-title"';
}

if( $smof_data['portfolio_featured_image_size'] == 'full' ) {
	$portfolio_image = 'full';
}

$portfolio_text_layout = 'portfolio-' . $smof_data['portfolio_text_layout'] . ' ';
?>
	<div id="content" class="portfolio <?php echo $portfolio_layout.' '.$content_class; ?>" style="<?php echo $content_css; ?>">
		<?php if(category_description()): ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
			<div class="post-content">
				<?php echo category_description(); ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="portfolio-wrapper">
			<?php
			while(have_posts()): the_post();
				if(has_post_thumbnail()):
			?>
			<?php
			$item_classes = $portfolio_text_layout;
			$item_cats = get_the_terms($post->ID, 'portfolio_category');
			if($item_cats):
			foreach($item_cats as $item_cat) {
				$item_classes .= $item_cat->slug . ' ';
			}
			endif;
			?>
			<div class="portfolio-item <?php echo $item_classes; ?>">
				<div class="portfolio-item-wrapper">
					<?php if( ! $portfolio_content ): ?>
					<?php echo avada_render_rich_snippets_for_pages(); ?>
					<?php endif; ?>
					<div class="image" aria-haspopup="true">
						<?php if($smof_data['image_rollover']): ?>
						<?php the_post_thumbnail($portfolio_image); ?>
						<?php else: ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($portfolio_image); ?></a>
						<?php endif; ?>
						<?php
						if(get_post_meta($post->ID, 'pyre_image_rollover_icons', true) == 'link') {
							$link_icon_css = 'display:inline-block;';
							$zoom_icon_css = 'display:none;';
						} elseif(get_post_meta($post->ID, 'pyre_image_rollover_icons', true) == 'zoom') {
							$link_icon_css = 'display:none;';
							$zoom_icon_css = 'display:inline-block;';
						} elseif(get_post_meta($post->ID, 'pyre_image_rollover_icons', true) == 'no') {
							$link_icon_css = 'display:none;';
							$zoom_icon_css = 'display:none;';
						} else {
							$link_icon_css = 'display:inline-block;';
							$zoom_icon_css = 'display:inline-block;';
						}

						$icon_url_check = get_post_meta(get_the_ID(), 'pyre_link_icon_url', true); if(!empty($icon_url_check)) {
							$icon_permalink = get_post_meta($post->ID, 'pyre_link_icon_url', true);
						} else {
							$icon_permalink = get_permalink($post->ID);
						}
						?>
						<div class="image-extras">
							<div class="image-extras-content">
								<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
								<a style="<?php echo $link_icon_css; ?>" class="icon link-icon" href="<?php echo $icon_permalink; ?>">Permalink</a>
								<?php
								if(get_post_meta($post->ID, 'pyre_video_url', true)) {
									$full_image[0] = get_post_meta($post->ID, 'pyre_video_url', true);
								}
								?>
								<a style="<?php echo $zoom_icon_css; ?>" class="icon gallery-icon" href="<?php echo $full_image[0]; ?>" rel="prettyPhoto[gallery<?php echo $post->ID; ?>]" title="<?php echo get_post_field('post_excerpt', get_post_thumbnail_id($post->ID)); ?>"><img style="display:none;" alt="<?php echo get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); ?>" />Gallery</a>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>
						</div>
					</div>
					<?php if($portfolio_content == true): ?>
					<div class="portfolio-content clearfix">
						<h2<?php if( ! $smof_data['disable_date_rich_snippet_pages'] ) { echo ' class="entry-title"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php echo avada_render_rich_snippets_for_pages( false ); ?>						
						<?php if( $smof_data['portfolio_text_layout'] ): ?>
						<div class="content-sep"></div>
						<?php endif; ?>	
						<h4><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ', ', ''); ?></h4>
						<div class="post-content">
						<?php
						if($smof_data['portfolio_content_length'] == 'Excerpt') {
							$stripped_content = strip_shortcodes( tf_content( $smof_data['excerpt_length_portfolio'], $smof_data['strip_html_excerpt'] ) );
							echo $stripped_content;
						} else {
							the_content();
						}
						?>
						</div>
						<?php if($smof_data['portfolio_archive_layout'] == 'Portfolio One Column Text' || $smof_data['portfolio_archive_layout'] == 'Portfolio One Column'): ?>
						<div class="buttons">
							<a href="<?php the_permalink(); ?>" class="<?php echo sprintf( 'btn btn-default button small fusion-button button-small button-default button-%s button-%s', strtolower( $smof_data['button_shape'] ), strtolower( $smof_data['button_type'] ) ); ?>"><?php echo __('Learn More', 'Avada'); ?></a>
							<?php if(get_post_meta($post->ID, 'pyre_project_url', true)): ?>
							<a href="<?php echo get_post_meta($post->ID, 'pyre_project_url', true); ?>" class="<?php echo sprintf( 'btn btn-default button small fusion-button button-small button-default button-%s button-%s', strtolower( $smof_data['button_shape'] ), strtolower( $smof_data['button_type'] ) ); ?>"><?php echo __('View Project', 'Avada'); ?></a>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php if($portfolio_sep == true): ?>
					<div class="fusion-separator sep-double" style="margin-top:35px;"></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; endwhile; ?>
		</div>
		<?php themefusion_pagination($pages = '', $range = 2); ?>
	</div>
	<?php if( $sidebar_exists == true ): ?>
	<?php wp_reset_query(); ?>
	<div id="sidebar" class="sidebar" style="<?php echo $sidebar_css; ?>">
		<?php
		if($sidebar_left == 1) {
			generated_dynamic_sidebar($sidebar_1);
		}
		if($sidebar_left == 2) {
			generated_dynamic_sidebar_2($sidebar_2);
		}
		?>
	</div>
	<?php if( $double_sidebars == true ): ?>
	<div id="sidebar-2" class="sidebar" style="<?php echo $sidebar_2_css; ?>">
		<?php
		if($sidebar_left == 1) {
			generated_dynamic_sidebar_2($sidebar_2);
		}
		if($sidebar_left == 2) {
			generated_dynamic_sidebar($sidebar_1);
		}
		?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
<?php get_footer(); ?>