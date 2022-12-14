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
<!-- sf categories  -->
<?php 
$service_finder_options = get_option('service_finder_options');
$wpdb = service_finder_shortcode_global_vars('wpdb');

$imgurl = (!empty($service_finder_options['category-bg-image']['url'])) ? $service_finder_options['category-bg-image']['url'] : '';
$bgattachment = (isset($service_finder_options['category-background-attachment'])) ? esc_html($service_finder_options['category-background-attachment']) : '';
$bgcolor = (!empty($service_finder_options['category-bg-color'])) ? $service_finder_options['category-bg-color'] : '';
$bgopacity = (!empty($service_finder_options['category-bg-opacity'])) ? $service_finder_options['category-bg-opacity'] : '';
$bgopacity = ($bgopacity > 0) ? $bgopacity : ''; 
$curveleftcolor = (!empty($service_finder_options['category-left-curve-color'])) ? $service_finder_options['category-left-curve-color'] : '';
$curverightcolor = (!empty($service_finder_options['category-right-curve-color'])) ? $service_finder_options['category-right-curve-color'] : '';


$title = (!empty($service_finder_options['shortcode-categories-subtitle'])) ? esc_html($service_finder_options['shortcode-categories-subtitle']) : '';
$subtitle = (!empty($service_finder_options['shortcode-categories-title'])) ? esc_html($service_finder_options['shortcode-categories-title']) : '';
$tagline = (!empty($service_finder_options['shortcode-categories-tagline'])) ? wp_kses_post($service_finder_options['shortcode-categories-tagline']) : '';
$titlecolor = (!empty($service_finder_options['shortcode-categories-title-color'])) ? esc_html($service_finder_options['shortcode-categories-title-color']) : '';
$subtitlecolor = (!empty($service_finder_options['shortcode-categories-subtitle-color'])) ? esc_html($service_finder_options['shortcode-categories-subtitle-color']) : '';
$taglinecolor = (!empty($service_finder_options['shortcode-categories-tagline-color'])) ? esc_html($service_finder_options['shortcode-categories-tagline-color']) : '';
$dividercolor = (!empty($service_finder_options['shortcode-categories-divider-color'])) ? esc_html($service_finder_options['shortcode-categories-divider-color']) : '';
$limit = (!empty($service_finder_options['shortcode-categories-limit'])) ? esc_html($service_finder_options['shortcode-categories-limit']) : 6;
$subcategories = (isset($service_finder_options['shortcode-subcategories'])) ? esc_html($service_finder_options['shortcode-subcategories']) : '';
$categoriesshowmore = (isset($service_finder_options['shortcode-categories-showmore'])) ? esc_html($service_finder_options['shortcode-categories-showmore']) : 'yes';
$categoriesdescription = (isset($service_finder_options['shortcode-categories-description'])) ? $service_finder_options['shortcode-categories-description'] : 'yes';
?>
<?php
if(service_finder_themestyle_for_plugin() == 'style-2'){
$html = '<section class="section-full text-center bg-gray" style="background:url('.esc_url($imgurl).') center '.$bgattachment.' no-repeat;">
            <div class="container">
            
            	<div class="section-head">
                    <h2 style="color:'.$titlecolor.'">'.esc_html($title).'</h2>
					'.service_finder_title_separator($dividercolor).'
					<div class="sf-tagile-outer" style="color:'.esc_attr($taglinecolor).'">'.wp_kses_post($tagline).'</div>
                </div>
                    
                <div class="section-content">
    <div class="row">
        <div id="masonry" class="catlist sf-catlist-new">';
        
            if(class_exists('service_finder_texonomy_plugin')){
				
				$offset=0; //define offset
				$i=0; //start line counter


                $categories = (!empty($service_finder_options['homepage-categories'])) ? $service_finder_options['homepage-categories'] : array();
				
				
                if(!empty($categories)){
					$totalcat = count($categories);
                    foreach($categories as $category){
						$catdetails = get_term_by('id', $category, 'providers-category');
						if(!empty($catdetails)){
						
						if ($i++ < $offset) continue;
					    if ($i > $offset + $limit) break;
						
                        $catimage =  service_finder_getCategoryImage($catdetails->term_id,'service_finder-category-home');
						if($catimage != ""){
						$class = '';
						$catimgtag = '<img src="'.esc_url($catimage).'" width="600" height="350" alt="'.esc_attr($catdetails->name).'">';
						}else{
						$class = 'sf-cate-no-img';
						$catimgtag = '';
						}
						
						$provider_category_hightlight = get_term_meta( $catdetails->term_id, 'provider_category_hightlight', true );
						
						$hightlight = ($provider_category_hightlight == 'yes') ? 'high-light' : '';

        $html .= '<div class="card-container col-md-4 col-sm-4 col-xs-6">
              <div class="sf-categories-girds '.sanitize_html_class($hightlight).' '.sanitize_html_class($class).'">
                    <div class="sf-categories-thum" style="background-image:url('.esc_url($catimage).')"></div>
                    <div class="sf-overlay-box"></div>
                    <div class="sf-categories-content text-center">
                        <span  class="sf-categories-quantity"><i class="fa fa-user-plus"></i> '.service_finder_getTotalProvidersByCategory( $catdetails->term_id ).'</span>
                        <div  class="sf-categories-title">'.esc_html($catdetails->name).'</div>
						<a href="'.esc_url(get_term_link( $catdetails )).'" class="sf-category-link"></a>
                    </div>
              </div>
            </div>';
		}
                    }
					$html .= '</div>';
					?>
        <?php if($totalcat > $limit && $categoriesshowmore == 'yes'){ 
		if(!empty($catdetails)){
        $html .= '<div class="show_more_main" id="show_more_main'.esc_attr($limit).'"> <span id="'.esc_attr($catdetails->term_id).'" data-catarr="yes" data-offset="'.esc_attr($limit).'" class="show_more btn btn-primary" title="Load more categories"><i class="fa fa-refresh"></i> '.esc_html__('Show more','service-finder').'</span> <span class="loding default-hidden"><span class="loding_txt btn btn-default"><i class="fa fa-refresh fa-spin"></i></span></span> </div>';
		}
					}
					
                }else{
					if($subcategories == 'yes'){
					$subcategory = true;
					}else{
					$subcategory = false;
					}
					
					$allcat = service_finder_getCategoryList(0,$subcategory);
					$totalcat = count($allcat);
					
					$offset = 0;
					$categories = service_finder_getCategoryListwithOffest($limit,$subcategory,$offset);
					if(!empty($categories)){
	
						foreach($categories as $category){
	
							$catimage =  service_finder_getCategoryImage($category->term_id,'service_finder-category-home');
							
							if($catimage != ""){
							$class = '';
							$catimgtag = '<img src="'.esc_url($catimage).'" width="600" height="350" alt="'.esc_attr($category->name).'">';
							}else{
							$class = 'sf-cate-no-img';
							$catimgtag = '';
							}
							
							$provider_category_hightlight = get_term_meta( $category->term_id, 'provider_category_hightlight', true );
							
							$hightlight = ($provider_category_hightlight == 'yes') ? 'high-light' : '';
        $html .= '<div class="card-container col-md-4 col-sm-4 col-xs-6">
              <div class="sf-categories-girds '.sanitize_html_class($hightlight).' '.sanitize_html_class($class).'">
                    <div class="sf-categories-thum" style="background-image:url('.esc_url($catimage).')"></div>
                    <div class="sf-overlay-box"></div>
                    <div class="sf-categories-content text-center">
                        <span  class="sf-categories-quantity"><i class="fa fa-user-plus"></i> '.service_finder_getTotalProvidersByCategory( $category->term_id ).'</span>
                        <div  class="sf-categories-title">'.esc_html($category->name).'</div>
                    </div>
					<a href="'.esc_url(get_term_link( $category )).'" class="sf-category-link"></a>
              </div>
            </div>';
						}
		$html .= '</div>';				
						?>
         
		<?php if($totalcat > $limit && $categoriesshowmore == 'yes'){
        $html .= '<div class="show_more_main" id="show_more_main'.esc_attr($limit).'"> <span id="'.esc_attr($category->term_id).'" data-subcat="'.esc_attr($subcategory).'" data-offset="'.esc_attr($limit).'" class="show_more btn btn-primary" title="Load more categories"><i class="fa fa-refresh"></i> '.esc_html__('Show more','service-finder') .'</span> <span class="loding default-hidden"><span class="loding_txt btn btn-default"><i class="fa fa-refresh fa-spin"></i></span></span> </div>';
						}
	
					}
				}
				}
            
        $html .= '</div>
</div>
                
            </div>
			<div class="sf-overlay-main" style="opacity:'.$bgopacity.'; background-color:'.$bgcolor.'"></div>
        </section>';
}elseif(service_finder_themestyle_for_plugin() == 'style-3'){
global $salon_options;
ob_start();
?>
<section class="section-full bg-gray sf-cateoriess-wrap" <?php echo ($imgurl != '') ? 'style="background:url('.esc_url($imgurl).') center '.esc_attr($bgattachment).' no-repeat;"' : ''; ?>>
    <div class="sf-cateoriess-half-bg"></div>
    <div class="container"> 
        <div class="section-head text-center">
            <h2 class="text-white" style="color:<?php echo  esc_attr($titlecolor); ?>"><?php echo esc_html($title); ?></h2>
            <?php echo service_finder_title_separator($dividercolor); ?>
            <div class="sf-tagile-outer" style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo wp_kses_post($tagline); ?></div>
        </div>
            
        <div class="section-content">
            <div class="row">
            
                <div class="categories-box-slider">
                
                    <?php
                    $categories = (!empty($service_finder_options['homepage-categories'])) ? $service_finder_options['homepage-categories'] : array();
				
	                if(!empty($categories)){
					$totalcat = count($categories);
                    foreach($categories as $category){
						$catdetails = get_term_by('id', $category, 'providers-category');
						if(!empty($catdetails)){
						
                        $catimage =  service_finder_getCategoryImage($catdetails->term_id,'service_finder-category-home');
						
						$provider_category_hightlight = get_term_meta( $catdetails->term_id, 'provider_category_hightlight', true );
						
						$hightlight = ($provider_category_hightlight == 'yes') ? 'high-light' : '';
						
						?>
						<div class="item">
                            <div class="sf-categoriesBox <?php echo ($catimage != "") ? '' : 'sf-cate-no-img'; ?>">
                                <?php
                                if($catimage != ""){
								?>
                                <div class="sf-categoriesBox-pic"><img src="<?php echo esc_url($catimage); ?>" width="600" height="350" alt="<?php echo esc_attr($catdetails->name) ?>"></div>
                                <?php
                                }
								?>
                                <div class="sf-categoriesBox-info">
                                    <h4 class="sf-categoriesBox-title"><?php echo esc_html($catdetails->name); ?></h4>
                                    <?php
									if($categoriesdescription == 'yes'){
									?>
                                    <div class="sf-categoriesBox-text"><?php echo service_finder_getExcerpts(apply_filters('the_content', $catdetails->description),0,50); ?></div>
                                    <?php
                                    }
									?>
                                </div>
                            </div>
                            <a href="<?php echo esc_url(get_term_link( $catdetails )) ?>" class="sf-category-link"></a>
                        </div>
						<?php
					}
                    }
						
               		}else{
						if($subcategories == 'yes'){
						$subcategory = true;
						}else{
						$subcategory = false;
						}
						
						$allcat = service_finder_getCategoryList(0,$subcategory);
						$totalcat = count($allcat);
						
						$offset = 0;
						$categories = service_finder_getCategoryListwithOffest($limit,$subcategory,$offset);
						if(!empty($categories)){
		
							foreach($categories as $category){
		
								$catimage =  service_finder_getCategoryImage($category->term_id,'service_finder-category-home');
								
								if($catimage == '')
								{
								
								}
								
								?>
                                <div class="item">
                                    <div class="sf-categoriesBox <?php echo ($catimage != "") ? '' : 'sf-cate-no-img'; ?>">
                                        <?php
                                        if($catimage != ""){
                                        ?>
                                        <div class="sf-categoriesBox-pic"><img src="<?php echo esc_url($catimage); ?>" width="600" height="350" alt="<?php echo esc_attr($category->name) ?>"></div>
                                        <?php
                                        }
                                        ?>
                                        <div class="sf-categoriesBox-info">
                                            <h4 class="sf-categoriesBox-title"><?php echo esc_html($category->name); ?></h4>
                                            <?php
											if($categoriesdescription == 'yes'){
											?>
                                            <div class="sf-categoriesBox-text"><?php echo service_finder_getExcerpts(apply_filters('the_content', $category->description),0,50); ?></div>
                                            <?php
                                            }
											?>
                                        </div>
                                    </div>
                                    <a href="<?php echo esc_url(get_term_link( $category )) ?>" class="sf-category-link"></a>
                                </div>
                                <?php
							}
            			}
					}
					?>
                </div>
            
            </div>
        </div>
            
    </div>
    <div class="sf-curve-topWrap"><div class="sf-curveTop sf-cateori-curveTop" style="background-color:<?php echo esc_attr($curveleftcolor); ?>"></div></div>
    <div class="sf-curve-botWrap"><div class="sf-curveBot sf-cateori-curveBot" style="background-color:<?php echo esc_attr($curverightcolor); ?>"></div></div>            
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "></div> 
</section>
<?php
$html = ob_get_clean();
}elseif(service_finder_themestyle_for_plugin() == 'style-4'){
global $salon_options;
ob_start();
?>
<section class="section-full bg-white sf-categores-four-wrap sf-curve-pos" <?php echo ($imgurl != '') ? 'style="background:url('.esc_url($imgurl).') center '.esc_attr($bgattachment).' no-repeat;"' : ''; ?>>
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
                <?php
				$categoriesstyle = service_finder_get_data($service_finder_options,'shortcode-categories-style');
				if($categoriesstyle == 'slider'){
				$categories = (!empty($service_finder_options['homepage-categories'])) ? $service_finder_options['homepage-categories'] : array();
				if(!empty($categories)){
					$totalcat = count($categories);
					if($totalcat > 5){
					echo '<div class="owl-carousel sf-radius-img-carousel sf-owl-arrow">';
					}else{
					echo '<div class="row sf-home-categories">';
					}
					foreach($categories as $category){
						$catdetails = get_term_by('id', $category, 'providers-category');
						if(!empty($catdetails)){
						
						$catimage =  service_finder_getCategoryImage($catdetails->term_id,'service_finder-provider-medium');
						
						$provider_category_hightlight = get_term_meta( $catdetails->term_id, 'provider_category_hightlight', true );
						
						$hightlight = ($provider_category_hightlight == 'yes') ? 'high-light' : '';
						if($totalcat > 5){ 
						$categoryclass = 'item';
						}else{
						$categoryclass = 'col-md-five';	
						}
						?>
						<div class="<?php echo sanitize_html_class($categoryclass); ?>">
							<div class="sf-ow-img">
								<a href="<?php echo esc_url(get_term_link( $catdetails )) ?>"><img src="<?php echo esc_url($catimage); ?>" alt=""></a>
								<h4 class="sf-ow-title"><?php echo esc_html($catdetails->name); ?></h4>
							</div>
						</div>
						<?php
					}
					}
					echo '</div>';
					
				}else{
					if($subcategories == 'yes'){
					$subcategory = true;
					}else{
					$subcategory = false;
					}
					
					$allcat = service_finder_getCategoryList(0,$subcategory);
					$totalcat = count($allcat);
					
					$offset = 0;
					$categories = service_finder_getCategoryListwithOffest($limit,$subcategory,$offset);
					if(!empty($categories)){
						$totalcat = count($categories);
						if($totalcat > 5){
						echo '<div class="owl-carousel sf-radius-img-carousel sf-owl-arrow">';
						}else{
						echo '<div class="row sf-home-categories">';
						}
						foreach($categories as $category){
	
							$catimage =  service_finder_getCategoryImage($category->term_id,'service_finder-provider-medium');
							if($totalcat > 5){ 
							$categoryclass = 'item';
							}else{
							$categoryclass = 'col-md-five';	
							}
							?>
                            <div class="<?php echo sanitize_html_class($categoryclass); ?>">
                                <div class="sf-ow-img">
                                    <a href="<?php echo esc_url(get_term_link( $category )) ?>"><img src="<?php echo esc_url($catimage); ?>" alt=""></a>
                                    <h4 class="sf-ow-title"><?php echo esc_html($category->name); ?></h4>
                                </div>
                            </div>
							<?php
						}
						echo '</div>';
					}
				}
				}else{
				
				$offset=0; //define offset
				$i=0; //start line counter
				
				$categories = (!empty($service_finder_options['homepage-categories'])) ? $service_finder_options['homepage-categories'] : array();
				if(!empty($categories)){
					$totalcat = count($categories);
					echo '<div class="row sf-home-categories catlist">';
					foreach($categories as $category){
						$catdetails = get_term_by('id', $category, 'providers-category');
						if(!empty($catdetails)){
						
						if ($i++ < $offset) continue;
					    if ($i > $offset + $limit) break;
						
						$catimage =  service_finder_getCategoryImage($catdetails->term_id,'service_finder-provider-medium');
						
						$provider_category_hightlight = get_term_meta( $catdetails->term_id, 'provider_category_hightlight', true );
						
						$hightlight = ($provider_category_hightlight == 'yes') ? 'high-light' : '';
						?>
						<div class="col-md-five">
							<div class="sf-ow-img">
								<a href="<?php echo esc_url(get_term_link( $catdetails )) ?>"><img src="<?php echo esc_url($catimage); ?>" alt=""></a>
								<h4 class="sf-ow-title"><?php echo esc_html($catdetails->name); ?></h4>
							</div>
						</div>
						<?php
					}
					}
					echo '</div>';
					
					if($totalcat > $limit){ 
						if(!empty($catdetails)){
						echo '<div class="show_more_main" id="show_more_main'.esc_attr($limit).'"> <span id="'.esc_attr($catdetails->term_id).'" data-catarr="yes" data-offset="'.esc_attr($limit).'" class="show_more2 btn btn-primary" title="Load more categories"><i class="fa fa-refresh"></i> '.esc_html__('Show more','service-finder').'</span> <span class="loding default-hidden"><span class="loding_txt btn btn-default"><i class="fa fa-refresh fa-spin"></i></span></span> </div>';
						}
					}
					
				}else{
					if($subcategories == 'yes'){
					$subcategory = true;
					}else{
					$subcategory = false;
					}
					
					$allcat = service_finder_getCategoryList(0,$subcategory);
					$totalcat = count($allcat);
					
					$offset = 0;
					$categories = service_finder_getCategoryListwithOffest($limit,$subcategory,$offset);
					if(!empty($categories)){
						echo '<div class="row sf-home-categories catlist">';
						foreach($categories as $category){
	
							$catimage =  service_finder_getCategoryImage($category->term_id,'service_finder-provider-medium');
							
							?>
                            <div class="col-md-five">
                                <div class="sf-ow-img">
                                    <a href="<?php echo esc_url(get_term_link( $category )) ?>"><img src="<?php echo esc_url($catimage); ?>" alt=""></a>
                                    <h4 class="sf-ow-title"><?php echo esc_html($category->name); ?></h4>
                                </div>
                            </div>
							<?php
						}
						echo '</div>';
						
						if($totalcat > $limit){
					        echo '<div class="show_more_main" id="show_more_main'.esc_attr($limit).'"> <span id="'.esc_attr($category->term_id).'" data-subcat="'.esc_attr($subcategory).'" data-offset="'.esc_attr($limit).'" class="show_more2 btn btn-primary" title="Load more categories"><i class="fa fa-refresh"></i> '.esc_html__('Show more','service-finder') .'</span> <span class="loding default-hidden"><span class="loding_txt btn btn-default"><i class="fa fa-refresh fa-spin"></i></span></span> </div>';
						}
					}
				}
				}
				?>
        </div>
    </div>
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>"></div>
</section>
<?php
$html = ob_get_clean();
}else{
$html = '<section class="section-full text-center bg-gray sf-category" style="background:url('.esc_url($imgurl).') center '.$bgattachment.' no-repeat;">
  <div class="container">
    <div class="section-head">
      <h2 style="color:'.$titlecolor.'">'.esc_html($title).'</h2>
      '.service_finder_title_separator($dividercolor).'
	  <div class="sf-tagile-outer" style="color:'.esc_attr($taglinecolor).'">'.wp_kses_post($tagline).'</div>
    </div>
    <div class="section-content">
      <div class="row catlist">';

				if(class_exists('service_finder_texonomy_plugin')){
				
				$offset=0; //define offset
				$i=0; //start line counter


                $categories = (!empty($service_finder_options['homepage-categories'])) ? $service_finder_options['homepage-categories'] : '';
				
                if(!empty($categories)){
					$totalcat = count($categories);
                    foreach($categories as $category){
						$catdetails = get_term_by('id', $category, 'providers-category');
						if(!empty($catdetails)){
						
						if ($i++ < $offset) continue;
					    if ($i > $offset + $limit) break;
						
                        $catimage =  service_finder_getCategoryImage($catdetails->term_id,'service_finder-category-home');
						if($catimage != ""){
						$class = '';
						$catimgtag = '<img src="'.esc_url($catimage).'" width="600" height="350" alt="'.esc_attr($catdetails->name).'">';
						}else{
						$class = 'sf-cate-no-img';
						$catimgtag = '';
						}

        $html .= '<div class="col-md-4 col-sm-6">
          <div class="sf-element-bx">
          <a href="'.esc_url(get_term_link( $catdetails )).'">
          <div class="'.sanitize_html_class($class).' overlay-bg">
            <div class="sf-thum-bx sf-catagories-listing img-effect1" style="background-image:url('.esc_url($catimage).');"> </div>
            <span  class="service-plus"> <i class="fa fa-user-plus"></i> ('.service_finder_getTotalProvidersByCategory( $catdetails->term_id ).') </span>
            <h4 class="service-name pull-left">'.esc_html($catdetails->name).'</h4>
          </div>
          </a>
          </div>
        </div>';
		}
                    }
					
					?>
        <?php if($totalcat > $limit && $categoriesshowmore == 'yes'){ 
		if(!empty($catdetails)){
        $html .= '<div class="show_more_main" id="show_more_main'.esc_attr($limit).'"> <span id="'.esc_attr($catdetails->term_id).'" data-catarr="yes" data-offset="'.esc_attr($limit).'" class="show_more btn btn-primary" title="Load more categories"><i class="fa fa-refresh"></i> '.esc_html__('Show more','service-finder').'</span> <span class="loding default-hidden"><span class="loding_txt btn btn-default"><i class="fa fa-refresh fa-spin"></i></span></span> </div>';
		}
					}
					
                }else{
					if($subcategories == 'yes'){
					$subcategory = true;
					}else{
					$subcategory = false;
					}
					
					$allcat = service_finder_getCategoryList(0,$subcategory);
					$totalcat = count($allcat);
					
					$offset = 0;
					$categories = service_finder_getCategoryListwithOffest($limit,$subcategory,$offset);
					if(!empty($categories)){
	
						foreach($categories as $category){
	
							$catimage =  service_finder_getCategoryImage($category->term_id,'service_finder-category-home');
							
							if($catimage != ""){
							$class = '';
							$catimgtag = '<img src="'.esc_url($catimage).'" width="600" height="350" alt="'.esc_attr($category->name).'">';
							}else{
							$class = 'sf-cate-no-img';
							$catimgtag = '';
							}
        $html .= '<div class="col-md-4 col-sm-6">
        <div class="sf-element-bx">
          <a href="'.esc_url(get_term_link( $category )).'">
          <div class="'.sanitize_html_class($class).' overlay-bg">
            <div class="sf-thum-bx sf-catagories-listing img-effect1" style="background-image:url('.esc_url($catimage).');"> </div>
            <span  class="service-plus"> <i class="fa fa-user-plus"></i> ('.service_finder_getTotalProvidersByCategory( $category->term_id ).') </span>
            <h4 class="service-name pull-left">'.esc_html($category->name).'</h4>
          </div>
          </a>
        </div>  
        </div>';
						}
						?>
        <?php if($totalcat > $limit && $categoriesshowmore == 'yes'){
        $html .= '<div class="show_more_main" id="show_more_main'.esc_attr($limit).'"> <span id="'.esc_attr($category->term_id).'" data-subcat="'.esc_attr($subcategory).'" data-offset="'.esc_attr($limit).'" class="show_more btn btn-primary" title="Load more categories"><i class="fa fa-refresh"></i> '.esc_html__('Show more','service-finder') .'</span> <span class="loding default-hidden"><span class="loding_txt btn btn-default"><i class="fa fa-refresh fa-spin"></i></span></span> </div>';
						}
	
					}
				}
				}
      $html .= '
    </div>
  </div>
  </div>
  <div class="sf-overlay-main" style="opacity:'.$bgopacity.'; background-color:'.$bgcolor.'"></div>
</section>';
}
?>
<!-- sf categories END -->
