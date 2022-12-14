<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/

$service_finder_options = get_option('service_finder_options');
$wpdb = service_finder_shortcode_global_vars('wpdb');

$imgurl = (!empty($service_finder_options['latest-blogs-bg-image']['url'])) ? $service_finder_options['latest-blogs-bg-image']['url'] : '';
$bgattachment = (isset($service_finder_options['latest-blogs-background-attachment'])) ? esc_html($service_finder_options['latest-blogs-background-attachment']) : '';
$bgcolor = (!empty($service_finder_options['latest-blogs-bg-color'])) ? $service_finder_options['latest-blogs-bg-color'] : '';
$bgopacity = (!empty($service_finder_options['latest-blogs-bg-opacity'])) ? $service_finder_options['latest-blogs-bg-opacity'] : '';
$bgopacity = ($bgopacity > 0) ? $bgopacity : ''; 
$curveleftcolor = (!empty($service_finder_options['latest-blogs-left-curve-color'])) ? $service_finder_options['latest-blogs-left-curve-color'] : '';
$curverightcolor = (!empty($service_finder_options['latest-blogs-right-curve-color'])) ? $service_finder_options['latest-blogs-right-curve-color'] : '';

$title = (!empty($service_finder_options['shortcode-blogs-title'])) ? esc_html($service_finder_options['shortcode-blogs-title']) : '';
$subtitle = (!empty($service_finder_options['shortcode-blogs-subtitle'])) ? esc_html($service_finder_options['shortcode-blogs-subtitle']) : '';
$tagline = (!empty($service_finder_options['shortcode-blogs-tagline'])) ? wp_kses_post($service_finder_options['shortcode-blogs-tagline']) : '';
$titlecolor = (!empty($service_finder_options['shortcode-blogs-title-color'])) ? esc_html($service_finder_options['shortcode-blogs-title-color']) : '';
$subtitlecolor = (!empty($service_finder_options['shortcode-blogs-subtitle-color'])) ? esc_html($service_finder_options['shortcode-blogs-subtitle-color']) : '';
$taglinecolor = (!empty($service_finder_options['shortcode-blogs-tagline-color'])) ? esc_html($service_finder_options['shortcode-blogs-tagline-color']) : '';
$dividercolor = (!empty($service_finder_options['shortcode-blogs-divider-color'])) ? esc_html($service_finder_options['shortcode-blogs-divider-color']) : '';
$showitem = (!empty($service_finder_options['shortcode-blogs-limit'])) ? esc_html($service_finder_options['shortcode-blogs-limit']) : 3;
?>
<!-- Latest blog post -->
<?php
$postinner = '';

if(service_finder_themestyle_for_plugin() == 'style-2'){
$slideritem = 3;
}else{
$slideritem = 2;
}

wp_add_inline_script( 'service_finder-js-custom', 'var showblogitem = "'.$slideritem.'";', 'before' );

$args = array(

	'post_type'=> 'post',

	'post_status' => 'publish',

	'orderby' => 'post_date',
	
	'order' => 'DESC',

	'posts_per_page'  => $showitem,

);

$the_query = new WP_Query( $args );
while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php
if ( has_post_thumbnail() ) { 
if(service_finder_themestyle_for_plugin() == 'style-4'){
$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-no-sidebar' );
}else{
$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-home-page' );
}

$imgsrc = $imgsrc[0];
}else{
$imgsrc = '';
}

