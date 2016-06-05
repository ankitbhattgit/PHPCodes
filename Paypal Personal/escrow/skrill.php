<?php

function skrill() {
    /*  echo "<pre>";
      print_R( $_SESSION );
      echo "</pre>"; */
    global $config;
    if (empty($_SESSION)) {

        echo "<h1 style='font-size:13px;'>Your shopping cart is empty. Please go back and re-add the product to cart.</h1>";
        $action = '';
        $action = get_site_url() . '?page_id=5&form=cart';
        echo '<a href=' . $action . ' style="font-size:13px;"><< Go Back</a>';
        die();
    }
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery("#skrill").submit();	
        }); 
    </script>	


    <form action="<?php echo $config['skrillUrl']; ?>" id="skrill">
        <input type="hidden" name="pay_to_email" value="<?php echo $config['skrillAccount']; ?>">
        <input type="hidden" name="recipient_description" value="PlayerUp Purchase">
        <!--<input type="hidden" name="transaction_id" value="232424532">-->
        <input type="hidden" name="return_url" value="http://www.playerup.com/middleman/?page_id=5&form=cart">
        <input type="hidden" name="return_url_text" value="Go To PlayerUp">
        <input type="hidden" name="return_url_target" value="1">
        <input type="hidden" name="cancel_url" value="http://www.playerup.com/middleman/?page_id=5&form=cart">
        <input type="hidden" name="cancel_url_target" value="1">
        <input type="hidden" name="status_url" value="off">
        <input type="hidden" name="status_url2" value="on">
        <input type="hidden" name="dynamic_descriptor" value="Descriptor">
        <input type="hidden" name="language" value="EN">
        <input type="hidden" name="confirmation_note" value="Thank you for completing your purchase with PlayerUp.com. An agent will e-mail you shortly with the status of your order.">
       <!-- <input type="hidden" name="merchant_fields" value="field1">
        <input type="hidden" name="title" value="Mr">
        <input type="hidden" name="firstname" value="John">
        <input type="hidden" name="lastname" value="Payer">
        <input type="hidden" name="address" value="11 Payerstr St">
        <input type="hidden" name="address2" value="Payertown">
        <input type="hidden" name="phone_number" value="0207123456">
        <input type="hidden" name="postal_code" value="EC45MQ">
        <input type="hidden" name="city" value="Payertown">
        <input type="hidden" name="state" value="Central London">
        <input type="hidden" name="country" value="USA">-->
        <input type="hidden" name="currency" value="USD">
        <?php
        /*if (empty($_SESSION['checkout'])) {
            foreach ($_SESSION['cartList'] as $key => $val) {

                //$_SESSION['cartList']['item_name_'.($key+1)]		=		$_SESSION['cartList'][$key]	->	prod_name;
                //$_SESSION['cartList']['item_amount_'.($key+1)]		=		$_SESSION['cartList'][$key]	->	prod_price;
                //$_SESSION['cartList']['item_quantity_'.($key+1)]		=		1;
                ?>				<!----$key+2 special case for skrill gateway	------>
                <input type="hidden" name="amount<?php echo $key + 2; ?>_description" value="<?php echo $_SESSION['cartList'][$key]->prod_name; ?>:">
                <input type="hidden" name="amount<?php echo $key + 2; ?>" value="<?php echo $_SESSION['cartList'][$key]->prod_price; ?>">

                <input type="hidden" name="detail<?php echo $key + 1; ?>_description" value="Product ID:">
                <input type="hidden" name="detail<?php echo $key + 1; ?>_text" value="<?php echo $_SESSION['cartList'][$key]->prod_key; ?>">

            <?php
        }
    } else {
        foreach ($_SESSION['checkout'] as $key => $val) {
            ?>						<!----$key+2 special case for skrill gateway	------>
                <input type="hidden" name="amount<?php echo $key + 2; ?>_description" value="<?php echo $_SESSION['checkout'][$key]->prod_name; ?>:">
                <input type="hidden" name="amount<?php echo $key + 2; ?>" value="<?php echo $_SESSION['checkout'][$key]->prod_price; ?>">

                <input type="hidden" name="detail<?php echo $key + 1; ?>_description" value="Product ID:">
                <input type="hidden" name="detail<?php echo $key + 1; ?>_text" value="<?php echo $_SESSION['checkout'][$key]->prod_key; ?>">
            <?php
        }
    }*/
    ?>   
        <?php 
            global $handling; 
            $handlingAmnt       =   ($_SESSION['cartAmount']*$handling)/100;
            $handlingAmnt       =   sprintf("%.2f",$handlingAmnt);
            $totalAmount        =  $_SESSION['cartAmount']+$handlingAmnt;
        ?>
        <input type="hidden" name="detail1_description" value="Handling Charges:">
	<input type="hidden" name="detail1_text" value="<?php echo $handlingAmnt; ?>">
        <input type="hidden" name="amount" value="<?php echo $totalAmount; ?>">
        <input type="hidden" name="rec_period" value="1">
        <input type="hidden" name="rec_grace_period" value="1">
        <input type="hidden" name="rec_cycle" value="day">
        <input type="hidden" name="ondemand_max_currency" value="EUR">
        <input type="hidden" name="payment_methods" value="NGP,OBT,GLU,IDL,PWY,PWY5,PWY6,PWY7,PWY14,PWY15,PWY37,PWY17,PWY18,PWY19,PWY20,PWY21,PWY22,PWY26,PWY25,PWY28,PWY32,PWY33,PWY36,ACC,VSA,MSC,VSD,VSE,AMX,DIN,JCB,MAE,SLO,GCB,SFT,DID,GIR,ENT,EBT,SO2,NPY,PLI,CSI,PSP,EPY,BWI,MZM,PSC,">
        <input type="hidden" name="submit_id" value="Submit">
        <input type="submit" name="Pay" value="Pay" style="display:none;">
    </form>

    <?php
    session_destroy();
    exit;
}
?>