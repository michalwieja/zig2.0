<?php
function custom_theme_setup(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menus(array(
        'primary' => __('Primary Menu')
    ));
}

add_action('after_setup_theme', 'custom_theme_setup');


// Load scripts
function load_custom_scripts() {
    wp_enqueue_script(
        'custom-js',
        get_stylesheet_directory_uri() . '/scripts/index.js',
        array( 'jquery' ),
        filemtime( get_stylesheet_directory() . '/scripts/index.js' ),
        true
    );

    wp_enqueue_style(
        'custom-css',
        get_stylesheet_directory_uri() . '/style.css',
        null,
        filemtime( get_stylesheet_directory() . '/style.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'load_custom_scripts', 100 );
