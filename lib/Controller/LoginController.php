<?php
session_start();
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
	$_SESSION["userid"] = $result['userid'];
	$_SESSION["username"] = $result['username'];
	$_SESSION["email"] = $result['email'];
	header('Location: '.$base_path.'home.php');
	//var_dump($result);
	//echo "Valid username and password ";
}
else
{
	header('Location: '.$base_path.'index.php?user='.$credentials->username.'&login=failed');
}

?>