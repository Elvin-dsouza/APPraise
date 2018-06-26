<?php
    /**
     * @package Authentication
     * @author Elvin Shawn Dsouza, Shwetha Bhagwath
     * @version 0.1 | Created on Monday 18th Jun 2018 08:17 PM
     */

    require_once 'classes/db.php';
    require_once 'classes/staff.php';

    /** Authentication Function
     *  @param employee_id
     *  @param password unhashed user password obtained from the user raw input
     *  @return promise promise object with attributes, status and error status = 1 success
     */
    function authenticate($employee_id, $password){
        $promise = array('status' => 1, 'error' => 'Invalid Password');
        $db = new MyConnection();
        $password = "";
        $connection = $db->getConnection();
        $hashed = hash("sha512",$password,false);
        // echo $hashed;
        // $stmt = $connection->prepare("SELECT `password` FROM user WHERE `e_id` = ?");
        // $stmt->bind_param("s", $employee_id);
        // $stmt->execute();
        // $stmt->bind_result($password);
        $result = $connection->query("SELECT `password` FROM user WHERE e_id = '{$employee_id}'");
        if($result->num_rows > 0){
            $promise['status'] = 0;
            $promise['error'] = "Invalid Password";
            $row = $result->fetch_assoc();
            if($hashed == $row['password']){
                $promise['status'] = 1;
                $promise['error'] = NULL;
            }
        }
        else {
            $promise['status'] = -1;
            $promise['error'] = 'Employee Does not exist';
        }
        return $promise;
    }

     /** Registration Function
     *  @param employee_id
     *  @param password unhashed user password obtained from the user raw input
     *  @param email The email Address of the user
     *  @param data an array consisting of all the staff data.
     *  @return promise promise object with attributes, status and error status = 1 success
     */
    function registration($e_id, $password, $email, $data){
         $promise = array('status' => 1, 'error' => 'Invalid Password');
         $db = new MyConnection();
         $connection = $db->getConnection();
         $hashed = hash("sha512",$password,false);
         $staff = new Staff();
         $staff->data['e_id'] = $e_id;
         if(!$staff->exists()){
            if($staff->add($data) == 1){
               // Create entry in user table
               $user = new Users();
               $data = array('e_id' => $e_id , 'email' => $email , 'password' => $password);
               $id = $user -> add($data);
               echo $id;
               $promise = array('status' => 1, 'error' => 'none');
               // return Succesful promise
               return $promise;
            }
            else {
                $promise = array('status' => -2, 'error' => 'Error While updating staff information');
                return $promise;
            }
            return $promise;
         }
         else {
             $promise = array('status' => -1, 'error' => 'User Already Exists');
             return $promise;
         }
    }
?>