if($imgsrc != ""){
if(service_finder_themestyle_for_plugin() == 'style-2'){
$imgtag = '<a href="'.esc_url(get_the_permalink()).'"><img src="'.esc_url($imgsrc).'" alt=""><div class="sf-overlay-box"></div></a>';
}else{
$imgtag = '<img src="'.esc_url($imgsrc).'" alt="">';
}
$class = '';
}else{
$imgtag = '';
$class = 'sf-no-img-blog';
}
$posttags = get_the_tags(get_the_id());
$tagname = '';
if ($posttags) {
  foreach($posttags as $tag) {
    $tagname .= '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>' . ' '; 
  }
}
?>
<?php
if(service_finder_themestyle_for_plugin() == 'style-2'){
$postinner .= '<div class="blog-post '.sanitize_html_class($class).' equal-height-bx">
                              <div class="post-bx sf-latest-news">
                              
                                <div class="post-thum">
                                    '.$imgtag.'
                                </div>
                                
                                <div class="post-info">
                                    
                                    <div class="post-text">
                                        <h4 class="post-title"><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></h4>
                                        <div class="post-meta">
                                            <ul>
                                                <li class="post-author"><i class="fa fa-user"></i>'.esc_html__('By', 'service-finder').' '.get_the_author_posts_link().'</li>
                                                <li class="post-comment"><i class="fa fa-comments"></i><a href="'.esc_url(get_comments_link()).'">'.get_comments_number( get_the_id() ).' '.esc_html__('Comments','service-finder').'</a></li>
                                            </ul>
                                        </div>
                                        <p>'.service_finder_getExcerpts(get_the_excerpt(),0,75).'</p> 
                                    </div>
                                    
                                </div>
                                
                              </div>
                            </div>';
}elseif(service_finder_themestyle_for_plugin() == 'style-3'){
ob_start();
?>
<div class="col-md-4 col-sm-4">
    <div class="blog-post">
      <div class="post-bx sf-latest-news2">
      
        <div class="post-thum">
            <?php echo wp_kses_post($imgtag); ?>
            <div class="sf-overlay-box"></div>
        </div>
        
        <div class="post-info">
            
            <div class="post-text">
                <h4 class="post-title"><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo get_the_title(); ?></a></h4>
                <div class="post-meta">
                    <ul>
                        <li class="post-author"><?php echo esc_html__('Posted By', 'service-finder'); ?> : <?php echo get_the_author_posts_link(); ?></li>
                    </ul>
                </div>
                <p><?php echo service_finder_getExcerpts(get_the_excerpt(),0,75); ?></p> 
            </div>
            
        </div>
        
      </div>
    </div>
</div>
<?php
$postinner .= ob_get_clean();
}elseif(service_finder_themestyle_for_plugin() == 'style-4'){
ob_start();
?>
<div class="col-md-4">
    <div class="sf-blog-section-1">

        <div class="sf-post-media">
            <a href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo wp_kses_post($imgtag); ?></a>
        </div>

        <div class="sf-post-meta">
            <ul>
                <li class="sf-post-category"><?php the_category(', '); ?></li>
                <li class="sf-post-author"><a href="javascript:void(0);"><?php echo esc_html__('By', 'service-finder'); ?> |<span><?php echo get_the_author_posts_link(); ?></span></a> </li>
            </ul>
        </div>

        <div class="sf-post-info">
            <h4 class="sf-post-title"><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo get_the_title(); ?></a></h4>
            <div class="wt-post-text">
                <p><?php echo service_finder_getExcerpts(get_the_excerpt(),0,75); ?></p> 
            </div>
        </div>

    </div>
</div>
<?php
$postinner .= ob_get_clean();
}else{
$postinner .= '<div class="blog-post '.sanitize_html_class($class).' equal-height-bx">
<div class="post-bx">
  <div class="post-thum img-effect2">
	'.$imgtag.'
	<div class="post-date"> <strong><a href="'.esc_url(get_the_permalink()).'">'.date('d',strtotime(get_the_date())).'</a></strong> <span>'.service_finder_translate_monthname(date('n',strtotime(get_the_date()))).'</span> </div>
  </div>
  <div class="post-info">
	<div class="post-text">
	  <h4 class="post-title">
	   <a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a>
	  </h4>
	  <div class="post-meta">
		<ul>
		  <li class="post-author"><i class="fa fa-user"></i>
			'.esc_html__('By', 'service-finder').'
		   '.get_the_author_posts_link().'
		  </li>
		  <li class="post-comment"><i class="fa fa-comments"></i>
		  <a href="'.esc_url(get_comments_link()).'">'.get_comments_number( get_the_id() ).' '.esc_html__('Comments','service-finder').'</a>
		  </li>
		  <li class="post-tags"><i class="fa fa-tags"></i>
			'.$tagname.'
		  </li>
		</ul>
	  </div>
	  <p>'.get_the_excerpt().'</p>
	  <a href="'.esc_url(get_the_permalink()).'" class="read-more">
	  '.esc_html__('Read More', 'service-finder').'
	  </a> </div>
  </div>
</div>
</div>';
}
?>                                        
<?php 
endwhile; 
wp_reset_query();
?>
<!-- Latest blog post -->

