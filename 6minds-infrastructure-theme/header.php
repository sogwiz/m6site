<?php
/**
 * The header for our theme
 *
 * @package 6MindsInfrastructure
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="navbar" id="navbar">
    <div class="navbar-container">
        <div class="navbar-brand">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/6-minds-infrastructure-logo.png'); ?>" alt="<?php bloginfo('name'); ?>" class="logo-img">
                <?php endif; ?>
                <span class="navbar-brand-text">
                    <?php 
                    // Get site name and remove "Infrastructure" if it's already there to avoid duplication
                    $site_name = get_bloginfo('name');
                    $site_name = str_replace(' Infrastructure', '', $site_name);
                    $site_name = str_replace('Infrastructure', '', $site_name);
                    $site_name = trim($site_name);
                    // If site name is empty or just whitespace, use default
                    if (empty($site_name)) {
                        $site_name = '6 Minds';
                    }
                    echo esc_html($site_name);
                    ?>
                    <span class="brand-accent">Infrastructure</span>
                </span>
            </a>
        </div>

        <!-- Desktop Navigation -->
        <div class="navbar-nav desktop-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-menu',
                'container' => false,
                'fallback_cb' => 'sixminds_default_menu',
            ));
            ?>
            <a href="#" class="btn-client-portal">Client Portal</a>
        </div>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobile-nav">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'mobile-nav-menu',
            'container' => false,
            'fallback_cb' => 'sixminds_default_menu',
        ));
        ?>
        <a href="#" class="btn-client-portal-mobile">Client Portal</a>
    </div>
</nav>

