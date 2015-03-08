<?php
if(!isset($_SESSION))
{
	session_start();
}
/*
 * Login controller
 *
 *
 */
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Student.php";
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Model/ProfileModel.php";
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Model/CourseModel.php";
include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/config/config.php';
if($_POST != null)
{
	$db=new ProfileModel();
	$student = new Student($_POST["fname"],$_POST["lname"],$_POST["gender"],$_POST["address"],$_POST["email"],$_POST["phone"],$_POST["company"],$_POST["position"],$_POST["about"]);
	if(!empty($db->view($student)))
	{
		//Student information already exists. Returning user
		//UPDATE STUDENT
		if(count($validation_errors = ($student->validate_student($student))) < 1) 
		{	
			// Validation successful
			if(($sql_response = $db->update($student)) > 0)
			{					
		    	$success_message = array();
				header("Location: ".$base_path."profile.php?profile=updated");
				array_push($success_message,"Profile updated successfuly.");
				$_SESSION["success"] = $success_message;
			}
			else
			{
				//No need to update. Data has not changed.
				$success_message = array();
				header("Location: ".$base_path."profile.php?profile=updated");
				array_push($success_message,"Profile updated successfuly.");
				$_SESSION["success"] = $success_message;
			}
		}
		else
		{
			
			$_SESSION["errors"] = $validation_errors;
			header("Location: ".$base_path."profile.php?validation=failed");
		}
	}
	else //New user, first login, Insert Student
	{
		if(count($validation_errors = ($student->validate_student($student))) < 1)
		{		    
		     
		     if(count($sql_response = $db->insert($student)) > 0)
		     {
		     	$success_message = array();
				header("Location: ".$base_path."profile.php?profile=updated");
				array_push($success_message,"Profile updated successfuly.");
				$_SESSION["success"] = $success_message;
		     }
		}
		else
		{
			array_push($validation_errors,"Error occured in inserting values ".$sql_response);
			$_SESSION["errors"] = $validation_errors;
			header("Location: ".$base_path."profile.php?");
		}
	}
}
else
{

}



function get_student_info(student $student)
{
	$db = new ProfileModel();
	return $db->view($student);
}

function fetch_courses()
{
	$db = new CourseModel();
	return $db->get_all_courses();
}


?>