<?php
/***********************************************************************
* CLASS LawnGnome
*
**** VERSION 1.11 Beta 
*
**** Base class for database abstraction.  This class should not be created directly but
**** rather extended.
*
****  History:
*
* 10/15/02 - Jeff
*	Fixed Null values not getting updated
*
* 10/7/02 - Jeff
*	Fixes for fields sent to ->SET() not getting inserted if their value is 0
*	Upgraded version from 1.0 to 1.1 to reflect previous method additions
*
* 05/24/10 - Bill
* Added _orderDirection instance variable 
* so as to get a descending order from the get() method
*
**** Constructor: 
*
*	LawnGnome( 'myDatabase', 'user', 'password', 'tableName', 'nameOfPrimaryKeyField' )
* 		It is required that the the constructor be called when classes are
*		derived from LawnGnome
*
**** Public Methods:
*
*	get( [$value] [,$field] [,$count )
*		Populate the object using SELECT * FROM table WHERE $field = $value
*		if $field is empty, then the primary key field is used.  If no arguments
*		are passed then all records are selected.  Returns true if one or more
*		records is selected, false otherwise.  Can optionally pass $count, which
*		will limit the query to $count records
*
*   limit( $offset, $length )
*		Called after a get or execute, limits the query results to a $length count
*		results starting from $offset.  Returns false if the $offset falls outside
*		the number of records, or the total number of records in the object after
*		the limit if successful.  Used internally by the browse() method.
*
*	browse( $offset, $length, $url, [$suppress] )
*		Browse limits the query, as in the limit() method, but also prints out a menu
*		with back and next links, along with page links, allowing you to browse
*		the query results.  The $url should be the $url of the current page.  A
*		$offset variable is added the the URL in the links that are generated.
*		Pass $suppress will supress the $offset value from bein appended.
*
*		To use, the page should first set $_GET['offset'] to a default value if its not
*		already set, then call the method like $table->browse( $_GET['offset'], 20, 'myURL' )
*
*		Note: currently fails if $url does not have a ?var=value pair tacked onto the end of it
*		Just make one up for now to get by.
*
*	del( [int $key] )
*		Delete the current record from the database.  If no primary key is defined,
*		does nothing.  Optionally can pass it the key. 
*
*	insert()
*		Insert a new record.  If no member variables are set, does nothing. Returns
*		the primary key of the record just inserted, false if no record inserted
*
*	update( [int $key] )
*		Updates a record.  If no primary key is defined, or no member variables set,
*		does nothing.  Can optionally pass it the key.
*
*	execute( $sql ) 
*		Execute an SQL query.  Populates the object if records returned removing
*		any that exist in the object. 
*
*	recCount()
*		Returns the number of records stored in the object.
*
*	fetch()
*		Move to the next record in the recordset.
*
*	reset()
*		Return to the first record of the recordset.
*
*	orderBy( [string] )
*		Sets fields to order by with the next select (i.e. 'name, office').  If
*		no arguments defined, removes previous settings.
*
*	selectOpt( [string] )
*		Sets fields to select in the next query.  If no arguments, removes previous settings.
*
*	clear()
*		Clears the data from the recordset.  Does not clear and orderby or select options
*
*	set( Array )
*		Takes an associative array as an argument and populates the object using the key as
*		variable names.  Clears any other records.
*
*	setNonNull( Array )
*		Same as the set() method, but any values that are Null are not set.  This is useful
*		for updates where you only want to update fields that are included in array, null
*		values would cause otherwise wanted values to be set to Null in the DB.
*
*	groom()
*		Private formatting method.
*
*
**** Helpful Hints for Editing this class:
*
* $this->pKey
*		Returns the name of the primary key field
* $this->{$this->pKey}
*		Returns the value of the primary key
* $this->$field['FieldName']
*		Returns the value of member variable named by the current value in the array
*		( i.e. $field = Array( 'FieldName' => dateField,
*							   'Type' => DateTime )  <- would return $this->dateField )
*
*
*
****************************************************************************/


class LawnGnome {

