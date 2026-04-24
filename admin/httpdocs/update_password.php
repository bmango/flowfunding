<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');
#die( md5("111"));
//create new table objects
$user_rs = new userTable;

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

$uid = $_SESSION['username'];
$password0 = $_POST['password0'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

#die (md5($password0) .":".$_SESSION['password']);

if (md5($password0) <> $_SESSION['password']){
	$smarty->assign('error_message', "<p align=\"center\" class=\"formConfirm\"><font size=\"2\">Old password is not correct</font></p>");
	$smarty->assign('username', $_SESSION['username']);
	$smarty->display('change_password.html');
}else{

	if ($password1 <> $password2){
		$smarty->assign('error_message', "<p align=\"center\" class=\"formConfirm\"><font size=\"2\">New passwords do not match</font></p>");
		$smarty->assign('username', $_SESSION['username']);
		$smarty->display('change_password.html');
	}else{
		$password = md5($password1);
		$sql = "UPDATE `users` SET `password` = '".$password."' WHERE `username` ='".$username."'";
		$user_rs->execute($sql);
		$sql = "UPDATE `users` SET `change_password` = '0' WHERE `username` ='".$username."'";
		$user_rs->execute($sql);
		$_SESSION['password'] = $password;
		echo ""
			."<html><head><title>password updated</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">"
			."<meta http-equiv=\"refresh\" content=\"3;URL=menu.php\">"
			."</head>"
			."<body>"
			."<font color=\"#FF0000\"><strong>Password updated</strong></font> "
			."</body>"
			."</html>";
	}
}

#header ('Location: edit.php');


?>

