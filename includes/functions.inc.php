<?php

/* 
note: these are organized alphabetically.  
please maintain alphabetical order for future developers.
*/

/**************************************************************************
Function: bool2text
Expects: boolean value
Returns: text value (yes or no)
**************************************************************************/

function bool2text($boolean_value)

{
	if ($boolean_value == 0) $text = "No"; else $text = "Yes";
	return $text;
}//end function


/**************************************************************************
Function: buildCountryNameMenu
Expects: country_id, countryNo
Returns: variable containing combo box of countries
**************************************************************************/

function buildCountryNameMenu ($current_country_id,$countryNo,$excludeNonUsedCountries)

{

#	die($current_country_id);
	$country_rs = new countriesTable;
	$country_rs->_orderBy = 'country';
	$proj_count = getNoProjectsByCountry();
	//get list of countries
	$country_rs->get();

	//build the menu
		$countries ="<select name=\"country".$countryNo."_id\" class=\"form\">";
		if ($current_country_id == 0) {
			$countries .= "<option value =\"0\" selected=\"selected\">---</option>" ;
		}else{
			$countries .= "<option value =\"0\">---</option>" ;
		}

		//loop through the countries
		while ($country_rs->fetch()) {
			if ($country_rs->id == $current_country_id) {
				$countries .= "<option value =\"".$country_rs->id."\" selected=\"selected\">".$country_rs->country."</option>" ;
			}else{
				if ($proj_count[$country_rs->id] > 0) {
					$countries .= "<option value =\"".$country_rs->id."\">".$country_rs->country."</option>" ;
				}
			}//end if
		}//end while
		$countries .= "</select>";
		//end menu
		return $countries;
}//end function


/**************************************************************************
Function: buildFFCHMenu
Expects: current_ffch_id
Returns: variable containing combo box of ffch names
**************************************************************************/

function buildFFCHmenu($current_ffch_id)

{
	$ffch_rs = new ffchTable;

	//get list of ffch names
	$ffch_rs->get();

	//build the menu
		$ffch_menu ="<select name=\"ffch_id\" class=\"form\">";
		//loop through the ffch
		while ($ffch_rs->fetch()) {
			if ($ffch_rs->id == $current_ffch_id) {
				$ffch_menu .= "<option value =\"".$ffch_rs->id."\" selected=\"selected\">".$ffch_rs->ffch."</option>" ;
			}else{
				$ffch_menu .= "<option value =\"".$ffch_rs->id."\">".$ffch_rs->ffch."</option>" ;
			}//end if
		}//end while
		$ffch_menu .= "</select>";
		//end menu
		return $ffch_menu;
}//end function


/**************************************************************************
Function: buildFunderNameMenu
Expects: funder_name_id
Returns: variable containing combo box of flow funder names
**************************************************************************/

function buildFunderNameMenu ($current_funder_name_id)

{
	$flow_funder_rs = new flowFunderTable;

	//get list of flow funders
	$flow_funder_rs->get();

	//build the menu
		$flow_funder ="<select name=\"flow_funder_name_id\" class=\"form\">";
		//loop through the funders
		while ($flow_funder_rs->fetch()) {
			if ($flow_funder_rs->id == $current_funder_name_id) {
				$flow_funder .= "<option value =\"".$flow_funder_rs->id."\" selected=\"selected\">".$flow_funder_rs->flow_funder."</option>" ;
			}else{
				$flow_funder .= "<option value =\"".$flow_funder_rs->id."\">".$flow_funder_rs->flow_funder."</option>" ;
			}//end if
		}//end while
		$flow_funder .= "</select>";
		//end menu
		return $flow_funder;
}//end function


/**************************************************************************
Function: buildOrgTypeLinkList
Expects: orgTypes
Returns: variable containing comma seperated list of org types
Credit/Blame: bill@fisherwebdev.com
Note: This is a modified version of buildOrgTypeList().
**************************************************************************/

function buildOrgTypeLinkList ($orgTypes)

{
	$selections = explode("::", $orgTypes);

	//build the list

	//loop through the selections
	$i=1;
	foreach ($selections as $value)
	{
		$type = getOrgType($value);
		$list[$i] = "<a href='view_project.php?type=".$type."'>".$type."</a>";
		$i++;

	}
	sort($list);
	return implode(", " ,$list);

}//end function


/**************************************************************************
Function: buildOrgTypeList
Expects: orgTypes
Returns: variable containing comma seperated list of org types
**************************************************************************/

function buildOrgTypeList ($orgTypes)

{
	$selections = explode("::", $orgTypes);

	//build the list

	//loop through the selections
	$i=1;
	foreach ($selections as $value)
	{
		$list[$i] = getOrgType($value);
		$i++;

	}
	sort($list);
	return implode(", " ,$list);

}//end function


/**************************************************************************
Function: buildOrgTypeSelector
Expects: orgTypes
Returns: variable containing HTML checkbox table
**************************************************************************/

