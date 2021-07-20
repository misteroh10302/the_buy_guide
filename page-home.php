<?php
/**
* Template Name: The Buy Guide Homepage
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header();
?>

<main id="primary" class="site-home">
    <!-- Header Banner -->
    <?php
        if( have_rows('header_banner') ):
            while( have_rows('header_banner') ): the_row();
                $hp_banner_headline = get_sub_field('banner_headline');
                $hp_banner_image = get_sub_field('banner_image'); 
            ?>
                <section id="home-header-banner" 
                        style="background-image: url(<?php echo $hp_banner_image['url'] ?>);" 
                        class="banner text-center background-image p-1">
                    <h2 class="outlined-text">
                        <?php echo $hp_banner_headline ?>
                    </h2>
        
                    <?php 
                        if( have_rows('button') ):
                            while( have_rows('button') ): the_row();
                                $hp_button_label = get_sub_field('label');
                                $hp_button_link = get_sub_field('link'); 
                            ?>
                            <div class="p-t-9">
                                <a class="btn btn-rounded btn-cta" href="<?php echo $hp_button_link ?>">
                                    <?php echo $hp_button_label ?>
                                </a>
                            </div>   
                        <?php endwhile;
                    endif;?>
                </section>
            <?php endwhile;
        endif; 
    ?>
    <!-- Trending Slider -->
    <?php
        if( have_rows('trending_slider') ):
            while( have_rows('trending_slider') ): the_row();
                $hp_trending_title = get_sub_field('title');
                $hp_trending_slider = get_sub_field('slider_content');
            ?>
                <section id="trending-slider" 
                        class="slider text-left">
                    <h3>
                        <?php echo $hp_trending_title; ?>
                    </h3>
                    <!-- Slider Content -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        <!-- <div class="swiper-slide"> </div> -->
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
 
</main><!-- #main -->


<?php
get_footer();
