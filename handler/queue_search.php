<?php
    require_once '../includes/list_forms.php';
    $data= array();
    $data=search_forms($_POST['dept_id'],$_POST['search_key']);
    if(count($data)>0){ //returns the number of elements in an array
      echo JSON_encode($data);
    }
    else {
      echo "{}";
    }
?>