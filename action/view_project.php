<?php
require_once"../includes/config.inc.php";
require_once"../includes/functions.inc.php";
require_once"../includes/class.database.php";
require_once(SMARTY_DIR.'setup.php');

#if (isset ($_GET['id'])) $requested_id = $_GET['id']; else $requested_id = 0;
if (isset ($_POST['type'])) {
	$requested_id = 0;
	if ($_POST['type'] <> "View All" ){
		$requested_id = getOrgTypeID($_POST['type']);
	}
}elseif(isset($_GET['type'])){
		$requested_id = getOrgTypeID($_GET['type']);
}else {
		$requested_id = 0;
}

if (isset ($_POST['country_id'])) $selected_country_id = $_POST['country_id']; else $selected_country_id = 0;
#if (isset ($_GET['requested_id'])) $requested_id = $_GET['requested_id'];

//create new table objects
$projects_rs = new projectsTable;
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



//get projects
$projects_rs->orderBy('id');
$projects_rs->orderDirection('DESC');
$projects_rs->get();

$total_records = 0;

while ($projects_rs->fetch()) {
	$exhib_types = explode("::", $projects_rs->exhibition);
	if (in_array($requested_id,$exhib_types) or $requested_id == 0) {
		if ($selected_country_id == $projects_rs->country1_id or $selected_country_id == $projects_rs->country2_id or $selected_country_id == $projects_rs->country3_id or $selected_country_id == 0)
			{
				
			$smarty->append('project_name',			$projects_rs->project_name);
			$smarty->append('categories',			buildOrgTypeLinkList($projects_rs->exhibition));


			$project_locations = getCountryName($projects_rs->country1_id);
			if ($projects_rs->country2_id > 0) $project_locations = $project_locations . ", ".getCountryName($projects_rs->country2_id);
			if ($projects_rs->country3_id > 0) $project_locations = $project_locations . ", ".getCountryName($projects_rs->country3_id);
	#die ($project_locations);
			$smarty->append('country',				$project_locations);
			/*$smarty->append('ffch',				getFFCHname($projects_rs->ffch_id));*/
			$smarty->append('website',				!empty($projects_rs->website) ? buildWebsiteLink($projects_rs->website) : ""); //see functions.inc.php
			$smarty->append('funder_name',			$projects_rs->display_funder > 0 ? getFlowFunderName($projects_rs->funder_name_id) : "");
			$smarty->append('ffch_name',			$projects_rs->display_ffch > 0 ? getFFCHName($projects_rs->ffch_id) : "");
			$smarty->append('gift_amount',			number_format($projects_rs->gift_amount,0));
			$smarty->append('year_funded',          $projects_rs->year_funded);
			$smarty->append('project_description',	$projects_rs->project_desc);
			$smarty->append('image',				!empty($projects_rs->image_file_name) ? buildImageTag("../project_images/".$projects_rs->image_file_name, TRUE, 400) : ""); //see functions.inc.php
			$smarty->append('youtube_image_link',	!empty($projects_rs->youtube_code) ? buildYouTubeImageLink($projects_rs->youtube_code, 400) : ""); //see functions.inc.php
			$smarty->append('notes',				$projects_rs->notes);
			$smarty->append('id',					$projects_rs->id);

			//none of this is being used (commented out Feb 10, 2010)
			/*
			$continue = true; $i=1; $image_table = "";
			while ($continue == true) {


				$image_thumb_path = "images/photos/thumbnails/".$projects_rs->id."_".$i.".jpg";
				$image_path = "images/photos/".$projects_rs->id."_".$i.".jpg";
				if (file_exists($image_thumb_path)) {
					if ($i ==1) $image_table = "<table width=\"100%\" border=\"0\"><tr>";
					if ($i ==5) $image_table .= "</tr><tr>";
					$image_table .="<td width=\"25%\"><div align=\"left\"><a href=\"".$image_path."\" target=\"_blank\"><img src=\"".$image_thumb_path."\"  border=\"1\"></a></div></td>";
					$i++;
				}else{
					$continue = false;
					if ($image_table <> "") $image_table .= "</tr></table>";
				}
			}
			$smarty->append('image_table',					$image_table);
			*/
			
			$total_records ++;
		}
	}
}


#$smarty->assign('requested_id', $requested_id);

$smarty->assign('type', $type);
$smarty->assign('requested_org', $requested_id > 0 ? getOrgName($requested_id) : "");
$smarty->assign('total_records', $total_records);
$smarty->display('view_projects.html');

?>