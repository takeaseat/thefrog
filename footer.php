<footer class="site-footer">
        <div class="footer-container">
            <div class="footer-widgets">
                <div class="footer-widget-area">
                    <h3>About <?php bloginfo('name'); ?></h3>
                    <p><?php echo get_theme_mod('footer_about', 'A place for frog enthusiasts to learn and share information about these amazing amphibians.'); ?></p>
                </div>
                
                <div class="footer-widget-area">
                    <h3>Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => 'footer-menu',
                        'depth' => 1,
                        'fallback_cb' => function() {
                            echo '<ul class="footer-menu">
                                <li><a href="' . home_url() . '">Home</a></li>
                                <li><a href="' . home_url('/about') . '">About</a></li>
                                <li><a href="' . home_url('/contact') . '">Contact</a></li>
                            </ul>';
                        }
                    ));
                    ?>
                </div>
                
                <div class="footer-widget-area">
                    <h3>Connect With Us</h3>
                    <div class="social-icons">
                        <?php if (get_theme_mod('social_facebook')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
                                <svg viewBox="0 0 24 24" width="24" height="24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
                                <span class="screen-reader-text">Facebook</span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('social_twitter')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
                                <svg viewBox="0 0 24 24" width="24" height="24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
                                <span class="screen-reader-text">Twitter</span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('social_instagram')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
                                <svg viewBox="0 0 24 24" width="24" height="24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                <span class="screen-reader-text">Instagram</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - <?php echo get_theme_mod('footer_copyright', 'A place for frog enthusiasts'); ?></p>
                
                <?php if (has_nav_menu('privacy-menu')) : ?>
                    <nav class="privacy-navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'privacy-menu',
                            'container' => false,
                            'menu_class' => 'privacy-menu',
                            'depth' => 1,
                        ));
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>