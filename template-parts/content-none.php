<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package frog-theme
 */
?>

<div class="no-results">
    <h2><?php esc_html_e('No Posts Found', 'frog-theme'); ?></h2>
    
    <?php if (is_search()) : ?>
        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'frog-theme'); ?></p>
        <?php get_search_form(); ?>
    <?php else : ?>
        <p><?php esc_html_e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'frog-theme'); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</div>