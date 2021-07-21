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
                <a class="btn product-cta-button" href="<?php echo get_permalink() ?>">Info</a>
                <?php 
                $button = get_field( "shop_button" );
                if( $button ) {
                    ?> 
                        <a class="btn product-cta-button button-darker" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                    <?php
                } 
                ?>
            </div>
        </div>
    </div><!-- .product-card -->
</div><!-- #post-<?php the_ID(); ?> -->
