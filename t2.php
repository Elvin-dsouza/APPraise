<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);


    require_once 'includes/classes/form.php';
    require_once 'includes/classes/db.php';
    require_once 'includes/classes/staff.php';
    require_once 'includes/classes/user.php';
    require_once 'includes/auth.php';
    require_once 'includes/list_forms.php';

    // $data=array('e_id'=>'MAHE00009','email'=>'wierd1@gmail.com','password'=>'wierdoooo');
    // // echo "1";
    //
    // $users=new Users();
    // $id = $users->add($data);
    // echo "Added id: ". $id;

    // $data=array('u_id'=>13, 'e_id'=>'MAHE00009','email'=>'wierd1@gmail.com','password'=>'wierdoooo');

    // $user2 = new Users(13);
    // $user2->data['email'] = 'sdouza3011@gmail.com';
    // print_r($user2->data);
    // $user2->update();

    //inserting the staff record to user table

    // $data = array('e_id' => 'MAHE00006' , 'name' => 'Adil',
    // 'dept_id' => '1' ,
    // 'dob' => '1996/07/12' ,
    // 'doj' => '2000/12/14' ,
    // 'qualification' => 'MCA' ,
    // 'designation' => 'Lecture' ,
    // 'age' => '30' ,
    // 'pfno' => '12345' ,
    // 'superior_id' => 'MAHE00009');
    //
    // $re = registration('MAHE00006' , 'adil' , 'Adil@gmail.com', $data);
    // print_r($re);

    //to list the forms of the particular department
    $data= array();
    $data=list_forms(5);
    //print_r($data);
    if(count($data)>0){ //returns the number of elements in an array
      echo JSON_encode($data);
    }
    else {
      echo "No records found!!";
    }
?>
