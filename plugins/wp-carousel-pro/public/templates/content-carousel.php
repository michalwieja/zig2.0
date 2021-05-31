<?php
/**
 * The image carousel template.
 *
 * @package WP_Carousel_Pro
 * @subpackage WP_Carousel_Pro/public/templates
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
$content_sources = $upload_data['carousel_content_source'];
if ( empty( $content_sources ) ) {
	return;
}
echo '<div id="wpcpro-wrapper-' . $post_id . '" class="wpcp-carousel-wrapper wpcpro-wrapper wpcp-wrapper-' . $post_id . '">';
if ( $section_title ) {
	echo '<h2 class="sp-wpcpro-section-title">' . get_the_title( $post_id ) . '</h2>';
}
if ( $preloader ) {
	require WPCAROUSEL_PATH . '/public/templates/preloader.php';
}
echo '<div id="sp-wp-carousel-pro-id-' . $post_id . '" class="' . $carousel_classes . '" ' . ( 'ticker' === $carousel_mode ? $wpcp_bx_config : $wpcp_slick_options ) . $the_rtl . '>';
( ( 'rand' === $image_orderby ) ? shuffle( $content_sources ) : '' );
global $wp_embed;
foreach ( $content_sources as $content_source ) {
	$wpcp_inline_css = $content_source['wpcp_carousel_content_bg'];
	$image_bg        = '';
	$color_bg        = 'background-color: ' . $wpcp_inline_css['background-color'] . ';';

	if ( ! empty( $wpcp_inline_css['background-image']['url'] ) ) {
		$image_bg = ' background-image: url(' . $wpcp_inline_css['background-image']['url'] . '); background-position: ' . $wpcp_inline_css['background-position'] . '; background-repeat: ' . $wpcp_inline_css['background-repeat'] . '; background-size: ' . $wpcp_inline_css['background-size'] . '; background-attachment: ' . $wpcp_inline_css['background-attachment'] . ';';
	} else {
		$image_bg = ' background-image: linear-gradient(' . $wpcp_inline_css['background-gradient-direction'] . ', ' . $wpcp_inline_css['background-color'] . ', ' . $wpcp_inline_css['background-gradient-color'] . ');';
	}
	printf( '<div class="wpcp-single-item" style="%1$s%2$s"><div class="wpcp-single-content">%3$s</div></div>', $color_bg, $image_bg, wpautop( do_shortcode( $wp_embed->autoembed( $content_source['carousel_content_description'] ) ) ) );
}
echo '</div>
</div>'; // Carousel Wrapper.
