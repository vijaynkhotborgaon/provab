<?php

	//Start session

	require_once('auth.php');

	//Unset the variables stored in session

	unset($_SESSION['SESS_ADMIN']);

	header("location: index.php");

?>

