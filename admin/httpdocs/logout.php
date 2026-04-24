<?php

require_once"../includes/config.inc.php";
require_once(SMARTY_DIR.'setup.php');

// Start the login session
session_start();
session_destroy();




//setup the template
$smarty = new smarty_object;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

$smarty->display('loggedout.html');
?>