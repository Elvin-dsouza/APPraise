<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);


    include 'includes/classes/form.php';
    require_once 'includes/classes/db.php';
    require_once 'includes/classes/criteria.php';
   
    // $staff = new Staff();


   $criteria = new Criteria(11,true,1);
   $score = new Score();
//    print_r($criteria->data);
   echo json_encode($criteria->data);
    

?>