<?php
/**
* Template Name: Subcategory
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header();
?>

<main id="primary" class="site-main grid grid-2-6-col p-3">
    <aside></aside>
    <div class="subcategory-product-grid">
        <!-- Query for Posts based on page title -->
        <?php 
            // wp-query to get all published posts without pagination
            $title = get_the_title();
            $allPostsWPQuery = new WP_Query(array(
                    'post_type'=>'post', 
                    'post_status'=>'publish', 
                    'category_name'=> $title,
                    'posts_per_page'=>-1
                )); 
        ?>
        
        <?php if ( $allPostsWPQuery->have_posts() ) : ?>
        
        <ul class="grid grid-3-col">
            <?php while ( $allPostsWPQuery->have_posts() ) : $allPostsWPQuery->the_post(); ?>
                <?php get_template_part( 'template-parts/content', 'posts-thumb' ); ?>
            <?php endwhile; ?>
        </ul>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'There no posts to display.' ); ?></p>
        <?php endif; ?>
    </div>
</main><!-- #main -->

<?php
get_footer();
