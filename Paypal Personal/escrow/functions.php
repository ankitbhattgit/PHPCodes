<?php
function createUser(){

	if(	!isset($_SESSION['is_logged_in'] ) && $_SESSION['is_logged_in']	!=	1 ){
				
			
			
				$password = rand(10,10000);
				$user_id = wp_create_user( $_SESSION['user_email'], $password, $_SESSION['user_email'] );
				update_user_meta( $user_id, 'first_name', $_SESSION['user_name'] );
				update_user_meta( $user_id, 'last_name', $_SESSION['user_lname'] );
				
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// Additional headers
				$headers .= 'From: Middleman <support@playerup.com>' . "\r\n";
				$message	=	"Username: ".$_SESSION['user_email'];
				$message	.=	"<br/>";
				$message	.=	"Password is: ".$password;
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
							$action	=	get_permalink(get_the_ID()).'&form=1';
						}
				else{
					$action	=	 get_permalink(get_the_ID()).'?form=1';
				}
				$message	.=	"<br/>";
				$message	.=	"Login to: ".$action;
				$subject	=	"PlayerUp: Middleman Account Information";
				
				$email	=	wp_mail( $_SESSION['user_email'], $subject, $message,$headers);
				mail($_SESSION['user_email'],$subject, $message,$headers);
				$_SESSION['prod_form']['prod_parent']	=	$user_id;
				if ( is_wp_error( $user_id ) || is_wp_error( $email ) ) {
					$error_string = $user_id->get_error_message();
					echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
					die;
				}
			
			}
			return true;

}


function createProduct(){

	
	global $wpdb;
	 
	$table_name = $wpdb->prefix . "products";
	
	
	$prod_res 	=	$wpdb->insert( $table_name, $_SESSION['prod_form']	);
	$prod_id	=	$wpdb->insert_id;
	$product_key	=	rand(10000,100000);	//code to generate a random key for new product
	$product_key	=	$prod_id.'_'.$product_key;
	
	
	if( $prod_res ){
		
		$data_array = array('prod_key' => $product_key);
		$where = array('id' => $prod_id);
		$update_res = $wpdb->update( $table_name, $data_array, $where );
		$_SESSION['prod_form']['prod_key']	=	$product_key;
		$email_ent	=	prodCreatedMail(); 
		return $update_res;
	}
	else{
	
		return false;
	
	}
	

}

function loginAuth(){

		
		$user_email		=		$_POST['log'];
		$user_password	= 		$_POST['pwd'];
		
		$user_id = email_exists( $user_email );
		if( $user_id ){
		
			$res = wp_authenticate(	$user_email , $user_password );
			
			if ( is_wp_error( $res ) ) {
				$error_string = $res->get_error_message(); 
				$_SESSION['message']	=	$error_string;
				return false;
			}
			else{
				
				$_SESSION['is_logged_in']	=	1;
				
				$userdata = get_user_by( 'email', $user_email );
			
				$_SESSION['user_email']	=	$user_email;
		
				if( !empty( $userdata ) ){
				
					$_SESSION['user_name']	=	$userdata -> display_name;
				
				}
		
				$_SESSION['user_password']	=	$user_password;
				
				return true;
			
			}	
			
			
		
		}else{
		
			
				$_SESSION['message']	=	'User With Entered email does not Exist.';
				return false;
				
			
		
		}
		
		
		
		


}



function getProdForm($pid){

	require_once(dirname(__FILE__).'/esc.php');
	
	getProduct($pid);
	
}


function uploadImg(){


		if ( ! function_exists( 'wp_handle_upload' ) ) 
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
	
			$uploadedfile = $_FILES['prod_img'];
			$upload_overrides = array( 'test_form' => false );
			$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
			if( !empty( $movefile ) ){
				return $movefile['url'];
			}
		if ( !$movefile ) {
			echo "File not uploaded Successfully!\n";
			die;
		}

		
}

function getCategories( $use ){

	global $wpdb;
		if( $use	==	'cart' ){
			$query	=	"SELECT * FROM esc_cat C JOIN esc_products P ON C.id=P.prod_cat";
			$results	=	$wpdb->get_results($query);
			$cats		=	array();
			foreach($results as $key=>$val){
				if(!in_array($val->prod_cat,$cats)){
					$cats[]	=	$val->prod_cat;
				}
			}
			$finalArr		=	array();
			foreach($cats as $key=>$val){
				foreach($results as $key1=>$val1){
					if($val1->prod_cat==$val){
						$finalArr[$val][]		=	$val1;
					}
				}
			}
			
			return $finalArr;
		}else if( $use	==	'select' ){
		
			$query	=	"SELECT id,cat_name FROM esc_cat WHERE cat_status='1'";
			$results	=	$wpdb->get_results($query);
			return $results;
		}
	
	
}

function prodCreatedMail(){

		
		
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		
		$headers .= 'From: PlayerUp <support@playerup.com>' . "\r\n";
		
		
		 
		$action	=	dirname(__FILE__).'/emailProd.php';
		
		$message		=		file_get_contents( $action ); 
		
		$message 		= 		str_replace( '{prod_name}' , $_SESSION['prod_form']['prod_name'] , $message );
		
		$message 		= 		str_replace( '{prod_price}' , $_SESSION['prod_form']['prod_price'] , $message );
		
		$mail			=		$_SESSION['prod_form']['prod_parent_email'];
		
		$mail			=		str_replace( '%40' , '@', $mail );
		
		$message 		= 		str_replace( '%40' , '@' , $message );
		
		$subject	=	"PlayerUp: Middleman Information";
		
		
		
		//wp_mail( $mail, $subject, $message,$headers); 
		
		$mail	=	mail($mail,$subject, $message,$headers);
		
		return true;


}




?>