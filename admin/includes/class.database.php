<?php

$GLOBALS['db_user'] = "flowadmin";
$GLOBALS['db_pass'] = "L3t5g3t1t0n!";

require_once"class.LawnGnome.php";

class projectsTable extends LawnGnome {

	function projectsTable() {
		$this->LawnGnome('flow_fund', $GLOBALS['db_user'], $GLOBALS['db_pass'], 'projects', 'id');
	}
}

class userTable extends LawnGnome {

	function userTable() {
		$this->LawnGnome('flow_fund', $GLOBALS['db_user'], $GLOBALS['db_pass'], 'users', 'id');
	}
}


class contactIdTable extends LawnGnome {

	function contactTable() {
		$this->LawnGnome('flow_fund', $GLOBALS['db_user'], $GLOBALS['db_pass'], 'contact_id', 'id');
	}
}


class countriesTable extends LawnGnome {

	function countriesTable() {
		$this->LawnGnome('flow_fund', $GLOBALS['db_user'], $GLOBALS['db_pass'], 'countries', 'id');
	}
}

class ffchTable extends LawnGnome {

	function ffchTable() {
		$this->LawnGnome('flow_fund', $GLOBALS['db_user'], $GLOBALS['db_pass'], 'ffch', 'id');
	}
}

class flowFunderTable extends LawnGnome {

	function flowFunderTable() {
		$this->LawnGnome('flow_fund', $GLOBALS['db_user'], $GLOBALS['db_pass'], 'flow_funder', 'id');
	}
}

class orgTypeTable extends LawnGnome {

	function orgTypeTable() {
		$this->LawnGnome('flow_fund', $GLOBALS['db_user'], $GLOBALS['db_pass'], 'exhibition_types', 'id');
	}
}


?>

