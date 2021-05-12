<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @package wp-carousel-pro
 */
class WP_Carousel_Pro_Public {

	/**
	 * Script and style suffix
	 *
	 * @since 3.0.0
	 * @access protected
	 * @var string
	 */
	protected $suffix;

	/**
	 * The ID of the plugin.
	 *
	 * @since 3.0.0
	 * @access protected
	 * @var string      $plugin_name The ID of this plugin
	 */
	protected $plugin_name;

	/**
	 * The version of the plugin
	 *
	 * @since 3.0.0
	 * @access protected
	 * @var string      $version The current version fo the plugin.
	 */
	protected $version;

	/**
	 * Initialize the class sets its properties.
	 *
	 * @since 3.0.0
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of the plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->suffix      = defined( 'WP_DEBUG' ) && WP_DEBUG ? '' : '.min';
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the plugin.
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public function enqueue_styles() {
		if ( wpcp_get_option( 'wpcp_enqueue_slick_css', true ) ) {
			wp_enqueue_style( 'wpcp-slick', WPCAROUSEL_URL . 'public/css/slick' . $this->suffix . '.css', array(), $this->version, 'all' );
		}
		if ( wpcp_get_option( 'wpcp_enqueue_bx_css', true ) ) {
			wp_enqueue_style( 'wpcp-bx-slider-css', WPCAROUSEL_URL . 'public/css/jquery.bxslider.min.css', array(), $this->version, 'all' );
		}
		if ( wpcp_get_option( 'wpcp_enqueue_fa_css', true ) ) {
			wp_enqueue_style( $this->plugin_name . '-fontawesome', WPCAROUSEL_URL . 'public/css/font-awesome.min.css', array(), $this->version, 'all' );
		}
		if ( wpcp_get_option( 'wpcp_enqueue_fancybox_css', true ) ) {
			wp_enqueue_style( 'wpcp-fancybox-popup', WPCAROUSEL_URL . 'public/css/jquery.fancybox.min.css', array(), $this->version, 'all' );
		}
		wp_enqueue_style( $this->plugin_name, WPCAROUSEL_URL . 'public/css/wp-carousel-pro-public' . $this->suffix . '.css', array(), $this->version, 'all' );
		$wpcp_posts = new WP_Query(
			array(
				'post_type'      => 'sp_wp_carousel',
				'posts_per_page' => 500,
				'fields'         => 'ids',
			)
		);

		$carousel_ids = $wpcp_posts->posts;
		$dynamic_css  = '';

		foreach ( $carousel_ids as $carousel_id ) {
			include WPCAROUSEL_PATH . '/public/dynamic-style.php';
		}
		wp_add_inline_style( $this->plugin_name, $dynamic_css );

	}

	/**
	 * Register the JavaScript for the public-facing side of the plugin.
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_register_script( 'wpcp-preloader', WPCAROUSEL_URL . 'public/js/preloader' . $this->suffix . '.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'wpcp-slick', WPCAROUSEL_URL . 'public/js/slick' . $this->suffix . '.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'wpcp-slick-config', WPCAROUSEL_URL . 'public/js/wp-carousel-pro-public' . $this->suffix . '.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'wpcp-bx-slider', WPCAROUSEL_URL . 'public/js/jquery.bxslider.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'wpcp-bx-slider-config', WPCAROUSEL_URL . 'public/js/bxslider.config' . $this->suffix . '.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'wpcp-fancybox-popup', WPCAROUSEL_URL . 'public/js/fancybox.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'wpcp-fancybox-config', WPCAROUSEL_URL . 'public/js/fancybox-config' . $this->suffix . '.js', array( 'jquery' ), $this->version, true );

	}
}
