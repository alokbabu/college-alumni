<?php 
/**
 * Description: SignUpModel Class for executing Signup related Database operations.
 *
 * @author: 
 * @version: 1.0.0.0
 * @package: lib
 * @subpackage:
 * @since:
 * @copyright: Technolodge, 2015. 
 * @license: https://github.com/alokbabu/college-alumni/blob/master/license.txt BSD
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/Database.php';

Class SignUpModel extends Database
{

	function __construct()
	{
		//Initialising Database.
		parent::__construct();
	}

	public function view()
	{

	}

	public function insert(signup $newSignUp)
	{
		/* Initialising Sqli Connection */

		$myconn = $this->establish_connection();
		
		/* Prepared statement, stage 1: prepare */

		if(!($stmt=$myconn->prepare("INSERT INTO Login (username, password, email, email_validation_token, has_email_verified) VALUES (?, ?, ?, ?, ?)")))
		{
			return "Prepare failed: (" . $myconn->errno . ") " . $myconn->error;
		}

		$username               = $newSignUp->__get("username");
		$password               = $newSignUp->__get("password");
		$email                  = $newSignUp->__get("email");
		$email_validation_token = $newSignUp->__get("email_validation_token");
		$has_email_verified		= 0;
		
		/* Prepared statement, stage 2: bind and execute */

		/* Bind parameters
         * s - string, b - blob, i - int, etc 
        */

		if(!($stmt->bind_param("ssssi", $username, $password, $email, $email_validation_token, $has_email_verified)))
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

	public function update()
	{

	}

	public function delete()
	{
		
	}
}

?>