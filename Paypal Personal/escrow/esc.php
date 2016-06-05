<?php
	function getProduct($pid,$button,$cartUrl){
		echo "<style type='text/css'>
			
			#escrow_prod {
					position: relative;
					width: 381px;
					box-shadow:2px 2px 2px #000;
					overflow:hidden;
				}

			#escrow_prod form table tr td input[type='submit']{
				width: 100px;
				background: #27AE60;
				font-weight: bold;
				color: white;
				border: 0 none;
				border-radius: 1px;
				cursor: pointer;
				padding: 10px 5px;
				margin: 10px 5px;
			}

			#escrow_prod img{

				border-width: 0px;
			border-top-style: solid;
			border-right-style: solid;
			border-bottom-style: solid;
			border-left-style: solid;

			}

			#escrow_prod table tbody tr td{

				font-size:18px !important;
				color:black;
				font-weight:bold;

			}
			
			#cartHref{
			
				cursor:pointer;
			}
			
			
	</style>";
	?>
		<script>
				function change(e){
		
				
				e.preventDefault();
				var p_key	=	'<?php echo $pid;?>';
				var button	=	'<?php echo $button;?>';
				
				window.top.location.href = '<?php echo $cartUrl;?>'
			
				
			
				}
		
		</script>
	<?php
			//require_once ABSPATH.'/wp-config.php'; /* for localhost*/
			//require_once ABSPATH.'/wp-includes/wp-db.php'; 
			require_once( '../../../wp-config.php' );
			require_once( '../../../wp-includes/wp-db.php' );
			
		
			global $wpdb;
			$products	=	$wpdb->get_row("SELECT * FROM esc_products WHERE prod_key='$pid'");
			$price	=	sprintf("%0.2f",$products->prod_price);
			$imgpath	=	$products->prod_img_path;
			
		
				echo "<div id='escrow_prod'>";
					echo "<form>";
						echo "<table width='100%'>";
							echo "<thead bgcolor='#DCDCDC'>";
								echo "<tr style='line-height: 27px;'>";
									echo "<th colspan='3'>";
										echo "Add To Cart";
									echo "</th>";
								echo "</tr>";
							echo "</thead>";
							echo "<tbody>";
								echo "<tr rowspan='2'>";
								//	echo "<td colspan='2' align='center'><img src='$imgpath' height='100px' width='100px' alt='No Image to display.'/></td>
								echo "<td>
											<p>$products->prod_name</p>
								</td>";
								echo "<td>			
										<p>$price</p>
									</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td colspan='3' align='center'>
										<input type='hidden' id='navigateTo' value='$action'/>
										<img id='cartHref' onclick='change(event)' src='".plugin_dir_url(__FILE__)."img/$button'/>
									</td>";
								echo "</tr>";
							echo "</tobdy>";
						echo "</table>";
					echo "</form>";
				echo "</div>";

}

/*** Get Product List in Add To Cart Sidebar ***/

function getProductList($pid){
		echo "<style type='text/css'>
			
			#escrow_prod_acc {
					position: relative;
					width:100%;
					background:#2A2A2A;
				}

			

			#escrow_prod_acc table tbody tr td{

				font-size:12px !important;
				color:#FFF;
				vertical-align:middle;

			}
			
			
	</style>";
		
			require_once ABSPATH.'/wp-config.php'; /* for localhost*/
			require_once ABSPATH.'/wp-includes/wp-db.php'; 
			//require_once( '../../../wp-config.php' );
			//require_once( '../../../wp-includes/wp-db.php' );
			
			

		
			global $wpdb;
			$products	=	$wpdb->get_row("SELECT * FROM esc_products WHERE id='$pid'");
			$price	=	sprintf("%0.2f",$products->prod_price);
			$imgpath	=	$products->prod_img_path;
			
		
				echo "<div id='escrow_prod_acc'>";
					
						echo "<table width='100%'>";
								echo "<tr>";
									echo "<td align='left' width='6%'><input type='checkbox' name='selected[]' value='$products->id'/></td>
										<td width='54%'>$products->prod_name</td>
										<td width='40%'>$$price</td>";
								echo "</tr>";
								
						echo "</table>";
				echo "</div>";
			

}

function getProductInfo($pkey){
		
			require_once ABSPATH.'/wp-config.php'; /* for localhost*/
			require_once ABSPATH.'/wp-includes/wp-db.php'; 
			//require_once( '../../../wp-config.php' );
			//require_once( '../../../wp-includes/wp-db.php' );
			
			global $wpdb;
			$products	=	$wpdb->get_row("SELECT * FROM esc_products WHERE prod_key='$pkey'");
			$price	=	sprintf("%0.2f",$products->prod_price);
			$imgpath	=	$products->prod_img_path;
			
			$imgpath		=	 site_url().'/wp-content/plugins/escrow/js/resize.php?src='.$imgpath.'&h=400&w=300'; 
			$price	=	$products->prod_price;
			$name	=	$products->prod_name;
			$description	=	$products->prod_desc;
			$discount	=	$products->prod_disc;
			$pid	=	$products->id;
		require('prod_info.php');	//Loads the Product Cart form 

}

?>