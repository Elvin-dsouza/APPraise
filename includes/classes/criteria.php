<?php
    /**
     * @package criteria
     * @author Mohammed Adil Taj
     * @version 0.1 | Created Thursday 18th Jun 2018 12:26 PM
     */

    require_once 'db.php';

    class Criteria{

        private $statementUpdate;
        private $statementRetrieve;
        private $statementInsert;

        public $data = array();

        private $connection;
        /** Constructor
         *  @param e_id employee id, -1 for a default container
         */
        function __construct($c_id = "-1"){

            // attempt a database connection
            if($c_id == "-1")
              {  // default data

            try{

                $db = new MyConnection();
                $this->connection = $db->getConnection();

                // Initialise frequently used queries as prepared statements
                $this->initQueries();

            }
            catch (Exception $e){
                echo "MySQL Connection Failed";
            }
            // if the emmployee id is -1 create a container employee


              }
            else // if not check if employee exists and then retrieve
            {
                // Retrieve data from the employee id
                $this->data['c_id'] = $c_id;
                $result = $this->connection->query("SELECT * FROM criteria WHERE c_id = '{$this->data['c_id']}'");
                if($result && $result->num_rows == 1){

                    $this->data = $result->fetch_assoc();
                }
                else{
                    echo "Cannot Retrieve";
                }
            }
        }
         /** Add Function
         *  @param dataArray Array containing all staff information
         */
        function add($dataArray){
                $this->data = $dataArray;
                //print_r($this->data);
                $this->statementInsert->bind_param("issiiiii", $this->data['c_id'], $this->data['heading'], $this->data['description'], $this->data['part'], $this->data['eval_level'],$this->data['isSubCriteria'], $this->data['parent_id'],$this->data['numChildren']);

                $r = $this->statementInsert->execute();
                
                echo "hello4";
                if($r>0)
                {

                  echo "hello4";
                    return 1;
                  }
                else
                    return $this->statementInsert->errno;
        }

        function exists(){
            $qry = "SELECT * FROM criteria WHERE c_id = '{$this->c_id}'";
            $result = $connection->query($qry);
            if ($result && $result->num_rows == 1)
                return true;
            else
                return false;
        }

        /** Update Function
         *
         */
        function update(){
            $this->statementUpdate->bind_param("issiiiii", $this->data['c_id'], $this->data['heading'], $this->data['description'], $this->data['part'], $this->data['eval_level'],$this->data['isSubCriteria'], $this->data['parent_id'],$this->data['numChildren']);
            $r = $this->statementUpdate->execute();
                if($r)
                    return 1;
                else
                    return $this->statementUpdate->errno;
        }

        // One Function To prepare them all
        function initQueries(){
            // create Prepared Statements
            $this->statementUpdate = $this->connection->prepare("UPDATE criteria SET
                    `c_id` = ?,
                    `heading` = ?,
                    `description` = ?,
                    `part` = ?,
                    `eval_level` = ?,
                    `isSubCriteria` = ?,
                    `parent_id` = ?,
                    `numChildren` = ?");

            $this->statementInsert = $this->connection->prepare("INSERT INTO criteria (
                `c_id`,
                `heading`, `description`, `part`,
                `eval_level`, `isSubCriteria`,
                `parent_id`,`numChildren`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            // one function to find them
            $this->statementRetrieve = $this->connection->prepare("SELECT * FROM criteria
                WHERE c_id = ?");
            // In the Darkness Bind them
            $this->statementUpdate->bind_param("issiiiii", $this->data['c_id'],$this->data['heading'], $this->data['description'], $this->data['part'], $this->data['eval_level'], $this->data['isSubCriteria'], $this->data['parent_id'], $this->data['numChildren']);

            $this->statementRetrieve->bind_param("s",$this->data['c_id']);

            // $this->statementInsert->bind_param("sissssiis", $this->data['e_id'], $this->data['dept_id'], $this->data['dob'], $this->data['doj'], $this->data['qualification'],$this->data['designation'], $this->data['age'], $this->data['pfno'], $this->data['superior_id']);
        }

        function __destruct(){
            // destory connection object
            unset($this->connection);
        }
    }



?>
