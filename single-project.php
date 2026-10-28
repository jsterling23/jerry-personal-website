<?php get_header(); ?>

<main class="single-project">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <article>
                <h1><?php the_title(); ?></h1>
                <?php
                    $status = get_post_meta(get_the_ID(), 'project_status', true);
                ?>

                <p class="project-status">
                    <strong>Status:</strong>
                    <?php echo esc_html($status); ?>
                </p>

                <?php
                    $technologies = get_post_meta(
                        get_the_ID(),
                        'project_technologies',
                        true
                    );
                ?>

                <?php if (!empty($technologies)) : ?> 
                    <p class="project-technologies">
                        <strong>Technologies:</strong>
                        <?php echo esc_html($technologies); ?>
                    </p>
                <?php endif; ?>

                
                <?php
                    $github = get_post_meta(
                        get_the_ID(),
                        'project_github',
                        true
                    );
                ?>

                <?php if (!empty($github)) : ?>
                    <p class="project-github">
                        <a href="<?php echo esc_url($github); ?>"
                        target="_blank"
                        rel="noopener noreferrer">
                            View Project on GitHub
                        </a>
                    </p>
                <?php endif; ?>



                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>

                <div class="project-content">
                    <?php the_content(); ?>
                </div>
            </article>

            <a class="back-link" href="<?php echo esc_url(home_url('/technology-cybersecurity/')); ?>">
                &larr; Back to Technology
            </a>
            
        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>