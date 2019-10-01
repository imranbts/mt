<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function contact_us_request_handler(){

    global $wpdb;

    //var_dump($_POST);
    //die();


    $data = array(
        'Name' => $_POST['NAME'],
        'Email' => $_POST['EMAIL'],
        'Message' => $_POST['MESSAGE'],
    );

    $wpdb->insert('wp_form',$data);
    //$result = $wpdb->insert( $wpdb->wp_form, $data);
    //echo $comment_id;
    $Inser_Query_ID = $wpdb->insert_id;

    if( !empty($Inser_Query_ID)){
			
        $final_response_code = 1;
        $final_response_header = 'Success!';
        $final_response_message = 'Thank you for contacting us.';
        $final_ajax_response = array('code' => $final_response_code, 'header' => $final_response_header, 'message' => $final_response_message);
        echo json_encode($final_ajax_response);
        
    }


die();
       
} /* End of 'blog_post_comment_request_handler'*/


add_action( 'wp_ajax_contact_us_request_handler', 'contact_us_request_handler' );

// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_contact_us_request_handler', 'contact_us_request_handler' );




function contact_us_request_integrator(){
    
    /* Enqueue Request javascript on the frontend */
    wp_enqueue_script(
        'contact_us_ajax_script',
        get_template_directory_uri().'/ajax/contactus.js',
        array('theme-jquery') /* 'theme-jquery','theme-js','jquery-validation-min-js','jquery-validation-additional-methods-min-js','theme-bootstrap-js' */
    );
    
    /* integurate / localize request's script in admin-ajax.php that can be use in frontend as secure ajax request */     
    wp_localize_script(
        'contact_us_ajax_script',
        'contact_us_ajax_obj',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )  
    );
    
}

add_action( 'wp_enqueue_scripts', 'contact_us_request_integrator' );

/*
iniliaze ajax integurated request script in wordpress "admin-ajax.php" without pluging as pluging on the scripts loading time.
*/
add_action( 'init', 'contact_us_request_integrator' );	


