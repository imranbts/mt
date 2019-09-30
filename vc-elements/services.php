<?php



// Parent container
vc_map( array(
    'name'                    => __( 'Services' , 'textdomain' ), 
    'base'                    => 'services',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/welcome-area-icon.png',
    'description'             => __( 'Container for Services', 'textdomain' ),
    'as_parent'               => array('only' => 'services_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('MyTheme Elements', 'text-domain'),  
    'params'                  => array(

                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Hidden Title', 'textdomain' ),
                    'param_name'  => 'hidden_title',
                    'description' => __( 'Heading will not be displayed at the top of items', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                //END ADDING PARAMS

    ),
    "js_view" => 'VcColumnView'
) );


// Nested Element
vc_map( 
  
    array(
        'name' => __('Services Item', 'text-domain'),
        'base' => 'services_item',
        'description' => __('Our Services', 'text-domain'), 
        'content_element' => true, 
        'as_child'        => array('only' => 'services'), // Use only|except attributes to limit parent (separate multiple values with comma)  
        'category' => __('MyTheme Elements', 'text-domain'),   
        'icon' => get_template_directory_uri().'/vc-elements/icons/welcome-area-icon.png', //get_template_directory_uri().'/assets/img/vc-icon.png',         
        'params' => array(   
        
        array(
            'type' => 'attach_image',
            'holder' => '',
            //'class' => 'text-class',
            'heading' => __( 'Service Box Image', 'text-domain' ),
            'param_name' => 'services_item_image',
            // 'value' => __( 'Default value', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => 'service_item_title',
            'heading' => __( 'Service Box Title', 'text-domain' ),
            'param_name' => 'service_item_title',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Service Box Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => 'service_item_paragraph',
            'heading' => __( 'Service Box Paragraph', 'text-domain' ),
            'param_name' => 'service_item_paragraph',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Service Box Paragraph', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => 'service_item_button',
            'heading' => __( 'Service Item Button', 'text-domain' ),
            'param_name' => 'service_item_button',
            'value' => __( '#', 'text-domain' ),
            'description' => __( 'Service Item Button', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),               
             
    )
)
);                  





// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_services extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_services_item extends WPBakeryShortCode {

    }
}




// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('services_output')){
    
    function services_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'hidden_title' => '',
                ), 
                $atts
            )
        );

        $html = '
        <!-- ***** Features Small Start ***** -->
        <section class="section" id="services">
            <div class="container">
                <div class="row">
                    <div class="owl-carousel owl-theme">
        ';
        $html .= do_shortcode( $content );
        $html .= '
                    </div>
                </div>
            </div>
        </section>
        ';

        return $html;
    }

    add_shortcode( 'services' , 'services_output' );
}




if(!function_exists('services_item_output')){
    
    function services_item_output($atts, $content = null){
     
        extract(
            shortcode_atts(
                array(
                    'services_item_image' => 'services_item_image',
                    'service_item_title' => '',
                    'service_item_paragraph' => '',
                    'service_item_button' => '',
                ), 
                $atts
            )
        );
    
            $img_url = wp_get_attachment_image_src( $services_item_image, "large");
    
    
            $html = ' 
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="'.$img_url[0].'" alt=""></i>
                        </div>
                        <h5 class="service-title">'.$service_item_title.'</h5>
                        <p>'.$service_item_paragraph.'</p>
                        <a href="'.$service_item_button.'" class="main-button">Read More</a>
                    </div>    
            ';
    
                
        return $html;
    }

    add_shortcode( 'services_item' , 'services_item_output' );
}
