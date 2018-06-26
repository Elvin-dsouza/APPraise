<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);
    include 'includes/classes/form.php';
    require_once 'includes/classes/db.php';
    require_once 'includes/classes/staff.php';
    require_once 'includes/classes/criteria.php';

    echo "hello";

    $data = array('c_id' => '1',
    'heading' => 'Communication skill',
    'description' => 'how good is he/she in communication',
    'part' => 1,
    'eval_level' => 1,
    'isSubCriteria' => 0,
    'parent_id' => NULL,
    'numChildren' => 1);
    echo "hello1";
  //  print_r($data);

    $criteria=new Criteria();
    echo "hello2";
    $id=$criteria->add($data);
    echo "hello3";
    // $staff = new Staff();
    // $form = new Form();
    // $id = $form->add('MAHE00009');
    // echo $id;
    // $form->display();
    // $form2 = new Form($id);
    // $form2->display();

?>
