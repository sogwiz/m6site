<?php
/**
 * Template Name: Page with Hero Section
 * 
 * A page template that includes the hero section above the page content
 *
 * @package 6MindsInfrastructure
 */

get_header();
?>

<main class="main-content">
    <?php
    // Include hero section
    get_template_part('template-parts/hero-section');
    ?>

    <div class="page-header">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if (get_the_excerpt()) : ?>
                <p class="page-description"><?php echo get_the_excerpt(); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
            <?php
            while (have_posts()) :
                the_post();
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', '6minds-infrastructure'),
                    'after' => '</div>',
                ));
            endwhile;
            ?>
        </article>
    </div>
</main>

<?php
get_footer();

