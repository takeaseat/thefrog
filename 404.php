<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package frog-theme
 */

get_header();
?>

<main>
    <section class="content error-404">
        <h1><?php esc_html_e('404 - Page Not Found', 'frog-theme'); ?></h1>
        <p><?php esc_html_e('Oops! The page you are looking for seems to have hopped away.', 'frog-theme'); ?></p>
        <div class="error-image">
            <svg viewBox="0 0 100 100" width="200" height="200">
                <circle cx="50" cy="50" r="40" fill="#e0f2e0" />
                <circle cx="35" cy="40" r="5" fill="#333" />
                <circle cx="65" cy="40" r="5" fill="#333" />
                <path d="M 30 60 Q 50 70 70 60" fill="none" stroke="#333" stroke-width="2" />
            </svg>
        </div>
        <p><?php esc_html_e('Here are some helpful links:', 'frog-theme'); ?></p>
        <ul>
            <li><a href="<?php echo home_url(); ?>"><?php esc_html_e('Return to Homepage', 'frog-theme'); ?></a></li>
            <li><?php esc_html_e('Try using the search below:', 'frog-theme'); ?></li>
        </ul>
        
        <?php get_search_form(); ?>
    </section>
</main>

<?php
get_footer();