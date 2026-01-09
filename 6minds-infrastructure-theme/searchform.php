<?php
/**
 * Search form template
 *
 * @package 6MindsInfrastructure
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Search for:', '6minds-infrastructure'); ?></span>
        <input 
            type="search" 
            class="search-field" 
            placeholder="<?php esc_attr_e('Search...', '6minds-infrastructure'); ?>" 
            value="<?php echo get_search_query(); ?>" 
            name="s" 
        />
    </label>
    <button type="submit" class="search-submit">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
        </svg>
        <span class="screen-reader-text"><?php _e('Search', '6minds-infrastructure'); ?></span>
    </button>
</form>

