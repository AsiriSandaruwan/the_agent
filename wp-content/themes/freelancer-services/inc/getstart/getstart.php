<?php
//about theme info
add_action( 'admin_menu', 'freelancer_services_gettingstarted' );
function freelancer_services_gettingstarted() {
	add_theme_page( esc_html__('About Freelancer Services', 'freelancer-services'), esc_html__('About Freelancer Services', 'freelancer-services'), 'edit_theme_options', 'freelancer_services_guide', 'freelancer_services_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function freelancer_services_admin_theme_style() {
	wp_enqueue_style('freelancer-services-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('freelancer-services-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'freelancer_services_admin_theme_style');

//guidline for about theme
function freelancer_services_mostrar_guide() { 
	//custom function about theme customizer
	$freelancer_services_return = add_query_arg( array()) ;
	$freelancer_services_theme = wp_get_theme( 'freelancer-services' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Freelancer Services', 'freelancer-services' ); ?> <span class="version"><?php esc_html_e( 'Version', 'freelancer-services' ); ?>: <?php echo esc_html($freelancer_services_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','freelancer-services'); ?></p>
    </div>

    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Freelancer Services at 20% Discount','freelancer-services'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','freelancer-services'); ?> ( <span><?php esc_html_e('vwpro20','freelancer-services'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( FREELANCER_SERVICES_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'freelancer-services' ); ?></a>
			</div>
		</div>
   	</div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="freelancer_services_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'freelancer-services' ); ?></button>
			<button class="tablinks" onclick="freelancer_services_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'freelancer-services' ); ?></button>
			<button class="tablinks" onclick="freelancer_services_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'freelancer-services' ); ?></button>
			<button class="tablinks" onclick="freelancer_services_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'freelancer-services' ); ?></button>
		  	<button class="tablinks" onclick="freelancer_services_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'freelancer-services' ); ?></button>
		</div>

		<?php
			$freelancer_services_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$freelancer_services_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Freelancer_Services_Plugin_Activation_Settings::get_instance();
				$freelancer_services_actions = $plugin_ins->recommended_actions;
				?>
				<div class="freelancer-services-recommended-plugins">
				    <div class="freelancer-services-action-list">
				        <?php if ($freelancer_services_actions): foreach ($freelancer_services_actions as $key => $freelancer_services_actionValue): ?>
				                <div class="freelancer-services-action" id="<?php echo esc_attr($freelancer_services_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($freelancer_services_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($freelancer_services_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($freelancer_services_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','freelancer-services'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($freelancer_services_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'freelancer-services' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('As every freelancer needs a website for showing past works and highlighting the expertise, we have come up with an advanced Free Freelancer WordPress Theme that illustrates your services in a well-organized manner on an online platform. With a 100% responsive layout, you are sure to get an unhindered performance across every device and viewing platform. The layout works magnificently for displaying the excerpts from your work and your profile in a way that your audience will find interesting. The header has simple menus, and just below that, you will find the space for your contact details. As a freelancer, hobbyist, or freelance work-providing agency, you can use this theme to showcase what you do define your work under a single roof. There are Call To Action (CTA) buttons to encourage your audience to take action and these will also work in a direction to improve your conversion rates.','freelancer-services'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'freelancer-services' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'freelancer-services' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FREELANCER_SERVICES_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'freelancer-services' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'freelancer-services'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'freelancer-services'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'freelancer-services'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'freelancer-services'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'freelancer-services'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FREELANCER_SERVICES_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'freelancer-services'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'freelancer-services'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'freelancer-services'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FREELANCER_SERVICES_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'freelancer-services'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'freelancer-services' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','freelancer-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','freelancer-services'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','freelancer-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_services_section') ); ?>" target="_blank"><?php esc_html_e('Services Section','freelancer-services'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','freelancer-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','freelancer-services'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','freelancer-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','freelancer-services'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','freelancer-services'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','freelancer-services'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','freelancer-services'); ?></span><?php esc_html_e(' Go to ','freelancer-services'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','freelancer-services'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','freelancer-services'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','freelancer-services'); ?></span><?php esc_html_e(' Go to ','freelancer-services'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','freelancer-services'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','freelancer-services'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','freelancer-services'); ?> <a class="doc-links" href="<?php echo esc_url( FREELANCER_SERVICES_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','freelancer-services'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = freelancer_services_Plugin_Activation_Settings::get_instance();
			$freelancer_services_actions = $plugin_ins->recommended_actions;
			?>
				<div class="freelancer-services-recommended-plugins">
				    <div class="freelancer-services-action-list">
				        <?php if ($freelancer_services_actions): foreach ($freelancer_services_actions as $key => $freelancer_services_actionValue): ?>
				                <div class="freelancer-services-action" id="<?php echo esc_attr($freelancer_services_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($freelancer_services_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($freelancer_services_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($freelancer_services_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','freelancer-services'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($freelancer_services_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'freelancer-services' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','freelancer-services'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','freelancer-services'); ?></span></b></p>
	              	<div class="freelancer-services-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','freelancer-services'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'freelancer-services' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','freelancer-services'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','freelancer-services'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','freelancer-services'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','freelancer-services'); ?></a>
							</div>
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','freelancer-services'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','freelancer-services'); ?></a>
							</div> 
						</div>
					</div>
				</div>	
					
	        </div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Freelancer_Services_Plugin_Activation_Settings::get_instance();
			$freelancer_services_actions = $plugin_ins->recommended_actions;
			?>
				<div class="freelancer-services-recommended-plugins">
				    <div class="freelancer-services-action-list">
				        <?php if ($freelancer_services_actions): foreach ($freelancer_services_actions as $key => $freelancer_services_actionValue): ?>
				                <div class="freelancer-services-action" id="<?php echo esc_attr($freelancer_services_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($freelancer_services_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($freelancer_services_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($freelancer_services_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'freelancer-services' ); ?></h3>
				<hr class="h3hr">
				<div class="freelancer-services-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','freelancer-services'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'freelancer-services' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','freelancer-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','freelancer-services'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','freelancer-services'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','freelancer-services'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=freelancer_services_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','freelancer-services'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','freelancer-services'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'freelancer-services' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('You will find plenty of different options available in this Freelancer WordPress Theme. From template variants to homepage layouts; there are choices available for everything. What makes this theme even more popular is its impressively user-friendly design that allows even a novice or a person having no coding background to use this theme with absolute ease. For making navigation easier, developers have worked smartly to keep a sticky header. With a powerful library of shortcodes and widgets, adding the elements to your website is a matter of a few clicks as you simply need to copy and paste the shortcodes. WP Freelancer WordPress Theme also has Woocommerce integration that is great for adding eCommerce capabilities to your website. Thanks to this, you can sell the products as well as accept payments online. As this theme supports various free as well as premium plugins such as Contact Form 7, etc. you can use any of the relevant plugins to add desired functionality to your website. This theme is also made WPML and RTL compatible making your website translation ready. You can use the newsletter or email subscription form included in this WP Freelancer WordPress Theme for converting visitors into clients.','freelancer-services'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( FREELANCER_SERVICES_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'freelancer-services'); ?></a>
					<a href="<?php echo esc_url( FREELANCER_SERVICES_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'freelancer-services'); ?></a>
					<a href="<?php echo esc_url( FREELANCER_SERVICES_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'freelancer-services'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'freelancer-services' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'freelancer-services'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'freelancer-services'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'freelancer-services'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'freelancer-services'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'freelancer-services'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'freelancer-services'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'freelancer-services'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'freelancer-services'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'freelancer-services'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'freelancer-services'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'freelancer-services'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'freelancer-services'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'freelancer-services'); ?></td>
								<td class="table-img"><?php esc_html_e('15', 'freelancer-services'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'freelancer-services'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'freelancer-services'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'freelancer-services'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'freelancer-services'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'freelancer-services'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'freelancer-services'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'freelancer-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( FREELANCER_SERVICES_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'freelancer-services'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'freelancer-services'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'freelancer-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FREELANCER_SERVICES_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'freelancer-services'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'freelancer-services'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'freelancer-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FREELANCER_SERVICES_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'freelancer-services'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'freelancer-services'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'freelancer-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FREELANCER_SERVICES_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'freelancer-services'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'freelancer-services'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'freelancer-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FREELANCER_SERVICES_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','freelancer-services'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'freelancer-services'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'freelancer-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FREELANCER_SERVICES_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'freelancer-services'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>

<?php } ?>