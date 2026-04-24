<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";

#require_once(SMARTY_DIR.'setup.php');

//create new table objects
$funder_rs = new flowFunderTable;

//get updated data from form
if (isset ($_POST['flow_funder']))	$funder_name =	$_POST['flow_funder'];	else die ("no head received");


$funder_rs->flow_funder = $funder_name;
$funder_rs->updated_by = $_SESSION['username'];
$funder_rs->updated_date = time();

$funder_rs->insert();




echo ""
."<html><head><title>record updated</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">"
."<meta http-equiv=\"refresh\" content=\"1;URL=view_funder.php\">"
."</head>"
."<body>"
."<font color=\"#FF0000\"><strong>Record inserted</strong></font> "
."</body>"
."</html>";





?>