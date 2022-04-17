<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *constants
 */
if ( ! function_exists( 'AnHaiShipWebsite_setup' ) ):

	function AnHaiShipWebsite_setup() {

		/**
		 * Set the content width based on the theme's design and stylesheet.
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 900;
		}

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'AnHaiShipWebsite', get_parent_theme_file_path( '/languages' ) );

		/**
		 * Set up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support post thumbnails.
		 *
		 */
		add_theme_support( 'custom-header' );

		add_theme_support( 'custom-background' );

		//Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// this theme uses wp_nav_menu() in two locations.
		register_nav_menu( 'primary', 'Primary Menu' );
		register_nav_menu( 'footer-menu', 'Footer Menu' );

		// add theme support title-tag
		add_theme_support( 'title-tag' );

		/*  Post Type   */
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
	}

	add_action( 'after_setup_theme', 'AnHaiShipWebsite_setup' );

endif;

/**
 * Required: Plugin Activation
 */
require get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

/**
 * Required: include plugin theme scripts
 */
require get_parent_theme_file_path( '/extension/process-option.php' );

if ( class_exists( 'ReduxFramework' ) ) {
	/*
	 * Required: Redux Framework
	 */
	require get_parent_theme_file_path( '/extension/option-reudx/theme-options.php' );
}

if ( class_exists( 'RW_Meta_Box' ) ) {
	/*
	 * Required: Meta Box Framework
	 */
	require get_parent_theme_file_path( '/extension/meta-box/meta-box-post.php' );

}

if ( ! function_exists( 'rwmb_meta' ) ) {

	function rwmb_meta( $key, $args = '', $post_id = null ): bool
    {
		return false;
	}

}

if ( did_action( 'elementor/loaded' ) ) :
	/*
	 * Required: Elementor
	 */
    require get_parent_theme_file_path( '/extension/elementor-addon/elementor-addon.php' );

endif;

/* Require Widgets */
foreach ( glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $AnHaiShipWebsite_file_widgets ) {
	require $AnHaiShipWebsite_file_widgets;
}

/**
 * Required: Register Sidebar
 */
require get_parent_theme_file_path( '/includes/register-sidebar.php' );

/**
 * Required: Theme Scripts
 */
require get_parent_theme_file_path( '/includes/theme-scripts.php' );

/**
 * Show full editor
 */


/*
*
* Walker for the main menu
*
*/
add_filter( 'walker_nav_menu_start_el', 'AnHaiShipWebsite_add_arrow',10,4);
function AnHaiShipWebsite_add_arrow( $output, $item, $depth, $args ){
	if('primary' == $args->theme_location && $depth >= 0 ){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output .='<span class="sub-menu-toggle d-lg-none"></span>';
		}
	}

	return $output;
}

/* callback comment list */
function AnHaiShipWebsite_comments( $AnHaiShipWebsite_comment, $AnHaiShipWebsite_comment_args, $AnHaiShipWebsite_comment_depth ) {

	if ( 'div' === $AnHaiShipWebsite_comment_args['style'] ) :

		$AnHaiShipWebsite_comment_tag       = 'div';
		$AnHaiShipWebsite_comment_add_below = 'comment';

	else :

		$AnHaiShipWebsite_comment_tag       = 'li';
		$AnHaiShipWebsite_comment_add_below = 'div-comment';

	endif;

	?>
    <<?php echo $AnHaiShipWebsite_comment_tag ?><?php comment_class( empty( $AnHaiShipWebsite_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

	<?php if ( 'div' != $AnHaiShipWebsite_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

	<?php endif; ?>

    <div class="comment-author vcard">
		<?php if ( $AnHaiShipWebsite_comment_args['avatar_size'] != 0 ) {
			echo get_avatar( $AnHaiShipWebsite_comment, $AnHaiShipWebsite_comment_args['avatar_size'] );
		} ?>

    </div>

	<?php if ( $AnHaiShipWebsite_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
			<?php esc_html_e( 'Your comment is awaiting moderation.', 'AnHaiShipWebsite' ); ?>
        </em>
	<?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

			<?php edit_comment_link( esc_html__( 'Edit ', 'AnHaiShipWebsite' ) ); ?>

			<?php comment_reply_link( array_merge( $AnHaiShipWebsite_comment_args, array(
				'add_below' => $AnHaiShipWebsite_comment_add_below,
				'depth'     => $AnHaiShipWebsite_comment_depth,
				'max_depth' => $AnHaiShipWebsite_comment_args['max_depth']
			) ) ); ?>

        </div>

        <div class="comment-text-box">
			<?php comment_text(); ?>
        </div>
    </div>

	<?php if ( 'div' != $AnHaiShipWebsite_comment_args['style'] ) : ?>
        </div>
	<?php endif; ?>

	<?php
}

/* callback comment list */

/*
 * Content Nav
 */

if ( ! function_exists( 'AnHaiShipWebsite_comment_nav' ) ) :

	function AnHaiShipWebsite_comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

			?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
					<?php esc_html_e( 'Comment navigation', 'AnHaiShipWebsite' ); ?>
                </h2>

                <div class="nav-links">
					<?php
					if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'AnHaiShipWebsite' ) ) ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;

					if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'AnHaiShipWebsite' ) ) ) :
						printf( '<div class="nav-next">%s</div>', $next_link );
					endif;
					?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

		<?php
		endif;
	}

