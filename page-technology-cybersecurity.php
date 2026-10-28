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
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC'
        ));

        
        $all_projects = $projects->posts;

        
        usort($all_projects, function($a, $b) {

            $featured_a = (bool) get_post_meta($a->ID, 'project_featured', true);
            $featured_b = (bool) get_post_meta($b->ID, 'project_featured', true);

            // Featured projects appear first.
            if ($featured_a !== $featured_b) {
                return $featured_b <=> $featured_a;
            }

            // Otherwise, sort newest first.
            return strcmp($b->post_date, $a->post_date);
        });


        $projects->posts = $all_projects;


        if ($projects->have_posts()) :
            while ($projects->have_posts()) :
                $projects->the_post();
        ?>

            
            <article class="project-card">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    
                    <?php
                    $status = get_post_meta(
                        get_the_ID(),
                        'project_status',
                        true
                    );
                    ?>

                    <p class="card-status">
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
                        <p class="card-technologies">
                            <strong>Technologies:</strong>
                            <?php echo esc_html($technologies); ?>
                        </p>
                    <?php endif; ?>
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