<?php get_header(); ?>

<main class="technology-page">

    <section class="tech-intro">
        <h1><?php the_title(); ?></h1>
        <p>
            Exploring cybersecurity, software development,
            networking, and the projects I've built along the way.
        </p>
    </section>

    <section class="tech-projects">
        <h2>Featured Projects</h2>

        <?php
        $projects = new WP_Query(array(
            'post_type'      => 'project',
            'posts_per_page' => 6,
            'post_status'    => 'publish'
        ));

        if ($projects->have_posts()) :
            while ($projects->have_posts()) :
                $projects->the_post();
        ?>

            <article class="project-card">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                </a>
            </article>

        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>

            <p>No projects available yet.</p>

        <?php endif; ?>
    </section>

</main>

<?php get_footer(); ?>