	var $_table ;				// Name of the table
	var $_pKey ;				// Name of primary key field
	var $_orderBy ;				// Order by parameters
	var $_orderDirection ;	// ASC or DESC -- implemented in get() only
	var $_joinTable = Array() ;	// Array of tables to join
	var $_joinCondition	;		// conditions of join
	var $_whereOpt ;			// Additional where parameters
	var $_selectOpt ;			// List of fields to select
	var $_fields = Array() ;	// Two dimensional associative array with
								//     field names and types
	var $_results = Array() ;	// Result of a query.  Array of objects.
	var $_connection ;			// Database connection object
	
	
	/******************************/
	// Class constructor, sets the DSN, table name, and primary key field and
	// creates the _fields array by querying the database table
	
	function LawnGnome( $DB, $user, $pass, $new_table, $new_pKey) {
	
		$this->_pKey = $new_pKey ;
		$this->_table = $new_table ;
		
		if ( !($this->_connection = mysql_pconnect( '205.178.146.24', $user, $pass )) )
			die("Could not connect") ;
		
		if ( !(mysql_select_db( $DB, $this->_connection )) )
			die( "Could not select database: " . mysql_errno() . ":" . mysql_error() ) ;	
			
		
	}	// End constructor
	
	
	/**************************************/
	// Limit the query to a subset of records.  First argument
	// is the record number to start at, the second is the
	// number to retrieve after the starting point
	// Returns the number of records found after the start, or false
	// if none were set
	
	function limit( $offset, $length ) {
	
		if ( !($this->_results = array_slice( $this->_results, $offset, $length )) ) {
		
			return false ;
		
		} else {
		
			$this->reset() ;
			return count( $this->_results ) ;
		
		}
	}
	
	
	/**********************************************/
	// Browse() uses the limit method to limit the query results, then prints a browse
	// menu allowing you to browse next and previous records.  The query will automatically be
	// limited to a certain number of records after this is called.  The $offset and $length
	// variables will be created as $_Get variables on the $url that is called.  $suppress, if true
	// will keep the $offset from being appended to the URL.  Use this if you store the offset
	// manually in a form, session variable or otherwise.
	
	function browse( $offset, $length, $url, $suppress = false ) {
	
		if ( $this->_results ) {
		
			// Setup some private variables
			$totalRecs = $this->recCount() ;
			$currentRecs = $this->limit($offset, $length) ;
			$currentRecs += $offset ;
			$pageCount = Ceil( $totalRecs / $length ) - 1 ;
			
			// Print a line explaining which records we are on
			$startRecord = $offset + 1 ;
			echo "Viewing {$startRecord} to {$currentRecs} of {$totalRecs} records<br>" ;
			
			// check and see if we need to print out next and back buttons with a list of page numbers
			// unneeded if we only have one page
			if ( !($totalRecs <= $length) ) {
			
				// If offset is zero then we are on page one and don't need the back button active
				if ( $offset ) {
					
					// Setup the previouse offset
					$backOffset = $offset - $length ;
					
					// Print out the back link
					if ( !$suppress ) {
						echo "&lt;&lt;&lt; <a href=\"{$url}&offset={$backOffset}\">Back</a>" ;
					} else {
						echo "&lt;&lt;&lt; <a href=\"{$url}\">Back</a>" ;
					}
				
				} else {
					// Print out an inactive back link
					echo "&lt;&lt;&lt; Back" ;
				
				}
				
				
				// Print out the page numbers as links
				for ( $x = 0; $x <= $pageCount; $x++ ) {
				
					// Get the offset for the current page
					$curOffset = $length * $x  ;
					$page = $x + 1 ;
				
					// print out the page link
					if ( $curOffset == $offset ) {
						echo " {$page} " ;
					} elseif ( !$suppress ) {
						echo " <a href=\"{$url}&offset={$curOffset}\">$page</a> " ;
					} else {
						echo " <a href=\"{$url}\">$page</a> " ;
					}
				
				} // end for loop
				
				// See if we aren't on the last page, if not
				// print out the next link
				if ( ( $totalRecs - $offset )  >= $length ) {
				
					// Setup the offset of the next page
					$nextOffset = $offset + $length ;
				
					// Print the next link
					if ( !$suppress ) {
						echo "<a href=\"{$url}&offset={$nextOffset}\">Next</a> &gt;&gt;&gt;" ;
					} else {
						echo "<a href=\"{$url}\">Next</a> &gt;&gt;&gt;" ;
					}
				
				} else {
					// Print out an inactive next link
					echo "Next &gt;&gt;&gt;" ;
				
				}

			} // end if (!($totalR.....
		
		} // end if ( $this->results.....
		
	} // End method browse() 
	
	
	
