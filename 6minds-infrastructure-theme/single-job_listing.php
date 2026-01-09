<?php
/**
 * The template for displaying single job listings
 * WPJobManager compatible
 *
 * @package 6MindsInfrastructure
 */

get_header();
?>

<main class="main-content">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="job-<?php the_ID(); ?>" <?php post_class('single-job-listing'); ?>>
                <header class="job-header">
                    <div class="job-header-content">
                        <h1 class="job-title"><?php the_title(); ?></h1>
                        <div class="job-meta">
                            <?php 
                            $location = get_post_meta(get_the_ID(), '_job_location', true);
                            if (empty($location)) {
                                $location = get_post_meta(get_the_ID(), 'job_location', true);
                            }
                            if (!empty($location)) : ?>
                                <span class="job-location">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    <?php echo esc_html($location); ?>
                                </span>
                            <?php endif; ?>
                            <?php 
                            // Get job type from taxonomy (WPJobManager standard)
                            $job_types = wp_get_post_terms(get_the_ID(), 'job_listing_type');
                            if (!empty($job_types) && !is_wp_error($job_types)) {
                                foreach ($job_types as $job_type) {
                                    echo '<span class="job-type">' . esc_html($job_type->name) . '</span>';
                                }
                            } else {
                                // Fallback to meta
                                $job_type = get_post_meta(get_the_ID(), '_job_type', true);
                                if ($job_type) {
                                    echo '<span class="job-type">' . esc_html($job_type) . '</span>';
                                }
                            }
                            ?>
                            <?php if (get_post_meta(get_the_ID(), '_application_deadline', true)) : ?>
                                <span class="job-deadline">
                                    Deadline: <?php echo esc_html(get_post_meta(get_the_ID(), '_application_deadline', true)); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="job-actions">
                        <?php 
                        $application_email = get_post_meta(get_the_ID(), '_application', true);
                        if ($application_email) : ?>
                            <a href="mailto:<?php echo esc_attr($application_email); ?>" class="btn btn-primary">Apply Now</a>
                        <?php else : ?>
                            <a href="#apply" class="btn btn-primary">Apply Now</a>
                        <?php endif; ?>
                    </div>
                </header>

                <div class="job-content-wrapper">
                    <div class="job-main-content">
                        <div class="job-description">
                            <h2>Job Description</h2>
                            <?php the_content(); ?>
                        </div>

                        <?php if (get_post_meta(get_the_ID(), '_job_requirements', true)) : ?>
                            <div class="job-requirements">
                                <h2>Requirements</h2>
                                <?php echo wp_kses_post(wpautop(get_post_meta(get_the_ID(), '_job_requirements', true))); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (get_post_meta(get_the_ID(), '_job_benefits', true)) : ?>
                            <div class="job-benefits">
                                <h2>Benefits</h2>
                                <?php echo wp_kses_post(wpautop(get_post_meta(get_the_ID(), '_job_benefits', true))); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <aside class="job-sidebar">
                        <div class="job-sidebar-card">
                            <h3>Job Details</h3>
                            <ul class="job-details-list">
                                <?php 
                                $location = get_post_meta(get_the_ID(), '_job_location', true);
                                if (empty($location)) {
                                    $location = get_post_meta(get_the_ID(), 'job_location', true);
                                }
                                if (!empty($location)) : ?>
                                    <li>
                                        <strong>Location:</strong>
                                        <span><?php echo esc_html($location); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php 
                                // Get job type from taxonomy
                                $job_types = wp_get_post_terms(get_the_ID(), 'job_listing_type');
                                if (!empty($job_types) && !is_wp_error($job_types)) {
                                    echo '<li><strong>Type:</strong><span>';
                                    $type_names = array();
                                    foreach ($job_types as $job_type) {
                                        $type_names[] = esc_html($job_type->name);
                                    }
                                    echo implode(', ', $type_names);
                                    echo '</span></li>';
                                } else {
                                    $job_type = get_post_meta(get_the_ID(), '_job_type', true);
                                    if ($job_type) {
                                        echo '<li><strong>Type:</strong><span>' . esc_html($job_type) . '</span></li>';
                                    }
                                }
                                ?>
                                <?php if (get_post_meta(get_the_ID(), '_job_salary', true)) : ?>
                                    <li>
                                        <strong>Salary:</strong>
                                        <span><?php echo esc_html(get_post_meta(get_the_ID(), '_job_salary', true)); ?></span>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <?php 
                        // WPJobManager application form
                        if (class_exists('WP_Job_Manager')) {
                            $application_form = get_post_meta(get_the_ID(), '_application', true);
                            if ($application_form && is_email($application_form)) {
                                ?>
                                <div class="job-sidebar-card" id="apply">
                                    <h3>Apply for this Position</h3>
                                    <p>To apply, please email:</p>
                                    <a href="mailto:<?php echo esc_attr($application_form); ?>" class="btn btn-primary"><?php echo esc_html($application_form); ?></a>
                                </div>
                                <?php
                            } elseif (shortcode_exists('job_application_form')) {
                                ?>
                                <div class="job-sidebar-card" id="apply">
                                    <h3>Apply for this Position</h3>
                                    <?php echo do_shortcode('[job_application_form]'); ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </aside>
                </div>
            </article>

            <?php
            // Job navigation
            the_post_navigation(array(
                'prev_text' => '<span class="nav-subtitle">Previous Job</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">Next Job</span> <span class="nav-title">%title</span>',
            ));
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();

