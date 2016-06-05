<?php
session_start();
?>
<?php
 $surgery=$_POST['surgery'];
  $_SESSION['surgery']=$surgery;
 $sub_surgery=$_POST['sub_surgery'];
   $_SESSION['sub_surgery']=$sub_surgery;
 $date=$_POST['date'];
  $_SESSION['date']=$date;
 $source=$_POST['source'];
   $_SESSION['source']=$source;
 $airport=$_POST['airport'];
  $_SESSION['airport']=$airport;
 //$surgery_price=$_SESSION['surgery_price'];
 $hotel_price=$_POST['checkhotel'];
  $hotel_name=$_POST['checkhotel'];
   $hotel_name=preg_replace("/[^a-zA-Z\s]/","",$hotel_name);
   $_SESSION['hotel_name']=$hotel_name;
 $hotel_price=preg_replace("/[^0-9.]/","",$hotel_price);
   $_SESSION['hotel_price']=$hotel_price;
?>

<head>



</head>


<!-- AWeber Web Form Generator 3.0 -->
<style type="text/css">
#af-form-476775642 .af-body .af-textWrap{width:98%;display:block;float:none;}
#af-form-476775642 .af-body input.text, #af-form-476775642 .af-body textarea{background-color:#FFFFFF;border-color:#D9D9D9;border-width:1px;border-style:solid;color:#C7C7C7;text-decoration:none;font-style:normal;font-weight:normal;font-size:24px;font-family:Trebuchet MS, sans-serif;}
#af-form-476775642 .af-body input.text:focus, #af-form-476775642 .af-body textarea:focus{background-color:#FFFAD6;border-color:#030303;border-width:1px;border-style:solid;}
#af-form-476775642 .af-body label.previewLabel{display:block;float:none;text-align:left;width:auto;color:#CCCCCC;text-decoration:none;font-style:normal;font-weight:normal;font-size:24px;font-family:Helvetica, sans-serif;}
#af-form-476775642 .af-body{padding-bottom:15px;padding-top:15px;background-repeat:no-repeat;background-position:inherit;background-image:none;color:#CCCCCC;font-size:11px;font-family:Verdana, sans-serif;}
#af-form-476775642 .af-quirksMode{padding-right:60px;padding-left:60px;}
#af-form-476775642 .af-standards .af-element{padding-right:60px;padding-left:60px;}
#af-form-476775642 .buttonContainer input.submit{background-color:#0479c2;background-image:url("http://aweber.com/images/forms/plain/buttons/grey.png");color:#FFFFFF;text-decoration:none;font-style:normal;font-weight:normal;font-size:24px;font-family:Helvetica, sans-serif;}
#af-form-476775642 .buttonContainer input.submit{width:auto;}
#af-form-476775642 .buttonContainer{text-align:center;}
#af-form-476775642 button,#af-form-476775642 input,#af-form-476775642 submit,#af-form-476775642 textarea,#af-form-476775642 select,#af-form-476775642 label,#af-form-476775642 optgroup,#af-form-476775642 option{float:none;position:static;margin:0;}
#af-form-476775642 div{margin:0;}
#af-form-476775642 form,#af-form-476775642 textarea,.af-form-wrapper,.af-form-close-button,#af-form-476775642 img{float:none;color:inherit;position:static;background-color:none;border:none;margin:0;padding:0;}
#af-form-476775642 input,#af-form-476775642 button,#af-form-476775642 textarea,#af-form-476775642 select{font-size:100%;}
#af-form-476775642 select,#af-form-476775642 label,#af-form-476775642 optgroup,#af-form-476775642 option{padding:0;}
#af-form-476775642,#af-form-476775642 .quirksMode{width:100%;max-width:418px;}
#af-form-476775642.af-quirksMode{overflow-x:hidden;}
#af-form-476775642{background-color:#FFFFFF;border-color:#CFCFCF;border-width:1px;border-style:none;}
#af-form-476775642{display:block;}
#af-form-476775642{overflow:hidden;}
.af-body .af-textWrap{text-align:left;}
.af-body input.image{border:none!important;}
.af-body input.submit,.af-body input.image,.af-form .af-element input.button{float:none!important;}
.af-body input.text{width:100%;float:none;padding:2px!important;}
.af-body.af-standards input.submit{padding:4px 12px;}
.af-clear{clear:both;}
.af-element label{text-align:left;display:block;float:left;}
.af-element{padding:5px 0;}
.af-form-wrapper{text-indent:0;}
.af-form{text-align:left;margin:auto;}
.af-quirksMode .af-element{padding-left:0!important;padding-right:0!important;}
.lastNameContainer{margin-top:10px;}
.lbl-right .af-element label{text-align:right;}
body {
}
</style>
<form method="post" class="af-form-wrapper" accept-charset="iso-8859-1" action="http://www.aweber.com/scripts/addlead.pl"  >
<div style="display: none;">
<input type="hidden" name="meta_web_form_id" value="476775642" />
<input type="hidden" name="meta_split_id" value="" />
<input type="hidden" name="listname" value="awlist3537960" />
<!--<input type="hidden" name="redirect" value="http://www.aweber.com/thankyou.htm?m=default" id="redirect_23ca4f0f072444891fbbcdb9be82a609" />-->
<input type="hidden" name="redirect" value="http://nvinfobase.com/demo/development/demoform/details.php" id="redirect_23ca4f0f072444891fbbcdb9be82a609" />

