<?php
/**
 * Template part for displaying the hero section
 *
 * @package 6MindsInfrastructure
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-background">
        <div class="hero-grid"></div>
    </div>
    <div class="hero-orbs">
        <div class="hero-orb orb-1"></div>
        <div class="hero-orb orb-2"></div>
    </div>
    
    <div class="hero-content">
        <div class="hero-icons">
            <div class="hero-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                </svg>
            </div>
            <div class="hero-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
            </div>
            <div class="hero-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                </svg>
            </div>
        </div>

        <h1 class="hero-title">
            <span class="hero-title-gradient">Elite AI Infrastructure</span>
            <span class="hero-title-white">Staffing Solutions</span>
        </h1>

        <p class="hero-description">
            Connecting elite contractors with mission-critical AI data center buildouts and operations
        </p>

        <?php
        // Include job search form in hero section
        get_template_part('template-parts/job-search-form');
        ?>
    </div>
</section>

