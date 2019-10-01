<?php

class ContactUs extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'contact_us_mapping' ) );
        add_shortcode( 'ContactUs', array( $this, 'contact_us_html' ) );
    }

    public function contact_us_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

        // Map the block with vc_map()
    
        $forms = array();

	$dbValue = get_option('field-name'); //example!
    $posts = get_posts(array(
        'post_type'     => 'wpcf7_contact_form',
        'numberposts'   => -1
    ));
    foreach ( $posts as $p ) {
		//echo '<option value="'.$p->ID.'"'.selected($p->ID,$dbValue,false).'>'.$p->post_title.' ('.$p->ID.')</option>';  [contact-form-7 id="921" title="Contact form 1"]
		$forms[$p->post_title] = $p->ID;
    }

       vc_map( 
    
        array(
            'name' => __('Contact US ', 'text-domain'),
            'base' => 'ContactUs',
            'description' => __('Basically used as left section on contactUs page', 'text-domain'), 
            'category' => __('MyTheme Elements', 'text-domain'),   
            'icon' => 'https://cdn2.iconfinder.com/data/icons/seo-smart-pack/128/grey_new_seo2-41-512.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __( 'Map Url', 'text-domain' ),
                'param_name' => 'contact_us_map_url',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Map Section Url', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => __('Contact Form'),
                'param_name'  => 'contact_us_form',
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
                'value'       => $forms,
                'std'         => 'two', // Your default value
                'description' => __('The description')
                )                     
    
        )
    
    )

    );  

    }


    public function contact_us_html($atts){

        extract(
            shortcode_atts(
                array(
                    'contact_us_map_url'   => '',
                    'contact_us_form' => '',
                ), 
                $atts
            )
        );

        $html = '
        
        <!-- ***** Contact Us Start ***** -->
            <section class="section" id="contact-us">
                <div class="container-fluid">
                    <div class="row">
                        <!-- ***** Contact Map Start ***** -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div id="map">
                            <!-- How to change your own map point
                                1. Go to Google Maps
                                2. Click on your location point
                                3. Click "Share" and choose "Embed map" tab
                                4. Copy only URL and paste it within the src="" field below
                            -->
                            <iframe src="'.$contact_us_map_url.'" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <!-- ***** Contact Map End ***** -->

                        <!-- ***** Contact Form Start ***** -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="contact-form">';
                                $html .= do_shortcode('[contact-form-7 id="'.$contact_us_form.'"]');
                            
                            $html .= '</div>
                        </div>
                        <!-- ***** Contact Form End ***** -->
                    </div>
                </div>
            </section>
            <!-- ***** Contact Us End ***** -->
        ';


        return $html;

    }


}
// Element Class Init
new ContactUs(); 