<input type="hidden" name="meta_adtracking" value="quoteform-inspiremainsite" />
<input type="hidden" name="meta_message" value="1" />
<input type="hidden" name="meta_required" value="name (awf_first),name (awf_last),email,custom Mobile Phone No,custom City" />

<input type="hidden" name="meta_tooltip" value="" />
</div>
<div id="af-form-476775642" class="af-form"><div id="af-body-476775642"  class="af-body af-standards">
<div class="af-element">
<label class="previewLabel" for="awf_field-64353949-first">First Name:</label>
<div class="af-textWrap">
<input id="awf_field-64353949-first" type="text" class="text" name="name (awf_first)" value=""  onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " tabindex="500" />
</div>
<div class="af-clear"></div>
</div>
<div class="af-element">
<label class="previewLabel" for="awf_field-64353949-last">Last Name:</label>
<div class="af-textWrap">
<input id="awf_field-64353949-last" class="text" type="text" name="name (awf_last)" value=""  onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " tabindex="501" />
</div>
<div class="af-clear"></div></div>
<div class="af-element">
<label class="previewLabel" for="awf_field-64353950">Email: </label>
<div class="af-textWrap"><input class="text" id="awf_field-64353950" type="text" name="email" value="" tabindex="502" onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " />
</div><div class="af-clear"></div>
</div>
<div class="af-element">
<label class="previewLabel" for="awf_field-64353951">Mobile Phone No:</label>
<div class="af-textWrap"><input type="text" id="awf_field-64353951" class="text" name="custom Mobile Phone No" value=""  onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " tabindex="503" /></div>
<div class="af-clear"></div></div><div class="af-element">
<label class="previewLabel" for="awf_field-64353952">City:</label>
<div class="af-textWrap"><input type="text" id="awf_field-64353952" class="text" name="custom City" value=""  onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " tabindex="504" /></div>
<div class="af-clear"></div></div><div class="af-element buttonContainer">
<input name="submit" id="af-submit-image-476775642" type="image" class="image" style="background: none; max-width: 100%;" alt="Submit Form" src="http://aweber.com/images/forms/plain/buttons/grey.png" tabindex="505" />
<div class="af-clear"></div>
</div>
</div>
</div>
<div style="display: none;"><img src="http://forms.aweber.com/form/displays.htm?id=LOxs7OysbCxM" alt="" /></div>
</form>
<script type="text/javascript">
    <!--
    (function() {
        var IE = /*@cc_on!@*/false;
        if (!IE) { return; }
        if (document.compatMode && document.compatMode == 'BackCompat') {
            if (document.getElementById("af-form-476775642")) {
                document.getElementById("af-form-476775642").className = 'af-form af-quirksMode';
            }
            if (document.getElementById("af-body-476775642")) {
                document.getElementById("af-body-476775642").className = "af-body inline af-quirksMode";
            }
            if (document.getElementById("af-header-476775642")) {
                document.getElementById("af-header-476775642").className = "af-header af-quirksMode";
            }
            if (document.getElementById("af-footer-476775642")) {
                document.getElementById("af-footer-476775642").className = "af-footer af-quirksMode";
            }
        }
    })();
    -->
</script>

<!-- /AWeber Web Form Generator 3.0 -->
