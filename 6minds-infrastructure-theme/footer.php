<?php
/**
 * The footer for our theme
 *
 * @package 6MindsInfrastructure
 */
?>

<footer class="site-footer">
    <div class="footer-background"></div>
    <div class="footer-container">
        <div class="footer-grid">
            <div class="footer-column">
                <div class="footer-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/6-minds-infrastructure-logo.png'); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo-img">
                    <?php endif; ?>
                    <span class="footer-brand-text">6Minds Infra</span>
                </div>
                <p class="footer-description">
                    Elite staffing solutions for mission-critical AI data center operations worldwide
                </p>
            </div>

            <div class="footer-column">
                <h3 class="footer-title">Services</h3>
                <ul class="footer-links">
                    <li><a href="#">Recruiting</a></li>
                    <li><a href="#">Managed Services</a></li>
                    <li><a href="#">Advisory</a></li>
                    <li><a href="#">Optimization</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3 class="footer-title">Expertise</h3>
                <ul class="footer-links">
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Energy</a></li>
                    <li><a href="#">Engineering</a></li>
                    <li><a href="#">Global Operations</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3 class="footer-title">Contact</h3>
                <ul class="footer-contact">
                    <li>
                        <svg class="footer-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span>info@6mindsinfra.com</span>
                    </li>
                    <li>
                        <svg class="footer-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span></span>
                    </li>
                    <li>
                        <svg class="footer-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Texas</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="footer-copyright">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, LLC. All rights reserved.
            </p>
            <div class="footer-legal">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Careers</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

