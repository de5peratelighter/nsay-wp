<?php
/**
 * cloudpress Theme Customizer
 *
 * @package cloudpress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function cloudpress_theme_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'cloudpress_theme_customize_register' );


function cloudpress_theme_customizer_register( $wp_customize ) 
    {
      // Do stuff with $wp_customize, the WP_Customize_Manager object.

      $wp_customize->add_panel( 'theme_option', array(
        'priority' => 200,
        'title' => __( 'CloudPress Theme Option', 'cloudpress' ),
        'description' => __( 'cloudpress Theme Option', 'cloudpress' ),
      ));


      /**********************************************/
      /************* MAIN SLIDER SECTION *************/
      /**********************************************/      

      $wp_customize->add_section('main_slider_category',array(
        'priority' => 20,
        'title' => __('Slider Categories','cloudpress'),
        'description' => __('Select the Slide Category for Homepage.','cloudpress'),
        'panel' => 'theme_option'
      ));
      $wp_customize->add_setting( 'slider_disable', array(
    'capability'    => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr',
     'default'   =>'1',
    ) );

    $wp_customize->add_control( 'slider_disable', array(
    'label'   => __( 'Check to disable Slider', 'cloudpress' ),
    'section'   => 'main_slider_category',
    'settings'  => 'slider_disable',
   
    'type'       => 'radio',
    'choices'    => array(
    '0'   => __('Disable','cloudpress' ),
    '1'  => __('Enable','cloudpress' ),
                  ),
    ) );

      $wp_customize->add_setting('slider_category_display',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_category',
        'default' => ''
      ));

      $wp_customize->add_control(new cloudpress_theme_Customize_Dropdown_Taxonomies_Control($wp_customize,'slider_category_display',array(
        'label' => __('Choose category','cloudpress'),
        'section' => 'main_slider_category',
        'settings' => 'slider_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));

        $wp_customize->add_setting('slider_category_display_full',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_category',
        'default' => '1'
      ));

      $wp_customize->add_control(new cloudpress_theme_Customize_Dropdown_Taxonomies_Control($wp_customize,'slider_category_display_full',array(
        'label' => __('Choose category(Full Width)','cloudpress'),
        'section' => 'main_slider_category',
        'settings' => 'slider_category_display_full',
        'type'=> 'dropdown-taxonomies',
        )  
      ));
      	// enable/disable slider
      
        // enable/disable slider title
      $wp_customize->add_setting( 'slidertitle_disable', array(
    'capability'    => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr',
     'default'   =>'1',
    ) );

    $wp_customize->add_control( 'slidertitle_disable', array(
    'label'   => __( 'Check to disable  Title of Slider', 'cloudpress' ),
    'section'   => 'main_slider_category',
    'settings'  => 'slidertitle_disable',
   
    'type'       => 'radio',
    'choices'    => array(
    '0'   => __('Disable','cloudpress' ),
    '1'  => __('Enable','cloudpress' ),
                  ),
    ) );
        // enable/disable slider title
      $wp_customize->add_setting( 'slidercontent_disable', array(
    'capability'    => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr',
     'default'   =>'1',
    ) );
      
    $wp_customize->add_control( 'slidercontent_disable', array(
    'label'   => __( 'Check to disable  Content of Slider', 'cloudpress' ),
    'section'   => 'main_slider_category',
    'settings'  => 'slidercontent_disable',
   
    'type'       => 'radio',
    'choices'    => array(
    '0'   => __('Disable','cloudpress' ),
    '1'  => __('Enable','cloudpress' ),
                  ),
    ) );
      // enable/disable slider Read More 

      $wp_customize->add_setting( 'sliderreadmore_disable', array(
    'capability'    => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr',
     'default'   =>'1',
    ) );
    $wp_customize->add_control( 'sliderreadmore_disable', array(
    'label'   => __( 'Check to disable Read More button of Slider', 'cloudpress' ),
    'section'   => 'main_slider_category',
    'settings'  => 'sliderreadmore_disable',
   
    'type'       => 'radio',
    'choices'    => array(
    '0'   => __('Disable','cloudpress' ),
    '1'  => __('Enable','cloudpress' ),
                  ),
    ) );
       // enable/disable slider carousel

      $wp_customize->add_setting( 'slidercarousel_disable', array(
    'capability'    => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr',
     'default'   =>'1',
    ) );
    $wp_customize->add_control( 'slidercarousel_disable', array(
    'label'   => __( 'Check to disable  Carousel of Slider', 'cloudpress' ),
    'section'   => 'main_slider_category',
    'settings'  => 'slidercarousel_disable',
   
    'type'       => 'radio',
    'choices'    => array(
    '0'   => __('Disable','cloudpress' ),
    '1'  => __('Enable','cloudpress' ),
                  ),
    ) );
		// no of posts to show on slider
		$wp_customize->add_setting( 'slider_no_of_posts', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
    'default'           => '3',
		) );

		$wp_customize->add_control( 'slider_no_of_posts', array(
		'settings' => 'slider_no_of_posts',
		'label'                 =>  __( 'No Of Posts To Show On Slider', 'cloudpress' ),
		'section'               => 'main_slider_category',
    
		'type'                  => 'select',
		'choices'               => array(
				 '1' => __( '1', 'cloudpress' ),
				 '2' => __( '2 ', 'cloudpress' ),
				 '3' => __( '3', 'cloudpress' ),
				 '4' => __( '4', 'cloudpress' ),
				 '5' => __( '5', 'cloudpress' ),
				 '6' => __( '6', 'cloudpress' ),
				 '7' => __( '7', 'cloudpress' ),
				 '8' => __( '8', 'cloudpress' ),
				 '9' => __( '9', 'cloudpress' )
				        				),
		'priority'              => 20
		) );

      /**********************************************/
      /*************** FEATURES SECTION ***************/
      /**********************************************/

      $wp_customize->add_section('features_slider_category',array(
        'priority' => 30,
        'title' => __('Features Categories','cloudpress'),
        'description' => __('Select the Category for Features Section for Homepage','cloudpress'),
        'panel' => 'theme_option'
      ));

      // features title
       $wp_customize->add_setting('feature_title',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
         'default' => __('Features','cloudpress'),
        
      ));
      
  
    
      $wp_customize->add_control('feature_title',array(
        'label' => __('Features Title','cloudpress'),
        'section' => 'features_slider_category',
       
        'settings' => 'feature_title',
        'type' => 'text'
      ));      

      $wp_customize->add_setting('features_category_display',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_category',
        'default' => ''
      ));

      $wp_customize->add_control(new cloudpress_theme_Customize_Dropdown_Taxonomies_Control($wp_customize,'features_category_display',array(
        'label' => __('Choose category','cloudpress'),
        'section' => 'features_slider_category',
        'settings' => 'features_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));

        $wp_customize->add_setting('checkbox_features_category_display',array(
            'sanitize_callback' => 'cloudpress_theme_sanitize_category',
            'default' => '0',
            
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'checkbox_features_category_display',array(
                'label' => __('Check to show features category','cloudpress'),
                'section' => 'features_slider_category',
                'settings' => 'checkbox_features_category_display',
                
               'type'       => 'radio',
				        'choices'    => array(
					       '0'   => __('Disable','cloudpress' ),
                  '1'  => __('Enable','cloudpress' ),
			        		),
            ))
        );
        // no of posts to show on features
		$wp_customize->add_setting( 'features_no_of_posts', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
     'default'               => '5',
		) );

		$wp_customize->add_control( 'features_no_of_posts', array(
		'settings' => 'features_no_of_posts',
		'label'                 =>  __( 'No Of Posts To Show On Feature', 'cloudpress' ),
		'section'               => 'features_slider_category',
   
		'type'                  => 'select',
		'choices'               => array(
				 '1' => __( '1', 'cloudpress' ),
         '2' => __( '2 ', 'cloudpress' ),
         '3' => __( '3', 'cloudpress' ),
         '4' => __( '4', 'cloudpress' ),
         '5' => __( '5', 'cloudpress' ),
         '6' => __( '6', 'cloudpress' ),
         '7' => __( '7', 'cloudpress' ),
         '8' => __( '8', 'cloudpress' ),
         '9' => __( '9', 'cloudpress' )
				        				),
		'priority'              => 20
		) );

      /**********************************************/
      /*************** CTA SECTION ***************/
      /**********************************************/

      $wp_customize->add_section('cta_category',array(
        'priority' => 30,
        'title' => __('CTA Section','cloudpress'),
        'description' => __('Paste your Cta html code here','cloudpress'),
        'panel' => 'theme_option'
      ));
        $wp_customize->add_setting('checkbox_cta_display',array(
            'sanitize_callback' => 'cloudpress_theme_sanitize_category',
            'default' => '0',
            
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'checkbox_cta_display',array(
                'label' => __('Check to Cta Section','cloudpress'),
                'section' => 'cta_category',
                'settings' => 'checkbox_cta_display',
                
               'type'       => 'radio',
                'choices'    => array(
                 '0'   => __('Disable','cloudpress' ),
                  '1'  => __('Enable','cloudpress' ),
                  ),
            ))
        );
        // why choose us title
       $wp_customize->add_setting('cta_title',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
        'default' => '',
        
      ));
      
  
    $wp_customize->add_control('cta_title',array(
        'label' => __('Paste Cta Code','cloudpress'),
        'section' => 'cta_category',
        
        'settings' => 'cta_title',
        'type' => 'textarea'
      ));   



      /**********************************************/
      /************** WHY CHOOSE US SECTION **********/
      /**********************************************/

      $wp_customize->add_section('why_choose_us_category',array(
        'priority' => 40,
        'title' => __('Why choose us Categories','cloudpress'),
        'description' => __('Select the Category for Why Choose Us Section for Homepage','cloudpress'),
        'panel' => 'theme_option'
      ));
      $wp_customize->add_setting('checkbox_whyus_category_display',array(
            'sanitize_callback' => 'cloudpress_theme_sanitize_category',
              'default' => '1',
            
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'checkbox_whyus_category_display',array(
                'label' => __('Check to show Why Choose Us category','cloudpress'),
                'section' => 'why_choose_us_category',
                'settings' => 'checkbox_whyus_category_display',
              
               'type'       => 'radio',
              'choices'    => array(
                     '0'   => __('Disable','cloudpress' ),
                    '1'  => __('Enable','cloudpress' ),
                        ),
                  ))
        );
       // why choose us title
       $wp_customize->add_setting('whychooseus_title',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
        'default' => __('Why Choose Us','cloudpress'),
        
      ));
      
  
    $wp_customize->add_control('whychooseus_title',array(
        'label' => __('Why Choose Us Title','cloudpress'),
        'section' => 'why_choose_us_category',
        
        'settings' => 'whychooseus_title',
        'type' => 'text'
      ));   
      //end of why choose us title 
      $wp_customize->add_setting('why_choose_us_category_display',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_category',
        'default' => ''
      ));

      $wp_customize->add_control(new cloudpress_theme_Customize_Dropdown_Taxonomies_Control($wp_customize,'why_choose_us_category_display',array(
        'label' => __('Choose Category If No Page Is Selected ','cloudpress'),
        'section' => 'why_choose_us_category',
        'settings' => 'why_choose_us_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));

       
        // no of posts to show on features
		$wp_customize->add_setting( 'whyus_no_of_posts', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
    'default'           => '3',
		) );

		$wp_customize->add_control( 'whyus_no_of_posts', array(
		'settings' => 'whyus_no_of_posts',
		'label'                 =>  __( 'No Of Posts To Why Choose Us', 'cloudpress' ),
		'section'               => 'why_choose_us_category',
    
		'type'                  => 'select',
		'choices'               => array(
				 '3' => __( '3', 'cloudpress' ),
				 '6' => __( '6 ', 'cloudpress' ),
				 '9' => __( '9', 'cloudpress' ),
				 '12' => __( '12', 'cloudpress' )
				
				        				),
		'priority'              => 20
		) );

    // why choose us page select
    $wp_customize->add_setting( 'cloudpress_whychooseus_section_icon1', array(
    'capability'        => 'edit_theme_options',
    'default'           => 'fa fa-cloud',
    'sanitize_callback' => 'esc_attr'
  ) );

  $wp_customize->add_control( 'cloudpress_whychooseus_section_icon1', array(
      'label'                 =>  __( 'Icon For Why Choose Us 1', 'cloudpress' ),
      'description'           => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'cloudpress' ), 'fa fa-cloud','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>' ),
      'section'               => 'why_choose_us_category',
      'type'                  => 'text',
      'priority'              => 20,
      'settings'          => 'cloudpress_whychooseus_section_icon1',
  ) );


   $wp_customize->add_setting( 'cloudpress_whychooseus_section_icon2', array(
    'capability'        => 'edit_theme_options',
    'default'           => 'fa fa-cloud',
    'sanitize_callback' => 'esc_attr'
  ) );

  $wp_customize->add_control( 'cloudpress_whychooseus_section_icon2', array(
      'label'                 =>  __( 'Icon For Why Choose Us 2', 'cloudpress' ),
      'section'               => 'why_choose_us_category',
      'type'                  => 'text',
      'priority'              => 20,
      'settings'          => 'cloudpress_whychooseus_section_icon2',
  ) );
   $wp_customize->add_setting( 'cloudpress_whychooseus_section_icon3', array(
    'capability'        => 'edit_theme_options',
    'default'           => 'fa fa-cloud',
    'sanitize_callback' => 'esc_attr'
  ) );

  $wp_customize->add_control( 'cloudpress_whychooseus_section_icon3', array(
      'label'                 =>  __( 'Icon For Why Choose Us 3', 'cloudpress' ),
      'section'               => 'why_choose_us_category',
      'type'                  => 'text',
      'priority'              => 20,
      'settings'          => 'cloudpress_whychooseus_section_icon3',
  ) );

  $wp_customize->add_setting( 'cloudpress_whychooseus_section_page1', array(
    'capability'        => 'edit_theme_options',
    'default'           => 0,
    'sanitize_callback' => 'esc_attr'
) );
$wp_customize->add_control( 'cloudpress_whychooseus_section_page1', array(
    'label'                 =>  __( 'Select Page For Why Choose Us 1', 'cloudpress' ),
    'section'               => 'why_choose_us_category',
    'type'                  => 'dropdown-pages',
    'priority'              => 20,
    'settings'              => 'cloudpress_whychooseus_section_page1',
) );

