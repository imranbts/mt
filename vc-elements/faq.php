<?php



// Parent container
vc_map( array(
    'name'                    => __( 'Frequently Ask Questions' , 'textdomain' ), 
    'base'                    => 'faq',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/welcome-area-icon.png',
    'description'             => __( 'Container for Faq', 'textdomain' ),
    'as_parent'               => array('only' => 'faq_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('MyTheme Elements', 'text-domain'),  
    'params'                  => array(

                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Faq Heading', 'textdomain' ),
                    'param_name'  => 'faq_heading',
                    'description' => __( 'Faq Heading', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Faq Sub-Heading', 'textdomain' ),
                    'param_name'  => 'faq_sub_heading',
                    'description' => __( 'Faq Sub-Heading', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Faq Left Heading', 'textdomain' ),
                    'param_name'  => 'faq_left_heading',
                    'description' => __( 'Faq Left Heading', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Faq Paragraph 1', 'textdomain' ),
                    'param_name'  => 'faq_paragraph_1',
                    'description' => __( 'Faq Paragraph 1', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Faq Paragraph 2', 'textdomain' ),
                    'param_name'  => 'faq_paragraph_2',
                    'description' => __( 'Faq Paragraph 2', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Faq Email Link', 'textdomain' ),
                    'param_name'  => 'faq_email_link',
                    'description' => __( 'Faq Email Link', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Faq Button Link', 'textdomain' ),
                    'param_name'  => 'faq_button_link',
                    'description' => __( 'Faq Button Link', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                //END ADDING PARAMS

    ),
    "js_view" => 'VcColumnView'
) );

//MEZNPKKA

// Nested Element
vc_map( 
  
    array(
        'name' => __('Faq Item', 'text-domain'),
        'base' => 'faq_item',
        'description' => __('Frequently Ask Questions', 'text-domain'), 
        'content_element' => true, 
        'as_child'        => array('only' => 'faq'), // Use only|except attributes to limit parent (separate multiple values with comma)  
        'category' => __('MyTheme Elements', 'text-domain'),   
        'icon' => get_template_directory_uri().'/vc-elements/icons/welcome-area-icon.png', //get_template_directory_uri().'/assets/img/vc-icon.png',         
        'params' => array(   
        
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => 'faq_accordion_heading',
            'heading' => __( 'Faq Accordion Heading', 'text-domain' ),
            'param_name' => 'faq_accordion_heading',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Faq Accordion Heading', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => 'faq_accordion_item_paragraph_1',
            'heading' => __( 'Faq Accordion Item Paragraph 1', 'text-domain' ),
            'param_name' => 'faq_accordion_item_paragraph_1',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Faq Accordion Item Paragraph 1', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => 'faq_accordion_item_paragraph_2',
            'heading' => __( 'Faq Accordion Item Paragraph 2', 'text-domain' ),
            'param_name' => 'faq_accordion_item_paragraph_2',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Faq Accordion Item Paragraph 2', 'text-domain' ),
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
    class WPBakeryShortCode_faq extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_faq_accordion_item extends WPBakeryShortCode {

    }
}




// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('faq_output')){
    
    function faq_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'faq_heading' => '',
                    'faq_sub_heading' => '',
                    'faq_left_heading' => '',
                    'faq_paragraph_1' => '',
                    'faq_paragraph_2' => '',
                    'faq_email_link' => '',
                    'faq_button_link' => '',
                ), 
                $atts
            )
        );

        $html = '
        <!-- ***** Frequently Question Start ***** -->
            <section class="section" id="frequently-question">
                <div class="container">
                    <!-- ***** Section Title Start ***** -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h2>'.$faq_heading.'</h2>
                            </div>
                        </div>
                        <div class="offset-lg-3 col-lg-6">
                            <div class="section-heading">
                                <p>'.$faq_sub_heading.'</p>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Section Title End ***** -->

                    <div class="row">
                        <div class="left-text col-lg-6 col-md-6 col-sm-12">
                            <h5>'.$faq_left_heading.'</h5>
                            <div class="accordion-text">
                                <p>'.$faq_paragraph_1.'</p>
                                <p>'.$faq_paragraph_2.'</p>
                                <span>Email: <a href="mailto:'.$faq_email_link.'">'.$faq_email_link.'</a><br></span>
                                <a href="'.$faq_button_link.'" class="main-button">Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="accordions is-first-expanded">';
            $html .= do_shortcode( $content );                   
            $html .= '      </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Frequently Question End ***** -->
        ';

        return $html;
    }

    add_shortcode( 'faq' , 'faq_output' );
}




if(!function_exists('faq_accordion_item_output')){
    
    function faq_accordion_item_output($atts, $content = null){
     
        extract(
            shortcode_atts(
                array(
                    'faq_accordion_heading' => '',
                    'faq_accordion_item_paragraph_1' => '',
                    'faq_accordion_item_paragraph_2' => '',
                ), 
                $atts
            )
        );
    
    
            $html = '
                    <article class="accordion">
                        <div class="accordion-head">
                            <span>'.$faq_accordion_heading.'</span>
                            <span class="icon">
                                <i class="icon fa fa-chevron-right"></i>
                            </span>
                        </div>
                        <div class="accordion-body">
                            <div class="content">
                                <p>'.$faq_accordion_item_paragraph_1.'
                                <br><br>
                                '.$faq_accordion_item_paragraph_2.'</p>
                            </div>
                        </div>
                    </article>
            ';
    
                
        return $html;
    }

    add_shortcode( 'faq_item' , 'faq_accordion_item_output' );
}
