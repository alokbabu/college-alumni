<?php

include_once('lib/SignUp.php');
include_once('lib/Model/SignUpModel.php');

$signup = new SignUp($_POST["email"], $_POST["username"], $_POST["password"]);

var_dump($signup);

$signup_model = new SignUpModel();
$signup_model->insert($signup);


?>