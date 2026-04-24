<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

//get funder to delete from form
if (isset ($_GET['id'])) $id = $_GET['id']; else die ("no valid id received");

//create new table objects
$funder_rs = new flowFunderTable;

//get project
$funder_rs->get($id);

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';



$smarty->assign('flow_funder_name', $funder_rs->flow_funder);
$smarty->assign('id',	$id);

$smarty->display('confirm_delete_funder.html');

?>