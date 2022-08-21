<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'freelancer_services_before_slider' ); ?>

    <?php if( get_theme_mod( 'freelancer_services_slider_hide_show', false) != '' || get_theme_mod( 'freelancer_services_resp_slider_hide_show', false) != '') { ?>
      <section id="slider">        
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'freelancer_services_slider_speed',4000)) ?>">
          <?php $freelancer_services_pages = array();
            for ( $count = 1; $count <= 4; $count++ ) {
              $mod = intval( get_theme_mod( 'freelancer_services_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $freelancer_services_pages[] = $mod;
              }
            }
            if( !empty($freelancer_services_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $freelancer_services_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/slider.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h1 class="wow bounceInUp delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <?php if( get_theme_mod('freelancer_services_slider_content_hide_show',true) != ''){ ?>
                      <p class="wow bounceInUp delay-1000" data-wow-duration="2s"><?php $excerpt = get_the_excerpt(); echo esc_html( freelancer_services_string_limit_words( $excerpt, esc_attr(get_theme_mod('freelancer_services_slider_excerpt_number','30')))); ?></p>
                    <?php }?>
                    <div class="slider-search wow bounceInUp delay-1000" data-wow-duration="2s">
                      <?php get_search_form(); ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','freelancer-services' );?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','freelancer-services' );?></span>
          </a>
        </div>  
      </section>
    <?php }?>

  <?php do_action( 'freelancer_services_after_slider' ); ?>

  <?php if(get_theme_mod('freelancer_services_section_title') != '' || get_theme_mod('freelancer_services_section_text') != '' || get_theme_mod('freelancer_services_service_category') != '') {?>
    <section id="services-sec" class="py-5 wow slideInRight delay-1000" data-wow-duration="2s">
      <div class="container">
        <?php if( get_theme_mod('freelancer_services_section_title') != '' ){ ?>
          <h3 class="text-center"><?php echo esc_html(get_theme_mod('freelancer_services_section_title',''));?></h3>
          <?php }?>
        <?php if( get_theme_mod('freelancer_services_section_text') != '' ){ ?>
          <p class="section-text text-center"><?php echo esc_html(get_theme_mod('freelancer_services_section_text',''));?></p>
        <?php }?>
        <div class="row">
          <?php
          $freelancer_services_catData = get_theme_mod('freelancer_services_service_category');
          if($freelancer_services_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html( $freelancer_services_catData ,'freelancer-services')));
            while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-3 col-md-6">
                <div class="box mb-4 wow zoomIn" data-wow-duration="2s">
                  <div class="bx-image"><?php the_post_thumbnail(); ?><i class="fas fa-plus"></i></div>
                  <span class="service-comments"><?php comments_number( __('0 Comment', 'freelancer-services'), __('0 Comments', 'freelancer-services'), __('% Comments', 'freelancer-services') ); ?></span>
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                  <p class="mb-0"><?php $excerpt = get_the_excerpt(); echo esc_html( freelancer_services_string_limit_words( $excerpt, 10)); ?></p>
                  <?php if( get_post_meta($post->ID, 'freelancer_services_price', true) ) {?>
                    <div class="meta-feilds">
                      <?php if( get_post_meta($post->ID, 'freelancer_services_price', true) ) {?>
                        <span><?php esc_html_e('Starting From','freelancer-services'); ?> <span class="price"><?php echo esc_html(get_post_meta($post->ID,'freelancer_services_price',true)); ?></span></span>
                      <?php }?>
                    </div>
                  <?php }?>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'freelancer_services_after_service' ); ?>

  <div id="content-vw" class="py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>