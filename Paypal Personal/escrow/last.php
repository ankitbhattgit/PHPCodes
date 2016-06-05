<?php
function done( $atts, $content = null ) {
	wp_register_style('custom_style', plugin_dir_url(__FILE__). 'css/style.css');
	wp_enqueue_style( 'custom_style');
	
	wp_register_script('jquery.js', plugin_dir_url(__FILE__) . 'jquery.js', array('jquery'));
	wp_enqueue_script( 'jquery.js' );
	//echo get_template_directory_uri();

?>
	
<link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__). 'css/style.css';?>"/>
<script src="<?php echo plugin_dir_url(__FILE__). 'js/jquery.js'; ?>" type="text/javascript"></script>
<!--For Tabbed Panel Look-->

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
		  $(function() {
			$( "#tabs" ).tabs();
		  });
  </script>
<!--Tabbed Panel Look Ends -->

	<!-- multistep form --><div style="overflow:hidden">
<form id="msform" method="post" action="<?php echo get_permalink(get_the_ID()).'?form=3';?>">
	
	<fieldset class="fieldset_save">
		<h2 class="fs-title">Details Has Been Saved.</h2>
		<table cellpadding="3">
			<tbody>
				<!--<tr><td>Username</td><td id="review_user_name"><?php //echo ( ($_SESSION['user_name'] != null) && (isset($_SESSION['user_name'])) )?$_SESSION['user_name']:"";?></td></tr>-->
				<tr><td>Email</td><td id="review_user_email"><?php echo ( ($_SESSION['user_email'] != null) && (isset($_SESSION['user_email'])) )?$_SESSION['user_email']:"";?></td></tr>
				<tr><td>Product Name</td><td id="review_prod_name"><?php echo ( ($_SESSION['prod_name'] != null) && (isset($_SESSION['prod_name'])) )?$_SESSION['prod_name']:"";?></td></tr>
				<!--<tr><td>Product Description</td><td id="review_prod_desc"><?php //echo ( ($_SESSION['prod_desc'] != null) && (isset($_SESSION['prod_desc'])) )?$_SESSION['prod_desc']:"";?></td></tr>-->
				<!--<tr><td>Quantity</td><td id="review_prod_qnty"><?php //echo ( ($_SESSION['prod_qnty'] != null) && (isset($_SESSION['prod_qnty'])) )?$_SESSION['prod_qnty']:"";?></td></tr>-->
				<tr><td>Price</td><td id="review_prod_price">$<?php echo ( ($_SESSION['prod_price'] != null) && (isset($_SESSION['prod_price'])) )?$_SESSION['prod_price']:"";?></td></tr>
				<!--<tr><td>Type</td><td id="review_prod_type"><?php //echo ( ($_SESSION['prod_typ'] != null) && (isset($_SESSION['prod_typ'])) )?$_SESSION['prod_typ']:"";?></td></tr>-->
				<!--<tr><td>Category</td><td id="review_prod_cat"><?php //echo ( ($_SESSION['prod_cat'] != null) && (isset($_SESSION['prod_cat'])) )?$_SESSION['prod_cat']:"";?></td></tr>-->
				
			</tbody>
		</table>
	</fieldset>
</form>
</div>
<div style="clear:both"></div>
<!--<div id="esc_cart_link" style="margin: 0px auto; text-align: center; width: 100%;">
	<p>Use the link as a HTML widget to sell product on third party site.</p>
	<textarea style="width:700px;height:150px;text-align:left;text-indent:0;">
		<div id="playerup" class='<?php echo $_SESSION['prod_form']['prod_key']; ?>'></div>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="http://localhost/escrow/wp-content/plugins/escrow/js/java.js"></script>
	</textarea>
	<p>OR you can click on the below given button </p>
		<?php 
			//$pid	=	$_SESSION['prod_form']['prod_key'];
			//echo "<a class='buyNow' href='http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid'>Buy Now</a>";
		?>
