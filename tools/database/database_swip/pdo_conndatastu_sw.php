<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php
	date_default_timezone_set('Asia/Bangkok');
	$db_datastuPDOID=$_SERVER['REMOTE_ADDR'];
	if(isset($db_datastuPDOID)){
		if($db_datastuPDOID=="127.0.0.1"){
		//db_datastu
			$hostnamePDO_datastu = "127.0.0.1";
			$usernamePDO_datastu = "codebeer2021";
			$passwordPDO_datastu = "codebeer2021";
			$databasePDO_datastu = "regina_stu";
	
		}else{
		//db_datastu	
			$hostnamePDO_datastu = "localhost";
			$usernamePDO_datastu = "regina_swiprc";
			$passwordPDO_datastu = "swiprc2020";
			$databasePDO_datastu = "regina_swiprc";
		}
	}else{

	} 
?>

<?php
	class conntopdo_datastuto_sw{
		private $connto_datastuto_datastu;
		private $dsn_mysql="mysql:host=localhost;dbname=regina_swiprc;charset=utf8;port=3399";
		private $dsn_sqlite="sqlite:my_sqlite.db";
		private $user="root";
		private $password="053282395";

		public function __construct($db){
			//$this->connto_datastuto_datastu=$connto_datastuto_datastu;
			//$this->dsn_mysql=$dsn_mysql;
			//$this->dsn_sqlite=$dsn_sqlite;
			//$this->user=$user;
			//$this->password=$password;
			
			try{
				switch($db){
					case "mysql":
					
					$this->connto_datastuto_datastu = new PDO($this->dsn_mysql, $this->user, $this->password);
					// set the PDO error mode to exception
					$this->connto_datastuto_datastu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//echo "connto_datastuto_datastuected successfully";
					
					break;
					
					case "sqlite":
					
					$this->connto_datastuto_datastu=new PDO($this->dsn_sqlite);
					break;
					
				default : echo "No database connto_datastuto_datastuecting"; break;
					
				}
			}
			catch(PDOException $e){
				die('Could not connto_datastuto_datastuection to database because'.$e->getmessage());
			}
		}
		public function getconnto_datastuto_datastuect(){
			return $this->connto_datastuto_datastu;
		}				
	}
?>

</body>
</html>


