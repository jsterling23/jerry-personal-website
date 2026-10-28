<?php

function jerry_enqueue_styles() {
    wp_enqueue_style(
        'jerry-main-style', get_stylesheet_uri()
    );
}

add_action('wp_enqueue_scripts','jerry_enqueue_styles');


function jerry_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','jerry_theme_setup');



require_once get_template_directory() . '/inc/projects.php';