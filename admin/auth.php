<?php
	
	session_start();

	if(!isset($_SESSION['SESS_ADMIN']) || (trim($_SESSION['SESS_ADMIN']) == '') ) {

		header("location: index.php");

		exit();
	}
	
?>