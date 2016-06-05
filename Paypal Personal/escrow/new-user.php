<?php
function signup( $atts, $content = null ) {

	
	wp_register_style('custom_style', plugin_dir_url(__FILE__). 'css/style.css');
	wp_enqueue_style( 'custom_style');
	
	wp_register_script('jquery.js', plugin_dir_url(__FILE__) . 'jquery.js', array('jquery'));
	wp_enqueue_script( 'jquery.js' );
	//echo get_template_directory_uri();

?><link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__). 'css/style.css';?>"/>
<script src="<?php echo plugin_dir_url(__FILE__). 'js/jquery.js'; ?>" type="text/javascript"></script>
<?php 

	if( isset($_POST['wp-submit']) && !empty($_POST) ){
			/*********On Login User***********/
		
			$auth	=	loginAuth();	//To Authenticate the logged in User
			if( !$auth ){
				
				$_SESSION['messageClass'] = 'red-message-box';
				
				wp_redirect( get_permalink(get_the_ID()).'?form=1' );
			}else{
				
				$user_id = email_exists( $_POST['log'] );
				$fname	=	get_user_meta($user_id,'first_name',true);
				$lname	=	get_user_meta($user_id,'last_name',true);
				
				?>
				
				
					<script>
						$(document).ready(function(){
						
						$("#user_detail input").attr('readonly','readonly');	
						
						$("[name=user_name]").val('<?php echo $fname; ?>');
						
						$("[name=user_lname]").val('<?php echo $lname; ?>');
						
						$("[name=user_email]").val('<?php echo $_POST['log']; ?>');
					
						});
					</script>
			<?php }			
	/*************************/
		?>
		
	<?php }
		$tempUrl	=	get_permalink(get_the_ID());
		if(strstr($tempUrl,'?')){
					$action	=	get_permalink(get_the_ID()).'&form=2';
				}
		else{
			$action	=	 get_permalink(get_the_ID()).'?form=2';
		}
		
	?><!-- multistep form -->
<form id="msform" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
	<!-- progressbar -->
	<!--<ul id="progressbar">
		<li class="active">Seller Info</li>
		<li>Add Product</li>
		<li>Save & Submit</li>
	</ul>-->
	<!-- fieldsets -->
	<fieldset id="user_detail">
		<h2 class="fs-title">Create A Middleman Listing</h2>
		<!--<h3 class="fs-subtitle">This is step 1</h3>-->
		<h2 class="red-message-box"></h2>
		<!--<input type="text" name="user_name" placeholder="First Name" required="required" value="<?php echo (isset($_SESSION['user_form']['user_name']))?$_SESSION['user_form']['user_name']:'';?>"/>
		<div class="login_error">
			<?php
				echo ( isset($_SESSION['error']['username_invalid']) && $_SESSION['error']['username_invalid'] != null )? $_SESSION['error']['username_invalid']:"";
			?>
		</div>-->
		<!--<input type="text" name="user_lname" placeholder="Last Name" required="required" value="<?php echo (isset($_SESSION['user_form']['user_lname']))?$_SESSION['user_form']['user_lname']:'';?>"/>
		<div class="login_error">
			<?php
				echo ( isset($_SESSION['error']['userlname_invalid']) && $_SESSION['error']['userlname_invalid'] != null )? $_SESSION['error']['userlname_invalid']:"";
			?>
		</div>-->
		<input type="email" name="user_email" placeholder="Email" value="<?php echo (isset($_SESSION['user_form']['user_email']))?$_SESSION['user_form']['user_email']:'';?>" />
		<div class="login_error">
			<?php
				echo ( isset($_SESSION['error']['email_invalid']) && $_SESSION['error']['email_invalid'] != null )? $_SESSION['error']['email_invalid']:"";
			?>
		</div>
		<!--<input type="password" name="user_password" placeholder="Password" required="required" />-->
		<!--<input type="password" name="user_cpasspassword" placeholder="Confirm Password" required="required" />-->
		
		
	</fieldset>
	
	<!---Products Details-->
	<fieldset class="fieldset_product_details">
		
		
		<!--<h3 class="fs-subtitle">This is step 2</h3>-->
		<!--<h2 class="red-message-box"></h2>-->
		<input type="text" name="prod_name" placeholder="Product Name" required="required" value="<?php echo (isset($_SESSION['prod_form']['prod_name']))?$_SESSION['prod_form']['prod_name']:'';?>" />
		<div class="login_error">
			<?php
				echo ( isset($_SESSION['error']['prod_name']) && $_SESSION['error']['prod_name'] != null )? $_SESSION['error']['prod_name']:"";
			?>
		</div>
	<!--	<input type="number" name="prod_qnty" placeholder="Quantity" required="required" value="<?php echo (isset($_SESSION['prod_form']['prod_qnty']))?$_SESSION['prod_form']['prod_qnty']:'';?>" />
		<div class="login_error">
			<?php
				echo ( isset($_SESSION['error']['prod_qnty']) && $_SESSION['error']['prod_qnty'] != null )? $_SESSION['error']['prod_qnty']:"";
			?>
		</div>-->
		<input type="text" name="prod_price" placeholder="Enter Price in Dollars" required="required" value="<?php echo (isset($_SESSION['prod_form']['prod_price']))?$_SESSION['prod_form']['prod_price']:'';?>" />
		<div class="login_error">
			<?php
				echo ( isset($_SESSION['error']['prod_price']) && $_SESSION['error']['prod_price'] != null )? $_SESSION['error']['prod_price']:"";
			?>
		</div>
		
		<!--<select name="prod_typ" required="required"  />
			<option value="product">Product</option>
			<option value="packages">Package</option>
		</select>-->
		
		<!--<select name="prod_cat" required="required" />
			<?php 
				$cats	=	getCategories('select');
				foreach( $cats as $cat ){
			?>	
				<option value="<?php echo $cat->id;?>"><?php echo $cat->cat_name;?></option>
			<?php
				}
			?>
		</select>-->
		<!--<div class="img_upload_div">
			<div class="fileupload_wrapper">
			<input type="file" name="prod_img" value="<?php echo (isset($_SESSION['prod_form']['prod_img']))?$_SESSION['prod_form']['prod_img']:'';?>" />
			</div>
			<input type="text" name="prod_img_txt" placeholder="Browse Image To Upload" style="width:55%;" onclick="$('[name=prod_img]').click();" onchange="$('[name=prod_img]').val($('[name=prod_img_txt]').val())" value="<?php echo (isset($_SESSION['prod_form']['prod_img']))?$_SESSION['prod_form']['prod_img']:'';?>" />
			<input type="button" name="prod_img_but" class="action-button" value="Browse..." onclick="$('[name=prod_img]').click();" />
			
		</div>-->
		
		<!--<textarea name="prod_desc"> <?php //echo (isset($_SESSION['prod_form']['prod_desc']))?$_SESSION['prod_form']['prod_desc']:'';?></textarea>-->
		
		<input type="submit" name="submit" class="action-button" value="Submit" />
	</fieldset>
	<div class="login_error">
			<?php
				unset($_SESSION['prod_form']);
				unset($_SESSION['error']);	//To unset the Error messages on refresh
				unset($_SESSION['user_form']);//To unset the user details on page refresh
			?>
		</div>
	<!--Ends-->
</form>	
<?php 	
}
?>