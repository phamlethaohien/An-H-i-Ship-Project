<?php
get_header();

global $AnHaiShipWebsite_options;

$AnHaiShipWebsite_opt_single_post_sidebar = $AnHaiShipWebsite_options['AnHaiShipWebsite_opt_single_post_sidebar'] ?? 'right';

$AnHaiShipWebsite_class_col_content = AnHaiShipWebsite_col_use_sidebar( $AnHaiShipWebsite_opt_single_post_sidebar, 'sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $AnHaiShipWebsite_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $AnHaiShipWebsite_opt_single_post_sidebar !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

