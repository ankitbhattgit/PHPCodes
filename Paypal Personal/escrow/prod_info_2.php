<style type='text/css'>
			
			#escrow_prod_info {
					position: relative;
					
					font-family:Arial, Helvetica, sans-serif;
				}

			


			#prod_img{
			
				float:left;
				border:1px solid black;
				padding:10px;
				
			}
			
			#prod_img img{
			
				height:400px !important;
				width:241px !important;
			}
			
			
			#prod_name{
			
				
				font-size: 18px;
				text-transform: uppercase;
				color: #000;
				font-weight:bold;
				margin-bottom: 10px;
			}
			
			
			
			
			
			#prod_desc{
				float:left;
				border:1px solid red;
				
				width:70%;
				padding:20px;
				text-align:justify;
			}
			
			
			#prod_desc h6{
				font-size: 13px !important;
				color: #2C3E50;
				margin-bottom: 5px;
			
			}
			
			
			.prod_price{
			
				font-size: 18px;
				color: #2C3E50;
				margin-bottom: 2px;
			
			}
			
			.prod_quote{
				
				font-size: 13px !important;
				color: #2C3E50;
				margin-bottom: 5px;
			}
			
			.cart_desc{
			
				color:#565656;
				font-size:13px;
				margin-bottom:10px;
				display:block;
			
			}
			
			.btn{
				
				border: 1px solid #EC6723;
				border-radius: 2px;
   				color: #F9F9F9;
    			cursor: pointer;
    			display: inline-block;
    			line-height: 2.3;
				width:211px;
				text-align: center;
				text-transform: uppercase;
				background:#EC6723;

				font-size:15px;
			
			}
			
			.prod_stock{
				color:#6BAD50;
				font-size:20px;
				
			}
			
			#escrow_prod_info hr{
			
				 border-color: -moz-use-text-color;
   				 border-style: solid none none;
    			 border-width: 1px medium medium;
    			 color: #EEEEEE !important;
				margin-top:17px;
				margin-bottom:17px;
			}
			
	</style>
</head>

<body>

		 <div id='escrow_prod_info'> 
				<div id="prod_img">
					<img src="<?php echo $imgpath;?>" />
				
				</div>	
					
				<div id="prod_desc">
					<div id="prod_name" >
						<?php echo $name;?>
					</div>
					<hr/>
					<div class="prod_price">Price: $<?php echo $price;?><span class="btndisc">Discount:15%</span></div>
					<div class="prod_quote">inclusive of all taxes</div>
					<hr/>
					<span class="cart_desc">
					This Fastrack Basics Analog watch has been designed for men who look for versatility in their daily wear watches. The analog mechanism that it employs has been a long-time favorite for the precision in timekeeping it is famous for. This casual wear watch can be paired with any attire; wear it to a night out with your friends or to dinner with the family.
					</span>
					<hr/>
					<div class="prod_stock">
						In Stock
					</div>
					<hr/>
					<div class="btn">
						Checkout
					</div>
				</div>
				<div style="clear:both"></div>		
		 </div>