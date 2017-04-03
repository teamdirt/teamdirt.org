<?php
// Translation
add_action( 'after_setup_theme', 'avada_load_textdomain' );
function avada_load_textdomain(){
	load_theme_textdomain( 'Avada', get_template_directory() . '/languages' );
}

// Set builder support variable
add_action( 'after_setup_theme', 'avada_set_builder_status', 10 );
function avada_set_builder_status() {
	global $smof_data;

	if( ! $smof_data['disable_builder'] ) {
		add_theme_support( 'fusion_builder' );
	}
}

// Store Theme Version
if( function_exists( 'wp_get_theme' ) ) {
	$theme_obj = wp_get_theme();
	$theme_version = $theme_obj->get( 'Version' );

	update_option( 'avada_theme_version', $theme_version );
}

// Default RSS feed links
add_theme_support( 'automatic-feed-links' );

// Default custom header
add_theme_support( 'custom-header' );

// Default custom backgrounds
add_theme_support( 'custom-background' );

// Woocommerce Support
add_theme_support( 'woocommerce' );

// Allow shortcodes in widget text
add_filter('widget_text', 'do_shortcode');

//define('WOOCOMMERCE_USE_CSS', false);

// Register Navigation
register_nav_menu('main_navigation', 'Main Navigation');
register_nav_menu('top_navigation', 'Top Navigation');
register_nav_menu('404_pages', '404 Useful Pages');
register_nav_menu('sticky_navigation', 'Sticky Header Navigation');

/* Options Framework */
require_once( get_template_directory() . '/admin/index.php' );

add_filter('wp_nav_menu_args', 'tf_main_menu_args');

function tf_main_menu_args($args) {
	global $post;

	$c_pageID = '';

	if( ( get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) && is_home() ) ||
		(get_option('page_for_posts') && is_archive() && ! is_tax( 'portfolio_category' ) && ! is_tax( 'portfolio_skills' )  && ! is_tax( 'portfolio_tags' ) && ! is_tax( 'faq_category' ) && ( class_exists('Woocommerce') && ! is_shop() ) && ! is_tax( 'product_cat') && ! is_tax( 'product_tag' ) )) {
		$c_pageID = get_option('page_for_posts');
	} else {
		if(isset($post)) {
			$c_pageID = $post->ID;
		}

		if(class_exists('Woocommerce')) {
			if(is_shop() || is_tax('product_cat') || is_tax('product_tag')) {
				$c_pageID = get_option('woocommerce_shop_page_id');
			}
		}
	}

	if ( get_post_meta($c_pageID, 'pyre_displayed_menu', true) != '' &&
		 get_post_meta($c_pageID, 'pyre_displayed_menu', true) != 'default' &&
		 ( $args['theme_location'] == 'main_navigation' || $args['theme_location'] == 'sticky_navigation' )
	) {

		$menu = get_post_meta($c_pageID, 'pyre_displayed_menu', true);

		$args['menu'] = $menu;
	}

	return $args;
}

// Content Width
if( ! isset( $content_width ) ) {
	$content_width = '669';
}

// Post Formats
add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat'));

// Initialize social icons setup
require_once( get_template_directory() . '/framework/class-social-icons.php' );
global $social_icons;
$social_icons = new Avada_SocialIcons();

if( ! $smof_data['disable_megamenu'] ) {
	// Initialize the mega menu framework
	require_once( get_template_directory() . '/framework/mega-menu-framework.php' );

	function create_avada_menu() {
		global $main_menu;

		@$main_menu = wp_nav_menu(array(
				'theme_location'	=> 'main_navigation',
				'depth'				=> 5,
				'container' 		=> false,
				'items_wrap' 		=> '%3$s',
				'menu_class'		=> 'nav fusion-navbar-nav',
				'fallback_cb'	   => 'FusionCoreFrontendWalker::fallback',
				'walker'			=> new FusionCoreFrontendWalker(),
				'echo' 				=> false
			));
	}
} else {
	function create_avada_menu() {
		global $main_menu;

		@$main_menu = wp_nav_menu(array('theme_location' => 'main_navigation', 'depth' => 5, 'container' => false, 'fallback_cb' => 'default_menu_fallback', 'items_wrap' => '%3$s', 'echo' => false));
	}
	
	function default_menu_fallback( $args ) {
		return $null;
	}
	
}
add_action( 'wp_head', 'create_avada_menu' );

// WPML Config
if(defined('ICL_SITEPRESS_VERSION')) {
	include_once get_template_directory() . '/framework/plugins/wpml.php';
}

// Metaboxes
include_once get_template_directory() . '/framework/metaboxes.php' ;

// Custom Functions
get_template_part( 'framework/custom_functions' );

// Must-use Plugins
include_once get_template_directory() . '/framework/plugins/multiple_sidebars.php';
require_once get_template_directory() . '/framework/plugins/post-link-plus.php';
require_once get_template_directory() . '/framework/plugins/multiple-featured-images/multiple-featured-images.php';

// Widgets
get_template_part('widgets/widgets');

// Add post thumbnail functionality
add_theme_support('post-thumbnails');
add_image_size('blog-large', 669, 272, true);
add_image_size('blog-medium', 320, 202, true);
add_image_size('tabs-img', 52, 50, true);
add_image_size('related-img', 180, 138, true);
add_image_size('portfolio-full', 940, 400, true);
add_image_size('portfolio-one', 540, 272, true);
add_image_size('portfolio-two', 460, 295, true);
add_image_size('portfolio-three', 300, 214, true);
add_image_size('portfolio-four', 220, 161, true);
add_image_size('portfolio-five', 177, 142, true);
add_image_size('portfolio-six', 147, 118, true);
add_image_size('recent-posts', 700, 441, true);
add_image_size('recent-works-thumbnail', 66, 66, true);

// Register widgetized locations
if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'avada-blog-sidebar',
		'description' => 'Default Sidebar of Avada',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="heading"><h3>',
		'after_title' => '</h3></div>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 1',
		'id' => 'avada-footer-widget-1',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 2',
		'id' => 'avada-footer-widget-2',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 3',
		'id' => 'avada-footer-widget-3',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 4',
		'id' => 'avada-footer-widget-4',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 5',
		'id' => 'avada-footer-widget-5',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 6',
		'id' => 'avada-footer-widget-6',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'SlidingBar Widget 1',
		'id' => 'avada-slidingbar-widget-1',
		'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'SlidingBar Widget 2',
		'id' => 'avada-slidingbar-widget-2',
		'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'SlidingBar Widget 3',
		'id' => 'avada-slidingbar-widget-3',
		'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'SlidingBar Widget 4',
		'id' => 'avada-slidingbar-widget-4',
		'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'SlidingBar Widget 5',
		'id' => 'avada-slidingbar-widget-5',
		'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'SlidingBar Widget 6',
		'id' => 'avada-slidingbar-widget-6',
		'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

