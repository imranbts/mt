<?php

function theme_setup() {



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

    require_once(get_template_directory() . '/vc-elements/header-with-button.php');
    require_once(get_template_directory() . '/vc-elements/welcome-area.php');
    require_once(get_template_directory() . '/vc-elements/contact-us.php');
    require_once(get_template_directory() . '/vc-elements/about.php');
    require_once(get_template_directory() . '/vc-elements/about-2.php');
    require_once(get_template_directory() . '/vc-elements/services.php');

}


require_once(get_template_directory() . '/ajax/contactus.php');