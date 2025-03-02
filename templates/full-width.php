<?php
/**
 * Template Name: Full Width
 *
 * A template for displaying full width pages without sidebar
 *
 * @package frog-theme
 */

get_header();
?>

<main class="site-main">
    <div class="container full-width">
        <div class="content-area">
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
        </div>
    </div>
</main>

<?php
get_footer();