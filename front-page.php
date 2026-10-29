
<?php
$technology = get_page_by_path('technology-cybersecurity');
$media = get_page_by_path('media');
$disc_golf = get_page_by_path('disc-bandit');

get_header();
?>

<main>
    
    <section class="hero">

        <p class="hero-label">
            CYBERSECURITY • SOFTWARE DEVELOPMENT • CREATIVE MEDIA
        </p>

        <h1>Hi, I'm Jerry.</h1>

        <h2>Building, Creating, and Improving.</h2>

        <p class="hero-description">
            I'm a cybersecurity student and developer who enjoys
            building software, exploring technology, producing media,
            and documenting my journey in disc golf.
        </p>

        <div class="hero-actions">
            <a class="hero-button"
            href="<?php echo esc_url(home_url('/technology-cybersecurity/')); ?>">
                Explore My Projects
            </a>

            <a class="hero-github"
            href="https://github.com/jsterling23"
            target="_blank"
            rel="noopener noreferrer">
                View My GitHub
            </a>
        </div>

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
    
    
    <section class="home-featured">
        <h2>Featured Projects</h2>

        <?php
        $featured_projects = new WP_Query(array(
            'post_type'      => 'project',
            'posts_per_page' => 2,
            'meta_query'     => array(
                array(
                    'key'     => 'project_featured',
                    'value'   => '1',
                    'compare' => '='
                )
            )
        ));
        ?>

        
        <?php if ($featured_projects->have_posts()) : ?>

            <div class="home-featured-grid">

                <?php while ($featured_projects->have_posts()) : $featured_projects->the_post(); ?>

                    
                <article class="home-project-card home-project-spotlight">

                    <div class="home-project-image">
                        <a href="<?php echo esc_url(get_permalink()); ?>">

                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php endif; ?>

                        </a>
                    </div>

                    <div class="home-project-details">

                        <p class="featured-label">FEATURED WORK</p>

                        <h3>
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <?php the_excerpt(); ?>

                        <?php
                        $technologies = get_post_meta(
                            get_the_ID(),
                            'project_technologies',
                            true
                        );
                        ?>

                        <?php if (!empty($technologies)) : ?>
                            <p class="home-project-tech">
                                <strong>Technologies:</strong>
                                <?php echo esc_html($technologies); ?>
                            </p>
                        <?php endif; ?>

                        <a class="home-project-button"
                        href="<?php echo esc_url(get_permalink()); ?>">
                            View Project
                        </a>

                    </div>

                </article>


                <?php endwhile; ?>

            </div>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p>No featured projects yet.</p>
        <?php endif; ?>

    </section>

    
</main>

<?php get_footer(); ?>