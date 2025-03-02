<?php get_header(); ?>

<main class="with-sidebar">
    <section class="content">
        <h1>
            <?php
            printf(
                'Search Results for: %s',
                '<span>' . get_search_query() . '</span>'
            );
            ?>
        </h1>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-meta">
                        <span>Published on <?php echo get_the_date(); ?></span>
                        <span>by <?php the_author(); ?></span>
                    </div>
                    
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    </div>
                </article>
            <?php endwhile; ?>

            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ));
                ?>
            </div>

        <?php else : ?>
            <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </section>
    
    <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>
