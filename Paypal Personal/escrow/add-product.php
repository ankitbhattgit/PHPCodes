<?php 
	if( isset($_POST['submit']) && $_POST != null ){
		
	// Server Side Validations
		$error = array();
		//$user_name		=	mysql_real_escape_string(trim($_POST['user_name']));
				
		$user_email		=	mysql_real_escape_string(trim($_POST['user_email']));
		//$user_lname		=	mysql_real_escape_string(trim($_POST['user_lname']));
		
		//$user_password	= 	mysql_real_escape_string($_POST['user_password']);
		
		//$confirm_password 	= 	mysql_real_escape_string($_POST['user_cpasspassword']);
		
	// to maintain form data during next previous
	
		$temp_user_info	=	array();
		
	//	$temp_user_info['user_name']	=	$user_name	;

		$temp_user_info['user_email']	=	$user_email	;
		
		//$temp_user_info['user_lname']	=	$user_lname	;
		
		$_SESSION['user_form']	=	$temp_user_info;
		
			
	/* To Enter Product Form Details in Session */
		
		
		
		$prod_form_info['prod_name']	=	$_POST['prod_name'];
		
		
		
		//$prod_form_info['prod_qnty']	=	$_POST['prod_qnty'];
		
		$prod_form_info['prod_price']	=	$_POST['prod_price'];
		
		//$prod_form_info['prod_img']		=	$_FILES['prod_img']['name'];
		
		//$prod_form_info['prod_type']		=	$_POST['prod_typ'];
		
		//$prod_form_info['prod_cat']		=	$_POST['prod_cat'];
		
		//$prod_form_info['prod_img_path']	=	uploadImg();	//Upload Product Image after validations
		
		
		$_SESSION['prod_form']		=	$prod_form_info;
			
		 
		
		
	
	/***Ends***/
		
	
	/// ends
	
	// Ends Server Side Validations
		
		
		// if( !ctype_alnum( $user_name ) ){
			
			// $error['username_invalid'] = '<p>Please Enter Valid Username</p>';
		// }
		
			
		// if( !ctype_alnum( $user_lname ) ){
			
			// $error['userlname_invalid'] = '<p>Please Enter Valid Username</p>';
		// }
		
	/*	if( $confirm_password != $user_password ){
		
			$error['password_error'] = '<p>Password doesn\'t match.</p>';
		
		}*/
		
		if( !filter_var( $user_email, FILTER_VALIDATE_EMAIL ) ){
		
			$error['email_invalid']		=	'<p>Please Enter valid email address.</p>';
		
		}
		
		if( trim( $_POST['prod_name'] ) == null ){
		
			$error['prod_name'] = '<p>Please Enter Valid Product Name.</p>';

		}
		
		if( !is_numeric( $_POST['prod_price'] ) || $_POST['prod_price'] <= 0 ){
			
			$error['prod_price'] = '<p>Please Enter Valid Amount.</p>';
		}
		
		
		if( !empty( $error ) ){
			$_SESSION['error'] = $error;
			wp_redirect( get_permalink(get_the_ID()) );
			
			exit;
		
		}
		
				//$_SESSION['user_name']	=	$user_name;
				//$_SESSION['user_lname']	=	$user_lname;
				$_SESSION['user_email']	=	$user_email;
				$_SESSION['prod_name']	=	$_POST['prod_name'];
				$_SESSION['prod_desc']	=	$_POST['prod_desc'];
				//$_SESSION['prod_qnty']	=	$_POST['prod_qnty'];
				$_SESSION['prod_price']	=	$_POST['prod_price'];
				//$_SESSION['prod_img']	=	$_POST['prod_img_txt']['name'];
				//$_SESSION['prod_typ']	=	$_POST['prod_typ'];
			//	$_SESSION['prod_cat']	=	$_POST['prod_cat'];
				
		
				
				
				
			$_SESSION['prod_form']['prod_parent_email']	=	$_SESSION['user_email']; 
		
			$product_res	=	createProduct();
			
			if( $product_res ){
			
					$tempUrl	=	get_permalink(get_the_ID());
					if(strstr($tempUrl,'?')){
								wp_redirect( get_permalink(get_the_ID()).'&form=done' );
							}
					else{
						wp_redirect( get_permalink(get_the_ID()).'?form=done' );
					}
				//wp_redirect( get_permalink(get_the_ID()).'?form=done' );
				
			}else{
			
					$error_string = __('Some Error Occurs.Please Try Again Later..');
					echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
					die;
				}
	}
	
	
?>