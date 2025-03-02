<?php
/**
 * Template part for displaying page content
 *
 * @package frog-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
    <h1 class="page-title"><?php the_title(); ?></h1>
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="page-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </div>
    <?php endif; ?>
    
    <div class="page-content">
        <?php the_content(); ?>
        
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'frog-theme'),
            'after'  => '</div>',
        ));
        ?>
    </div>
</article>