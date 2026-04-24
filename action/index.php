<?php
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

#if (isset ($_GET['id'])) $requested_id = $_GET['id']; else $requested_id = 0;
$requested_id = 0;
$type ="View All";

$selected_country_id = 0;
#if (isset ($_GET['requested_id'])) $requested_id = $_GET['requested_id'];


//create new table objects
$orgType_rs = new orgTypeTable;

//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

//build the org type menu
$orgType_rs->get();

$i=1;
while ($orgType_rs->fetch()) {
	$org_type_id_array[$orgType_rs->id] = $orgType_rs->id;
	$org_type_array[$orgType_rs->id] = $orgType_rs->organisation_type;
	$org_type_country_array[$orgType_rs->id-1] = $selected_country_id;
	sort ($org_type_array);

	$i=$i+1;
}

	$org_type_id_array[$i] = 0;
	$org_type_array[$i] = "View All";
	$org_type_country_array[$i] = $selected_country_id;


#	die(getOrgTypeID("arts"));

	// add on another element because smarty appears to drop last one
	$i=$i+1;
	$org_type_id_array[$i] = $i;
	$org_type_array[$i] = "";
	$org_type_country_array[$i] = $selected_country_id;

	$smarty->assign('org_id', $org_type_id_array);
	$smarty->assign('org_types', $org_type_array);
	$smarty->assign('org_type_country', $org_type_country_array);

	//get the country list

	$country_list = buildCountryNameMenu ($selected_country_id,"",1);
	$smarty->assign('country_list' , $country_list);


$total_records = 0;


#$smarty->assign('requested_id', $requested_id);


if ($requested_id > 0) $add_text = " for <strong>".getOrgName($requested_id)."</strong>"; else $add_text = "";
$smarty->assign('type', $type);
$smarty->assign('requested_org', $add_text);
$smarty->assign('total_records', $total_records);
$smarty->display('index.html');

?>