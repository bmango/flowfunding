<?php

require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

//create new table objects
$user_rs = new userTable;

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

$uid = $_POST['username'];
$username = addslashes ($_POST['username']);
$password = md5($_POST['password']);

$sql = "SELECT `id` FROM users WHERE `password`='".$password."' AND `username`='".$username."'";

$user_rs->execute($sql);

if ($user_rs->recCount() < 1) {

	$smarty->assign('error_message', "<p align=\"center\" class=\"formConfirm\"><font size=\"2\">Username and password not recognised</font></p>");
	$smarty->assign('username',	stripslashes($username));
	$smarty->display('login.html');
}else{

	//has been authorised
	//Start the login session

	session_start();
	// We've already added slashes to the username and MD5'd the password
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;

    $sql = "SELECT `id` FROM users WHERE `change_password`='1' AND `username`='".$username."'";
	$user_rs->execute($sql);

	if ($user_rs->recCount() > 0) {
		header('Location: change_password.php');
	}else{
		header ('Location: menu.php');
	}

}

?>

