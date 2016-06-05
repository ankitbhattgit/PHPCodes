<?php
	function cart(){
?>
  <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url(__FILE__).'css/style.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url(__FILE__).'css/accordian_css.css'?>"> 
  <script type="text/javascript" language="javascript" charset="utf-8" src="<?php echo plugin_dir_url(__FILE__).'js/accordian_nav.js'?>"></script> 

<div id="cart_wrap">
	
	<!--Product INfo Starts-->
	
	<div id="prod_info">
		<?php 
			if( isset( $_GET['p_key'] ) ){
			
				getProductInfo($_GET['p_key']);
			
			}
		
		?>
	</div>
	<div style="clear:both;"></div>
	
	<!--Product Info Ends -->
	
	<!-- Sidebar Starts-->
	<div id="accordian_wrap"> 
	  <div id="w"> 
		<h1>Available Packages</h1> 
		
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
	
	<!-- Sidebar Ends-->
	<div class='btn update-cart'>Update Cart</div>
</div>
<?php
}
?>