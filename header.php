<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <header>
        <div class="header-container">
            <a href="<?php echo home_url(); ?>" class="logo">
                <?php
                if (function_exists('the_custom_logo') && has_custom_logo()) {
                    the_custom_logo();
                } else {
                ?>
                <svg class="logo-icon" viewBox="0 0 100 100">
                    <polygon points="50,10 90,50 50,90 10,50" fill="none" stroke="#8bc34a" stroke-width="4" />
                    <text x="50" y="55" text-anchor="middle" font-size="12" fill="#8bc34a">Frog</text>
                </svg>
                <h1><?php bloginfo('name'); ?></h1>
                <?php } ?>
            </a>
            
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="screen-reader-text">Menu</span>
                <svg viewBox="0 0 24 24" width="24" height="24">
                    <rect y="4" width="24" height="2" rx="1" />
                    <rect y="11" width="24" height="2" rx="1" />
                    <rect y="18" width="24" height="2" rx="1" />
                </svg>
            </button>
            
            <nav id="site-navigation" class="main-navigation">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container' => false,
                        'menu_class' => 'nav-menu',
                        'menu_id' => 'primary-menu',
                        'fallback_cb' => function() {
                            echo '<ul class="nav-menu"><li><a href="' . admin_url('nav-menus.php') . '">Add a menu</a></li></ul>';
                        }
                    ));
                ?>
            </nav>
        </div>
    </header>
    
    <?php if (is_front_page() && !is_home()) : ?>
    <div class="hero-section">
        <div class="hero-content">
            <h2><?php echo get_bloginfo('description'); ?></h2>
            <?php if (get_theme_mod('hero_text')) : ?>
                <p><?php echo esc_html(get_theme_mod('hero_text')); ?></p>
            <?php endif; ?>
            <?php if (get_theme_mod('hero_button_text') && get_theme_mod('hero_button_url')) : ?>
                <a href="<?php echo esc_url(get_theme_mod('hero_button_url')); ?>" class="hero-button">
                    <?php echo esc_html(get_theme_mod('hero_button_text')); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
