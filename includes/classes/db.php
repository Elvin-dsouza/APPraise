<?php
    class MyConnection
    {
        private $hostname = "localhost";
        private $user_name = "appraise";
        private $password = "Dt4iaywxa04H3oNC";
        private $database_name = "Appraise";
      
       

        const table_criteria = "";

        private $table_users = "CREATE TABLE `user`(
            `u_id` INT(3) PRIMARY KEY AUTO_INCREMENT,
            `e_id` VARCHAR(15),
            `email` VARCHAR(128),
            `password` VARCHAR(512),
            `updated` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(), FOREIGN KEY(`e_id`) REFERENCES `staff`(`e_id`))";

        private $table_department = "CREATE TABLE IF NOT EXISTS `department` (`dept_id` INT(3) PRIMARY KEY AUTO_INCREMENT,
            `dept_name` VARCHAR(128)
            )";

        private $table_staff = "CREATE TABLE IF NOT EXISTS `staff`(`e_id` VARCHAR(15) PRIMARY KEY,
            `dept_id` INT(3),
            `dob` DATE,
            `doj` DATE,
            `qualification` VARCHAR(24),
            `designation` VARCHAR(80),
            `age` SMALLINT(3),
            `pfno` INT(15),
            `superior_id` VARCHAR(15),
            FOREIGN KEY (superior_id) REFERENCES staff(e_id),
            FOREIGN KEY (dept_id) REFERENCES department(dept_id) ON DELETE CASCADE)";
        

        private $con;

        function __construct(){
            $con = new mysqli($this->hostname,$this->user_name,$this->password,$this->database_name);
            $this->con = $con;
            if($con->connect_error){
                throw new Exception("Database Connection Failed");
            }
            else {
                $this->createTables();
                return $con;
            }
        }

        function getConnection(){
            return $this->con;
        }

        function createTables(){
            $this->con->query($this->table_department);
            $this->con->query($this->table_staff);
            $this->con->query($this->table_users);  
        }

        function __destruct(){
            $this->con->close();
        }
    }
    
?>