	/**************************************/
	// internal function used to retrieve a list of fields.  Only needs
	// to be called once before the first insert or update
	
	function getFields() {
		
		if ( !($this->_fields) ) {
			
			$sql = "SHOW FIELDS FROM {$this->_table}" ;
			$new_fields = runQuery( $this->_connection, $sql ) ;
			
			foreach( $new_fields as $new_field ){
				// Make sure we don't stick the primary key in the array
				if ( $new_field['Field'] != $this->_pKey ) {
					$this->_fields[] = array( 'FieldName' => $new_field['Field'], 
											  'Type'      => $new_field['Type'] ) ;
				}
			
			} // end foreach
			
		}  // end if !($this....
		
	}  // end getFields
	
	
	
	
	/*****************************/
	// Execute a raw query, if it returns a recordset the fields
	// are populated, otherwise it returns false
	
	function execute( $sql ) {
		
		$this->clear();
	
		if ( ($recs = runQuery($this->_connection, $sql )) ) {
			
			$this->_results = $recs ;
			
			$rec = $recs[0] ;
			foreach( $rec as $key=>$data ){
				$this->$key = stripslashes($data); }
			
			return true;
			
		} else {
		
			return false ;
		}

	}
	
	
	/*************************************/
	// Select a recordset based on a value and a field
	// If no field is provided, the primary key field is used by default
	// If no value then all records are selected
	
	function get( $val = '', $field = '' ) {
	
		
		// see if the field is defined
		if ( !$field ) {
			$field = $this->_pKey ;
		}
		
		
		// Add any SELECT options to the query	
		if ( $this->_selectOpt ) {
			$sql =  "SELECT {$this->_selectOpt}" ;
		} else {
			$sql = "SELECT *" ;
		}
		
		
		// Add FROM statament
		$sql .= " FROM {$this->_table}" ;
		
		
		// Build the WHERE clause
		if ( $val !== '' ) {
			$val = addSlashes( $val ) ;
			$sql .=	" WHERE {$field} = '{$val}'" ;
		}
		
		
		// Add in WHERE options
		if ( ( $this->_whereOpt ) && ( !$val ) ) {
			$sql .= " WHERE {$this->_whereOpt}" ;	
		} 
		
		if ( ( $this->_whereOpt ) && ( $val ) )  {
			$sql .= " AND {$this->_whereOpt}" ;
		}
		
		
		// Add in ORDER BY options
		if ( $this->_orderBy ) {
			$sql .= " ORDER BY {$this->_orderBy}" ;  }
			
		// Add in ORDER BY direction options
		if ( $this->_orderDirection ) {
			$sql .= " {$this->_orderDirection}" ;  }			
		
		
		// Clear any existing member variables and the records array
		$this->clear();
		
		//echo $sql . "<br>" ;
		// Execute the query, return false if no records
		// are returned
		if ( $recs = runQuery($this->_connection, $sql ) ) {
			
			// Setup the results array
			$this->_results = $recs ;
			
			// Get the first record
			$rec = $recs[0] ;
			
			// Populate the member variables
			foreach( $rec as $key=>$data ){
				$this->$key = stripslashes($data) ; }
			
			return true ;

		} else {
		
			return false ;
		}
		
	}
	
	
	/*************************************/
	// Return the count of records that exist in the object
	
	function recCount() {
	
		return count( $this->_results ) ;
	
	}
	
	
	
	/************************************/
	// Set the pointer to the beginning of the records array and populate
	// the member fields with the values from the first record
	
	function reset() {
	
		if(	$rec = reset( $this->_results ) ) {
			
			// Populate the member variables
			foreach( $rec as $key=>$data ) {
				$this->$key = $data; }
	
		}
	
	}
	
	
	/***************************************/
	// Move the recordset pointer forward one and populate
	// the member variables wit the next record.  Return
	// false if at the end of the records array
	