<?php
if(service_finder_themestyle_for_plugin() == 'style-2'){
$html = '<section class="section-full latest-blog" style="background-image:url('.esc_url($imgurl).');background-attachment: '.$bgattachment.'">
            <div class="container">
            
            
            	<div class="section-head text-center">
                    <h2 style="color:'.$titlecolor.'">'.esc_html($title).'</h2>
					'.service_finder_title_separator($dividercolor).'
					<div class="sf-tagile-outer" style="color:'.esc_attr($taglinecolor).'">'.wp_kses_post($tagline).'</div>
                </div>
                    
                <div class="section-content">
                    <div class="owl-blogs">';
                        
                        $html .= $postinner;
                        
                    $html .= '</div>
                </div>
                
            </div>
			<div class="sf-overlay-main" style="opacity:'.$bgopacity.'; background-color:'.$bgcolor.'">
        </section>';
}elseif(service_finder_themestyle_for_plugin() == 'style-3'){
ob_start();
?>
<section class="section-full sf-latestBlog-wrap latest-blog" <?php echo ($imgurl != '') ? 'style="background:url('.esc_url($imgurl).') center '.esc_attr($bgattachment).' no-repeat;"' : ''; ?>>
    <div class="container">
    
        <div class="section-head text-center">
            <h2 class="text-white" style="color:<?php echo  esc_attr($titlecolor); ?>"><?php echo esc_html($title); ?></h2>
            <?php echo service_finder_title_separator($dividercolor); ?>
            <div class="sf-tagile-outer" style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo wp_kses_post($tagline); ?></div>
        </div>
            
        <div class="section-content">
            <div class="row">
                
                <?php
                echo wp_kses_post($postinner); 
				?>
                
            </div>
        </div>
        
    </div>
    <div class="sf-curve-topWrap"><div class="sf-curveTop sf-latestBlog-curveTop" style="background-color:<?php echo esc_attr($curveleftcolor); ?>"></div></div>
    <div class="sf-curve-botWrap"><div class="sf-curveBot sf-latestBlog-curveBot" style="background-color:<?php echo esc_attr($curverightcolor); ?>"></div></div>            
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "></div>           
</section>
<?php
$html = ob_get_clean();
}elseif(service_finder_themestyle_for_plugin() == 'style-4'){
ob_start();
?>
<div class="section-full p-t80 p-b50 sf-news-section-wrap sf-curve-pos" <?php echo ($imgurl != '') ? 'style="background:url('.esc_url($imgurl).') center '.esc_attr($bgattachment).' no-repeat;"' : ''; ?>>
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
            <div class="row">

                <?php
                echo wp_kses_post($postinner); 
				?>

            </div>
        </div>

    </div>
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "></div>
</div>
<?php
$html = ob_get_clean();
}else{
$html = '<section class="section-full bg-white latest-blog" style="background-image:url('.esc_url($imgurl).');background-attachment: '.$bgattachment.'">
<div class="container">
<div class="section-head text-center">
<h2 style="color:'.$titlecolor.'">'.esc_html($title).'</h2>
'.service_finder_title_separator($dividercolor).'
<div class="sf-tagile-outer" style="color:'.esc_attr($taglinecolor).'">'.wp_kses_post($tagline).'</div>
</div>
<div class="section-content">
<div class="row equal-bx-outer"><div class="owl-blogs">';

$html .= $postinner;

$html .= '</div></div>
</div>
</div>
<div class="sf-overlay-main" style="opacity:'.$bgopacity.'; background-color:'.$bgcolor.'">
</section>';	  
}
?>
