<?php

require_once "class.database.php";

//create new table objects
$user_rs = new userTable;


// Start the login session
session_start();
if (!$_SESSION['username'] || !$_SESSION['password']) {
	// What to do if the user hasn't logged in
	// We'll just redirect them to the login page.
	header('Location: login.php');
	die();
} else {
	// If the session variables exist, check to see
	// if the user has access.


	$username = $_SESSION['username'];
	$password = $_SESSION['password'];

	$sql = "SELECT id FROM users WHERE password='".$password."' AND username='".$username."'";
	$user_rs->execute($sql);
	
	if ($user_rs->recCount() < 1) {

		// If the credentials didn't match,
		// redirect the user to the login screen.
		header('Location: login.php');
		die();
	}
}
?>