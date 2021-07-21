<?php 
    $hp_banner_image = $args['image']; 
    $hp_banner_headline = $args['headline'];
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