</div>
-->
<div id="tabs" style="width:50% !important;margin-left:25%;font-size:12px;">
  <ul>
    <li><a href="#tabs-1">Forum</a></li>
	<li><a href="#tabs-2">Button</a></li>
    <li><a href="#tabs-3">Email</a></li>
	<li><a href="#tabs-4">HTML</a></li>
    <li><a href="#tabs-5">Widget</a></li>
  <!--  <li><a href="#tabs-3">Aenean lacinia</a></li>-->
  </ul>
  <div id="tabs-1">
  
    <p><!-- multistep form -->
		
				
			<textarea style="width:100%;text-align:left;text-indent:0;"><?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?></textarea>
	</p></p><br />
			<p align="left">
			<strong>Directions: Add your custom link to any forum</strong></p>
			</p></p><br />
			You just created a customized URL checkout middleman link. The final step is to copy the link from this page and paste it into any forum.
			</p></p></p><br />
			1. Right-click and copy the selected link above.
			</p></p></p><br />
			2. Go to your forum thread.
			</p></p></p><br />
			3. Right-click and paste your link into your forum thread.
			</p></p></p><br />
			4. Create and submit your forum thread.
			</p></p></p><br />
			5. Test the link to make sure it links to a PlayerUp middleman shopping cart page.
			</p></p></p><br />
			6. Buyer issues payment. 
			</p></p></p><br />
			7. PlayerUp provides instructions on how to finalize your transaction.
			</p></p></p><br />
			Need more help? <a href="http://www.playerup.com/accounts/help/" target="_blank">Submit a help forum thread ticket</a>.
			<br />
			</p>
	</p>
  </div>
  
  
  
 <div id="tabs-2">
    <p><div id="esc_cart_link" style="margin: 0px auto; text-align: center; width: 100%;">
	
	<!--<textarea style="width:100%;height:150px;text-align:left;text-indent:0;">
		<div id="playerup" class='<?php echo $_SESSION['prod_form']['prod_key']; ?>'></div>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="http://deftsoft.info/playerup/escrow/wp-content/plugins/escrow/js/java.js"></script>
	</textarea>-->
	<table width="100%"  border="1">
	<tbody>
		<tr>
		  <td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/250x50.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50.gif" height="50" width="250"/></td>
			
		</tr>
		
		<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/250x50-2.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50-2.gif" height="50" width="250"/></td>
			
		</tr>
	
	
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/250x50-3.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50-3.gif" height="50" width="250"/></td>
			
		</tr>
		
		
		
		
		<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/250x50-4.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50-4.gif" height="50" width="250"/></td>
			
		</tr>
		
		
		
		<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/250x50-5.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50-5.gif" height="50" width="250"/></td>
			
		</tr>
	
	
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/250x54-Dark.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x54-Dark.gif" height="50" width="250"/></td>
			
		</tr>
		
		
		
		<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/250x104-Dark-2.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x104-Dark-2.gif" height="50" width="250"/></td>
			
		</tr>
	
	
	
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/250-104-Dark-3.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250-104-Dark-3.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/250-104-Dark-4.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250-104-Dark-4.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/500x108-Dark.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x108-Dark.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/500x108-Dark-2.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x108-Dark-2.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/500-108-Dark-3.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500-108-Dark-3.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/500-108-Dark-4.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500-108-Dark-4.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/500x100.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/500x100-2.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100-2.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/500x100-3.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100-3.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/500x100-4.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100-4.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;">[CENTER][URL='<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>'][IMG]http://www.playerup.com/middleman/images/buttons/500x100-5.gif[/IMG] [/URL][/CENTER]</textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100-5.gif" height="50" width="250"/></td>
			
		</tr>
	
	
	
	
			
		</tr>

	</tbody>
</table>
	</div>
<p align="left"><br />
	<strong>Directions: Add your custom button to any forum</strong></p>
			</p></p><br />
			You just created a customized URL checkout middleman button. The final step is to copy the code from this page and paste it into any forum.
			</p></p></p><br />
			1. Right-click and copy the selected code above.
			</p></p></p><br />
			2. Go to your forum thread.
			</p></p></p><br />
			3. Confirm that your forum supports BB Code. Most forums allow it.
			</p></p></p><br />
			4. Right-click and paste your code into your forum thread.
			</p></p></p><br />
			5. Create and submit your forum thread.
			</p></p></p><br />
			6. Test the link to make sure it links to a PlayerUp middleman shopping cart page.
			</p></p></p><br />
			7. Buyer issues payment. 
			</p></p></p><br />
			8. PlayerUp provides instructions on how to finalize your transaction.
			</p></p></p><br />
			Need more help? <a href="http://www.playerup.com/accounts/help/" target="_blank">Submit a help forum thread ticket</a>.
			<br />
			</p>
	</p>
