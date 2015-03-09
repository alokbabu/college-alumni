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
include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/config/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/Model/StatusModel.php';
if($_POST != null)
{
	$message = $_POST["status"];
	if(!empty($message))
	{
		if(add($message, $_SESSION["username"]))
		{
			header("Location: ".$base_path."status.php?status=added");
		}
		else
		{
			header("Location: ".$base_path."status.php?status=failed");
		}
	}
	else
	{
		header("Location: ".$base_path."status.php");
	}

}
else if(isset($_GET["action"]))
{
	if($_GET["action"]=="delete")
	{
		delete_status($_GET["id"]);
		header("Location: ".$base_path."status.php?status=deleted");
	}
}

function delete_status($id)
{
	$db = new StatusModel();
	$db->delete($id);
}

function get_all_status($username)
{
	$db = new StatusModel();
	return $db->get_all_status($username);
}

function add($message, $username)
{
 	$db = new StatusModel();
 	if($db->insert($message,$username) > 0)
 	{
 		return TRUE;
 	}
 	else
 	{
 		return FALSE;
 	}
}

//_____________________________________________________ FOR ALL USERS _____________________________________________________

function get_all_status_everyone()
{
	$db = new StatusModel();
	return $db->get_status_everyone();
}

?>