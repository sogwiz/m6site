<?php
/**
 * 6 Minds Infrastructure Theme Functions
 *
 * @package 6MindsInfrastructure
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function sixminds_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', '6minds-infrastructure'),
    ));

    // Set content width
    $GLOBALS['content_width'] = 1200;
}
add_action('after_setup_theme', 'sixminds_theme_setup');

/**
 * Enqueue scripts and styles
 */
function sixminds_enqueue_scripts() {
    // Enqueue styles
    wp_enqueue_style(
        'sixminds-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style(
        'sixminds-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // Enqueue scripts
    // IMPORTANT: Add 'jquery' as dependency to ensure our script loads AFTER jQuery
    // This is critical for WPJobManager compatibility since it uses jQuery
    wp_enqueue_script(
        'sixminds-main-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),  // Depend on jQuery
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script for AJAX
    wp_localize_script('sixminds-main-script', 'sixmindsData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sixminds-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'sixminds_enqueue_scripts');

/**
 * Register widget areas
 */
function sixminds_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget Area', '6minds-infrastructure'),
        'id' => 'footer-widgets',
        'description' => __('Add widgets here to appear in your footer.', '6minds-infrastructure'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'sixminds_widgets_init');

/**
 * Custom excerpt length
 */
function sixminds_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'sixminds_excerpt_length');

/**
 * Custom excerpt more
 */
function sixminds_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'sixminds_excerpt_more');

/**
 * Add body classes
 */
function sixminds_body_classes($classes) {
    if (is_singular()) {
        $classes[] = 'singular';
    }
    if (is_home() || is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'sixminds_body_classes');

/**
 * WPJobManager compatibility - Add theme support
 */
function sixminds_wpjm_support() {
    add_theme_support('job-manager-templates');
}
add_action('after_setup_theme', 'sixminds_wpjm_support');

/**
 * Customize WPJobManager output
 */
function sixminds_wpjm_styles() {
    if (sixminds_is_wpjm_active()) {
        wp_add_inline_style('sixminds-main-style', '
            .job_listings .job_listing {
                background: rgba(15, 23, 42, 0.8);
                border: 1px solid rgba(100, 116, 139, 0.3);
                border-radius: 0.75rem;
                padding: 1.5rem;
                margin-bottom: 1.5rem;
                transition: all 0.3s ease;
            }
            .job_listings .job_listing:hover {
                border-color: rgba(6, 182, 212, 0.5);
                box-shadow: 0 0 20px rgba(6, 182, 212, 0.2);
            }
            .job_listing-title a {
                color: #fff;
                font-size: 1.5rem;
                font-weight: 600;
            }
            .job_listing-title a:hover {
                color: #22d3ee;
            }
            .job_listing-meta {
                color: #cbd5e1;
            }
            .job_listing-type {
                background: linear-gradient(to right, #06b6d4, #3b82f6);
                color: #fff;
                padding: 0.25rem 0.75rem;
                border-radius: 0.375rem;
                font-size: 0.875rem;
            }
        ');
    }
}
add_action('wp_enqueue_scripts', 'sixminds_wpjm_styles', 20);

/**
 * Check if WPJobManager is active (safe wrapper)
 * Note: WPJobManager plugin provides its own is_wpjm() function,
 * so we use this wrapper to avoid conflicts
 */
function sixminds_is_wpjm_active() {
    // Use WPJobManager's function if available, otherwise check class
    if (function_exists('is_wpjm')) {
        return is_wpjm();
    }
    return class_exists('WP_Job_Manager');
}

/**
 * Add custom logo support
 */
function sixminds_custom_logo_setup() {
    $defaults = array(
        'height' => 32,
        'width' => 32,
        'flex-height' => true,
        'flex-width' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'sixminds_custom_logo_setup');

/**
 * Default menu fallback
 */
function sixminds_default_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about')) . '">About</a></li>';
    if (sixminds_is_wpjm_active()) {
        $jobs_link = get_post_type_archive_link('job_listing');
        if ($jobs_link) {
            echo '<li><a href="' . esc_url($jobs_link) . '">Jobs</a></li>';
        } else {
            echo '<li><a href="' . esc_url(home_url('/jobs')) . '">Jobs</a></li>';
        }
    } else {
        echo '<li><a href="' . esc_url(home_url('/jobs')) . '">Jobs</a></li>';
    }
    echo '</ul>';
}

/**
 * Shortcode to display hero section
 * Usage: [hero_section] or [hero]
 */
function sixminds_hero_section_shortcode($atts) {
    // Wrap in a div that breaks out of container constraints
    ob_start();
    echo '<div class="hero-section-wrapper">';
    get_template_part('template-parts/hero-section');
    echo '</div>';
    return ob_get_clean();
}
add_shortcode('hero_section', 'sixminds_hero_section_shortcode');
add_shortcode('hero', 'sixminds_hero_section_shortcode');

/**
 * Shortcode to display services section
 * Usage: [services_section] or [services]
 */
function sixminds_services_section_shortcode($atts) {
    ob_start();
    get_template_part('template-parts/services-section');
    return ob_get_clean();
}
add_shortcode('services_section', 'sixminds_services_section_shortcode');
add_shortcode('services', 'sixminds_services_section_shortcode');

/**
 * Shortcode to display job search form
 * Usage: [job_search_form]
 */
function sixminds_job_search_form_shortcode($atts) {
    ob_start();
    get_template_part('template-parts/job-search-form');
    return ob_get_clean();
}
add_shortcode('job_search_form', 'sixminds_job_search_form_shortcode');

/**
 * Register jobs search page setting
 */
function sixminds_register_jobs_search_setting() {
    register_setting('reading', 'sixminds_jobs_search_page');
    add_settings_field(
        'sixminds_jobs_search_page',
        __('Jobs Search Page', '6minds-infrastructure'),
        'sixminds_jobs_search_page_callback',
        'reading'
    );
}
add_action('admin_init', 'sixminds_register_jobs_search_setting');

function sixminds_jobs_search_page_callback() {
    $saved_url = get_option('sixminds_jobs_search_page', '');
    $pages = get_pages();
    echo '<select name="sixminds_jobs_search_page">';
    echo '<option value="">' . __('Select a page...', '6minds-infrastructure') . '</option>';
    foreach ($pages as $page) {
        $page_url = get_permalink($page->ID);
        // Compare URLs, not IDs, since we store the URL
        $selected = selected($saved_url, $page_url, false);
        echo '<option value="' . esc_url($page_url) . '" ' . $selected . '>' . esc_html($page->post_title) . '</option>';
    }
    echo '</select>';
    echo '<p class="description">' . __('Select the page that contains the [jobs] shortcode for search results.', '6minds-infrastructure') . '</p>';
}

/**
 * Shortcode to display job categories browser
 * Usage: [job_categories_browser]
 */
function sixminds_job_categories_browser_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Browse by Category',
        'show_count' => 'yes',
        'orderby' => 'name',
        'order' => 'ASC'
    ), $atts);
    
    // Get all job listing categories
    $categories = get_terms(array(
        'taxonomy' => 'job_listing_category',
        'hide_empty' => true,
        'orderby' => $atts['orderby'],
        'order' => $atts['order']
    ));
    
    if (empty($categories) || is_wp_error($categories)) {
        return '';
    }
    
    ob_start();
    ?>
    <div class="job-categories-browser">
        <h2 class="job-categories-title"><?php echo esc_html($atts['title']); ?></h2>
        <div class="job-categories-grid">
            <?php foreach ($categories as $category) : 
                $category_link = get_term_link($category);
                if (is_wp_error($category_link)) {
                    continue;
                }
                ?>
                <a href="<?php echo esc_url($category_link); ?>" class="job-category-card">
                    <div class="job-category-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 7h-9"></path>
                            <path d="M14 17H5"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                    </div>
                    <h3 class="job-category-name"><?php echo esc_html($category->name); ?></h3>
                    <?php if ($atts['show_count'] === 'yes') : ?>
                        <span class="job-category-count"><?php echo esc_html($category->count); ?> <?php echo _n('job', 'jobs', $category->count, '6minds-infrastructure'); ?></span>
                    <?php endif; ?>
                    <span class="job-category-arrow">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('job_categories_browser', 'sixminds_job_categories_browser_shortcode');
add_shortcode('browse_job_categories', 'sixminds_job_categories_browser_shortcode');
