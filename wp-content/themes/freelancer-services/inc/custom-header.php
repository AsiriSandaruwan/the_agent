<?php
/**
 * @package Freelancer Services
 * Setup the WordPress core custom header feature.
 *
 * @uses freelancer_services_header_style()
*/
function freelancer_services_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'freelancer_services_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 85,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'freelancer_services_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'freelancer_services_custom_header_setup' );

if ( ! function_exists( 'freelancer_services_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see freelancer_services_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'freelancer_services_header_style' );

function freelancer_services_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'freelancer-services-basic-style', $custom_css );
	endif;
}
endif;