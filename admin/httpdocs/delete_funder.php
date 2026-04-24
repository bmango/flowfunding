<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

//create new table objects
$funder_rs = new flowFunderTable;


//get funder to delete from form
if (isset ($_POST['id'])) $id = $_POST['id']; else die ("No valid id received");

$funder_rs->get($id);
$funder_rs->del();

echo ""
."<html><head><title>record deleted</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">"
."<meta http-equiv=\"refresh\" content=\"1;URL=view_funder.php\">"
."</head>"
."<body>"
."<font color=\"#FF0000\"><strong>Record deleted</strong></font> "
."</body>"
."</html>";



?>