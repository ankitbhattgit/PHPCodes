<?php
$multiarray=array(
               'actor'=>array('aamir','shahrukh','salman'),
                'actress'=>array('kareena','katrina','rani')
                );  
    foreach($multiarray as $i=>$k)
    {
        echo '<b>'. $i .'</b>'. '<br>';
        foreach($k as $stars)
        {
         echo $stars .'<br>';
        }    
    }
    
    
    
 
?>