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

	$author = get_user_by( 'id', get_query_var( 'author' ) );
	$author_id = $author->ID;
	$name		 = get_the_author_meta('display_name', $author_id);
	$avatar	   = get_avatar( get_the_author_meta('email', $author_id), '82' );
	$description  = get_the_author_meta('description', $author_id);
	$author_custom = get_the_author_meta('author_custom', $author_id);

	if(empty($description)) {
		$description  = __('This author has not yet filled in any details.','Avada');
		$description .= '<br />'.sprintf( __( 'So far %s has created %s blog entries.', 'Avada' ), $name, count_user_posts( $author_id ) );
	}
	?>
	<div id="content" class="<?php echo $content_class; ?>" style="<?php echo $content_css; ?>">
		<div class="author">
			<div class="avatar">
			<?php echo $avatar ?>
			</div>
			<div class="author_description">
			<h3 class='author_title vcard'><?php echo __( 'About', 'Avada'); ?> <span class="fn"><?php echo $name; ?></span>
			<?php if(current_user_can('edit_users') || get_current_user_id() == $author_id): ?>
			<span class="edit_profile">(<a href="<?php echo admin_url( 'profile.php?user_id=' . $author_id ); ?>"><?php echo __( 'Edit profile', 'Avada' ) ?></a>)</span>
			<?php endif; ?>
			</h3>
			<?php echo $description; ?>
			</div>
			<div style="clear:both;"></div>
			<div class="author_social clearfix">
			<div class="custom_msg">
			<?php if( $author_custom ): ?>
			<?php echo $author_custom; ?>
			<?php endif; ?>
			</div>
			<?php
			$author_soical_icon_options = array (
				'authorpage'		=> 'yes',
				'author_id'			=> $author_id,
				'position'			=> 'author',				
				'icon_colors' 		=> $smof_data['social_links_icon_color'],
				'box_colors' 		=> $smof_data['social_links_box_color'],
				'icon_boxed' 		=> $smof_data['social_links_boxed'],
				'icon_boxed_radius' => $smof_data['social_links_boxed_radius'],
				'tooltip_placement'	=> $smof_data['social_links_tooltip_placement'],
				'linktarget'		=> $smof_data['social_icons_new'],
			);

			echo $social_icons->render_social_icons( $author_soical_icon_options );
			?>
			</div>
		</div>

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