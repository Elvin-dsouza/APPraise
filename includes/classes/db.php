<?php
     /**
     * @package Database Connection Package
     * @author Elvin Shawn DSouza
     * @version 0.1 | Created Monday 18th Jun 2018 12:26 PM
     */

    class MyConnection
    {
        private $hostname = "localhost";
        private $user_name = "root";
        private $password = "";
        private $database_name = "Appraise";

       private $table_eval = "CREATE TABLE IF NOT EXISTS eval(
            eval_level INT(3) PRIMARY KEY AUTO_INCREMENT,
            designation VARCHAR(50)
            )";

       private $table_critera = "CREATE TABLE IF NOT EXISTS criteria(
            c_id INT(3) PRIMARY KEY AUTO_INCREMENT,
            heading VARCHAR(256),
            description VARCHAR(256),
            part INT(3) NOT NULL,
            eval_level INT(3) NOT NULL,
            isSubCriteria TINYINT NOT NULL,
            parent_id INT(3),
            numChildren INT(3) DEFAULT 0,
            FOREIGN KEY(parent_id) REFERENCES criteria(c_id) ON DELETE CASCADE,
            FOREIGN KEY(`eval_level`) REFERENCES eval(`eval_level`)
            )";

       private $table_forms = "CREATE TABLE IF NOT EXISTS form (
            f_id INT(3) PRIMARY KEY AUTO_INCREMENT,
            e_id VARCHAR(15),
            createdOn TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
            FOREIGN KEY (e_id) REFERENCES staff(e_id) ON DELETE CASCADE)";

        private $table_users = "CREATE TABLE `user`(
            `u_id` INT(3) PRIMARY KEY AUTO_INCREMENT,
            `e_id` VARCHAR(15),
            `email` VARCHAR(128),
            `password` VARCHAR(512),
            `updated` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(), FOREIGN KEY(`e_id`) REFERENCES `staff`(`e_id`) ON DELETE CASCADE)";

        private $table_departments = "CREATE TABLE IF NOT EXISTS `department` (`dept_id` INT(3) PRIMARY KEY AUTO_INCREMENT,
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
            $this->con->query($this->table_departments);
            $this->con->query($this->table_staff);
            $this->con->query($this->table_users);
            $this->con->query($this->table_critera);
            $this->con->query($this->table_eval);
            $this->con->query($this->table_forms);
        }

        function __destruct(){
            // $this->con->close();
        }
    }

?>
