<?php
/**
 * Template part for displaying results in search pages
 *
 * @package frog-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    
    <div class="post-meta">
        <span>Published on <?php echo get_the_date(); ?></span>
        <span>by <?php the_author(); ?></span>
    </div>
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium'); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="post-excerpt">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e('Read More', 'frog-theme'); ?>
            <svg viewBox="0 0 24 24" width="16" height="16"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
        </a>
    </div>
</article>