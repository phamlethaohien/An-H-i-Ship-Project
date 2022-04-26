<?php

$version = wp_get_theme()->get( 'Version' );

function add_custom_theme_support() {
	// Dynamic title
	add_theme_support( 'title-tag' );
	// Logo
	add_theme_support( 'custom-logo' );
	// Post
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'add_custom_theme_support');


// Menu
function add_menus() {
	$locations = array(
		'primary' => "Desktop Primary Top Sidebar",
		'footer' => "Footer Menu Items"
	);

	register_nav_menus($locations);
}
add_action( 'init', 'add_menus');



// CSS
function add_theme_styles() {	
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), '1.0', 'all');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '1.0', 'all');
	wp_enqueue_style( 'bootstrap_icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', array(), '1.0', 'all');
	wp_enqueue_style( 'boxicons', get_template_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css', array(), '1.0', 'all');
	wp_enqueue_style( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', array(), '1.0', 'all');
	wp_enqueue_style( 'remixicon', get_template_directory_uri() . '/assets/vendor/remixicon/remixicon.css', array(), '1.0', 'all');
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array(), '1.0', 'all');
	
	wp_enqueue_style( 'font', get_template_directory_uri() . '/assets/css/font.css', array(), $version, 'all');
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'add_theme_styles' );


// Javascript
function add_theme_scripts() {
	wp_enqueue_script( 'purecounter', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter.js', array(), '1.0', true);
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js"', array(), '1.0', true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '1.0', true);
	wp_enqueue_script( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), '1.0', true);
	wp_enqueue_script( 'isotope-layout', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), '1.0', true);
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), '1.0', true);
	wp_enqueue_script( 'php-email-form', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), '1.0', true);
	
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/main.js', array (), $version, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


// Array
function add_widget_areas() {
	register_sidebar(
		array(
			'before_title' => '<h2>',
			'after_title' => '</h2>',
			'before_widget' => '',
			'after_widget' => '',
		),
		array(
			'name' => 'Sidebar Area',
			'id' => 'sidebar-1',
			'description' => 'Sidebar Widget Area'
		)
		);
}
add_action( 'widget_init', 'add_widget_areas');

?>
