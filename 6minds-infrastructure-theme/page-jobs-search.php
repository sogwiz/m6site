<?php
/**
 * Template Name: Jobs Search Page
 * 
 * A page template for job search results with WPJobManager
 * This page should have the [jobs] shortcode in its content
 *
 * @package 6MindsInfrastructure
 */

get_header();

// Get search keyword from URL parameter
$search_keywords = isset($_GET['search_keywords']) ? sanitize_text_field($_GET['search_keywords']) : '';
?>

<main class="main-content">
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Job Search</h1>
            <p class="page-description">Find your next opportunity in AI infrastructure</p>
        </div>
    </div>

    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class('page-content jobs-search-page'); ?>>
            <?php
            while (have_posts()) :
                the_post();
                
                // Display page content (should contain [jobs] shortcode)
                the_content();
                
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', '6minds-infrastructure'),
                    'after' => '</div>',
                ));
            endwhile;
            ?>
        </article>
    </div>
</main>

<?php
get_footer();

