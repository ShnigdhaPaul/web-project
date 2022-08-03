<?php
include 'models/db_config.php';
$name = "";
$err_name = "";
$uname = "";
$err_uname = "";
$email = "";
$err_email = "";
$pass = "";
$err_pass = "";
$err_db = "";
$hasError = false;

if (isset($_POST["sign_up"])) {
	//name
	if (empty($_POST["name"])) {
		$hasError = true;
		$err_name = "Name Required";
	} else {
		$name = $_POST["name"];
	}

	//username
	if (empty($_POST["uname"])) {
		$hasError = true;
		$err_uname = "User name Required";
	} else if (strpos($_POST["uname"], " ")) {
		$hasError = true;
		$err_uname = "Username does not contain space";
	} else {
		$uname = $_POST["uname"];
	}



	if (empty($_POST["email"])) {
		$hasError = true;
		$err_email = "Email Required";
	} else {
		$email = $_POST["email"];
	}
	if (empty($_POST["pass"])) {
		$hasError = true;
		$err_pass = "Password Required";
	} else {
		$pass = $_POST["pass"];
	}
	if (!$hasError) {
		$rs = insertUser($name, $uname, $email, $pass);
		if ($rs === true) {
			header("Location: login.php");
		}
		$err_db = $rs;
	}
} else if (isset($_POST["btn_login"])) {

	if (empty($_POST["uname"])) {
		$hasError = true;
		$err_uname = "User name Required";
	} else if (strpos($_POST["uname"], " ")) {
		$hasError = true;
		$err_uname = "Username does not contain space";
	} else {
		$uname = $_POST["uname"];
	}

	if (empty($_POST["pass"])) {
		$hasError = true;
		$err_pass = "Password Required";
	} else {
		$pass = $_POST["pass"];
	}
	if (!$hasError) {
		if (authenticateUser($uname, $pass)) {
			header("Location: dashboard.php");
		}
		$err_db = "Username password invalid";
	}
}

function insertUser($name, $uname, $email, $pass)
{
	$query = "insert into admin_users values (NULL,'$name','$uname','$email','$pass')";
	return execute($query);
}
function authenticateUser($uname, $pass)
{
	$query = "select * from admin_users where username='$uname' and password='$pass'";
	$rs = get($query);
	if (count($rs) > 0) {
		return true;
	}
	return false;
}
