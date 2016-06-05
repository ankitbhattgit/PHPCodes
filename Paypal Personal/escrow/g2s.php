<?php
	function g2s(){
		$merchantSiteId				=	32360;
		$handlingPercent		=		3.00;	//3 %  extra handling charges per transaction
		if(isset($_REQUEST['paypal'])){
			$merchantSiteId				=	114658;
			$handlingPercent		=		6.00;	//3 %  extra handling charges per transaction
		}
	if(  empty( $_SESSION ) ){
		
		echo "<h1 style='font-size:13px;'>Your Your shopping cart is empty. Please go back and add the item back to your cart.</h1>";
		$tempUrl	=	get_permalink(get_the_ID());
		if(strstr($tempUrl,'?')){
			$action	=	get_permalink(get_the_ID()).'&form=cart';
		}
		else{
			$action	=	 get_permalink(get_the_ID()).'?form=cart';
		}
		echo '<a href='.$action.' style="font-size:13px;"><< Go Back</a>';
		die();
	}
	
	
	if( empty( $_SESSION['checkout'] ) ){
	
			
			$numberOfItems		=		0;
			foreach( $_SESSION['cartList'] as  $key=>$val ){
			
				$_SESSION['cartList']['item_name_'.($key+1)]		=		$_SESSION['cartList'][$key]	->	prod_name;
				
				$_SESSION['cartList']['item_amount_'.($key+1)]		=		$_SESSION['cartList'][$key]	->	prod_price;

				$_SESSION['cartList']['item_quantity_'.($key+1)]		=		1;
			
				$itemList	.=	'item_name_'.($key+1).'='.$_SESSION['cartList']['item_name_'.($key+1)].'&item_amount_'.($key+1).'='.$_SESSION['cartList']['item_amount_'.($key+1)].'&item_quantity_'.($key+1).'=1&';
				
				$item		.=		$_SESSION['cartList']['item_name_'.($key+1)].$_SESSION['cartList']['item_amount_'.($key+1)].'1';
				
				$numberOfItems++;
			}
			
			//$handlingPercent		=		3.00;	//3 %  extra handling charges per transaction
			
			$handlingCharges		=		( $_SESSION['cartAmount'] * $handlingPercent ) /100;
			
			$_SESSION['cartAmount']	+=		 $handlingCharges;
			
			$checksum	=	md5('5pvwIUi3HynxPavXx4oyVXn8DedGLXXWbueYnbfJqMuIvdRB2pIcOcYtrhOIUq5B6868828917728003155USD'.$_SESSION['cartAmount'].$item.date('Y-m-d.h:m:s'));
			
			/*echo "<pre>";
			
				print_r( $_SESSION );
			
			echo "</pre>";*/
			
			
			//echo "https://secure.gate2shop.com/ppp/purchase.do?version=3.0.0&merchant_id=6868828917728003155&merchant_site_id=32360&total_amount=".$_SESSION['cartAmount']."&currency=USD&".$itemList."time_stamp=".date('Y-m-d.h:m:s')."&checksum=".$checksum."&numberofitems=".$numberOfItems;
			//die;
			
			header("Location:"."https://secure.gate2shop.com/ppp/purchase.do?version=3.0.0&merchant_id=6868828917728003155&merchant_site_id=$merchantSiteId&total_amount=".sprintf("%.2f",$_SESSION['cartAmount'])."&currency=USD&".$itemList."time_stamp=".date('Y-m-d.h:m:s')."&checksum=".$checksum."&numberofitems=".$numberOfItems."&handling=".$handlingCharges);
			
				
			// Handle Cartlist Session
			
	
	}else{
	
			
			foreach( $_SESSION['checkout'] as  $key=>$val ){
			
				$_SESSION['checkout']['item_name_'.($key+1)]		=		$_SESSION['checkout'][$key]	->	prod_name;
				
				$_SESSION['checkout']['item_amount_'.($key+1)]		=		$_SESSION['checkout'][$key]	->	prod_price;

				$_SESSION['checkout']['item_quantity_'.($key+1)]		=		1;
				
				$itemList	.=	'item_name_'.($key+1).'='.$_SESSION['checkout']['item_name_'.($key+1)].'&item_amount_'.($key+1).'='.$_SESSION['checkout']['item_amount_'.($key+1)].'&item_quantity_'.($key+1).'=1&';
			
				$item		.=		$_SESSION['checkout']['item_name_'.($key+1)].$_SESSION['checkout']['item_amount_'.($key+1)].'1';
			}
			
			//$handlingPercent		=		3.00;	//3 %  extra handling charges per transaction
			
			$handlingCharges		=		( $_SESSION['cartAmount'] * $handlingPercent ) /100;
			
			$_SESSION['cartAmount']	+=		 $handlingCharges;
			
			
			$checksum	=	md5('5pvwIUi3HynxPavXx4oyVXn8DedGLXXWbueYnbfJqMuIvdRB2pIcOcYtrhOIUq5B6868828917728003155USD'.$_SESSION['cartAmount'].$item.date('Y-m-d.h:m:s'));
			
header("Location:"."https://secure.gate2shop.com/ppp/purchase.do?version=3.0.0&merchant_id=6868828917728003155&merchant_site_id=$merchantSiteId&total_amount=".$_SESSION['cartAmount']."&currency=USD&".$itemList."time_stamp=".date('Y-m-d.h:m:s')."&checksum=".$checksum."&handling=".$handlingCharges);
	
	}
	
	session_destroy();
	exit;
}
?>
