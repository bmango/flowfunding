<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

//get location to delete from form
if (isset ($_GET['id'])) $id = $_GET['id']; else die ("no valid id received");

//create new table objects
$ffch_rs = new ffchTable;

//get project
$ffch_rs->get($id);

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';



$smarty->assign('ffch_name', $ffch_rs->ffch);
$smarty->assign('id',	$id);

$smarty->display('confirm_delete_ffch.html');

?>