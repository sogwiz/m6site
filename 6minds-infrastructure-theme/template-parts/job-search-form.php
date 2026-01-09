<?php
/**
 * Template part for displaying job search form
 *
 * @package 6MindsInfrastructure
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Get the jobs search page URL (you'll set this in WordPress settings)
$jobs_search_page = get_option('sixminds_jobs_search_page', get_post_type_archive_link('job_listing'));
if (empty($jobs_search_page)) {
    $jobs_search_page = home_url('/jobs');
}
?>

<form class="job-search-form" method="get" action="<?php echo esc_url($jobs_search_page); ?>">
    <div class="job-search-wrapper">
        <input 
            type="text" 
            name="search_keywords" 
            class="job-search-input" 
            placeholder="Search for jobs (e.g., 'Data Engineer', 'AI Infrastructure')" 
            value="<?php echo isset($_GET['search_keywords']) ? esc_attr($_GET['search_keywords']) : ''; ?>"
            required
        />
        <button type="submit" class="btn btn-primary job-search-button">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <span>Search Jobs</span>
        </button>
    </div>
</form>

