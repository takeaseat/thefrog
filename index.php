<?php get_header(); ?>

<main class="site-main">
    <?php if (is_home() && !is_front_page()) : ?>
        <header class="page-header">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </header>
    <?php endif; ?>

    <div class="container">
        <div class="content-area">
            <?php if (have_posts()) : ?>
                <div class="posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
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
                                        Read More
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
                    <?php endwhile; ?>
                </div>
                
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
                <div class="no-results">
                    <h2>No Posts Found</h2>
                    <p>It seems we can't find what you're looking for. Perhaps searching can help.</p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
        </div>
        
        <?php get_sidebar(); ?>
    </div>
    
    <?php if (is_front_page()) : ?>
    <section class="featured-section">
        <div class="container">
            <h2 class="section-title">Featured Gallery</h2>
            <div class="gallery-grid">
                <?php 
                $gallery_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'meta_key' => '_thumbnail_id',
                ));
                
                if ($gallery_query->have_posts()) : 
                    while ($gallery_query->have_posts()) : $gallery_query->the_post(); ?>
                        <div class="gallery-item">
                            <a href="<?php the_permalink(); ?>" class="gallery-link">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium_large', array('class' => 'gallery-image'));
                                } ?>
                                <div class="gallery-overlay">
                                    <h3 class="gallery-title"><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </section>
    
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php echo get_theme_mod('cta_title', 'Join Our Frog Community'); ?></h2>
                <p><?php echo get_theme_mod('cta_text', 'Subscribe to our newsletter for the latest updates on frog conservation and care tips.'); ?></p>
                <?php if (get_theme_mod('cta_button_text') && get_theme_mod('cta_button_url')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('cta_button_url')); ?>" class="cta-button">
                        <?php echo esc_html(get_theme_mod('cta_button_text', 'Subscribe Now')); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