function buildOrgTypeSelector ($orgTypes)

{
	//get the organisation types from the database
	$org_type_rs = new orgTypeTable;

	//get the list of org types
	$org_type_rs->get();

	$selections = explode("::", $orgTypes);

	//build the menu
	$selector ="<table width=\"100%\" border=\"0\" class=\"form\">";
	$selector .="<tr>";
	$i = 1;

	//loop through the org types
	while ($org_type_rs->fetch()) {

		if(in_array($org_type_rs->id,$selections)) $checked = " checked"; else $checked = "";

		$selector .= "<td width=\"0\"> <input type=\"checkbox\" name=\"org_id[]\" value=\"".$org_type_rs->id."\"".$checked.">".$org_type_rs->organisation_type."</td>";
		if($i > 4)
		{
			$i=0;
			$selector .= "</tr><tr>";
		}
		$i++;
	}

	$selector .="</tr></table>";

	return $selector;
}

/**************************************************************************
Function: buildImageTag
Expects: All arguments are optional, but the local argument is recommended.
         imageSrc : URL for the src attribute and path to the image file.
                    If local, it must be a relative path.
         local : boolean : is image local to the server? - SEE BELOW;
         maxWidthPx : the maximum width in pixels an image should be;
         alt : alt text string;
         id : id of image tag
         class : class of image tag
Returns: HTML image tag with width attribute set, if image exceeds maximum
TO DO: Make this more robust for remote images.  Please note that passing 
       the URL of a remote image and setting $local to TRUE will either
       (a) not work or (b) cause the remote image to be downloaded by the 
       server.  Please don't do that.
Credit/Blame: bill@fisherwebdev.com
**************************************************************************/

function buildImageTag($src="", $local=FALSE, $maxWidthPx=0, $alt="", $id="", $class="")

{
	$width = "";
	if(!empty($id)){
		$id = " id='".$id."'";
	}
	if(!empty($class)){
		$class = " class='".$class."'";
	}

	if ($local){ 
		if (file_exists($src)){
			$imageSize = getimagesize($src);
			if ($imageSize > $maxWidthPx && $maxWidthPx !== 0){
				$width = " width='".$maxWidthPx."px'";
			}
		}
	}
	else{ //remote image
		if($maxWidthPx !== 0){
			$width = " width='".$maxWidthPx."px'";
		}
	}
	$html = "<img".$id.$class." src='".$src."' alt='".$alt."'".$width." />";
	return $html;
}


/**************************************************************************
Function: buildWebsiteLink
Expects: website string from database.
Returns: HTML link to an organization's website.
Purpose: makes sure that "http://" is in front of the URL, but will not 
         correct all errors in input.
Credit/Blame: bill@fisherwebdev.com
**************************************************************************/

function buildWebsiteLink($website)

{
	$websiteLink = "<a href='";
	if (substr($website, 0, 7) != "http://"){
		$website = "http://".$website;
	}
	$websiteLink .= $website."'>".$website."</a>";
	return $websiteLink;
}


/**************************************************************************
Function: buildYouTubeImageLink
Expects: youtube_code string from database, maxWidthPx integer for video image
Returns: image link for lightbox YouTube video.
Note: The lightbox effect is dependant on the iBox JavaScript.
See Also: http://fisherwebdev.com/wordpress/2009/08/28/youtube-lightbox-embedding/
See Also: http://www.enthropia.com/labs/ibox/
Credit/Blame: bill@fisherwebdev.com
**************************************************************************/

function buildYouTubeImageLink($youTubeCode, $maxWidthPx=0)

{
	$html = "";
	if (!empty($youTubeCode)) {
		$html .= "<a rel='iBox' href='http://www.youtube.com/watch?v=".$youTubeCode."'>";
		
		//fake video player chrome
		/*$html .= "<img id='video_chrome' src='/images/vid_player.gif' alt='' />"*/
		
		//image from youtube
		$html .= buildImageTag("http://i.ytimg.com/vi/".$youTubeCode."/0.jpg", FALSE, $maxWidthPx, "YouTube Video");
		
		$html .= "</a>";
	}
	return $html;
}


/**************************************************************************
Function: getCountryName
Expects: country_id
Returns: variable containing country name
**************************************************************************/

function getCountryName($country_id)

{
	$country_rs = new countriesTable;

	//get country name
	$country_rs->get($country_id);
	return $country_rs->country;
}//end function


/**************************************************************************
Function: getFFCHName
Expects: ffch_id
Returns: variable containing ffch name
**************************************************************************/

function getFFCHName($ffch_id)

{
	$ffch_rs = new ffchTable;

	//get ffch name
	$ffch_rs->get($ffch_id);
	return $ffch_rs->ffch;
}//end function


/**************************************************************************
Function: getFlowFunderName
Expects: flow_funder_id
Returns: variable containing flow funder name name
**************************************************************************/

function getFlowFunderName($flow_funder_id)

