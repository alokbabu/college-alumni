<?php
 if(isset($_SESSION["errors"]))
 {
 	require_once 'error.php';
 }
 else if(isset($_SESSION["success"]))
 {
 	require_once 'success.php';
 }
?>