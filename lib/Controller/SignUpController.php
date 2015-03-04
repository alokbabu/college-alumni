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

//If the URL is accessed directly without post values
if($_POST != null)
{
	$signup = new SignUp($_POST["email"], $_POST["username"], $_POST["password"]);
	if(count($validation_errors = ($signup->validatate_signup($signup))) < 1)
	{
		$signup_model = new SignUpModel();
		if(($sql_response = $signup_model->insert($signup)) > 0)// Returns no of rows affected
		{
			header("Location: ".$base_path."sign-up.php?signup=success");
			//echo "Sign up completed";
		}
		else
		{		
			array_push($validation_errors,"Error occured in inserting values ".$sql_response);
			$_SESSION["errors"] = $validation_errors;
			header("Location: ".$base_path."sign-up.php");
		}
	}
	else //Validation failed
	{
		$_SESSION["errors"]=$validation_errors;
		header("Location: ".$base_path."sign-up.php");
		/*foreach($validation_errors as $error)
		{
			echo $error;

		}*/
	}
	
}
else
{
	header("Location: ".$base_path."sign-up.php");
}


?>