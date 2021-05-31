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

$gallery_ids            = $upload_data['wpcp_gallery'];
$is_image_link_nofollow = isset( $shortcode_data['wpcp_logo_link_nofollow'] ) ? $shortcode_data['wpcp_logo_link_nofollow'] : '';
$image_link_nofollow    = true == $is_image_link_nofollow ? ' rel="nofollow"' : '';

// Lightbox meta options.
$show_lightbox_image_counter = isset( $shortcode_data['wpcp_image_counter'] ) ? $shortcode_data['wpcp_image_counter'] : '';
$show_lightbox_image_caption = isset( $shortcode_data['wpcp_l_box_image_caption'] ) ? $shortcode_data['wpcp_l_box_image_caption'] : '';
$show_lightbox_image_thumb   = isset( $shortcode_data['wpcp_thumbnails_gallery'] ) ? $shortcode_data['wpcp_thumbnails_gallery'] : '';
$show_lightbox_control       = isset( $shortcode_data['wpcp_lb_control'] ) ? $shortcode_data['wpcp_lb_control'] : '';
$show_img_count              = $show_lightbox_image_counter ? 'true' : 'false';
$show_l_box_img_caption      = $show_lightbox_image_caption ? true : false;
$show_l_box_control          = $show_lightbox_control ? true : false;
$show_img_thumb              = $show_lightbox_image_thumb ? 'thumbs' : '';

$lightbox_data    = 'data-infobar="' . $show_img_count . '" data-thumbs="' . $show_img_thumb . '"  data-lb_control="' . $show_l_box_control . '"';
$lightbox_setting = ( 'l_box' === $image_link_show ) ? $lightbox_data : '';

if ( empty( $gallery_ids ) ) {
			return;
}
echo '<div id="wpcpro-wrapper-' . $post_id . '" class="wpcp-carousel-wrapper wpcpro-wrapper wpcp-wrapper-' . $post_id . '">';
if ( $section_title ) {
	echo '<h2 class="sp-wpcpro-section-title">' . get_the_title( $post_id ) . '</h2>';
}
if ( $preloader ) {
	require WPCAROUSEL_PATH . '/public/templates/preloader.php';
}
echo '<div id="sp-wp-carousel-pro-id-' . $post_id . '" class="' . $carousel_classes . '" ' . ( 'ticker' === $carousel_mode ? $wpcp_bx_config : $wpcp_slick_options ) . $the_rtl . $lightbox_setting . '>';

