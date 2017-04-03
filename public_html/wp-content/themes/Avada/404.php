<?php get_header(); ?>
	<div id="content" class="full-width">
		<div id="post-404page">
			<div class="post-content">
				<div class="fusion-title title">
					<h2 class="title-heading-left"><?php echo __('Oops, This Page Could Not Be Found!', 'Avada'); ?></h2><div class="title-sep-container"><div class="title-sep sep-double"></div></div>
				</div>
				<div class="fusion-clearfix"></div>
				<div class="error_page">
					<div class="fusion-one-third one_third fusion-column spacing-yes">
						<div class="error-message">404</div>
					</div>
					<div class="fusion-one-third one_third fusion-column spacing-yes useful_links">
						<h3><?php echo __('Here are some useful links:', 'Avada'); ?></h3>

						<?php
						if( $smof_data['checklist_circle'] ) {
							$circle_class = 'circle-yes';
						} else {
							$circle_class = 'circle-no';
						}
						wp_nav_menu(array('theme_location' => '404_pages', 'depth' => 1, 'container' => false, 'menu_id' => 'checklist-1', 'menu_class' => 'error-menu list-icon list-icon-arrow ' . $circle_class )); ?>
					</div>
					<div class="fusion-one-third one_third fusion-column spacing-yes last">
						<h3><?php echo __('Search Our Website', 'Avada'); ?></a></h3>
						<p><?php echo __('Can\'t find what you need? Take a moment and do a search below!', 'Avada'); ?></p>
						<div class="search-page-search-form">
							<form class="searchform seach-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
								<div class="search-table">
									<div class="search-field">
										<input type="text" value="" name="s" class="s" placeholder="<?php _e( 'Search ...', 'Avada' ); ?>"/>
									</div>
									<div class="search-button">
										<input type="submit" class="searchsubmit" value="&#xf002;" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>