// How comments are displayed
function avada_comment($comment, $args, $depth) { ?>
	<?php $add_below = ''; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

		<div class="the-comment">
			<div class="avatar">
				<?php echo get_avatar($comment, 54); ?>
			</div>

			<div class="comment-box">

				<div class="comment-author meta">
					<strong><?php echo get_comment_author_link() ?></strong>
					<?php printf( __( '%1$s at %2$s', 'Avada' ), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link(__(' - Edit', 'Avada'),'  ','') ?><?php comment_reply_link(array_merge( $args, array('reply_text' => __(' - Reply', 'Avada'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>

				<div class="comment-text">
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php echo __('Your comment is awaiting moderation.', 'Avada') ?></em>
					<br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div>

			</div>

		</div>

<?php }

function avada_set_post_filters( $query ) {
	global $smof_data;

	if( ( is_tax( 'portfolio_category' ) || is_tax( 'portfolio_skills' ) || is_tax( 'portfolio_tags') ) 
		&& $query->is_main_query() 
	) {
		$query->set( 'posts_per_page', $smof_data['portfolio_items'] );
	}

	return $query;
}

add_filter('pre_get_posts', 'avada_set_post_filters');

add_filter('wp_get_attachment_link', 'avada_pretty');
function avada_pretty($content) {
	$content = preg_replace("/<a/","<a rel=\"prettyPhoto[postimages]\"",$content,1);
	return $content;
}

// initialize new slideshow
require_once(get_template_directory().'/slideshow.php');
new FusionTemplateSlideshow();

if( class_exists( 'kdMultipleFeaturedImages' ) ) {
		$i = 2;

		while($i <= $smof_data['posts_slideshow_number']) {
			$args = array(
					'id' => 'featured-image-'.$i,
					'post_type' => 'post',	  // Set this to post or page
					'labels' => array(
						'name'	  => 'Featured image '.$i,
						'set'	   => 'Set featured image '.$i,
						'remove'	=> 'Remove featured image '.$i,
						'use'	   => 'Use as featured image '.$i,
					)
			);

			new kdMultipleFeaturedImages( $args );

			$args = array(
					'id' => 'featured-image-'.$i,
					'post_type' => 'page',	  // Set this to post or page
					'labels' => array(
						'name'	  => 'Featured image '.$i,
						'set'	   => 'Set featured image '.$i,
						'remove'	=> 'Remove featured image '.$i,
						'use'	   => 'Use as featured image '.$i,
					)
			);

			new kdMultipleFeaturedImages( $args );

			$args = array(
					'id' => 'featured-image-'.$i,
					'post_type' => 'avada_portfolio',	  // Set this to post or page
					'labels' => array(
						'name'	  => 'Featured image '.$i,
						'set'	   => 'Set featured image '.$i,
						'remove'	=> 'Remove featured image '.$i,
						'use'	   => 'Use as featured image '.$i,
					)
			);

			new kdMultipleFeaturedImages( $args );

			$i++;
		}

}

function avada_excerpt_length( $length ) {
	global $smof_data;

	if(isset($smof_data['excerpt_length_blog'])) {
		return $smof_data['excerpt_length_blog'];
	}
}
add_filter('excerpt_length', 'avada_excerpt_length', 999);

function avada_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name', // use 'false' for a root menu, or pass the ID of the parent menu
		'id' => 'smof_options', // link ID, defaults to a sanitized title value
		'title' => __('Theme Options', 'Avada'), // link title
		'href' => admin_url( 'themes.php?page=optionsframework'), // name of file
		'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
	));
}
add_action( 'wp_before_admin_bar_render', 'avada_admin_bar_render' );

add_filter('upload_mimes', 'avada_filter_mime_types');
function avada_filter_mime_types($mimes)
{
	$mimes['ttf'] = 'font/ttf';
	$mimes['woff'] = 'font/woff';
	$mimes['svg'] = 'font/svg';
	$mimes['eot'] = 'font/eot';

	return $mimes;
}

function avada_process_tag( $m ) {
	if ($m[2] == 'dropcap' || $m[2] == 'highlight' || $m[2] == 'tooltip' || $m[2] == 'fusion_text' || $m[2] == 'vc_row' || $m[2] == 'vc_column' ||  $m[2] == 'vc_column_text') {
		return $m[0];
	}

	// allow [[foo]] syntax for escaping a tag
	if ( $m[1] == '[' && $m[6] == ']' ) {
		return substr($m[0], 1, -1);
	}

   return $m[1] . $m[6];
}

if( ! function_exists('tf_content') ) {
	function tf_content($limit, $strip_html) {
		global $smof_data, $more;

		$content = '';

		if(!$limit && $limit != 0) {
			$limit = 285;
		}

		$limit = (int) $limit;

		$test_strip_html = $strip_html;

		if($strip_html == "true" || $strip_html == true) {
			$test_strip_html = true;
		} else {
			$test_strip_html = false;
		}

		$custom_excerpt = false;

		$post = get_post(get_the_ID());

		$pos = strpos($post->post_content, '<!--more-->');

		if($smof_data['link_read_more']) {
			$readmore = ' <a href="'.get_permalink( get_the_ID() ).'">&#91;...&#93;</a>';
		} else {
			$readmore = ' &#91;...&#93;';
		}

		if($smof_data['disable_excerpts']) {
			$readmore = '';
		}

		if($test_strip_html) {
			$more = 0;
			$raw_content = strip_tags( get_the_content( $readmore ) );
			if( $post->post_excerpt || 
				$pos !== false
			) {
				$more = 0;
				if( ! $pos ) {
					$raw_content = strip_tags( rtrim( get_the_excerpt(), '[&hellip;]' ) . $readmore );
				}
				$custom_excerpt = true;
			}
		} else {
			$more = 0;
			$raw_content = get_the_content( $readmore );
			if( $post->post_excerpt ||
				$pos !== false
			) {
				$more = 0;
				if( ! $pos ) {
					$raw_content = rtrim( get_the_excerpt(), '[&hellip;]' ) . $readmore;
				}
				$custom_excerpt = true;
			}
		}

		if($raw_content && $custom_excerpt == false) {
			$pattern = get_shortcode_regex();
			$content = preg_replace_callback("/$pattern/s", 'avada_process_tag', $raw_content);

			if( $smof_data['excerpt_base'] == 'Characters' ) {
				$content = mb_substr($content, 0, $limit);
				if( $limit != 0 && 
					! $smof_data['disable_excerpts']
				) {
					$content .= $readmore;
				}
			} else {
				$content = explode(' ', $content, $limit + 1);
				if( count( $content ) > $limit ) {
					array_pop($content);
					if($smof_data['disable_excerpts']) {
						$content = implode(" ",$content);
					} else {
						$content = implode(" ",$content);
						if($limit != 0) {
							if($smof_data['link_read_more']) {
								$content .= $readmore;
							} else {
								$content .= $readmore;
							}
						}
					}
				} else {
					$content = implode(" ",$content);
				}
			}

			if( $limit != 0 ) {
				$content = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $content); // strip shortcode and keep the content
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
			}

			$strip_html_class = '';
			if($test_strip_html) {
				$strip_html_class = 'strip-html';
			}
			$content = sprintf( '<div class="excerpt-container %s">%s</div>', $strip_html_class, do_shortcode( $content ) );

			return $content;
		}

		if($custom_excerpt == true) {
			$pattern = get_shortcode_regex();
			$content = preg_replace_callback("/$pattern/s", 'avada_process_tag', $raw_content);		
			if($test_strip_html == true) {
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				$content = '<div class="excerpt-container strip-html">'.do_shortcode($content).'</div>';
			} else {
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
			}
		}

		if( has_excerpt() ) {
			$content = do_shortcode( get_the_excerpt() );
			$content = '<p>' . $content . '</p>';
		}

		return $content;
	}
}

if ( is_search() ) {
	add_filter( 'excerpt_length', 'search_excerpt_length', 999 );
}

function search_excerpt_length( $length ) {
	global $smof_data;

	return $smof_data['excerpt_length_blog'];
}

function avada_font_awesome_name_handler( $icon ) {

	$old_icons['arrow'] = 'angle-right';
	$old_icons['asterik'] = 'asterisk';
	$old_icons['cross'] = 'times';
	$old_icons['ban-circle'] = 'ban';
	$old_icons['bar-chart'] = 'bar-chart-o';
	$old_icons['beaker'] = 'flask';
	$old_icons['bell'] = 'bell-o';
	$old_icons['bell-alt'] = 'bell';
	$old_icons['bitbucket-sign'] = 'bitbucket-square';
	$old_icons['bookmark-empty'] = 'bookmark-o';
	$old_icons['building'] = 'building-o';
	$old_icons['calendar-empty'] = 'calendar-o';
	$old_icons['check-empty'] = 'square-o';
	$old_icons['check-minus'] = 'minus-square-o';
	$old_icons['check-sign'] = 'check-square';
	$old_icons['check'] = 'check-square-o';
	$old_icons['chevron-sign-down'] = 'chevron-circle-down';
	$old_icons['chevron-sign-left'] = 'chevron-circle-left';
	$old_icons['chevron-sign-right'] = 'chevron-circle-right';
	$old_icons['chevron-sign-up'] = 'chevron-circle-up';
	$old_icons['circle-arrow-down'] = 'arrow-circle-down';
	$old_icons['circle-arrow-left'] = 'arrow-circle-left';
	$old_icons['circle-arrow-right'] = 'arrow-circle-right';
	$old_icons['circle-arrow-up'] = 'arrow-circle-up';
	$old_icons['circle-blank'] = 'circle-o';
	$old_icons['cny'] = 'rub';
	$old_icons['collapse-alt'] = 'minus-square-o';
	$old_icons['collapse-top'] = 'caret-square-o-up';
	$old_icons['collapse'] = 'caret-square-o-down';
	$old_icons['comment-alt'] = 'comment-o';
	$old_icons['comments-alt'] = 'comments-o';
	$old_icons['copy'] = 'files-o';
	$old_icons['cut'] = 'scissors';
	$old_icons['dashboard'] = 'tachometer';
	$old_icons['double-angle-down'] = 'angle-double-down';
	$old_icons['double-angle-left'] = 'angle-double-left';
	$old_icons['double-angle-right'] = 'angle-double-right';
	$old_icons['double-angle-up'] = 'angle-double-up';
	$old_icons['download'] = 'arrow-circle-o-down';
	$old_icons['download-alt'] = 'download';
	$old_icons['edit-sign'] = 'pencil-square';
	$old_icons['edit'] = 'pencil-square-o';
	$old_icons['ellipsis-horizontal'] = 'ellipsis-h';
	$old_icons['ellipsis-vertical'] = 'ellipsis-v';
	$old_icons['envelope-alt'] = 'envelope-o';
	$old_icons['exclamation-sign'] = 'exclamation-circle';
	$old_icons['expand-alt'] = 'plus-square-o';
	$old_icons['expand'] = 'caret-square-o-right';
	$old_icons['external-link-sign'] = 'external-link-square';
	$old_icons['eye-close'] = 'eye-slash';
	$old_icons['eye-open'] = 'eye';
	$old_icons['facebook-sign'] = 'facebook-square';
	$old_icons['facetime-video'] = 'video-camera';
	$old_icons['file-alt'] = 'file-o';
	$old_icons['file-text-alt'] = 'file-text-o';
	$old_icons['flag-alt'] = 'flag-o';
	$old_icons['folder-close-alt'] = 'folder-o';
	$old_icons['folder-close'] = 'folder';
	$old_icons['folder-open-alt'] = 'folder-open-o';
	$old_icons['food'] = 'cutlery';
	$old_icons['frown'] = 'frown-o';
	$old_icons['fullscreen'] = 'arrows-alt';
	$old_icons['github-sign'] = 'github-square';
	$old_icons['google-plus-sign'] = 'google-plus-square';
	$old_icons['group'] = 'users';
	$old_icons['h-sign'] = 'h-square';
	$old_icons['hand-down'] = 'hand-o-down';
	$old_icons['hand-left'] = 'hand-o-left';
	$old_icons['hand-right'] = 'hand-o-right';
	$old_icons['hand-up'] = 'hand-o-up';
	$old_icons['hdd'] = 'hdd-o';
	$old_icons['heart-empty'] = 'heart-o';
	$old_icons['hospital'] = 'hospital-o';
	$old_icons['indent-left'] = 'outdent';
	$old_icons['indent-right'] = 'indent';
	$old_icons['info-sign'] = 'info-circle';
	$old_icons['keyboard'] = 'keyboard-o';
	$old_icons['legal'] = 'gavel';
	$old_icons['lemon'] = 'lemon-o';
	$old_icons['lightbulb'] = 'lightbulb-o';
	$old_icons['linkedin-sign'] = 'linkedin-square';
	$old_icons['meh'] = 'meh-o';
	$old_icons['microphone-off'] = 'microphone-slash';
	$old_icons['minus-sign-alt'] = 'minus-square';
	$old_icons['minus-sign'] = 'minus-circle';
	$old_icons['mobile-phone'] = 'mobile';
	$old_icons['moon'] = 'moon-o';
	$old_icons['move'] = 'arrows';
	$old_icons['off'] = 'power-off';
	$old_icons['ok-circle'] = 'check-circle-o';
	$old_icons['ok-sign'] = 'check-circle';
	$old_icons['ok'] = 'check';
	$old_icons['paper-clip'] = 'paperclip';
	$old_icons['paste'] = 'clipboard';
	$old_icons['phone-sign'] = 'phone-square';
	$old_icons['picture'] = 'picture-o';
	$old_icons['pinterest-sign'] = 'pinterest-square';
	$old_icons['play-circle'] = 'play-circle-o';
	$old_icons['play-sign'] = 'play-circle';
	$old_icons['plus-sign-alt'] = 'plus-square';
	$old_icons['plus-sign'] = 'plus-circle';
	$old_icons['pushpin'] = 'thumb-tack';
	$old_icons['question-sign'] = 'question-circle';
	$old_icons['remove-circle'] = 'times-circle-o';
	$old_icons['remove-sign'] = 'times-circle';
	$old_icons['remove'] = 'times';
	$old_icons['reorder'] = 'bars';
	$old_icons['resize-full'] = 'expand';
	$old_icons['resize-horizontal'] = 'arrows-h';
	$old_icons['resize-small'] = 'compress';
	$old_icons['resize-vertical'] = 'arrows-v';
	$old_icons['rss-sign'] = 'rss-square';
	$old_icons['save'] = 'floppy-o';
	$old_icons['screenshot'] = 'crosshairs';
	$old_icons['share-alt'] = 'share';
	$old_icons['share-sign'] = 'share-square';
	$old_icons['share'] = 'share-square-o';
	$old_icons['sign-blank'] = 'square';
	$old_icons['signin'] = 'sign-in';
	$old_icons['signout'] = 'sign-out';
	$old_icons['smile'] = 'smile-o';
	$old_icons['sort-by-alphabet-alt'] = 'sort-alpha-desc';
	$old_icons['sort-by-alphabet'] = 'sort-alpha-asc';
	$old_icons['sort-by-attributes-alt'] = 'sort-amount-desc';
	$old_icons['sort-by-attributes'] = 'sort-amount-asc';
	$old_icons['sort-by-order-alt'] = 'sort-numeric-desc';
	$old_icons['sort-by-order'] = 'sort-numeric-asc';
	$old_icons['sort-down'] = 'sort-asc';
	$old_icons['sort-up'] = 'sort-desc';
	$old_icons['stackexchange'] = 'stack-overflow';
	$old_icons['star-empty'] = 'star-o';
	$old_icons['star-half-empty'] = 'star-half-o';
	$old_icons['sun'] = 'sun-o';
	$old_icons['thumbs-down-alt'] = 'thumbs-o-down';
	$old_icons['thumbs-up-alt'] = 'thumbs-o-up';
	$old_icons['time'] = 'clock-o';
	$old_icons['trash'] = 'trash-o';
	$old_icons['tumblr-sign'] = 'tumblr-square';
	$old_icons['twitter-sign'] = 'twitter-square';
	$old_icons['unlink'] = 'chain-broken';
	$old_icons['upload'] = 'arrow-circle-o-up';
	$old_icons['upload-alt'] = 'upload';
	$old_icons['warning-sign'] = 'exclamation-triangle';
	$old_icons['xing-sign'] = 'xing-square';
	$old_icons['youtube-sign'] = 'youtube-square';
	$old_icons['zoom-in'] = 'search-plus';
	$old_icons['zoom-out'] = 'search-minus';

	if( substr( $icon, 0, 5 ) == 'icon-' || substr( $icon, 0, 3 ) != 'fa-' ) {
		$icon = str_replace( 'icon-', 'fa-', $icon );

		if( array_key_exists( str_replace( 'fa-', '', $icon ), $old_icons ) ) {
			$fa_icon = 'fa-' . $old_icons[str_replace( 'fa-', '', $icon )];
		} else {
			if( substr( $icon, 0, 3 ) != 'fa-' ) {
				$fa_icon = 'fa-' . $icon;
			} else {
				$fa_icon = $icon;
			}
		}
	} elseif( substr( $icon, 0, 3 ) != 'fa-' ) {
		$fa_icon = 'fa-' . $icon;
	} else {
		$fa_icon = $icon;
	}

	return $fa_icon;
}

function avada_scripts() {
	if ( ! is_admin() && ! in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) {
		global $smof_data, $wp_styles, $woocommerce;

		$theme_info = wp_get_theme();

		$c_pageID = get_queried_object_id();

		$template_directory = get_template_directory_uri();

		if((get_option('show_on_front') && get_option('page_for_posts') && is_home()) ||
			(get_option('page_for_posts') && is_archive() && !is_post_type_archive())) {
			$c_pageID = get_option('page_for_posts');
		} else {
			if(class_exists('Woocommerce')) {
				if(is_shop() || is_tax('product_cat') || is_tax('product_tag')) {
					$c_pageID = get_option('woocommerce_shop_page_id');
				}
			}
		}

		wp_enqueue_script( 'jquery', false, array(), $theme_info->get( 'Version' ), true );

		if ( is_singular() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_deregister_script( 'modernizr' );
		wp_register_script( 'modernizr', $template_directory . '/js/modernizr-min.js', array(), $theme_info->get( 'Version' ), true);
		wp_enqueue_script( 'modernizr' );

		if( function_exists('novagallery_shortcode') ) {
			wp_deregister_script( 'novagallery_modernizr' );
			wp_register_script( 'novagallery_modernizr', $template_directory . '/js/modernizr-min.js', array(), $theme_info->get( 'Version' ), true);
			wp_enqueue_script( 'novagallery_modernizr' );
		}

		if( function_exists('ccgallery_shortcode') ) {
			wp_deregister_script( 'ccgallery_modernizr' );
			wp_register_script( 'ccgallery_modernizr', $template_directory . '/js/modernizr-min.js', array(), $theme_info->get( 'Version' ), true);
			wp_enqueue_script( 'ccgallery_modernizr' );
		}

	   	wp_deregister_script( 'jquery.carouFredSel' );
		wp_register_script( 'jquery.carouFredSel', $template_directory . '/js/jquery.carouFredSel-6.2.1-min.js', array(), $theme_info->get( 'Version' ), true);
		wp_enqueue_script( 'jquery.carouFredSel' );
		
	   	wp_deregister_script( 'jquery.cycle' );
		wp_register_script( 'jquery.cycle', $template_directory . '/js/jquery.cycle.js', array(), $theme_info->get( 'Version' ), true);
		wp_enqueue_script( 'jquery.cycle' );		

		if ( class_exists( 'Woocommerce' ) ) {
			if(!$smof_data['status_lightbox'] && !is_woocommerce() || !$smof_data['status_lightbox'] && is_woocommerce() && is_shop()) {
				wp_deregister_script( 'jquery.prettyPhoto' );
				wp_register_script( 'jquery.prettyPhoto', $template_directory . '/js/jquery.prettyPhoto-min.js', array(), $theme_info->get( 'Version' ), true);
				wp_enqueue_script( 'jquery.prettyPhoto' );
			}

			wp_dequeue_script('prettyPhoto-init');
			wp_dequeue_script('wc-add-to-cart-variation');
			wp_enqueue_script( 'wc-add-to-cart-variation', $template_directory . '/woocommerce/js/add-to-cart-variation-min.js' , array( 'jquery' ), $theme_info->get( 'Version' ), true );
		} else {
			if(!$smof_data['status_lightbox']) {
				wp_deregister_script( 'jquery.prettyPhoto' );
				wp_register_script( 'jquery.prettyPhoto', $template_directory . '/js/jquery.prettyPhoto-min.js', array(), $theme_info->get( 'Version' ), true);
				wp_enqueue_script( 'jquery.prettyPhoto' );
			}
		}

		wp_deregister_script( 'jquery.flexslider' );
		wp_register_script( 'jquery.flexslider', $template_directory . '/js/jquery.flexslider-min.js', array(), $theme_info->get( 'Version' ), true);
		wp_enqueue_script( 'jquery.flexslider' );

		wp_deregister_script( 'jquery.fitvids' );
		wp_register_script( 'jquery.fitvids', $template_directory . '/js/jquery.fitvids-min.js', array(), $theme_info->get( 'Version' ), true);
		wp_enqueue_script( 'jquery.fitvids' );

		if(!$smof_data['status_gmap']) {
			$map_api = 'http' . ( ( is_ssl() ) ? 's' : '' ) . '://maps.googleapis.com/maps/api/js?sensor=false&amp;language=' . substr(get_locale(), 0, 2);
			wp_register_script( 'google-maps-api', $map_api, array(), $theme_info->get( 'Version' ), false );
			wp_register_script( 'google-maps-infobox', 'http' . ( ( is_ssl() ) ? 's' : '' ) . '://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js', array(), $theme_info->get( 'Version' ), false);
		}

		wp_deregister_script( 'avada' );
		wp_register_script( 'avada', $template_directory . '/js/main.js', array(), $theme_info->get( 'Version' ), true);
		wp_enqueue_script( 'avada' );

		if(get_post_meta($c_pageID, 'pyre_fimg_width', true) == 'auto' && get_post_meta($c_pageID, 'pyre_width', true) == 'half') {
			$smoothHeight = 'true';
		} else {
			$smoothHeight = 'false';
		}

		if(get_post_meta($c_pageID, 'pyre_fimg_width', true) == 'auto' && get_post_meta($c_pageID, 'pyre_width', true) == 'half') {
			$flex_smoothHeight = 'true';
		} else {
			if($smof_data["slideshow_smooth_height"]) {
				$flex_smoothHeight = 'true';
			} else {
				$flex_smoothHeight = 'false';
			}
		}

		$db_vars = $smof_data;

		if( ! $smof_data['slideshow_autoplay'] ) {
			$db_vars['slideshow_autoplay'] = false;
		} else {
			$db_vars['slideshow_autoplay'] = true;
		}

		if( ! $smof_data['slideshow_speed'] ) {
			$db_vars['slideshow_speed'] = 7000;
		}

		if( defined('ICL_SITEPRESS_VERSION') && defined('ICL_LANGUAGE_CODE') ) {
			$language_code = ICL_LANGUAGE_CODE;
		} else {
			$language_code = '';
		}

		if( avada_set_portfolio_image_size( $c_pageID ) == 'full' ) {
			$isotope_type = 'masonry';
		} else {
			$isotope_type = 'fitRows';
		}

		if( is_archive() ) {
			if( $smof_data['portfolio_featured_image_size'] == 'full' ) {
				$isotope_type = 'masonry';
			} else {
				$isotope_type = 'fitRows';
			}			
		}

		if( get_post_meta($c_pageID, 'pyre_page_bg_layout', true) == 'boxed' || get_post_meta($c_pageID, 'pyre_page_bg_layout', true) == 'wide' ) {
			$layout = get_post_meta($c_pageID, 'pyre_page_bg_layout', true);
		} else {
			$layout = $smof_data['layout'];
		}
		
		if( get_post_meta($c_pageID, 'pyre_avada_rev_styles', true) == 'no' || 
			( ! $smof_data['avada_rev_styles'] && get_post_meta($c_pageID, 'pyre_avada_rev_styles', true) != 'yes' )
		) {
			$avada_rev_styles = 1;
		} else {
			$avada_rev_styles = 0;
		}		

		$local_variables = array(
			'protocol'						=> is_ssl(),
			'theme_url' 					=> get_template_directory_uri(),
			'dropdown_goto' 				=> __('Go to...', 'Avada'),
			'mobile_nav_cart' 				=> __('Shopping Cart', 'Avada'),
			'page_smoothHeight' 			=> $smoothHeight,
			'flex_smoothHeight' 			=> $flex_smoothHeight,
			'language_flag' 				=> $language_code,
			'infinite_blog_finished_msg' 	=> '<em>'.__('All posts displayed.', 'Avada').'</em>',
			'infinite_finished_msg'			=> '<em>'.__('All items displayed.', 'Avada').'</em>',
			'infinite_blog_text' 			=> '<em>'. __('Loading the next set of posts...', 'Avada').'</em>',
			'portfolio_loading_text' 		=> '<em>'. __('Loading Portfolio Items...', 'Avada').'</em>',
			'faqs_loading_text' 			=> '<em>'. __('Loading FAQ Items...', 'Avada').'</em>',
			'order_actions' 				=>  __( 'Details' , 'Avada'),
			'avada_rev_styles'				=> $avada_rev_styles,
			'avada_styles_dropdowns'		=> $smof_data['avada_styles_dropdowns'],
			'blog_grid_column_spacing'		=> $smof_data['blog_grid_column_spacing'],
			'blog_pagination_type'			=> $smof_data['blog_pagination_type'],
			'custom_icon_image_retina'		=> $smof_data['custom_icon_image_retina'],
			'disable_mobile_animate_css'	=> $smof_data['disable_mobile_animate_css'],
			'portfolio_pagination_type'		=> $smof_data['grid_pagination_type'],
			'header_position'				=> $smof_data['header_position'],
			'header_sticky'					=> $smof_data['header_sticky'],
			'ipad_potrait'					=> $smof_data['ipad_potrait'],
			'is_responsive' 				=> $smof_data['responsive'],				
			'layout_mode'					=> strtolower( $layout ),
			'lightbox_animation_speed'		=> $smof_data['lightbox_animation_speed'],
			'lightbox_autoplay'				=> $smof_data['lightbox_autoplay'],
			'lightbox_desc'					=> $smof_data['lightbox_desc'],
			'lightbox_deeplinking'			=> $smof_data['lightbox_deeplinking'],
			'lightbox_gallery'				=> $smof_data['lightbox_gallery'],
			'lightbox_opacity'				=> $smof_data['lightbox_opacity'],				
			'lightbox_post_images'			=> $smof_data['lightbox_post_images'],
			'lightbox_slideshow_speed'		=> $smof_data['lightbox_slideshow_speed'],				
			'lightbox_social'				=> $smof_data['lightbox_social'],				
			'lightbox_title'				=> $smof_data['lightbox_title'],
			'logo_alignment'				=> $smof_data['logo_alignment'],
			'megamenu_max_width'			=> $smof_data['megamenu_max_width'],
			'pagination_video_slide'		=> $smof_data['pagination_video_slide'],
			'retina_icon_height'			=> $smof_data['retina_icon_height'],
			'retina_icon_width'				=> $smof_data['retina_icon_width'],
			'submenu_slideout'				=> $smof_data['mobile_nav_submenu_slideout'],
			'sidenav_behavior'				=> $smof_data['sidenav_behavior'],
			'site_width'					=> $smof_data['site_width'],				
			'slideshow_autoplay'			=> $smof_data['slideshow_autoplay'],
			'slideshow_speed'				=> $smof_data['slideshow_speed'],
			'status_lightbox_mobile'		=> $smof_data['status_lightbox_mobile'],
			'status_totop_mobile'			=> $smof_data['status_totop_mobile'],
			'status_vimeo'					=> $smof_data['status_vimeo'],
			'status_yt'						=> $smof_data['status_yt'],
			'submenu_slideout' 				=> $smof_data['mobile_nav_submenu_slideout'],
			'testimonials_speed' 			=> $smof_data['testimonials_speed'],
			'tfes_animation' 				=> $smof_data['tfes_animation'],
			'tfes_autoplay' 				=> $smof_data['tfes_autoplay'],
			'tfes_interval' 				=> $smof_data['tfes_interval'],
			'tfes_speed' 					=> $smof_data['tfes_speed'],
			'tfes_width' 					=> $smof_data['tfes_width'],
			'woocommerce_shop_page_columns'	=> $smof_data['woocommerce_shop_page_columns'],
			'mobile_menu_design'			=> $smof_data['mobile_menu_design'],
			'isotope_type'					=> $isotope_type,
			'header_position'				=> $smof_data['header_position'],
			'page_title_fading'				=> $smof_data['page_title_fading']
		);
		
		if( class_exists( 'Woocommerce' ) ) {
			if( version_compare( $woocommerce->version, '2.3', '>=' ) ) {
				$local_variables['woocommerce_23'] = true;
			}
		}

		wp_localize_script('avada', 'js_local_vars', $local_variables );

		if( is_page('header-2') || is_page('header-3') || is_page('header-4') || is_page('header-5') ) {
			$header_demo = true;
		} else {
			$header_demo = false;
		}

		wp_enqueue_style( 'avada-stylesheet', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ) );
		
		wp_enqueue_style( 'avada-shortcodes', $template_directory . '/shortcodes.css', array(), $theme_info->get( 'Version' ) );
		$wp_styles->add_data( 'avada-shortcodes', 'conditional', 'lte IE 9' );

		if( ! $smof_data['status_fontawesome'] ) {
			wp_enqueue_style( 'fontawesome', $template_directory . '/fonts/fontawesome/font-awesome.css', array(), $theme_info->get( 'Version' ) );
			wp_enqueue_style( 'avada-IE-fontawesome', $template_directory . '/fonts/fontawesome/font-awesome.css', array(), $theme_info->get( 'Version' ) );
			$wp_styles->add_data( 'avada-IE-fontawesome', 'conditional', 'lte IE 9' );
		}

		if( ! $smof_data['use_animate_css'] ) {
			wp_enqueue_style( 'avada-animations', $template_directory . '/css/animations.css', array(), $theme_info->get( 'Version' ) );
		}

		wp_enqueue_style( 'avada-IE8', $template_directory . '/css/ie8.css', array(), $theme_info->get( 'Version' ) );
		$wp_styles->add_data( 'avada-IE8', 'conditional', 'lte IE 8' );

		wp_enqueue_style( 'avada-IE', $template_directory . '/css/ie.css', array(), $theme_info->get( 'Version' ) );
		$wp_styles->add_data( 'avada-IE', 'conditional', 'IE' );

		if( $smof_data['responsive'] ) {
			wp_enqueue_style( 'avada-media', $template_directory . '/css/media.css', array(), $theme_info->get( 'Version' ) );

			if( ! $smof_data['ipad_potrait'] ) {
				wp_enqueue_style( 'avada-ipad', $template_directory . '/css/ipad.css', array(), $theme_info->get( 'Version' ) );
			}
		}

		wp_deregister_style('woocommerce-layout');
		wp_deregister_style('woocommerce-smallscreen');
		wp_deregister_style('woocommerce-general');
	}
}
add_action('wp_enqueue_scripts', 'avada_scripts');

add_filter('jpeg_quality', 'avada_image_full_quality');
add_filter('wp_editor_set_quality', 'avada_image_full_quality');
function avada_image_full_quality($quality) {
	return 100;
}

add_filter('get_archives_link', 'avada_cat_count_span');
add_filter('wp_list_categories', 'avada_cat_count_span');
function avada_cat_count_span($links) {
	$get_count = preg_match_all('#\((.*?)\)#', $links, $matches);

	if($matches) {
		$i = 0;
		foreach($matches[0] as $val) {
			$links = str_replace('</a> '.$val, ' '.$val.'</a>', $links);
			$links = str_replace('</a>&nbsp;'.$val, ' '.$val.'</a>', $links);
			$i++;
		}
	}

	return $links;
}

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

if(! is_admin() ) {
	add_filter('pre_get_posts','avada_SearchFilter');
	function avada_SearchFilter($query) {
		global $smof_data;
		if(is_search() && $query->is_search) {
			if($smof_data['search_content'] == 'Only Posts') {
				$query->set('post_type', 'post');
			}

			if($smof_data['search_content'] == 'Only Pages') {
				$query->set('post_type', 'page');
			}
		}
		return $query;
	}
}

add_action('admin_head', 'avada_admin_css');
function avada_admin_css() {
	$theme_info = wp_get_theme();
	
	echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/admin_css.css?vesion="' . $theme_info->get( 'Version' ) . '>';
}

/* Theme Activation Hook */
add_action('admin_init','avada_theme_activation');
function avada_theme_activation()
{
	global $pagenow;
	if(is_admin() && 'themes.php' == $pagenow && isset($_GET['activated']))
	{
		update_option('shop_catalog_image_size', array('width' => 500, 'height' => '', 0));
		update_option('shop_single_image_size', array('width' => 500, 'height' => '', 0));
		update_option('shop_thumbnail_image_size', array('width' => 120, 'height' => '', 0));
	}
}

// Register default function when plugin not activated
add_action( 'wp_head', 'avada_plugins_loaded' );
function avada_plugins_loaded() {
	if( ! function_exists( 'is_woocommerce' ) ) {
		function is_woocommerce() { return false; }
	}
	if( ! function_exists( 'is_bbpress' ) ) {
		function is_bbpress() { return false; }
	}
	if( ! function_exists( 'bbp_is_forum_archive' ) ) {
		function bbp_is_forum_archive() { return false; }
	}
	if( ! function_exists( 'bbp_is_topic_archive' ) ) {
		function bbp_is_topic_archive() { return false; }
	}
	if( ! function_exists( 'bbp_is_user_home' ) ) {
		function bbp_is_user_home() { return false; }
	}
	if( ! function_exists( 'bbp_is_search' ) ) {
		function bbp_is_search() { return false; }
	}
	
	if( ! function_exists( 'tribe_is_event' ) ) {
		function tribe_is_event() { return false; }
	}
}

function is_events_archive() {
	if( class_exists( 'TribeEvents' ) ) {
		if( tribe_is_month() ||
			tribe_is_day() ||
			tribe_is_past() || 
			tribe_is_upcoming() ||			
			class_exists( 'TribeEventsPro' ) && ( tribe_is_week() || tribe_is_photo() || tribe_is_map() )
		) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

// Adding the Open Graph in the Language Attributes
if( ! $smof_data['status_opengraph'] ) {
	function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
	add_filter('language_attributes', 'add_opengraph_doctype');

	function fusion_insert_og_meta() {
		global $smof_data, $post;

		if ( !is_singular() ) 
			return;

		echo sprintf( '<meta property="og:title" content="%s"/>', strip_tags( str_replace( array( '"', "'" ), array( '&quot;', '&#39;' ), $post->post_title ) ) );		
		echo '<meta property="og:type" content="article"/>';
		echo sprintf( '<meta property="og:url" content="%s"/>', get_permalink() );
		echo sprintf( '<meta property="og:site_name" content="%s"/>', get_bloginfo('name') );
		echo sprintf( '<meta property="og:description" content="%s"/>', avada_get_content_stripped_and_excerpted( 55, $post->post_content ) );
		if( ! has_post_thumbnail( $post->ID ) ) { 
			if(  $smof_data['logo'] ) {
				echo sprintf( '<meta property="og:image" content="%s"/>', $smof_data['logo'] );
			}
		} else {
			$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			echo sprintf( '<meta property="og:image" content="%s"/>', esc_attr( $thumbnail_src[0] ) );
		}
	}
	add_action( 'wp_head', 'fusion_insert_og_meta', 5 );
}

function avada_get_content_stripped_and_excerpted( $excerpt_length, $content ) {
	
	$pattern = get_shortcode_regex();
	$content = preg_replace_callback( "/$pattern/s", 'avada_process_tag', $content );
	$content = explode( ' ', $content, $excerpt_length + 1 );
	if( count( $content ) > $excerpt_length ) {
		array_pop($content);
	}
	$content = implode(" ",$content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = strip_tags( $content );
	$content = str_replace( array( '"', "'" ), array( '&quot;', '&#39;' ), $content );
	$content = trim( strip_shortcodes( $content ) );
	
	return $content;
}

function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['author_facebook'] = 'Facebook ';
	$profile_fields['author_twitter'] = 'Twitter';
	$profile_fields['author_linkedin'] = 'LinkedIn';
	$profile_fields['author_dribble'] = 'Dribble';
	$profile_fields['author_gplus'] = 'Google+';
	$profile_fields['author_custom'] = 'Custom Message';

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

/* Change admin css */
function avada_custom_admin_styles() {
	echo '<style type="text/css">
	.widget input { border-color: #DFDFDF !important; }
	</style>';
}
add_action('admin_head', 'avada_custom_admin_styles');

/* Set page builder status var */
if( $smof_data['disable_builder'] != get_option( 'avada_disable_builder' ) ) {
	update_option( 'avada_disable_builder', $smof_data['disable_builder'] );
}

/* Display a notice that can be dismissed */
if( $smof_data['ubermenu'] ) {
	update_option( 'avada_ubermenu_notice', true );
} elseif( !get_option( 'avada_ubermenu_notice_hidden' ) ) {
	update_option( 'avada_ubermenu_notice', false );
}

add_action('admin_notices', 'avada_admin_notice');
function avada_admin_notice() {
	$url = admin_url( 'themes.php?page=optionsframework#of-option-advanced' );
	$page = '';
	if( array_key_exists( 'page', $_GET ) ) {
		$page = $_GET['page'];
	}

	/* Check that the user hasn't already clicked to ignore the message */
	if( ! get_option('avada_ubermenu_notice') && 
		function_exists( 'uberMenu_direct' ) && 
		$page != 'uber-menu' && 
		current_user_can( 'activate_plugins' ) 
	) {
		echo '<div id="setting-error-settings_updated" class="updated settings-error"><p>';
		printf( __( 'It seems you have <a href="http://wpmegamenu.com/">Ubermenu</a> installed, please enable <a href="' . $url . '">Ubermenu Plugin Support</a> option on the Advanced tab in Avada <a href="' . $url . '">Theme Options</a> to allow compatiblity.<br /><a href="%1$s" style="margin-top:5px;" class="button button-primary">Hide Notice</a>' ), '?avada_uber_nag_ignore=0' );
		echo "</p></div>";
	}

	if( ! get_option( 'avada_ubermenu_notice' ) && 
		function_exists( 'uberMenu_direct' ) && 
		$page == 'uber-menu' &&
		current_user_can( 'activate_plugins' ) 
	) {
		echo '<div class="ubermenu-thanks" style="overflow: hidden;"><h3>Support Avada with Ubermenu</h3><p>';
		printf( __( 'It seems you have <a href="http://wpmegamenu.com/">Ubermenu</a> installed, please enable <a href="' . $url . '">Ubermenu Plugin Support</a> option on the Advanced tab in Avada <a href="' . $url . '">Theme Options</a> to allow compatiblity.<a href="%1$s" class="button button-bad" style="margin-top: 10px;">Hide Notice</a>' ), '?avada_uber_nag_ignore=0' );
		echo '</p></div>';
	}

	if( array_key_exists( 'imported', $_GET ) && 
		isset( $_GET['imported'] ) && 
		$_GET['imported'] == 'success' 
	) {
		echo '<div id="setting-error-settings_updated" class="updated settings-error"><p>';
		printf( __( 'Sucessfully imported demo data!', 'Avada' ) );
		echo "</p></div>";
	}
}

add_action('admin_init', 'avada_nag_ignore');
function avada_nag_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
        
	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset( $_GET['fusion_richedit_nag_ignore'] ) && $_GET['fusion_richedit_nag_ignore'] == '0' ) {
		add_user_meta($user_id, 'fusion_richedit_nag_ignore', 'true', true);
		
		//$referer = esc_url($_SERVER["HTTP_REFERER"]);
		//wp_redirect($referer);
	}

	/* If user clicks to ignore the notice, add that to their user meta */
	if (isset($_GET['avada_uber_nag_ignore']) && '0' == $_GET['avada_uber_nag_ignore'] ) {
		update_option('avada_ubermenu_notice', true);
		update_option('avada_ubermenu_notice_hidden', true);
		$referer = esc_url($_SERVER["HTTP_REFERER"]);
		wp_redirect($referer);
	}
}


if(function_exists('rev_slider_shortcode')) {
	add_action('admin_init', 'avada_disable_revslider_notice');
	add_action('admin_init', 'avada_revslider_styles');
}

/* Disable revslider notice */
function avada_disable_revslider_notice() {
	update_option('revslider-valid-notice', 'false');
}

/* Add revslider styles */
function avada_revslider_styles() {
	global $wpdb, $revSliderVersion;

	$plugin_version = $revSliderVersion;

	$table_name = $wpdb->prefix . 'revslider_css';
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name && function_exists('rev_slider_shortcode') && $plugin_version != get_option('avada_revslider_version') ) {

		$old_styles = array( '.avada_huge_white_text', '.avada_huge_black_text', '.avada_big_black_text', '.avada_big_white_text', '.avada_big_black_text_center', '.avada_med_green_text', '.avada_small_gray_text', '.avada_small_white_text', '.avada_block_black', '.avada_block_green', '.avada_block_white', '.avada_block_white_trans' );

		foreach($old_styles as $handle) {
			$wpdb->delete( $table_name, array( 'handle' => $handle) );
		}

		$styles = array(
			'.tp-caption.avada_huge_white_text' => '{"position":"absolute","color":"#ffffff","font-size":"130px","line-height":"45px","font-family":"museoslab500regular"}',
			'.tp-caption.avada_huge_black_text' => '{"position":"absolute","color":"#000000","font-size":"130px","line-height":"45px","font-family":"museoslab500regular;}',
			'.tp-caption.avada_big_black_text' => '{"position":"absolute","color":"#333333","font-size":"42px","line-height":"45px","font-family":"museoslab500regular"}',
			'.tp-caption.avada_big_white_text' => '{"position":"absolute","color":"#fff","font-size":"42px","line-height":"45px","font-family":"museoslab500regular"}',
			'.tp-caption.avada_big_black_text_center' => '{"position":"absolute","color":"#333333","font-size":"38px","line-height":"45px","font-family":"museoslab500regular","text-align":"center"}',
			'.tp-caption.avada_med_green_text' => '{"position":"absolute","color":"#A0CE4E","font-size":"24px","line-height":"24px","font-family":"PTSansRegular, Arial, Helvetica, sans-serif"}',
			'.tp-caption.avada_small_gray_text' => '{"position":"absolute","color":"#747474","font-size":"13px","line-height":"20px","font-family":"PTSansRegular, Arial, Helvetica, sans-serif"}',
			'.tp-caption.avada_small_white_text' => '{"position":"absolute","color":"#fff","font-size":"13px","line-height":"20px","font-family":"PTSansRegular, Arial, Helvetica, sans-serif","text-shadow":"0px 2px 5px rgba(0, 0, 0, 0.5)","font-weight":"700"}',
			'.tp-caption.avada_block_black' => '{"position":"absolute","color":"#A0CE4E","text-shadow":"none","font-size":"22px","line-height":"34px","padding":"0px 10px","padding-top":"1px","margin":"0px","border-width":"0px","border-style":"none","background-color":"#000","font-family":"PTSansRegular, Arial, Helvetica, sans-serif"}',
			'.tp-caption.avada_block_green' => '{"position":"absolute","color":"#000","text-shadow":"none","font-size":"22px","line-height":"34px","padding":"0px 10px","padding-top":"1px","margin":"0px","border-width":"0px","border-style":"none","background-color":"#A0CE4E","font-family":"PTSansRegular, Arial, Helvetica, sans-serif"}',
			'.tp-caption.avada_block_white' => '{"position":"absolute","color":"#fff","text-shadow":"none","font-size":"22px","line-height":"34px","padding":"0px 10px","padding-top":"1px","margin":"0px","border-width":"0px","border-style":"none","background-color":"#000","font-family":"PTSansRegular, Arial, Helvetica, sans-serif"}',
			'.tp-caption.avada_block_white_trans' => '{"position":"absolute","color":"#fff","text-shadow":"none","font-size":"22px","line-height":"34px","padding":"0px 10px","padding-top":"1px","margin":"0px","border-width":"0px","border-style":"none","background-color":"rgba(0, 0, 0, 0.6)","font-family":"PTSansRegular, Arial, Helvetica, sans-serif"}',
		);

		foreach($styles as $handle => $params) {
			$test = $wpdb->get_var($wpdb->prepare('SELECT handle FROM ' . $table_name . ' WHERE handle = %s', $handle));

			if($test != $handle) {
				$wpdb->replace(
					$table_name,
					array(
						'handle' => $handle,
						'params' => $params,
					),
					array(
						'%s',
						'%s',
					)
				);
			}
		}
		update_option('avada_revslider_version', $plugin_version);
	}
}

/* Importer */
$importer = get_template_directory() . '/framework/plugins/importer/importer.php';
include $importer;

/**
 * Retrieve protected post password form content.
 *
 */
add_filter( 'the_password_form', 'avada_get_the_password_form' );

function avada_get_the_password_form() {
	global $smof_data, $post;

	$label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
	$output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<p>' . __( 'This content is password protected. To view it please enter your password below:', 'Avada' ) . '</p>
	<p><label for="' . $label . '">' . __( 'Password:', 'Avada' ) . '</label><input class="password" name="post_password" id="' . $label . '" type="password" size="20" /><input class="' . sprintf( 'btn btn-default button small fusion-button button-small button-default button-%s button-%s', strtolower( $smof_data['button_shape'] ), strtolower( $smof_data['button_type'] ) ) . '"  type="submit" name="Submit" value="' . esc_attr__( 'Submit', 'Avada' ) . '" /></p></form>
	';
	return $output;
}

/**
 * Woo Config
 */
if( class_exists('Woocommerce') ) {
	include_once( get_template_directory() . '/framework/woo-config.php' );
}

// make wordpress respect the search template on an empty search
if(! is_admin() ) {
	function empty_search_filter($query) {
		if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
			$query->is_search = true;
			$query->is_home = false;
		}
		return $query;
	}
	add_filter('pre_get_posts','empty_search_filter');
}

//////////////////////////////////////////////////////////////////
// Woo Products Shortcode Recode
//////////////////////////////////////////////////////////////////
function avada_woo_product($atts, $content = null) {
	global $woocommerce_loop;

	if (empty($atts)) return;

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 1,
		'no_found_rows' => 1,
		'post_status' => 'publish',
		'meta_query' => array(
			array(
				'key' => '_visibility',
				'value' => array('catalog', 'visible'),
				'compare' => 'IN'
			)
		),
		'columns' => 1
	);

	if(isset($atts['sku'])){
		$args['meta_query'][] = array(
			'key' => '_sku',
			'value' => $atts['sku'],
			'compare' => '='
		);
	}

	if(isset($atts['id'])){
		$args['p'] = $atts['id'];
	}

	ob_start();

	if(isset($columns)) {
		$woocommerce_loop['columns'] = $columns;
	}

	$products = new WP_Query( $args );

	if ( $products->have_posts() ) : ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php woocommerce_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	<?php endif;

	wp_reset_postdata();

	return '<div class="woocommerce">' . ob_get_clean() . '</div>';
}

