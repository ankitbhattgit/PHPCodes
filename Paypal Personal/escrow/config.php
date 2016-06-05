<?php
    $env        =       'live'; // change to `live` for live payment gateways
    global $handling;
    $handling   =   3; // don't write % here
    global $config;
    if( $env == "test"  ){   //For Testing mode Payment Gateways
        
        $config['paypalUrl']       =        "https://www.sandbox.paypal.com/cgi-bin/webscr";
        $config['paypalAccount']       =        "paymentpayables@gmail.com";
        $config['skrillUrl']       =        "https://www.moneybookers.com/app/payment.pl";
        $config['skrillAccount']       =        "payments@playerup.com";
        
    }else if( $env == "live" ){     //For Live Payment Gateways
        
        $config['paypalUrl']       =        "https://www.paypal.com/cgi-bin/webscr";
        $config['paypalAccount']       =        "paymentpayables@gmail.com";
        $config['skrillUrl']       =        "https://www.moneybookers.com/app/payment.pl";
        $config['skrillAccount']       =        "payments@playerup.com";
    }

    $config['return_url']        =   get_bloginfo('url')."?page_id=5&form=paypalSuccess";
    
?>