<?php
     /**
     * @package Database Connection Package
     * @author Elvin Shawn DSouza
     * @version 0.1 | Created Monday 18th Jun 2018 12:26 PM
     */

    class MyConnection
    {
        private $hostname = "localhost";
        private $user_name = "appraise";
        private $password = "Dt4iaywxa04H3oNC";
        private $database_name = "Appnotraise";

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
            max_points INT(5) DEFAULT 10,
            FOREIGN KEY(parent_id) REFERENCES criteria(c_id) ON DELETE CASCADE,
            FOREIGN KEY(`eval_level`) REFERENCES eval(`eval_level`)
            )";

       private $table_forms = "CREATE TABLE IF NOT EXISTS form (
            f_id INT(3) PRIMARY KEY AUTO_INCREMENT,
            e_id VARCHAR(15),
            f_status INT(3),
            createdOn TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
            FOREIGN KEY (e_id) REFERENCES staff(e_id) ON DELETE CASCADE)";

        private $table_users = "CREATE TABLE `user`(
            `u_id` INT(3) PRIMARY KEY AUTO_INCREMENT,
            `e_id` VARCHAR(15),
            `email` VARCHAR(128),
            `password` VARCHAR(512),
            `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP() , FOREIGN KEY(`e_id`) REFERENCES `staff`(`e_id`) ON DELETE CASCADE)";

        private $table_departments = "CREATE TABLE IF NOT EXISTS `department` (`dept_id` INT(3) PRIMARY KEY AUTO_INCREMENT,
            `dept_name` VARCHAR(128)
            )";

        private $table_staff = "CREATE TABLE IF NOT EXISTS `staff`(`e_id` VARCHAR(15) PRIMARY KEY,
            `name` VARCHAR(128),
            `dept_id` INT(3),
            `eval_level` INT(3),
            `dob` DATE,
            `doj` DATE,
            `qualification` VARCHAR(24),
            `designation` VARCHAR(80),
            `age` SMALLINT(3),
            `pfno` INT(15),
            `image` VARCHAR(256),
            `superior_id` VARCHAR(15),
            FOREIGN KEY (eval_level) REFERENCES eval(eval_level),
            FOREIGN KEY (superior_id) REFERENCES staff(e_id),
            FOREIGN KEY (dept_id) REFERENCES department(dept_id) ON DELETE CASCADE)";

        public $table_score = "CREATE TABLE IF NOT EXISTS score (
            s_id INT(10) PRIMARY KEY AUTO_INCREMENT,
            f_id INT(3),
            c_id INT(3),
            score DECIMAL(4,2),
            updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
            FOREIGN KEY (f_id) REFERENCES form (f_id) ON DELETE CASCADE,
            FOREIGN KEY (c_id) REFERENCES criteria(c_id) ON DELETE CASCADE)";


        public $table_cumulative="CREATE TABLE IF NOT EXISTS cumulative (
            r_id INT(5) PRIMARY KEY AUTO_INCREMENT,
            f_id INT(3),
            r_1 DECIMAL(5,2),
            r_2 DECIMAL(5,2),
            r_3 DECIMAL(5,2),
            r_4 DECIMAL(5,2),
            r_5 DECIMAL(5,2),
            r_6 DECIMAL(5,2),
            FOREIGN KEY (f_id) REFERENCES form(f_id) ON DELETE CASCADE)";

        public $table_comment="CREATE TABLE IF NOT EXISTS comments (
          cm_id INT(3) PRIMARY KEY AUTO_INCREMENT,
          f_id INT(3),
          appraiserComment VARCHAR(256),
          appraiseeComment VARCHAR(256),
          FOREIGN KEY (f_id) REFERENCES form(f_id) ON DELETE CASCADE)";

        public $table_IDO="CREATE TABLE IF NOT EXISTS objectives(
            o_id INT(3) PRIMARY KEY AUTO_INCREMENT,
            e_id VARCHAR(15),
            c_objective VARCHAR(512),
            c_status VARCHAR(512),
            n_objective VARCHAR(512),
            year INT(4),
            FOREIGN KEY (e_id) REFERENCES staff(e_id) ON DELETE CASCADE)";

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
            $this->con->query($this->table_eval);
            $this->con->query($this->table_critera);
            $this->con->query($this->table_forms);
            $this->con->query($this->table_score);
            $this->con->query($this->table_cumulative);
            $this->con->query($this->table_comment);
            $this->con->query($this->table_IDO);
        }

        function __destruct(){
            // $this->con->close();
        }
    }

?>
