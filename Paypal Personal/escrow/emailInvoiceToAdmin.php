<?php 
	function emailInvoiceToAdmin(){
	$masg	=	'';
	/* echo "<pre>";
		print_R( $_REQUEST );
	echo "</pre>"; */
	if( !empty( $_REQUEST['payment_status'] ) && ( $_REQUEST['payment_status'] == "Completed"  || $_REQUEST['payment_status'] == "Pending" ) ){
	
	//die;
	$masg		=	'<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:verdana;font-size:12px;color:white;" >
	  <tr>
		<td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#2A2A2A" align="center">
			<tr>
			  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				   
					<td width="100%" align="center">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr bgcolor="#2096E1">
							  <td height="30" width="1020" style="padding:10px;">
								<img src="http://www.playerup.com/playerup.com-small.png" width="240" height="29" border="0" alt="Logo" style="margin-left: 36%;"/>
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
							<th align="left" colspan="4">An Order (Transaction ID: '.$_REQUEST['txn_id'].') is been placed by '.$_REQUEST["first_name"].' '.$_REQUEST["last_name"].' <br/><br/>
				Order Details are given below :-
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="2" width="45%">Transaction ID</td>
							<td width="10%" align="center">:</td>
							<td colspan="2" width="45%">'.$_REQUEST["txn_id"].'</td>
						</tr>
						<tr>
							<td colspan="2" width="45%">Name</td>
							<td width="10%" align="center">:</td>
							<td colspan="2" width="45%">'.$_REQUEST['first_name'].' '.$_REQUEST['last_name'].'</td>
						</tr>
						<tr>
							<td colspan="2" width="45%">Address</td>
							<td width="10%" align="center">:</td>
							<td colspan="2" width="45%">'.$_REQUEST['address_name'].' ,'.$_REQUEST['address_street'].' ,'.$_REQUEST['address_zip'].' ,'.$_REQUEST['address_city'].' ,'.$_REQUEST['address_state'] .'</td>
						</tr>
						<tr>
							<td colspan="2" width="45%">Email</td>
							<td width="10%" align="center">:</td>
							<td colspan="2" width="45%">'.$_REQUEST['payer_email'].'</td>
						</tr>
						<tr>
							<td colspan="2" width="45%">Handling Charges</td>
							<td width="10%" align="center">:</td>
							<td colspan="2" width="45%">$'.$_REQUEST['mc_handling'].'</td>
						</tr>
						<tr>
							<td colspan="2" width="45%">Total Amount</td>
							<td width="10%" align="center">:</td>
							<td colspan="2" width="45%">$'.$_REQUEST['mc_gross'].'</td>
						</tr>
					</tbody>
				</table>
			  </td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td style="padding-left:10px;color:#2096E1;font-weight:bold;">Regards</td>
			</tr>
			<tr>
			  <td style="padding-left:10px;color:#2096E1;font-weight:bold;">Player Up</td>
			</tr>
			<tr>
			  <td><!--<img src="<?php //echo $webrootBase;?>PROMO-GREEN2_07.jpg" width="598" height="7" style="display:block" border="0" alt=""/>--></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			</tr>
		  </table></td>
	  </tr>
	</table>';

	}
	return $masg;
}
?>
