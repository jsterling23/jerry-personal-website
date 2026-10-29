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

                <!-- display technologies  -->
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


                <!-- display categories -->
                <?php
                $categories = get_the_terms(get_the_ID(), 'project_category');

                if ($categories && !is_wp_error($categories)) :
                ?>
                    <div class="project-categories">
                        <strong>Categories:</strong>

                        <?php foreach ($categories as $category) : ?>
                            <?php $category_url = get_term_link($category); ?>

                            <?php if (!is_wp_error($category_url)) : ?>
                                <a href="<?php echo esc_url($category_url); ?>">
                                    <?php echo esc_html($category->name); ?>
                                | </a>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <!-- display github link -->
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