{
	$flow_funder_rs = new flowFunderTable;

	//get ff name
	$flow_funder_rs->get($flow_funder_id);
	return $flow_funder_rs->flow_funder;
}//end function


/**************************************************************************
Function: getNoProjectsInCountry
Expects: countryId
Returns: variable containing number of projects in selected country
**************************************************************************/

function getNoProjectsInCountry ($countryId)

{
	$country_rs = new projectsTable;
	
	$count = 0;
	$sql = "SELECT `id` FROM `projects` WHERE country1_id = '".$countryId."'";
	$country_rs->execute($sql);
	$count = $count + $country_rs->reccount();

	$sql = "SELECT `id` FROM `projects` WHERE country2_id = '".$countryId."'";
	$country_rs->execute($sql);
	$count = $count + $country_rs->reccount();

	$sql = "SELECT `id` FROM `projects` WHERE country3_id = '".$countryId."'";
	$country_rs->execute($sql);
	$count = $count + $country_rs->reccount();

	return $count;
}


/**************************************************************************
Function: getNoProjectsByCountry
Returns: variable containing number of projects in selected country (?)
**************************************************************************/

function getNoProjectsByCountry ()

{
	$country_rs = new projectsTable;
	
	$count = array();
	$sql = "SELECT country1_id as id, COUNT(*) AS count FROM projects " .
		" GROUP BY country1_id";
	
	$country_rs->execute($sql);
	while($country_rs->fetch()) {
		if($count[$country_rs->id]) {
			$count[$country_rs->id] = $count[$country_rs->id] + $country_rs->count;
		} else {
			$count[$country_rs->id] = $country_rs->count;
		}
	}
	
	$sql = "SELECT country2_id as id, COUNT(*) AS count FROM projects " .
		" GROUP BY country2_id";
	
	$country_rs->execute($sql);
	while($country_rs->fetch()) {
		if($count[$country_rs->id]) {
			$count[$country_rs->id] = $count[$country_rs->id] + $country_rs->count;
		} else {
			$count[$country_rs->id] = $country_rs->count;
		}
	}
	
	$sql = "SELECT country3_id as id, COUNT(*) AS count FROM projects " .
		" GROUP BY country3_id";
	
	$country_rs->execute($sql);
	while($country_rs->fetch()) {
		if($count[$country_rs->id]) {
			$count[$country_rs->id] = $count[$country_rs->id] + $country_rs->count;
		} else {
			$count[$country_rs->id] = $country_rs->count;
		}
	}
	return $count;
}


/**************************************************************************
Function: getOrgName
Expects: organisation_id
Returns: variable containing organisation name
**************************************************************************/

function getOrgName($organisation_id)

{
	$org_type_rs = new orgTypeTable;

	//get org name
	$org_type_rs->get($organisation_id);
	return $org_type_rs->organisation_type;
}//end function


/**************************************************************************
Function: getOrgType
Expects: orgID
Returns: variable containing OrgName
**************************************************************************/

function getOrgType($orgID)

{
	//get the organisation types from the database
	$org_type_rs = new orgTypeTable;

	//get org name
	$org_type_rs->get($orgID);
	return $org_type_rs->organisation_type;
}//end function


/**************************************************************************
Function: getOrgTypeID
Expects: orgType
Returns: variable containing org type ID
**************************************************************************/

function getOrgTypeID ($orgType)

{
	//get the organisation types from the database
	$org_type_rs = new orgTypeTable;

	$sql = "SELECT `id` FROM `exhibition_types` WHERE organisation_type = '".$orgType."'";
	$org_type_rs->execute($sql);
	return $org_type_rs->id;
}


/**************************************************************************
Function: makeMYSQLdate
Expects: date in any format
Returns: date in MYSQL format
**************************************************************************/

function makeMYSQLdate($any_date)

{
	return date('Y-m-d', strtotime($any_date));
}//end function


/**************************************************************************
Function: niceShortDate
Expects: date in mysql format
Returns: date in UK format
**************************************************************************/

function niceShortDate($date)

{

#	die ($date);
	return date(__short_date_format__, strtotime($date));
}//end function


/**************************************************************************
Function: yesNoRadio
Expects: groupName,value,
Returns: variable containing radio group
**************************************************************************/

function yesNoRadio($groupName,$value)

{
	if ($value == 1) {$yes = "checked"; $no = "";} else {$no = "checked"; $yes = "";}
	$table_text = ""
	."<table width='110'>"
	."	<tr> "
	."		<td width='54' nowrap> <label> "
	."		<input name='".$groupName."' type='radio' class='form' value='1' ".$yes.">"
	."		<span class='formText'>yes</span></label></td>"
	."		<td width='44' nowrap> <input name='".$groupName."' type='radio' class='form' value='0' ".$no.">"
	."		<span class='formText'>no</span></td>"
	."	</tr>"
	."</table>";

	return $table_text;

}//end function


?>