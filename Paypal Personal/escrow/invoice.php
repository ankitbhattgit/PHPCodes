<?php 
	function emailInvoice(){

?>
<style type="text/css">
<!--
.style2 {font-size: 12px}
.style3 {color: #2096E1}
-->
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
								<div align="center"><img src="http://www.playerup.com/playerup.com-small.png" width="428" height="49"/></div></td>
							</tr>
					  </table>					</td>
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
						tr>
						<th align="left" colspan="4"><p class="style2 style6">Your Order (Transaction ID: {TransactionID}) has been successfully created.</p>
							<p class="style2 style6">What's the next step?                             
							<p class="style2 style6">1. <a href="http://www.playerup.com/forms/1/respond" target="_blank" class="style3 style5">Click here to complete your order process. </a><br />
2. Once completed, wait for an agent to create your order conversation ticket.   <br />
							  3. The seller won't be asked to deliver your product until your conversation ticket has been created.<br />
							  4. We won't release your payment to the seller   until you're satisified with the product that you received.
						  </p>							<p class="style2 style6">View Order Details:</p>					  </th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="2" width="45%"><span class="style2">Transaction ID</span></td>
							<td width="10%" align="center"><span class="style2">:</span></td>
							<td colspan="2" width="45%"><span class="style2">{TransactionID}</span></td>
						</tr>
						<tr>
							<td colspan="2" width="45%"><span class="style2">Name</span></td>
							<td width="10%" align="center"><span class="style2">:</span></td>
							<td colspan="2" width="45%"><span class="style2">{first_name}{last_name}</span></td>
						</tr>
						<tr>
							<td colspan="2" width="45%"><span class="style2">Address</span></td>
							<td width="10%" align="center"><span class="style2">:</span></td>
							<td colspan="2" width="45%"><span class="style2">{address1}</span></td>
						</tr>
						<tr>
							<td colspan="2" width="45%"><span class="style2">Email</span></td>
							<td width="10%" align="center"><span class="style2">:</span></td>
							<td colspan="2" width="45%"><span class="style2">{email}</span></td>
						</tr>
						<tr>
							<td colspan="2" width="45%"><span class="style2">Handling Charges</span></td>
							<td width="10%" align="center"><span class="style2">:</span></td>
							<td colspan="2" width="45%"><span class="style2">{total_handling}</span></td>
						</tr>
						<tr>
							<td colspan="2" width="45%"><span class="style2">Total Amount</span></td>
							<td width="10%" align="center"><span class="style2">:</span></td>
							<td colspan="2" width="45%"><span class="style2">{totalAmount}</span></td>
						</tr>
					</tbody>
				</table>			  </td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			 <td style="padding-left:10px;color:#2096E1;font-weight:bold;"><span class="style2">PlayerUp.com</span></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			</tr>
		  </table></td>
	  </tr>
	</table>

<?php
}
?>
