<?php
/**
 * The template part for Middle Header
 *
 * @package Freelancer Services
 * @subpackage freelancer-services
 * @since freelancer-services 1.0
 */
?>

<div class="container">
  <div class="main-header">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-9 align-self-center">
        <div class="logo text-start">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('freelancer_services_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('freelancer_services_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('freelancer_services_tagline_hide_show',true) != ''){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="<?php if(get_theme_mod('freelancer_services_header_button_link') != '' || get_theme_mod('freelancer_services_header_button_text') != '') { ?>col-lg-7 col-md-5<?php } else {?>col-lg-9 col-md-8 <?php }?> col-3 align-self-center">
        <?php get_template_part('template-parts/header/navigation'); ?>
      </div>
      <?php if(get_theme_mod('freelancer_services_header_button_link') != '' || get_theme_mod('freelancer_services_header_button_text') != '') { ?>
        <div class="col-lg-2 col-md-3 align-self-center text-md-end text-center pb-md-0 pb-3 ps-md-0">
          <div class="getstarted-btn">
            <a href="<?php echo esc_url(get_theme_mod('freelancer_services_header_button_link')); ?>"><?php echo esc_html(get_theme_mod('freelancer_services_header_button_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('freelancer_services_header_button_text')); ?></span></a>
          </div>
        </div>
      <?php }?>
    </div>
  </div>
</div>