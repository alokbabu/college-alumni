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

Class LoginModel extends Database
{


	function __construct()
	{
		//Initialising Database.
		parent::__construct();
	}

	public function login(Login $login)
	{

		/* Initialising Sqli Connection */
		$myconn = $this->establish_connection();

		/* Prepared statement, stage 1: prepare */

		if(!($stmt=$myconn->prepare("SELECT login_id, username, email FROM Login WHERE (username = ? && password = ?)")))
		{
			return "Prepare failed: (" . $myconn->errno . ") " . $myconn->error;
		}

		$username               = $login->username;
		$password               = md5($login->password);
		
		/* Prepared statement, stage 2: bind and execute */

		/* Bind parameters
         * s - string, b - blob, i - int, etc 
        */

		if(!($stmt->bind_param("ss", $username, $password)))
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
			$stmt->bind_result($user_id, $username, $email);
			/*
			 * MySqli_stmt_fetch()
			 * TRUE	Success. Data has been fetched
			 * FALSE	Error occurred
			 * NULL	No more rows/data exists or data truncation occurred
			 */
			while($stmt->fetch())
			{
				//Adding result to an array.
				$result = array("userid" => $user_id, "username"=>$username, "email" => $email);
				return $result;
			}
		}
		/* explicit close recommended */
		$stmt->close();

		$myconn->close();
	}
}

?>