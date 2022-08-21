<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/

?>
<!-- Testimonials Outer Template-->
<?php
$service_finder_options = get_option('service_finder_options');
$wpdb = service_finder_shortcode_global_vars('wpdb');

$imgurl = (!empty($service_finder_options['testimonials-bg-image']['url'])) ? $service_finder_options['testimonials-bg-image']['url'] : '';
$bgattachment = (isset($service_finder_options['testimonials-background-attachment'])) ? esc_html($service_finder_options['testimonials-background-attachment']) : '';
$bgcolor = (!empty($service_finder_options['testimonials-bg-color'])) ? $service_finder_options['testimonials-bg-color'] : '';
$bgopacity = (!empty($service_finder_options['testimonials-bg-opacity'])) ? $service_finder_options['testimonials-bg-opacity'] : '';
$bgopacity = ($bgopacity > 0) ? $bgopacity : ''; 
$curveleftcolor = (!empty($service_finder_options['testimonials-left-curve-color'])) ? $service_finder_options['testimonials-left-curve-color'] : '';
$curverightcolor = (!empty($service_finder_options['testimonials-right-curve-color'])) ? $service_finder_options['testimonials-right-curve-color'] : '';

$title = (!empty($service_finder_options['shortcode-testimonials-title'])) ? esc_html($service_finder_options['shortcode-testimonials-title']) : '';
$subtitle = (!empty($service_finder_options['shortcode-testimonials-subtitle'])) ? esc_html($service_finder_options['shortcode-testimonials-subtitle']) : '';
$tagline = (!empty($service_finder_options['shortcode-testimonials-tagline'])) ? wp_kses_post($service_finder_options['shortcode-testimonials-tagline']) : '';
$titlecolor = (!empty($service_finder_options['shortcode-testimonials-title-color'])) ? esc_html($service_finder_options['shortcode-testimonials-title-color']) : '';
$subtitlecolor = (!empty($service_finder_options['shortcode-testimonials-subtitle-color'])) ? esc_html($service_finder_options['shortcode-testimonials-subtitle-color']) : '';
$taglinecolor = (!empty($service_finder_options['shortcode-testimonials-tagline-color'])) ? esc_html($service_finder_options['shortcode-testimonials-tagline-color']) : '';
$dividercolor = (!empty($service_finder_options['shortcode-testimonials-divider-color'])) ? esc_html($service_finder_options['shortcode-testimonials-divider-color']) : '';

$args = array(
	'post_type'=> 'sf_testimonials',
	'post_status' => 'publish',
	'orderby' => 'post_date',
	'order' => 'DESC',
);

$the_query = new WP_Query( $args );


