<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

//put details into smarty

$smarty->assign('user',				$_SESSION['username']);
$smarty->assign('date',				date(__short_date_format__));

$smarty->display('add_funder.html');

?>