<?php
/**
 * Freelancer Services Theme Customizer
 *
 * @package Freelancer Services
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function freelancer_services_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'freelancer_services_custom_controls' );

function freelancer_services_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'freelancer_services_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'freelancer_services_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'freelancer_services_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'freelancer-services' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'freelancer_services_left_right', array(
    	'title' => esc_html__( 'General Settings', 'freelancer-services' ),
		'panel' => 'freelancer_services_panel_id'
	) );

	$wp_customize->add_setting('freelancer_services_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));
	$wp_customize->add_control(new Freelancer_Services_Image_Radio_Control($wp_customize, 'freelancer_services_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','freelancer-services'),
        'description' => esc_html__('Here you can change the width layout of Website.','freelancer-services'),
        'section' => 'freelancer_services_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('freelancer_services_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));
	$wp_customize->add_control('freelancer_services_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','freelancer-services'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','freelancer-services'),
        'section' => 'freelancer_services_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','freelancer-services'),
            'Right Sidebar' => esc_html__('Right Sidebar','freelancer-services'),
            'One Column' => esc_html__('One Column','freelancer-services'),
            'Grid Layout' => esc_html__('Grid Layout','freelancer-services')
        ),
	) );

	$wp_customize->add_setting('freelancer_services_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));
	$wp_customize->add_control('freelancer_services_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','freelancer-services'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','freelancer-services'),
        'section' => 'freelancer_services_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','freelancer-services'),
            'Right_Sidebar' => esc_html__('Right Sidebar','freelancer-services'),
            'One_Column' => esc_html__('One Column','freelancer-services')
        ),
	) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'freelancer_services_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'freelancer_services_customize_partial_freelancer_services_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'freelancer_services_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','freelancer-services' ),
		'section' => 'freelancer_services_left_right'
    )));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'freelancer_services_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'freelancer_services_customize_partial_freelancer_services_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'freelancer_services_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','freelancer-services' ),
		'section' => 'freelancer_services_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'freelancer_services_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','freelancer-services' ),
        'section' => 'freelancer_services_left_right'
    )));

	$wp_customize->add_setting('freelancer_services_preloader_bg_color', array(
		'default'           => '#6102d3',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'freelancer_services_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'freelancer-services'),
		'section'  => 'freelancer_services_left_right',
	)));

	$wp_customize->add_setting('freelancer_services_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'freelancer_services_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'freelancer-services'),
		'section'  => 'freelancer_services_left_right',
	)));

	// Top Bar
	$wp_customize->add_section( 'freelancer_services_header' , array(
    	'title' => esc_html__( 'Header', 'freelancer-services' ),
		'panel' => 'freelancer_services_panel_id'
	) );

	$wp_customize->add_setting('freelancer_services_header_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_header_button_text',array(
		'label'	=> esc_html__('Add Button Text','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Get Started', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('freelancer_services_header_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('freelancer_services_header_button_link',array(
		'label'	=> esc_html__('Add Button Link','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example.com', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('freelancer_services_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));
	$wp_customize->add_control('freelancer_services_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','freelancer-services'),
        'section' => 'freelancer_services_header',
        'choices' => array(
        	'Default' => __('Default','freelancer-services'),
            'Normal' => __('Normal','freelancer-services')
        ),
	) );

	//Slider
	$wp_customize->add_section( 'freelancer_services_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'freelancer-services' ),
		'panel' => 'freelancer_services_panel_id'
	) );

	$wp_customize->add_setting( 'freelancer_services_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','freelancer-services' ),
      'section' => 'freelancer_services_slidersettings'
    )));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('freelancer_services_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'freelancer_services_customize_partial_freelancer_services_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'freelancer_services_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'freelancer_services_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'freelancer_services_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'freelancer-services' ),
			'description' => __('Slider image size (1500 x 600)','freelancer-services'),
			'section'  => 'freelancer_services_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'freelancer_services_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','freelancer-services' ),
		'section' => 'freelancer_services_slidersettings'
    )));

	//content layout
	$wp_customize->add_setting('freelancer_services_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));
	$wp_customize->add_control(new Freelancer_Services_Image_Radio_Control($wp_customize, 'freelancer_services_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','freelancer-services'),
        'section' => 'freelancer_services_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'freelancer_services_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'freelancer_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'freelancer_services_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','freelancer-services' ),
		'section'     => 'freelancer_services_slidersettings',
		'type'        => 'range',
		'settings'    => 'freelancer_services_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('freelancer_services_slider_opacity_color',array(
		'default'              => 0.7,
		'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));

	$wp_customize->add_control( 'freelancer_services_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','freelancer-services' ),
		'section'     => 'freelancer_services_slidersettings',
		'type'        => 'select',
		'settings'    => 'freelancer_services_slider_opacity_color',
		'choices' => array(
			'0' =>  esc_attr('0','freelancer-services'),
			'0.1' =>  esc_attr('0.1','freelancer-services'),
			'0.2' =>  esc_attr('0.2','freelancer-services'),
			'0.3' =>  esc_attr('0.3','freelancer-services'),
			'0.4' =>  esc_attr('0.4','freelancer-services'),
			'0.5' =>  esc_attr('0.5','freelancer-services'),
			'0.6' =>  esc_attr('0.6','freelancer-services'),
			'0.7' =>  esc_attr('0.7','freelancer-services'),
			'0.8' =>  esc_attr('0.8','freelancer-services'),
			'0.9' =>  esc_attr('0.9','freelancer-services')
		),
	));

	//Slider height
	$wp_customize->add_setting('freelancer_services_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_slider_height',array(
		'label'	=> __('Slider Height','freelancer-services'),
		'description'	=> __('Specify the slider height (px).','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'freelancer_services_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'freelancer_services_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','freelancer-services'),
		'section' => 'freelancer_services_slidersettings',
		'type'  => 'text',
	) );

	// About Section
	$wp_customize->add_section('freelancer_services_services_section',array(
		'title'	=> __('Services Section','freelancer-services'),
		'description' => __('Add section title and Select the Category to display for services.','freelancer-services'),
		'panel' => 'freelancer_services_panel_id',
	));

	$wp_customize->add_setting( 'freelancer_services_section_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'freelancer_services_section_title', array(
		'label'    => __( 'Add Section Title', 'freelancer-services' ),
		'input_attrs' => array(
            'placeholder' => __( 'Trending Services', 'freelancer-services' ),
        ),
		'section'  => 'freelancer_services_services_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'freelancer_services_section_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'freelancer_services_section_text', array(
		'label'    => __( 'Add Section Text', 'freelancer-services' ),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'freelancer-services' ),
        ),
		'section'  => 'freelancer_services_services_section',
		'type'     => 'text'
	) );

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('freelancer_services_service_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'freelancer_services_sanitize_choices',
	));
	$wp_customize->add_control('freelancer_services_service_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Services','freelancer-services'),
		'section' => 'freelancer_services_services_section',
	));

	//Blog Post
	$wp_customize->add_panel( 'freelancer_services_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'freelancer-services' ),
		'panel' => 'freelancer_services_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'freelancer_services_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'freelancer-services' ),
		'panel' => 'freelancer_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('freelancer_services_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'freelancer_services_Customize_partial_freelancer_services_toggle_postdate', 
	));

	$wp_customize->add_setting( 'freelancer_services_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','freelancer-services' ),
        'section' => 'freelancer_services_post_settings'
    )));

    $wp_customize->add_setting( 'freelancer_services_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_toggle_author',array(
		'label' => esc_html__( 'Author','freelancer-services' ),
		'section' => 'freelancer_services_post_settings'
    )));

    $wp_customize->add_setting( 'freelancer_services_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_toggle_comments',array(
		'label' => esc_html__( 'Comments','freelancer-services' ),
		'section' => 'freelancer_services_post_settings'
    )));

    $wp_customize->add_setting( 'freelancer_services_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_toggle_time',array(
		'label' => esc_html__( 'Time','freelancer-services' ),
		'section' => 'freelancer_services_post_settings'
    )));

    $wp_customize->add_setting( 'freelancer_services_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
	));
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','freelancer-services' ),
		'section' => 'freelancer_services_post_settings'
    )));

    $wp_customize->add_setting( 'freelancer_services_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
	));
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_toggle_tags', array(
		'label' => esc_html__( 'Tags','freelancer-services' ),
		'section' => 'freelancer_services_post_settings'
    )));

    $wp_customize->add_setting( 'freelancer_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'freelancer_services_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'freelancer_services_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','freelancer-services' ),
		'section'     => 'freelancer_services_post_settings',
		'type'        => 'range',
		'settings'    => 'freelancer_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('freelancer_services_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','freelancer-services'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','freelancer-services'),
		'section'=> 'freelancer_services_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('freelancer_services_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));
	$wp_customize->add_control('freelancer_services_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','freelancer-services'),
        'section' => 'freelancer_services_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','freelancer-services'),
            'Excerpt' => esc_html__('Excerpt','freelancer-services'),
            'No Content' => esc_html__('No Content','freelancer-services')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'freelancer_services_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'freelancer-services' ),
		'panel' => 'freelancer_services_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'freelancer_services_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'freelancer_services_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'freelancer_services_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','freelancer-services' ),
		'section'     => 'freelancer_services_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('freelancer_services_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'freelancer_services_Customize_partial_freelancer_services_button_text', 
	));

    $wp_customize->add_setting('freelancer_services_button_text',array(
		'default'=> esc_html__('Read More','freelancer-services'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_button_text',array(
		'label'	=> esc_html__('Add Button Text','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'freelancer_services_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'freelancer-services' ),
		'panel' => 'freelancer_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('freelancer_services_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'freelancer_services_Customize_partial_freelancer_services_related_post_title', 
	));

    $wp_customize->add_setting( 'freelancer_services_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_related_post',array(
		'label' => esc_html__( 'Related Post','freelancer-services' ),
		'section' => 'freelancer_services_related_posts_settings'
    )));

    $wp_customize->add_setting('freelancer_services_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('freelancer_services_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'freelancer_services_sanitize_number_absint'
	));
	$wp_customize->add_control('freelancer_services_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'freelancer_services_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'freelancer-services' ),
		'panel' => 'freelancer_services_blog_post_parent_panel',
	));

	$wp_customize->add_setting('freelancer_services_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','freelancer-services'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','freelancer-services'),
		'section'=> 'freelancer_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('freelancer_services_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('freelancer_services_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('freelancer_services_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('freelancer_services_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('freelancer_services_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','freelancer-services'),
		'description'	=> __('Enter a value in %. Example:50%','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_single_blog_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('freelancer_services_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','freelancer-services'),
		'panel' => 'freelancer_services_panel_id',
	));

    $wp_customize->add_setting( 'freelancer_services_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','freelancer-services' ),
      	'section' => 'freelancer_services_responsive_media'
    )));

    $wp_customize->add_setting( 'freelancer_services_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','freelancer-services' ),
      	'section' => 'freelancer_services_responsive_media'
    )));

    $wp_customize->add_setting( 'freelancer_services_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','freelancer-services' ),
      	'section' => 'freelancer_services_responsive_media'
    )));

    $wp_customize->add_setting('freelancer_services_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Freelancer_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'freelancer_services_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','freelancer-services'),
		'transport' => 'refresh',
		'section'	=> 'freelancer_services_responsive_media',
		'setting'	=> 'freelancer_services_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('freelancer_services_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Freelancer_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'freelancer_services_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','freelancer-services'),
		'transport' => 'refresh',
		'section'	=> 'freelancer_services_responsive_media',
		'setting'	=> 'freelancer_services_res_menu_close_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('freelancer_services_footer',array(
		'title'	=> esc_html__('Footer Settings','freelancer-services'),
		'panel' => 'freelancer_services_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('freelancer_services_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'freelancer_services_Customize_partial_freelancer_services_footer_text', 
	));
	
	$wp_customize->add_setting('freelancer_services_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('freelancer_services_footer_text',array(
		'label'	=> esc_html__('Copyright Text','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('freelancer_services_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));
	$wp_customize->add_control(new Freelancer_Services_Image_Radio_Control($wp_customize, 'freelancer_services_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','freelancer-services'),
        'section' => 'freelancer_services_footer',
        'settings' => 'freelancer_services_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'freelancer_services_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'freelancer_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new Freelancer_Services_Toggle_Switch_Custom_Control( $wp_customize, 'freelancer_services_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','freelancer-services' ),
      	'section' => 'freelancer_services_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('freelancer_services_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'freelancer_services_Customize_partial_freelancer_services_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('freelancer_services_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));
	$wp_customize->add_control(new Freelancer_Services_Image_Radio_Control($wp_customize, 'freelancer_services_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','freelancer-services'),
        'section' => 'freelancer_services_footer',
        'settings' => 'freelancer_services_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('freelancer_services_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'freelancer-services'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('freelancer_services_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','freelancer-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('freelancer_services_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','freelancer-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'freelancer_services_products_button_border_radius', array(
		'default'              => '30',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'freelancer_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'freelancer_services_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','freelancer-services' ),
		'section'     => 'freelancer_services_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    //Products Sale Badge
	$wp_customize->add_setting('freelancer_services_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'freelancer_services_sanitize_choices'
	));
	$wp_customize->add_control('freelancer_services_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','freelancer-services'),
        'section' => 'freelancer_services_woocommerce_section',
        'choices' => array(
            'left' => __('Left','freelancer-services'),
            'right' => __('Right','freelancer-services'),
        ),
	) );

	$wp_customize->add_setting('freelancer_services_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','freelancer-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('freelancer_services_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('freelancer_services_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','freelancer-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','freelancer-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'freelancer-services' ),
        ),
		'section'=> 'freelancer_services_woocommerce_section',
		'type'=> 'text'
	));
}

add_action( 'customize_register', 'freelancer_services_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Freelancer_Services_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Freelancer_Services_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Freelancer_Services_Customize_Section_Pro( $manager,'freelancer_services_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'FREELANCER PRO', 'freelancer-services' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'freelancer-services' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/freelancer-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Freelancer_Services_Customize_Section_Pro($manager,'freelancer_services_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'freelancer-services' ),
			'pro_text' => esc_html__( 'DOCS', 'freelancer-services' ),
			'pro_url'  => admin_url('themes.php?page=freelancer_services_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'freelancer-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'freelancer-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Freelancer_Services_Customize::get_instance();