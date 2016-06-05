<?php
	function g2sCancelled(){
	
		if( !empty( $_REQUEST['ppp_status'] ) ){
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		
		$headers .= 'From: Middleman <support@playerup.com>' . "\r\n";
		
		
		
		$mail			=		$_REQUEST['email'];
		
		$mail			=		str_replace( '%40' , '@', $mail );
		
		$message 		= 		"Greetings ".$_REQUEST['first_name']." ".$_REQUEST['last_name'].", Your Order (Transaction ID: ".$_REQUEST['TransactionID'].") has been cancelled as the payment didn't process. Please try again. If you continue receiving the same error, please contact customer support. <br/><br/>
PlayerUp ";
		
		$subject	=	"PlayerUp: Payment Failed";
		
		wp_mail( $mail, $subject, $message,$headers);
		
		
	
	
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
		.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-align: center;
	font-size: 13px;
	margin: 40px 0;
	color: #000000;
}
        </style>
		
		<div style="width: 800px; margin: 20px auto; font-size: 15px; line-height: 25px; font-family: arial;">
			<h2 class="style1" id="title">Your transaction cannot process due to some conflicts with the sellers checkout link. In order to fix this issue, <a href="http://www.playerup.com/conversations/add?to=middleman" target="_blank">please contact middleman support if you're already registered </a> or <a href="http://www.playerup.com/support-tickets/open">contact support if you aren't registered</a>. </h2>
				<div id="table" cellspacing="1">
					<table border="1" class='results'>
						<tr>
							<th>Param Name</th>
							<th>Param Value</th>
						</tr>
							<tr>
								<td>Transaction Id</td>
								<td><?php echo $_REQUEST['TransactionID'];?></td>
							</tr>
							<tr>
								<td>ppp_status</td>
								<td><?php echo $_REQUEST['ppp_status'];?></td>
							</tr>
							<tr>
								<td>Reason</td>
								<td><?php echo $_REQUEST['Reason'];?></td>
							</tr>
							<tr>
								<td>First Name</td>
								<td><?php echo $_REQUEST['first_name'];?></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><?php echo $_REQUEST['last_name'];?></td>
							</tr>
							<tr>
								<td>Address</td>
								<td><?php echo $_REQUEST['address1'];?></td>
							</tr>
							<tr>
								<td>City</td>
								<td><?php echo $_REQUEST['city'];?></td>
							</tr>
							<tr>
								<td>Country</td>
								<td><?php echo $_REQUEST['country'];?></td>
							</tr>
							<tr>
								<td>Error</td>
								<td><?php echo $_REQUEST['Error'];?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $toPrintMail;?></td>
							</tr>
							<tr>
								<td>Total Amount</td>
								<td><?php echo $_REQUEST['totalAmount'];?></td>
							</tr>
							<tr>
								<td>Total Handling Charges</td>
								<td><?php echo $_REQUEST['total_handling'];?></td>
							</tr>
					</table>
				</div>

		</div>	
	</body>
	</html>

<?php	
	}
}	
?>