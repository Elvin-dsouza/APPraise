<?php
    /**
     * @package Authentication
     * @author Elvin Shawn Dsouza
     * @version 0.1 | Created on Monday 18th Jun 2018 08:17 PM
     */

    require_once 'db.php';


    /** Authentication Function
     *  @param employee_id 
     *  @param password unhashed user password obtained from the user raw input
     *  @return promise promise object with attributes, status and error status = 1 success 
     */
    function authenticate($employee_id, $password){
        $promise = array('status' => 1, 'error' => 'Invalid Password');
        $db = new MyConnection();
        $hashed = hash("sha512",$password,false);
        $stmt = $db->prepare("SELECT `password` FROM user WHERE `e_id` = ?");
        $db->bind_params("s",$employee_id);
        $result = $stmt->get_Result();
        if($result && $result->num_rows){
            $promise['status'] = 0;
            $promise['error'] = "Invalid Password";
            $row = $result->fetch_assoc();
            if($hashed == $row){
                $promise['status'] = 1;
                $promise['error'] = NULL;
            }
        }
        else {
            $promise['status'] = -1;
            $promise['error'] = 'Employee Does not exist';
        }
        
    }
?>