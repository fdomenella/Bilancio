<?php
	define("DB_USER", "root");			// <-- mysql db user
	define("DB_PASSWORD", "");		// <-- mysql db password
	define("DB_NAME", "bilancio");		// <-- mysql db pname
	define("DB_HOST", "localhost");	// <-- mysql server host

class db {

	var $objDb;


	function __construct($dbuser, $dbpassword, $dbname, $dbhost){
        	$this->objDb = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
		//$this->objDb = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
		//$this->selectDb($dbname);
		if ($this->objDb->connect_error) {
                    die('Errore di connessione (' . $this->objDb->connect_errno . ') '
                    . $this->objDb->connect_error);
                } else {
                  //  echo 'Connesso. ' . $this->objDb->host_info . "\n";
                }
	}

	function selectDb($dbname){
		mysqli_select_db($dbname,$this->objDb);
	}
	/**
	 * Esegue una query
	 *
	 * @param La query $q
	 * @return se_va_a_buon_fine(righe>0)_ritorna_$result_altrimenti_false
	 */
	function query($query){
                $result = $this->objDb->query($query) or die ("Query fallita : "
			."<li>errorno=".$this->objDb->errno
			."<li>error=".$this->objDb->error
			."<li>query=".$query
			);

		if ($result) {
                  
			if (mysqli_num_rows($result)>0) {

			    return $result;
			}
			else{
				return false;
			}
		}
		else {
			return false;
		}
	}

	/**
	 * Riceve una query di update-delete-insert e restituisce se � andata a buon fine
	 *
	 * @param unknown_type $q
	 * @return bool
	 */
	function queryInsert($query){
		$result = $this->objDb->query($query) or die ("Query fallita : "
			."<li>errorno=".$this->objDb->errno
			."<li>error=".$this->objDb->error
			."<li>query=".$query
			);
                if(!$result)
                    if (mysqli_affected_rows()==0) {
                            //maybe an error
                            return false;
                    }

		return true;
	}



	function queryDelete($query){
		$result = $this->objDb->query($query) or die ("Query fallita : "
			."<li>errorno=".$this->objDb->errno
			."<li>error=".$this->objDb->error
			."<li>query=".$query
			);
		return true;
	}


}

$db = new db(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);

?>
