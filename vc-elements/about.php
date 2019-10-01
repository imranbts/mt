<?php

class About_ShortCode extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'about_mapping' ) );
        add_shortcode( 'About_ShortCode', array( $this, 'about_html' ) );
    }

    
    public function about_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
       // Map the block with vc_map()
       vc_map( 
      
        array(
            'name' => __('About Area With Button', 'text-domain'),
            'base' => 'About_ShortCode',
            'description' => __('about area inner pages', 'text-domain'), 
            'category' => __('MyTheme Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/welcome-area-icon.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'attach_image',
                'holder' => '',
                //'class' => 'text-class',   
                'heading' => __( 'About Image', 'text-domain' ),
                'param_name' => 'about_area_image',
                // 'value' => __( 'Default value', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About Heading Text', 'text-domain' ),
                'param_name' => 'about_heading_text',
                'value' => __( 'About Heading Text', 'text-domain' ),
                'description' => __( 'About Heading Text', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About Paragraph Text', 'text-domain' ),
                'param_name' => 'about_paragraph_text',
                'value' => __( 'About Paragraph Text', 'text-domain' ),
                'description' => __( 'About Paragraph Text', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About Paragraph Text 2', 'text-domain' ),
                'param_name' => 'about_paragraph_text_2',
                'value' => __( 'About Paragraph Text 2', 'text-domain' ),
                'description' => __( 'About Paragraph Text 2', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About Area Button', 'text-domain' ),
                'param_name' => 'about_area_button',
                'value' => __( '#', 'text-domain' ),
                'description' => __( 'About Area Button', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )                        
                 
        )
    )
    );                       
                                  
    }



    public function about_html($atts){
        extract(
            shortcode_atts(
                array(
                    'about_area_image' => 'about_area_image',
                    'about_heading_text'   => '',
                    'about_paragraph_text'   => '',
                    'about_paragraph_text_2' => '',
                    'about_area_button' => '',
                ), 
                $atts
            )
        );
    
            $about_area_image = wp_get_attachment_image_src( $about_area_image, "large");

            $html = '
            <!-- ***** Features Big Item Start ***** -->
                <section class="section" id="about">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                                <img src="'.$about_area_image[0].'" class="rounded img-fluid d-block mx-auto" alt="App">
                            </div>
                            <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                                <div class="left-heading">
                                    <h5>'.$about_heading_text.'</h5>
                                </div>
                                <div class="left-text">
                                    <p>'.$about_paragraph_text.'<br><br>'.$about_paragraph_text_2.'</p>
                                    <a href="'.$about_area_button.'" class="main-button">Discover More</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hr"></div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ***** Features Big Item End ***** -->
            ';



        return $html;
    
    }


}


new About_ShortCode();