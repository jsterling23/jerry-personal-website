<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>

    <nav aria-label="Main navigation">
    <a href="<?php echo esc_url(home_url('/')); ?>"
       class="<?php echo is_front_page() ? 'active' : ''; ?>">
        Home
    </a>

    <a href="<?php echo esc_url(home_url('/technology-cybersecurity/')); ?>"
       class="<?php echo is_page('technology-cybersecurity') ? 'active' : ''; ?>">
        Technology
    </a>

    <a href="<?php echo esc_url(home_url('/media/')); ?>"
       class="<?php echo is_page('media') ? 'active' : ''; ?>">
        Media
    </a>

    <a href="<?php echo esc_url(home_url('/disc-bandit/')); ?>"
       class="<?php echo is_page('disc-bandit') ? 'active' : ''; ?>">
        Disc Bandit
    </a>
</nav>

</header>