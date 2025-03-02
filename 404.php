<?php get_header(); ?>

<main>
    <section class="content error-404">
        <h1>404 - Page Not Found</h1>
        <p>Oops! The page you are looking for seems to have hopped away.</p>
        <div class="error-image">
            <svg viewBox="0 0 100 100" width="200" height="200">
                <circle cx="50" cy="50" r="40" fill="#e0f2e0" />
                <circle cx="35" cy="40" r="5" fill="#333" />
                <circle cx="65" cy="40" r="5" fill="#333" />
                <path d="M 30 60 Q 50 70 70 60" fill="none" stroke="#333" stroke-width="2" />
            </svg>
        </div>
        <p>Here are some helpful links:</p>
        <ul>
            <li><a href="<?php echo home_url(); ?>">Return to Homepage</a></li>
            <li>Try using the search below:</li>
        </ul>
        
        <?php get_search_form(); ?>
    </section>
</main>

<?php get_footer(); ?>
