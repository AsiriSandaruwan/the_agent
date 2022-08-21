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
<!-- How sf Works -->
<?php
$service_finder_options = get_option('service_finder_options');
$wpdb = service_finder_shortcode_global_vars('wpdb');

$imgurl = (!empty($service_finder_options['how-works-bg-image']['url'])) ? $service_finder_options['how-works-bg-image']['url'] : '';
$bgattachment = (isset($service_finder_options['how-works-background-attachment'])) ? esc_html($service_finder_options['how-works-background-attachment']) : '';
$bgcolor = (!empty($service_finder_options['how-works-bg-color'])) ? $service_finder_options['how-works-bg-color'] : '';
$bgopacity = (!empty($service_finder_options['how-works-bg-opacity'])) ? $service_finder_options['how-works-bg-opacity'] : '';
$bgopacity = ($bgopacity > 0) ? $bgopacity : ''; 
$curveleftcolor = (!empty($service_finder_options['how-works-left-curve-color'])) ? $service_finder_options['how-works-left-curve-color'] : '';
$curverightcolor = (!empty($service_finder_options['how-works-right-curve-color'])) ? $service_finder_options['how-works-right-curve-color'] : '';

$title = (!empty($service_finder_options['shortcode-how-works-title'])) ? esc_html($service_finder_options['shortcode-how-works-title']) : '';
$subtitle = (!empty($service_finder_options['shortcode-how-works-subtitle'])) ? esc_html($service_finder_options['shortcode-how-works-subtitle']) : '';
$tagline = (!empty($service_finder_options['shortcode-how-works-tagline'])) ? wp_kses_post($service_finder_options['shortcode-how-works-tagline']) : '';
$titlecolor = (!empty($service_finder_options['shortcode-how-works-title-color'])) ? esc_html($service_finder_options['shortcode-how-works-title-color']) : '';
$subtitlecolor = (!empty($service_finder_options['shortcode-how-works-subtitle-color'])) ? esc_html($service_finder_options['shortcode-how-works-subtitle-color']) : '';
$iconbgcolor = (!empty($service_finder_options['shortcode-how-works-icon-bg-color'])) ? esc_html($service_finder_options['shortcode-how-works-icon-bg-color']) : '';
$taglinecolor = (!empty($service_finder_options['shortcode-how-works-tagline-color'])) ? esc_html($service_finder_options['shortcode-how-works-tagline-color']) : '';
$dividercolor = (!empty($service_finder_options['shortcode-how-works-divider-color'])) ? esc_html($service_finder_options['shortcode-how-works-divider-color']) : '';

