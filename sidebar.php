<aside class="sidebar">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <div class="widget">
            <h3>About This Site</h3>
            <p>Welcome to <?php bloginfo('name'); ?>! This is a place for frog enthusiasts to learn and share information about these amazing amphibians.</p>
        </div>
        
        <div class="widget">
            <h3>Categories</h3>
            <ul>
                <?php wp_list_categories(array(
                    'title_li' => '',
                )); ?>
            </ul>
        </div>
        
        <div class="widget">
            <h3>Recent Posts</h3>
            <ul>
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                
                foreach ($recent_posts as $post) {
                    echo '<li><a href="' . get_permalink($post['ID']) . '">' . $post['post_title'] . '</a></li>';
                }
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>