$attachments = explode( ',', $gallery_ids );
( ( 'rand' == $image_orderby ) ? shuffle( $attachments ) : '' );
if ( is_array( $attachments ) || is_object( $attachments ) ) :
	foreach ( $attachments as $attachment ) {
		$image_data          = get_post( $attachment );
		$image_title         = $image_data->post_title;
		$image_caption       = $image_data->post_excerpt;
		$image_description   = $image_data->post_content;
		$image_alt_titles    = $image_data->_wp_attachment_image_alt;
		$image_alt_title     = ! empty( $image_alt_titles ) ? $image_alt_titles : $image_title;
		$image_light_box_url = wp_get_attachment_image_src( $attachment, 'full' );
		$image_url           = wp_get_attachment_image_src( $attachment, $image_sizes );
		$image_width_attr    = ( $is_variable_width && 'ticker' !== $carousel_mode ) ? 'auto' : $image_url[1];
		$image_height_attr   = $image_url[2];

		$image_linking_meta = wp_get_attachment_metadata( $attachment );
		$image_linking_urls = $image_linking_meta['image_meta'];
		$image_linking_url  = ( ! empty( $image_linking_urls['wpcplinking'] ) ? esc_url( $image_linking_urls['wpcplinking'] ) : '' );

		$the_image_title_attr = ' title="' . $image_title . '"';
		$image_title_attr     = 'true' == $show_image_title_attr ? $the_image_title_attr : '';

		if ( ( 'custom' === $image_sizes ) && ( ! empty( $image_width ) && $image_light_box_url[1] >= ! $image_width ) && ( ! empty( $image_height ) ) && $image_light_box_url[2] >= ! $image_height ) {
			$image_resize_url  = the_wpcp_aq_resize( $image_light_box_url[0], $image_width, $image_height, $image_crop );
			$image_width_attr  = ( $is_variable_width && 'ticker' !== $carousel_mode ) ? 'auto' : $image_width;
			$image_height_attr = $image_height;
		}
		$image_src = ! empty( $image_resize_url ) ? $image_resize_url : $image_url[0];
		if ( 'false' !== $lazy_load_image && 'ticker' !== $carousel_mode ) {
				$image = sprintf( '<img class="wcp-lazy" data-lazy="%1$s" src="%2$s"%3$s alt="%4$s" width="%5$s" height="%6$s">', $image_src, $lazy_load_img, $image_title_attr, $image_alt_title, $image_width_attr, $image_height_attr );
		} else {
			$image = sprintf( '<img src="%1$s"%2$s alt="%3$s" width="%4$s" height="%5$s" class="skip-lazy">', $image_src, $image_title_attr, $image_alt_title, $image_width_attr, $image_height_attr );
		}

		// Image Caption and description.
		$caption_html_tag = apply_filters( 'filter_wpcp_image_caption_tag', 'h2' );
		$caption          = sprintf( '<' . $caption_html_tag . ' class="wpcp-image-caption">%1$s</' . $caption_html_tag . '>', $image_caption );
		if ( 'link' === $image_link_show && ! empty( $image_linking_url ) ) {
				$caption = sprintf( '<' . $caption_html_tag . ' class="wpcp-image-caption"><a href="%1$s" target="%2$s"%3$s>%4$s</a></' . $caption_html_tag . '>', $image_linking_url, $link_target, $image_link_nofollow, $image_caption );
		}
		if ( 'l_box' === $image_link_show ) {
			$caption = sprintf( '<' . $caption_html_tag . ' class="wpcp-image-caption"><a class="wcp-light-box-caption" href="#" %1$s>%2$s</a></' . $caption_html_tag . '>', $image_link_nofollow, $image_caption );
		}

		$description  = sprintf( '<p class="wpcp-image-description">%1$s</p>', $image_description );
		$all_captions = '';
		if ( ( $show_img_caption && ! empty( $image_caption ) ) || ( $show_img_description && ! empty( $image_description ) ) ) {
			$all_captions = '<div class="wpcp-all-captions">' . ( $show_img_caption && ! empty( $image_caption ) ? $caption : '' ) . ( $show_img_description && ! empty( $image_description ) ? $description : '' ) . '</div>';
		}

		// Single Image Item.
		echo '<div class="wpcp-single-item">';
		if ( 'l_box' === $image_link_show ) {
			$l_box_cap = $show_l_box_img_caption ? $image_caption : '';
			echo sprintf( '<div class="wpcp-slide-image"><a class="wcp-light-box" href="%1$s" data-fancybox="wpcp_view" data-buttons=["zoom","slideShow","fullScreen","share","download","%6$s","close"] data-lightbox-gallery="group-%2$s" data-caption="%5$s">%3$s</a></div>%4$s', esc_url( $image_light_box_url[0] ), $post_id, $image, $all_captions, $l_box_cap, $show_img_thumb );
		} elseif ( 'link' === $image_link_show && isset( $image_linking_url ) && filter_var( $image_linking_url, FILTER_VALIDATE_URL ) ) {
			echo sprintf( '<div class="wpcp-slide-image"><a href="%1$s" target="%2$s"%3$s>%4$s</a></div>%5$s', $image_linking_url, $link_target, $image_link_nofollow, $image, $all_captions );
		} else {
			echo sprintf( '<div class="wpcp-slide-image">%1$s</div>%2$s', $image, $all_captions );
		}
		echo '</div>';
	} // End foreach.
endif;
echo '</div>';
echo '</div>'; // Carousel Wrapper.
