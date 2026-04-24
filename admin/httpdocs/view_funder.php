<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

//create new table objects
$funder_rs = new flowFunderTable;
$count_rs = new projectsTable;

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

//get location
$funder_rs->get();

//put details into smarty

$smarty->assign('total_funders', $funder_rs->recCount());

while ($funder_rs->fetch()) {

	// to test whether $number is odd use the arithmetic
	// operator '%' (modulus) like this
	if( $odd = $funder_rs->id%2 )
	{
		$smarty->append('cell_bg',		"#E0E0E0");
	}
	else
	{
		$smarty->append('cell_bg',		"#FFFFFF");
	}

	$sql = 'SELECT * FROM `projects` WHERE `funder_name_id` =' .$funder_rs->id;
	$count_rs->execute($sql);
	$smarty->append('no_projects',		$count_rs->reccount());
	$smarty->append('flow_funder',		$funder_rs->flow_funder);
	$smarty->append('id',				$funder_rs->id);
}


$smarty->assign('user',				$_SESSION['username']);
$smarty->assign('date',				date(__short_date_format__));

$smarty->display('view_funder.html');

?>