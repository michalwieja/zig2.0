<?php
/*
 * Name: Giphy
 * Section: content
 * Description: Add a Giphy image
 *
 */

/* @var $options array */
/* @var $wpdb wpdb */

$defaults = array(
    'block_padding_top'=>15,
    'block_padding_bottom'=>15,
    'block_padding_left'=>0,
    'block_padding_right'=>0,
    'block_background'=>'',
    'giphy_url' => ''
);

$options = array_merge($defaults, $options);

?>

<table width="100%" border="0" cellpadding="0" align="center" cellspacing="0" class="responsive">
    <tr>
        <td width="100%" valign="top" align="center">
            <img src="<?php echo $options['giphy_url'] ?>" style="max-width: 100%!important; height: auto!important;">
        </td>
    </tr>
</table>

