<?php
    session_start();
    require_once '../includes/auth.php';
    // require_once '../includes/staff.php';
    $promise = authenticate($_POST['e_id'],$_POST['password']);
    if($promise['status'] == 1){
        $staff = new Staff($_POST['e_id']);
        $_SESSION['loggedIn'] = 1;
        $_SESSION['name'] = $staff->data['name'];
        $_SESSION['e_id'] = $staff->data['e_id'];
        $_SESSION['department'] = $staff->data['dept_id'];
    }
    echo json_encode($promise);
?>
