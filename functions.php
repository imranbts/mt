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




// Custom Post Type Here
add_action( 'init', 'codex_book_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_book_init() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments' )
	);

	register_post_type( 'book', $args );
}