<?php
/**
 * A carousel plugin for WordPress.
 *
 * @link              https://shapedplugin.com/
 * @since             3.0.0
 * @package           WP_Carousel_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Carousel Pro
 * Plugin URI:        https://shapedplugin.com/plugin/wordpress-carousel-pro/
 * Description:       Responsive WordPress Carousel plugin to create beautiful carousels easily. Build responsive Image Carousel, Post Carousel, WooCommerce Product Carousel, Content Carousel, Video Carousel, and more.
 * Version:           3.2.5
 * Author:            ShapedPlugin
 * Author URI:        https://shapedplugin.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-carousel-pro
 * Domain Path:       /languages
 * WC requires at least: 4.0
 * WC tested up to: 5.2.2
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WPCAROUSEL_PRO_FILE', __FILE__ );

/**
 * Main class of the plugin
 *
 * @package WP_Carousel_Pro
 * @author Shamim Mia <shamhagh@gmail.com>
 */
class SP_WP_Carousel_Pro {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    3.0.0
	 * @access   protected
	 * @var      WP_Carousel_Pro_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	public $loader;

	/**
	 * The unique name of this plugin.
	 *
	 * @since    3.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    3.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Plugin textdomain.
	 *
	 * @since 3.0.0
	 *
	 * @var string
	 */
	public $domain = 'wp-carousel-pro';

	/**
	 * Plugin license.
	 *
	 * @since 3.2.0
	 *
	 * @var string
	 */
	public $license;

	/**
	 * Minimum PHP version required
	 *
	 * @since 3.0.0
	 * @var string
	 */
	private $min_php = '5.6';

	/**
	 * Plugin file.
	 *
	 * @var string
	 */
	private $file = __FILE__;

	/**
	 * Holds class object
	 *
	 * @var object
	 *
	 * @since 3.0.0
	 */
	private static $instance;

