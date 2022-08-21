<?php
ob_start();
?>
<!-- Banner Area -->
<?php if(!empty($a['title'])){ ?>
<div class="aon-page-benner-area2">
 
    <div class="aon-banner-large2-title">
        <?php echo esc_html($a['title']); ?>
    </div>
  
</div>
<?php } ?>
<!-- Banner Area End -->
<?php if(class_exists('service_finder_texonomy_plugin')){ ?>
<!-- All categories Block Section -->
<div class="aon-all-categories-wrap2">
    <div class="container">
        <div class="aon-all-categories-block2">
            <div class="row">
                <?php
                if($a['subcategory'] == 'yes'){
				$subcategory = true;
				}else{
				$subcategory = false;
				}
				
				if($a['subcategory'] == 'yes'){
					$categories = service_finder_getCategoryList(0,true);
				}else{
					$categories = service_finder_getCategoryList(0,false);
				}
				if(!empty($categories)){

					foreach($categories as $category){

						$catimage =  service_finder_getCategoryImage($category->term_id,'service_finder-provider-medium');

						?>
						<div class="col-lg-4 col-md-6">
                            <div class="aon-all-cat-block" style="background-image: url(<?php echo esc_url($catimage); ?>);">
                                <div class="aon-cat-quantity">
                                    <span><i>+</i><?php echo service_finder_getTotalProvidersByCategory( $category->term_id ); ?></span>
                                </div>
                                <div class="aon-cat-name">
                                    <a href="<?php echo esc_url(get_term_link( $category )); ?>"><?php echo esc_html($category->name); ?></a>
                                </div>
                            </div>
                        </div>
						<?php
					}
				}
				?>

            </div>
        </div>
       
    </div>
</div> 
<!-- All categories Block Section  END -->
<?php } ?>
<?php
$html = ob_get_clean();