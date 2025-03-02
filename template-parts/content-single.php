<?php
/**
 * Template part for displaying single post content
 *
 * @package frog-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post single-post'); ?>>
    <h1 class="post-title"><?php the_title(); ?></h1>
    
    <div class="post-meta">
        <span class="post-date">
            <svg viewBox="0 0 24 24" width="16" height="16"><path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>
            <?php echo get_the_date(); ?>
        </span>
        
        <span class="post-author">
            <svg viewBox="0 0 24 24" width="16" height="16"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            <?php the_author_posts_link(); ?>
        </span>
        
        <?php if (has_category()) : ?>
        <span class="post-categories">
            <svg viewBox="0 0 24 24" width="16" height="16"><path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16z"/></svg>
            <?php the_category(', '); ?>
        </span>
        <?php endif; ?>
    </div>
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </div>
    <?php endif; ?>
    
    <div class="post-content">
        <?php the_content(); ?>
        
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'frog-theme'),
            'after'  => '</div>',
        ));
        ?>
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