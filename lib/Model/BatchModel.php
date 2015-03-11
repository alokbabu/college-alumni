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

Class BatchModel extends Database
{


	function __construct()
	{
		//Initialising Database.
		parent::__construct();
	}

	public function get_all_batches()
	{

		/* Initialising Sqli Connection */
		$myconn = $this->establish_connection();

		/* Prepared statement, stage 1: prepare */

		if(!($stmt=$myconn->prepare("SELECT `batch_id`, `batch_year` FROM `batch`")))
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
			$stmt->bind_result($batch_id, $batch_year);
			/*
			 * MySqli_stmt_fetch()
			 * TRUE	Success. Data has been fetched
			 * FALSE	Error occurred
			 * NULL	No more rows/data exists or data truncation occurred
			 */
			//$result = array();
			while($stmt->fetch())
			{
				//Adding result to an array.
				$result[] = array("batch_id" => $batch_id, "batch_year"=>$batch_year);
			}
			return $result;
		}
		/* explicit close recommended */
		$stmt->close();

		$myconn->close();
	}
}

?>