add_action('wp_loaded', 'remove_product_shortcode');
function remove_product_shortcode() {
	if(class_exists('Woocommerce')) {
		// First remove the shortcode
		remove_shortcode('product');
		// Then recode it
		add_shortcode('product', 'avada_woo_product');
	}
}


// Support email login on my account dropdown
remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );
add_filter( 'authenticate', 'avada_email_login_auth', 20, 3 );
function avada_email_login_auth( $user, $username, $password ) {
	if ( is_a( $user, 'WP_User' ) )
		return $user;

	if ( !empty( $username ) ) {
		$username = str_replace( '&', '&amp;', stripslashes( $username ) );
		$user = get_user_by( 'email', $username );
		if ( isset( $user, $user->user_login, $user->user_status ) && 
			0 == (int) $user->user_status 
		) {
			$username = $user->user_login;
		}
	}

	return wp_authenticate_username_password( null, $username, $password );
}

// No redirect on woo my account dropdown login when it fails
add_action( 'init', 'avada_load_login_redirect_support' ); 
function avada_load_login_redirect_support() {
	if( class_exists('Woocommerce') ) {

		add_action( 'wp_login_failed', 'avada_login_fail' ); 
		function avada_login_fail( $username ) {

			if( is_account_page() )
				return;

			$referer = parse_url( $_SERVER['HTTP_REFERER'] );
			$referer = '//' . $referer['host'] . '' . $referer['path'];

			// if there's a valid referrer, and it's not the default log-in screen
			if( ! empty( $referer ) && 
				! strstr( $referer, 'wp-login' ) && 
				! strstr( $referer, 'wp-admin' ) 
			) {
				// let's append some information (login=failed) to the URL for the theme to use
				wp_redirect( $referer . '?login=failed' ); 
				exit;
			}
		}
	}
}

