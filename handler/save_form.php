<?php
    //TODO: change all $_REQUEST to $_POST
    require_once '../includes/classes/criteria.php';
    echo $_REQUEST['json'];
    $input = json_decode($_REQUEST['json']);
    foreach($input as $item){
        if($item->s_id != "undefined"){
            $score = new Score($item->s_id);
            $score->update($item->value);
        }
    }
    // $f_id = $_REQUEST['f_id'];
  
    // echo $count;
    
   





?>