<?php global $post,$service_finder_options; ?>
<?php 
if(get_option('timezone_string') != ""){
date_default_timezone_set(get_option('timezone_string'));
}

$colclass = (is_home() || is_front_page()) ? 'col-md-4' : 'col-md-6';

$jobview = service_finder_get_data($service_finder_options,'job-listing-style');

if($jobview == 'list'){
?>
<li <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>"> 
<a class="job-clickable-box" href="<?php the_job_permalink(); ?>"></a>
<div class="job-comapny-logo"><?php the_company_logo(); ?></div>
<div class="job-comapny-info">
  <div class="position">
    <h3><?php the_title(); ?></h3>
    <div class="company"> <?php the_company_name( '<strong>', '</strong> ' ); ?> </div>
  </div>
    
  <ul class="meta">
  	<?php do_action( 'job_listing_meta_start' ); ?>
    			
	<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
        <?php $types = wpjm_get_the_job_types(); ?>
        <?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>
            <li class="job-type <?php echo esc_attr( sanitize_title( $type->slug ) ); ?>" itemprop="employmentType"><i class="fa fa-circle"></i><?php echo esc_html( $type->name ); ?></li>
        <?php endforeach; endif; ?>
    <?php } ?>
    <li class="date">
      <date><?php printf( __( '%s ago', 'service-finder' ), human_time_diff( get_post_time( 'U' ), current_time('timestamp') ) ); ?></date>
    </li>
    <?php do_action( 'job_listing_meta_end' ); ?>
  </ul>
    
  <div class="job-location"><i class="fa fa-map-marker"></i> <?php the_job_location( false ); ?> </div>
  <div class="job-amount"><i class="fa fa-money"></i> <span>
 	 <?php
	 $cost = get_post_meta( $post->ID, '_job_cost', true );
	 echo service_finder_money_format( $cost );
	?>
  </span> </div>
  
  <div class="job-label"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/label.png'); ?>" alt=""></div>
  
</div>
</li>
<?php
}else{
?>
<div class="<?php echo sanitize_html_class($colclass); ?>" data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">
    <div class="sf-jobs-section">

        <div class="sf-jobs-head">
            <a href="<?php the_job_permalink(); ?>" class="sf-jobs-media"><?php the_company_logo(); ?></a>
            <span class="sf-jobs-position">
             <?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
					<?php $types = wpjm_get_the_job_types(); ?>
                    <?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>
                        <?php echo esc_html( $type->name ); ?>
                    <?php endforeach; endif; ?>
                <?php } ?>
            </span>
        </div>

        <div class="sf-jobs-info">
            <?php the_company_name( '<div class="sf-job-company">', '</div> ' ); ?>
            <h4 class="sf-title"><a href="<?php the_job_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p><?php echo get_the_excerpt();?></p> 
        </div>

        <div class="sf-jobs-footer">
            <div class="sf-job-location"><i class="fa fa-map-marker"></i><?php the_job_location( false ); ?></div>
            <div class="sf-jobs-cost">
            <span>
            <?php
			 $cost = get_post_meta( $post->ID, '_job_cost', true );
			 echo service_finder_money_format( $cost );
			?>
            </span>
            </div>
        </div>

    </div>
</div>
<?php
}
