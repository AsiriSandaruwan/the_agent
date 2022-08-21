<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Freelancer Services
 */

if ( ! function_exists( 'freelancer_services_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function freelancer_services_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'freelancer_services_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	wp_reset_postdata();

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function freelancer_services_categorized_blog() {
	if ( false === ( $freelancer_services_all_the_cool_cats = get_transient( 'freelancer_services_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$freelancer_services_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$freelancer_services_all_the_cool_cats = count( $freelancer_services_all_the_cool_cats );

		set_transient( 'freelancer_services_all_the_cool_cats', $freelancer_services_all_the_cool_cats );
	}

	if ( '1' != $freelancer_services_all_the_cool_cats ) {
		// This blog has more than 1 category so freelancer_services_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so freelancer_services_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'freelancer_services_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since freelancer-services
 */
function freelancer_services_the_custom_logo() {	
	the_custom_logo();
}
endif;

/**
 * Flush out the transients used in freelancer_services_categorized_blog
 */
function freelancer_services_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'freelancer_services_all_the_cool_cats' );
}
add_action( 'edit_category', 'freelancer_services_category_transient_flusher' );
add_action( 'save_post',     'freelancer_services_category_transient_flusher' );

add_theme_support( 'admin-bar', array( 'callback' => 'freelancer_services_my_admin_bar_css') );
function freelancer_services_my_admin_bar_css(){
?>
<style type="text/css" media="screen">	
	html body { margin-top: 0px !important; }
</style>
<?php
}

/*-- Custom metafield --*/
function freelancer_services_custom_price() {
  	add_meta_box( 'bn_meta', __( 'Freelancer Services Meta Feilds', 'freelancer-services' ), 'freelancer_services_meta_price_callback', 'post', 'normal', 'high' );
}
if (is_admin()){
  	add_action('admin_menu', 'freelancer_services_custom_price');
}

function freelancer_services_meta_price_callback( $post ) {
  	wp_nonce_field( basename( __FILE__ ), 'freelancer_services_price_meta' );
  	$bn_stored_meta = get_post_meta( $post->ID );
  	$freelancer_services_price = get_post_meta( $post->ID, 'freelancer_services_price', true );
  	?>
  	<div id="custom_meta_feilds">
	    <table id="list">
	      	<tbody id="the-list" data-wp-lists="list:meta">
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Starting Price', 'freelancer-services' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="freelancer_services_price" id="freelancer_services_price" value="<?php echo esc_html($freelancer_services_price); ?>" />
		          	</td>
		        </tr>
	      	</tbody>
	    </table>
  	</div>
  	<?php
}

function freelancer_services_save( $post_id ) {
  	if (!isset($_POST['freelancer_services_price_meta']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['freelancer_services_price_meta']) ), basename(__FILE__))) {
      	return;
  	}
  	if (!current_user_can('edit_post', $post_id)) {
   		return;
  	}
  	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return;
  	}
  	if( isset( $_POST[ 'freelancer_services_price' ] ) ) {
    	update_post_meta( $post_id, 'freelancer_services_price', strip_tags( wp_unslash( $_POST[ 'freelancer_services_price' ]) ) );
  	}
}
add_action( 'save_post', 'freelancer_services_save' );