<?php
session_start();
/*
 * Login controller
 *
 *
 */
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Student.php";
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Model/ProfileModel.php";
include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/config/config.php';
if($_POST != null)
{

$student = new Student($_POST["fname"],$_POST["lname"],$_POST["gender"],$_POST["address"],$_POST["email"],$_POST["phone"],$_POST["company"],$_POST["position"],$_POST["about"]);
if(count($validation_errors = ($student->validate_student($student))) < 1)
	{
     print_r($student);
     /*$smodel=new StudentModel();
     var_dump($smodel->insert($student));*/
}
else
{
	var_dump($validation_errors) ;
}
}

?>