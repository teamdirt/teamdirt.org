<?php get_header(); ?>
	<?php
	$container_class = '';
	$timeline_icon_class = '';	
	$post_class = '';
	$content_css = 'width:100%';
	$sidebar_css = 'display:none';
	$content_class = '';
	$sidebar_exists = false;
	$sidebar_left = '';
	$double_sidebars = false;

	$sidebar_1 = $smof_data['blog_archive_sidebar'];
	$sidebar_2 = $smof_data['blog_archive_sidebar_2'];
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
	} elseif($smof_data['blog_sidebar_position'] == 'Left') {
		$content_css = 'float:right;';
		$sidebar_css = 'float:left;';
		$sidebar_left = 1;
	} elseif($smof_data['blog_sidebar_position'] == 'Right') {
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

	if($smof_data['blog_archive_layout'] == 'Large Alternate') {
		$post_class = 'large-alternate';
	} elseif($smof_data['blog_archive_layout'] == 'Medium Alternate') {
		$post_class = 'medium-alternate';
	} elseif($smof_data['blog_archive_layout'] == 'Medium') {
		$post_class = 'medium';			
	} elseif($smof_data['blog_archive_layout'] == 'Grid') {
		$post_class = 'grid-post';
		$container_class = sprintf( 'grid-layout grid-layout-%s isotope', $smof_data['blog_grid_columns'] );
	} elseif($smof_data['blog_archive_layout'] == 'Timeline') {
		$post_class = 'timeline-post';
		$container_class = 'timeline-layout isotope';
		if($smof_data['blog_archive_sidebar'] != 'None') {
			$container_class = 'timeline-layout timeline-sidebar-layout isotope';
			$timeline_icon_class = ' has-sidebar';
		}
	}
	?>
	<div id="content" class="<?php echo $content_class; ?>" style="<?php echo $content_css; ?>">
		<?php if(category_description()): ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-content">
				<?php echo category_description(); ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if($smof_data['blog_archive_layout'] == 'Timeline'): ?>
		<div class="timeline-icon<?php echo $timeline_icon_class; ?>"><i class="fusionicon-bubbles"></i></div>
		<?php endif; ?>
		<div id="posts-container" class="<?php echo $container_class; ?> clearfix">
			<?php
			$post_count = 1;
			
			$prev_post_timestamp = null;
			$prev_post_month = null;
			$prev_post_year = null;
			$first_timeline_loop = false;

			while(have_posts()): the_post();
				$post_timestamp = strtotime($post->post_date);
				$post_month = date('n', $post_timestamp);
				$post_year = get_the_date('o');
				$current_date = get_the_date('o-n');
			?>
			<?php if($smof_data['blog_archive_layout'] == 'Timeline'): ?>
			<?php if($prev_post_month != $post_month || $prev_post_year != $post_year): ?>
				<div class="timeline-date"><h3 class="timeline-title"><?php echo get_the_date($smof_data['timeline_date_format']); ?></h3></div>			
			<?php endif; ?>
			<?php endif; ?>
			<?php $thumb_class = ''; ?>
			<?php if(get_post_meta(get_the_ID(), 'pyre_video', true) ): ?>
			<?php $thumb_class = ' has-post-thumbnail'; ?>
			<?php endif; ?>		
			<div id="post-<?php the_ID(); ?>" <?php post_class('post ' . $post_class.getClassAlign($post_count) . $thumb_class . ' clearfix'); ?>>
				<div class="post-wrapper">
					<?php if($smof_data['blog_archive_layout'] == 'Medium Alternate'): ?>
					<?php echo avada_post_date_and_format_box(); ?>
					<?php endif; ?>
					<?php
					if($smof_data['featured_images']):
						get_template_part('new-slideshow');
					endif;
					?>
					<div class="post-content-container">
						<?php if($smof_data['blog_archive_layout'] == 'Timeline'): ?>
						<div class="timeline-circle"></div>
						<div class="timeline-arrow"></div>
						<?php endif; ?>
						<?php if($smof_data['blog_archive_layout'] != 'Large Alternate' && $smof_data['blog_archive_layout'] != 'Medium Alternate' && $smof_data['blog_archive_layout'] != 'Grid'  && $smof_data['blog_archive_layout'] != 'Timeline'): ?>
						<h2<?php if( ! $smof_data['disable_date_rich_snippet_pages'] ) { echo ' class="entry-title"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php endif; ?>
						<?php if($smof_data['blog_archive_layout'] == 'Large Alternate'): ?>
						<?php echo avada_post_date_and_format_box(); ?>
						<?php endif; ?>
						<div class="post-content">
							<?php if($smof_data['blog_archive_layout'] == 'Large Alternate' || $smof_data['blog_archive_layout'] == 'Medium Alternate'  || $smof_data['blog_archive_layout'] == 'Grid' || $smof_data['blog_archive_layout'] == 'Timeline'): ?>
							<h2 class="post-title<?php if( ! $smof_data['disable_date_rich_snippet_pages'] ) { echo ' entry-title'; } ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>						
							<?php 
							if($smof_data['blog_archive_layout'] == 'Grid' || $smof_data['blog_archive_layout'] == 'Timeline') {
								echo avada_render_post_metadata( 'grid_timeline' );
							} else {
								echo avada_render_post_metadata( 'alternate' );
							}
							?>
							<?php endif; ?>
							<?php if( ( ! $smof_data['post_meta'] && $smof_data['excerpt_length_blog'] == '0' ) || ( $smof_data['post_meta_author'] && $smof_data['post_meta_date'] && $smof_data['post_meta_cats'] && $smof_data['post_meta_tags'] && $smof_data['post_meta_comments'] && $smof_data['post_meta_read'] && $smof_data['excerpt_length_blog'] == '0' ) ): ?>
							<?php if( ! $smof_data['post_meta'] ): ?> 
							<div class="no-content-sep"></div>
							<?php endif; ?>
							<?php else: ?>
							<div class="content-sep"></div>
							<?php endif; ?>						
							<?php
							if($smof_data['content_length'] == 'Excerpt') {
								$stripped_content = tf_content( $smof_data['excerpt_length_blog'], $smof_data['strip_html_excerpt'] );
								echo $stripped_content;
							} else {
								the_content('');
							}
							?>
						</div>
						<div style="clear:both;"></div>
						<?php if($smof_data['post_meta']): ?>
						<div class="meta-info">
							<?php if($smof_data['blog_archive_layout'] == 'Grid' || $smof_data['blog_archive_layout'] == 'Timeline'): ?>
							<?php if($smof_data['blog_archive_layout'] != 'Large Alternate' && $smof_data['blog_archive_layout'] != 'Medium Alternate'): ?>
							<div class="alignleft">
								<?php if(!$smof_data['post_meta_read']): ?><a href="<?php the_permalink(); ?>" class="read-more"><?php echo __('Read More', 'Avada'); ?></a><?php endif; ?>
							</div>
							<?php endif; ?>
							<div class="alignright">
								<?php if(!$smof_data['post_meta_comments']): ?><?php comments_popup_link('<i class="fusionicon-bubbles"></i>&nbsp;'.__('0', 'Avada'), '<i class="fusionicon-bubbles"></i>&nbsp;'.__('1', 'Avada'), '<i class="fusionicon-bubbles"></i>&nbsp;'.'%'); ?><?php endif; ?>
							</div>
							<?php else: ?>
							<?php if($smof_data['blog_archive_layout'] != 'Large Alternate' && $smof_data['blog_archive_layout'] != 'Medium Alternate'): ?>
							<?php echo avada_render_post_metadata( 'standard' ); ?>
							<?php endif; ?>
							<div class="alignright">
								<?php if(!$smof_data['post_meta_read']): ?><a href="<?php the_permalink(); ?>" class="read-more"><?php echo __('Read More', 'Avada'); ?></a><?php endif; ?>
							</div>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php
			$prev_post_timestamp = $post_timestamp;
			$prev_post_month = $post_month;
			$prev_post_year = $post_year;
			$post_count++;
			endwhile;
			?>
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