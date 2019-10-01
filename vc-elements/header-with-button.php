<?php

class ServicesHeader_ShortCode extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'services_header_mapping' ) );
        add_shortcode( 'ServicesHeader_ShortCode', array( $this, 'services_header_html' ) );
    }

    
    public function services_header_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
       // Map the block with vc_map()
       vc_map( 
      
        array(
            'name' => __('Header With Button', 'text-domain'),
            'base' => 'ServicesHeader_ShortCode',
            'description' => __('services inner pages header', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/header-with-button.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'attach_image',
                'holder' => '',
                //'class' => 'text-class',   
                'heading' => __( 'Image', 'text-domain' ),
                'param_name' => 'services_header_image',
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
                'param_name' => 'services_header_title',
                'value' => __( 'Default value', 'text-domain' ),
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
                'param_name' => 'services_header_title_line_2',
                'value' => __( 'Default value', 'text-domain' ),
                'description' => __( 'Box Title Line 2', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'holder' => '',     
                'class' => '',
                'heading' => __( 'Service Header Description', 'text-domain' ),
                'param_name' => 'services_header_description',
                'value' => __( 'Default value', 'text-domain' ),
                'description' => __( 'Services Inner Pages Header Description', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )                     
                 
        )
    )
    );                       
                                  
    }



    public function services_header_html($atts){
        extract(
            shortcode_atts(
                array(
                    'services_header_image' => 'services_header_image',
                    'services_header_title'   => '',
                    'services_header_title_line_2' => '',
                    'services_header_description' => '',
                ), 
                $atts
            )
        );
    
            $img_url = wp_get_attachment_image_src( $services_header_image, "large");
    
                           
    
            $html = '
                    <!--- Start Header --->
                    <div class="vip_header" style="    background-image: url('.$img_url[0].');background-size: cover;background-repeat: no-repeat;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="vip_header_inner_bx">
                                    <h1>'.$services_header_title.'<br>'.$services_header_title_line_2.'</h1>
                                        <p>'.$services_header_description.'</p>
                                        <a href="/portfolio" class="orange_gradient_glowing_btn services_header_ml">VIEW PORTFOLIO</a>  <!-- vip_gradient_btn -->   
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---  END Header --->';

        return $html;
    
    }


}


new ServicesHeader_ShortCode();