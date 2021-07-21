<?php
/**
* Template Name: The Buy Guide: About
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header();
?>

<main id="primary" class="about">
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
    </section>

    <!-- Our Promise -->
    <section class="p-y-3 page-width">
        <div class="text-center body-copy">
            <?php
                if( have_rows('our_promise_section') ):
                    while( have_rows('our_promise_section') ): the_row();
                        $title = get_sub_field('title');
                        $image = get_sub_field('main_image'); 
                    ?>  
                        <h3><?php echo $title; ?></h3>
                        <?php echo wp_get_attachment_image( $image["id"], $size ); ?>
                    <?php endwhile;
                endif; 
            ?>
        </div>
    </section>

     <!-- Who We Are -->
     <section class="p-y-6">
        <div class="text-center body-copy">
            <?php
                if( have_rows('who_we_are') ):
                    while( have_rows('who_we_are') ): the_row();
                        $title = get_sub_field('title');
                        $image = get_sub_field('main_image'); 
                        $body_copy = get_sub_field('body_copy'); 
                    ?>  
                        <h3><?php echo $title; ?></h3>
                        <?php if ($body_copy) { ?>
                            <div class="body-copy p-y-3  page-width">
                                <?php echo $body_copy; ?>
                            </div>
                        <?php } ?>
                        <?php 
                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                        $images = get_sub_field('gallery');

                                        if( $images ): ?>
                                            <ul class="grid-container grid-4-col">
                                                <?php foreach( $images as $image_id ): ?>
                                                    <li>
                                                        <?php echo wp_get_attachment_image( $image_id["id"], $size ); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                    <?php endwhile;
                endif; 
            ?>
        </div>
    </section>
    
    <!-- Featured Press -->
    <?php get_template_part( 'template-parts/content', 'featured-press', 
        array(
            'image'=> $hp_banner_image,
            'headline'=> $hp_banner_headline
        )
    ); ?>

    <!-- Email Signup -->
    <?php get_template_part( 'template-parts/content', 'email-signup', 
        array(
            'image'=> $hp_banner_image,
            'headline'=> $hp_banner_headline
        )
    ); ?>


</main><!-- #main -->


<?php
get_footer();
