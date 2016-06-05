<?php
require_once(dirname(__FILE__) . '/config.php');

function paypal() { 
    global $config;
    if (empty($_SESSION)) {

        echo "<h1 style='font-size:13px;'>Your shopping cart is empty. Please go back and re-add the product to cart.</h1>";
        $tempUrl = get_permalink(get_the_ID());
        if (strstr($tempUrl, '?')) {
            $action = get_permalink(get_the_ID()) . '&form=cart';
        } else {
            $action = get_permalink(get_the_ID()) . '?form=cart';
        }
        echo '<a href=' . $action . ' style="font-size:13px;"><< Go Back</a>';
        die();
    }
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery("#paypal").submit();	
        }); 
    </script>	
    <form action="<?php echo $config['paypalUrl']; ?>" method="post" id="paypal">

      <input type="hidden" value="_xclick" name="cmd">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="currency_code" value="USD" />
        <input type="hidden" name="business" value="<?php echo $config['paypalAccount']; ?>">
        <input type="hidden" name="rm" value="2">
        <input type="hidden" name="return" value="<?php echo $config['return_url']; ?>"/>
    <?php
    $baseUrl = get_permalink(get_the_ID());
    if (strstr($baseUrl, '?')) {
        $action = get_permalink(get_the_ID()) . '&form=paypalSuccess';
    } else {
        $action = get_permalink(get_the_ID()) . '?form=paypalSuccess';
    }
    /*     * *************Cancellation URL***************** */
    if (strstr($baseUrl, '?')) {
        $actionCancel = get_permalink(get_the_ID()) . '&form=paypalCancelled';
    } else {
        $actionCancel = get_permalink(get_the_ID()) . '?form=paypalCancelled';
    }
    ?>
       
        <!-- <input type="hidden" name="return" value="<?php echo $action; ?>"> -->
        <input type="hidden" name="notify_url" value="<?php echo $action; ?>">
        <input type="hidden" name="cancel_return" value="<?php echo $actionCancel; ?>">
        <?php
       /* if (empty($_SESSION['checkout'])) {
            foreach ($_SESSION['cartList'] as $key => $val) {

                //$_SESSION['cartList']['item_name_'.($key+1)]		=		$_SESSION['cartList'][$key]	->	prod_name;
                //$_SESSION['cartList']['item_amount_'.($key+1)]		=		$_SESSION['cartList'][$key]	->	prod_price;
                //$_SESSION['cartList']['item_quantity_'.($key+1)]		=		1;
                ?>
                <input type="hidden" name="item_name_<?php echo $key + 1; ?>" value="<?php echo $_SESSION['cartList'][$key]->prod_name ?>" />
                <input type="hidden" name="amount_<?php echo $key + 1; ?>" value="<?php echo $_SESSION['cartList'][$key]->prod_price ?>" />
                <input type="hidden" name="quantity_<?php echo $key + 1; ?>" value="1" />
                <?php
            }
        } else {
            foreach ($_SESSION['checkout'] as $key => $val) {
                ?>
                <input type="hidden" name="item_name_<?php echo $key + 1; ?>" value="<?php echo $_SESSION['checkout'][$key]->prod_name ?>" />
                <input type="hidden" name="amount_<?php echo $key + 1; ?>" value="<?php echo $_SESSION['checkout'][$key]->prod_price ?>" />
                <input type="hidden" name="quantity_<?php echo $key + 1; ?>" value="1" />
                <?php
            }
        }
       //echo $_SESSION['cartAmount'];*/
        ?>
        
		<?php 
            global $handling; 
            $handlingAmnt       =   ($_SESSION['cartAmount']*$handling)/200;
            $handlingAmnt       =   sprintf("%.2f",$handlingAmnt);
        ?>
		
		
		
		
        <input type="hidden" value="Cart Amount" name="item_name"/>
        <input type="hidden" value="authorization" name="paymentaction"/>
        <input type="hidden" name="amount" value="<?php echo $_SESSION['cartAmount']+$handlingAmnt; ?>" />
        <input type="hidden" name="shipping" value="<?php echo $handlingAmnt; ?>" />
        <input type="image" name="submit" border="0" src="http://www.paypalobjects.com/en_US/i/btn/x-click-but22.gif" alt="PayPal - The safer, easier way to pay online" style="display:none;">

    </form>

        <?php
        session_destroy();
        exit;
    }
    ?>