	/**
	 * Initialize the SP_WP_Carousel_Pro() class
	 *
	 * @since 3.0.0
	 * @return object
	 */
	public static function init() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof SP_WP_Carousel_Pro ) ) {
			self::$instance = new SP_WP_Carousel_Pro();
			self::$instance->setup();
		}
		return self::$instance;
	}

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    3.0.0
	 */
	public function setup() {

		$this->plugin_name = 'wp-carousel-pro';
		$this->version     = '3.2.5';
		$this->define_constants();
		$this->includes();
		$this->load_dependencies();
		$this->set_locale();
		$this->define_common_hooks();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Define plugin constants.
	 *
	 * @return void
	 */
	private function define_constants() {
		$this->define( 'WPCAROUSEL_BASENAME', plugin_basename( __FILE__ ) );
		$this->define( 'WPCAROUSEL_VERSION', $this->version );
		$this->define( 'WPCAROUSEL_PATH', plugin_dir_path( __FILE__ ) );
		$this->define( 'WPCAROUSEL_INCLUDES', WPCAROUSEL_PATH . '/includes' );
		$this->define( 'WPCAROUSEL_URL', plugin_dir_url( __FILE__ ) );
		$this->define( 'WPCAROUSEL_ITEM_NAME', 'WordPress Carousel Pro' );
		$this->define( 'WPCAROUSEL_ITEM_SLUG', 'wp-carousel-pro' );
		$this->define( 'WPCAROUSEL_ITEM_ID', 411 );
		$this->define( 'WPCAROUSEL_STORE_URL', 'https://shapedplugin.com' );
		$this->define( 'WPCAROUSEL_PRODUCT_URL', 'https://shapedplugin.com/plugin/wordpress-carousel-pro/' );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param  string      $name Constant name.
	 * @param  string|bool $value Constant Value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Included required files.
	 *
	 * @return void
	 */
	public function includes() {

		require_once WPCAROUSEL_INCLUDES . '/class-wp-carousel-pro-loader.php';
		require_once WPCAROUSEL_INCLUDES . '/class-wp-carousel-pro-post-types.php';
		require_once WPCAROUSEL_PATH . '/admin/views/wpcpro-metabox/classes/setup.class.php';
		require_once WPCAROUSEL_PATH . '/admin/views/metabox-config.php';
		require_once WPCAROUSEL_PATH . '/admin/views/option-config.php';
		require_once WPCAROUSEL_INCLUDES . '/class-wp-carousel-pro-shortcode.php';
		require_once WPCAROUSEL_PATH . '/public/shortcode-deprecated.php';
		require_once WPCAROUSEL_INCLUDES . '/class-wp-carousel-pro-i18n.php';
		require_once WPCAROUSEL_PATH . '/public/class-wp-carousel-pro-public.php';
		require_once WPCAROUSEL_INCLUDES . '/class-wp-carousel-pro-updater.php';
		// if ( is_admin() ) {
			require_once WPCAROUSEL_PATH . '/admin/class-wp-carousel-pro-admin.php';
			require_once WPCAROUSEL_PATH . '/admin/image-resizer.php';
			require_once WPCAROUSEL_PATH . '/admin/views/tmce-button.php';
			require_once WPCAROUSEL_PATH . '/admin/views/help.php';
			require_once WPCAROUSEL_PATH . '/admin/helper/class-wp-carousel-pro-cron.php';
			require_once WPCAROUSEL_INCLUDES . '/class-wp-carousel-pro-license.php';
		// }
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WP_Carousel_Pro_Loader. Orchestrates the hooks of the plugin.
	 * - WP_Carousel_Pro_i18n. Defines internationalization functionality.
	 * - WP_Carousel_Pro_Admin. Defines all hooks for the admin area.
	 * - WP_Carousel_Pro_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    3.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		$this->loader = new WP_Carousel_Pro_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the WP_Carousel_Pro_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    3.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new WP_Carousel_Pro_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register common hooks.
	 *
	 * @since 3.0.0
	 * @access private
	 */
	private function define_common_hooks() {
		$plugin_cpt = new WP_Carousel_Pro_Post_Type( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'init', $plugin_cpt, 'wp_carousel_post_type', 11 );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new WP_Carousel_Pro_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_admin_styles' );

		$this->loader->add_filter( 'post_updated_messages', $plugin_admin, 'wpcp_carousel_updated_messages', 10, 2 );
		$this->loader->add_filter( 'manage_sp_wp_carousel_posts_columns', $plugin_admin, 'filter_carousel_admin_column' );
		$this->loader->add_action( 'manage_sp_wp_carousel_posts_custom_column', $plugin_admin, 'display_carousel_admin_fields', 10, 2 );
		$this->loader->add_action( 'admin_action_sp_wpcp_duplicate_carousel', $plugin_admin, 'sp_wpcp_duplicate_carousel' );
		$this->loader->add_filter( 'post_row_actions', $plugin_admin, 'sp_wpcp_duplicate_carousel_link', 10, 2 );
		$this->loader->add_filter( 'admin_footer_text', $plugin_admin, 'sp_wpcp_review_text', 10, 2 );

		// License Page.
		$manage_license = new WP_Carousel_Pro_License( WPCAROUSEL_PRO_FILE, WPCAROUSEL_VERSION, 'ShapedPlugin', WPCAROUSEL_STORE_URL, WPCAROUSEL_ITEM_ID, WPCAROUSEL_ITEM_SLUG );

		// Admin Menu.
		$this->loader->add_action( 'admin_init', $manage_license, 'wp_carousel_pro_activate_license' );
		$this->loader->add_action( 'admin_init', $manage_license, 'wp_carousel_pro_deactivate_license' );

		$this->loader->add_action( 'wp_carousel_pro_weekly_scheduled_events', $manage_license, 'check_license_status' );
		// this code for testing.
		// $this->loader->add_action( 'admin_init', $manage_license, 'check_license_status' );

		// Init Updater.
		$this->loader->add_action( 'admin_init', $manage_license, 'init_updater', 0 );

		// Display notices to admins.
		$this->loader->add_action( 'admin_notices', $manage_license, 'license_active_notices' );
		$this->loader->add_action( 'in_plugin_update_message-' . WPCAROUSEL_BASENAME, $manage_license, 'plugin_row_license_missing', 10, 2 );

		// Redirect after active.
		$this->loader->add_action( 'activated_plugin', $this, 'redirect_to' );

		// Help Page.
		$help_page = new WP_Carousel_Pro_Help( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_menu', $help_page, 'help_admin_menu', 40 );
		$this->loader->add_filter( 'plugin_action_links', $help_page, 'add_plugin_action_links', 10, 2 );

		// DB Updater.
		new WP_Carousel_Pro_Updater();
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WP_Carousel_Pro_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$plugin_shortcode = new WP_Carousel_Pro_Shortcode( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_shortcode( 'sp_wpcarousel', $plugin_shortcode, 'sp_wp_carousel_shortcode' );

	}

	/**
	 * Redirect after active.
	 *
	 * @return void
	 */
	public function redirect_to( $plugin ) {
		if ( WPCAROUSEL_BASENAME === $plugin ) {
			exit( wp_redirect( admin_url( 'edit.php?post_type=sp_wp_carousel&page=wpcp_settings#tab=1' ) ) );
		}
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     3.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     3.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     3.0.0
	 * @return    WP_Carousel_Pro_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    3.0.0
	 */
	public function run() {
		$this->loader->run();
	}

} // SP_WP_Carousel_Pro

/**
 * Main instance of WP Carousel Pro
 *
 * Returns the main instance of the WP Carousel Pro.
 *
 * @since 3.0.0
 * @return void
 */
function sp_wpcp() {
	$plugin = SP_WP_Carousel_Pro::init();
	$plugin->loader->run();
}
// Launch it out.
sp_wpcp();
