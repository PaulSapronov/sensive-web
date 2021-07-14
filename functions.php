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
			'unlink-homepage-logo' => true, // WP 5.5
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
		'footer'  => __( 'Footer Menu', 'sensive' ),
	);
	// Registering the menu areas that are in the '$locations' variable
	register_nav_menus( $locations );
}
// Adding hook-action
add_action( 'init', 'sensive_menus' );

class bootstrap_4_walker_nav_menu extends Walker_Nav_menu {
    
	function start_lvl( &$output, $depth = 0, $args = array() ){ // ul
			$indent = str_repeat("\t",$depth); // indents the outputted HTML
			$submenu = ($depth > 0) ? ' sub-menu' : '';
			$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}

function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span
			
	$indent = ( $depth ) ? str_repeat("\t",$depth) : '';
	
	$li_attributes = '';
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
			$classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
			$classes[] = 'nav-item';
			$classes[] = 'nav-item-' . $item->ID;
			if( $depth && $args->walker->has_children ){
					$classes[] = 'dropdown-menu';
			}
			
			$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr($class_names) . '"';
			
			$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
			
			$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
			
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
			
			$attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';
			
			$item_output = $args->before;
			$item_output .= ( $depth > 0 ) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			
			$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	
	}
	
}

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

// Реристрируем sidebar
add_action( 'widgets_init', 'sensive_widgets_init' );
function sensive_widgets_init() {
register_sidebar( array(
	'name'          => esc_html__( 'Sidebar', 'sensive' ),
	'id'            => 'sidebar',
	'before_widget' => '<section id="%1$s" class="single-sidebar-widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h4 class="single-sidebar-widget__title">',
	'after_title'   => '</h4>'
) );
}

// Registering a new post type "Tours"
add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('tours', array(
		'labels'             => array(
			'name'               => __('Tours', 'sensive'), // Основное название типа записи
			'singular_name'      => __('Tour', 'sensive'), // отдельное название записи типа Book
			'add_new'            => __('Add new', 'sensive'),
			'add_new_item'       => __('Add new tour', 'sensive'),
			'edit_item'          => __('Edit tour', 'sensive'),
			'new_item'           => __('New tour', 'sensive'),
			'view_item'          => __('View tour', 'sensive'),
			'search_items'       => __('Search tour', 'sensive'),
			'not_found'          => __('Tours not found', 'sensive'),
			'not_found_in_trash' => __('Not found tours in trash', 'sensive'),
			'parent_item_colon'  => '',
			'menu_name'          => __('Tours', 'sensive')

			),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'menu_icon'			 		 => 'dashicons-airplane',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array('title','editor','author','thumbnail','excerpt',)
	) );
}