<?php
/**
 * Template part for displaying job listings
 * WPJobManager compatible
 *
 * @package 6MindsInfrastructure
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="job_listing">
    <div class="job_listing-header">
        <h2 class="job_listing-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php 
        // WPJobManager location meta key
        $location = get_post_meta(get_the_ID(), '_job_location', true);
        if (empty($location)) {
            $location = get_post_meta(get_the_ID(), 'job_location', true);
        }
        if (!empty($location)) : ?>
            <div class="job_listing-location">
                <?php echo esc_html($location); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="job_listing-content">
        <?php 
        if (has_excerpt()) {
            the_excerpt();
        } else {
            echo wp_trim_words(get_the_content(), 30, '...');
        }
        ?>
    </div>
    <div class="job_listing-meta">
        <?php 
        // Get job type from taxonomy (WPJobManager standard)
        $job_types = wp_get_post_terms(get_the_ID(), 'job_listing_type');
        if (!empty($job_types) && !is_wp_error($job_types)) {
            foreach ($job_types as $job_type) {
                echo '<span class="job_listing-type">' . esc_html($job_type->name) . '</span>';
            }
        } else {
            // Fallback to meta
            $job_type = get_post_meta(get_the_ID(), '_job_type', true);
            if (empty($job_type)) {
                $job_type = get_post_meta(get_the_ID(), 'job_type', true);
            }
            if (!empty($job_type)) {
                echo '<span class="job_listing-type">' . esc_html($job_type) . '</span>';
            }
        }
        
        // Get job categories (WPJobManager uses 'job_listing_category' taxonomy)
        $job_categories = wp_get_post_terms(get_the_ID(), 'job_listing_category');
        if (!empty($job_categories) && !is_wp_error($job_categories)) {
            foreach ($job_categories as $category) {
                $category_link = get_term_link($category);
                if (!is_wp_error($category_link)) {
                    echo '<a href="' . esc_url($category_link) . '" class="job_listing-category">' . esc_html($category->name) . '</a>';
                }
            }
        }
        ?>
        <a href="<?php the_permalink(); ?>" class="job_listing-link">View Details</a>
    </div>
</div>

