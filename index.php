<?php
/**
 * The main template file
 *
 * @package frog-theme
 */

get_header();
?>

<main class="site-main">
    <?php if (is_home() && !is_front_page()) : ?>
        <header class="page-header">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </header>
    <?php endif; ?>

    <div class="container">
        <div class="content-area">
            <?php
            if (have_posts()) :
                ?>
                <div class="posts-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content');
                    endwhile;
                    ?>
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
                
            <?php
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
        
        <?php get_sidebar(); ?>
    </div>
    
    <?php if (is_front_page()) : ?>
    <section class="featured-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Featured Gallery', 'frog-theme'); ?></h2>
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
                                    the_post_thumbnail('frog-gallery', array('class' => 'gallery-image'));
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

<?php
get_footer();