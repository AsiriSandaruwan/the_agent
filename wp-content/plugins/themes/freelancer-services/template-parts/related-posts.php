<?php
/**
 * Related posts based on categories and tags.
 * 
 */

$freelancer_services_related_posts_taxonomy = get_theme_mod( 'freelancer_services_related_posts_taxonomy', 'category' );

$freelancer_services_post_args = array(
    'posts_per_page'    => absint( get_theme_mod( 'freelancer_services_related_posts_count', '3' ) ),
    'orderby'           => 'rand',
    'post__not_in'      => array( get_the_ID() ),
);

$freelancer_services_tax_terms = wp_get_post_terms( get_the_ID(), 'category' );
$freelancer_services_terms_ids = array();
foreach( $freelancer_services_tax_terms as $tax_term ) {
	$freelancer_services_terms_ids[] = $tax_term->term_id;
}

$freelancer_services_post_args['category__in'] = $freelancer_services_terms_ids; 

if(get_theme_mod('freelancer_services_related_post',true)==1){

$freelancer_services_related_posts = new WP_Query( $freelancer_services_post_args );

if ( $freelancer_services_related_posts->have_posts() ) : ?>
    <div class="related-post">
        <h3 class="py-3"><?php echo esc_html(get_theme_mod('freelancer_services_related_post_title','Related Post'));?></h3>
        <div class="row">
            <?php while ( $freelancer_services_related_posts->have_posts() ) : $freelancer_services_related_posts->the_post(); ?>
                <?php get_template_part('template-parts/grid-layout'); ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();

}