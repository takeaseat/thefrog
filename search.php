<?php
/**
 * The template for displaying search results pages
 *
 * @package frog-theme
 */

get_header();
?>

<main class="with-sidebar">
    <section class="content">
        <h1 class="page-title">
            <?php
            printf(
                esc_html__('Search Results for: %s', 'frog-theme'),
                '<span>' . get_search_query() . '</span>'
            );
            ?>
        </h1>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'search'); ?>
            <?php endwhile; ?>

            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '<svg viewBox="0 0 24 24" width="24" height="24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg><span class="screen-reader-text">Previous</span>',
                    'next_text' => '<span class="screen-reader-text">Next</span><svg viewBox="0 0 24 24" width="24" height="24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>',
                ));
                ?>
            </div>

        <?php else : ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </section>
    
    <?php get_sidebar(); ?>
</main>

<?php
get_footer();