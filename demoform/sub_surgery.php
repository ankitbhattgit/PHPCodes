
<?php
 $cat = $_REQUEST['cat'];
?>                      
            <?php include 'connect.php'; ?>                    
       
       <label for="Name">Sub-Surgery:</label>
            <?php
          
            $list=mysql_query("SELECT id from surgery where surgery_name='$cat'");
             $sid=mysql_fetch_array($list);
            $sid=$sid['id'];
         $sublist=mysql_query("SELECT surgery_name from sub_surgery where parent_id='$sid'") or die(mysql_error());
        ?>   <select name="sub_surgery"  id="price" >
         <option value="">--- Select ---</option>
     <?php  while($row_list=mysql_fetch_array($sublist)){
              
            ?>
            <option value="<?php echo $row_list['surgery_name'] ?>"><?php echo $row_list['surgery_name']; ?></option>
            <?php
            }
            ?>
        </select>

         
                  
	