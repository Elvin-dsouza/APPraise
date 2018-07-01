<?php

/**
 * @package Criteria
 * @author Mohd Adil Taj, Arfan M Rafique
 * @version 0.3 | Created Thursday 28nd Jun 2018
*/

require_once 'db.php';

class Comment
{
	public $data=array();

	private $connection;

	function __construct($f_id=-1)
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
		if($f_id!=-1)
		{
				$result=$this->connection->query("SELECT * FROM comments WHERE f_id={$f_id}");
				if($result&&$result->num_rows>=1)
				{
					$row=$result->fetch_assoc();
					$this->data=$row;
				}
		}

	}
	function add($dataArray)
	{
		$this->data=$dataArray;
		$stmt=$this->connection->prepare("INSERT INTO comments(f_id,appraiserComment,appraiseeComment) VALUES(?,?,?)");
		$stmt->bind_param("iss",$this->data['f_id'],$this->data['appraiserComment'],$this->data['appraiseeComment']);
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
		$this->data=$dataArray;
		$stmtUpdate=$this->connection->prepare("UPDATE comments SET appraiserComment=?,appraiseeComment=? WHERE f_id=?");
		$stmtUpdate->bind_param("ssi",$this->data['appraiserComment'],$this->data['appraiseeComment'],$this->data['f_id']);
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
		echo "Comment id : ",$this->data['cm_id'];
		echo "Form id : ",$this->data['f_id'];
		echo "appraiser Comment : ",$this->data['appraiserComment'];
		echo "Appraisee Comment : ",$this->data['appraiseeComment'];

	}

}

