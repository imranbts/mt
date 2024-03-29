<?php

function theme_setup()
{

    /* Registration of menu location for header and footer */

    register_nav_menus(array(
        'ThemeHeaderMenu' => __('Theme Header Menu', 'mytheme'),
        'ThemeFooterMenu' => __('Theme Footer Menu', 'mytheme'),
    ));


}

add_action('after_setup_theme', 'theme_setup');

// Assets files are linked here

define('THEME_ROOT_DIR', get_template_directory());

// CSS Files
include_once THEME_ROOT_DIR . '/inc/css-files.php';
// JS Files
include_once THEME_ROOT_DIR . '/inc/js-files.php';

/* Disable WordPress Default Editor */
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Before VC Init
add_action('vc_before_init', 'vc_before_init_actions');

function vc_before_init_actions()
{

    require_once get_template_directory() . '/vc-elements/header-with-button.php';
    require_once get_template_directory() . '/vc-elements/welcome-area.php';
    require_once get_template_directory() . '/vc-elements/contact-us.php';
    require_once get_template_directory() . '/vc-elements/about.php';
    require_once get_template_directory() . '/vc-elements/about-2.php';
    require_once get_template_directory() . '/vc-elements/services.php';
    require_once get_template_directory() . '/vc-elements/faq.php';

}

require_once get_template_directory() . '/ajax/contactus.php';



function footer_col_1_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer Column 1', 'footer_col_1' ),
        'id' => 'footer_col_1',
        'before_widget' => '<div class="col-lg-7 col-md-12 col-sm-12">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'footer_col_1_widgets_init' );

function footer_col_2_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer Column 2', 'footer_col_2' ),
        'id' => 'footer_col_2',
        'before_widget' => '<div class="col-lg-5 col-md-12 col-sm-12">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'footer_col_2_widgets_init' );


/*
	==========================================
	 Custom Post Type
	==========================================
*/
function awesome_custom_post_type (){
	
	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Portfolio',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('portfolio',$args);
}
add_action('init','awesome_custom_post_type');


// Custom Taxonomy
function awesome_custom_register_taxonomy() {

	$labels = array(
		  'name'              => __( 'Services'),
		  'singular_name'     => __( 'Service'),
		  'search_items'      => __( 'Search Services'),
		  'all_items'         => __( 'All Services'),
		  'edit_item'         => __( 'Edit Services'),
		  'update_item'       => __( 'Update Services'),
		  'add_new_item'      => __( 'Add New Service'),
		  'new_item_name'     => __( 'New Service Name'),
		  'menu_name'         => __( 'Services'),
	  );
	  
	  $args = array(
		  'labels' => $labels,
		  'hierarchical' => true,
		  'sort' => true,
		  'args' => array( 'orderby' => 'term_order' ),
		  'rewrite' => array( 'slug' => 'services' ),
		  'show_admin_column' => true
	  );
	  
	  register_taxonomy( 'service', array( 'post', 'portfolio' ), $args);
	  
  }
  add_action( 'init', 'awesome_custom_register_taxonomy' );