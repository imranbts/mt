<?php

class About2_ShortCode extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'about2_mapping' ) );
        add_shortcode( 'About2_ShortCode', array( $this, 'about2_html' ) );
    }

    
    public function about2_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
       // Map the block with vc_map()
       vc_map( 
      
        array(
            'name' => __('About 2 Area With Button', 'text-domain'),
            'base' => 'About2_ShortCode',
            'description' => __('about 2 area inner pages', 'text-domain'), 
            'category' => __('MyTheme Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/welcome-area-icon.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'attach_image',
                'holder' => '',
                //'class' => 'text-class',   
                'heading' => __( 'About 2 Main Image', 'text-domain' ),
                'param_name' => 'about2_main_image',
                // 'value' => __( 'Default value', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About 2 Main Heading Text', 'text-domain' ),
                'param_name' => 'about2_main_heading_text',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'About 2 Main Heading Text', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About 2 Main Paragraph Text', 'text-domain' ),
                'param_name' => 'about2_main_paragraph_text',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'About 2 Main Paragraph Text', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'attach_image',
                'holder' => '',
                //'class' => 'text-class',   
                'heading' => __( 'About 2 Item 1 Image', 'text-domain' ),
                'param_name' => 'about2_item_1_image',
                // 'value' => __( 'Default value', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About 2 Item 1 Heading Text', 'text-domain' ),
                'param_name' => 'about2_item_1_heading_text',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'About 2 Item 1 Heading Text', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About 2 Item 1 Paragraph Text', 'text-domain' ),
                'param_name' => 'about2_item_1_paragraph_text',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'About 2 Item 1 Paragraph Text', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),

            array(
                'type' => 'attach_image',
                'holder' => '',
                //'class' => 'text-class',   
                'heading' => __( 'About 2 Item 2 Image', 'text-domain' ),
                'param_name' => 'about2_item_2_image',
                // 'value' => __( 'Default value', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About 2 Item 2 Heading Text', 'text-domain' ),
                'param_name' => 'about2_item_2_heading_text',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'About 2 Item 2 Heading Text', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About 2 Item 2 Paragraph Text', 'text-domain' ),
                'param_name' => 'about2_item_2_paragraph_text',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'About 2 Item 2 Paragraph Text', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),

            array(
                'type' => 'attach_image',
                'holder' => '',
                //'class' => 'text-class',   
                'heading' => __( 'About 2 Item 3 Image', 'text-domain' ),
                'param_name' => 'about3_item_3_image',
                // 'value' => __( 'Default value', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About 2 Item 3 Heading Text', 'text-domain' ),
                'param_name' => 'about2_item_3_heading_text',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'About 2 Item 3 Heading Text', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'holder' => '',     
                'class' => 'title-class',
                'heading' => __( 'About 2 Item 3 Paragraph Text', 'text-domain' ),
                'param_name' => 'about2_item_3_paragraph_text',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'About 2 Item 3 Paragraph Text', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )
                                    
                 
        )
    )
    );                       
                                  
    }



    public function about2_html($atts){
        extract(
            shortcode_atts(
                array(
                    'about2_main_image' => 'about2_main_image',
                    'about2_main_heading_text'   => '',
                    'about2_main_paragraph_text'   => '',

                    'about2_item_1_image' => 'about2_item_1_image',
                    'about2_item_1_heading_text' => '',
                    'about2_item_1_paragraph_text' => '',

                    'about2_item_2_image' => 'about2_item_2_image',
                    'about2_item_2_heading_text' => '',
                    'about2_item_2_paragraph_text' => '',

                    'about2_item_3_image' => 'about2_item_3_image',
                    'about2_item_3_heading_text' => '',
                    'about2_item_3_paragraph_text' => '',
                ), 
                $atts
            )
        );
    
            $about2_main_image = wp_get_attachment_image_src( $about2_main_image, "large");

            $about2_item_1_image = wp_get_attachment_image_src( $about2_item_1_image, "large");
            $about2_item_2_image = wp_get_attachment_image_src( $about2_item_2_image, "large");
            $about2_item_3_image = wp_get_attachment_image_src( $about2_item_3_image, "large");

            $html = '
            <!-- ***** Features Big Item Start ***** -->
                <section class="section" id="about2">
                    <div class="container">
                        <div class="row">
                            <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
                                <div class="left-heading">
                                    <h5>'.$about2_main_heading_text.'</h5>
                                </div>
                                <p>'.$about2_main_paragraph_text.'</p>
                                <ul>
                                    <li>
                                        <img src="'.$about2_item_1_image[0].'" alt="">
                                        <div class="text">
                                            <h6>'.$about2_item_1_heading_text.'</h6>
                                            <p>'.$about2_item_1_paragraph_text.'</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="'.$about2_item_2_image[0].'" alt="">
                                        <div class="text">
                                            <h6>'.$about2_item_2_heading_text.'</h6>
                                            <p>'.$about2_item_2_paragraph_text.'</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="'.$about2_item_3_image[0].'" alt="">
                                        <div class="text">
                                            <h6>'.$about2_item_3_heading_text.'</h6>
                                            <p>'.$about2_item_3_paragraph_text.'</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                <img src="'.$about2_main_image[0].'" class="rounded img-fluid d-block mx-auto" alt="App">
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ***** Features Big Item End ***** -->
            ';



        return $html;
    
    }


}


new About2_ShortCode();