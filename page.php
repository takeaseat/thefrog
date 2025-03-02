<?php get_header(); ?>

<main class="with-sidebar">
    <section class="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="page">
                <h1><?php the_title(); ?></h1>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="page-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            </article>
            
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
            
        <?php endwhile; endif; ?>
    </section>
    
    <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>