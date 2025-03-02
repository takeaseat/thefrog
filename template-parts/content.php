<?php
/**
 * Template part for displaying posts
 *
 * @package frog-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium_large', array('class' => 'post-thumbnail-img')); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="post-content">
        <header class="post-header">
            <?php the_title('<h2 class="post-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
            
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
        </header>
        
        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <footer class="post-footer">
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php esc_html_e('Read More', 'frog-theme'); ?>
                <svg viewBox="0 0 24 24" width="16" height="16"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
            </a>
            
            <?php if (has_tag()) : ?>
            <div class="post-tags">
                <?php the_tags('<span class="tag-icon"><svg viewBox="0 0 24 24" width="16" height="16"><path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/></svg></span> ', ', '); ?>
            </div>
            <?php endif; ?>
        </footer>
    </div>
</article>