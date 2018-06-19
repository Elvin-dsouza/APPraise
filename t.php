<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);


    include 'includes/classes/staff.php';
    require_once 'includes/classes/db.php';
   

    
    $staff = new Staff('MAHE721731');
    echo  $staff->data['e_id']." ".$staff->data['name']. " ".$staff->data['pfno'];
    $staff->data['pfno']=1121;
    print_r($staff->data);
    echo $staff->update();
    echo  $staff->data['e_id']." ".$staff->data['name']. " ".$staff->data['pfno'];
    echo '<br/>';
    print_r($staff->data);
    echo '<br/>';
    $staff2 = new Staff('-1');
    $d = array('e_id' => 'MAHE721731','name' => "test",'dept_id' => 1,'dob' => '1970-1-1','doj' => '1970-1-1','qualification' => 'na','designation' => 'na','age' => 18,'pfno' => '000', 'superior_id' => 'MAHE00009');
    $staff2->add($d);
    print_r($staff2->data);
    // $staff->add($d);

?>