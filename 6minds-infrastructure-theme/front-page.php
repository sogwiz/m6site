<?php
/**
 * The front page template
 *
 * @package 6MindsInfrastructure
 */

get_header();

// Check if a static page is set as the homepage
$show_on_front = get_option('show_on_front');
$page_on_front = get_option('page_on_front');

// If a static page is set as homepage, display the page content
if ($show_on_front === 'page' && $page_on_front) {
    // Use WP_Query to get the front page
    $front_page_query = new WP_Query(array(
        'page_id' => $page_on_front,
        'post_type' => 'page'
    ));
    
    if ($front_page_query->have_posts()) :
        while ($front_page_query->have_posts()) : $front_page_query->the_post();
            ?>
            <main class="main-content">
                <?php 
                // Get the raw page content
                $page_content = get_the_content();
                $has_hero = has_shortcode($page_content, 'hero_section') || has_shortcode($page_content, 'hero');
                
                // Only show page header if hero section is not present
                if (!$has_hero) : ?>
                    <div class="page-header">
                        <div class="container">
                            <h1 class="page-title"><?php the_title(); ?></h1>
                            <?php if (get_the_excerpt()) : ?>
                                <p class="page-description"><?php echo get_the_excerpt(); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                // If hero shortcode exists, render it first outside container
                if ($has_hero) {
                    // Extract and render hero shortcode
                    if (has_shortcode($page_content, 'hero_section')) {
                        echo do_shortcode('[hero_section]');
                        // Remove hero shortcode from content (including any surrounding whitespace/paragraphs)
                        $page_content = preg_replace('/\s*\[hero_section\]\s*/i', '', $page_content);
                    } elseif (has_shortcode($page_content, 'hero')) {
                        echo do_shortcode('[hero]');
                        // Remove hero shortcode from content (including any surrounding whitespace/paragraphs)
                        $page_content = preg_replace('/\s*\[hero\]\s*/i', '', $page_content);
                    }
                }
                ?>

                <div class="container">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                        <?php 
                        // Display remaining content (without hero shortcode)
                        echo apply_filters('the_content', $page_content);

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', '6minds-infrastructure'),
                            'after' => '</div>',
                        ));
                        ?>
                    </article>
                </div>
            </main>
            <?php
        endwhile;
    endif;
    wp_reset_postdata();
} else {
    // Default homepage content (when using blog posts or no static page)
    ?>
    <main class="main-content">
        <?php
        // Use template parts for reusable sections
        get_template_part('template-parts/hero-section');
        get_template_part('template-parts/services-section');
        ?>
    </main>
    <?php
}
?>

<?php
get_footer();

