<?php

class WelcomeArea_ShortCode extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'welcome_area_mapping' ) );
        add_shortcode( 'WelcomeArea_ShortCode', array( $this, 'welcome_area_html' ) );
    }

    
    public function welcome_area_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
       // Map the block with vc_map()
       vc_map( 
      
        array(
            'name' => __('Welcome Area With Button', 'text-domain'),
            'base' => 'WelcomeArea_ShortCode',
            'description' => __('welcome area inner pages', 'text-domain'), 
            'category' => __('MyTheme Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/welcome-area-icon.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'attach_image',
                'holder' => '',
                //'class' => 'text-class',   
                'heading' => __( 'Image', 'text-domain' ),
                'param_name' => 'welcome_area_bg_image',
                // 'value' => __( 'Default value', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'attach_image',
                'holder' => '',
                //'class' => 'text-class',   
                'heading' => __( 'Image', 'text-domain' ),
                'param_name' => 'welcome_area_image',
                // 'value' => __( 'Default value', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'Title', 'text-domain' ),
                'param_name' => 'welcome_heading_text',
                'value' => __( 'Welcome Heading Text', 'text-domain' ),
                'description' => __( 'Box Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'Title', 'text-domain' ),
                'param_name' => 'welcome_heading_text_2',
                'value' => __( 'Welcome Heading Text 2', 'text-domain' ),
                'description' => __( 'Box Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'Title Line 2', 'text-domain' ),
                'param_name' => 'welcome_paragraph_text',
                'value' => __( 'Welcome Paragraph Text', 'text-domain' ),
                'description' => __( 'Box Title Line 2', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'Title Line 2', 'text-domain' ),
                'param_name' => 'welcome_area_button_link',
                'value' => __( '#about', 'text-domain' ),
                'description' => __( 'Box Title Line 2', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )                        
                 
        )
    )
    );                       
                                  
    }



    public function welcome_area_html($atts){
        extract(
            shortcode_atts(
                array(
                    'welcome_area_bg_image' => 'welcome_area_bg_image',
                    'welcome_area_image' => 'welcome_area_image',
                    'welcome_heading_text'   => '',
                    'welcome_heading_text_2'   => '',
                    'welcome_paragraph_text' => '',
                    'welcome_area_button_link' => '',
                ), 
                $atts
            )
        );
    
            $welcome_area_bg_image = wp_get_attachment_image_src( $welcome_area_bg_image, "large");
            $welcome_area_image = wp_get_attachment_image_src( $welcome_area_image, "large");
    

            $html = '
            <!-- ***** Welcome Area Start ***** -->
                <div class="welcome-area" id="welcome" style="background-image: url('.$welcome_area_bg_image[0].');background-size: cover;background-repeat: no-repeat;">

                    <!-- ***** Header Text Start ***** -->
                    <div class="header-text">
                        <div class="container">
                            <div class="row">
                                <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                                    <h1>'.$welcome_heading_text.'<strong>'.$welcome_heading_text_2.'</strong></h1>
                                    <p>'.$welcome_paragraph_text.'</p>
                                    <a href="'.$welcome_area_button_link.'" class="main-button-slider">Find Out More</a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                    <img src="'.$welcome_area_image[0].'" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Header Text End ***** -->
                </div>
                <!-- ***** Welcome Area End ***** -->
            ';



        return $html;
    
    }


}


new WelcomeArea_ShortCode();