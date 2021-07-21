<?php
/**
* Template Name: The Buy Guide: Partnerships
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header();
?>

<main id="primary" class="partnerships">
     <!-- Header Banner -->
    <?php
        if( have_rows('header_banner') ):
            while( have_rows('header_banner') ): the_row();
                $hp_banner_headline = get_sub_field('banner_headline');
                $hp_banner_image = get_sub_field('banner_image'); 
            ?>  
                <?php get_template_part( 'template-parts/content', 'banner', 
                    array(
                        'image'=> $hp_banner_image,
                        'headline'=> $hp_banner_headline
                    )
                ); ?>
            <?php endwhile;
        endif; 
    ?>
   <!-- Body Copy -->
   <section class="p-y-6 page-width">
        <div class="text-center large-body-copy">
            <?php 
                $value = get_field( "body_copy" );
                if( $value ) {
                    echo $value;
                } 
            ?>
        </div>
        <div class="brands-grid">
            <?php 
                    if( have_rows('brands_grid') ):
                        while( have_rows('brands_grid') ): the_row();
                            $brand_grid_title = get_sub_field('title');
                            $images = get_sub_field('images');
                        ?>
                        <div class="p-t-6 text-center">
                           <h3 class="p-b-6"><?php echo $brand_grid_title; ?> </h3>
                           <?php 
                                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                if( $images ): ?>
                                    <ul class="grid-container grid-4-col">
                                        <?php foreach( $images as $image_id ): ?>
                                            <li>
                                                <?php echo wp_get_attachment_image( $image_id["id"], $size ); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                        </div>   
                    <?php endwhile;
            endif;?>
        </div>
    </section>
    
    <!-- Partnerships Slider -->
    <?php
        if( have_rows('partnership_slider') ):
            while( have_rows('partnership_slider') ): the_row();
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
     <?php 
            if( have_rows('contact_form') ):
                while( have_rows('contact_form') ): the_row();
                    $form_title= get_sub_field('title');
                    $form_subheader = get_sub_field('sub_header');
                ?>
                <div class="p-y-6 text-center">
                    <h3 class="p-b-6"><?php echo $form_title; ?> </h3>
                    <p class="page-width"><?php echo $form_subheader; ?></p>
                    <form class="page-width p-y-6">
                        <label for="name"></label>
                        <input type="text" id="name" placeholder="name">
                        <input type="submit" value="Submit">
                    </form>
                </div>   
            <?php endwhile;
    endif;?>
</main><!-- #main -->


<?php
get_footer();