if(service_finder_themestyle_for_plugin() == 'style-2'){
ob_start();
?>
<section class="section-full bg-gray sf-testimonials" style="background:url(<?php echo esc_url($imgurl) ?>) center <?php echo esc_attr($bgattachment) ?> no-repeat;">
    <div class="container">
    
        <div class="section-head text-center">
            <h2 style="color:<?php echo esc_attr($titlecolor); ?>"><?php echo esc_html($title); ?></h2>
            <?php echo service_finder_title_separator($dividercolor) ?>
            <div class="sf-tagile-outer" style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo wp_kses_post($tagline); ?></div>
        </div>
            
        <div class="section-content">
            <div class="section-content">
              <div class="owl-testimonials">
                <?php
				while ( $the_query->have_posts() ) : $the_query->the_post();
				$postid = get_the_id();
				if ( has_post_thumbnail() ) { 
				$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-related-provider' );
				$imgsrc = $imgsrc[0];
				}else{
				$imgsrc = '';
				}
				?>
                <div class="sf-testimonial-2 item" data-hash="zero">
                    <div class="testimonial-thum">
                    <a class="item-thum" href="javascript:;"><img src="<?php echo esc_url($imgsrc); ?>" alt=""></a>
                    </div>
                    <div class="sf-testimonial-text quote-right quote-left">
                        <?php echo apply_filters('the_content', get_the_content()); ?>
                    </div>
                    <div class="sf-testimonial-detail">
                        <strong class="testimonial-name"><?php echo get_post_meta($postid,'authorname',true); ?></strong>
                        <span class="testimonial-position"><?php echo get_post_meta($postid,'designation',true); ?></span>
                    </div>
                    
                </div>
				<?php
				endwhile;
				wp_reset_query();
				?>
              </div>
        </div>
        </div>
        
    </div>
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "></div>
</section>
<?php
$html = ob_get_clean();
}elseif(service_finder_themestyle_for_plugin() == 'style-3'){
ob_start();
?>
<section class="section-full sf-testimonials-wrap" <?php echo ($imgurl != '') ? 'style="background:url('.esc_url($imgurl).') center '.esc_attr($bgattachment).' no-repeat;"' : ''; ?>>
    <div class="container">
        <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="sf-testimonials-left">
                                <div class="sf-testimonials-title"><h2 style="color:<?php echo  esc_attr($titlecolor); ?>"><?php echo esc_html($title); ?></h2></div>
                                <div class="sf-testimonials-text"><div class="sf-tagile-outer" style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo wp_kses_post($tagline); ?></div></div>                                     
                                </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="owl-carousel testimonial-two">
                                <?php
                                while ( $the_query->have_posts() ) : $the_query->the_post();
								$postid = get_the_id();
								if ( has_post_thumbnail() ) { 
								$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-related-provider' );
								$imgsrc = $imgsrc[0];
								}else{
								$imgsrc = '';
								}
								?>
								<div class="item">
                                    <div class="testimonial-2">
                                        <div class="testimonial-text">
                                            <div class="testimonial-reviews"><?php echo get_the_title(); ?></div>
                                            <?php echo apply_filters('the_content', get_the_content()); ?>
                                        </div>
                                        <div class="testimonial-detail clearfix">
                                            <div class="testimonial-thum radius"><img src="<?php echo esc_url($imgsrc); ?>" width="100" height="100" alt=""></div>
                                            <strong class="testimonial-name"><?php echo get_post_meta($postid,'authorname',true); ?></strong>
                                            <span><?php echo get_post_meta($postid,'designation',true); ?></span>
                                        </div>
                                    </div>
                                </div>
								<?php
								endwhile;
								wp_reset_query();
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="sf-curve-topWrap"><div class="sf-curveTop sf-testimo-curveTop" style="background-color:<?php echo esc_attr($curveleftcolor); ?>"></div></div>
    <div class="sf-curve-botWrap"><div class="sf-curveBot sf-testimo-curveBot" style="background-color:<?php echo esc_attr($curverightcolor); ?>"></div></div>            
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "></div>
</section>
<?php
$html = ob_get_clean();
}elseif(service_finder_themestyle_for_plugin() == 'style-4'){
wp_enqueue_style('slick');
wp_enqueue_style('slick-theme');
wp_enqueue_script('slick');
ob_start();
?>
<div class="section-full p-t80 p-b50 sf-testmonials-wrap sf-curve-pos" <?php echo ($imgurl != '') ? 'style="background:url('.esc_url($imgurl).') center '.esc_attr($bgattachment).' no-repeat;"' : ''; ?>>
    <div class="container">
        <div class="section-head">
            <div class="row">
                <div class="col-md-6">
                    <span class="sf-sub-title" style="color:<?php echo  esc_attr($subtitlecolor); ?>"><?php echo esc_html($subtitle); ?></span>
                    <h2 class="sf-title" style="color:<?php echo  esc_attr($titlecolor); ?>"><?php echo esc_html($title); ?></h2>
                </div>
                <div class="col-md-6" style="color:<?php echo esc_attr($taglinecolor); ?>">
                    <?php echo wp_kses_post($tagline); ?>
                </div>
            </div>
        </div>
        

        <div class="section-content">
            <!--testimonial top-->
            <div class="slider-vertical-wrap">
                <!-- THUMBNAILS -->
                <div class="slick-testimonials-thumbnails">

                    <?php
					while ( $the_query->have_posts() ) : $the_query->the_post();
					$postid = get_the_id();
					if ( has_post_thumbnail() ) { 
					$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-related-provider' );
					$imgsrc = $imgsrc[0];
					}else{
					$imgsrc = '';
					}
					?>
					<div class="slick-item">
                        <div class="sf-testimonial-user">
                            <div class="sf-testimonial-media"><img src="<?php echo esc_url($imgsrc); ?>"></div>
                            <div class="sf-testimonial-user-detail">
                                <div class="sf-testi-user-name"><?php echo get_post_meta($postid,'authorname',true); ?></div>
                                <div class="sf-testi-user-position"><?php echo get_post_meta($postid,'designation',true); ?></div>
                            </div>

                        </div>
                    </div>
					<?php
					endwhile;
					wp_reset_query();
					?>
                </div>                            
                <!-- MAIN SLIDES -->
                <div class="slick-testimonials-content">
                    <?php
					while ( $the_query->have_posts() ) : $the_query->the_post();
					$postid = get_the_id();
					if ( has_post_thumbnail() ) { 
					$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-related-provider' );
					$imgsrc = $imgsrc[0];
					}else{
					$imgsrc = '';
					}
					
					$rating = get_post_meta($postid,'rating',true);
					?>
                    <div class="slick-item">
                      <div class="sf-testimonial-info text-center">
                        <div class="sf-testimonial-title"><?php echo get_the_title(); ?></div>
                        <?php
                        if($rating != ''){
							switch($rating){
								case 1:
									echo ' <div class="sf-ow-pro-rating">
												<span class="fa fa-star"></span>
												<span class="fa fa-star text-gray"></span>
												<span class="fa fa-star text-gray"></span>
												<span class="fa fa-star text-gray"></span>
												<span class="fa fa-star text-gray"></span>
											</div>';
									break;
								case 2:
									echo ' <div class="sf-ow-pro-rating">
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star text-gray"></span>
												<span class="fa fa-star text-gray"></span>
												<span class="fa fa-star text-gray"></span>
											</div>';
									break;
								case 3:
									echo ' <div class="sf-ow-pro-rating">
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star text-gray"></span>
												<span class="fa fa-star text-gray"></span>
											</div>';
									break;
								case 4:
									echo ' <div class="sf-ow-pro-rating">
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star text-gray"></span>
											</div>';
									break;
								case 5:
									echo ' <div class="sf-ow-pro-rating">
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
											</div>';
									break;						
							}
						}else{
							echo ' <div class="sf-ow-pro-rating">
										<span class="fa fa-star text-gray"></span>
										<span class="fa fa-star text-gray"></span>
										<span class="fa fa-star text-gray"></span>
										<span class="fa fa-star text-gray"></span>
										<span class="fa fa-star text-gray"></span>
									</div>';
						}
						?>
                        <?php echo apply_filters('the_content', get_the_content()); ?>
                        <div class="sf-testimonial-quote"><i class="fa fa-quote-left"></i></div>
                        </div>
                    </div>
					<?php
					endwhile;
					wp_reset_query();
					?>
                </div>
            </div>
        </div>

    </div>
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "></div>
</div>
<?php
$html = ob_get_clean();
}else{
ob_start();
?>
<section class="section-full bg-gray sf-testimonials" style="background:url(<?php echo esc_url($imgurl) ?>) center <?php echo esc_attr($bgattachment) ?> no-repeat;">
  <div class="container">
    <div class="section-head text-center ">
      <h2 style="color:<?php echo esc_attr($titlecolor); ?>"><?php echo esc_html($title); ?></h2>
	  <?php echo service_finder_title_separator($dividercolor); ?>
      <div class="sf-tagile-outer" style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo wp_kses_post($tagline); ?></div>
    </div>
    <div class="section-content">
      <div class="section-content">
        <div class="owl-carousel">
        <?php
		while ( $the_query->have_posts() ) : $the_query->the_post();
		$postid = get_the_id();
		if ( has_post_thumbnail() ) { 
		$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-related-provider' );
		$imgsrc = $imgsrc[0];
		}else{
		$imgsrc = '';
		}
		?>
        <div class="testimonial-bx item">
          <div class="testimonial-pic"><img src="<?php echo esc_url($imgsrc); ?>" width="100" height="100" alt=""></div>
          <div class="testimonial-text">
            <?php echo apply_filters('the_content', get_the_content()); ?>
            <div class="testimonial-detail"><strong><?php echo get_post_meta($postid,'authorname',true); ?></strong><span><?php echo get_post_meta($postid,'designation',true); ?></span></div>
          </div>
        </div>
		<?php
		endwhile;
		wp_reset_query();
		?>
        </div>
      </div>
    </div>
  </div>
  <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> ">
</section>
<?php
$html = ob_get_clean();
}
?>
<!-- Testimonials Outer Template-->
