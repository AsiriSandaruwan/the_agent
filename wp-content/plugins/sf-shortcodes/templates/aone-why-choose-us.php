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
?>
<?php 
$imgurl = (!empty($service_finder_options['why-choose-us-bg-image']['url'])) ? $service_finder_options['why-choose-us-bg-image']['url'] : '';
$bgattachment = (isset($service_finder_options['why-choose-us-background-attachment'])) ? esc_html($service_finder_options['why-choose-us-background-attachment']) : '';
$bgcolor = (!empty($service_finder_options['why-choose-us-bg-color'])) ? $service_finder_options['why-choose-us-bg-color'] : '';
$bgopacity = (!empty($service_finder_options['why-choose-us-bg-opacity'])) ? $service_finder_options['why-choose-us-bg-opacity'] : '';
$bgopacity = ($bgopacity > 0) ? $bgopacity : ''; 
$curveleftcolor = (!empty($service_finder_options['why-choose-us-left-curve-color'])) ? $service_finder_options['why-choose-us-left-curve-color'] : '';
$curverightcolor = (!empty($service_finder_options['why-choose-us-right-curve-color'])) ? $service_finder_options['why-choose-us-right-curve-color'] : '';
$title = (!empty($service_finder_options['shortcode-why-choose-title'])) ? esc_html($service_finder_options['shortcode-why-choose-title']) : '';
$subtitle = (!empty($service_finder_options['shortcode-why-choose-subtitle'])) ? esc_html($service_finder_options['shortcode-why-choose-subtitle']) : '';
$tagline = (!empty($service_finder_options['shortcode-why-choose-tagline'])) ? wp_kses_post($service_finder_options['shortcode-why-choose-tagline']) : '';
$titlecolor = (!empty($service_finder_options['shortcode-why-choose-title-color'])) ? esc_html($service_finder_options['shortcode-why-choose-title-color']) : '';
$subtitlecolor = (!empty($service_finder_options['shortcode-why-choose-subtitle-color'])) ? esc_html($service_finder_options['shortcode-why-choose-subtitle-color']) : '';
$taglinecolor = (!empty($service_finder_options['shortcode-why-choose-tagline-color'])) ? esc_html($service_finder_options['shortcode-why-choose-tagline-color']) : '';
$dividercolor = (!empty($service_finder_options['shortcode-why-choose-divider-color'])) ? esc_html($service_finder_options['shortcode-why-choose-divider-color']) : '';
?>
<?php
if(service_finder_themestyle_for_plugin() == 'style-3'){
ob_start();
?>
<section class="section-full text-center sf-whyChoos-wrap" style="background-image:url(<?php echo esc_url($imgurl) ?>); background-attachment: <?php echo esc_attr($bgattachment); ?>">
    <div class="container">
    
        <div class="section-head w-t-element">
            <h2 class="text-white" style="color:<?php echo  esc_attr($titlecolor); ?>"><?php echo esc_html($title); ?></h2>
            <?php echo service_finder_title_separator($dividercolor); ?>
            <div class="sf-tagile-outer" style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo wp_kses_post($tagline); ?></div>
        </div>
            
        <div class="section-content">
            <div class="row">
                
                <?php
				$boxcnt = 0;
				for($i = 1;$i <= 3; $i++ )
				{
				$show = (isset($service_finder_options['shortcode-why-choose-step'.$i.'-show'])) ? esc_html($service_finder_options['shortcode-why-choose-step'.$i.'-show']) : true;
				if($show == true)
				{
				$boxcnt++;
				}
				}
                for($i = 1;$i <= 3; $i++ )
				{
				$show = (isset($service_finder_options['shortcode-why-choose-step'.$i.'-show'])) ? $service_finder_options['shortcode-why-choose-step'.$i.'-show'] : true;
				$steptitle = (!empty($service_finder_options['shortcode-why-choose-box'.$i.'-title'])) ? esc_html($service_finder_options['shortcode-why-choose-box'.$i.'-title']) : '';
				$stepcontent = (!empty($service_finder_options['shortcode-why-choose-box'.$i.'-content'])) ? wp_kses_post($service_finder_options['shortcode-why-choose-box'.$i.'-content']) : '';

				$stepicon = (!empty($service_finder_options['shortcode-why-choose-box'.$i.'-icon']['url'])) ? $service_finder_options['shortcode-why-choose-box'.$i.'-icon']['url'] : '';
				$boxwidth = ($boxcnt == 2) ? 'col-md-6 col-sm-6' : 'col-md-4 col-sm-4';
				if($show == true)
				{
				?>
				<div class="<?php echo esc_attr($boxwidth); ?>">
                  <div class="sf-why-choose w-t-element padding-lr-20">
                        <div class="sf-icon-xl margin-b-20">
                            <img src="<?php echo esc_url($stepicon); ?>" width="220" height="200" alt="">
                        </div>
                        <h4 class="sf-tilte margin-b-10" style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo esc_html($steptitle); ?></h4>
                        <p style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo wp_kses_post($stepcontent); ?></p>
                  </div>
                </div>
				<?php
				}
				}
				?>
                
            </div>
        </div>
        
    </div>
    <div class="sf-curve-topWrap"><div class="sf-curveTop sf-whyChoos-curveTop" style="background-color:<?php echo esc_attr($curveleftcolor); ?>"></div></div>
    <div class="sf-curve-botWrap"><div class="sf-curveBot sf-whyChoos-curveBot" style="background-color:<?php echo esc_attr($curverightcolor); ?>"></div></div>            
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "></div>        
</section>
<?php
$html = ob_get_clean();

}elseif(service_finder_themestyle_for_plugin() == 'style-4'){
ob_start();
?>
<div class="section-full sf-whycoose-section-wrap sf-curve-pos" <?php echo ($imgurl != '') ? 'style="background:url('.esc_url($imgurl).') center '.esc_attr($bgattachment).' no-repeat;"' : ''; ?>>
    <div class="section-content">
        <div class="sf-whycoose-section">
            <div class="row sf-w-choose-bg-outer d-flex flex-wrap a-b-none">
                <!-- COLUMNS 1 -->
                <div class="col-md-7 margin-b-50 sf-w-choose-left-cell">
                    <div class="sf-w-choose-info-left">
                        <div class="section-head">
                            <div class="row">
                                <div class="col-md-12  margin-b-50">
                                    <span class="sf-sub-title" style="color:<?php echo  esc_attr($subtitlecolor); ?>"><?php echo esc_html($subtitle); ?></span>
				                    <h2 class="sf-title" style="color:<?php echo  esc_attr($titlecolor); ?>"><?php echo esc_html($title); ?></h2>
                                    <p style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo wp_kses_post($tagline); ?></p>
                                </div>
                            </div>
                        </div>  
                    
                        <?php
						$boxcnt = 0;
						for($i = 1;$i <= 3; $i++ )
						{
						$show = (isset($service_finder_options['shortcode-why-choose-step'.$i.'-show'])) ? esc_html($service_finder_options['shortcode-why-choose-step'.$i.'-show']) : true;
						if($show == true)
						{
						$boxcnt++;
						}
						}
						for($i = 1;$i <= 3; $i++ )
						{
						$show = (isset($service_finder_options['shortcode-why-choose-step'.$i.'-show'])) ? $service_finder_options['shortcode-why-choose-step'.$i.'-show'] : true;
						$steptitle = (!empty($service_finder_options['shortcode-why-choose-box'.$i.'-title'])) ? esc_html($service_finder_options['shortcode-why-choose-box'.$i.'-title']) : '';
						$stepcontent = (!empty($service_finder_options['shortcode-why-choose-box'.$i.'-content'])) ? wp_kses_post($service_finder_options['shortcode-why-choose-box'.$i.'-content']) : '';
		
						$stepicon = (!empty($service_finder_options['shortcode-why-choose-box'.$i.'-icon']['url'])) ? $service_finder_options['shortcode-why-choose-box'.$i.'-icon']['url'] : '';
						if($show == true)
						{
						?>
                        <div class="sf-w-choose margin-b-20">
                            <div class="sf-w-choose-icon">
                                <span>
                                    <img src="<?php echo esc_url($stepicon); ?>">
                                </span>
                            </div>
                            <div class="sf-w-choose-info">
                                <h4 class="sf-title"><?php echo esc_html($steptitle); ?></h4>
                                <p style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo wp_kses_post($stepcontent); ?></p>
                            </div>
                        </div>
						<?php
						}
						}
						?>
                    </div>
                </div>
                <!-- COLUMNS 1 -->
                <div class="col-md-5 sf-w-choose-bg-wrap sf-w-choose-right-cell">
                	<?php $rightsideimage = (!empty($service_finder_options['shortcode-why-choose-rightside-image']['url'])) ? $service_finder_options['shortcode-why-choose-rightside-image']['url'] : ''; ?>
                    <div class="sf-w-choose-bg" <?php echo ($rightsideimage != '') ? 'style="background-image:url('.esc_url($rightsideimage).')"' : ''; ?>></div>
                </div>
            </div>
            
        </div>
    </div>
	<div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "></div>
</div>
<?php
$html = ob_get_clean();

}else{
$html = '<section class="section-full sf-overlay-wrapper text-center" style="background-image:url('.esc_url($imgurl).');background-attachment: '.$bgattachment.'">
            <div class="container">
            
            	<div class="section-head w-t-element">
					<h2 style="color:'.$titlecolor.'">'.esc_html($title).'</h2>
					'.service_finder_title_separator($dividercolor).'
					<div class="sf-tagile-outer" style="color:'.esc_attr($taglinecolor).'">'.wp_kses_post($tagline).'</div>
                </div>
                    
                <div class="section-content">
                    <div class="row">';
					$boxcnt = 0;
					for($i = 1;$i <= 3; $i++ )
					{
					$show = (isset($service_finder_options['shortcode-why-choose-step'.$i.'-show'])) ? $service_finder_options['shortcode-why-choose-step'.$i.'-show'] : true;
					if($show == true)
					{
					$boxcnt++;
					}
					}
					for($i = 1;$i <= 3; $i++ )
					{
					$show = (isset($service_finder_options['shortcode-why-choose-step'.$i.'-show'])) ? $service_finder_options['shortcode-why-choose-step'.$i.'-show'] : true;
					$show = (isset($service_finder_options['shortcode-how-works-step'.$i.'-show'])) ? $service_finder_options['shortcode-how-works-step'.$i.'-show'] : true;
					$steptitle = (!empty($service_finder_options['shortcode-why-choose-box'.$i.'-title'])) ? esc_html($service_finder_options['shortcode-why-choose-box'.$i.'-title']) : '';
					$stepcontent = (!empty($service_finder_options['shortcode-why-choose-box'.$i.'-content'])) ? wp_kses_post($service_finder_options['shortcode-why-choose-box'.$i.'-content']) : '';
	
					$stepicon = (!empty($service_finder_options['shortcode-why-choose-box'.$i.'-icon']['url'])) ? $service_finder_options['shortcode-why-choose-box'.$i.'-icon']['url'] : '';
					$boxwidth = ($boxcnt == 2) ? 'col-md-6 col-sm-6' : 'col-md-4 col-sm-4';
					if($show == true)
					{
					$html .= '<div class="'.esc_attr($boxwidth).'">
							  <div class="sf-why-choose w-t-element padding-lr-20">
									<div class="sf-icon-xl margin-b-20">
										<img src="'.esc_url($stepicon).'" width="220" height="200" alt="">
									</div>
									<h4 class="sf-tilte margin-b-10" style="color:'.esc_attr($taglinecolor).'">'.esc_html($steptitle).'</h4>
									<p style="color:'.esc_attr($taglinecolor).'">'.wp_kses_post($stepcontent).'</p>
									
							  </div>
							</div>';
					
					}
					}
			$html .= '</div>
                </div>
            </div>
			<div class="sf-overlay-main" style="opacity:'.$bgopacity.'; background-color:'.$bgcolor.'">
        </section>';
}		
?>

