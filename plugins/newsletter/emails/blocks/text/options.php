<?php
/*
 * @var $options array contains all the options the current block we're ediging contains
 * @var $controls NewsletterControls
 */
/* @var $fields NewsletterFields */
?>

<?php //$fields->font() ?>
<?php $fields->wp_editor( 'html', 'Content', [
	'text_font_family'  => $composer['text_font_family'],
	'text_font_size'    => $composer['text_font_size'],
	'text_font_weight'  => $composer['text_font_weight'],
	'text_font_color'   => $composer['text_font_color'],
] ) ?>
<?php $fields->block_commons() ?>
