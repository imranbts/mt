<?php

function theme_js() {

    /* Start Theme JavaScript Files */

    // Theme JS
    wp_dequeue_script('jquery');  
    wp_enqueue_script( 'theme-jquery', get_theme_file_uri( '/assets/js/jquery-2.1.0.min.js' ), array(),'2.1.0', false );

    wp_enqueue_script( 'theme-bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array('theme-jquery'),'', true );

    wp_enqueue_script( 'custom-js', get_theme_file_uri( '/assets/js/custom.js' ), array('theme-jquery','owl-carousel-js','scrollreveal-js'),'4.3.1', true );

    wp_enqueue_script( 'imgfix-js', get_theme_file_uri( '/assets/js/imgfix.min.js' ), array('theme-jquery'),'4.3.1', true );

    wp_enqueue_script( 'jquery-counterup-js', get_theme_file_uri( '/assets/js/jquery.counterup.min.js' ), array('theme-jquery'),'4.3.1', true );

    wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl-carousel.js' ), array('theme-jquery'),'4.3.1', true );

    wp_enqueue_script( 'popper-js', get_theme_file_uri( '/assets/js/popper.js' ), array('theme-jquery'),'4.3.1', true );

    wp_enqueue_script( 'scrollreveal-js', get_theme_file_uri( '/assets/js/scrollreveal.min.js' ), array('theme-jquery'),'4.3.1', true );

    wp_enqueue_script( 'waypoints-js', get_theme_file_uri( '/assets/js/waypoints.min.js' ), array('theme-jquery'),'4.3.1', true );

    /* Start Theme JavaScript Files */
}

add_action( 'wp_enqueue_scripts', 'theme_js' );