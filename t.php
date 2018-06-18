<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);


    include 'includes/classes/staff.php';
    require_once 'includes/classes/db.php';
    // $d = array('e_id' => 'MAHE1872312',
    //             'dept_id' => 1,
    //             'dob' => '1-1-1970',
    //             'doj' => '1-1-1970',
    //             'qualification' => 'na',
    //             'designation' => '1-1-1970',
    //             'age' => 0,
    //             'pfno' => 000,
    //             `superior_id` => 'MAHE1872312');

    
    $staff = new Staff('MAHE00009');

    // $staff->add($d);

?>