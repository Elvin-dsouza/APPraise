<?php
    //TODO: change all $_REQUEST to $_POST
    require_once '../includes/auth.php';
    $input = json_decode($_POST['json'],true);
    $output = registration($_POST['e_id'], $_POST['password'], $_POST['email'], $input['staff'], $_POST['image']);
    echo json_encode($output);
?>