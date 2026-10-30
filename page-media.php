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
                <?php if (has_post_thumbnail()) : ?>
                    <div class="media-featured-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
            </section>


            <section class="media-content">
                <?php the_content(); ?>
            </section>

            <section class="media-projects">
                <h2>Media Projects</h2>
                <?php
                $media_projects = new WP_Query(array(
                    'post_type'      => 'media_project',
                    'post_status'    => 'publish',
                    'posts_per_page' => 6,
                    'orderby'        => 'date',
                    'oder'           => 'DESC'
                ));
                ?>

                <?php if ($media_projects->have_posts()) : ?>
                    <div class="media-project-grid">
                        <?php while ($media_projects->have_posts()) : $media_projects->the_post(); ?>

                            <article class="media-project-card">

                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="media-project-image">
                                            <?php the_post_thumbnail('medium_large'); ?>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <div class="media-project-info">

                                    <h3>
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>

                                    <?php the_excerpt(); ?>

                                    <?php
                                    the_terms(
                                        get_the_ID(),
                                        'media_category',
                                        '<p class="media-project-categories"><strong>Category:</strong> ',
                                        ' | ',
                                        '</p>'
                                    );
                                    ?>

                                </div>

                            </article>

                        <?php endwhile; ?>
                    </div>

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <p>No media projects available yet.</p>        
                <?php endif; ?>


            </section>


        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>