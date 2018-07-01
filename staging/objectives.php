<?php

/**
// * @package Criteria
// * @author Mohd Adil Taj, Arfan M Rafique
// * @version 0.3 | Created Thursday 28nd Jun 2018
*/

require_once 'db.php';

class Objectives
{
	public $data=array();

	private $connection;

	function __construct($e_id=-1)
	{
		try
		{
			$db=new Myconnection();
			$this->connection=$db->getConnection();
		}
		catch(Exception $e)
		{
			echo "Error: Unable to establish a connection with the database server";
			return;
		}
		if($e_id!=-1)
		{
				$result=$this->connection->query("SELECT * FROM objectives WHERE e_id={$e_id}");
				if($result&&$result->num_rows>=1)
				{
					$row=$result->fetch_assoc();
					$this->data=$row;
				}
		}

	}
	function add($dataArray)
	{
		$data=$dataArray;
		print_r($data);
		$stmt=$this->connection->prepare("INSERT INTO objectives (e_id,c_objective,c_status,n_objective,year) VALUES (?,?,?,?,?)");
		$stmt->bind_param("ssssi",$data['e_id'],$data['c_objective'],$data['c_status'],$data['n_objective'],$data['year']);
		print_r($data);
		if($stmt->execute())
		{
			return $this->connection->insert_id;
		}
		else
		{
			echo $stmt->error;
			return 0;
		}
	}
	function update($dataArray)
	{
		$data=$dataArray;
		print_r($data);
		$stmtUpdate=$this->connection->prepare("UPDATE objectives SET c_objective=?,c_status=?,n_objective=? WHERE e_id=? AND year=?");
		$stmtUpdate->bind_param("ssssi",$data['c_objective'],$data['c_status'],$data['n_objective'],$data['e_id'],$data['year']);
		print_r($data);
		$r=$stmtUpdate->execute();
		if($r)
		{
			return 1;
		}
		else
		{
			return $this->stmtUpdate->errno;
		}
	}
	function display()
	{
		echo "<br/>";
		echo "Objective ID : ",$this->data['o_id'];
		echo "Employee ID : ",$this->data['e_id'];
		echo "Current year objectives : ",$this->data['c_objective'];
		echo "Current Year Status : ",$this->data['c_status'];
		echo "Next year objectives : ",$this->data['n_objective'];
		echo "Year : ",$this->data['year'];

	}

}

