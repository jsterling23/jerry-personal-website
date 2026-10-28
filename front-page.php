
<?php
$technology = get_page_by_path('technology-cybersecurity');
$media = get_page_by_path('media');
$disc_golf = get_page_by_path('disc-bandit');

get_header();
?>

<main>
    <section class="hero">
        <h2>Welcome to My Website</h2>
        <p>
            A place where I share my work in technology,
            media production, and disc golf.
        </p>
    </section>

    <section class="interests">
        <h2>Explore My Interests</h2>
        <?php if ($technology) : ?>
            <a class="interest-card" href="<?php echo esc_url(get_permalink($technology->ID)); ?>">
                <h3>Technology & Cybersecurity</h3>
                <p>Projects, programming, and cybersecurity.</p>
            </a>
        <?php endif; ?>

        <?php if ($media) : ?>
            <a class="interest-card" href="<?php echo esc_url(get_permalink($media->ID)); ?>">
                <h3>Media Production</h3>
                <p>Photography, video production, and creative projects.</p>
            </a>
        <?php endif; ?>

        <?php if ($disc_golf) : ?>
            <a class="interest-card" href="<?php echo esc_url(get_permalink($disc_golf->ID)); ?>">
                <h3>Disc Bandit</h3>
                <p>Disc golf, training, tournaments, and content.</p>
            </a>
        <?php endif; ?>
    </section>

    
</main>

<?php get_footer(); ?>