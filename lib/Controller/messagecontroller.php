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
include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/Model/messageModel.php';
if($_POST != null)
{
	$message = $_POST["message"];
	if(!empty($message))
	{
		if(add($message, $_SESSION["username"]))
		{
			header("Location: ".$base_path."message.php?message=added");
		}
		else
		{
			header("Location: ".$base_path."message.php?message=failed");
		}
	}
	else
	{
		header("Location: ".$base_path."message.php");
	}

}
else if(isset($_GET["action"]))
{
	if($_GET["action"]=="delete")
	{
		delete_message($_GET["id"]);
		header("Location: ".$base_path."message.php?message=deleted");
	}
}

function delete_message($id)
{
	$db = new MessageModel();
	$db->delete($id);
}

function get_all_message($username)
{
	$db = new MessageModel();
	return $db->get_all_message($username);
}

function add($message, $username)
{
 	$db = new MessageModel();
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

function get_all_message_everyone()
{
	$db = new MessageModel();
	return $db->get_message_everyone();
}

?>