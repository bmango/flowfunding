<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

$id = $_GET['id'];

//create new table objects
$project_rs = new projectsTable;

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

//get project
$project_rs->get($id);


//put details into smarty

$smarty->assign('ffch_list',						buildFFCHmenu($project_rs->ffch_id));
$smarty->assign('display_ffch',					$project_rs->display_ffch > 0 ? 'checked="checked"' : '');
$smarty->assign('project_name',					$project_rs->project_name);
$smarty->assign('country1_list',				buildCountryNameMenu($project_rs->country1_id,1));
$smarty->assign('country2_list',				buildCountryNameMenu($project_rs->country2_id,2));
$smarty->assign('country3_list',				buildCountryNameMenu($project_rs->country3_id,3));
$smarty->assign('project_location',			$project_rs->project_location);
$smarty->assign('project_description',	$project_rs->project_desc);
$smarty->assign('image_file_name',			$project_rs->image_file_name);
$smarty->assign('youtube_code',					$project_rs->youtube_code);
$smarty->assign('website',							$project_rs->website);
$smarty->assign('funder_name_list',			buildFunderNameMenu($project_rs->funder_name_id));
$smarty->assign('display_funder',				$project_rs->display_funder > 0 ? 'checked="checked"' : '');
$smarty->assign('notes',								$project_rs->notes);
$smarty->assign('gift_amount',					$project_rs->gift_amount);
$smarty->assign('year_funded',					$project_rs->year_funded);
$smarty->assign('org_types',						buildOrgTypeSelector($project_rs->exhibition));

$smarty->assign('id',										$id);
$smarty->assign('user',									$_SESSION['username']);
$smarty->assign('date',									date(__short_date_format__));

$smarty->display('edit_project.html');

?>