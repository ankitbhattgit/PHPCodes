<?php
global $escrow_version;
$escrow_version = "1.0";
function escrow_activation() {

  if (!isset($wpdb)) $wpdb = $GLOBALS['wpdb'];
   global $escrow_version;
   /** To create Products Table on Plugin Activation  **/
   $table_name = $wpdb->prefix . "products";
      
   $sql1 = "CREATE TABLE IF NOT EXISTS esc_products(
  id int(10) NOT NULL AUTO_INCREMENT,
  prod_name varchar(100) NOT NULL,
  prod_desc varchar(250) NOT NULL,
  prod_price double NOT NULL,
  prod_disc float NOT NULL,
  prod_img varchar(50) NOT NULL,
  prod_img_path varchar(350) NOT NULL,
  prod_qnty int(10) NOT NULL,
  prod_parent int(10) NOT NULL,
  prod_status varchar(1) NOT NULL,
  prod_type enum('product','packages') NOT NULL,
  prod_cat int(10) NOT NULL,
  prod_creation timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  prod_key varchar(50) NOT NULL,
  PRIMARY KEY (id)
)";
/**********/

/** To create Orders Table on Plugin Activation  **/
 $table_name = $wpdb->prefix . "orders";
      
   $sql2 = "CREATE TABLE IF NOT EXISTS $table_name (
  id int(10) NOT NULL AUTO_INCREMENT,
  order_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  order_transaction_id int(50) NOT NULL,
  order_status varchar(10) NOT NULL,
  order_user_email varchar(1024) NOT NULL,
  PRIMARY KEY (id)
)";

/**********/

/** To create Cart Table on Plugin Activation  **/
 $table_name = $wpdb->prefix . "cart";
      
   $sql3 = "CREATE TABLE IF NOT EXISTS $table_name (
  id int(10) NOT NULL AUTO_INCREMENT,
  order_id int(10) NOT NULL,
  product_id int(10) NOT NULL,
  product_price float NOT NULL,
  creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  status tinyint(1) NOT NULL,
  PRIMARY KEY (id)
)";

/**********/

 /** To create Packages Table on Plugin Activation  **/
   $table_name = $wpdb->prefix . "cat";
      
  $sql4 = "CREATE TABLE IF NOT EXISTS esc_cat (
  id int(255) NOT NULL AUTO_INCREMENT,
  cat_name varchar(255) NOT NULL,
  cat_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  cat_status enum('0','1') NOT NULL,
  PRIMARY KEY (id)
)";
/**********/



   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql1 );
   dbDelta( $sql2 );
   dbDelta( $sql3 );
   dbDelta( $sql4 );
 //die;
   add_option( "escrow_version", $escrow_version );
   
   // Create sign in page object
	$my_post = array(
	  'post_title'    => 'Escrow',
	  'post_content'  => '[initial]',
	  'post_status'   => 'publish',
	  'post_author'   => 1,
	  'post_category' => array(8,39),
	  'post_type'     => 'page',
	  'post_name'	  => 'sys',
	  'post_status'   => 'publish'
	);
   
   $post_id = wp_insert_post( $my_post, true );	/** To insert post needed during the plugin working**/
   if( $post_id ){
	 update_post_meta($post_id, '_wp_page_template', 'page-templates/add-product.php'); 
   }
}
 ?>