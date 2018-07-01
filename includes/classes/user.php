<?php


    require_once 'db.php';

    class Users{

        private $statementUpdate;
        private $statementRetrieve;
        private $statementInsert;

        public $data = array();

        private $connection;

        function __construct($u_id = "-1"){
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
            if($u_id == "-1")
                // default data
                $this->data = array('u_id'=> -1,
                'e_id' => 'MAHE9999999',
                'email' => 'na',
                'password' => 'na');
            else // if not check if employee exists and then retrieve
            {
                // Retrieve data from the employee id
                $this->data['u_id'] = $u_id;
                $result = $this->connection->query("SELECT * FROM user WHERE u_id = '{$this->data['u_id']}'");
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
                // print_r($this->data);
                $this->statementInsert->bind_param("sss", $this->data['e_id'], $this->data['email'], $this->data['password']);
                $r = $this->statementInsert->execute();
                if($r){
                  //echo "error ",$this->connection->insert_id;
                    return $this->connection->insert_id;
                  }
                else
                    return $this->statementInsert->errno;
        }

        function exists(){
            $qry = "SELECT * FROM user WHERE e_id = '{$this->e_id}'";
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
            $this->statementUpdate->bind_param("sssi", $this->data['e_id'],$this->data['email'], $this->data['password'], $this->data['u_id']);
            $r = $this->statementUpdate->execute();
                if($r)
                    return 1;
                else
                    return $this->statementUpdate->errno;
        }

        // One Function To prepare them all
        function initQueries(){
            // create Prepared Statements
            $this->statementUpdate = $this->connection->prepare("UPDATE user SET e_id = ?,
            email = ?,
            password = ? WHERE u_id = ?");
            $out = $this->statementUpdate->bind_param("sssi",$this->data['e_id'], $this->data['email'], $this->data['password'], $this->data['u_id']);
            // print_r($out);
            $this->statementInsert = $this->connection->prepare("INSERT INTO user (
                `e_id`, `email`,
                `password`) VALUES (?, ?, ?)");
            // one function to find them
            $this->statementRetrieve = $this->connection->prepare("SELECT * FROM user
                WHERE e_id = ?");
            // In the Darkness Bind them
            $this->statementRetrieve->bind_param("s",$this->data['e_id']);

            // $this->statementInsert->bind_param("sissssiis", $this->data['e_id'], $this->data['dept_id'], $this->data['dob'], $this->data['doj'], $this->data['qualification'],$this->data['designation'], $this->data['age'], $this->data['pfno'], $this->data['superior_id']);
        }

        function display(){
          echo"<br/>";
          echo "User ID: ",$this->data->u_id;
          echo "Employee ID: ",$this->data->e_id;
          echo "Email: ",$this->data->email;
          echo "Password: ",$this->data->password;
          //echo "Updated on: ",$this->updated;
        }

        function __destruct(){
            // destory connection object
            unset($this->connection);
        }
    }



?>
