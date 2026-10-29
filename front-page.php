
<?php
$technology = get_page_by_path('technology-cybersecurity');
$media = get_page_by_path('media');
$disc_golf = get_page_by_path('disc-bandit');

get_header();
?>

<main>
    <section class="hero">
        
        <p class="hero-label">TECHNOLOGY • CREATIVITY • DISC GOLF</p>

        <h1>Building, Creating, and Improving.</h1>

        <p class="hero-description">
            Exploring cybersecurity, developing software,
            producing media, and sharing my journey in disc golf.
        </p>

    </section>

    <section class="interests">
        <h2>Explore My Interests</h2>
        <?php if ($technology) : ?>
            <a class="interest-card" href="<?php echo esc_url(get_permalink($technology->ID)); ?>">
                <!-- thumbnail -->
                <?php if (has_post_thumbnail($technology->ID)) : ?>
                    <div class="interest-image">
                        <?php echo get_the_post_thumbnail($technology->ID, 'medium_large'); ?>
                    </div>
                <?php endif; ?>
                <h3>Technology & Cybersecurity</h3>
                <p>Projects, programming, and cybersecurity.</p>
            </a>
        <?php endif; ?>

        <?php if ($media) : ?>
            <a class="interest-card" href="<?php echo esc_url(get_permalink($media->ID)); ?>">
                <!-- thumbnail -->
                <?php if (has_post_thumbnail($media->ID)) : ?>
                    <div class="interest-image">
                        <?php echo get_the_post_thumbnail($media->ID, 'medium_large'); ?>
                    </div>
                <?php endif; ?>
                <h3>Media Production</h3>
                <p>Photography, video production, and creative projects.</p>
            </a>
        <?php endif; ?>

        <?php if ($disc_golf) : ?>
            <a class="interest-card" href="<?php echo esc_url(get_permalink($disc_golf->ID)); ?>">
                <!-- thumbnail -->                
                <?php if (has_post_thumbnail($disc_golf->ID)) : ?>
                    <div class="interest-image">
                        <?php echo get_the_post_thumbnail($disc_golf->ID, 'medium_large'); ?>
                    </div>
                <?php endif; ?>
                <h3>Disc Bandit</h3>
                <p>Disc golf, training, tournaments, and content.</p>
            </a>
        <?php endif; ?>
    </section>

    
</main>

<?php get_footer(); ?>