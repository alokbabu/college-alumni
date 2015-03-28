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
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Model/BatchModel.php";
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
			$_SESSION["errors"] = $validation_errors;
			header("Location: ".$base_path."profile.php?fname=".$student->firstname."&lastname=".$student->lastname."&gender=".$student->gender."&address=".$student->address."&phone=".$student->phone."&email=".$student->email."&course=".$student->course.
				"&batch=".$student->batch."&currentcompany=".$student->company."&position=".$student->position."&about=".$student->about);
		}
	}
}
else if(!empty($_GET))
{
	if(isset($_GET["action"]))
	{
		if($_GET["action"] == "get_batch_by_course")
		{
			echo json_encode(get_batch_by_course($_GET["id"]));
		}
	}
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

function fetch_batches()
{
	$model = new BatchModel();
	return $model->get_all_batches();
}

function get_batch_by_course($id)
{
	$model = new BatchModel();
	return $model->get_batch_by_course($id);
}


?>