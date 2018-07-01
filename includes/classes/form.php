<?php
    require_once 'db.php';

    class Form{
        public $f_id;
        public $e_id;
        public $createdOn;

        private $connection;
        function __construct($e_id=-1){
            try{
                $db = new MyConnection();
                $this->connection = $db->getConnection();
            }
            catch(Exception $e){
                echo "Error!!!!";
                return;
            }
            if($e_id != -1){

                $result = $this->connection->query("SELECT * FROM form WHERE e_id = '{$e_id}'");
                if($result && $result->num_rows >= 1){
                    $row = $result->fetch_assoc();
                    $this->f_id = $row['f_id'];
                    $this->e_id = $row['e_id'];
                    $this->createdOn = $row['createdOn'];
                }
                else {
                    $this->f_id = -1;
                }
            }
        }

        static function exists($emp){
            $db = new MyConnection();
            $c = $db->getConnection();
            $res = $c->query("SELECT f_id FROM form WHERE e_id='{$emp}'");
            if($res && $res->num_rows > 0)
                return true;
            else
                return false;
        }

        static function validForm($fid){
            $db = new MyConnection();
            $c = $db->getConnection();
            $res = $c->query("SELECT e_id FROM form WHERE f_id='{$fid}'");
            if($res && $res->num_rows > 0){
                $row = $res->fetch_assoc();
                return new Form($row['e_id']);
            }
            else
                return false;
        }
        
        function add($e_id){
            $stmt = $this->connection->prepare("INSERT INTO form (e_id) VALUES (?)");
            $stmt->bind_param("s",$e_id);
            if($stmt->execute()){
                return $this->connection->insert_id;
            }
            else {
                echo $stmt->error;
                return 0;
            }
        }
        function delete(){
            $result = $this->connection->query("DELETE FROM form WHERE f_id ={$this->f_id}");
            if($result){
                return true;
            }
            else return false;
        }

        function display(){
            echo "<br/>";
            echo "Form ID: ", $this->f_id;
            echo "Employee ID: ", $this->e_id;
            echo "Created On: ", Date($this->createdOn);

        }

        function serialize(){
            return array('f_id'=>$this->f_id, 'e_id' => $this->e_id, 'createdOn' => $this->createdOn);
        }

        function __destruct(){

        }
    }
?>