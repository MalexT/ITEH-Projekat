<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "sluzba";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

		function unesiNoviPredmet($pod) {
			$konekcija = new mysqli("localhost", "root", "", "sluzba");

			$predmet = $konekcija->real_escape_string($pod['predmet']);

			$query = "INSERT into predmet (nazivPredmeta) VALUES ('$predmet')";

			if($konekcija->query($query))
			{
				$this ->result = true;
			}
			else
			{
				$this->result = false;
			}
			$konekcija->close();
		}


	function vratiKandidate() {
	  $konekcija = new mysqli("localhost", "root", "", "sluzba");
	  $q = 'SELECT * FROM kandidat ';
	  $this ->result = $konekcija->query($q);
	  $konekcija->close();
	}

	function vratiPredmete() {
	  $konekcija = new mysqli("localhost", "root", "", "sluzba");
	  $q = 'SELECT * FROM predmet';
	  $this ->result = $konekcija->query($q);
	  $konekcija->close();
	}
	function vratiRokove() {
	  $konekcija = new mysqli("localhost", "root", "", "sluzba");
	  $q = 'SELECT * FROM rok ';
	  $this ->result = $konekcija->query($q);
	  $konekcija->close();
	}



	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
