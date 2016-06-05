<?php
/*
Plugin Name: Restaurant Post Types

Description: Plugin for creating custom post types for restaurants.
*/


// Register Custom Post Type
function restaurants_post_type() {

	$labels = array(
		'name'                => _x( 'Restaurants', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Restaurant', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Restaurants', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Restaurant:', 'text_domain' ),
		'all_items'           => __( 'All Restaurants', 'text_domain' ),
		'view_item'           => __( 'View Restaurant', 'text_domain' ),
		'add_new_item'        => __( 'Add New Restaurant', 'text_domain' ),
		'add_new'             => __( 'New Restaurant', 'text_domain' ),
		'edit_item'           => __( 'Edit Restaurant', 'text_domain' ),
		'update_item'         => __( 'Update Restaurant', 'text_domain' ),
		'search_items'        => __( 'Search Restaurant', 'text_domain' ),
		'not_found'           => __( 'No Restaurant found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Restaurant found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Restaurant', 'text_domain' ),
		'description'         => __( 'Restaurant information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'restaurant', $args );

}

// Hook into the 'init' action
add_action( 'init', 'restaurants_post_type', 0 );

//for address
function  restaurant_address(){

	add_meta_box('restaurant_address',__('Address','myplugin_textdomain'),'restaurant_address_content','restaurant','normal','high');
}

add_action('add_meta_boxes','restaurant_address');


function restaurant_address_content($post){

	$address= esc_html(get_post_meta($post->ID,'restaurant_address',true));

	wp_nonce_field(plugin_basename(__FILE__),'restaurant_address_content_nonce'); // for additional security
	?> 
	<label for="restaurant_address"></label>
	<input type="text" id="restaurant_address" name="restaurant_address" placeholder="enter address" value="<?php  echo $address; ?>">

<?php } 


function restaurant_address_content_save($post_id){

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if(!wp_verify_nonce($_POST['restaurant_address_content_nonce'], plugin_basename(__FILE__)))
		return;

	if('page' == $_POST['post_type']){

		if(!current_user_can('edit_page',$post_id))
			return;
	}
	else{
			if(!current_user_can('edit_post',$post_id))
			return;
	}
	$restaurant_address=$_POST['restaurant_address'];
	update_post_meta($post_id,'restaurant_address',$restaurant_address);
}

 add_action('save_post','restaurant_address_content_save');




// for phone no



function  restaurant_phone(){

	add_meta_box('restaurant_phone',__('Phone No.','myplugin_textdomain'),'restaurant_phone_content','restaurant','normal','high');
}

add_action('add_meta_boxes','restaurant_phone');


function restaurant_phone_content($post){

     $phone= intval(get_post_meta($post->ID,'restaurant_phone',true));
	wp_nonce_field(plugin_basename(__FILE__),'restaurant_phone_content_nonce'); // for additional security
	?>
	<label for="restaurant_phone"></label>
	<input type="text" id="restaurant_phone" name="restaurant_phone" placeholder="enter phone" value="<?php if(isset($phone) && $phone!=0) { echo $phone; }?>">

<?php }


function restaurant_phone_content_save($post_id){

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if(!wp_verify_nonce($_POST['restaurant_phone_content_nonce'], plugin_basename(__FILE__)))
		return;

	if('page' == $_POST['post_type']){

		if(!current_user_can('edit_page',$post_id))
			return;
	}
	else{
			if(!current_user_can('edit_post',$post_id))
			return;
	}
	$restaurant_phone=$_POST['restaurant_phone'];
	update_post_meta($post_id,'restaurant_phone',$restaurant_phone);
}

 add_action('save_post','restaurant_phone_content_save');


// for postal code



function  restaurant_postal_code(){

	add_meta_box('restaurant_postal_code',__('Postal Code','myplugin_textdomain'),'restaurant_postal_code_content','restaurant','normal','high');
}

add_action('add_meta_boxes','restaurant_postal_code');


function restaurant_postal_code_content($post){


   $postal_code= intval(get_post_meta($post->ID,'restaurant_postal_code',true));        
	wp_nonce_field(plugin_basename(__FILE__),'restaurant_postal_code_content_nonce'); // for additional security
	?>
	<label for="restaurant_postal_code"></label>
	<input type="text" id="restaurant_postal_code" name="restaurant_postal_code" placeholder="enter postal code" value="<?php if(isset($postal_code) && $postal_code!=0) { echo $postal_code; } ?>"/>

<?php } 


function restaurant_postal_code_content_save($post_id){

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if(!wp_verify_nonce($_POST['restaurant_postal_code_content_nonce'], plugin_basename(__FILE__)))
		return;

	if('page' == $_POST['post_type']){

		if(!current_user_can('edit_page',$post_id))
			return;
	}
	else{
			if(!current_user_can('edit_post',$post_id))
			return;
	}
	$restaurant_postal_code=$_POST['restaurant_postal_code'];
	update_post_meta($post_id,'restaurant_postal_code',$restaurant_postal_code);
}

 add_action('save_post','restaurant_postal_code_content_save');