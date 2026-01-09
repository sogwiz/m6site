<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package 6MindsInfrastructure
 */

get_header();
?>

<main class="main-content">
    <div class="container">
        <div class="error-404">
            <h1 class="error-title">404</h1>
            <h2 class="error-heading">Page Not Found</h2>
            <p class="error-description">
                The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
            </p>
            <div class="error-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Go to Homepage</a>
                <a href="<?php echo esc_url(home_url('/jobs')); ?>" class="btn btn-secondary">Browse Jobs</a>
            </div>
            <div class="error-search">
                <h3>Search for something else?</h3>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();

