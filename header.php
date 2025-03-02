<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <a href="<?php echo home_url(); ?>" class="logo">
            <svg class="logo-icon" viewBox="0 0 100 100">
                <polygon points="50,10 90,50 50,90 10,50" fill="none" stroke="#8bc34a" stroke-width="4" />
                <text x="50" y="55" text-anchor="middle" font-size="12" fill="#8bc34a">Frog</text>
            </svg>
            <h1><?php bloginfo('name'); ?></h1>
        </a>
        <nav>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => 'ul',
                    'menu_class' => 'nav-menu'
                ));
            ?>
        </nav>
    </header>
