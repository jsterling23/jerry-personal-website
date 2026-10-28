<?php

function jerry_register_projects() {

    register_post_type('project', array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project'
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions')
    ));

}

add_action('init', 'jerry_register_projects');



function jerry_register_project_fields() {

    register_post_meta('project', 'project_status', array(
        'type'          => 'string',
        'single'        => true,
        'show_in_rest'  => true,
        'default'       => 'In Progress',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        }
    ));

    
    register_post_meta('project', 'project_technologies', array(
        'type'          => 'string',
        'single'        => true,
        'show_in_rest'  => true,
        'default'       => '',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        }
    ));

    
    register_post_meta('project', 'project_github', array(
        'type'          => 'string',
        'single'        => true,
        'show_in_rest'  => true,
        'default'       => '',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        }
    ));

    register_post_meta('project', 'project_featured', array(
        'type'          => 'boolean',
        'single'        => true,
        'show_in_rest'  => true,
        'default'       => false,
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        }
    ));

}

add_action('init', 'jerry_register_project_fields');





function jerry_add_project_meta_box() {
    add_meta_box(
        'jerry_project_status',
        'Project Status',
        'jerry_display_project_status',
        'project',
        'side'
    );
}

add_action('add_meta_boxes', 'jerry_add_project_meta_box');





function jerry_display_project_status($post) {


    // display project current status - inprogress or completed
    $status = get_post_meta($post->ID, 'project_status', true);

    if (empty($status)) {
        $status = 'In Progress';
    }

    wp_nonce_field('jerry_save_project_status', 'jerry_status_nonce');
    ?>

    <select name="project_status" id="project_status">
        <option value="In Progress" <?php selected($status, 'In Progress'); ?>>
            In Progress
        </option>

        <option value="Completed" <?php selected($status, 'Completed'); ?>>
            Completed
        </option>
    </select>

    

    <!-- display project technologies -->
    <?php
    $technologies = get_post_meta($post->ID, 'project_technologies', true);
    ?>

    <p>
        <label for="project_technologies">
            <strong>Technologies Used:</strong>
        </label>
    </p>

    <input
        type="text"
        name="project_technologies"
        id="project_technologies"
        value="<?php echo esc_attr($technologies); ?>"
        placeholder="Python, Flask, Ubuntu"
        style="width: 100%;"
    >

    <!-- display project github link -->
    <?php
    $github = get_post_meta($post->ID, 'project_github', true);
    ?>

    <p>
        <label for="project_github">
            <strong>GitHub Repository:</strong>
        </label>
    </p>

    <input
        type="url"
        name="project_github"
        id="project_github"
        value="<?php echo esc_attr($github); ?>"
        placeholder="https://github.com/username/project"
        style="width: 100%;"
    >

    <!-- creating a way to see featured projects first -->
     <?php
     $featured = get_post_meta($post->ID, 'project_featured', true);
     ?>

    <p>
        <label for="project_featured">
            <input
                type="checkbox"
                name="project_featured"
                id="project_featured"
                value="1"
                <?php checked($featured, true); ?> 
            >
            <strong>Featured Project</strong>
        </label>    
    </p>


    <?php
    
}




function jerry_save_project_status($post_id) {

    // Verify our security token.
    if (
        !isset($_POST['jerry_status_nonce']) ||
        !wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['jerry_status_nonce'])),
            'jerry_save_project_status'
        )
    ) {
        return;
    }

    // Skip automatic saves and revisions.
    if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
        return;
    }

    // Check user permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Validate and save the selected status.
    if (isset($_POST['project_status'])) {
        $status = sanitize_text_field(
            wp_unslash($_POST['project_status'])
        );

        if (in_array($status, array('In Progress', 'Completed'), true)) {
            update_post_meta($post_id, 'project_status', $status);
        }
    }

    
    // Save technologies used.
    if (isset($_POST['project_technologies'])) {

        $technologies = sanitize_text_field(
            wp_unslash($_POST['project_technologies'])
        );

        update_post_meta(
            $post_id,
            'project_technologies',
            $technologies
        );
    }

    
    // Save GitHub repository URL.
    if (isset($_POST['project_github'])) {

        $github = esc_url_raw(
            wp_unslash($_POST['project_github']),
            array('https')
        );

        $host = wp_parse_url($github, PHP_URL_HOST);

        if (
            !empty($github) &&
            $host === 'github.com'
        ) {
            update_post_meta($post_id, 'project_github', $github);
        } elseif (empty($_POST['project_github'])) {
            delete_post_meta($post_id, 'project_github');
        }
    }

    // Save featured project checkbox data
    $featured = isset($_POST['project_featured']);

    update_post_meta(
        $post_id,
        'project_featured',
        $featured
    );


}

add_action('save_post_project', 'jerry_save_project_status');



// adding a taxonomy function for categories

function jerry_register_project_categories() {

    register_taxonomy('project_category', array('project'), array(
        'labels' => array(
            'name'          => 'Project Categories',
            'singular_name' => 'Project Category'
        ),
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_admin_column' => true
    ));

}

add_action('init','jerry_register_project_categories');