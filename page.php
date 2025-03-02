<?php
/**
 * The template for displaying all pages
 *
 * @package frog-theme
 */

get_header();
?>

<main class="with-sidebar">
    <section class="content">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'page');
            
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
        endwhile;
        ?>
    </section>
    
    <?php get_sidebar(); ?>
</main>

<?php
get_footer();