<?php
		function pay_way(){
		
			$tempUrl	=	'';
			$tempUrl	=	get_permalink(get_the_ID());
			if(strstr($tempUrl,'?')){
				$action	=	get_permalink(get_the_ID()).'&form=';
			}
			else{
				$action	=	 get_permalink(get_the_ID()).'?form=';
			}
	?>	
	 <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url(__FILE__).'css/style.css'?>">
 
  <script type="text/javascript" language="javascript" charset="utf-8" src="<?php echo plugin_dir_url(__FILE__).'js/accordian_nav.js'?>"></script> 
  <script type="text/javascript">
			jQuery(document).ready(function(){
			
						jQuery("#cssmenu ul li a").on("click",function(){
							var _activateGateway	=	"";
							_activateGateway	=	jQuery(this).attr("data-toggle");
							$( "#paymentGatewayWrap div.paymentGrid" ).each(function( index ) {
								 if( jQuery(this).attr("id")	==	_activateGateway ){
								
											 jQuery(this).removeClass("off").addClass("on");
								
								}else{
								
										 jQuery(this).removeClass("on").addClass("off");
								}
							});
						
						});
			});
  </script>
  <style type="text/css">
		#cssmenu {
			  width: 170px;
			  border-size: 1px;
			  border-width: 1px;
			  
			}
			#cssmenu ul {
			  list-style: none;
			  padding: 0px;
			  margin: 0px;
			}
			
			#cssmenu ul li{
				background: none repeat scroll 0 0 #2871BB;
				margin-top: 6px;
				border-radius: 0 19px;
			}
			#cssmenu ul {
			 background:#2a2a2a;
			}
			#cssmenu li a {
			 color: #D4D4D4;
			font-family: verdana;
			font-weight: bold;
			height: 24px;
			text-decoration: none;
			font-size:0.82em;
			}
			#cssmenu li a:link,
			#cssmenu li a:visited {
			  display: block;
			  background-repeat: no-repeat;
			  padding: 8px 0 0 10px;
			}
			#cssmenu li a:hover {
			  
			  background-repeat: no-repeat;
			  padding: 8px 0 0 10px;
			}
			#cssmenu li a:active {
			  
			  background-repeat: no-repeat;
			  padding: 8px 0 0 10px;
			}
			
			#payway_wrap{
			
				border: 1px solid #393939;
				border-radius: 5px;
				height: auto;
				margin: 50px 10px auto 200px;
				width: 800px;
			}
			
			#menuWrap{
			
				border: 1px solid #393939;
				border-radius: 5px;
				height: auto;
				margin: 5px;
				padding: 5px;
				width: 170px;
				float:left;
			
			}
			
			#headerText h1{
					border: 1px solid #393939;
					border-radius: 5px;
					color: #FFFFFF;
					font-family: 'Merienda','Trebuchet MS',Verdana,sans-serif;
					font-size: 25px;
					font-weight: bold;
					letter-spacing: -0.03em;
					line-height: 1.7em;
					text-align: left;
					padding-left: 5px;
			}
			
			#headerText{ padding: 5px;}
			.paymentGrid{border: 1px solid #393939;	border-radius: 5px;float: left; height: auto; margin: 5px; width: 210px; text-align:center;}
			.gatewayLogo{  height:auto;width:100%;}
			
			.paybtn{
				background: none repeat scroll 0 0 #2871BB;
				border: medium none;
				border-radius: 2px;
				color: #F9F9F9;
				cursor: pointer;
				display: inline-block;
				font-size: 13px;
				font-weight: bold;
				line-height: 2.2;
				padding: 6px;
				text-align: center;
				text-decoration: none;
				width: 200px;
				font-family:verdana;
			
			}
			
			#MoneyBookers{
				display:none;
			
			}
			
			#Paypal{
				display:none;
			
			}
			
			#paymentGatewayWrap .on{
				
					display:block;
			
			}
			
			#paymentGatewayWrap .off{
				
					display:none;
			
			}
			
	</style>
	
  <!--ToolTip Script -->
  <div id="payway_wrap">
	<div align="center">
	  <!--Product Info Starts-->
		<a href="http://www.playerup.com"><img border="0" src="http://www.playerup.com/images/middleman.png"></a> 
	 </div>
	 <div id="headerText"><h1>Select Your Payment Method:</h1></div>
  <div id="menuWrap">
		<div id='cssmenu'>
		<ul>
		   <li class='active'><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Gate2Shop"><span>Credit/Debit Card</span></a></li>
		   <li><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Alipay"><span>Alipay</span></a></li>
		   <li><a href='javascript:void(0);' id="Others_On" data-toggle="Amazon"><span>Amazon</span></a></li>
		   <li><a href='javascript:void(0);' id="Others_On" data-toggle="Apple"><span>Apple Gift Card</span></a></li>
		   <li><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Astropay"><span>AstroPay</span></a></li>
		   <li><a href='javascript:void(0);' id="Others_On" data-toggle="Bitcoin"><span>Bitcoin</span></a></li>
		   <li class='last'><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Cashu"><span>CashU</span></a></li>
		  
		   
		</ul>
		</div>	</div>
		
		
		
  <div id="menuWrap">
		<div id='cssmenu'>
		<ul>
		   <li class='active'><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Dineromail"><span>Dineromail</span></a></li>
		   <li><a href='javascript:void(0);' id="Gate2Shop_On" data-toggle="Giropay"><span>Giropay</span></a></li>
		   <li><a href='javascript:void(0);' id="Others_On" data-toggle="Google"><span>Google Play</span></a></li>
		   <li><a href='javascript:void(0);' id="Others_On" data-toggle="Greendot"><span>Greendot</span></a></li>
		   <li><a href='javascript:void(0);' id="Gate2Shop_On" data-toggle="MoneyBookers"><span>MoneyBookers</span></a></li>
		   <li><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Neteller"><span>Neteller</span></a></li>
		   <li class='last'><a href='javascript:void(0);' id="Paypal_On" data-toggle="Paypal"><span>PayPal</span></a></li>
		  
		</ul>
		</div>	</div>
		
	
	
  <div id="menuWrap">
		<div id='cssmenu'>
		<ul>
		   <li class='active'><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Paysafecard"><span>PaySafeCard</span></a></li>
		   <li><a href='javascript:void(0);' id="Others_On" data-toggle="Payza"><span>Payza</span></a></li>
		   <li><a href='javascript:void(0);' id="Others_On" data-toggle="Playerup"><span>PlayerUp Credit</span></a></li>
		   <li><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Qiwi"><span>QIWI Wallet</span></a></li>
		   <li><a href='javascript:void(0);' id="Gate2Shop_On" data-toggle="Sofort"><span>Sofort</span></a></li>
		   <li><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Webmoney"><span>WebMoney</span></a></li>
		   <li class='last'><a href='javascript:void(0);' id="MoneyBookers_On" data-toggle="Other"><span>Other Options</span></a></li>
		</ul>
		</div>	</div>
		
		
		
	
	
	<div id="paymentGatewayWrap">
		<div class="paymentGrid on" id="Gate2Shop">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/gate2shop.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s">Checkout</a>
		</div>
		<div class="paymentGrid off" id="Other">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/gate2shop.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s&paypal=1">Checkout</a>
		</div>
		<div class="paymentGrid off" id="Paypal">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/paypal.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>paypal">Checkout</a>
		</div>
		<div class="paymentGrid off" id="MoneyBookers">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/skrill.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>skrill">Checkout</a>
			</div>
		<div class="paymentGrid off" id="Alipay">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/alipay.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s&paypal=1">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Amazon">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/amazon.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="http://www.playerup.com/threads/amazon-gift-card-guide-how-to-send-payments.1044110/" target="_blank">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Apple">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/apple.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="http://www.playerup.com/threads/apple-gift-cards-guide-how-to-send-payments.1045213/" target="_blank">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Astropay">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/astropay.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s&paypal=1">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Bitcoin">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/bitcoin.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="http://www.playerup.com/threads/bitcoin-guide-how-to-buy-and-sell-bitcoins.700742/" target="_blank">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Cashu">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/cashu.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s&paypal=1">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Dineromail">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/dineromail.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s&paypal=1">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Giropay">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/giropay.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>skrill">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Greendot">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/greendot.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="http://www.playerup.com/threads/greendot-moneypak-guide-how-to-send-payments.1045211/" target="_blank">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Google">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/google.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="http://www.playerup.com/threads/google-play-gift-cards-guide-how-to-send-payments.1045224/" target="_blank">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Neteller">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/neteller.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s&paypal=1">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Paysafecard">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/paysafecard.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s&paypal=1">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Payza">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/payza.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="http://www.playerup.com/threads/payza-guide-how-to-send-payments.1044125" target="_blank">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Playerup">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/playerup.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="http://www.playerup.com/threads/playerup-credits-guide-how-to-send-payments.1045201/" target="_blank">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Qiwi">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/qiwi.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s&paypal=1">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Sofort">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/sofort.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>skrill">Checkout</a>
		</div>	
		<div class="paymentGrid off" id="Webmoney">
			<img src="<?php echo  plugin_dir_url(__FILE__).'/img/webmoney.jpg'?>" class="gatewayLogo">
			<a class="paybtn" href="<?php echo $action;?>g2s&paypal=1">Checkout</a>
		</div>	
	
			
			
			
			
			
			
			
		</div>
	</div>
	<div style="clear:both;"></div>
</div>
	
		<?php		
		}
?>