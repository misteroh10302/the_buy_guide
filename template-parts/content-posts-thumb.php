<?php
/**
 * Template part for displaying posts thumbnail
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Buy_Guide
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="product-card">
        <?php the_buy_guide_post_thumbnail(); ?>
        <div class="thumbnail-details grid grid-2-col gap-small p-t-1">
            <div class="thumbnail-details-right">
                <!-- Thumbnail Title -->
                <?php
                    the_title( '<h3 class="entry-title product-detail-listing"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                ?>
                <div class="thumnail-details-price product-detail-listing">$$$</div>
            </div>
            <div class="thumbnail-details-left flex text-right">
                <a class="btn product-cta-button" href="#">Info</a>
                <a class="btn product-cta-button button-darker" href="#">Shop</a>
            </div>
        </div>
        <div class="entry-content">
            
            <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'the-buy-guide' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-buy-guide' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->
    </div><!-- .product-card -->
</div><!-- #post-<?php the_ID(); ?> -->
