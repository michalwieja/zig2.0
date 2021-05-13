<?php
/**
 * The style file for the WP Carousel pro.
 *
 * @package WP Carousel Pro
 */

$upload_data = get_post_meta( $carousel_id, 'sp_wpcp_upload_options', true );
$css_data    = get_post_meta( $carousel_id, 'sp_wpcp_shortcode_options', true );
/**
 * Carousel section title styles.
 */
$carousel_type = isset( $upload_data['wpcp_carousel_type'] ) ? $upload_data['wpcp_carousel_type'] : '';
$section_title = isset( $css_data['section_title'] ) ? $css_data['section_title'] : true;

$section_title_dynamic_css = '';

/**
 * Carousel section title styles.
 */
if ( $section_title ) {
	$section_title_margin        = isset( $css_data['section_title_margin_'] ) && ! empty( $css_data['section_title_margin_'] ) ? $css_data['section_title_margin_'] : ' ';
	$section_title_margin_top    = isset( $section_title_margin['top'] ) ? $section_title_margin['top'] : '0';
	$section_title_margin_right  = isset( $section_title_margin['right'] ) ? $section_title_margin['right'] : '0';
	$section_title_margin_bottom = isset( $section_title_margin['bottom'] ) ? $section_title_margin['bottom'] : '30';
	$section_title_margin_left   = isset( $section_title_margin['left'] ) ? $section_title_margin['left'] : '0';

	$section_title_font_load  = isset( $css_data['section_title_font_load'] ) ? $css_data['section_title_font_load'] : '';
	$section_title_typography = isset( $css_data['wpcp_section_title_typography'] ) ? $css_data['wpcp_section_title_typography'] : '';

	$section_title_typography_color      = isset( $section_title_typography['color'] ) ? $section_title_typography['color'] : '#444';
	$section_title_typography_size       = isset( $section_title_typography['font-size'] ) ? $section_title_typography['font-size'] : '24';
	$section_title_typography_height     = isset( $section_title_typography['line-height'] ) ? $section_title_typography['line-height'] : '28';
	$section_title_typography_spacing    = isset( $section_title_typography['letter-spacing'] ) ? $section_title_typography['letter-spacing'] : '0';
	$section_title_typography_transform  = isset( $section_title_typography['text-transform'] ) && ! empty( $section_title_typography['text-transform'] ) ? $section_title_typography['text-transform'] : 'none';
	$section_title_typography_alignment  = isset( $section_title_typography['text-align'] ) ? $section_title_typography['text-align'] : 'center';
	$section_title_typography_family     = isset( $section_title_typography['font-family'] ) ? $section_title_typography['font-family'] : 'Open Sans';
	$section_title_typography_font_style = isset( $section_title_typography['font-style'] ) && ! empty( $section_title_typography['font-style'] ) ? $section_title_typography['font-style'] : 'normal';
	$dynamic_css                        .= '
		.wpcp-wrapper-' . $carousel_id . ' .sp-wpcpro-section-title {
			margin :' . $section_title_margin_top . 'px ' . $section_title_margin_right . 'px ' . $section_title_margin_bottom . 'px ' . $section_title_margin_left . 'px;
			color: ' . $section_title_typography_color . ';
			font-size: ' . $section_title_typography_size . 'px;
			line-height: ' . $section_title_typography_height . 'px;
			letter-spacing: ' . $section_title_typography_spacing . 'px;
			text-transform: ' . $section_title_typography_transform . ';
			text-align: ' . $section_title_typography_alignment . ';';
	if ( $section_title_font_load ) {
		$dynamic_css .= '
			font-family: ' . $section_title_typography_family . ';
			font-weight: ' . ( isset( $section_title_typography['font-weight'] ) && is_numeric( $section_title_typography['font-weight'] ) ? $section_title_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . $section_title_typography_font_style . ';
		';
	}
	$dynamic_css .= '}';
}

/**
 * Image Zoom
 */
$image_zoom = isset( $css_data['wpcp_image_zoom'] ) ? $css_data['wpcp_image_zoom'] : '';

/**
 * Border radius.
 */
$radius_dimension      = isset( $css_data['wpcp_image_border_radius']['all'] ) ? $css_data['wpcp_image_border_radius']['all'] : '';
$radius_unit           = isset( $css_data['wpcp_image_border_radius']['style'] ) ? $css_data['wpcp_image_border_radius']['style'] : '';
$wpcp_slide_background = isset( $css_data['wpcp_slide_background'] ) ? $css_data['wpcp_slide_background'] : '#f9f9f9';
$hide_nav_bg_border    = isset( $css_data['wpcp_hide_nav_bg_border'] ) ? $css_data['wpcp_hide_nav_bg_border'] : '';
$slide_border          = isset( $css_data['wpcp_slide_border'] ) ? $css_data['wpcp_slide_border'] : '';
$slide_border_width    = isset( $slide_border['all'] ) ? $slide_border['all'] : '1';
$slide_border_style    = isset( $slide_border['style'] ) ? $slide_border['style'] : 'solid';
$slide_border_color    = isset( $slide_border['color'] ) ? $slide_border['color'] : '#dddddd';
$slide_margin          = isset( $css_data['wpcp_slide_margin']['all'] ) && is_numeric( $css_data['wpcp_slide_margin']['all'] ) ? $css_data['wpcp_slide_margin']['all'] : '20';
// Inner padding.
$inner_padding        = isset( $css_data['wpcp_slide_inner_padding'] ) ? $css_data['wpcp_slide_inner_padding'] : '';
$inner_padding_top    = isset( $inner_padding['top'] ) ? $inner_padding['top'] : 0;
$inner_padding_right  = isset( $inner_padding['right'] ) ? $inner_padding['right'] : 0;
$inner_padding_bottom = isset( $inner_padding['bottom'] ) ? $inner_padding['bottom'] : 0;
$inner_padding_left   = isset( $inner_padding['left'] ) ? $inner_padding['left'] : 0;
// Pagination margin.
$pagination_margin        = isset( $css_data['wpcp_pagination_margin'] ) ? $css_data['wpcp_pagination_margin'] : '';
$pagination_margin_top    = isset( $pagination_margin['top'] ) ? $pagination_margin['top'] : '20';
$pagination_margin_right  = isset( $pagination_margin['right'] ) ? $pagination_margin['right'] : '0';
$pagination_margin_bottom = isset( $pagination_margin['bottom'] ) ? $pagination_margin['bottom'] : '0';
$pagination_margin_left   = isset( $pagination_margin['left'] ) ? $pagination_margin['left'] : '0';
// Others style .
$image_gray_scale  = isset( $css_data['wpcp_image_gray_scale'] ) ? $css_data['wpcp_image_gray_scale'] : '';
$is_variable_width = isset( $css_data['_variable_width'] ) ? $css_data['_variable_width'] : '';
$variable_width    = $is_variable_width ? 'true' : 'false';
$preloader         = isset( $css_data['wpcp_preloader'] ) ? $css_data['wpcp_preloader'] : true;
// $row_number         = isset( $css_data['wpcp_carousel_row'] ) ? $css_data['wpcp_carousel_row'] : '';
$is_adaptive_height = isset( $css_data['wpcp_adaptive_height'] ) ? $css_data['wpcp_adaptive_height'] : true;
$adaptive_height    = $is_adaptive_height ? 'true' : 'false';
$wpcp_post_detail   = isset( $css_data['wpcp_post_detail_position'] ) ? $css_data['wpcp_post_detail_position'] : '';
$carousel_mode      = isset( $css_data['wpcp_carousel_mode'] ) ? $css_data['wpcp_carousel_mode'] : 'standard';
$variable_width     = $is_variable_width ? 'true' : 'false';
$wpcp_arrows        = isset( $css_data['wpcp_navigation'] ) ? $css_data['wpcp_navigation'] : '';
$vertical_carousel  = isset( $css_data['wpcp_vertical_carousel'] ) ? $css_data['wpcp_vertical_carousel'] : '';
// Responsive style.
$wpcp_screen_sizes = wpcp_get_option( 'wpcp_responsive_screen_setting' );
$desktop_size      = isset( $wpcp_screen_sizes['desktop'] ) ? $wpcp_screen_sizes['desktop'] : '1200';
$laptop_size       = isset( $wpcp_screen_sizes['laptop'] ) ? $wpcp_screen_sizes['laptop'] : '980';
$tablet_size       = isset( $wpcp_screen_sizes['tablet'] ) ? $wpcp_screen_sizes['tablet'] : '736';
$mobile_size       = isset( $wpcp_screen_sizes['mobile'] ) ? $wpcp_screen_sizes['mobile'] : '480';

// Column style.
$column_number     = isset( $css_data['wpcp_number_of_columns'] ) ? $css_data['wpcp_number_of_columns'] : '';
$column_lg_desktop = isset( $column_number['lg_desktop'] ) ? $column_number['lg_desktop'] : '5';
$column_desktop    = isset( $column_number['desktop'] ) ? $column_number['desktop'] : '4';
$column_laptop     = isset( $column_number['laptop'] ) ? $column_number['laptop'] : '3';
$column_tablet     = isset( $column_number['tablet'] ) ? $column_number['tablet'] : '2';
$column_mobile     = isset( $column_number['mobile'] ) ? $column_number['mobile'] : '1';

$wpcp_post_detail        = isset( $css_data['wpcp_post_detail_position'] ) ? $css_data['wpcp_post_detail_position'] : '';
$wpcp_overlay_position   = isset( $css_data['wpcp_overlay_position'] ) ? $css_data['wpcp_overlay_position'] : '';
$wpcp_overlay_visibility = isset( $css_data['wpcp_overlay_visibility'] ) ? $css_data['wpcp_overlay_visibility'] : '';

// Custom css.
$custom_css   = wpcp_get_option( 'wpcp_custom_css' );
$dynamic_css .= $custom_css;

/**
 * Image Carousel CSS.
 */
$image_carousel_dynamic_css = '';
if ( 'image-carousel' == $carousel_type ) {
	$image_caption_font_load            = isset( $css_data['wpcp_image_caption_font_load'] ) ? $css_data['wpcp_image_caption_font_load'] : '';
	$image_caption_typography           = isset( $css_data['wpcp_image_caption_typography'] ) ? $css_data['wpcp_image_caption_typography'] : '';
	$image_caption_typography_color     = isset( $image_caption_typography['color'] ) ? $image_caption_typography['color'] : '#333';
	$image_caption_typography_size      = isset( $image_caption_typography['font-size'] ) ? $image_caption_typography['font-size'] : '15';
	$image_caption_typography_height    = isset( $image_caption_typography['line-height'] ) ? $image_caption_typography['line-height'] : '23';
	$image_caption_typography_spacing   = isset( $image_caption_typography['letter-spacing'] ) ? $image_caption_typography['letter-spacing'] : '0';
	$image_caption_typography_transform = isset( $image_caption_typography['text-transform'] ) && ! empty( $image_caption_typography['text-transform'] ) ? $image_caption_typography['text-transform'] : 'capitalize';
	$image_caption_typography_alignment = isset( $image_caption_typography['text-align'] ) ? $image_caption_typography['text-align'] : 'center';
	$image_caption_typography_family    = isset( $image_caption_typography['font-family'] ) ? $image_caption_typography['font-family'] : 'Open Sans';

	$image_desc_font_load  = isset( $css_data['wpcp_image_desc_font_load'] ) ? $css_data['wpcp_image_desc_font_load'] : '';
	$image_desc_typography = isset( $css_data['wpcp_image_desc_typography'] ) ? $css_data['wpcp_image_desc_typography'] : '';

	$image_desc_typography_color     = isset( $image_desc_typography['color'] ) ? $image_desc_typography['color'] : '#333';
	$image_desc_typography_size      = isset( $image_desc_typography['font-size'] ) ? $image_desc_typography['font-size'] : '14';
	$image_desc_typography_height    = isset( $image_desc_typography['line-height'] ) ? $image_desc_typography['line-height'] : '21';
	$image_desc_typography_spacing   = isset( $image_desc_typography['letter-spacing'] ) ? $image_desc_typography['letter-spacing'] : '0';
	$image_desc_typography_transform = isset( $image_desc_typography['text-transform'] ) && ! empty( $image_desc_typography['text-transform'] ) ? $image_desc_typography['text-transform'] : 'none';
	$image_desc_typography_alignment = isset( $image_desc_typography['text-align'] ) ? $image_desc_typography['text-align'] : 'center';
	$image_desc_typography_family    = isset( $image_desc_typography['font-family'] ) ? $image_desc_typography['font-family'] : 'Open Sans';

	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .wpcp-image-caption a,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .wpcp-image-caption {
			color: ' . $image_caption_typography_color . ';
			font-size: ' . $image_caption_typography_size . 'px;
			line-height: ' . $image_caption_typography_height . 'px;
			letter-spacing: ' . $image_caption_typography_spacing . 'px;
			text-transform: ' . $image_caption_typography_transform . ';
			text-align: ' . $image_caption_typography_alignment . ';';
	if ( $image_caption_font_load ) {
		$dynamic_css .= '
			font-family: ' . $image_caption_typography_family . ';
			font-weight: ' . ( isset( $image_caption_typography['font-weight'] ) && is_numeric( $image_caption_typography['font-weight'] ) ? $image_caption_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $image_caption_typography['font-style'] ) && ! empty( $image_caption_typography['font-style'] ) ? $image_caption_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .wpcp-image-description {
			color: ' . $image_desc_typography_color . ';
			font-size: ' . $image_desc_typography_size . 'px;
			line-height: ' . $image_desc_typography_height . 'px;
			letter-spacing: ' . $image_desc_typography_spacing . 'px;
			text-transform: ' . $image_desc_typography_transform . ';
			text-align: ' . $image_desc_typography_alignment . ';';
	if ( $image_desc_font_load ) {
		$dynamic_css .= '
			font-family: ' . $image_desc_typography_family . ';
			font-weight: ' . ( isset( $image_desc_typography['font-weight'] ) && is_numeric( $image_desc_typography['font-weight'] ) ? $image_desc_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $image_desc_typography['font-style'] ) && ! empty( $image_desc_typography['font-style'] ) ? $image_desc_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}';
	// Lightbox background.
	$lb_overlay_color = isset( $css_data['wpcp_img_lb_overlay_color'] ) ? $css_data['wpcp_img_lb_overlay_color'] : '#0b0b0b';
	$lb_caption_color = isset( $css_data['wpcp_lb_caption_color'] ) ? $css_data['wpcp_lb_caption_color'] : '#ffffff';
	$dynamic_css     .= '.sp-wp-carousel-pro-id-' . $carousel_id . ' .fancybox-bg{
		background: ' . $lb_overlay_color . ';
		opacity: 0.8;
	}
	.sp-wp-carousel-pro-id-' . $carousel_id . ' .fancybox-caption__body{
		color: ' . $lb_caption_color . ';
	}';
}

/**
 * Video Carousel CSS
 */
if ( 'video-carousel' == $carousel_type ) {
	$video_icon_color = $css_data['wpcp_video_icon_color'];
	$dynamic_css     .= '#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item.wcp-video-item i{
			color: ' . $video_icon_color . ';
		}';
}

/**
 * Post Carousel CSS.
 */
if ( 'post-carousel' == $carousel_type ) {
	$post_cat_font_load  = isset( $css_data['wpcp_post_cat_font_load'] ) ? $css_data['wpcp_post_cat_font_load'] : '';
	$post_cat_typography = isset( $css_data['wpcp_post_cat_typography'] ) ? $css_data['wpcp_post_cat_typography'] : '';

	$post_cat_typography_color     = isset( $post_cat_typography['color'] ) ? $post_cat_typography['color'] : '#22afba';
	$post_cat_typography_size      = isset( $post_cat_typography['font-size'] ) ? $post_cat_typography['font-size'] : '14';
	$post_cat_typography_height    = isset( $post_cat_typography['line-height'] ) ? $post_cat_typography['line-height'] : '21';
	$post_cat_typography_spacing   = isset( $post_cat_typography['letter-spacing'] ) ? $post_cat_typography['letter-spacing'] : '0';
	$post_cat_typography_transform = isset( $post_cat_typography['text-transform'] ) && ! empty( $post_cat_typography['text-transform'] ) ? $post_cat_typography['text-transform'] : 'none';
	$post_cat_typography_alignment = isset( $post_cat_typography['text-align'] ) ? $post_cat_typography['text-align'] : 'center';
	$post_cat_typography_family    = isset( $post_cat_typography['font-family'] ) ? $post_cat_typography['font-family'] : 'Open Sans';

	$post_title_font_load  = isset( $css_data['wpcp_title_font_load'] ) ? $css_data['wpcp_title_font_load'] : '';
	$post_title_typography = isset( $css_data['wpcp_title_typography'] ) ? $css_data['wpcp_title_typography'] : '';

	$post_title_typography_color       = isset( $post_title_typography['color'] ) ? $post_title_typography['color'] : '#444';
	$post_title_typography_hover_color = isset( $post_title_typography['hover_color'] ) ? $post_title_typography['hover_color'] : '#555';
	$post_title_typography_size        = isset( $post_title_typography['font-size'] ) ? $post_title_typography['font-size'] : '20';
	$post_title_typography_height      = isset( $post_title_typography['line-height'] ) ? $post_title_typography['line-height'] : '30';
	$post_title_typography_spacing     = isset( $post_title_typography['letter-spacing'] ) ? $post_title_typography['letter-spacing'] : '0';
	$post_title_typography_transform   = isset( $post_title_typography['text-transform'] ) && ! empty( $post_title_typography['text-transform'] ) ? $post_title_typography['text-transform'] : 'none';
	$post_title_typography_alignment   = isset( $post_title_typography['text-align'] ) ? $post_title_typography['text-align'] : 'center';
	$post_title_typography_family      = isset( $post_title_typography['font-family'] ) ? $post_title_typography['font-family'] : 'Open Sans';

	$post_content_font_load            = isset( $css_data['wpcp_post_content_font_load'] ) ? $css_data['wpcp_post_content_font_load'] : '';
	$post_content_typography           = isset( $css_data['wpcp_post_content_typography'] ) ? $css_data['wpcp_post_content_typography'] : '';
	$post_content_typography_color     = isset( $post_content_typography['color'] ) ? $post_content_typography['color'] : '#333333';
	$post_content_typography_size      = isset( $post_content_typography['font-size'] ) ? $post_content_typography['font-size'] : '16';
	$post_content_typography_height    = isset( $post_content_typography['line-height'] ) ? $post_content_typography['line-height'] : '26';
	$post_content_typography_spacing   = isset( $post_content_typography['letter-spacing'] ) ? $post_content_typography['letter-spacing'] : '0';
	$post_content_typography_transform = isset( $post_content_typography['text-transform'] ) && ! empty( $post_content_typography['text-transform'] ) ? $post_content_typography['text-transform'] : 'none';
	$post_content_typography_alignment = isset( $post_content_typography['text-align'] ) ? $post_content_typography['text-align'] : 'center';
	$post_content_typography_family    = isset( $post_content_typography['font-family'] ) ? $post_content_typography['font-family'] : 'Open Sans';

	$post_meta_font_load            = isset( $css_data['wpcp_post_meta_font_load'] ) ? $css_data['wpcp_post_meta_font_load'] : '';
	$post_meta_typography           = isset( $css_data['wpcp_post_meta_typography'] ) ? $css_data['wpcp_post_meta_typography'] : '';
	$post_meta_typography_color     = isset( $post_meta_typography['color'] ) ? $post_meta_typography['color'] : '#999';
	$post_meta_typography_size      = isset( $post_meta_typography['font-size'] ) ? $post_meta_typography['font-size'] : '14';
	$post_meta_typography_height    = isset( $post_meta_typography['line-height'] ) ? $post_meta_typography['line-height'] : '24';
	$post_meta_typography_spacing   = isset( $post_meta_typography['letter-spacing'] ) ? $post_meta_typography['letter-spacing'] : '0';
	$post_meta_typography_transform = isset( $post_meta_typography['text-transform'] ) && ! empty( $post_meta_typography['text-transform'] ) ? $post_meta_typography['text-transform'] : 'none';
	$post_meta_typography_alignment = isset( $post_meta_typography['text-align'] ) ? $post_meta_typography['text-align'] : 'center';
	$post_meta_typography_family    = isset( $post_meta_typography['font-family'] ) ? $post_meta_typography['font-family'] : 'Open Sans';

	$post_readmore_font_load              = isset( $css_data['wpcp_post_readmore_font_load'] ) ? $css_data['wpcp_post_readmore_font_load'] : '';
	$post_readmore_typography             = isset( $css_data['wpcp_post_readmore_typography'] ) ? $css_data['wpcp_post_readmore_typography'] : '';
	$post_readmore_typography_color       = isset( $post_readmore_typography['color'] ) ? $post_readmore_typography['color'] : '#fff';
	$post_readmore_typography_hover_color = isset( $post_readmore_typography['hover_color'] ) ? $post_readmore_typography['hover_color'] : '#fff';
	$post_readmore_typography_size        = isset( $post_readmore_typography['font-size'] ) ? $post_readmore_typography['font-size'] : '14';
	$post_readmore_typography_height      = isset( $post_readmore_typography['line-height'] ) ? $post_readmore_typography['line-height'] : '24';
	$post_readmore_typography_spacing     = isset( $post_readmore_typography['letter-spacing'] ) ? $post_readmore_typography['letter-spacing'] : '0';
	$post_readmore_typography_transform   = isset( $post_readmore_typography['text-transform'] ) && ! empty( $post_readmore_typography['text-transform'] ) ? $post_readmore_typography['text-transform'] : 'none';
	$post_readmore_typography_alignment   = isset( $post_readmore_typography['text-align'] ) ? $post_readmore_typography['text-align'] : 'center';
	$post_readmore_typography_family      = isset( $post_readmore_typography['font-family'] ) ? $post_readmore_typography['font-family'] : 'Open Sans';

	$post_readmore_color  = isset( $css_data['wpcp_readmore_color_set'] ) ? $css_data['wpcp_readmore_color_set'] : '';
	$post_readmore_color1 = isset( $post_readmore_color['color1'] ) ? $post_readmore_color['color1'] : '#fff';
	$post_readmore_color2 = isset( $post_readmore_color['color2'] ) ? $post_readmore_color['color2'] : '#fff';
	$post_readmore_color3 = isset( $post_readmore_color['color3'] ) ? $post_readmore_color['color3'] : '#22afba';
	$post_readmore_color4 = isset( $post_readmore_color['color4'] ) ? $post_readmore_color['color4'] : '#22afba';
	$post_readmore_color5 = isset( $post_readmore_color['color5'] ) ? $post_readmore_color['color5'] : '#22afba';
	$post_readmore_color6 = isset( $post_readmore_color['color6'] ) ? $post_readmore_color['color6'] : '#22afba';

	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .post-categories {
		text-align: ' . $post_cat_typography_alignment . ';
	}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .post-categories li a {
				color: ' . $post_cat_typography_color . ';
				font-size: ' . $post_cat_typography_size . 'px;
				line-height: ' . $post_cat_typography_height . 'px;
				letter-spacing: ' . $post_cat_typography_spacing . 'px;
				text-transform: ' . $post_cat_typography_transform . ';';
	if ( $post_cat_font_load ) {
		$dynamic_css .= '
			font-family: ' . $post_cat_typography_family . ';
			font-weight: ' . ( isset( $post_cat_typography['font-weight'] ) && is_numeric( $post_cat_typography['font-weight'] ) ? $post_cat_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $post_cat_typography['font-style'] ) && ! empty( $post_cat_typography['font-style'] ) ? $post_cat_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions h2.wpcp-post-title a {
    		color: ' . $post_title_typography_color . ';
			font-size: ' . $post_title_typography_size . 'px;
			line-height: ' . $post_title_typography_height . 'px;
			letter-spacing: ' . $post_title_typography_spacing . 'px;
			text-transform: ' . $post_title_typography_transform . ';';
	if ( $post_title_font_load ) {
		$dynamic_css .= '
			font-family: ' . $post_title_typography_family . ';
			font-weight: ' . ( isset( $post_title_typography['font-weight'] ) && is_numeric( $post_title_typography['font-weight'] ) ? $post_title_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $post_title_typography['font-style'] ) && ! empty( $post_title_typography['font-style'] ) ? $post_title_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions h2.wpcp-post-title a:hover{
			color: ' . $post_title_typography_hover_color . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions h2.wpcp-post-title {
			text-align: ' . $post_title_typography_alignment . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions p {
			color: ' . $post_content_typography_color . ';
			font-size: ' . $post_content_typography_size . 'px;
			line-height: ' . $post_content_typography_height . 'px;
			letter-spacing: ' . $post_content_typography_spacing . 'px;
			text-transform: ' . $post_content_typography_transform . ';';
	if ( $post_content_font_load ) {
		$dynamic_css .= '
			font-family: ' . $post_content_typography_family . ';
			font-weight: ' . ( isset( $post_content_typography['font-weight'] ) && is_numeric( $post_content_typography['font-weight'] ) ? $post_content_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $post_content_typography['font-style'] ) && ! empty( $post_content_typography['font-style'] ) ? $post_content_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions p {
			text-align: ' . $post_content_typography_alignment . ';
		}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .wpcp-post-meta li,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .wpcp-post-meta a {
		color: ' . $post_meta_typography_color . ';
		font-size: ' . $post_meta_typography_size . 'px;
		line-height: ' . $post_meta_typography_height . 'px;
		letter-spacing: ' . $post_meta_typography_spacing . 'px;
		text-transform: ' . $post_meta_typography_transform . ';';
	if ( $post_meta_font_load ) {
		$dynamic_css .= '
			font-family: ' . $post_meta_typography_family . ';
			font-weight: ' . ( isset( $post_meta_typography['font-weight'] ) && is_numeric( $post_meta_typography['font-weight'] ) ? $post_meta_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $post_meta_typography['font-style'] ) && ! empty( $post_meta_typography['font-style'] ) ? $post_meta_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .wpcp-post-meta {
			text-align: ' . $post_meta_typography_alignment . ';
	}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .sp-wpcp-read-more a {
		font-size: ' . $post_readmore_typography_size . 'px;
		line-height: ' . $post_readmore_typography_height . 'px;
		letter-spacing: ' . $post_readmore_typography_spacing . 'px;
		text-transform: ' . $post_readmore_typography_transform . ';';
	if ( $post_readmore_font_load ) {
		$dynamic_css .= '
			font-family: ' . $post_readmore_typography_family . ';
			font-weight: ' . ( isset( $post_readmore_typography['font-weight'] ) && is_numeric( $post_readmore_typography['font-weight'] ) ? $post_readmore_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $post_readmore_typography['font-style'] ) && ! empty( $post_readmore_typography['font-style'] ) ? $post_readmore_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .sp-wpcp-read-more {
			text-align: ' . $post_readmore_typography_alignment . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .sp-wpcp-read-more a {
				color: ' . $post_readmore_color1 . ';
			background: ' . $post_readmore_color3 . ';
			border-color: ' . $post_readmore_color5 . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .sp-wpcp-read-more a:hover {
				color: ' . $post_readmore_color2 . ';
			background: ' . $post_readmore_color4 . ';
			border-color: ' . $post_readmore_color6 . ';
		}';
}

/**
 * Product Carousel CSS.
 */

if ( 'product-carousel' == $carousel_type ) {
	$product_image_border       = isset( $css_data['wpcp_product_image_border'] ) ? $css_data['wpcp_product_image_border'] : '';
	$product_image_border_width = isset( $product_image_border['all'] ) ? $product_image_border['all'] : '1';
	$product_image_border_style = isset( $product_image_border['style'] ) ? $product_image_border['style'] : 'solid';
	$product_image_border_color = isset( $product_image_border['color'] ) ? $product_image_border['color'] : '#dddddd';

	$product_name_font_load              = isset( $css_data['wpcp_product_name_font_load'] ) ? $css_data['wpcp_product_name_font_load'] : '';
	$product_name_typography             = isset( $css_data['wpcp_product_name_typography'] ) ? $css_data['wpcp_product_name_typography'] : '';
	$product_name_typography_color       = isset( $product_name_typography['color'] ) ? $product_name_typography['color'] : '#444';
	$product_name_typography_hover_color = isset( $product_name_typography['hover_color'] ) ? $product_name_typography['hover_color'] : '#555';
	$product_name_typography_size        = isset( $product_name_typography['font-size'] ) ? $product_name_typography['font-size'] : '15';
	$product_name_typography_height      = isset( $product_name_typography['line-height'] ) ? $product_name_typography['line-height'] : '23';
	$product_name_typography_spacing     = isset( $product_name_typography['letter-spacing'] ) ? $product_name_typography['letter-spacing'] : '0';
	$product_name_typography_transform   = isset( $product_name_typography['text-transform'] ) && ! empty( $product_name_typography['text-transform'] ) ? $product_name_typography['text-transform'] : 'none';
	$product_name_typography_alignment   = isset( $product_name_typography['text-align'] ) ? $product_name_typography['text-align'] : 'center';
	$product_name_typography_family      = isset( $product_name_typography['font-family'] ) ? $product_name_typography['font-family'] : 'Open Sans';

	$product_desc_font_load            = isset( $css_data['wpcp_product_desc_font_load'] ) ? $css_data['wpcp_product_desc_font_load'] : '';
	$product_desc_typography           = isset( $css_data['wpcp_product_desc_typography'] ) ? $css_data['wpcp_product_desc_typography'] : '';
	$product_desc_typography_color     = isset( $product_desc_typography['color'] ) ? $product_desc_typography['color'] : '#333';
	$product_desc_typography_size      = isset( $product_desc_typography['font-size'] ) ? $product_desc_typography['font-size'] : '14';
	$product_desc_typography_height    = isset( $product_desc_typography['line-height'] ) ? $product_desc_typography['line-height'] : '22';
	$product_desc_typography_spacing   = isset( $product_desc_typography['letter-spacing'] ) ? $product_desc_typography['letter-spacing'] : '0';
	$product_desc_typography_transform = isset( $product_desc_typography['text-transform'] ) && ! empty( $product_desc_typography['text-transform'] ) ? $product_desc_typography['text-transform'] : 'none';
	$product_desc_typography_alignment = isset( $product_desc_typography['text-align'] ) ? $product_desc_typography['text-align'] : 'center';
	$product_desc_typography_family    = isset( $product_desc_typography['font-family'] ) ? $product_desc_typography['font-family'] : 'Open Sans';

	$product_price_font_load            = isset( $css_data['wpcp_product_price_font_load'] ) ? $css_data['wpcp_product_price_font_load'] : '';
	$product_price_typography           = isset( $css_data['wpcp_product_price_typography'] ) ? $css_data['wpcp_product_price_typography'] : '';
	$product_price_typography_color     = isset( $product_price_typography['color'] ) ? $product_price_typography['color'] : '#222';
	$product_price_typography_size      = isset( $product_price_typography['font-size'] ) ? $product_price_typography['font-size'] : '14';
	$product_price_typography_height    = isset( $product_price_typography['line-height'] ) ? $product_price_typography['line-height'] : '26';
	$product_price_typography_spacing   = isset( $product_price_typography['letter-spacing'] ) ? $product_price_typography['letter-spacing'] : '0';
	$product_price_typography_transform = isset( $product_price_typography['text-transform'] ) && ! empty( $product_price_typography['text-transform'] ) ? $product_price_typography['text-transform'] : 'none';
	$product_price_typography_alignment = isset( $product_price_typography['text-align'] ) ? $product_price_typography['text-align'] : 'center';
	$product_price_typography_family    = isset( $product_price_typography['font-family'] ) ? $product_price_typography['font-family'] : 'Open Sans';

	$product_rm_font_load              = isset( $css_data['wpcp_product_readmore_font_load'] ) ? $css_data['wpcp_product_readmore_font_load'] : '';
	$product_rm_typography             = isset( $css_data['wpcp_product_readmore_typography'] ) ? $css_data['wpcp_product_readmore_typography'] : '';
	$product_rm_typography_color       = isset( $product_rm_typography['color'] ) ? $product_rm_typography['color'] : '#e74c3c';
	$product_rm_typography_hover_color = isset( $product_rm_typography['hover_color'] ) ? $product_rm_typography['hover_color'] : '#e74c3c';
	$product_rm_typography_size        = isset( $product_rm_typography['font-size'] ) ? $product_rm_typography['font-size'] : '14';
	$product_rm_typography_height      = isset( $product_rm_typography['line-height'] ) ? $product_rm_typography['line-height'] : '24';
	$product_rm_typography_spacing     = isset( $product_rm_typography['letter-spacing'] ) ? $product_rm_typography['letter-spacing'] : '0';
	$product_rm_typography_transform   = isset( $product_rm_typography['text-transform'] ) && ! empty( $product_rm_typography['text-transform'] ) ? $product_rm_typography['text-transform'] : 'none';
	$product_rm_typography_alignment   = isset( $product_rm_typography['text-align'] ) ? $product_rm_typography['text-align'] : 'center';
	$product_rm_typography_family      = isset( $product_rm_typography['font-family'] ) ? $product_rm_typography['font-family'] : 'Open Sans';


	$product_rating_color     = isset( $css_data['wpcp_product_rating_star_color_set'] ) ? $css_data['wpcp_product_rating_star_color_set'] : '';
	$product_rating_color1    = isset( $product_rating_color['color1'] ) ? $product_rating_color['color1'] : '#e74c3c';
	$product_rating_color2    = isset( $product_rating_color['color2'] ) ? $product_rating_color['color2'] : '#e74c3c';
	$product_rating_alignment = isset( $css_data['wpcp_product_rating_alignment'] ) ? $css_data['wpcp_product_rating_alignment'] : 'center';
	if ( 'center' === $product_rating_alignment ) {
		$product_rating_alignment = 'float: none; margin: 8px auto;';
	} else {
		$product_rating_alignment = 'float: ' . $product_rating_alignment . '; margin: 8px 0;';
	}

	$product_readmore_color     = isset( $css_data['wpcp_product_readmore_color_set'] ) ? $css_data['wpcp_product_readmore_color_set'] : '';
	$product_add_to_cart_color  = isset( $css_data['wpcp_add_to_cart_color_set'] ) ? $css_data['wpcp_add_to_cart_color_set'] : '';
	$product_add_to_cart_color1 = isset( $product_add_to_cart_color['color1'] ) ? $product_add_to_cart_color['color1'] : '#545454';
	$product_add_to_cart_color2 = isset( $product_add_to_cart_color['color2'] ) ? $product_add_to_cart_color['color2'] : '#fff';
	$product_add_to_cart_color3 = isset( $product_add_to_cart_color['color3'] ) ? $product_add_to_cart_color['color3'] : '#ebebeb';
	$product_add_to_cart_color4 = isset( $product_add_to_cart_color['color4'] ) ? $product_add_to_cart_color['color4'] : '#3f3f3f';
	$product_add_to_cart_color5 = isset( $product_add_to_cart_color['color5'] ) ? $product_add_to_cart_color['color5'] : '#d1d1d1';
	$product_add_to_cart_color6 = isset( $product_add_to_cart_color['color6'] ) ? $product_add_to_cart_color['color6'] : '#d1d1d1';

	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-product-image{
			border: ' . $product_image_border_width . 'px ' . $product_image_border_style . ' ' . $product_image_border_color . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-product-title a{
			color: ' . $product_name_typography_color . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-product-title {
			text-align: ' . $product_name_typography_alignment . ';
			font-size: ' . $product_name_typography_size . 'px;
			line-height: ' . $product_name_typography_height . 'px;
			letter-spacing: ' . $product_name_typography_spacing . 'px;
			text-transform: ' . $product_name_typography_transform . ';';
	if ( $product_name_font_load ) {
		$dynamic_css .= '
			font-family: ' . $product_name_typography_family . ';
			font-weight: ' . ( isset( $product_name_typography['font-weight'] ) && is_numeric( $product_name_typography['font-weight'] ) ? $product_name_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $product_name_typography['font-style'] ) && ! empty( $product_name_typography['font-style'] ) ? $product_name_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-product-title a:hover {
			color: ' . $product_name_typography_hover_color . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-all-captions {
			color: ' . $product_desc_typography_color . ';
			font-size: ' . $product_desc_typography_size . 'px;
			line-height: ' . $product_desc_typography_height . 'px;
			letter-spacing: ' . $product_desc_typography_spacing . 'px;
			text-transform: ' . $product_desc_typography_transform . ';
			text-align: ' . $product_desc_typography_alignment . ';';
	if ( $product_desc_font_load ) {
		$dynamic_css .= '
			font-family: ' . $product_desc_typography_family . ';
			font-weight: ' . ( isset( $product_desc_typography['font-weight'] ) && is_numeric( $product_desc_typography['font-weight'] ) ? $product_desc_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $product_desc_typography['font-style'] ) && ! empty( $product_desc_typography['font-style'] ) ? $product_desc_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-product-price del,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-product-price ins,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-product-price span {
			color: ' . $product_price_typography_color . ';
			font-size: ' . $product_price_typography_size . 'px;
			line-height: ' . $product_price_typography_height . 'px;
			letter-spacing: ' . $product_price_typography_spacing . 'px;
			text-transform: ' . $product_price_typography_transform . ';
			text-align: ' . $product_price_typography_alignment . ';';
	if ( $product_price_font_load ) {
		$dynamic_css .= '
			font-family: ' . $product_price_typography_family . ';
			font-weight: ' . ( isset( $product_price_typography['font-weight'] ) && is_numeric( $product_price_typography['font-weight'] ) ? $product_price_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $product_price_typography['font-style'] ) && ! empty( $product_price_typography['font-style'] ) ? $product_price_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .star-rating span::before {
			color: ' . $product_rating_color1 . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .star-rating::before {
			color: ' . $product_rating_color2 . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .woocommerce-product-rating .star-rating {
			' . $product_rating_alignment . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .wpcp-product-more-content a {
			color: ' . $product_rm_typography_color . ';
			font-size: ' . $product_rm_typography_size . 'px;
			line-height: ' . $product_rm_typography_height . 'px;
			letter-spacing: ' . $product_rm_typography_spacing . 'px;
			text-transform: ' . $product_rm_typography_transform . ';
			text-align: ' . $product_rm_typography_alignment . ';';
	if ( $product_rm_font_load ) {
		$dynamic_css .= '
			font-family: ' . $product_rm_typography_family . ';
			font-weight: ' . ( isset( $product_rm_typography['font-weight'] ) && is_numeric( $product_rm_typography['font-weight'] ) ? $product_rm_typography['font-weight'] : 'normal' ) . ';
			font-style: ' . ( isset( $product_rm_typography['font-style'] ) && ! empty( $product_rm_typography['font-style'] ) ? $product_rm_typography['font-style'] : 'normal' ) . ';';
	}
	$dynamic_css .= '}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-all-captions .wpcp-product-more-content a:hover {
			color: ' . $product_rm_typography_hover_color . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-all-captions .wpcp-cart-button a.button {
			background: ' . $product_add_to_cart_color3 . ';
			border-color: ' . $product_add_to_cart_color5 . ';
			color: ' . $product_add_to_cart_color1 . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-all-captions .wpcp-cart-button a.added_to_cart,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-all-captions .wpcp-cart-button a.added_to_cart:hover,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-all-captions .wpcp-cart-button a.button:hover {
			background: ' . $product_add_to_cart_color4 . ';
			border-color: ' . $product_add_to_cart_color6 . ';
			color: ' . $product_add_to_cart_color2 . ';
		}';
	if ( 'with_overlay' === $wpcp_post_detail ) {
		$dynamic_css .= '
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-single-item .wpcp-all-captions {
				padding-bottom: 20px;
			}';
	}
	// Lightbox background.
	$lb_overlay_color = isset( $css_data['wpcp_lb_overlay_color'] ) ? $css_data['wpcp_lb_overlay_color'] : '#0b0b0b';
	$dynamic_css     .= '.sp-wp-carousel-pro-id-' . $carousel_id . '.mfp-bg{
		background: ' . $lb_overlay_color . ';
		opacity: 0.8;
	}';
} // End of Product Carousel.

/**
 * Content Carousel
 */
$wpcp_content_height_dimen = isset( $css_data['wpcp_content_carousel_height']['top'] ) ? $css_data['wpcp_content_carousel_height']['top'] : '300';
$wpcp_content_height_prop  = isset( $css_data['wpcp_content_carousel_height']['style'] ) ? $css_data['wpcp_content_carousel_height']['style'] : 'min-height';
if ( 'content-carousel' === $carousel_type ) {
	$post_dynamic_css = '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.wpcp-content-carousel .wpcp-single-content { ' . $wpcp_content_height_prop . ':' . $wpcp_content_height_dimen . 'px;
	}';
}
/**
 * Grayscale CSS.
 */
if ( 'gray_and_normal_on_hover' == $image_gray_scale ) {
	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item .wpcp-slide-image img, .sp-wpcp-' . $carousel_id . ' .wpcp-single-item img {
			-webkit-filter: grayscale(100%);
			filter: grayscale(100%);
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item:hover .wpcp-slide-image img,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item:hover img {
				-webkit-filter: grayscale(0%);
				filter: grayscale(0%);
		}';
} elseif ( 'gray_on_hover' == $image_gray_scale ) {
	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item:hover .wpcp-slide-image img,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item:hover img {
			-webkit-filter: grayscale(100%);
			filter: grayscale(100%);
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item img,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item .wpcp-slide-image img {
				-webkit-filter: grayscale(0%);
				filter: grayscale(0%);
		}';
} elseif ( 'always_gray' == $image_gray_scale ) {
	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item .wpcp-slide-image img, .sp-wpcp-' . $carousel_id . ' .wpcp-single-item:hover .wpcp-slide-image img, #wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item img, #wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-single-item:hover img {
			-webkit-filter: grayscale(100%);
			filter: grayscale(100%);
		}';
}

// Nav Style.
$wpcp_nav_color1   = isset( $css_data['wpcp_nav_colors']['color-1'] ) ? $css_data['wpcp_nav_colors']['color-1'] : '#aaa';
$wpcp_nav_color2   = isset( $css_data['wpcp_nav_colors']['color-2'] ) ? $css_data['wpcp_nav_colors']['color-2'] : '#fff';
$wpcp_nav_color3   = isset( $css_data['wpcp_nav_colors']['color-3'] ) ? $css_data['wpcp_nav_colors']['color-3'] : '#fff';
$wpcp_nav_color4   = isset( $css_data['wpcp_nav_colors']['color-4'] ) ? $css_data['wpcp_nav_colors']['color-4'] : '#18AFB9';
$wpcp_nav_color5   = isset( $css_data['wpcp_nav_colors']['color-5'] ) ? $css_data['wpcp_nav_colors']['color-5'] : '#aaa';
$wpcp_nav_color6   = isset( $css_data['wpcp_nav_colors']['color-6'] ) ? $css_data['wpcp_nav_colors']['color-6'] : '#18AFB9';
$nav_border_radius = isset( $css_data['navigation_icons_border_radius']['all'] ) ? $css_data['navigation_icons_border_radius']['all'] : '0';
if ( true != $hide_nav_bg_border ) {
	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-prev,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-next {
			color: ' . $wpcp_nav_color1 . ';
			background-color: ' . $wpcp_nav_color3 . ';
			border-color: ' . $wpcp_nav_color5 . ';
			border-radius: ' . $nav_border_radius . '%;
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-prev:hover,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-next:hover {
			color: ' . $wpcp_nav_color2 . ';
			background-color: ' . $wpcp_nav_color4 . ';
			border-color: ' . $wpcp_nav_color6 . ';
		}';
} else {
	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-prev,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-next,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-prev:hover,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-next:hover {
			background: none;
			border: none;
			font-size: 30px;
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-prev,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-next {
			color: ' . $wpcp_nav_color1 . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-prev:hover,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-next:hover {
			color: ' . $wpcp_nav_color2 . ';
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-vertical-center {
			padding: 0 30px;
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-prev {
			text-align: left;
		}
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-next {
			text-align: right;
		}';
}
$nav_top_margin_with_dot = 26 + ( $pagination_margin_top / 2 );
if ( $pagination_margin_top > 0 ) {
	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.nav-vertical-center-inner-hover.slick-dotted .slick-next,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-vertical-center-inner-hover.slick-dotted .slick-prev,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-vertical-center-inner.slick-dotted .slick-next,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-vertical-center-inner.slick-dotted .slick-prev,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-vertical-center.slick-dotted .slick-next,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-vertical-center.slick-dotted .slick-prev {
			margin-top: -' . $nav_top_margin_with_dot . 'px;
		}';
}

/**
 * The Dynamic Style CSS.
 */
$wpcp_pagination_color1 = isset( $css_data['wpcp_pagination_color']['color1'] ) ? $css_data['wpcp_pagination_color']['color1'] : '#cccccc';
$wpcp_pagination_color2 = isset( $css_data['wpcp_pagination_color']['color2'] ) ? $css_data['wpcp_pagination_color']['color2'] : '#52b3d9';
$wpcp_overlay_bg        = isset( $css_data['wpcp_overlay_bg'] ) ? $css_data['wpcp_overlay_bg'] : '#444';

/**
 * Overlay styles.
 */
if ( 'with_overlay' === $wpcp_post_detail ) {
	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.detail-with-overlay .wpcp-all-captions {
			background: ' . $wpcp_overlay_bg . ';
			margin: ' . esc_html( $inner_padding_top . 'px ' . $inner_padding_right . 'px ' . $inner_padding_bottom . 'px ' . $inner_padding_left ) . 'px;
		}';
	if ( 'lower' === $wpcp_overlay_position ) {
		$dynamic_css .= '
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.detail-with-overlay.overlay-lower .wpcp-all-captions {
			border-radius: 0 0 ' . $inner_padding_top . 'px ' . $inner_padding_right . 'px;
		}';
	} else {
		$dynamic_css .= '
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.detail-with-overlay .wpcp-all-captions {
			border-radius: ' . esc_html( $inner_padding_top . 'px ' . $inner_padding_right . 'px ' . $inner_padding_bottom . 'px ' . $inner_padding_left ) . 'px;
		}';
	}
}

/**
 * Dynamic Style start.
 */

$dynamic_css .= '
#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' ul.slick-dots {
		margin: ' . esc_html( $pagination_margin_top . 'px ' . $pagination_margin_right . 'px ' . $pagination_margin_bottom . 'px ' . $pagination_margin_left ) . 'px;
	}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' ul.slick-dots li button {
		background-color: ' . $wpcp_pagination_color1 . ';
	}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' ul.slick-dots li.slick-active button {
		background-color: ' . $wpcp_pagination_color2 . ';
	}
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ':not(.wpcp-product-carousel) .wpcp-single-item {
		border: ' . $slide_border_width . 'px ' . $slide_border_style . ' ' . $slide_border_color . ';
		padding: ' . esc_html( $inner_padding_top . 'px ' . $inner_padding_right . 'px ' . $inner_padding_bottom . 'px ' . $inner_padding_left ) . 'px;
	}
';
if ( $preloader ) {
	$dynamic_css .= '
		.wpcp-carousel-wrapper.wpcp-wrapper-' . $carousel_id . '{
			position: relative;
		}
		#wpcp-preloader-' . $carousel_id . '{
			background: #fff;
			position: absolute;
			left: 0;
			top: 0;
			height: 100%;
			width: 100%;
			text-align: center;
			display: flex;
			align-items: center;
			justify-content: center;
			z-index: 999;
		}
		';
} else {
	$dynamic_css .= '
	.wpcp-carousel-section.wpcp-standard {
		display: none;
	}
	.wpcp-carousel-section.wpcp-standard.slick-initialized {
		display: block;
	}';
}
if ( 'hide_mobile' === $wpcp_arrows ) {
	$dynamic_css .= '
		@media screen and (max-width: 479px) {
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-top-left,
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-top-center,
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-top-right {
				padding-top: 0;
			}
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-bottom-left,
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-bottom-center,
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . '.nav-bottom-right{
				padding-bottom: 0;
			}
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.nav-vertical-center {
				padding: 0;
			}
		}';
}

if ( 'ticker' !== $carousel_mode ) {
	/**
	 * Margin betweens.
	 */
	if ( 'false' === $variable_width && 'standard' === $carousel_mode ) {
		$dynamic_css .= '
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-list {
			margin-right: -' . $slide_margin . 'px;
		}';
	}

	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-slide {
			margin-right: ' . $slide_margin . 'px;
		}';
}
$carousel_orientation = isset( $css_data['wpcp_carousel_orientation'] ) ? $css_data['wpcp_carousel_orientation'] : 'horizontal';
if ( 'ticker' !== $carousel_mode || 'vertical' === $carousel_orientation ) {
	/**
	 * Margin Betweens Rows.
	 */
	if ( 'false' === $variable_width && 'standard' === $carousel_mode ) {
		$dynamic_css .= '
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-list {
		margin-right: -' . $slide_margin . 'px;
		margin-bottom:-' . $slide_margin . 'px;
	}';
	}
	$dynamic_css .= '
	       #wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ' .slick-slide .wpcp-single-item{
		    margin-bottom: ' . $slide_margin . 'px; }';
}
/**
 * Image height CSS.
 */
$image_height_css         = isset( $css_data['wpcp_image_height_css'] ) ? $css_data['wpcp_image_height_css'] : '';
$image_height_css_desktop = isset( $image_height_css['top'] ) ? $image_height_css['top'] : '';
$image_height_css_laptop  = isset( $image_height_css['right'] ) ? $image_height_css['right'] : '';
$image_height_css_tablet  = isset( $image_height_css['bottom'] ) ? $image_height_css['bottom'] : '';
$image_height_css_mobile  = isset( $image_height_css['left'] ) ? $image_height_css['left'] : '';
$image_height_css_force   = isset( $image_height_css['style'] ) ? $image_height_css['style'] : '';
$laptop_size_plus         = $laptop_size + 1;
$tablet_size_plus         = $tablet_size + 1;
$mobile_size_plus         = $mobile_size + 1;
if ( $image_height_css_desktop ) {
	$dynamic_css .= '
	@media screen and (min-width: ' . $laptop_size_plus . 'px) {
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ':not(.wpcp-content-carousel) .wpcp-single-item img { ' . $image_height_css_force . ':' . $image_height_css_desktop . 'px; }
	}';
}
if ( $image_height_css_laptop ) {
	$dynamic_css .= '
	@media screen and (min-width: ' . $tablet_size_plus . 'px) and (max-width: ' . $laptop_size . 'px) {
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ':not(.wpcp-content-carousel) .wpcp-single-item img { ' . $image_height_css_force . ':' . $image_height_css_laptop . 'px; }
	}';
}
if ( $image_height_css_tablet ) {
	$dynamic_css .= '
	@media screen and (min-width: ' . $mobile_size_plus . 'px) and (max-width: ' . $tablet_size . 'px) {
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ':not(.wpcp-content-carousel) .wpcp-single-item img { ' . $image_height_css_force . ':' . $image_height_css_tablet . 'px; }
	}';
}
if ( $image_height_css_mobile ) {
	$dynamic_css .= '
	@media screen and  (max-width: ' . $mobile_size . 'px) {
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.wpcp-carousel-section.sp-wpcp-' . $carousel_id . ':not(.wpcp-content-carousel) .wpcp-single-item img { ' . $image_height_css_force . ':' . $image_height_css_mobile . 'px; }
	}';
}
if ( '1' === $column_lg_desktop && 'true' == $adaptive_height ) {
	$dynamic_css .= '
	@media screen and (min-width: ' . $desktop_size . 'px) {
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.slick-initialized .slick-slide {
			float: left !important;
		}
	}
';
}
if ( '1' === $column_tablet && 'true' == $adaptive_height ) {
	$dynamic_css .= '
	@media screen and (min-width: ' . $mobile_size_plus . 'px) and (max-width: ' . $tablet_size . 'px) {
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.slick-initialized .slick-slide {
			float: left !important;
		}
	}
';
}
if ( '1' === $column_mobile && 'true' == $adaptive_height ) {
	$dynamic_css .= '
	@media screen and  (max-width: ' . $mobile_size . 'px) {
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.slick-initialized .slick-slide {
			float: left !important;
		}
	}
';
}

switch ( $image_zoom ) {
	case 'zoom_in':
		$dynamic_css .= '
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-image-carousel .wpcp-slide-image:hover img,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-post-carousel .wpcp-slide-image:hover img,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-slide-image:hover img{
				-webkit-transform: scale(1.2);
				-moz-transform: scale(1.2);
				transform: scale(1.2);
			}';
		break;
	case 'zoom_out':
		$dynamic_css .= '
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-image-carousel .wpcp-slide-image img,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-post-carousel .wpcp-slide-image img,
		#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-slide-image img{
				-webkit-transform: scale(1.2);
				-moz-transform: scale(1.2);
				transform: scale(1.2);
			}
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-image-carousel .wpcp-slide-image:hover img,
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-post-carousel .wpcp-slide-image:hover img,
			#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-slide-image:hover img{
				-webkit-transform: scale(1);
				-moz-transform: scale(1);
				transform: scale(1);
			}';
		break;
}
if ( 'content-carousel' !== $carousel_type ) {
	$dynamic_css .= '
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ' .wpcp-slide-image img,
	#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . '.wpcp-product-carousel .wpcp-slide-image a {
		border-radius: ' . $radius_dimension . $radius_unit . ';
	}';
}
$dynamic_css .= '
#wpcpro-wrapper-' . $carousel_id . ' #sp-wp-carousel-pro-id-' . $carousel_id . '.sp-wpcp-' . $carousel_id . ':not(.wpcp-product-carousel):not(.wpcp-content-carousel) .wpcp-single-item {
	background: ' . $wpcp_slide_background . ';
}';
