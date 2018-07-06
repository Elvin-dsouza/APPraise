<?php
/**
  *@package list forms
  */

  require_once 'classes/db.php';
  require_once 'classes/staff.php';
  require_once 'classes/form.php';

  function list_forms($dept_id)
  {
    try{
    $db = new MyConnection();
    $connection = $db->getConnection();
    }
    catch (Exception $e){
      echo "MySQL Connection Failed";
    }

    $arra= array();
    $query="SELECT f.f_id,s.name,d.dept_id,s.designation,s.e_id FROM form f JOIN staff s ON f.e_id=s.e_id JOIN department d ON s.dept_id=d.dept_id WHERE d.dept_id=$dept_id";
    if($result=$connection->query($query)){
      while($row=$result->fetch_assoc()){
          $arra[]=$row;
        }
      }
      else {
        return 0;
      }
    return $arra;
  }


  function search_forms($dept_id, $search_key)
  {
    try{
    $db = new MyConnection();
    $connection = $db->getConnection();
    }
    catch (Exception $e){
      echo "MySQL Connection Failed";
    }

    $arra= array();
    $query="SELECT f.f_id,s.name,d.dept_id,s.designation,s.e_id FROM form f JOIN staff s ON f.e_id=s.e_id JOIN department d ON s.dept_id=d.dept_id WHERE d.dept_id=$dept_id AND (s.name LIKE '".$search_key."%' OR s.designation LIKE '".$search_key."%' OR s.e_id LIKE '".$search_key."%')";
    // echo $query;
    if($result=$connection->query($query)){
      while($row=$result->fetch_assoc()){
          $arra[]=$row;
        }
      }
      else {
        return 0;
      }
    return $arra;
  }
