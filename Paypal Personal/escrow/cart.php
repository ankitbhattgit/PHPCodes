<?php
	function cart(){
	
?>
  <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url(__FILE__).'css/style.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url(__FILE__).'css/accordian_css.css'?>"> 
  <script type="text/javascript" language="javascript" charset="utf-8" src="<?php echo plugin_dir_url(__FILE__).'js/accordian_nav.js'?>"></script> 
  
  
  <!--ToolTip Script -->
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(".tiptext, .description").mouseover(function() {

				jQuery(".description").show();
			}).mouseout(function() {
				
				jQuery(".description").hide();
			});
			
		});
	</script>
  
	<style type="text/css">
		
		.description {
			display:none;
			position:absolute;
			padding:10px;
			box-shadow:2px 2px 2px #000;
			border-radius:5px 5px 5px 5px;
			background-color:#666666;
			width:400px;
			color:#fff;
			z-index:999;
			line-height: 16px;
			
		}
		
		.description > h2{
		
			font-size:15px;
			padding-bottom:5px;
		}
		
		.description > h3{
		
			font-size:12px;
			padding-bottom:5px;
			padding-top:5px;
		}
		
		.tiptext{
		
			
		}
	.style1 {
	color: #FFFFFF;
	font-family: Verdana;
	font-size: 11px;
}
    .style2 {color: #DDDDDD}
    .style3 {color: #FFFFFF}
    </style>
  <!--Ends For ToolTip-->
  
  

<title>Shopping Cart - PlayerUp Middleman Service</title><div align="center">
<div class="cartheader">
<a href="http://www.playerup.com"><img src="http://www.playerup.com/images/middleman/middlemanbanner.png" border="0" align="middle" /></a>
</div>
</div>
 

 
 
</div><br /><br />
	 
<div id="cart_wrap">
	
	<div align="center">
	  <!--Product Info Starts-->
	  <a href="http://www.playerup.com"><img src="http://www.playerup.com/images/middleman.png" border="0" /></a> </div>
	 
<br />
	 
	<div id="prod_info">
		<h1>Your Shopping Cart List</h1> 
		<hr style="margin-bottom:10px;border-bottom:1px solid #393939;border-top:0px;border-left:0px;border-right:0px;"/>
		<!--For Cart List header -->
						<table border="1" width="100%" class="cart_list"  >
								<thead>
									<tr>
										<th width="90%">Product Name</th>
										<!--<th width="47%">Description</th>-->
										<th colspan="">Price</th>
									</tr>
								</thead>
						</table>
						<!--For Cart List header Ends -->
	<?php 
			
		/** On Update Cart Submit **/
				
					if( isset( $_POST['updateCart'] ) ){
					
					
						unset( $_SESSION['checkout'] );
						$amount	=	0;
						global $wpdb;
						$table_name	=	$wpdb->prefix.'products';
						foreach( $_POST['selected'] as $products ){
							
							$_SESSION['cartList'][]	=	$results[]	=	$wpdb	->	get_row("SELECT * FROM $table_name WHERE id=$products");
							
							
							
						
						}
												
					?>		
						
					<?php
						foreach( $_SESSION['cartList'] as $cartList ){
						
							getProductInfo($cartList->prod_key);
							
							$amount	+=	$cartList->prod_price;
						}
						
						$_SESSION['cartAmount']	=	$amount;
					}
			
			
			/***********************/
			
			
			
			
			
			
			
			
			
			
			
			/** On Delte Items from the Cart  **/
				
					if( isset( $_POST['removeCart'] ) ){
						
						$amount	=	0;
						
						if( !empty( $_SESSION['cartList'] ) ){
							foreach( $_SESSION['cartList'] as $key=>$val ){
							
								if( $_SESSION['cartList'][$key]->id	==	$_POST['removeCart'] ){
										
									$_SESSION['cartAmount']	-= 	$_SESSION['cartList'][$key]->prod_price;
									 
									 unset( $_SESSION['cartList'][$key] );
									 
									 $_SESSION['cartList']	= array_merge($_SESSION['cartList']); // To Reindex CartList Array
									 
									 break;
									
								
								}
								
							}
						
							foreach( $_SESSION['cartList'] as $cartList ){
							
								
								getProductInfo($cartList->prod_key);
								
							
							}
						}else{
						
							$_SESSION['cartAmount']		=	0;
							
						}
					}
			
			
			/***********************/
			
			
			if( isset( $_GET['p_key'] ) ){
				
				$amount	 =	0;
				
				global $wpdb;
				getProductInfo($_GET['p_key']);
				$added	=	$wpdb->get_row( "SELECT id,prod_price FROM esc_products WHERE prod_key='".$_GET['p_key']."'");
				$listed	=	$added->id;
				$_SESSION['cartAmount']	=	$added->prod_price;
					
						///Added Later
							
							$_SESSION['cartList'][]	=	$results[]	=	$wpdb	->	get_row("SELECT * FROM esc_products WHERE prod_key='".$_GET['p_key']."'");
							
						
						///Later Ends
						$_SESSION['checkout']	=	$_SESSION['cartList'];
						unset($_SESSION['cartList']);
			}
		?>
		<hr style="margin-bottom:10px;border-bottom:1px solid #393939;border-top:0px;border-left:0px;border-right:0px;"/>
		<span style="float:right;margin-right:34px;font-size:14px;font-family:verdana;font-weight:bold;color:#fff;">$<?php echo sprintf('%.2f',$_SESSION['cartAmount']);?></span>
		<h2 style="font-size:14px;font-family:verdana;font-weight:bold;color:white;">Total Amount</h2>
		<h4 style="padding-top:5px;font-family:verdana;font-size:10px;color:white;">
		
+ Service Charge (<span class="tiptext" id="desc">?<div class="description">
			
<h2>Service Charge Payment Information</h2><p>

Effective on March 15, 2014, service charges are now applicable for all card and electronic money transfering services. Please refer to the guidelines below for further details.<br /><br /></p>

<h3>What is a service charge?</h3><p>
A service charge is a small fee applied to those using a card or electronic money transfering service. The fee is non-refundable.<br /><br /></p>

<h3>Where can I see this service charge?</h3><p>
The service charge fee will appear on the next page after you have clicked "checkout". It will be listed under the category "Total Handling". <br /><br /></p>

<h3>Why is the service charge included?</h3><p>
A service charge is included to cover the cost the financial institution will bill us when you process your payment.<br /><br /></p>

<h3>How can I avoid paying the service charge?</h3><p>
Any card or electronic payments have a service charge. All cryptocurrency related payments to us using Bitcoin merchants such as Bitpay, Coinbase, or Cryptsy your service charge will be refunded upon completion of your order.</p>

</div></span>)</h4>
				
	</div>
	<div style="clear:both;"></div>
	
	<!--Product Info Ends -->
	
	<!-- Sidebar Starts-->
	
	<?php 
		
		$tempUrl	=	get_permalink(get_the_ID());
		if(strstr($tempUrl,'?')){
			$action	=	get_permalink(get_the_ID()).'&form=cart';
		}
		else{
			$action	=	 get_permalink(get_the_ID()).'?form=cart';
		}
	
	?>
	<form action="<?php echo $action;?>" method="POST" style="width:100%;">
		<div id="accordian_wrap"> 
		  <div id="w"> 
			<h1>Available Add On Packages</h1> 
			<hr style="margin-bottom:10px;border-bottom:1px solid #393939;border-top:0px;border-left:0px;border-right:0px;"/>
			<nav> 
			  <ul id="nav">   
				<?php 
							$cats	=	getCategories('cart');
							foreach( $cats as $cat ){
						?>
							 
							 <li><a href="#"><?php echo $cat[0]->cat_name?></a> 
								<ul> 
									  <li class="DetailHeader">
										  <a href="#">
											<table width='100%' bgcolor="#CCCCCC">
												<tr>
													<td align='left' width='6%'>Add</td>
													<td width='54%'>Name</td>
													<td width='40%'>Price</td>
												</tr>							
											</table>
										  </a>
										
									  <?php
										
											global $wpdb;
											$packages	=	$wpdb->get_results("SELECT * FROM esc_products WHERE prod_type='packages'");
											
											foreach( $cat as $package){
										
										?>
								  <li><a href="javascript:void(0);"><?php getProductList($package->id);?></a></li> 
									 <?php	
											}
									  ?>
							  </ul> 
							</li> 
						<?php					
							
							}
						?>
			  </ul> 
			</nav> 
		  </div> 
		</div>
		<?php 				
				if( isset( $_GET['p_key'] ) ){
					echo "<tr>";
								echo "<td align='left' width='6%'><input type='checkbox' checked='checked' name='selected[]' value='$listed' style='visibility:hidden;'/></td>";

					echo "</tr>";
				}
		
		
		 
		
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					//$action	=	get_permalink(get_the_ID()).'&form=g2s';
                                      $action	=	get_permalink(get_the_ID()).'&form=pay_way';
				}
				else{
					//$action	=	 get_permalink(get_the_ID()).'?form=g2s';
                                    $action	=	 get_permalink(get_the_ID()).'?form=pay_way';
				}
	
	
		
		?>
		
				
		
		<input type="submit" class='btn update-cart' value="Update Cart" name="updateCart"/>
		
		
		<a class="btne" href="<?php echo $action;?>">Checkout</a>
		

	<br /><br /><br />
	<span class="style3"><br />
	<br />
	</span>
	<div align="center" class="style1"><span class="style3"><a href="http://www.playerup.com/support-tickets/knowledge-base/middleman-buyers-guide.19/" target="_blank" class="style2">Read more about how our middleman services work</a></span></div>	
	<br /><br />
	<!-- Sidebar Ends-->
	</form>

</div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php

	//unset( $_SESSION['cartAmount'] );
	//unset($_SESSION['cartList']);
	//session_destroy();
}
?>


