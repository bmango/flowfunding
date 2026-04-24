<?php
require_once"../includes/auth.php";
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

$uid = $_SESSION['username'];

$smarty->assign('username', $_SESSION['username']);
$smarty->display('change_password.html');



?>

