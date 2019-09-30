<?php

function theme_css() {

    /* Stylesheet for Theme */
    wp_enqueue_style( 'Bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css') ,array(),'1.0','all');
	wp_enqueue_style( 'Font-awesome', get_theme_file_uri('/assets/css/font-awesome.css') ,array(),'1.0','all');
	
	wp_enqueue_style( 'Owl-carousel', get_theme_file_uri('/assets/css/owl-carousel.css') ,array(),'1.0','all');

	/* XXl-Large Devices, Wide Screens */
	wp_enqueue_style( 'Templatemo-art-factory', get_theme_file_uri('/assets/css/templatemo-art-factory.css') ,array(),'1.0','all');
	
}

add_action( 'wp_enqueue_scripts', 'theme_css' );