endif;

/* Start Social Network */
function AnHaiShipWebsite_get_social_url() {

	global $AnHaiShipWebsite_options;
	$AnHaiShipWebsite_opt_social_networks = AnHaiShipWebsite_get_social_network();

	foreach ( $AnHaiShipWebsite_opt_social_networks as $AnHaiShipWebsite_social ) :
		$AnHaiShipWebsite_social_url = $AnHaiShipWebsite_options[ 'AnHaiShipWebsite_opt_social_network_' . $AnHaiShipWebsite_social['id'] ] ?? '#';

		if ( $AnHaiShipWebsite_social_url ) :
			?>

            <div class="social-network-item item-<?php echo esc_attr( $AnHaiShipWebsite_social['id'] ); ?>">
                <a href="<?php echo esc_url( $AnHaiShipWebsite_social_url ); ?>">
                    <i class="<?php echo esc_attr( $AnHaiShipWebsite_social['icon'] ); ?>" aria-hidden="true"></i>
                </a>
            </div>

		<?php
		endif;

	endforeach;
}

function AnHaiShipWebsite_get_social_network(): array
{
	return array(
		array( 'id' => 'facebook', 'icon' => 'fab fa-facebook-f' ),
        array( 'id' => 'linkedin', 'icon' => 'fab fa-linkedin-in' ),
		array( 'id' => 'twitter', 'icon' => 'fab fa-twitter' ),
	);
}

/* End Social Network */

/* Start pagination */
function AnHaiShipWebsite_pagination() {

	the_posts_pagination( array(
		'type'               => 'list',
		'mid_size'           => 2,
		'prev_text'          => esc_html__( 'Previous', 'AnHaiShipWebsite' ),
		'next_text'          => esc_html__( 'Next', 'AnHaiShipWebsite' ),
		'screen_reader_text' => '&nbsp;',
	) );

}

// pagination nav query
function AnHaiShipWebsite_paging_nav_query( $AnHaiShipWebsite_querry ) {

	$AnHaiShipWebsite_pagination_args = array(

		'prev_text' => '<i class="fa fa-angle-double-left"></i>' . esc_html__( ' Previous', 'AnHaiShipWebsite' ),
		'next_text' => esc_html__( 'Next', 'AnHaiShipWebsite' ) . '<i class="fa fa-angle-double-right"></i>',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $AnHaiShipWebsite_querry->max_num_pages,
		'type'      => 'list',

	);

	$AnHaiShipWebsite_paginate_links = paginate_links( $AnHaiShipWebsite_pagination_args );

	if ( $AnHaiShipWebsite_paginate_links ) :

		?>
        <nav class="pagination">
			<?php echo $AnHaiShipWebsite_paginate_links; ?>
        </nav>

	<?php

	endif;
}

/* End pagination */

// Sanitize Pagination
add_action( 'navigation_markup_template', 'AnHaiShipWebsite_sanitize_pagination' );
function AnHaiShipWebsite_sanitize_pagination( $AnHaiShipWebsite_content ) {
	// Remove role attribute
	$AnHaiShipWebsite_content = str_replace( 'role="navigation"', '', $AnHaiShipWebsite_content );

	// Remove h2 tag
    return preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $AnHaiShipWebsite_content );
}

