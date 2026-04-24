<?php

require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');
session_start();

$_SESSION = array();
session_unset();
session_destroy();

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';


$smarty->assign('error_message', "<p>&nbsp;</p>");
$smarty->assign('username',	"");
$smarty->display('login.html');


?>