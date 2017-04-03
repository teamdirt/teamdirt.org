<?php global $smof_data; ?>
<div class="header-v4">
	<?php if($smof_data['header_left_content'] != 'Leave Empty' || $smof_data['header_right_content'] != 'Leave Empty'): ?>
	<div class="header-social">
		<div class="avada-row">
			<div class="alignleft">
				<?php
				if($smof_data['header_left_content'] == 'Contact Info') {
					get_template_part('framework/headers/header-info');
				} elseif($smof_data['header_left_content'] == 'Social Links') {
					get_template_part('framework/headers/header-social');
				} elseif($smof_data['header_left_content'] == 'Navigation') {
					get_template_part('framework/headers/header-menu');
				}
				?>
			</div>
			<div class="alignright">
				<?php
				if($smof_data['header_right_content'] == 'Contact Info') {
					get_template_part('framework/headers/header-info');
				} elseif($smof_data['header_right_content'] == 'Social Links') {
					get_template_part('framework/headers/header-social');
				} elseif($smof_data['header_right_content'] == 'Navigation') {
					get_template_part('framework/headers/header-menu');
				}
				?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<header id="header">
		<div class="avada-row" style="padding-top:<?php echo $smof_data['margin_header_top']; ?>;padding-bottom:<?php echo $smof_data['margin_header_bottom']; ?>;">
			<div class="logo-container">
				<div class="logo" data-margin-right="<?php echo $smof_data['margin_logo_right']; ?>" data-margin-left="<?php echo $smof_data['margin_logo_left']; ?>" data-margin-top="<?php echo $smof_data['margin_logo_top']; ?>" data-margin-bottom="<?php echo $smof_data['margin_logo_bottom']; ?>" style="margin-right:<?php echo $smof_data['margin_logo_right']; ?>;margin-top:<?php echo $smof_data['margin_logo_top']; ?>;margin-left:<?php echo $smof_data['margin_logo_left']; ?>;margin-bottom:<?php echo $smof_data['margin_logo_bottom']; ?>;">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo $smof_data['logo']; ?>" alt="<?php bloginfo('name'); ?>" class="normal_logo" />
						<?php if($smof_data['logo_retina'] && $smof_data['retina_logo_width'] && $smof_data['retina_logo_height']): ?>
						<?php
						$pixels ="";
						if(is_numeric($smof_data['retina_logo_width']) && is_numeric($smof_data['retina_logo_height'])):
						$pixels ="px";
						endif; ?>
						<img src="<?php echo $smof_data["logo_retina"]; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo $smof_data["retina_logo_width"].$pixels; ?>;max-height:<?php echo $smof_data["retina_logo_height"].$pixels; ?>; height: auto !important" class="retina_logo" />
						<?php endif; ?>
					</a>
				</div>

				<?php if( $smof_data['header_v4_content'] == 'Tagline And Search' ): ?>
				<?php if( ( $smof_data['logo_alignment'] == 'Left' || $smof_data['logo_alignment'] == 'Center' ) && $smof_data['mobile_menu_design'] == 'modern' ): ?>
					<form role="search" class="search searchform" method="get" action="<?php echo home_url( '/' ); ?>">
						<div class="search-table">
							<div class="search-field">
								<input type="text" placeholder="<?php echo _e( 'Search...', 'Avada' ); ?>" value="" name="s" class="s" />
							</div>
							<div class="search-button">
								<input type="submit" class="searchsubmit" value="&#xf002;" />
							</div>
						</div>
					</form>
					<?php if($smof_data['header_tagline']): ?>
					<h3 class="tagline"><?php echo $smof_data['header_tagline']; ?></h3>
					<?php endif; ?>
				<?php else: ?>
				<?php if( $smof_data['logo_alignment'] != 'Right' ): ?>
				<div class="tagline-search">
				<?php endif; ?>
					<?php if($smof_data['header_tagline']): ?>
					<h3 class="tagline"><?php echo $smof_data['header_tagline']; ?></h3>
					<?php endif; ?>
					<form role="search" class="search searchform" method="get" action="<?php echo home_url( '/' ); ?>">
						<div class="search-table">
							<div class="search-field">
								<input type="text" placeholder="<?php echo _e( 'Search...', 'Avada' ); ?>" value="" name="s" class="s" />
							</div>
							<div class="search-button">
								<input type="submit" class="searchsubmit" value="&#xf002;" />
							</div>
						</div>
					</form>
				<?php if( $smof_data['logo_alignment'] != 'Right' ): ?>
				</div>
				<?php endif; ?>
				<?php endif; ?>
				<?php elseif($smof_data['header_v4_content'] == 'Tagline'): ?>
				<?php if($smof_data['header_tagline']): ?>
				<h3 class="tagline"><?php echo $smof_data['header_tagline']; ?></h3>
				<?php endif; ?>
				<?php elseif($smof_data['header_v4_content'] == 'Search'): ?>
				<form role="search" class="search searchform" method="get" action="<?php echo home_url( '/' ); ?>">
					<div class="search-table">
						<div class="search-field">
							<input type="text" placeholder="<?php echo _e( 'Search...', 'Avada' ); ?>" value="" name="s" class="s" />
						</div>
						<div class="search-button">
							<input type="submit" class="searchsubmit" value="&#xf002;" />
						</div>
					</div>
				</form>
				<?php endif; ?>
			</div>
			<?php if($smof_data['mobile_menu_design'] == 'modern' && ! $smof_data['ubermenu']): ?>
			<div class="mobile-menu-icons">
				<a href="#" class="fusionicon fusionicon-bars"></a>
				<?php if( $smof_data['header_v4_content'] == 'Search' || $smof_data['header_v4_content'] == 'Tagline And Search'): ?>
				<a href="#" class="fusionicon fusionicon-search"></a>
				<?php endif; ?>
				<?php if( class_exists('Woocommerce') && $smof_data['woocommerce_cart_link_main_nav'] ): ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" class="fusionicon fusionicon-shopping-cart"></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<?php if($smof_data['header_v4_content'] == 'Banner'): ?>
			<div id="header-banner">
			<?php echo $smof_data['header_banner_code']; ?>
			</div>
			<?php endif; ?>
		</div>
	</header>
	<div id="small-nav">
		<div class="avada-row">
			<?php if($smof_data['ubermenu']): ?>
			<nav id="nav-uber">
			<?php else: ?>
			<nav id="nav" class="nav-holder">
			<?php endif; ?>
				<?php get_template_part('framework/headers/header-main-menu'); ?>
			</nav>
			<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $smof_data['mobile_menu_design'] == 'classic' && ! $smof_data['ubermenu']): ?>
			<div class="mobile-nav-holder main-menu"></div>
			<?php endif; ?>
		</div>
	</div>
	<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $smof_data['mobile_menu_design'] == 'modern' && ! $smof_data['ubermenu']): ?>
	<div class="mobile-nav-holder main-menu"></div>
	<?php endif; ?>
	<?php if( ( $smof_data['header_v4_content'] == 'Search' || $smof_data['header_v4_content'] == 'Tagline And Search' ) && $smof_data['mobile_menu_design'] == 'modern' && ! $smof_data['ubermenu'] ): ?>
	<div class="mobile-header-search">
		<form role="search" class="searchform search" method="get" action="<?php echo home_url( '/' ); ?>">
			<div class="search-table">
				<div class="search-field">
					<input type="text" placeholder="<?php echo _e( 'Search...', 'Avada' ); ?>" value="" name="s" class="s" />
				</div>
				<div class="search-button">
					<input type="submit" class="searchsubmit" value="&#xf002;" />
				</div>
			</div>
		</form>
	</div>
	<?php endif; ?>
</div>