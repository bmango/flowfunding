<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

//create new table objects
$ffch_rs = new ffchTable;
$count_rs = new projectsTable;

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

//get location
$ffch_rs->get();

//put details into smarty

$smarty->assign('total_ffch', $ffch_rs->recCount());

while ($ffch_rs->fetch()) {

	// to test whether $number is odd you could use the arithmetic
	// operator '%' (modulus) like this
	if( $odd = $ffch_rs->id%2 )
	{
		$smarty->append('cell_bg',		"#E0E0E0");
	}
	else
	{
		$smarty->append('cell_bg',		"#FFFFFF");
	}

	$sql = 'SELECT * FROM `projects` WHERE `ffch_id` =' .$ffch_rs->id;
	$count_rs->execute($sql);
	$smarty->append('no_projects',		$count_rs->reccount());
	$smarty->append('ffch',				$ffch_rs->ffch);
	$smarty->append('id',				$ffch_rs->id);
}


$smarty->assign('user',				$_SESSION['username']);
$smarty->assign('date',				date(__short_date_format__));

$smarty->display('view_ffch.html');

?>