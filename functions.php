<?php
/**
 * The Frog Theme functions and definitions
 *
 * @package frog-theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define theme version
define('FROG_THEME_VERSION', '0.1.5');

// Include required files
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Theme setup function
 */
function frog_theme_setup() {
    // Enable dynamic document title
    add_theme_support('title-tag');
    
    // Enable featured images
    add_theme_support('post-thumbnails');
    
    // Register navigation menus
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'frog-theme'),
        'footer-menu' => __('Footer Menu', 'frog-theme'),
        'privacy-menu' => __('Privacy Menu', 'frog-theme'),
    ));
    
    // Add custom background support
    add_theme_support('custom-background', array(
        'default-color' => 'f9f9f9',
        'default-image' => get_template_directory_uri() . '/assets/images/bg.svg',
    ));
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Add support for block styles
    add_theme_support('wp-block-styles');
    
    // Add custom image sizes
    add_image_size('frog-featured', 1200, 600, true);
    add_image_size('frog-gallery', 400, 400, true);
}
add_action('after_setup_theme', 'frog_theme_setup');

/**
 * Enqueue styles and scripts
 */
function frog_theme_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('frog-style', get_stylesheet_uri(), array(), FROG_THEME_VERSION);
    
    // Enqueue Google Fonts
    wp_enqueue_style('frog-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap', array(), null);
    
    // Enqueue custom CSS
    wp_enqueue_style('frog-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), FROG_THEME_VERSION);
    
    // Enqueue theme script
    wp_enqueue_script('frog-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), FROG_THEME_VERSION, true);
    
    // Add comment reply script if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'frog_theme_scripts');

/**
 * Register sidebar
 */
function frog_widgets_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'frog-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'frog-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'frog-theme'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in the first footer column.', 'frog-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'frog-theme'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in the second footer column.', 'frog-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'frog-theme'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in the third footer column.', 'frog-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'frog_widgets_init');