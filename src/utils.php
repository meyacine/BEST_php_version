<?php
	/*******************************************************************************************
	* @Author: Maamar Yacine MEDDAH
	* BEST utils class
	* we define in this class a set of functionalities:
	* dbConnection that read the database.properties file and connect to the db
	*******************************************************************************************/
	class Utils {
		public $host;
		public $schema;
		public $port;
		public $user;
		public $password;
		public $dbc;
		/**
		* Read properties file and set the attributes values 
		*/
		public function parseDatabasePropetiesFile()
		{
			$filePointer = fopen("../database.properties", "r");
			while (!feof($filePointer))
				{
					$data = fgets($filePointer,4096);
					$dataInfo = explode(" ", $data);
					switch ($dataInfo[0]) {
						case "host": {
							$this->host = str_replace("\r\n", "", $dataInfo[2]);
							break;
							}
						case "databaseName": {
							$this->schema = str_replace("\r\n", "", $dataInfo[2]);
							break;
							}
						case "userName": {
							$this->user = str_replace("\r\n", "", $dataInfo[2]);
							break;
							}
						case "pass": {
							$this->password = str_replace("\r\n", "", $dataInfo[2]);							
							break;
							}
						case "port": {
							$this->port = str_replace("\r\n", "", $dataInfo[2]);							
							break;
							}
					}
				}
			fclose($filePointer);
		}
		
		/**
		* we connect to the mysql connexion using propeties parameters
		*/
		public function databaseConnect(){
			$this->parseDatabasePropetiesFile();
			$dsn = "mysql:dbname=".$this->schema.";host=".$this->host;
			switch ($this->port){
				case "3306": {
					// mysql specific
					$dsn = "mysql:dbname=".$this->schema.";host=".$this->host;
					break;
				}
				case "1521": {
					// Oracle specific
					$dsn = "oci:dbname=".$this->schema;
					break;
				}
			}
			$user = $this->user;
			$password = $this->password;
			try {
				$this->dbc = new PDO($dsn, $user, $password);
			} catch (PDOException $e) {
				echo 'Connexion failed : ' . $e->getMessage();
			}
		}
	}
?>