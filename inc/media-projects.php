
<?php

function jerry_register_media_projects() {

    register_post_type('media_project', array(

        'labels' => array(
            'name'          => 'Media Projects',
            'singular_name' => 'Media Project',
            'add_new_item'  => 'Add New Media Project',
            'edit_item'     => 'Edit Media Project'
        ),

        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-format-video',

        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions'
        ),

        'rewrite' => array(
            'slug' => 'media-project'
        )

    ));
}

add_action('init', 'jerry_register_media_projects');




function jerry_register_media_categories() {

    register_taxonomy('media_category', array('media_project'), array(

        'labels' => array(
            'name'          => 'Media Categories',
            'singular_name' => 'Media Category'
        ),

        'public'            => true,
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,

        'rewrite' => array(
            'slug' => 'media-category'
        )

    ));
}

add_action('init', 'jerry_register_media_categories');

