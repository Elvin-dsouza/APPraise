<?php
    /**
     * Class Staff
     * By Elvin Shawn DSouza
     * Created Monday 18th Jun 2018 12:26 PM
     */
    require_once 'db.php';

   

    class Staff{
       
        private $statementUpdate;
        private $statementRetrieve;
        private $statementInsert;

        public $data = array();

        private $connection;

        function __construct($e_id){
          
     
            // attempt a database connection
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
            if($e_id == "-1")
                // default data
                $this->data = array('e_id' => 'MAHE9999999',
                'dept_id' => -1,
                'dob' => '1-1-1970',
                'doj' => '1-1-1970',
                'qualification' => 'na',
                'designation' => '1-1-1970',
                'age' => 0,
                'pfno' => 000,
                `superior_id` => 'MAHE00000');
            else
            {
                // Retrieve data from the employee id
                $this->data['e_id'] = $e_id;
                $result = $this->connection->query("SELECT * FROM staff WHERE e_id = '{$this->data['e_id']}'");
                if($result && $result->num_rows == 1){
                    
                    $this->data = $result->fetch_assoc();
                }
            }
        }

        function add($dataArray){
                $this->data = $dataArray;
                $this->statementInsert->execute();
        }

        function update(){
            $this->statementUpdate->execute();
        }
        
        // One Function To prepare them all
        function initQueries(){
            // create Prepared Statements
            $this->statementUpdate = $this->connection->prepare("UPDATE staff SET
                                        `e_id` = ?,
                                        `dept_id` = ?,
                                        `dob` = ?,
                                        `doj` = ?,
                                        `qualification` = ?,
                                        `designation` = ?,
                                        `age` = ?,
                                        `pfno` = ?,
                                        `superior_id` = ? WHERE e_id = ?");
            
            $this->statementInsert = $this->connection->prepare("INSERT INTO staff (
                `e_id`, `name`, 
                `dept_id`, `doj`, 
                `qualification`, `designation`, 
                `age`,`pfno`,`superior_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            // one function to find them 
            $this->statementRetrieve = $this->connection->prepare("SELECT * FROM staff 
                WHERE e_id = ?");
            
           
            // In the Darkness Bind them
            $this->statementUpdate->bind_param("sissssiiss", $this->data['e_id'], $this->data['dept_id'], 
            $this->data['dob'], $this->data['doj'], $this->data['qualification'],
            $this->data['designation'], $this->data['age'], $this->data['pfno'], 
            $this->data['superior_id'], $this->data['e_id']);      

            $this->statementRetrieve->bind_param("s",$this->data['e_id']);

            $this->statementInsert->bind_param("sissssiis", $this->data['e_id'], $this->data['dept_id'], 
            $this->data['dob'], $this->data['doj'], $this->data['qualification'],
            $this->data['designation'], $this->data['age'], $this->data['pfno'], 
            $this->data['superior_id']);
        }

        function __destruct(){
            // destory connection object
            unset($this->connection);
        }
    }



?>