<?php
    require_once '../includes/auth.php';
    $promise = authenticate($_POST['e_id'],$_POST['password']);
    echo json_encode($promise);
?>
