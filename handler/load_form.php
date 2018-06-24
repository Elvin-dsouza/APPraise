<?php
    require_once '../includes/classes/form.php';
    require_once '../includes/classes/criteria.php';
    $form = new Form($_REQUEST['e_id']);
    $form_id = $form->f_id;
    $out_array = getFormPart($form_id, $_REQUEST['formPart']);
    echo json_encode($out_array);
?>