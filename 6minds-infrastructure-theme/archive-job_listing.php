<?php
/**
 * The template for displaying job listings archive
 * WPJobManager compatible
 *
 * @package 6MindsInfrastructure
 */

get_header();
?>

<main class="main-content">
    <?php
    // Optionally include hero section above job listings
    // You can remove this if you don't want the hero on the jobs page
    get_template_part('template-parts/hero-section');
    ?>

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Job Listings</h1>
            <p class="page-description">Find your next opportunity in AI infrastructure</p>
        </div>
    </div>

    <div class="container">
        <div class="job-listings-wrapper">
            <?php
            // WPJobManager uses standard WordPress loop
            if (have_posts()) :
                echo '<div class="job_listings">';
                while (have_posts()) : the_post();
                    get_template_part('content', 'job_listing');
                endwhile;
                echo '</div>';

                // Pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ));
            else :
                ?>
                <div class="no-jobs">
                    <h2>No Jobs Found</h2>
                    <p>There are currently no job listings available. Please check back later.</p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();

