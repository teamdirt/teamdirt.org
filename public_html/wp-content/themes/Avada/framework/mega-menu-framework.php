<?php
/**
 * Fusion MegaMenu Functions
 *
 * WARNING: This file is part of the Mega Menu Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 *
 * @package  Fusion/MegaMenu
 * @author   ThemeFusion
 * @link	 http://theme-fusion.com
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

// Don't duplicate me!
if( ! class_exists( 'FusionMegaMenuFramework' ) ) {

	/**
	 * Main FusionMegaMenuFramework Class
	 *
	 * @since	   4.0.0
	 */
	class FusionMegaMenuFramework {

		public static $_version = '4.0.0';
		public static $_name;

		public static $_url;
		public static $_urls;
		public static $_dir;
		public static $_dirs;

		public static $_classes;

		function __construct() {

			$this->init();

			add_action( 'fusion_init', 				array( $this, 'include_functions' ) );

			add_action( 'admin_enqueue_scripts', 	array( $this, 'register_scripts' ) );
			add_action( 'admin_enqueue_scripts',	array( $this, 'register_stylesheets' ) );

			do_action( 'fusion_init' );

		} // end __construct()

		static function init() {

			// Windows-proof constants: replace backward by forward slashes. Thanks to: @peterbouwmeester
			self::$_dir	 = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
			$wp_content_dir = trailingslashit( str_replace( '\\', '/', WP_CONTENT_DIR ) );
			$relative_url   = str_replace( $wp_content_dir, '', self::$_dir );
			$wp_content_url = ( is_ssl() ? str_replace( 'http://', 'https://', WP_CONTENT_URL ) : WP_CONTENT_URL );
			self::$_url	 = trailingslashit( $wp_content_url ) . $relative_url;

			self::$_urls = array(
				'parent'	=> get_template_directory_uri() . '/',
				'child' 	=> get_stylesheet_directory() . '/',
				'framework'	=> self::$_url . 'framework',
			);

			self::$_urls['admin-js'] = self::$_urls['parent'] . 'admin/assets/js';
			self::$_urls['admin-css'] = self::$_urls['parent'] . 'admin/assets/css';

			self::$_dirs = array(
				'parent' 	=> get_template_directory() . '/',
				'child' 	=> get_stylesheet_directory() . '/',
				'framework' => self::$_dir . 'frameowrk',
			);

		} // end init()


		public function include_functions() {


			// Load functions

			require_once( 'mega-menus.php' );

			self::$_classes['menus'] = new FusionMegaMenu();


		} // end include_functions()

		/**
		 * Register megamenu javascript assets
		 *
		 * @return void
		 *
		 * @since  3.4
		 */
		function register_scripts( $hook ) {
			if( $hook == 'nav-menus.php' ) {
				$theme_info = wp_get_theme();

				// scripts
				wp_enqueue_media();
				wp_register_script( 'avada-megamenu', self::$_urls['admin-js'] . '/mega-menu.js', array(), $theme_info->get( 'Version' ) );
				wp_enqueue_script( 'avada-megamenu' );
			}
		}

		/**
		 * Enqueue megamenu stylesheets
		 *
		 * @return void
		 *
		 * @since  3.4
		 */
		function register_stylesheets( $hook ) {
			if( $hook == 'nav-menus.php' ) {
				$theme_info = wp_get_theme();
				
				wp_enqueue_style( 'avada-megamenu', self::$_urls['admin-css'] . '/mega-menu.css', false, $theme_info->get( 'Version' ) );
			}
		}



	}

	$fusioncore = new FusionMegaMenuFramework();

}