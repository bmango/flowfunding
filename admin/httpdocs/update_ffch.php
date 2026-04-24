<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";

#require_once(SMARTY_DIR.'setup.php');

//create new table objects
$ffch_rs = new ffchTable;

//get updated data from form
if (isset ($_POST['id']))			$id =			$_POST['id'];			else die();
if (isset ($_POST['ffch_name']))	$ffch_name =	$_POST['ffch_name'];	else die ("no head received");


$ffch_rs->ffch = $ffch_name;
$ffch_rs->updated_by = $_SESSION['username'];
$ffch_rs->updated_date = time();

$ffch_rs->update($id);




echo ""
."<html><head><title>record updated</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">"
."<meta http-equiv=\"refresh\" content=\"1;URL=view_ffch.php\">"
."</head>"
."<body>"
."<font color=\"#FF0000\"><strong>Record updated</strong></font> "
."</body>"
."</html>";





?>