<?php

if (! function_exists('sensive_setup')) {
	function sensive_setup() {
	//	load_theme_textdomain( 'sensive', get_template_directory() . '/languages' );
	
		// Adding custom logo
		add_theme_support( 'custom-logo', [
			'height'      => 43,
			'width'       => 122,
			'flex-width'  => false,
			'flex-height' => false,
			'header-text' => '',
			'unlink-homepage-logo' => false, // WP 5.5
		]);

		// Adding support for HTML5 tags
		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
			'script',
			'style',
		) );
		// Adding a dynamic <title>
		add_theme_support( 'title-tag' );
		// Adding thumbnails for posts and pages
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 730, 480, true ); // Default post thumbnail size
	}
	add_action( 'after_setup_theme', 'sensive_setup' );
}

// Connecting styles
add_action( 'wp_enqueue_scripts', 'sensive_scripts' );

function sensive_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendors/bootstrap/bootstrap.min.css', array('main'), null );
	wp_enqueue_style( 'all', get_template_directory_uri() . '/vendors/fontawesome/css/all.min.css', array('main'), null );
	wp_enqueue_style( 'themify', get_template_directory_uri() . '/vendors/themify-icons/themify-icons.css', array('main'), null );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/vendors/linericon/style.css', array('main'), null );
	wp_enqueue_style( 'default', get_template_directory_uri() . '/vendors/owl-carousel/owl.theme.default.min.css', array('main'), null );
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/vendors/owl-carousel/owl.carousel.min.css', array('main'), null );
	
	wp_enqueue_style( 'sensive', get_template_directory_uri() . '/css/style.css', array('carousel'), null );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/vendors/jquery/jquery-3.2.1.min.js' );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bundle', get_template_directory_uri() . '/vendors/bootstrap/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/vendors/owl-carousel/owl.carousel.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'ajaxchimp', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'mail', get_template_directory_uri() . '/js/mail-script.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
}

// Registering multiple menu areas
function sensive_menus() {
	$locations = array(
		'header'  => __( 'Header Menu', 'sensive' ),
		'footer_left' => __( 'Footer Left Menu', 'sensive' ),
		'footer_right' => __( 'Footer Right Menu', 'sensive' ),
	);
	// Registering the menu areas that are in the '$locations' variable
	register_nav_menus( $locations );
}
// Adding hook-action
add_action( 'init', 'sensive_menus' );

// Disable the creation of file thumbnails for the specified sizes
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
}