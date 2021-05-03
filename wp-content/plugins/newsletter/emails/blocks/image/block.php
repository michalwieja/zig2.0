<?php
/*
 * Name: Single image
 * Section: content
 * Description: A single image with link
 */

/* @var $options array */
/* @var $wpdb wpdb */

$defaults = array(
    'image' => '',
    'url' => '',
    'width' => 0,
    'align' => 'center',
    'block_background' => '',
    'block_padding_left' => 0,
    'block_padding_right' => 0,
    'block_padding_bottom' => 15,
    'block_padding_top' => 15
);

$options = array_merge($defaults, $options);

if (empty($options['image']['id'])) {
    if (!empty($options['image-url'])) {
        $media = new TNP_Media();
        $media->url = $options['image-url'];
    } else {
        $media = new TNP_Media();
        // A placeholder can be set by a preset and it is kept indefinitely
        if (!empty($options['placeholder'])) {
            $media->url = $options['placeholder'];
            $media->width = 600;
            $media->height = 250;
        } else {
            $media->url = 'https://source.unsplash.com/1200x500/daily';
            $media->width = 600;
            $media->height = 250;
        }
    }
} else {
    $media = tnp_resize_2x($options['image']['id'], [600, 0]);
    // Should never happen but... it happens
    if (!$media) {
        echo 'The selected media file cannot be processed';
        return;
    }
}

if (!empty($options['width'])) {
    $media->set_width($options['width']);
}
$media->link = $options['url'];
if (!empty($options['image-alt'])) {
    $media->alt = $options['image-alt'];
}

?>
<style>
    .image {
        max-width: 100% !important;
        height: auto !important;
        display: inline-block;
        width: <?php echo $media->width ?>px;
        line-height: 0;
        margin: 0 auto;
    }
</style>

<table border="0" cellspacing="0" cellpadding="0" width="100%" class="responsive">
    <tr>
        <td align="<?php echo esc_attr($options['align']) ?>" valign="middle" width="100%" style="line-height: 0">
            <?php echo TNP_Composer::image($media, ['class' => $image_class_name]); ?>
        </td>
    </tr>
</table>

