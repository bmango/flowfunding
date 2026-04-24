<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

//create new table objects

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

//put details into smarty

$smarty->assign('ffch_list',				buildFFCHmenu(0));
$smarty->assign('country1_list',		buildCountryNameMenu(0,1));
$smarty->assign('country2_list',		buildCountryNameMenu(0,2));
$smarty->assign('country3_list',		buildCountryNameMenu(0,3));
$smarty->assign('funder_name_list',	buildFunderNameMenu(0));
$smarty->assign('org_types',				buildOrgTypeSelector(""));

$smarty->assign('user',							$_SESSION['username']);
$smarty->assign('date',							date(__short_date_format__));

$smarty->display('add_project.html');

?>