/* Start Get col global */
function AnHaiShipWebsite_col_use_sidebar( $option_sidebar, $active_sidebar ): string
{

	if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):

		if ( $option_sidebar == 'left' ) :
			$class_position_sidebar = ' order-1 order-md-2';
		else:
			$class_position_sidebar = ' order-1';
		endif;

		$class_col_content = 'col-12 col-md-8 col-lg-9' . $class_position_sidebar;
	else:
		$class_col_content = 'col-md-12';
	endif;

	return $class_col_content;
}

function AnHaiShipWebsite_col_sidebar(): string
{
    return 'col-12 col-md-4 col-lg-3';
}

/* End Get col global */

/* Start Post Meta */
function AnHaiShipWebsite_post_meta() {
	?>

    <div class="site-post-meta">
        <span class="site-post-author">
            <?php esc_html_e( 'Author:', 'AnHaiShipWebsite' ); ?>

            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php the_author(); ?>
            </a>
        </span>

        <span class="site-post-date">
            <?php esc_html_e( 'Post date: ', 'AnHaiShipWebsite' );
            the_date(); ?>
        </span>

        <span class="site-post-comments">
            <?php
            comments_popup_link( '0 ' . esc_html__( 'Comment', 'AnHaiShipWebsite' ), '1 ' . esc_html__( 'Comment', 'AnHaiShipWebsite' ), '% ' . esc_html__( 'Comments', 'AnHaiShipWebsite' ) );
            ?>
        </span>
    </div>

	<?php
}

/* End Post Meta */

/* Start Link Pages */
function AnHaiShipWebsite_link_page() {

	wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'AnHaiShipWebsite' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );

}

/* End Link Pages */

/* Start comment */
function AnHaiShipWebsite_comment_form() {

	if ( comments_open() || get_comments_number() ) :
		?>
        <div class="site-comments">
			<?php comments_template( '', true ); ?>
        </div>
	<?php
	endif;
}

/* End comment */

/* Start get Category check box */
function AnHaiShipWebsite_check_get_cat( $type_taxonomy ): array
{
	$cat_check = array();
	$category  = get_terms(
		array(
			'taxonomy'   => $type_taxonomy,
			'hide_empty' => false
		)
	);

	if ( isset( $category ) && ! empty( $category ) ):
		foreach ( $category as $item ) {
			$cat_check[ $item->term_id ] = $item->name;
		}
	endif;

	return $cat_check;
}

/* End get Category check box */

/**
 *Start share
 */
function AnHaiShipWebsite_post_share() {

	?>
    <div class="site-post-share">
        <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&width=150&layout=button&action=like&size=large&share=true&height=30&appId=612555202942781" width="150" height="30" style="border:none;overflow:hidden" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
	<?php

}

function AnHaiShipWebsite_opengraph() {
	global $post;

	if ( is_single() ) :

		if ( has_post_thumbnail( $post->ID ) ) :
			$img_src = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		else :
			$img_src = get_theme_file_uri( '/images/no-image.png' );
		endif;

        $excerpt = $post->post_excerpt;

		if ( $excerpt ) :
			$excerpt = strip_tags( $post->post_excerpt );
			$excerpt = str_replace( "", "'", $excerpt );
		else :
			$excerpt = get_bloginfo( 'description' );
		endif;

    ?>
        <meta property="og:url" content="<?php the_permalink(); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php the_title(); ?>" />
        <meta property="og:description" content="<?php echo esc_attr( $excerpt ); ?>" />
        <meta property="og:image" content="<?php echo esc_url( $img_src ); ?>" />
	<?php

	else :
		return;
	endif;
}

add_action( 'wp_head', 'AnHaiShipWebsite_opengraph', 5 );
/* End opengraph */

/**
 * this function modifies the main WordPress query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */
function AnHaiShipWebsite_include_custom_post_types_in_search_results( $query ) {
	if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post' ) );
	}
}
add_action( 'pre_get_posts', 'AnHaiShipWebsite_include_custom_post_types_in_search_results' );

add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';