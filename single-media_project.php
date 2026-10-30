<?php get_header(); ?>

    <main class="media-page">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <section class="media-intro">

                    <p class="media-label">MEDIA PROJECT</P>

                    <h1><?php the_title(); ?></h1>

                    <?php the_excerpt(); ?>

                </section>

                <section class="media-content">
                    <?php the_content(); ?>
                </section>

                <a class="black-link" href="<?php echo esc_url(home_url('/media/')); ?>">&larr; Back to Media Production</a>

            <?php endwhile; ?>
        <?php endif; ?>

    </main>

    <?php get_footer(); ?>