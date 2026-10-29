<?php get_header(); ?>

<main class="technology-page">

    <section class="tech-intro">
        <h1><?php single_term_title(); ?></h1>
        <p>Projects in this category.</p>
    </section>

    <section class="tech-projects">
        <h2>Projects</h2>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <article class="project-card">
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        
                    </a>
                </article>

            <?php endwhile; ?>
        <?php else : ?>

            <p>No projects found in this category.</p>

        <?php endif; ?>

    </section>

</main>

<?php get_footer(); ?>