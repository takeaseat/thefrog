<?php
/**
 * The Frog Theme Customizer
 *
 * @package frog-theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register theme customizer settings
 */
function frog_customize_register($wp_customize) {
    // Add section for theme colors
    $wp_customize->add_section('frog_colors', array(
        'title'    => __('Theme Colors', 'frog-theme'),
        'priority' => 30,
    ));
    
    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#4CAF50',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Primary Color', 'frog-theme'),
        'section'  => 'frog_colors',
        'settings' => 'primary_color',
    )));
    
    // Secondary Color
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#388E3C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Secondary Color', 'frog-theme'),
        'section'  => 'frog_colors',
        'settings' => 'secondary_color',
    )));
    
    // Background Opacity
    $wp_customize->add_setting('background_opacity', array(
        'default'           => '0.15',
        'sanitize_callback' => 'frog_sanitize_opacity',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('background_opacity', array(
        'label'       => __('Background Opacity', 'frog-theme'),
        'description' => __('Adjust the opacity of the background image (0.1 to 0.9)', 'frog-theme'),
        'section'     => 'frog_colors',
        'settings'    => 'background_opacity',
        'type'        => 'range',
        'input_attrs' => array(
            'min'   => 0.1,
            'max'   => 0.9,
            'step'  => 0.05,
        ),
    ));
    
    // Add section for hero settings
    $wp_customize->add_section('frog_hero', array(
        'title'    => __('Hero Section', 'frog-theme'),
        'priority' => 35,
    ));
    
    // Hero Text
    $wp_customize->add_setting('hero_text', array(
        'default'           => 'Discover the fascinating world of frogs and their habitats.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_text', array(
        'label'    => __('Hero Text', 'frog-theme'),
        'section'  => 'frog_hero',
        'type'     => 'textarea',
    ));
    
    // Hero Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default'           => 'Explore Now',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_button_text', array(
        'label'    => __('Button Text', 'frog-theme'),
        'section'  => 'frog_hero',
        'type'     => 'text',
    ));
    
    // Hero Button URL
    $wp_customize->add_setting('hero_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('hero_button_url', array(
        'label'    => __('Button URL', 'frog-theme'),
        'section'  => 'frog_hero',
        'type'     => 'url',
    ));
    
    // Add section for CTA settings
    $wp_customize->add_section('frog_cta', array(
        'title'    => __('Call to Action', 'frog-theme'),
        'priority' => 40,
    ));
    
    // CTA Title
    $wp_customize->add_setting('cta_title', array(
        'default'           => 'Join Our Frog Community',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cta_title', array(
        'label'    => __('CTA Title', 'frog-theme'),
        'section'  => 'frog_cta',
        'type'     => 'text',
    ));
    
    // CTA Text
    $wp_customize->add_setting('cta_text', array(
        'default'           => 'Subscribe to our newsletter for the latest updates on frog conservation and care tips.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cta_text', array(
        'label'    => __('CTA Text', 'frog-theme'),
        'section'  => 'frog_cta',
        'type'     => 'textarea',
    ));
    
    // CTA Button Text
    $wp_customize->add_setting('cta_button_text', array(
        'default'           => 'Subscribe Now',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cta_button_text', array(
        'label'    => __('Button Text', 'frog-theme'),
        'section'  => 'frog_cta',
        'type'     => 'text',
    ));
    
    // CTA Button URL
    $wp_customize->add_setting('cta_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('cta_button_url', array(
        'label'    => __('Button URL', 'frog-theme'),
        'section'  => 'frog_cta',
        'type'     => 'url',
    ));
    
    // Add section for footer settings
    $wp_customize->add_section('frog_footer', array(
        'title'    => __('Footer Settings', 'frog-theme'),
        'priority' => 45,
    ));
    
    // Footer About Text
    $wp_customize->add_setting('footer_about', array(
        'default'           => 'A place for frog enthusiasts to learn and share information about these amazing amphibians.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_about', array(
        'label'    => __('About Text', 'frog-theme'),
        'section'  => 'frog_footer',
        'type'     => 'textarea',
    ));
    
    // Footer Copyright Text
    $wp_customize->add_setting('footer_copyright', array(
        'default'           => 'A place for frog enthusiasts',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_copyright', array(
        'label'    => __('Copyright Text', 'frog-theme'),
        'section'  => 'frog_footer',
        'type'     => 'text',
    ));
    
    // Social Media Links
    $wp_customize->add_setting('social_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_facebook', array(
        'label'    => __('Facebook URL', 'frog-theme'),
        'section'  => 'frog_footer',
        'type'     => 'url',
    ));
    
    $wp_customize->add_setting('social_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_twitter', array(
        'label'    => __('Twitter URL', 'frog-theme'),
        'section'  => 'frog_footer',
        'type'     => 'url',
    ));
    
    $wp_customize->add_setting('social_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_instagram', array(
        'label'    => __('Instagram URL', 'frog-theme'),
        'section'  => 'frog_footer',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'frog_customize_register');

/**
 * Sanitize opacity value
 */
function frog_sanitize_opacity($input) {
    $input = floatval($input);
    return ($input >= 0.1 && $input <= 0.9) ? $input : 0.15;
}

/**
 * Output custom CSS for Customizer settings
 */
function frog_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr(get_theme_mod('primary_color', '#4CAF50')); ?>;
            --secondary-color: <?php echo esc_attr(get_theme_mod('secondary_color', '#388E3C')); ?>;
            --background-opacity: <?php echo esc_attr(get_theme_mod('background_opacity', '0.15')); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'frog_customizer_css');