<?php
global $AnHaiShipWebsite_options;

$AnHaiShipWebsite_show_loading = $AnHaiShipWebsite_options['AnHaiShipWebsite_opt_loading_show'] ?? '1';

if(  $AnHaiShipWebsite_show_loading == 1 ) :

    $AnHaiShipWebsite_loading_url  = $AnHaiShipWebsite_options['AnHaiShipWebsite_opt_loading_image']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $AnHaiShipWebsite_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $AnHaiShipWebsite_loading_url ); ?>" alt="<?php esc_attr_e('loading...','AnHaiShipWebsite') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/assets/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','AnHaiShipWebsite') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>