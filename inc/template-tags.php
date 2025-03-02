<?php
/**
 * Custom template tags for this theme
 *
 * @package frog-theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Displays the post date
 */
function frog_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Displays the post author
 */
function frog_posted_by() {
    echo '<span class="byline">' . 
        sprintf(
            'by <a href="%1$s">%2$s</a>',
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_html(get_the_author())
        ) . 
    '</span>';
}

/**
 * Displays post categories
 */
function frog_post_categories() {
    if (has_category()) {
        echo '<span class="post-categories">';
        the_category(', ');
        echo '</span>';
    }
}

/**
 * Displays post tags
 */
function frog_post_tags() {
    if (has_tag()) {
        echo '<span class="post-tags">';
        the_tags('Tags: ', ', ', '');
        echo '</span>';
    }
}

/**
 * Displays post thumbnail with proper markup
 */
function frog_post_thumbnail($size = 'medium_large') {
    if (has_post_thumbnail()) {
        echo '<div class="post-thumbnail">';
        echo '<a href="' . esc_url(get_permalink()) . '">';
        the_post_thumbnail($size, array('class' => 'post-thumbnail-img'));
        echo '</a>';
        echo '</div>';
    }
}