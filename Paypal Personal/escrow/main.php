<?php
/*
Plugin Name: Escrow System
Plugin URI: 
Description: PlayerUp
Version: 1.0
Author: abc

*/

if(isset($_POST['prod_id'])){

	
	$base_url	=	"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'].'?pid='.$_POST['prod_id'];
	echo "<iframe src='$base_url' style='border:none;height:100%;width:100%;'>";
			
	echo "</iframe>";
	
	die;	
	}
	
if(isset($_GET['pid']) ){

		require_once(dirname(__FILE__).'/esc.php');
	
		getProduct($_GET['pid'],$_GET['button'],urldecode($_GET['data']));
		
		die;
	}
if ( ! defined( 'ABSPATH' ) ) {
	die('No Direct Access is Allowed.');
}		//Exit if accessed Directly through browser


require_once(dirname(__FILE__).'/activation.php');
require_once(dirname(__FILE__).'/functions.php');	/*functons.php to have functions with global access*/
require_once(dirname(__FILE__).'/esc.php');	/* To avail esc.php form in Cart Sidebar*/
require_once(dirname(__FILE__).'/config.php');	/* To avail esc.php form in Cart Sidebar*/
//require_once(plugin_dir_url(__FILE__).'/activation.php');
register_activation_hook( __FILE__, 'escrow_activation' );

add_shortcode('initial', 'initial');
add_action('init', 'startSession', 1);
add_action('wp_logout', 'endSession');
//add_action('wp_login', 'endSession');

function startSession() {
    if(!session_id()) {
        session_start();
   }
}

function endSession() {
    session_destroy ();
}

function initial(){
?>
	<script type="text/javascript">
	//TO Make the HTML Placeholder Working For IE Borwser//
	(function($){
		if( navigator.appName == 'Microsoft Internet Explorer' ){
		
			//id itterator if the inputs don't have ids
			var phid=0;
			$.fn.placeholder = function(){
				return this.bind({
					focus: function(){
						$(this).parent().addClass('placeholder-focus');
					},blur: function(){
						$(this).parent().removeClass('placeholder-focus');
					},'keyup input': function(){
						$(this).parent().toggleClass('placeholder-changed',this.value!=='');
					}
				}).each(function(){
					var $this = $(this);
					//Adds an id to elements if absent
					if(!this.id) this.id='ph_'+(phid++); 
					//Create input wrapper with label for placeholder. Also sets the for attribute to the id of the input if it exists.
					$('<span class="placeholderWrap"><label for="'+this.id+'">'+$this.attr('placeholder')+'</label></span>')
						.insertAfter($this)
						.append($this); 
					//Disables default placeholder
					$this.attr('placeholder','').keyup();
				});
			};
			
			//Default plugin invocation 
			$(function(){
				$('input[placeholder]').placeholder();
			});
		}
	})(jQuery);

</script>
<style>
	

.placeholderWrap{
    position: relative; 
    
}
	
.placeholderWrap label{
    color: #C0C6CB;
    position: absolute; 
    top: 4px; 
	left: 15px; /* Might have to adjust this based on font-size */
    pointer-events: none;
    display: block;
	font-size:13px;
}

.placeholder-focus label{color: #C0C6CB;}/* could use a css animation here if desired*/
.placeholder-changed label{
    display: none;
}
</style>
<?php
global $wpdb;
	if( (( !empty($_GET['form'])) && ($_GET['form']== 1)) ){
		/* Removed On Client's Requirement
		require_once(dirname(__FILE__).'/login.php');
		add_shortcode('login_form','login_form');
		echo do_shortcode('[login_form]');*/
		die('No Direct Access is Allowed.');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 2))){
		require_once(dirname(__FILE__).'/add-product.php');
		add_shortcode('add_product','add_product');
		echo do_shortcode('[add_product]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 3))){
		require_once(dirname(__FILE__).'/review.php');
		add_shortcode('review','review');
		echo do_shortcode('[review]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'done'))){
		require_once(dirname(__FILE__).'/last.php');
		add_shortcode('done','done');
		echo do_shortcode('[done]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'cart'))){
		require_once(dirname(__FILE__).'/cart.php');
		add_shortcode('cart','cart');
		echo do_shortcode('[cart]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'cart2'))){
		require_once(dirname(__FILE__).'/cart2.php');
		add_shortcode('cart2','cart2');
		echo do_shortcode('[cart2]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'resize'))){
		require_once(dirname(__FILE__).'/resize.php');
		add_shortcode('resize','resize');
		echo do_shortcode('[resize]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'g2s'))){
		require_once(dirname(__FILE__).'/g2s.php');
		add_shortcode('g2s','g2s');
		echo do_shortcode('[g2s]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'paypal'))){
		require_once(dirname(__FILE__).'/paypal.php');
		add_shortcode('paypal','paypal');
		echo do_shortcode('[paypal]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'skrill'))){
		require_once(dirname(__FILE__).'/skrill.php');
		add_shortcode('skrill','skrill');
		echo do_shortcode('[skrill]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'g2sSuccess'))){
		require_once(dirname(__FILE__).'/g2sSucess.php');
		add_shortcode('g2sSuccess','g2sSuccess');
		echo do_shortcode('[g2sSuccess]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'paypalSuccess'))){
		require_once(dirname(__FILE__).'/paypalSuccess.php');
		add_shortcode('paypalSuccess','paypalSuccess');
		echo do_shortcode('[paypalSuccess]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'g2sCancelled'))){
		require_once(dirname(__FILE__).'/g2sCancelled.php');
		add_shortcode('g2sCancelled','g2sCancelled');
		echo do_shortcode('[g2sCancelled]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'paypalCancelled'))){
		require_once(dirname(__FILE__).'/paypalCancelled.php');
		add_shortcode('paypalCancelled','paypalCancelled');
		echo do_shortcode('[paypalCancelled]');
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'emailInvoice'))){
		require_once(dirname(__FILE__).'/emailInvoice.php');
		add_shortcode('emailInvoice','emailInvoice');
		echo do_shortcode('[emailInvoice]');	
	}else if((( !empty($_GET['form'])) && ($_GET['form']== 'pay_way'))){		// Added to select differ payment methods
		require_once(dirname(__FILE__).'/pay_way.php');
		add_shortcode('pay_way','pay_way');
		echo do_shortcode('[pay_way]');
	}else{
		require_once(dirname(__FILE__).'/new-user.php');
		add_shortcode('signup','signup');
		echo do_shortcode('[signup]');
	}	
}


?>