</div>

	
  
  
  <div id="tabs-3">
 
    <p><!-- multistep form -->
		
				
			<textarea style="width:100%;text-align:left;text-indent:0;"><?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?></textarea>
    <p align="left"><br />
	<strong>Directions: Add your custom link to any email</strong></p>
			</p></p><br />
			You just created a customized URL checkout middleman link. The final step is to copy the link from this page and paste it into any email.
			</p></p></p><br />
			1. Right-click and copy the selected link above.
			</p></p></p><br />
			2. Go to your email draft.
			</p></p></p><br />
			3. Right-click and paste your link into your email. 
			</p></p></p><br />
			4. Send the email.
			</p></p></p><br />
			5. Test the link to make sure it links to a PlayerUp middleman shopping cart page.
			</p></p></p><br />
			6. Buyer issues payment. 
			</p></p></p><br />
			7. PlayerUp provides instructions on how to finalize your transaction.
			</p></p></p><br />
			Need more help? <a href="http://www.playerup.com/accounts/help/" target="_blank">Submit a help forum thread ticket</a>.
			<br />
			</p>
	</p>
	
	  </div>
  
  
  
 <div id="tabs-4">
    <p><div id="esc_cart_link" style="margin: 0px auto; text-align: center; width: 100%;">
	
	<!--<textarea style="width:100%;height:150px;text-align:left;text-indent:0;">
		<div id="playerup" class='<?php echo $_SESSION['prod_form']['prod_key']; ?>'></div>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="http://deftsoft.info/playerup/escrow/wp-content/plugins/escrow/js/java.js"></script>
	</textarea>-->
	<table width="100%"  border="1">
	<tbody>
		<tr>
		  <td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/250x50.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50.gif" height="50" width="250"/></td>
			
		</tr>
		
		<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/250x50-2.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50-2.gif" height="50" width="250"/></td>
			
		</tr>
	
	
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/250x50-3.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50-3.gif" height="50" width="250"/></td>
			
		</tr>
		
		
		
		
		<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/250x50-4.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50-4.gif" height="50" width="250"/></td>
			
		</tr>
		
		
		
		<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/250x50-5.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x50-5.gif" height="50" width="250"/></td>
			
		</tr>
	
	
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/250x54-Dark.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x54-Dark.gif" height="50" width="250"/></td>
			
		</tr>
		
		
		
		<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/250x104-Dark-2.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250x104-Dark-2.gif" height="50" width="250"/></td>
			
		</tr>
	
	
	
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/250-104-Dark-3.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250-104-Dark-3.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/250-104-Dark-4.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/250-104-Dark-4.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/500x108-Dark.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x108-Dark.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/500x108-Dark-2.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x108-Dark-2.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/500-108-Dark-3.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500-108-Dark-3.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/500-108-Dark-4.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500-108-Dark-4.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/500x100.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/500x100-2.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100-2.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/500x100-3.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100-3.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/500x100-4.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100-4.gif" height="50" width="250"/></td>
			
		</tr>
	<tr>
		<td width="58%">
		  
		  <textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div align="center"><a href="<?php $pid	=	$_SESSION['prod_form']['prod_key'];
			
				$tempUrl	=	get_permalink(get_the_ID());
				if(strstr($tempUrl,'?')){
					echo $action	=	 get_permalink(get_the_ID()).'&form=cart&p_key='.$pid ;
				}
				else{
					echo $action	=	 get_permalink(get_the_ID()).'?form=cart&p_key='.$pid ;
				}
			 
			
			//echo "http://www.deftsoft.info/playerup/escrow/sys?form=cart&p_key=$pid";
			//echo get_permalink( get_the_ID() );?>"><img src="http://www.playerup.com/middleman/images/buttons/500x100-5.gif"></a></div></textarea></td>
		
			<td width="42%"><img src="<?php echo site_url();?>/images/buttons/500x100-5.gif" height="50" width="250"/></td>
			
		</tr>
	
		</tbody>
</table>
	</div>
	<p align="left"><br />
			<strong>Directions: Add your HTML button to any third party site</strong></p>
			</p></p><br />
			You just created a customized URL checkout middleman html button. The final step is to copy the code from this page and paste it into any third party site.
			</p></p></p><br />
			1. Right-click and copy the selected code above.
			</p></p></p><br />
			2. In your website editor or admin page, open the page where you want to add your button.
			</p></p></p><br />
			3. The code must be pasted in the "code" view, where you can view and edit HTML.
			</p></p></p><br />
			4. Look for an option to view or edit HTML.
			</p></p></p><br />
			5. Find the section of the page where you want your button to appear.
			</p></p></p><br />
			6. Right-click and paste your button code into the HTML.
			</p></p></p><br />
			7. Save and publish the page. (The preview function in your editor may not display the button code correctly.)
			</p></p></p><br />
			8. Test the link to make sure it links to a PlayerUp middleman shopping cart page. 
			</p></p></p><br />
			9. Buyer issues payment. 
			</p></p></p><br />
			10. PlayerUp provides instructions on how to finalize your transaction.
			</p></p></p><br />
			Need more help? <a href="http://www.playerup.com/accounts/help/" target="_blank">Submit a help forum thread ticket</a>.
			<br />
			</p>
	

	
	</p>
	
	
			
		

	</tbody>
</table>
	
