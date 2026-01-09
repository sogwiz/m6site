<?php
/**
 * The template for displaying all single posts
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
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                <header class="post-header">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <?php if (get_the_category()) : ?>
                            <span class="post-category"><?php the_category(', '); ?></span>
                        <?php endif; ?>
                        <?php if (get_the_author()) : ?>
                            <span class="post-author">By <?php the_author(); ?></span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image">
                        <?php the_post_thumbnail('large', array('class' => 'featured-image')); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', '6minds-infrastructure'),
                    'after' => '</div>',
                ));
                ?>

                <footer class="post-footer">
                    <?php if (get_the_tags()) : ?>
                        <div class="post-tags">
                            <?php the_tags('<span class="tags-label">Tags: </span>', ', ', ''); ?>
                        </div>
                    <?php endif; ?>
                </footer>
            </article>

            <?php
            // Post navigation
            the_post_navigation(array(
                'prev_text' => '<span class="nav-subtitle">Previous</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">Next</span> <span class="nav-title">%title</span>',
            ));

            // Comments
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();

