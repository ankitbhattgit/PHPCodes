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
				
				
				width:100%;
				
				
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
				
				border: none;
				border-radius: 2px;
   				color: #F9F9F9;
    			cursor: pointer;
    			display: inline-block;
    			line-height: 2.3;
				width:211px;
				text-align: center;
				text-transform: uppercase;
				background:#2871BB;

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
	<?php
		$tempUrl	=	get_permalink(get_the_ID());
		if(strstr($tempUrl,'?')){
			$action	=	get_permalink(get_the_ID()).'&form=cart';
		}
		else{
			$action	=	 get_permalink(get_the_ID()).'?form=cart';
		}
	?>
		 <div id='escrow_prod_info'> 
				
					
				<div id="prod_desc">
					<table border="1" width="100%" class="cart_list"  >
						<!--<thead>
							<tr>
								<th width="45%">Name</th>
								<th width="40%">Description</th>
								<th colspan="2">Price</th>
								
							</tr>
						
						</thead>-->
						<tbody>
							<tr>
								<td width="40%"><?php echo $name;?></td>
								<td width="41%"><?php echo $description;?></td>
								<td width="15%" align="right">$<?php echo $price;?></td>
								<td>
									<form action="<?php echo $action;?>" method="POST">
										<input type='image' src="<?php echo site_url().'/wp-content/plugins/escrow/img/trash.png';?>" style="border-radius:20px;height:20px; vertical-align: middle;"/>
										<input type="hidden" name="removeCart" value="<?php echo $pid; ?>"/>
									</form>
								</td>
							</tr>
						
						</tbody>
					</table>
				</div>
				<div style="clear:both"></div>		
		 </div>