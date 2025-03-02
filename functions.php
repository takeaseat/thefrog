<?php
// Theme setup function
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
}
add_action('after_setup_theme', 'frog_theme_setup');

// Enqueue styles and scripts
function frog_theme_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('frog-style', get_stylesheet_uri());
    
    // Enqueue Google Fonts
    wp_enqueue_style('frog-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap', array(), null);
    
    // Enqueue custom CSS
    wp_enqueue_style('frog-main-style', get_template_directory_uri() . '/assets/css/main.css');
    
    // Enqueue theme script
    wp_enqueue_script('frog-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
    
    // Add comment reply script if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'frog_theme_scripts');

// Register sidebar
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

// Custom excerpt length
function frog_custom_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'frog_custom_excerpt_length');

// Custom excerpt more
function frog_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'frog_custom_excerpt_more');

// Theme Customizer
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

// Sanitize opacity value
function frog_sanitize_opacity($input) {
    $input = floatval($input);
    return ($input >= 0.1 && $input <= 0.9) ? $input : 0.15;
}

// Output custom CSS for Customizer settings
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

// Add wp_body_open function for older WordPress versions
if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        do_action('wp_body_open');
    }
}

// Add SVG support
function frog_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'frog_mime_types');

// Add custom image sizes
add_image_size('frog-featured', 1200, 600, true);
add_image_size('frog-gallery', 400, 400, true);

// Disable Gutenberg editor for specific templates
function frog_disable_gutenberg($is_enabled, $post_type) {
    if ($post_type === 'page') {
        $template = get_page_template_slug(get_the_ID());
        if ($template === 'templates/full-width.php') {
            return false;
        }
    }
    return $is_enabled;
}
add_filter('use_block_editor_for_post_type', 'frog_disable_gutenberg', 10, 2);