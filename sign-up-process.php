<?php

include_once('lib/SignUp.php');

$signup = new SignUp($_POST["email"], $_POST["firstname"], $_POST["lastname"], $_POST["gender"], $_POST["username"], $_POST["password"]);

var_dump($signup);


?>