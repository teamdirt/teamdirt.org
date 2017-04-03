<?php global $smof_data; ?>
<div class="header-v1">
	<header id="header">
		<div class="avada-row" style="padding-top:<?php echo $smof_data['margin_header_top']; ?>;padding-bottom:<?php echo $smof_data['margin_header_bottom']; ?>;" data-padding-top="<?php echo $smof_data['margin_header_top']; ?>" data-padding-bottom="<?php echo $smof_data['margin_header_bottom']; ?>">
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
			<?php if($smof_data['ubermenu']): ?>
			<nav id="nav-uber" class="clearfix">
			<?php else: ?>
			<nav id="nav" class="nav-holder" data-height="<?php echo $smof_data['nav_height']; ?>px">
			<?php endif; ?>
				<?php get_template_part('framework/headers/header-main-menu'); ?>
			</nav>
			<?php if($smof_data['mobile_menu_design'] == 'modern' && ! $smof_data['ubermenu']): ?>
			<div class="mobile-menu-icons">
				<a href="#" class="fusionicon fusionicon-bars"></a>
				<?php if( class_exists('Woocommerce') && $smof_data['woocommerce_cart_link_main_nav'] ): ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" class="fusionicon fusionicon-shopping-cart"></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $smof_data['mobile_menu_design'] == 'classic' && ! $smof_data['ubermenu']): ?>
			<div class="mobile-nav-holder main-menu"></div>
			<?php endif; ?>
		</div>
	</header>
	<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $smof_data['mobile_menu_design'] == 'modern'  && ! $smof_data['ubermenu']): ?>
	<div class="mobile-nav-holder main-menu"></div>
	<?php endif; ?>
</div>