$wp_customize->add_setting( 'cloudpress_whychooseus_section_page2', array(
    'capability'        => 'edit_theme_options',
    'default'           => 0,
    'sanitize_callback' => 'esc_attr'
) );
$wp_customize->add_control( 'cloudpress_whychooseus_section_page2', array(
    'label'                 =>  __( 'Select Page For Why Choose Us 2', 'cloudpress' ),
    'section'               => 'why_choose_us_category',
    'type'                  => 'dropdown-pages',
    'priority'              => 20,
    'settings'              => 'cloudpress_whychooseus_section_page2',
) );

$wp_customize->add_setting( 'cloudpress_whychooseus_section_page3', array(
    'capability'        => 'edit_theme_options',
    'default'           => 0,
    'sanitize_callback' => 'esc_attr'
) );
$wp_customize->add_control( 'cloudpress_whychooseus_section_page3', array(
    'label'                 =>  __( 'Select Page For Why Choose Us 3', 'cloudpress' ),
    'section'               => 'why_choose_us_category',
    'type'                  => 'dropdown-pages',
    'priority'              => 20,
    'settings'              => 'cloudpress_whychooseus_section_page3',
) );




      /**********************************************/
      /*************** SERVICES SECTION ************************/
      /**********************************************/

      $wp_customize->add_section('our_services_category',array(
        'priority' => 50,
        'title' => __('Our Services Categories','cloudpress'),
        'description' => __('Select the Category for Services Section for Homepage','cloudpress'),
        'panel' => 'theme_option'
      ));

       $wp_customize->add_setting('checkbox_services_category_display',array(
            'sanitize_callback' => 'cloudpress_theme_sanitize_category',
             'default' => '1',
            
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'checkbox_services_category_display',array(
                'label' => __('Check to show Services category','cloudpress'),
                'section' => 'our_services_category',
                'settings' => 'checkbox_services_category_display',
               
               'type'       => 'radio',
        'choices'    => array(
          '0'   => __('Disable','cloudpress' ),
          '1'  => __('Enable','cloudpress' ),
                  ),
            ))
        );

       // Our services  title
       $wp_customize->add_setting('ourservices_title',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
        'default' => __('Our Services','cloudpress')
      ));
      
  
    $wp_customize->add_control('ourservices_title',array(
        'label' => __('Services Title','cloudpress'),
        'section' => 'our_services_category',
        'settings' => 'ourservices_title',
        'type' => 'text'
      ));   
      //end of our services title 

      $wp_customize->add_setting('our_services_display',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_category',
        'default' => ''
      ));

      $wp_customize->add_control(new cloudpress_theme_Customize_Dropdown_Taxonomies_Control($wp_customize,'our_services_display',array(
        'label' => __('Choose category If No Page Is Selected','cloudpress'),
        'section' => 'our_services_category',
        'settings' => 'our_services_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));

      
        // no of posts to show on features
		$wp_customize->add_setting( 'services_of_posts', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
     'default'           => '4',
		) );

		$wp_customize->add_control( 'services_of_posts', array(
		'settings' => 'services_of_posts',
		'label'                 =>  __( 'No Of Posts To Services', 'cloudpress' ),
		'section'               => 'our_services_category',
   
		'type'                  => 'select',
		'choices'               => array(
				 '2' => __( '2', 'cloudpress' ),
				 '4' => __( '4 ', 'cloudpress' ),
				 '6' => __( '6', 'cloudpress' ),
				 '8' => __( '8', 'cloudpress' )
				
				        				),
		'priority'              => 20
		) );

     // Services page select
    $wp_customize->add_setting( 'cloudpress_services_section_icon1', array(
    'capability'        => 'edit_theme_options',
    'default'           => 'fa fa-cloud',
    'sanitize_callback' => 'esc_attr'
  ) );

  $wp_customize->add_control( 'cloudpress_services_section_icon1', array(
      'label'                 =>  __( 'Icon Services 1', 'cloudpress' ),
      'description'           => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'cloudpress' ), 'fa fa-cloud','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>' ),
      'section'               => 'our_services_category',
      'type'                  => 'text',
      'priority'              => 20,
      'settings'          => 'cloudpress_services_section_icon1',
  ) );

   $wp_customize->add_setting( 'cloudpress_services_section_icon2', array(
    'capability'        => 'edit_theme_options',
    'default'           => 'fa fa-cloud',
    'sanitize_callback' => 'esc_attr'
  ) );

  $wp_customize->add_control( 'cloudpress_services_section_icon2', array(
      'label'                 =>  __( 'Icon Services 2', 'cloudpress' ),
      'section'               => 'our_services_category',
      'type'                  => 'text',
      'priority'              => 20,
      'settings'          => 'cloudpress_services_section_icon2',
  ) );

   $wp_customize->add_setting( 'cloudpress_services_section_icon3', array(
    'capability'        => 'edit_theme_options',
    'default'           => 'fa fa-cloud',
    'sanitize_callback' => 'esc_attr'
  ) );

  $wp_customize->add_control( 'cloudpress_services_section_icon3', array(
      'label'                 =>  __( 'Icon Services 3', 'cloudpress' ),
      'section'               => 'our_services_category',
      'type'                  => 'text',
      'priority'              => 20,
      'settings'          => 'cloudpress_services_section_icon3',
  ) );

   $wp_customize->add_setting( 'cloudpress_services_section_icon4', array(
    'capability'        => 'edit_theme_options',
    'default'           => 'fa fa-cloud',
    'sanitize_callback' => 'esc_attr'
  ) );

  $wp_customize->add_control( 'cloudpress_services_section_icon4', array(
      'label'                 =>  __( 'Icon Services 4', 'cloudpress' ),
      'section'               => 'our_services_category',
      'type'                  => 'text',
      'priority'              => 20,
      'settings'          => 'cloudpress_services_section_icon4',
  ) );

  $wp_customize->add_setting( 'cloudpress_services_section_page1', array(
    'capability'        => 'edit_theme_options',
    'default'           => 0,
    'sanitize_callback' => 'esc_attr'
) );
$wp_customize->add_control( 'cloudpress_services_section_page1', array(
    'label'                 =>  __( 'Select Page For Services 1', 'cloudpress' ),
    'section'               => 'our_services_category',
    'type'                  => 'dropdown-pages',
    'priority'              => 20,
    'settings'              => 'cloudpress_services_section_page1',
) );

 $wp_customize->add_setting( 'cloudpress_services_section_page2', array(
    'capability'        => 'edit_theme_options',
    'default'           => 0,
    'sanitize_callback' => 'esc_attr'
) );
$wp_customize->add_control( 'cloudpress_services_section_page2', array(
    'label'                 =>  __( 'Select Page For Services 2', 'cloudpress' ),
    'section'               => 'our_services_category',
    'type'                  => 'dropdown-pages',
    'priority'              => 20,
    'settings'              => 'cloudpress_services_section_page2',
) );

 $wp_customize->add_setting( 'cloudpress_services_section_page3', array(
    'capability'        => 'edit_theme_options',
    'default'           => 0,
    'sanitize_callback' => 'esc_attr'
) );
$wp_customize->add_control( 'cloudpress_services_section_page3', array(
    'label'                 =>  __( 'Select Page For Services 3', 'cloudpress' ),
    'section'               => 'our_services_category',
    'type'                  => 'dropdown-pages',
    'priority'              => 20,
    'settings'              => 'cloudpress_services_section_page3',
) );

 $wp_customize->add_setting( 'cloudpress_services_section_page4', array(
    'capability'        => 'edit_theme_options',
    'default'           => 0,
    'sanitize_callback' => 'esc_attr'
) );
$wp_customize->add_control( 'cloudpress_services_section_page4', array(
    'label'                 =>  __( 'Select Page For Services 4', 'cloudpress' ),
    'section'               => 'our_services_category',
    'type'                  => 'dropdown-pages',
    'priority'              => 20,
    'settings'              => 'cloudpress_services_section_page4',
) );


      /**********************************************/
      /************* THEME ICONS SECTION ***************/
      /**********************************************/

      $wp_customize->add_section('theme_icons',array(
        'priority' => 60,
        'title' => __('Theme Icons','cloudpress'),
        'description' => __('Modify theme icons If Categories Are Selected On Sections','cloudpress'),
        'panel' => 'theme_option',
      ));

      $wp_customize->add_setting('why_choose_us_icon',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
        'default' => 'fa fa-cloud'
      ));

      $wp_customize->add_setting('our_services_icon',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
        'default' => 'fa fa-cloud'
      ));
      
  
    
      $wp_customize->add_control('why_choose_us_icon',array(
        'label' => __('Edit Why Choose Us Icon','cloudpress'),
        'section' => 'theme_icons',
        'settings' => 'why_choose_us_icon',
        'type' => 'text'
      ));      
    
      $wp_customize->add_control('our_services_icon',array(
        'label' => __('Edit Our Services Icon','cloudpress'),
        'section' => 'theme_icons',
        'settings' => 'our_services_icon',
        'type' => 'text'
       ));

      /**************************************************************************************************************/
      /**************************** Other Setting *******************************************************************/
      /***************************************************************************************************************/

      $wp_customize->add_section('other_setting',array(
        'priority' => 60,
        'title' => __('Other Setting','cloudpress'),
        'description' => __('Other Setting','cloudpress'),
        'panel' => 'theme_option',
      ));
       $wp_customize->add_setting('search_option_display',array(
            'sanitize_callback' => 'cloudpress_theme_sanitize_category',
              'default' => '1',
            
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'search_option_display',array(
                'label' => __('Check to show search option on header.','cloudpress'),
                'section' => 'other_setting',
                'settings' => 'search_option_display',
              
               'type'       => 'radio',
              'choices'    => array(
                     '0'   => __('Disable','cloudpress' ),
                    '1'  => __('Enable','cloudpress' ),
                        ),
                  ))
        );

         $wp_customize->add_setting('scrolltotop_option_display',array(
            'sanitize_callback' => 'cloudpress_theme_sanitize_category',
              'default' => '1',
            
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'scrolltotop_option_display',array(
                'label' => __('Check to show scroll to top option on header.','cloudpress'),
                'section' => 'other_setting',
                'settings' => 'scrolltotop_option_display',
              
               'type'       => 'radio',
              'choices'    => array(
                     '0'   => __('Disable','cloudpress' ),
                    '1'  => __('Enable','cloudpress' ),
                        ),
                  ))
        );

      /**********************************************/
      /***** ADJUSTMENT OF SIDEBAR POSITION SECTION *****/
      /**********************************************/
     
      $wp_customize->add_panel( 'layout', array(
        'priority' => 220,
        'title' => __( 'CloudPress Theme Layout', 'cloudpress' ),
        'description' => __( 'Configure your sidebars here', 'cloudpress' ),
      ));

      $wp_customize->add_section('sidebar' , array(
        'priority' => 10,
        'title' => __('Category Sidebar','cloudpress'),
        'panel' => 'layout'
      ));

      $wp_customize->add_setting('sidebar_position', array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
        'default' => __('right','cloudpress'),
        ));

      $wp_customize->add_control('sidebar_position', array(
        'label'      => __('Sidebar position', 'cloudpress'),
        'section'    => 'sidebar',
        'settings'   => 'sidebar_position',
        
        'type'       => 'radio',
        'choices'    => array(
          'none'   => __('none','cloudpress'),
          'left'   => __('left','cloudpress'),
          'right'  => __('right','cloudpress'),
        ),
      ));


      /**********************************************/
      /********** SINGLE POST SIDEBAR SECTION ***********/
      /**********************************************/
     

      $wp_customize->add_section('single post sidebar' , array(
        'priority' => 20,
        'title' => __('Single Post Sidebar','cloudpress'),
        'panel' => 'layout'
      ));


      $wp_customize->add_setting('single_post_sidebar_position', array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
          'default'         => __('right','cloudpress')
      ));

      $wp_customize->add_control('single_post_sidebar_position', array(
        'label'      => __('Single Post Sidebar position', 'cloudpress'),
        'section'    => 'single post sidebar',
        'settings'   => 'single_post_sidebar_position',
        'type'       => 'radio',
        'choices'    => array(
           'none'   => __('none','cloudpress'),
          'left'   => __('left','cloudpress'),
          'right'  => __('right','cloudpress'),
        ),
      ));


      /**********************************************/
      /********** SINGLE PAGE SIDEBAR SECTION ***********/
      /**********************************************/
     

      $wp_customize->add_section('single page sidebar' , array(
        'priority' => 30,
        'title' => __('Single Page Sidebar','cloudpress'),
        'panel' => 'layout'
      ));


      $wp_customize->add_setting('single_page_sidebar_position', array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
          'default' => __('right','cloudpress')
      ));

      $wp_customize->add_control('single_page_sidebar_position', array(
        'label'      => __('Single Page Sidebar position', 'cloudpress'),
        'section'    => 'single page sidebar',
        'settings'   => 'single_page_sidebar_position',
        'type'       => 'radio',
        'choices'    => array(
          'none'   => __('none','cloudpress'),
          'left'   => __('left','cloudpress'),
          'right'  => __('right','cloudpress'),
        ),
      ));


      /**********************************************/
      /******** SEARCH PAGE SIDEBAR SECTION *********/
      /**********************************************/     

      $wp_customize->add_section('search page sidebar' , array(
        'priority' => 40,
        'title' => __('Search Page Sidebar','cloudpress'),
        'panel' => 'layout'
      ));


      $wp_customize->add_setting('search_page_sidebar_position', array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
          'default' => __('right','cloudpress')
      ));

      $wp_customize->add_control('search_page_sidebar_position', array(
        'label'      => __('Search Page Sidebar position', 'cloudpress'),
        'section'    => 'search page sidebar',
        'settings'   => 'search_page_sidebar_position',
        'type'       => 'radio',
        'choices'    => array(
           'none'   => __('none','cloudpress'),
          'left'   => __('left','cloudpress'),
          'right'  => __('right','cloudpress'),
        ),
      ));



      /**********************************************/
      /******** PAGE NOT FOUND SIDEBAR SECTION *********/
      /**********************************************/     

      $wp_customize->add_section('page not found sidebar' , array(
        'priority' => 50,
        'title' => __('Page Not Found Sidebar','cloudpress'),
        'panel' => 'layout'
      ));


      $wp_customize->add_setting('page_not_found_sidebar_position', array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
           'default' => __('right','cloudpress')
      ));

      $wp_customize->add_control('page_not_found_sidebar_position', array(
        'label'      => __('Page Not Found Sidebar position', 'cloudpress'),
        'section'    => 'page not found sidebar',
        'settings'   => 'page_not_found_sidebar_position',
        'type'       => 'radio',
        'choices'    => array(
           'none'   => __('none','cloudpress'),
          'left'   => __('left','cloudpress'),
          'right'  => __('right','cloudpress'),
        ),
      ));




      /**********************************************/
      /*************** FOOTER SECTION ***************/
      /**********************************************/

       $wp_customize->add_section(
        'footer_section',
          array(
            'priority' => 70,
            'title' => __('Footer Settings','cloudpress'),
            'description' => __('Footer Settings section.','cloudpress'),
            'panel' => 'theme_option',
        )
      );


      /**********************************************/
      /*************** COPYRIGHTS SECTION **************/
      /**********************************************/
       
      $wp_customize->add_setting(
        'copyright_textbox',
          array(
            'sanitize_callback' => 'cloudpress_theme_sanitize_text',
            'default' => __('&copy; 2015. YOUR THEME. All Rights Reserved.','cloudpress'),
          )
      );

      $wp_customize->add_control(
        'copyright_textbox',
          array(
          'label' => __('Copyright text','cloudpress'),
          'section' => 'footer_section',
          'settings' => 'copyright_textbox',
          'type' => 'text',
         )
      );


      /**********************************************/
      /******* SOCIAL ICON HIDE/ DISPLAY SECTION ********/
      /**********************************************/

      $wp_customize->add_setting('socialicon_display',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
        'default' => '1'
      ));

      $wp_customize->add_control(new WP_Customize_Control($wp_customize,'socialicon_display',array(
        'label' => __('Show social icons','cloudpress'),
        'section' => 'footer_section',
        'settings' => 'socialicon_display',
        'type'=> 'checkbox',
        ))
      );

      /**********************************************/
      /******* Footer Menu HIDE/ DISPLAY SECTION ********/
      /**********************************************/

      $wp_customize->add_setting('footermenu_display',array(
        'sanitize_callback' => 'cloudpress_theme_sanitize_text',
        'default' => '1'
      ));

      $wp_customize->add_control(new WP_Customize_Control($wp_customize,'footermenu_display',array(
        'label' => __('Show menu in footer section.','cloudpress'),
        'section' => 'footer_section',
        'settings' => 'footermenu_display',
        'type'=> 'checkbox',
        ))
      );
      /// Social Meadia Title

       $wp_customize->add_setting(
        'social_title',
          array(
            'sanitize_callback' => 'cloudpress_theme_sanitize_text',
            'default'           => __('Connect with us on social media','cloudpress')
          )
      );

      $wp_customize->add_control(
        'social_title',
          array(
            'label' => __('Social Media Title','cloudpress'),
            'section' => 'footer_section',
            'settings' => 'social_title',
            'type' => 'text',
          )
      );


      /**********************************************/
      /********** SOCIAL ICON LINKS SECTION ***********/
      /**********************************************/




      $wp_customize->add_setting(
        'facebook_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
          )
      );

      $wp_customize->add_control(
        'facebook_textbox',
          array(
            'label' => __('Facebook','cloudpress'),
            'section' => 'footer_section',
            'settings' => 'facebook_textbox',
            'type' => 'text',
          )
      );

      $wp_customize->add_setting(
        'twitter_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
          )
      );

      $wp_customize->add_control(
        'twitter_textbox',
         array(
          'label' => __('Twitter','cloudpress'),
          'section' => 'footer_section',
          'settings' => 'twitter_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'googleplus_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
          )
      );

      $wp_customize->add_control(
        'googleplus_textbox',
          array(
          'label' => __('Googleplus','cloudpress'),
          'section' => 'footer_section',
          'settings' => 'googleplus_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'youtube_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
          'default' => '#',
          )
      );
      
      $wp_customize->add_control(
        'youtube_textbox',
          array(
            'label' => __('You Tube','cloudpress'),
            'section' => 'footer_section',
            'settings' => 'youtube_textbox',
            'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'linkedin_textbox',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => '#',
          )
      );

      $wp_customize->add_control(
        'linkedin_textbox',
         array(
          'label' => __('Linkedin','cloudpress'),
          'section' => 'footer_section',
          'settings' => 'linkedin_textbox',
          'type' => 'text',
         )
      );

       $wp_customize->add_setting(
        'skype_textbox',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => '#',
          )
      );

      $wp_customize->add_control(
        'skype_textbox',
         array(
          'label' => __('Skype','cloudpress'),
          'section' => 'footer_section',
          'settings' => 'skype_textbox',
          'type' => 'text',
         )
      );
      $wp_customize->add_setting(
        'pinterest_textbox',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => '#',
          )
      );

      $wp_customize->add_control(
        'pinterest_textbox',
         array(
          'label' => __('Pinterest','cloudpress'),
          'section' => 'footer_section',
          'settings' => 'pinterest_textbox',
          'type' => 'text',
         )
      );
       $wp_customize->add_setting(
        'instagram_textbox',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => '#',
          )
      );

      $wp_customize->add_control(
        'instagram_textbox',
         array(
          'label' => __('Instagram','cloudpress'),
          'section' => 'footer_section',
          'settings' => 'instagram_textbox',
          'type' => 'text',
         )
      );
      $wp_customize->add_setting(
        'tumblr_textbox',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => '#',
          )
      );

      $wp_customize->add_control(
        'tumblr_textbox',
         array(
          'label' => __('Tumblr','cloudpress'),
          'section' => 'footer_section',
          'settings' => 'tumblr_textbox',
          'type' => 'text',
         )
      );

      
    }

add_action( 'customize_register', 'cloudpress_theme_customizer_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cloudpress_theme_customize_preview_js() {
	wp_enqueue_script( 'cloudpress_theme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'cloudpress_theme_customize_preview_js' );

/**
 * Enqueue scripts for customizer
 */
function cloudpress_customizer_pro_js() {
    wp_enqueue_script('cloudpress-customizer', get_template_directory_uri() . '/js/cloudpress-customizer.js', array('jquery'), '1.3.0', true);

    wp_localize_script( 'cloudpress-customizer', 'cloudpress_customizer_pro_js_obj', array(
        'pro' => __('Upgrade To CloudPress Pro','cloudpress')
    ) );
    wp_enqueue_style( 'cloudpress-customizer', get_template_directory_uri() . '/css/cloudpress-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'cloudpress_customizer_pro_js' );



function cloudpress_theme_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function cloudpress_theme_sanitize_category($input){
  $output=intval($input);
  return $output;

}