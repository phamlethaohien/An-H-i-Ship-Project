<?php
$AnHaiShipWebsite_gallery_post = get_post_meta( get_the_ID(),'AnHaiShipWebsite_meta_box_post_gallery', false );

if( !empty( $AnHaiShipWebsite_gallery_post ) ) :

    $AnHaiShipWebsite_slider_settings =   [
	    'items'         =>  1,
        'loop'          =>  true,
        'nav'           =>  true,
        'dots'          =>  true,
        'autoHeight'    =>  true
    ];
?>

    <div class="site-post-slides owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $AnHaiShipWebsite_slider_settings ); ?>'>
        <?php foreach( $AnHaiShipWebsite_gallery_post as $item ) : ?>
            <div class="site-post-slides__item">
                <?php echo wp_get_attachment_image( $item, 'full' ); ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>