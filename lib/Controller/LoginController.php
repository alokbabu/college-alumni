<?php
/*
 * Login controller
 *
 *
 */

include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Login.php";
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Model/LoginModel.php";
include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/config/config.php';

$credentials = new login();

$credentials->username = $_POST["username"];
$credentials->password = $_POST["password"];

//var_dump($login);

$model = new LoginModel();

$result = $model->login($credentials);

if($result != NULL)
{
	//TODO: Create session, store userid, username
	// redirect
	var_dump($result);
	echo "Valid username and password ";
}
else
{
	echo "Invalid username and password try again";
}

?>