	function fetch() {
		
		if ( $rec = current( $this->_results ) ) {
			
			// Populate the member variables
			foreach( $rec as $key=>$data ) {
				$this->$key = stripslashes($data); }
			
			// Move the pointer forward
			next( $this->_results ) ;
			
			return true ;
			
		} else {
		
			return false ;
			
		}
		
	}
	
	/******************************************/
	// Delete a record.  If no primary key is set
	// then no SQL is executed.  (assume that record doesn't exist in DB)
	
	function del( $pkey = '') {
	
		if ( $pkey )
			$this->{$this->_pKey} = $pkey ;
	
		if ( $this->{$this->_pKey} ){
		
			$sql = "DELETE
					FROM {$this->_table}
					WHERE {$this->_pKey} = {$this->{$this->_pKey}}" ;
			runQuery($this->_connection, $sql) ;
			
		}
	
	}
	
	
	/***************************/
	// Update a record in the database
	
	function update( $pkey = '' ) {
		
		$this->getFields() ;
			
		if ( $pkey )
			$this->{$this->_pKey} = $pkey ;
		
		// See if a primary key is defined
		if ( $this->{$this->_pKey} ) {
			
			$flag = false;
			
			$sql = "UPDATE {$this->_table} SET " ;
			
			foreach( $this->_fields as $field ){
				// Check to see if member variable has a value
				if( isset($this->$field['FieldName']) ) {
					$sql .= "{$field['FieldName']} = " 
						 . $this->groom($this->{$field['FieldName']}, $field['Type']) 
					 	 . ", " ;
					$flag = true;
				}
			}
			
			// Cut off the trailing comma
			$sql = substr($sql, 0, strlen($sql) - 2) 
				 . " WHERE {$this->_pKey} = {$this->{$this->_pKey}}" ;
			
			// Flag will be false if no value pairs were added to the query
			// which woudl cause a database error
			if ( $flag ) {
				runQuery($this->_connection, $sql) ;
			}
		}
		
	}
		
	/*******************************/
	//  Insert a new record into the database and return 'A' primary key
	
	function insert() {
		
		$this->getFields();
		
		$sql = "INSERT INTO {$this->_table}(";
		
		// Create list of fields
		foreach( $this->_fields as $field ) {
			if( $this->$field['FieldName'] != NULL ) {
				$sql .= "{$field['FieldName']}, ";
				$flag = true;
			}
		}
		
		// get rid of the trailing comma
		$sql = substr($sql, 0, strlen($sql) - 2) . ") VALUES(";
		
		// create the list of values
		foreach( $this->_fields as $field ) {
			
			if( ($value = $this->$field['FieldName']) != NULL ) {
			
				$type = $field['Type'] ;
				$sql .= $this->groom( $value, $type ) . ", ";
				
			}

		}
		
		// get rid of the trailing comma
		$sql = substr($sql, 0, strlen($sql) - 2) . ")";
		
		
		// If flag is false we have a malformed query - no member values
		// have been set
		if ( $flag ) {
		
			runQuery($this->_connection, $sql) ;
			return mysql_insert_id( $this->_connection ) ;
			
		} else {
			return false ;
			
		}
		
	}
	
	
	/******************/
	// Set the orderBy parameters
	
	function orderBy( $order_string = '' ) {
		
		$this->_orderBy = $order_string ;
			
	}
	
	/******************/
	// Set the orderDirection parameter
	
	function orderDirection( $order_dir_string = '' ) {
		
		$this->_orderDirection = $order_dir_string ;
			
	}	
	
	/******************/
	// Set the SELECT parameters
	
	function selectOpt( $select_string = '') {
		
		$this->_selectOpt = $select_string ;
		
	}
	
	/******************/
	// Set the WHERE parameters - BUGGY
	
	function whereOpt( $where_string = '') {
	
		$this->_whereOpt = $where_string ;
	
	}
	
	
	/***********************************/
	// Groom() formats a value to prepare for an SQL statement.
	// Text fields are surrounded by '', dates are made into ODBC timestamps if not blank,
	// and numeric values are left alone
	
