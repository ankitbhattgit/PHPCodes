<?php
	function paypalCancelled(){
	if( !empty( $_REQUEST['form'] ) && $_REQUEST['form']	==	'paypalCancelled' ){
	
		
		/* $headers  = 'MIME-Version: 1.0' . "\r\n";
		
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
		
		$message 		= 		str_replace( '{TransactionID}' , $_REQUEST['TransactionID'] , $message );
		$message 		= 		str_replace( '{first_name}' , $_REQUEST['first_name'] , $message );
		$message 		= 		str_replace( '{last_name}' , $_REQUEST['last_name'] , $message );
		$message 		= 		str_replace( '{address1}' , $_REQUEST['address1'] , $message );
		$message 		= 		str_replace( '{email}' , $_REQUEST['email'] , $message );
		$message 		= 		str_replace( '{total_handling}' , $_REQUEST['total_handling'] , $message );
		$message 		= 		str_replace( '{totalAmount}' , $_REQUEST['totalAmount'] , $message );
		
		$mail			=		$_REQUEST['email'];
		
		$mail			=		str_replace( '%40' , '@', $mail );
		
		$message 		= 		str_replace( '%40' , '@' , $message );
		
		$subject	=	"PlayerUp: Order Information";
		
		wp_mail( $mail, $subject, $message,$headers);
		
		mail( $mail, 'PlayerUp', $message , $headers);  */
		
	
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
.style2 {font-size: 12px}
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-align: center;
	font-size: 13px;
	margin: 40px 0;
	color: #FFFFFF;
}
.style3 {font-size: 13px}
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
							<img src="http://www.playerup.com/playerup.com-small.png" width="240" height="29" border="0" alt="Logo" style="margin-left: 30%;"/>
						  </td>
						</tr>
                  </table>
				</td>
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
						<th align="left" colspan="4"><p><span class="style3">Your payment didn't process. Please try again. If you continue receiving the same error,</span> <span class="style1"><a href="http://www.playerup.com/conversations/add?to=middleman" target="_blank">please contact middleman support if you're already registered </a> or <a href="http://www.playerup.com/support-tickets/open">contact support if you aren't registered</a>. </span></p>
					    <p>&nbsp;</p></th>
					</tr>
				</thead>
				<!--<tbody>
					<tr>
						<td colspan="2" width="45%">Transaction ID</td>
						<td width="10%" align="center">:</td>
						<td colspan="2" width="45%"><?php echo $_REQUEST['TransactionID']; ?></td>
					</tr>
					<tr>
						<td colspan="2" width="45%">Name</td>
						<td width="10%" align="center">:</td>
						<td colspan="2" width="45%"><?php echo $_REQUEST['first_name'].' '.$_REQUEST['last_name'];?></td>
					</tr>
					<tr>
						<td colspan="2" width="45%">Address</td>
						<td width="10%" align="center">:</td>
						<td colspan="2" width="45%"><?php echo $_REQUEST['address1']; ?></td>
					</tr>
					<tr>
						<td colspan="2" width="45%">Email</td>
						<td width="10%" align="center">:</td>
						<td colspan="2" width="45%"><?php echo $_REQUEST['email']; ?></td>
					</tr>
					<tr>
						<td colspan="2" width="45%">Service Charge </td>
						<td width="10%" align="center">:</td>
						<td colspan="2" width="45%">$<?php echo $_REQUEST['total_handling']; ?></td>
					</tr>
					<tr>
						<td colspan="2" width="45%">Total Amount</td>
						<td width="10%" align="center">:</td>
						<td colspan="2" width="45%">$<?php echo $_REQUEST['totalAmount']; ?></td>
					</tr>
				</tbody>-->
			</table>
		  </td>
        </tr>
		 <!--<tr>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td style="padding-left:10px;"><span class="style1"><strong>Before your delivery can be completed, you may need to be verified:</strong><br/>
- Verification is required if this is your first purchase and the amount exceeds $75. <br/>
- Please wait for a verification e-mail to be sent to your e-mail. </span></td>
        </tr>
		 <tr>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td style="padding-left:10px;"><span class="style1"><strong>After your payment has been successfully verified:</strong><br/>
- An order ticket will be created to begin communication with PlayerUp and the Seller.
          </span><br/>		  </td>
        </tr>
		<tr>
          <td>&nbsp;</td>
        </tr>-->
        <tr>
          <td style="padding-left:10px;color:#2096E1;font-weight:bold;"><a href="http://www.playerup.com" class="style2">Go Back to PlayerUp.com</a></td>
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
													'order_transaction_id'	=>	$_REQUEST['TransactionID'],
													'order_amount'			=>	$_REQUEST['totalAmount'],
													'order_status'			=>	$_REQUEST['ppp_status'],
													'order_user_email'		=>	$_REQUEST['email']
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