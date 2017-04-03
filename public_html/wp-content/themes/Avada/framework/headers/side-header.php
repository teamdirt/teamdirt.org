<?php 
global $smof_data; 
$c_pageID = get_queried_object_id();

if( ! is_page_template( 'blank.php' ) && get_post_meta($c_pageID, 'pyre_display_header', true) != 'no' ):
?>
<div id="side-header" class="clearfix<?php if($smof_data['header_shadow']): ?> header-shadow<?php endif; ?>" style="padding-top:<?php echo $smof_data['margin_header_top']; ?>;padding-bottom:<?php echo $smof_data['margin_header_bottom']; ?>;">
	<div class="side-header-wrapper">
		<div class="side-header-content">
			<div class="logo" style="margin-right:<?php echo $smof_data['margin_logo_right']; ?>;margin-top:<?php echo $smof_data['margin_logo_top']; ?>;margin-left:<?php echo $smof_data['margin_logo_left']; ?>;margin-bottom:<?php echo $smof_data['margin_logo_bottom']; ?>;">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo $smof_data['logo']; ?>" alt="<?php bloginfo('name'); ?>" class="normal_logo" />
					<?php
					if($smof_data['logo_retina'] && $smof_data['retina_logo_width'] && $smof_data['retina_logo_height']):
					$pixels ="";
					if(is_numeric($smof_data['retina_logo_width']) && is_numeric($smof_data['retina_logo_height'])) {
						$pixels ="px";
					}
					?>
					<img src="<?php echo $smof_data["logo_retina"]; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo $smof_data["retina_logo_width"].$pixels; ?>;max-height:<?php echo $smof_data["retina_logo_height"].$pixels; ?>; height: auto !important" class="retina_logo" />
					<?php endif; ?>
				</a>
			</div>
		</div>
		<?php if($smof_data['ubermenu']): ?>
		<nav id="nav-uber">
		<?php else: ?>
		<nav id="nav" class="nav-holder">
		<?php endif; ?>
			<?php get_template_part('framework/headers/header-main-menu'); ?>
		</nav>
		<?php if($smof_data['header_left_content'] != 'Leave Empty' || $smof_data['header_right_content'] != 'Leave Empty'): ?>
		<div class="side-header-content header-social">
			<?php if($smof_data['header_left_content'] != 'Leave Empty'): ?>
			<div class="side-header-content-1 clearfix">
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
			<?php endif; ?>
			<?php if($smof_data['header_right_content'] != 'Leave Empty'): ?>
			<div class="side-header-content-2 clearfix">
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
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if($smof_data['header_v4_content'] != 'None'): ?>
		<div class="side-header-content header-v4-content">
			<?php if( ( $smof_data['header_v4_content'] == 'Tagline' || $smof_data['header_v4_content'] == 'Tagline And Search' ) && $smof_data['header_tagline'] ): ?>
			<h3 class="tagline"><?php echo $smof_data['header_tagline']; ?></h3>
			<?php endif; ?>
			<?php if( $smof_data['header_v4_content'] == 'Search' || $smof_data['header_v4_content'] == 'Tagline And Search' ): ?>
			<form role="search" class="search" method="get" action="<?php echo home_url( '/' ); ?>">
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
			<?php if($smof_data['header_v4_content'] == 'Banner'): ?>
			<div id="header-banner">
			<?php echo $smof_data['header_banner_code']; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="mobile-content">
			<?php if($smof_data['mobile_menu_design'] == 'modern' && ! $smof_data['ubermenu']): ?>
			<div class="mobile-menu-icons">
				<a href="#" class="fusionicon fusionicon-bars"></a>
				<?php if( class_exists('Woocommerce') && $smof_data['woocommerce_cart_link_main_nav'] ): ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" class="fusionicon fusionicon-shopping-cart"></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $smof_data['mobile_menu_design'] == 'classic' && ! $smof_data['ubermenu']): ?>
			<div class="sh-mobile-nav-holder mobile-nav-holder main-menu mobile-nav-holder-classic"></div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $smof_data['mobile_menu_design'] == 'modern' && ! $smof_data['ubermenu']): ?>
<div class="sh-mobile-nav-holder mobile-nav-holder main-menu mobile-nav-holder-modern"></div>
<?php endif; ?>
<?php endif; ?>