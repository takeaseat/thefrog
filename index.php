<?php get_header(); ?>

<main>
    <section class="content">
        <h2>Welcome to <?php bloginfo('name'); ?></h2>
        <p>
            This is a serene place dedicated to the beauty and wonder of frogs and their natural habitats.
            Explore our galleries, learn about different species, or just enjoy the peaceful pond atmosphere.
        </p>
        <p>
            Frogs are fascinating amphibians that live in diverse environments around the world, from tropical
            rainforests to desert oases. They play a crucial role in their ecosystems as both predator and prey.
        </p>
    </section>

    <section class="content">
        <h2>Latest Blog Posts</h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="post">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
            </article>
        <?php endwhile; else : ?>
            <p>No posts available.</p>
        <?php endif; ?>
    </section>

    <section class="content">
        <h2>Featured Gallery</h2>
        <div class="gallery-grid">
            <?php 
            $gallery_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'meta_key' => '_thumbnail_id',
            ));
            
            if ($gallery_query->have_posts()) : 
                while ($gallery_query->have_posts()) : $gallery_query->the_post(); ?>
                    <div class="gallery-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('medium');
                            } ?>
                        </a>
                    </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
