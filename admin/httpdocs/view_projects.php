<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

//create new table objects
$projects_rs = new projectsTable;

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

//sort by id
$projects_rs->orderBy('id');

//get location
$projects_rs->get();



//put details into smarty

$smarty->assign('total_projects', $projects_rs->recCount());

while ($projects_rs->fetch()) {

	// to test whether $number is odd you could use the arithmetic
	// operator '%' (modulus) like this
	if( $odd = $projects_rs->id%2 )
	{
		$smarty->append('cell_bg',		"#E0E0E0");
	}
	else
	{
		$smarty->append('cell_bg',		"#FFFFFF");
	}


	$smarty->append('ffch',				getFFCHname($projects_rs->ffch_id));
	$smarty->append('project_name',		$projects_rs->project_name);

	$project_locations = getCountryName($projects_rs->country1_id);
	if ($projects_rs->country2_id > 0) $project_locations = $project_locations . ", ".getCountryName($projects_rs->country2_id);
	if ($projects_rs->country3_id > 0) $project_locations = $project_locations . ", ".getCountryName($projects_rs->country3_id);

	$smarty->append('project_location', $project_locations);
	$smarty->append('project_location_old', $projects_rs->project_location);
	$smarty->append('gift_amount',		$projects_rs->gift_amount);
	$smarty->append('id',				$projects_rs->id);
}


$smarty->assign('user',				$_SESSION['username']);
$smarty->assign('date',				date(__short_date_format__));

$smarty->display('view_projects.html');

?>