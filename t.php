<?php
//     error_reporting(E_ALL);
//     ini_set('error_reporting', E_ALL);


//     include 'includes/classes/form.php';
require_once 'includes/classes/db.php';
//     require_once 'includes/classes/criteria.php';
   
//     // $staff = new Staff();


//     $array = getFormPart(1,FORM_PART_A);
//     // print_r($array);

// //    print_r($criteria->data);
//    echo json_encode($array);
    
$db = new MyConnection();
$connection = $db->getConnection();
 print_r($connection->error_list);
?>

