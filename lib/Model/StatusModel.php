<?php
/**
 * Description: LoginModel Class for executing Login related Database operations.
 *
 * @author: 
 * @version: 1.0.0.0
 * @package: lib
 * @subpackage:
 * @since:
 * @copyright: Technolodge, 2015. 
 * @license: https://github.com/alokbabu/college-alumni/blob/master/license.txt BSD
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/Login.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/Database.php';

Class StatusModel extends Database
{


	function __construct()
	{
		//Initialising Database.
		parent::__construct();
	}

	public function get_status_everyone()
	{
		/* Initialising Sqli Connection */
		$myconn = $this->establish_connection();

		/* Prepared statement, stage 1: prepare */

		if(!($stmt=$myconn->prepare("SELECT `status_id`, `username`, `status`, `datetime_updated` FROM `status_message` order by `datetime_updated` desc")))
		{
			return "Prepare failed: (" . $myconn->errno . ") " . $myconn->error;
		}
		
		/* 
		 * Exectuing Query against MySql
		 *
		*/ 
		if (!$stmt->execute()) 
		{
			 return "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		else
		{
			$stmt->bind_result($status_id, $username, $status, $datetime_updated);
			/*
			 * MySqli_stmt_fetch()
			 * TRUE	Success. Data has been fetched
			 * FALSE	Error occurred
			 * NULL	No more rows/data exists or data truncation occurred
			 */
			$result = array();
			while($stmt->fetch())
			{
				//Adding result to an array.
				$result[] = array("status_id" => $status_id, "username"=>$username, "status" => $status, 
					"datetime_updated"=>$datetime_updated);
			}

			return $result;
		}
		/* explicit close recommended */
		$stmt->close();

		$myconn->close();
	}


	public function get_all_status($username)
	{
		/* Initialising Sqli Connection */
		$myconn = $this->establish_connection();

		/* Prepared statement, stage 1: prepare */

		if(!($stmt=$myconn->prepare("SELECT `status_id`, `username`, `status`, `datetime_updated` FROM `status_message` WHERE username= ? order by `datetime_updated` desc")))
		{
			return "Prepare failed: (" . $myconn->errno . ") " . $myconn->error;
		}

		if(!($stmt->bind_param("s", $username)))
		{
			return "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		
		/* 
		 * Exectuing Query against MySql
		 *
		*/ 
		if (!$stmt->execute()) 
		{
			 return "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		else
		{
			$stmt->bind_result($status_id, $username, $status, $datetime_updated);
			/*
			 * MySqli_stmt_fetch()
			 * TRUE	Success. Data has been fetched
			 * FALSE	Error occurred
			 * NULL	No more rows/data exists or data truncation occurred
			 */
			$result = array();
			while($stmt->fetch())
			{
				//Adding result to an array.
				$result[] = array("status_id" => $status_id, "username"=>$username, "status" => $status, 
					"datetime_updated"=>$datetime_updated);
			}

			return $result;
		}
		/* explicit close recommended */
		$stmt->close();

		$myconn->close();
	}

	public function insert($status, $username)
	{

	  $myconn = $this->establish_connection();
      if(!($stmt=$myconn->prepare("INSERT INTO status_message ( username, status, datetime_updated) VALUES (?, ?, ?)")))
		{
			return "Prepare failed: (" . $myconn->errno . ") " . $myconn->error;
		}

		$now = new DateTime();
		$datetime = $now->format('Y-m-d H:i:s');

        if(!($stmt->bind_param("sss", $username, $status, $datetime)))
		{
			return "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}


		if (!$stmt->execute()) 
		{
			 return "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		else
		{
			/*
			 * Returns the number of rows affected by INSERT, UPDATE, or DELETE query.
			 *
			*/
			return $stmt->affected_rows;
		}
		/* explicit close recommended */
		$stmt->close();

		$myconn->close();
	}

	public function delete($id)
	{
			  $myconn = $this->establish_connection();
      if(!($stmt=$myconn->prepare("DELETE FROM `status_message` WHERE status_id = ?")))
		{
			return "Prepare failed: (" . $myconn->errno . ") " . $myconn->error;
		}


        if(!($stmt->bind_param("i", $id)))
		{
			return "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}


		if (!$stmt->execute()) 
		{
			 return "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		else
		{
			/*
			 * Returns the number of rows affected by INSERT, UPDATE, or DELETE query.
			 *
			*/
			return $stmt->affected_rows;
		}
		/* explicit close recommended */
		$stmt->close();

		$myconn->close();
	}
}

?>