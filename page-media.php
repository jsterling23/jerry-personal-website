<?php get_header(); ?>


<main class="media-page">


    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <section class="media-intro">
                <p class="media-label">MEDIA PRODUCTION</p>

                <h1><?php the_title(); ?></h1>

                <p>
                    Exploring photography, filmmaking, 
                    video editing, and the creative process 
                    behind my projects.
                </p>
            </section>

            <section class="media-content">
                <?php the_content(); ?>
            </section>

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>