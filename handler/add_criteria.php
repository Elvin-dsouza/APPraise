<?php
   
    require_once '../includes/classes/stack.php';
    $data = json_decode($_POST['json']);
    // print_r($data);

    addCriteriaFromObject($data);
    $output['status'] = 1;
    $output['error'] = 'none';
    echo json_encode($output);


?>