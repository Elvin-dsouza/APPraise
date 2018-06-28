<?php
    require_once '../includes/classes/criteria.php';
    $score = new Score($_POST['s_id']);
    $score->update($_POST['value']);
?>