<article class="post">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="post-meta">
        <span>Published on <?php echo get_the_date(); ?></span>
        <span>by <?php the_author(); ?></span>
    </div>
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="post-excerpt">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
    </div>
</article>