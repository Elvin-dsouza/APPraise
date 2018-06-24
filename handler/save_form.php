<?php
    //TODO: change all $_REQUEST to $_POST
    echo $_REQUEST['json'];
    $input = json_decode($_REQUEST['json']);
    foreach($input as $item){
        if($item->s_id == "undefined")
            $count++;
    }
    // $f_id = $_REQUEST['f_id'];
  
    echo $count;
    
   





?>