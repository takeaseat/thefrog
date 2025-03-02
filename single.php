<?php get_header(); ?>

<main class="with-sidebar">
    <section class="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="post single-post">
                <h1><?php the_title(); ?></h1>
                
                <div class="post-meta">
                    <span>Published on <?php echo get_the_date(); ?></span>
                    <span>by <?php the_author(); ?></span>
                    <span>Categories: <?php the_category(', '); ?></span>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                
                <div class="post-tags">
                    <?php the_tags('Tags: ', ', ', ''); ?>
                </div>
                
                <div class="post-navigation">
                    <div class="prev-post">
                        <?php previous_post_link('%link', '&larr; %title'); ?>
                    </div>
                    <div class="next-post">
                        <?php next_post_link('%link', '%title &rarr;'); ?>
                    </div>
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