	function groom( $value, $type ) {
	
		if (   stristr( $type, 'int' ) 
			|| stristr( $type, 'double' )
			|| stristr( $type, 'float' )
			|| stristr( $type, 'decimal' )  ) {
			
			$value = addslashes($value) ;
			return "'{$value}'" ;
		}
			
		if (   stristr( $type, 'char' ) 
			|| stristr( $type, 'text' ) ) {
			
			$value = addslashes($value) ;
			return "'{$value}'" ; 
		}
			
		if ( stristr( $type, 'date' ) && ( $value != 0 ) ) {
		
			return CreateODBCDateTime( $value ) ;
			
		} else { 
		
			return "{ts '0000-00-00 00:00:00' }" ; 
		}
			
	}
	
	
	
	/************************/
	// Clear the results array and all the member variables
	
	function clear() {
		
		$this->getFields() ;
		
		foreach( $this->_fields as $field ) {
			$this->$field['FieldName'] = '';
		}
		$this->_results = Array();
	}
	
	
	/***************************/
	// Given an associative array (such as $_POST), populate
	// the member variables
	 
	function set( $setArray ) {
		
		$this->clear();
		$this->_results[0] = $setArray ;
		
		if ($setArray) {
			foreach( $setArray as $field=>$value ) {
				$this->$field = $value ;
			}
		}
	
	}
	

	
	/***************************/
	// Given an associative array (such as $_POST), populate
	// the member variables.  Null values are ignored
	 
	function setNonNull( $setArray ) {
		
		$this->clear();
		$this->_results[0] = $setArray ;
		
		if ($setArray) {
			foreach( $setArray as $field=>$value ) {
				if ( $value ) {
					$this->$field = $value ;
				}
			}
		}
	
	}
	
	
}  // END LAWNGNOME CLASS
/*****************************************************/



/*******************************************************************************
* CreateODBCDate()
*
* Takes any date statement or Unix timestamp as an argument and returns 
* an ODBC formatted date string as {d 'yyyy-mm-dd'}
*
* Throws a sytem warning on invalid date string.  No error checking for bad unix
* timestamps
*
*********************************************************************************/

	function CreateODBCDate($date){
		// check if its a string, if not we are going to assume its a UNIX timestamp
		if ( is_string($date) ){
			// Attempt to convert date string to UNIX timestamp
			if ( ($date = strToTime($date)) === -1) { 
				trigger_error("CreateODBCDate:Invalid Date String ", E_USER_WARNING) ;
			}
		}
		// Convert unix timestap to the format we need
		$date = Date("Y-m-d", $date) ;
		return "{d '" . $date . "'}" ;
	}

	
/*******************************************************************************
* CreateODBCDateTime()
*
* Same as above only returns time as {ts 'yyyy-mm-dd hh:mm:ss'}
*
* Throws a sytem warning on invalid date string.  No error checking for bad unix
* timestamps
*********************************************************************************/

	
	function CreateODBCDateTime($date){
		if ( is_string($date) ){
			if ( ($date = strToTime($date)) === -1) { 
				trigger_error("CreateODBCDateTime:Invalid Date String ", E_USER_WARNING) ;
			}
		}
		$date = Date("Y-m-d G:i:s", $date) ;
		return "{ts '" . $date . "'}" ;
	}



/******************************************************************************
* RunQuery()
*
* Takes a DSN and sql statment as an argument, then queries the database
*
* Returns an array of objects, each object being a row from the DB.  If no
* rows are produced by query, does not return anything.
* 
*******************************************************************************/

function runQuery ( $connection, $sql ) {

	// run query
	if ( !($recSet = @ mysql_query( $sql, $connection )) )
		die( "Error executing query: " . mysql_errno() . ":" . mysql_error() . "<br>\n" . $sql ) ;
		
	// Check to see if query returned anything
	if ( is_resource($recSet) ) {
		
		$objSet = Array() ;
		while ( $curRow = mysql_fetch_assoc( $recSet ) ) {
			$objSet[] = $curRow; }
		
		return $objSet ;
		
	} else {
		return false ;
	}
	
}
?>