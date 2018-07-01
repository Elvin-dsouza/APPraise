<?php
    require_once '../includes/list_forms.php';
    $data= array();
    $data=list_forms(1);
    if(count($data)>0){ //returns the number of elements in an array
      echo JSON_encode($data);
    }
    else {
      echo "0";
    }
?>