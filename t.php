<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);


    include 'includes/classes/form.php';
    require_once 'includes/classes/db.php';
    require_once 'includes/classes/staff.php';
   
    // $staff = new Staff();


    $form = new Form();
    $id = $form->add('MAHE00009');
    echo $id;
    $form->display();
    $form2 = new Form($id);
    $form2->display();
    

?>