// TGM Plugin Activation
require_once dirname( __FILE__ ) . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'avada_register_required_plugins' );
function avada_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'	 				=> 'Revolution Slider', // The plugin name
			'slug'	 				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/revslider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.6.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'	 				=> 'Fusion Core', // The plugin name
			'slug'	 				=> 'fusion-core', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/fusion-core.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.6.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'	 				=> 'LayerSlider WP', // The plugin name
			'slug'	 				=> 'LayerSlider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/LayerSlider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.3.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'Avada';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'	   		=> 'Avada',		 	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',						 	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'		 		=> 'install-required-plugins', 	// Menu slug
		'has_notices'	  	=> true,					   	// Show admin notices or not
		'is_automatic'		=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'	  		=> array(
			'page_title'					   			=> __( 'Install Required Plugins', 'Avada' ),
			'menu_title'					   			=> __( 'Install Plugins', 'Avada' ),
			'installing'					   			=> __( 'Installing Plugin: %s', 'Avada' ), // %1$s = plugin name
			'oops'							 			=> __( 'Something went wrong with the plugin API.', 'Avada' ),
			'notice_can_install_required'	 			=> _n_noop( 'This theme requires the following plugin installed or update: %1$s.', 'This theme requires the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin installed or updated: %1$s.', 'This theme recommends the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'				=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'						   			=> __( 'Return to Required Plugins Installer', 'Avada' ),
			'plugin_activated'				 			=> __( 'Plugin activated successfully.', 'Avada' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'Avada' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}

/**
 * Show a shop page description on product archives
 */
function woocommerce_product_archive_description() {
	if ( is_post_type_archive( 'product' ) && get_query_var( 'paged' ) == 0 ) {
		$shop_page   = get_post( woocommerce_get_page_id( 'shop' ) );
		$description = apply_filters( 'the_content', $shop_page->post_content );
		if ( $description ) {
			echo '<div class="post-content">' . $description . '</div>';
		}
	}
}

/**
 * Auto Updater Code
 */
function avada_auto_updater() {
	global $smof_data;

	if( $smof_data['tf_username'] && $smof_data['tf_api'] && $smof_data['tf_purchase_code'] ) {
		$theme_info = wp_get_theme();
		if( $theme_info->parent_theme ) {
			$template_dir =  basename( get_template_directory() );
			$theme_info = wp_get_theme( $template_dir );
		}

		$name = $theme_info->get( 'Name' );
		$slug = $theme_info->get_template();

		require_once( get_template_directory() . '/framework/class-updater.php' );
		$theme_update = new AvadaThemeUpdater( 'http://updates.theme-fusion.com/avada-theme.php', $name, $slug );
	}
}
add_action( 'admin_init', 'avada_auto_updater' );

/**
 * Layerslider API
 */
function avada_layerslider_ready() {
	if( class_exists('LS_Sources') ) {
		LS_Sources::addSkins( get_template_directory().'/framework/ls-skins' );
	}
	if( defined( 'LS_PLUGIN_BASE' ) ) {
		remove_action( 'after_plugin_row_' . LS_PLUGIN_BASE, 'layerslider_plugins_purchase_notice', 10, 3 );
	}
}
add_action( 'layerslider_ready', 'avada_layerslider_ready' );