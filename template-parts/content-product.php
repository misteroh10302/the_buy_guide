<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Buy_Guide
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('product-template'); ?>>
    <div class="breadcrumb  p-3"><?php get_breadcrumb(); ?></div>
    
	<header class="entry-header grid-container grid-2-col no-gap product-container">
        <div>
            <?php the_buy_guide_post_thumbnail(); ?>
        </div>
        <div class="p-3">
            <div class="breadcrumb p-b-3"><?php get_breadcrumb(); ?></div>
            <?php the_title( '<h1 class="product-title entry-title">', '</h1>' ); ?>
            <?php 
                $button = get_field( "shop_button" );
                $price = get_field( "price" );
                $note = get_field( "note" );
                if( $button ) {
                    ?> 
                        <a class="btn btn-buy m-t-6" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                    <?php
                } 
                ?>
                <div class="product-details m-t-6">
                    <?php
                        if ( $price ) {
                            ?> 
                                <div class="product-price product-details-item parent-category ">PRICE: <?php echo $price; ?></div>
                            <?php
                        }
                        if ( $note ) {
                            ?> 
                                <div class="product-note product-details-item parent-category ">NOTE: <?php echo $note; ?></div>
                            <?php
                        }
                    ?>
                    <div class="product-share product-details-item parent-category">SHARE</div>
                </div>  <!-- .product-details -->
            <?php?>

            <div class="entry-content m-t-6">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

        </div>
	</header><!-- .entry-header -->


    <!-- YMA Slider -->
    <?php
        if( have_rows('you_may_also_like_slider') ):
            while( have_rows('you_may_also_like_slider') ): the_row();
                $slider_title = get_sub_field('title');
                $slider_content = get_sub_field('slider_content');
            ?>
                <section id="partnership-slider" 
                        class="slider text-left">
                    <h3>
                        <?php echo $slider_title; ?>
                    </h3>
                    <!-- Slider Content -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php 
                                if( have_rows('slides') ):
                                    while( have_rows('slides') ): the_row();
                                        $post = get_sub_field('slide_item');
                                        if( $post ): ?>
                                            <div class="swiper-slide">
                                                <?php get_template_part( 'template-parts/content', 'posts-thumb' ); ?>
                                            </div>
                                        <?php endif; ?> 
                                        <?php wp_reset_postdata(); ?>
                                <?php endwhile;
                            endif;?>
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </section>
            <?php endwhile;
        endif; 
    ?>
<!-- 
<?php
      query_posts('meta_key=post_views_count&posts_per_page=5&orderby=meta_value_num&
      order=DESC');
      if (have_posts()) : while (have_posts()) : the_post();
   ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title();
     ?></a>
   </li>
   <?php
   endwhile; endif;
   wp_reset_query();
   ?> -->

    <!-- Trending Slider -->
    <section class="trending-slider slider text-left">
        <h3>
            Trending
        </h3>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                    <?php
                        $products_IDs = new WP_Query( array(
                            'post_type' => '',
                            'posts_per_page' => -1,
                        ));
                            while ($products_IDs->have_posts() ) : $products_IDs->the_post();
                                ?>
                                <div class="swiper-slide">
                                    <?php get_template_part( 'template-parts/content', 'posts-thumb' );  ?>
                                </div>
                           <?php endwhile;   
                        ?>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    </section>

    <!-- More in Category -->
    <section class="category-slider slider text-left">
        <h3>
            More
        </h3>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                    <?php
                        $products_IDs = new WP_Query( array(
                            'post_type' => '',
                            'posts_per_page' => -1,
                        ));
                            while ($products_IDs->have_posts() ) : $products_IDs->the_post();
                                ?>
                                <div class="swiper-slide">
                                    <?php get_template_part( 'template-parts/content', 'posts-thumb' );  ?>
                                </div>
                           <?php endwhile;   
                        ?>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    </section>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'the-buy-guide' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
