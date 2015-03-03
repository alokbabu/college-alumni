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
require_once('lib/Database.php');

Class SignUpModel extends Database
{
	//Database operations

	public function view()
	{

	}

	public function insert(signup $newSignUp)
	{
		$myconn = parent::establish_connection();
		// prepare and bind
		if(!($stmt=$myconn->prepare("INSERT INTO Login (username, password, email, email_validation_token) VALUES (?, ?, ?, ?)")))
		{
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}

		$username               = $newSignUp->__get("username");
		$password               = $newSignUp->__get("password");
		$email                  = $newSignUp->__get("email");
		$email_validation_token = $newSignUp->__get("email_validation_token");
		
		/* Bind parameters
         s - string, b - blob, i - int, etc */

		if(!($stmt->bind_param("ssss", $username, $password, $email, $email_validation_token)))
		{
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		


		$stmt->execute();
		$stmt->close();
		$myconn->close();

		//return $myconn->result;
	}

	public function update()
	{

	}

	public function delete()
	{
		
	}
}

?>