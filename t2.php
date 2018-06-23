<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);


    include 'includes/classes/form.php';
    require_once 'includes/classes/db.php';
    require_once 'includes/classes/staff.php';
    require_once 'includes/classes/user.php';

    // $data=array('e_id'=>'MAHE00009','email'=>'wierd1@gmail.com','password'=>'wierdoooo');
    // // echo "1";
    //
    // $users=new Users();
    // $id = $users->add($data);
    // echo "Added id: ". $id;

    // $data=array('u_id'=>13, 'e_id'=>'MAHE00009','email'=>'wierd1@gmail.com','password'=>'wierdoooo');

    $user2 = new Users(13);
    $user2->data['email'] = 'sdouza3011@gmail.com';
    print_r($user2->data);
    $user2->update();

    

?>
