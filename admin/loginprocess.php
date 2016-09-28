<?php
//Start session
session_start();

//Include database connection details
require_once('../config.php');

//Array to store validation errors
$errmsg_arr = array();

//Validation error flag
$errflag = false;

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {

		$str = @trim($str);

		if(get_magic_quotes_gpc()) {

			$str = stripslashes($str);

		}

		return mysql_real_escape_string($str);

	}

	

	//Sanitize the POST values

	$username = clean($_POST['username']);

	$password = clean($_POST['password']);

	

	//Input Validations

	if($username == '') {

		$errmsg_arr[] = 'User name is missing';

		$errflag = true;

	}

	if($password == '') {

		$errmsg_arr[] = 'Password is missing';

		$errflag = true;

	}

	

	//If there are input validations, redirect back to the login form

	if($errflag) {

		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;

		session_write_close();

		header("location: index.php");

		exit();

	}

	

	//Create query

	$qry="SELECT * FROM users WHERE user_name='$username' AND user_pword='".md5($_POST['password'])."' AND user_priority=1";

	$result=mysql_query($qry);


	//Check whether the query was successful or not

	if($result) {

		if(mysql_num_rows($result) == 1) {

			//Login Successful

			session_regenerate_id();

			$user = mysql_fetch_assoc($result);

			$_SESSION['SESS_ADMIN'] = $user['user_id'];
			

			session_write_close();

			header("location: create_user.php");

			exit();

		}else {

			$errmsg_arr[] = 'Login Failed';

		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;

		session_write_close();

		header("location: index.php");

			exit();

		}

	}else {

		die("Query failed");

	}

?>