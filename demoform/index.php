<head> 
  <link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
 <link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>

<script>
$(function() {
$( "#datepicker" ).datepicker();
});  
</script>
<script type="text/javascript">
        
  $(document).ready(function(){
  $("#next").click(function(){

      if ($("#surgery")[0].selectedIndex == 0) {
              $("#errorsurgery").text("Please select surgery");
                return false;
            }

            var rating_val=$('#ratings').val();

   if (rating_val=='No thanks') {
     $("#error_ratings").hide();
     $('#loader-img').hide();
     $("#error_hotels").hide();
   }
});

  $('#ratings').change(function(){
       var rating_val=$('#ratings').val();
  
   if (rating_val=='No thanks') {
    
     $("#error_ratings").hide();
     $("#error_hotels").hide();
     $('#loader-img').hide();
   }
  });


        $("#surgery").change(function(){
     $.ajax({
      url:"sub_surgery.php",
      type:"POST",
    data:'cat='+$("#surgery").val(),
     success:function(msg){
     //alert(msg);
      $("#result").html(msg);
      $("#errorsurgery").hide();
     }     
     });
    });
  });

    $(document).ajaxComplete(function(){
   $("#next").click(function(){

      if ($("#price")[0].selectedIndex == 0) {
        $("#errorsubsurgery").text("Please select sub-surgery");
                return false;
            }

  var datepicker=$("#datepicker").val();
  if (!datepicker) {
   $("#errordate").html("Please enter date");
   return false;
  }

  else
  {
    $("#errordate").hide();
  }

    if($("#source")[0].selectedIndex ==0)
  {
    $("#errorsource").html("Please select source");
   return false;
  }

  else
  {
    $("#errorsource").hide();
  }




  if($("#ratings")[0].selectedIndex ==0)
  {
     $("#error_ratings").show();
    $("#error_ratings").html("Please select ratings");
   return false;
  }

  if (!$('#checkhotel:checked').val() && !rating_val=='No thanks') 
     {
      $("#error_hotels").show();
      $("#error_hotels").html("Please select a hotel");
   return false;
    }
    
  });
  });


  $(document).ajaxComplete(function(){
    $("#price").change(function(){
      $.ajax({
        url:"price.php",
        type:"POST",
        data:'price='+$("#price").val(),
        success:function(msg){
          $("#price-txt").html(msg);
          $("#errorsubsurgery").hide();
        }
      });
    });
  });


$(document).ajaxComplete(function(){
  $("#ratings").change(function(){
     //alert($("#ratings").val());
    $.ajax({

      url:"api.php",
      type:"POST",
      data:'ratings='+ $("#ratings").val(),
      beforeSend:function(){
       $("#loader-img").show();
       },
      success:function(msg){
         $('#loader-img').hide();
         $("#error_ratings").hide();
        $("#hotel_result").html(msg);
         $("#errorsource").hide();
          $("#error_hotels").hide();
        
      }
    });
  });
});

  $(document).ajaxComplete(function(){
    $("#load").click(function(){
      var rowcount= $('#table1 tr').length;
      var ratings= $("#ratings").val();
   
      $.ajax({
        url:"api.php",
        type:"POST",
        data:{
          "rowcount":rowcount,
          "ratings":ratings
        },
        beforeSend:function(){
       $("#loader-img").show();
       },
        success:function(msg){
      $('#loader-img').hide();
         $("#error_ratings").hide();
        $("#hotel_result").html(msg);
         $("#errorsource").hide();
        }
      });
    });
  });


</script>

</head>

<body>
  <form action="zoho.php" method="post">

  <div id="page">
        <div id="contact-area">
                <h2 class="contact">Form </h2>
              </div>
         <div class="surgery-area">
                <?php include 'connect.php'; ?>                      
                <label for="Name">Surgery:</label>
        <select name='surgery'  id="surgery">
        <option value="">--- Select ---</option>
        <?php
        $list=mysql_query("SELECT * FROM surgery");

        while($row_list=mysql_fetch_array($list)){
        ?>
    <option value="<?php echo $row_list['surgery_name']; ?>"><?php echo $row_list['surgery_name']; ?></option>
        <?php
        }
        ?>
        </select>
         <div id="errorsurgery"></div>
    </div>
<div class="surgery-area">
        <div id="result" ></div>  
   <div id="errorsubsurgery"></div>   </div>
       
        
     <div class="surgery-area">
   <label>Surgery Date:</label><input type="text" id="datepicker" name="date" />
            <div id="errordate"></div>   
                        </div>      

      <div class="surgery-area">         
                <label for="Name">Leaving From:</label>
        <select name="source" id="source">
        <option value="">--- Select ---</option>
     <option value="Australia">Australia</option>
    <option value="New Zealand">New Zealand</option>     
        </select>
          <div id="errorsource"></div>
    </div>

     <div class="surgery-area">
                                  
                <label for="Name">Hotel Quality:</label>
        <select name='ratings'  id="ratings">
        <option value="">--- Select ---</option>
       
    <option value="3 Star Hotel">3 Star Hotel</option>
       <option value="4 Star Hotel">4 Star Hotel</option>
       <option value="5 Star Hotel">5 Star Hotel</option>
       <option value="No thanks">No thanks, I will book my own</option>
        </select>
         <div id="error_ratings"></div>
    </div>


   <div class="surgery-area">
        <div id="hotel_result" ></div> 
         <img id="loader-img" src="ajax-loader.gif"> 
   <div id="error_hotels"></div>   </div>
   


<div class="clear"></div>
         <FOOTER class="next"><input type="submit" value="NEXT" id="next"/></FOOTER>
</div>
 
</form>
