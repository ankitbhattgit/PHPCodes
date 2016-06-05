

<style type="text/css">
  
.dr-searchbar {
    position: relative;
}
.dr-searchbar {
    margin: auto;
    max-width: 780px;
    width: 100%;
}

.dr-searchbar input[type="text"] {
    background: none repeat scroll 0 0 #fff;
    border: medium none;
    color: #c6c4c4;
    float: left;
    font-family: "open_sanssemibold_italic";
    font-size: 22px;
    height: 46px;
    line-height: 46px;
    padding: 0 2%;
    width: 76%;
}

.dr-searchbar input[type="submit"] {
    background: none repeat scroll 0 0 #00dbdf;
    border: medium none;
    color: #140807;
    cursor: pointer;
    float: left;
    font-family: "open_sansbold";
    font-size: 22px;
    height: 46px;
    line-height: 46px;
    width: 20%;
}


.autocomplete-list {
    background: none repeat scroll 0 0 #fff;
    position: absolute;
    top: 50px;
    width: 100%;
    z-index: 1000;
}

.autocomplete-list ul {
    list-style: outside none none;
}

.autocomplete-list li {
    border-bottom: 1px solid #ddd;
    padding: 5px;
}
</style>
<?
    public function ajax_search() {
         $this->layout = null;
        //  $this->set('search');
     //  pr($this->request->data);
         $this->loadModel("Game");
      //   $users = $this->User->find('list', array("fields"=> array("id", "fname"),'conditions' => array('fname =' => $this->request->data)));
          $users = $this->Game->find('list', array("fields"=> array("id", "gm_name"), 'limit' => 10));

         // pr($users); exit;
         echo json_encode($users);
         exit();
      }



      public function search() {
         $this->layout = null;
        $game=$this->request->data;
        if(isset($game['Game']['gm_name']))
        {
       $game=$game['Game']['gm_name'];

     //  pr($game);
    // exit;

     $game_result = $this->User->find('all',array(
         'conditions' => array(
             'gm_name LIKE' =>  '%'.$game.'%'
         )

     ));
       $this->set('search', $game_result);
     
      }
     }

  
}

?>

<?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'); ?>


<div class="dr-searchbar">


      <form accept-charset="utf-8" method="post" id="UserSearchForm" action="/cake/users/search">
        <div style="display:none;"><input type="hidden" value="POST" name="_method"></div>  
        <label for="game_search">Fname</label><input type="text" required="required" maxlength="255" placeholder="Search Your Game
            Here" autocomplete="off" id="game_search" class="form-control" name="data[User][fname]">      
          <div class="input submit"><label for="UserSearch">Search</label><div class="submit"><input type="submit" value="Search"></div></div>
       </form> 
      <div class="autocomplete-list">
         <ul style="display: none;" class="search_result_ul">
          <li id="suggestions"     style="display: list-item;">2 In 1: Flying Warriors / Fighting Simulator</li><li id="suggestions" style="display: list-
          item;">4 in 1 Funpak</li><li id="suggestions" style="display: list-item;">4 in 1 Funpak 2</li><li id="suggestions"
          style="display: list-item;">720</li><li id="suggestions" style="display: list- item;">Addams Family</li><li
          id="suggestions" style="display: list- item;">Addams Family Pugsley's Scavenger Hunt</li><li id="suggestions"
          style="display: list-item;">Adventure Island</li><li id="suggestions" style="display: list-item;">Adventure Island
          II</li><li id="suggestions" style="display: list-item;">Adventure of Star Saver</li><li id="suggestions" style="display:
          list-item;">Aerostar</li>
         </ul>
      </div>            
 </div>



<script>
   
      $('#game_search').focus(function(){
          var search = $('#game_search').val();
          if($('.search_result_ul').length) return false;
          $.ajax({
           type: "POST",
           url: "<?php  echo Router::Url(array('controller' => 'users', 'action' => 'ajax_search'),TRUE);?>",
           data: search,
           success: function(response){
              if(response) {
                var response = $.parseJSON(response);
                   var list = "<ul class='search_result_ul' style='display: none;'>";
                  $.each(response, function(index, element) {
                       if(element!=''){
                          list += "<li id='suggestions'>"+element+"</li>";    
                       }
                });    
                list += "</ul>";
                $('.autocomplete-list').html(list) ;          
              }              
            }
          });
      });

    $('#game_search').keyup(function(){
        // if($(this).val().length < 3) return false;
        if($(this).val() == "") $('.search_result_ul').hide();
        else $('.search_result_ul').show();
        $(".search_result_ul li").each(function (index) {
        var search = $('#game_search').val();
        if ($(this).length > 0) {
            if (!$(this).text().toLowerCase().match(new RegExp(search, "i"))) {
                $(this).fadeOut("fast");
            } else {
                $(this).fadeIn("fast");
            }
        }
      }); 
    });

    

      $(".autocomplete-list").on('click','#suggestions',function(){
        var options = $(this).text();    
        if (options != '') {$('#game_search').val(options);}
        else { return false; }

      });


  </script>