if(service_finder_themestyle_for_plugin() == 'style-2'){
$html = '<section class="section-full text-center bg-white" style="background-image:url('.esc_url($imgurl).');background-attachment: '.$bgattachment.'">
            <div class="container">
            
            	<div class="section-head">
                    <h2 style="color:'.$titlecolor.'">'.esc_html($title).'</h2>
					'.service_finder_title_separator($dividercolor).'
					<div class="sf-tagile-outer" style="color:'.esc_attr($taglinecolor).'">'.wp_kses_post($tagline).'</div>
                </div>
                    
                <div class="section-content">
                    <div class="row">';
                        $boxcnt = 0;
						for($i = 1;$i <= 3; $i++ )
						{
						$show = (isset($service_finder_options['shortcode-how-works-step'.$i.'-show'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-show']) : true;
						if($show == true)
						{
						$boxcnt++;
						}
						}
                        for($i = 1;$i <= 3; $i++ )
						{
						$show = (isset($service_finder_options['shortcode-how-works-step'.$i.'-show'])) ? $service_finder_options['shortcode-how-works-step'.$i.'-show'] : true;
						$steptitle = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-title'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-title']) : '';
						$stepcontent = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-content'])) ? wp_kses_post($service_finder_options['shortcode-how-works-step'.$i.'-content']) : '';
						$stepnumber = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-number'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-number']) : '';
						$stepicon = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-icon']['url'])) ? $service_finder_options['shortcode-how-works-step'.$i.'-icon']['url'] : '';
						$boxwidth = ($boxcnt == 2) ? 'col-md-6' : 'col-md-4';
						if($show == true)
						{
						$html .= '<div class="'.esc_attr($boxwidth).'">
                          <div class="sf-how-work padding-lr-40 equal-col">
                                <div class="sf-icon-xl margin-b-20">
                                    <img src="'.esc_url($stepicon).'" width="139" height="140" alt="">
                                    <span class="sf-no-step">'.esc_html($stepnumber).'</span>
                                </div>
                                <h4 class="sf-tilte" style="color:'.esc_attr($taglinecolor).'">'.esc_html($steptitle).'</h4>
                                <p style="color:'.esc_attr($taglinecolor).'">'.$stepcontent.'</p>
                          </div>
                        </div>';
						}
						}
                        
                    $html .= '</div>
                </div>
                
            </div>
			<div class="sf-overlay-main" style="opacity:'.$bgopacity.'; background-color:'.$bgcolor.'">
        </section>';
}elseif(service_finder_themestyle_for_plugin() == 'style-3')
{
ob_start();
?>
<section class="section-full text-center sf-howServFinder-wrap" <?php echo ($imgurl != '') ? 'style="background:url('.esc_url($imgurl).') center '.esc_attr($bgattachment).' no-repeat;"' : ''; ?>>
	<div class="container">
	
		<div class="section-head">
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
				$show = (isset($service_finder_options['shortcode-how-works-step'.$i.'-show'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-show']) : true;
				if($show == true)
				{
				$boxcnt++;
				}
				}
				for($i = 1;$i <= 3; $i++ )
				{
				$show = (isset($service_finder_options['shortcode-how-works-step'.$i.'-show'])) ? $service_finder_options['shortcode-how-works-step'.$i.'-show'] : true;
				$steptitle = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-title'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-title']) : '';
				$stepcontent = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-content'])) ? wp_kses_post($service_finder_options['shortcode-how-works-step'.$i.'-content']) : '';
				$stepnumber = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-number'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-number']) : '';
				$stepicon = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-icon']['url'])) ? $service_finder_options['shortcode-how-works-step'.$i.'-icon']['url'] : '';
				$boxwidth = ($boxcnt == 2) ? 'col-md-6 col-sm-6' : 'col-md-4 col-sm-4';
				if($show == true)
				{
				?>
				<div class="<?php echo esc_attr($boxwidth); ?>">
                  <div class="sf-howServFinWork-box padding-lr-40">
                        <div class="sf-icon-xl margin-b-20" style="border-color:<?php echo esc_attr($taglinecolor); ?>">
                            <img src="<?php echo esc_html($stepicon); ?>" alt="">
                            <span class="sf-no-step text-primary" style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo esc_html($stepnumber); ?></span>
                        </div>
                        <h4 class="sf-tilte text-white" style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo esc_html($steptitle); ?></h4>
                        <p style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo esc_html($stepcontent); ?></p>
                  </div>
                </div>
				<?php
				}
				}
				?>
				
			</div>
		</div>
	</div>
	<div class="sf-curve-topWrap"><div class="sf-curveTop sf-howitwork-curveTop" style="background-color:<?php echo esc_attr($curveleftcolor); ?>"></div></div>
    <div class="sf-curve-botWrap"><div class="sf-curveBot sf-howitwork-curveBot" style="background-color:<?php echo esc_attr($curverightcolor); ?>"></div></div>            
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "> 
</section>
<?php
$html = ob_get_clean();
}elseif(service_finder_themestyle_for_plugin() == 'style-4')
{
ob_start();
?>
<section class="section-full bg-white sf-how-service-wrap sf-curve-pos" <?php echo ($imgurl != '') ? 'style="background:url('.esc_url($imgurl).') center '.esc_attr($bgattachment).' no-repeat;"' : ''; ?>>
    <div class="container">
    
        <div class="section-content">
               <div class="sf-steps-block-wrap">
                    <div class="row">
                    
                        <div class="col-md-4">
	                        <span class="sf-sub-title" style="color:<?php echo  esc_attr($subtitlecolor); ?>"><?php echo esc_html($subtitle); ?></span>
                            <h2 class="sf-title" style="color:<?php echo  esc_attr($titlecolor); ?>"><?php echo esc_html($title); ?></h2>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="sf-step-blocks">
                                <div class="row">
                                    <?php
									$boxcnt = 0;
									for($i = 1;$i <= 3; $i++ )
									{
									$show = (isset($service_finder_options['shortcode-how-works-step'.$i.'-show'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-show']) : true;
									if($show == true)
									{
									$boxcnt++;
									}
									}
									for($i = 1;$i <= 3; $i++ )
									{
									$show = (isset($service_finder_options['shortcode-how-works-step'.$i.'-show'])) ? $service_finder_options['shortcode-how-works-step'.$i.'-show'] : true;
									$steptitle = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-title'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-title']) : '';
									$stepcontent = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-content'])) ? wp_kses_post($service_finder_options['shortcode-how-works-step'.$i.'-content']) : '';
									$stepnumber = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-number'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-number']) : '';
									$stepicon = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-icon']['url'])) ? $service_finder_options['shortcode-how-works-step'.$i.'-icon']['url'] : '';
									$boxwidth = ($boxcnt == 2) ? 'col-md-6 col-sm-6 m-b30' : 'col-md-4 col-sm-4 m-b30';
									if($show == true)
									{
									?>
                                    <div class="<?php echo esc_attr($boxwidth); ?>">
                                        <div class="sf-step-section step-position-<?php echo esc_attr($i); ?>">
                                            <div class="sf-step-icon">
                                                <span style="background-color:<?php echo esc_attr($iconbgcolor); ?>">
                                                    <img src="<?php echo esc_html($stepicon); ?>" alt="">
                                                </span>
                                            </div>
                                            <div class="sf-step-info">
                                                <h4 class="sf-title" style="color:<?php echo esc_attr($titlecolor); ?>"><?php echo esc_html($steptitle); ?></h4>
                                                <p style="color:<?php echo esc_attr($taglinecolor); ?>"><?php echo esc_html($stepcontent); ?></p>
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
               </div>
            </div>
    </div>
    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?> "> 
</section>
<?php
$html = ob_get_clean();
}else{
$html = '<section class="section-full text-center bg-white how-sf-work" style="background-image:url('.esc_url($imgurl).');background-attachment: '.$bgattachment.'">
  <div class="container">
    <div class="section-head">
      <h2 style="color:'.$titlecolor.'">'.esc_html($title).'</h2>
	  '.service_finder_title_separator($dividercolor).'
	  <div class="sf-tagile-outer" style="color:'.esc_attr($taglinecolor).'">'.wp_kses_post($tagline).'</div>
    </div>
    <div class="section-content">
      <div class="row">';
		$boxcnt = 0;
		for($i = 1;$i <= 3; $i++ )
		{
		$show = (isset($service_finder_options['shortcode-how-works-step'.$i.'-show'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-show']) : true;
		if($show == true)
		{
		$boxcnt++;
		}
		}
		for($i = 1;$i <= 3; $i++ )
		{
		$show = (isset($service_finder_options['shortcode-how-works-step'.$i.'-show'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-show']) : true;
		$steptitle = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-title'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-title']) : '';
		$stepcontent = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-content'])) ? wp_kses_post($service_finder_options['shortcode-how-works-step'.$i.'-content']) : '';
		$stepnumber = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-number'])) ? esc_html($service_finder_options['shortcode-how-works-step'.$i.'-number']) : '';
		$stepicon = (!empty($service_finder_options['shortcode-how-works-step'.$i.'-icon']['url'])) ? $service_finder_options['shortcode-how-works-step'.$i.'-icon']['url'] : '';
		$boxwidth = ($boxcnt == 2) ? 'col-md-6 col-sm-6' : 'col-md-4 col-sm-4';
		if($show == true)
		{
		$html .= '<div class="'.esc_attr($boxwidth).'">
				  <div class="sf-element-bx padding-lr-30">
					<div class="icon-bx-lg rounded-bx mostion"><img src="'.esc_url($stepicon).'" width="139" height="140" alt=""></div>
					<div class="shadow-bx mostion"><img src="'.plugins_url('/sf-shortcodes/').'images/shadow.png'.'" alt=""></div>
					<h4 style="color:'.esc_attr($taglinecolor).'">'.esc_html($steptitle).'</h4>
					<p style="color:'.esc_attr($taglinecolor).'">'.$stepcontent.'</p>
					<div class="step-no-bx mostion" style="color:'.esc_attr($taglinecolor).'">'.esc_html($stepnumber).'</div>
				  </div>
				</div>';
		}
		}
$html .= '<div class="col-md-12">
          <div class="line-bx">
            <div class="col-md-6 padding-r-40">
              <div class="pull-right">
                <hr>
              </div>
            </div>
            <div class="col-md-6 padding-l-40">
              <div  class="pull-left">
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sf-overlay-main" style="opacity:'.$bgopacity.'; background-color:'.$bgcolor.'">
</section>';
}
$html = str_replace('<br />','',$html);
$html = str_replace('<br>','',$html);
$html = str_replace('<p></p>','',$html);
?>
<!-- How sf Works END -->
