<?php
    session_start();
    require_once '../includes/classes/db.php';
    require_once '../includes/classes/form.php';

    $e_id = $_SESSION['e_id'];
    $form = new Form();
    $f_id = $form->add($e_id);
    echo $f_id;
    if($f_id != 0){
       echo "output ", createAllScores($f_id);
       header("location:../pms.php?f_id={$f_id}");
    }

    function createAllScores($f_id){
        $output = 1;
        $db = new MyConnection();
        $connection = $db->getConnection();
        $result = $connection->query("SELECT c_id FROM criteria WHERE numChildren = 0");
        // print_r($result);
        if($result && $result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $c_id = $row['c_id'];
                $res = $connection->query("INSERT INTO score (c_id, f_id) VALUES ({$c_id},{$f_id})");
                if($res){
                    $output *= 1;
                }
                else {
                    $output *= 0;
                }
            }
        }
        return $output;
    }
?>