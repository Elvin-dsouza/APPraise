<?php
    /**
    * @package Criteria
    * @author Mohd Adil Taj, Elvin Shawn DSouza
    * @version 0.3 | Created Monday 22nd Jun 2018 12:26 PM
    */

   require_once 'db.php';

    class Criteria{
        public $c_id;
        public $heading;
        public $description;
        public $part;
        public $eval_level;
        public $isSubCriteria;
        public $parent_id;
        public $numChildren;
        public $data=array();

        private $connection;


        function __construct($c_id=-1, $use_scores = false, $f_id=-1){
            try{
                $db = new MyConnection();
                $this->connection = $db->getConnection();
            }
            catch(Exception $e){
                echo "Error: Unable to establish a connection with the database server";
                return;
            }
            if($c_id != -1){

                $result = $this->connection->query("SELECT * FROM criteria WHERE c_id = {$c_id}");
                if($result && $result->num_rows >= 1){
                    $row = $result->fetch_assoc();
                    $this->data = $row;
                }
                if($this->data['numChildren'] > 0){
                    $result = $this->connection->query("SELECT c_id FROM criteria WHERE parent_id = {$c_id}");
                    if($result && $result->num_rows >= 1){
                        while($row = $result->fetch_assoc()){
                            if($use_scores)
                                $child = new Criteria($row['c_id'],true,$f_id);
                            else
                                $child = new Criteria($row['c_id']);
                            $this->data['children'][] = $child->data;
                        }
                    }
                }
                else {
                    $points;
                    if($use_scores == true){

                        $points = Score::AppraisalFormCriteriaScore($c_id, $f_id);
                        // echo "<br/>";
                        if($points != false){
                           $this->data['s_id'] = $points->s_id;
                           $this->data['value'] = $points->score;
                        }
                    }
                    else {
                        $this->data['value'] = 0;
                        // $this->data['s_id'] = $points->score;
                    }
                }
            }
        }

        function add($dataArray){

            $this->data = $dataArray;
            $stmt = $this->connection->prepare("INSERT INTO criteria (c_id,heading, description, part,eval_level,isSubCriteria,parent_id,numChildren, max_points) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("issiiiiii",$this->data['c_id'], $this->data['heading'], $this->data['description'], $this->data['part'], $this->data['eval_level'],$this->data['isSubCriteria'], $this->data['parent_id'],$this->data['numChildren'], $this->data['max_points']);
            if($stmt->execute()){
                return $this->connection->insert_id;
            }
            else {
                echo $stmt->error;
                return 0;
            }
        }
        function update($dataArray){
          $this->data = $dataA;
          $stmtUpdate = $this->connection->prepare("UPDATE criteria SET c_id = ?,
                    `heading` = ?,
                    `description` = ?,
                    `part` = ?,
                    `eval_level` = ?,
                    `isSubCriteria` = ?,
                    `parent_id` = ?,
                    `max_points` = ?,
                    `numChildren` = ? WHERE c_id=?");

            $stmtUpdate->bind_param("issiiiiiii", $this->data['c_id'], $this->data['heading'], $this->data['description'], $this->data['part'], $this->data['eval_level'],$this->data['isSubCriteria'], $this->data['parent_id'],$this->data['max_points'],$this->data['numChildren'],$this->data['c_id']);

            $r = $stmtUpdate->execute();
            echo "hello";
                if($r)
                    return 1;
                else
                    return $this->stmtUpdate->errno;
        }


        function delete(){
            $stmtDelete = $this->connection->prepare("DELETE FROM criteria WHERE c_id =?");
            $stmtDelete->bind_param("i",$this->data['c_id']);
            $result=$stmtDelete->execute();
            if($result){
                return true;
            }
            else return false;
        }



        function display(){
            echo "<br/>";
            echo "Form ID: ", $this->data['c_id'];
            echo "Employee ID: ", $this->data['heading'];
            echo "Created On: ", $this->data['description'];

        }

        function __destruct(){
//  unset($this->connection);
        }
    }
?>


<?php

    /**
     * @package Score
     * @author Elvin Shawn D'souza
     * @version 0.2 | Created Monday 23rd Jun 2018 12:26 PM
     */
    class Score{
        public $s_id;
        public $c_id;
        public $f_id;
        public $score;
        public $create_table = "CREATE TABLE IF NOT EXISTS score (
            s_id INT(10) PRIMARY KEY AUTO_INCREMENT,
            f_id INT(3),
            c_id INT(3),
            score DECIMAL(4,2),
            FOREIGN KEY (f_id) REFERENCES form (f_id) ON DELETE CASCADE,
            FOREIGN KEY (c_id) REFERENCES criteria(c_id) ON DELETE CASCADE)";
        private $connection;
        function __construct($s_id = -1){
            $db = new MyConnection();
            $this->connection = $db->getConnection();
            $this->connection->query($this->create_table);
            if($s_id == -1){

                $this->s_id = -1;
                $this->f_id = -1;
                $this->c_id = -1;
                $this->score = 0;

            }
            else{
                // TODO: Convert to prepared Statementns
                $result = $this->connection->query("SELECT * FROM score WHERE s_id = {$s_id}");
                if($result && $result->num_rows == 1){
                    $row = $result->fetch_assoc();
                    $this->s_id = $row['s_id'];
                    $this->c_id = $row['c_id'];
                    $this->f_id = $row['f_id'];
                    $this->score = $row['score'];
                }
                else {
                    $this->score = 0;
                }
            }

        }

        function update($uScore){
            $stmt = $this->connection->prepare("UPDATE score SET score = ? WHERE s_id = ?");
            $stmt->bind_param("ii",$uScore,$this->s_id);
            if($stmt->execute()){
                return $this->connection->insert_id;
            }
            else {
                echo $stmt->error;
                return 0;
            }
        }

        static function AppraisalFormCriteriaScore($criteria_id, $form_id){
            $db = new MyConnection();
            $c = $db->getConnection();
            $result = $c->query("SELECT s_id FROM score WHERE c_id = {$criteria_id} AND f_id = {$form_id}");
                if($result && $result->num_rows == 1){
                    $row = $result->fetch_assoc();
                    return new Score($row['s_id']);
                }
                else return false;
        }

        function __destruct(){

        }

    }


    //  PARTS

    const FORM_PART_A = 1;
    const FORM_PART_A_HEADING = "PART A: Teaching Support";
    const FORM_PART_B1 = 2;
    const FORM_PART_B1_HEADING = "PART B1: Research Accomplishments";
    const FORM_PART_B2 = 3;
    const FORM_PART_B2_HEADING = "PART B2: Professional Accomplishments";
    const FORM_PART_B3 = 4;
    const FORM_PART_B3_HEADING = "PART B3: Administrative and Other Activities";

    /**
     * Function getFormPart
     * Gets the form's criteria as an array of objects given the form id and the partition id
     *
     */
    function getFormPart($form_id, $part = FORM_PART_A){
        $output = array();
        $db = new MyConnection();
        $con = $db->getConnection();
        $result = $con->query("SELECT * FROM criteria WHERE part = {$part} AND isSubCriteria <> 1");
        if($result && $result->num_rows){
            while($row = $result->fetch_assoc()){
                 $temp =  new Criteria($row['c_id'],true,$form_id);
                $output[] = $temp->data;
            }

        }
        return $output;
    }

    function getForm($form_id){

    }

?>