</div>
  
  
  
  <div id="tabs-5">
    <p><div id="esc_cart_link" style="margin: 0px auto; text-align: center; width: 100%;">
	
	<!--<textarea style="width:100%;height:150px;text-align:left;text-indent:0;">
		<div id="playerup" class='<?php echo $_SESSION['prod_form']['prod_key']; ?>'></div>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="http://deftsoft.info/playerup/escrow/wp-content/plugins/escrow/js/java.js"></script>
	</textarea>-->
	<table width="100%"  border="1">
	<tbody>
		<tr>
		  <td width="58%"><textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div id="playerup" class='<?php echo $_SESSION['prod_form']['prod_key']; ?>' name='<?php echo site_url().'/wp-content/plugins/escrow/main.php?pid='.$_SESSION['prod_form']['prod_key'].'&button=250x50-3.gif&data='.urlencode($action);?>'></div><script src="http://code.jquery.com/jquery-1.10.1.min.js"></script><script type="text/javascript" src="<?php echo site_url();?>/wp-content/plugins/escrow/js/java.js"></script></textarea></td>
			<td width="42%"><img src="<?php echo site_url();?>/wp-content/plugins/escrow/img/250x50-3.gif" height="50" width="250"/></td>
			
		</tr>
		<tr>
		  <td width="58%"><textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div id="playerup" class='<?php echo $_SESSION['prod_form']['prod_key']; ?>' name='<?php echo site_url().'/wp-content/plugins/escrow/main.php?pid='.$_SESSION['prod_form']['prod_key'].'&button=250-104-Dark-3.gif&data='.urlencode($action);?>'></div><script src="http://code.jquery.com/jquery-1.10.1.min.js"></script><script type="text/javascript" src="<?php echo site_url();?>/wp-content/plugins/escrow/js/java.js"></script></textarea></td>
			<td width="42%"><img src="<?php echo site_url();?>/wp-content/plugins/escrow/img/250-104-Dark-3.gif" height="50" width="250"/></td>
			
		</tr>
		<tr>
		  <td width="58%"><textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div id="playerup" class='<?php echo $_SESSION['prod_form']['prod_key']; ?>' name='<?php echo site_url().'/wp-content/plugins/escrow/main.php?pid='.$_SESSION['prod_form']['prod_key'].'&button=250-104-Dark-4.gif&data='.urlencode($action);?>'></div><script src="http://code.jquery.com/jquery-1.10.1.min.js"></script><script type="text/javascript" src="<?php echo site_url();?>/wp-content/plugins/escrow/js/java.js"></script></textarea></td>
			<td width="42%"><img src="<?php echo site_url();?>/wp-content/plugins/escrow/img/250-104-Dark-4.gif" height="50" width="250"/></td>
			
		</tr>
		<tr>
		  <td width="58%"><textarea style="width:100%;height:100%;text-align:left;text-indent:0;"><div id="playerup" class='<?php echo $_SESSION['prod_form']['prod_key']; ?>' name='<?php echo site_url().'/wp-content/plugins/escrow/main.php?pid='.$_SESSION['prod_form']['prod_key'].'&button=250x104-Dark-2.gif&data='.urlencode($action);?>'></div><script src="http://code.jquery.com/jquery-1.10.1.min.js"></script><script type="text/javascript" src="<?php echo site_url();?>/wp-content/plugins/escrow/js/java.js"></script></textarea></td>
			<td width="42%"><img src="<?php echo site_url();?>/wp-content/plugins/escrow/img/250x104-Dark-2.gif" height="50" width="250"/></td>
			
		</tr>
		
		
		
		
		
		
		
		
		
		
	</tbody>
</table>
	</div>
	<p align="left"><br />
			<strong>Directions: Add your HTML widget to any third party site</strong></p>
			</p></p><br />
			You just created a customized URL checkout middleman html widget. The final step is to copy the code from this page and paste it into any third party site.
			</p></p></p><br />
			1. Right-click and copy the selected code above.
			</p></p></p><br />
			2. In your website editor or admin page, open the page where you want to add your button.
			</p></p></p><br />
			3. The code must be pasted in the "code" view, where you can view and edit HTML.
			</p></p></p><br />
			4. Look for an option to view or edit HTML.
			</p></p></p><br />
			5. Find the section of the page where you want your button to appear.
			</p></p></p><br />
			6. Right-click and paste your button code into the HTML.
			</p></p></p><br />
			7. Save and publish the page. (The preview function in your editor may not display the button code correctly.)
			</p></p></p><br />
			8. Test the link to make sure it links to a PlayerUp middleman shopping cart page. 
			</p></p></p><br />
			9. Buyer issues payment. 
			</p></p></p><br />
			10. PlayerUp provides instructions on how to finalize your transaction.
			</p></p></p><br />
			Need more help? <a href="http://www.playerup.com/accounts/help/" target="_blank">Submit a help forum thread ticket</a>.
			<br />
			</p>
	

	
	</p>
  </div>
  <!--<div id="tabs-4">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>-->
</div>



<?php 
	unset($_SESSION['user_form']);
	unset($_SESSION['prod_form']);
	unset($_SESSION['is_logged_in']);
	//print_r($_SESSION);		
}
?>
	