<?php
require_once"../includes/auth.php";
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";

#require_once(SMARTY_DIR.'setup.php');

//create new table objects
$projects_rs = new projectsTable;

//get updated data from form
if (isset ($_POST['id']))					$id =					$_POST['id'];					else die("no id");

if (isset ($_POST['ffch_id']))				$ffch_id =				$_POST['ffch_id'];				else $ffch_id ="";
if (isset ($_POST['display_ffch']))			$display_ffch =			$_POST['display_ffch'];			else $display_ffch = "";
if (isset ($_POST['display_funder']))			$display_funder =			$_POST['display_funder'];			else $display_funder = "";
if (isset ($_POST['project_name']))			$project_name =			$_POST['project_name'];			else $project_name ="";
if (isset ($_POST['project_location']))		$project_location =		$_POST['project_location'];		else $project_location ="";
if (isset ($_POST['country1_id']))			$country1_id =			$_POST['country1_id'];			else $country1_id ="";
if (isset ($_POST['country2_id']))			$country2_id =			$_POST['country2_id'];			else $country2_id ="";
if (isset ($_POST['country3_id']))			$country3_id =			$_POST['country3_id'];			else $country3_id ="";
if (isset ($_POST['project_description']))	$project_description =	$_POST['project_description'];	else $project_description ="";
if (isset ($_POST['image_file_name']))		$image_file_name =		$_POST['image_file_name'];		else $image_file_name = "";
if (isset ($_POST['youtube_code']))			$youtube_code =			$_POST['youtube_code'];			else $youtube_code = "";
if (isset ($_POST['website']))				$website =				$_POST['website'];				else $website = "";
if (isset ($_POST['notes']))				$notes =				$_POST['notes'];				else $notes = "";
if (isset ($_POST['flow_funder_name_id']))	$flow_funder_name_id =	$_POST['flow_funder_name_id'];	else $flow_funder_name_id ="";
if (isset ($_POST['gift_amount']))			$gift_amount =			$_POST['gift_amount'];			else $gift_amount ="";
if (isset ($_POST['year_funded']))			$year_funded =			$_POST['year_funded'];			else $year_funded ="";
if (isset ($_POST['org_id']))				$org_id =				$_POST['org_id'];				else $org_id ="";

/*
echo $country1_id;
echo "<BR>";
echo $country2_id;
echo "<BR>";
echo $country3_id;
echo "<BR>";
die ();

*/

$projects_rs->ffch_id = $ffch_id;
$projects_rs->display_ffch = $display_ffch;
$projects_rs->display_funder = $display_funder;
$projects_rs->project_name = $project_name;
$projects_rs->country1_id = $country1_id;
$projects_rs->country2_id = $country2_id;
$projects_rs->country3_id = $country3_id;
$projects_rs->project_location = $project_location;
$projects_rs->project_desc = $project_description;
$projects_rs->image_file_name = $image_file_name;
$projects_rs->youtube_code = $youtube_code;
$projects_rs->website = $website;
$projects_rs->notes = $notes;
$projects_rs->funder_name_id = $flow_funder_name_id; //note descrepancy
$projects_rs->gift_amount = $gift_amount;
$projects_rs->year_funded = $year_funded;

$projects_rs->exhibition = implode("::", $org_id);

$projects_rs->updated_by = $_SESSION['username'];
$projects_rs->updated_date = time();

$projects_rs->update($id);




echo ""
."<html><head><title>record updated</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">"
."<meta http-equiv=\"refresh\" content=\"1;URL=view_projects.php\">"
."</head>"
."<body>"
."<font color=\"#FF0000\"><strong>Record updated</strong></font> "
."</body>"
."</html>";





?>