<?php
session_start();
/**
  * Business Tier/Logic Layer
  *
  *	This is a controller class for sign-up page.
  * All the logic goes here, like validations, ifs  and do whiles.
  * Validated data is passed to model to execute database operations
  * Model: /Models/SignUpModel
 */

//TODO: Implement AutoLoad
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Controller/ErrorController.php";
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/SignUp.php";
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Model/SignUpModel.php";
include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/config/config.php';

/* 
 * If the URL is accessed directly without post values.
 * Check if POST is null or use isset
 *
*/
if($_POST != null)
{
	//Initilalising SignUp Object
	$signup = new SignUp($_POST["email"], $_POST["username"], $_POST["password"]);

	/*
	 *	Validates signup object. If error occurs an array of errors will be returned.
	 *
	*/
	if(count($validation_errors = ($signup->validatate_signup($signup))) < 1)
	{
		//Encrypting password with MD5. Moved from controller class.
		$signup->password = md5($signup->password);

		// Initialising respected model to do database operations
		$signup_model = new SignUpModel();

		if(($sql_response = $signup_model->insert($signup)) > 0)// Returns number of rows affected
		{	
			//Values inserted successfully. Creating Success alert.		
			$success_message = array();
			header("Location: ".$base_path."sign-up.php?signup=success");
			array_push($success_message,"Sign up successful! A validation email is send. Please click on the validation link to continue.");
			$_SESSION["success"] = $success_message;

			//TODO: Send Validation EMAIL.
		}
		else // Error occured while inserting values into database.
		{		
			//Adding SQL Error to validation array.
			array_push($validation_errors,"Error occured in inserting values ".$sql_response);
			$_SESSION["errors"] = $validation_errors;
			header("Location: ".$base_path."sign-up.php?email=".$signup->email."&username=".$signup->username);
		}
	}
	else //Validation failed
	{
		//Setting validation errors to session variable.
		$_SESSION["errors"] = $validation_errors;
		header("Location: ".$base_path."sign-up.php?email=".$signup->email."&username=".$signup->username);
	}
	
}
else // NO DIRECT ACCESS ALLOWED. REDIRECTING...
{
	$validation_errors = array();
	array_push($validation_errors,"We couldn't recieve your request. Please try again.");
	$_SESSION["errors"] = $validation_errors;
	header("Location: ".$base_path."sign-up.php");
}


?>