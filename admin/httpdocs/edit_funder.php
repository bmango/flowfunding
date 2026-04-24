<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

$id = $_GET['id'];

//create new table objects
$funder_rs = new flowFunderTable;

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

//get ffch
$funder_rs->get($id);


//put details into smarty

$smarty->assign('flow_funder',		$funder_rs->flow_funder);

$smarty->assign('id',				$id);
$smarty->assign('user',				$_SESSION['username']);
$smarty->assign('date',				date(__short_date_format__));

$smarty->display('edit_funder.html');

?>