<?php
	function paypalSuccess(){ 
			global $config; 
			$adminEmailContent		=	'';
			$adminMail		=	'developer.deftsoft@gmail.com';
	 /*echo "<pre>";
			print_R( $_REQUEST );
			mail("developer.deftsoft@gmail.com","Gametag Testing",http_build_query($_REQUEST));
		echo "</pre>";   */
		//die;
	if( !empty( $_REQUEST['payment_status'] ) && $_REQUEST['payment_status'] == "Completed" ){
	
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		
		$headers .= 'From: PlayerUp <support@playerup.com>' . "\r\n";
		
		$tempUrl	=	get_permalink(get_the_ID());
		if(strstr($tempUrl,'?')){
			$action	=	get_permalink(get_the_ID()).'&form=emailInvoice';
		}
		else{
			$action	=	 get_permalink(get_the_ID()).'?form=emailInvoice';
		}
		
		$message		=		file_get_contents( $action );
		
		$message 		= 		str_replace( '{TransactionID}' , $_REQUEST['txn_id'] , $message );
		$message 		= 		str_replace( '{first_name}' , $_REQUEST['first_name'] , $message );
		$message 		= 		str_replace( '{last_name}' , $_REQUEST['last_name'] , $message );
		$message 		= 		str_replace( '{address1}' , $_REQUEST['address_name']." ,".$_REQUEST['address_street']." ,".$_REQUEST['address_zip']." ,".$_REQUEST['address_city']." ,".$_REQUEST['address_state'] , $message );
		$message 		= 		str_replace( '{email}' , $_REQUEST['payer_email'] , $message );
	
		$message 		= 		str_replace( '{total_handling}' , $_REQUEST['mc_handling'] , $message );
		$message 		= 		str_replace( '{totalAmount}' , $_REQUEST['mc_gross'] , $message );
		
		$mail			=		$_REQUEST['payer_email'];
		
		$mail			=		str_replace( '%40' , '@', $mail );
		
		$message 		= 		str_replace( '%40' , '@' , $message );
		
		$subject	=	"PlayerUp: Order Details";
		
		wp_mail( $mail, $subject, $message,$headers);
		
		mail( "testing.testing139@gmail.com", 'Player Up', $message , $headers); 
		mail( $mail, 'Player Up', $message , $headers); 
		
		
		require_once(dirname(__FILE__).'/emailInvoiceToAdmin.php');
		$adminEmailContent	=	emailInvoiceToAdmin($_REQUEST);
		if( $adminEmailContent != '' ){
				$subject	=	"PlayerUp: Order Placed";
				wp_mail( $adminMail, $subject, $adminEmailContent,$headers);
		
		}
	
?>
<style type="text/css">
			body {
				color: #555555;
				font-family: "Trebuchet MS",Arial,sans-serif;
			}
			.results {
				margin: 0 auto;
				border-collapse: collapse;
				border: 1px solid #D4E0EE;        		
			}
			.results th {
				background: #E6EDF5;
				text-align: center;
				padding: 4px 10px;
				border: 1px solid #D4E0EE;
			}
			.results td {
				padding: 4px 10px;
				border: 1px solid #D4E0EE;
			} 
				
			.entry-header .entry-title{		/* To Remove the Site title*/
				display:none;
				background:#028FBF;
			}
			
			a:link
			{
    		color:#2096E1;
			}
			a:visited
			{
    		color:#2096E1;
			}
			a:hover 
			{
   			color:#2096E1;
			}
		.style1 {color: #FFFFFF}
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.style8 {font-size: 12px}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:verdana;font-size:12px;color:white;" >
  <tr>
    <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#2A2A2A" align="center">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="100%" align="center">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr bgcolor="#2096E1">
						  <td height="30" width="1020" style="padding:10px;">
							<div align="center"><img src="http://www.playerup.com/playerup.com-small.png" width="428" height="49"/></div>						  </td>
						</tr>
                  </table>				</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
			<table width="100%" cellpadding="5" cellspacing="5" style="color:white;">
				<thead>
					<tr>
						<th align="left" colspan="4"><p class="style6">Your Order (Transaction ID: <?php echo $_REQUEST['txn_id']; ?>) has been successfully created.</p>
						 
							<p class="style2 style6">What's the next step?                             
							<p class="style2 style6">1. <a href="http://www.playerup.com/forms/1/respond" target="_blank" class="style3 style5">Click here to complete your order process. </a><br />
2. Once completed, wait for an agent to create your order conversation ticket.   <br />
							  3. The seller won't be asked to deliver your product until your conversation ticket has been created.<br />
							  4. We won't release your payment to the seller   until you're satisified with the product that you received.						  </p>	
				            
				            <span class="style8">View Order Details :- 
				            </p>
		              </span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="2" width="45%"><span class="style6">Transaction ID</span></td>
						<td width="10%" align="center"><span class="style6">:</span></td>
						<td colspan="2" width="45%"><span class="style6"><?php echo $_REQUEST['txn_id']; ?></span></td>
					</tr>
					<tr>
						<td colspan="2" width="45%"><span class="style6">Name</span></td>
						<td width="10%" align="center"><span class="style6">:</span></td>
						<td colspan="2" width="45%"><span class="style6"><?php echo $_REQUEST['first_name'].' '.$_REQUEST['last_name'];?></span></td>
					</tr>
					<tr>
						<td colspan="2" width="45%"><span class="style6">Address</span></td>
						<td width="10%" align="center"><span class="style6">:</span></td>
						<td colspan="2" width="45%"><span class="style6"><?php echo $_REQUEST['address_name']." ,".$_REQUEST['address_street']." ,".$_REQUEST['address_zip']." ,".$_REQUEST['address_city']." ,".$_REQUEST['address_state']; ?></span></td>
					</tr>
					<tr>
						<td colspan="2" width="45%"><span class="style6">Email</span></td>
						<td width="10%" align="center"><span class="style6">:</span></td>
						<td colspan="2" width="45%"><span class="style6"><?php echo $_REQUEST['payer_email']; ?></span></td>
					</tr>
					<tr>
						<td colspan="2" width="45%"><span class="style6">Service Charge </span></td>
						<td width="10%" align="center"><span class="style6">:</span></td>
						<td colspan="2" width="45%"><span class="style6">$<?php echo $_REQUEST['mc_handling']; ?></span></td>
					</tr>
					<tr>
						<td colspan="2" width="45%"><span class="style6">Total Amount</span></td>
						<td width="10%" align="center"><span class="style6">:</span></td>
						<td colspan="2" width="45%"><span class="style6">$<?php echo $_REQUEST['mc_gross']; ?></span></td>
					</tr>
				</tbody>
			</table>		  </td>
        </tr>
		 <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td style="padding-left:10px;color:#2096E1;font-weight:bold;"><a href="http://www.playerup.com" class="style8">Go Back to PlayerUp.com</a></td>
        </tr>
        <tr>
          <td style="padding-left:10px;color:#2096E1;font-weight:bold;">&nbsp;</td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<?php 

	/********Code To Update Database On Successful Transaction*********/

		
			global $wpdb;
			
			$transactionInfo		=		array(
													'order_transaction_id'	=>	$_REQUEST['txn_id'],
													'order_amount'			=>	$_REQUEST['mc_gross'],
													'order_status'			=>	$_REQUEST['payment_status'],
													'order_user_email'		=>	$_REQUEST['payer_email']
											);
		
			$table_name = $wpdb->prefix . "orders";
		
			$result		=		$wpdb->insert( $table_name , $transactionInfo );
			$order_id	=	$wpdb->insert_id;
			//if( $result ){
			
				//echo $result;
				
			//}
			//else
	/***************/
	}	
}
?>