<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package frog-theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Custom excerpt length
 */
function frog_custom_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'frog_custom_excerpt_length');

/**
 * Custom excerpt more
 */
function frog_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'frog_custom_excerpt_more');

/**
 * Add wp_body_open function for older WordPress versions
 */
if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        do_action('wp_body_open');
    }
}

/**
 * Add SVG support
 */
function frog_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'frog_mime_types');

/**
 * Disable Gutenberg editor for specific templates
 */
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