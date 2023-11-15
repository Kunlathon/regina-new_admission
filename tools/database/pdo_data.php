<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php
	
	$db_evaluationPDOID=$_SERVER['REMOTE_ADDR'];
	if(isset($db_evaluationPDOID)){
		if($db_evaluationPDOID=="127.0.0.1"){
		//db_evaluation
			$hostnamePDO_evaluation = "127.0.0.1";
			$usernamePDO_evaluation = "codebeer2021";
			$passwordPDO_evaluation = "codebeer2021";
			$databasePDO_evaluation = "regina_student";
	
		}else{
		//db_evaluation
			$hostnamePDO_evaluation = "localhost";
			$usernamePDO_evaluation = "regina_student";
			$passwordPDO_evaluation = "student2019";
			$databasePDO_evaluation = "regina_student";
		}
	}else{

	}
?>

<?php
	class conntopdo_evaluationto{
		private $connto_evaluationto_evaluation;
		private $dsn_mysql="mysql:host=localhost;dbname=regina_student;charset=utf8;port=3399";
		private $dsn_sqlite="sqlite:my_sqlite.db";
		private $user="root";
		private $password="053282395";

		public function __construct($db){
			//$this->connto_evaluationto_evaluation=$connto_evaluationto_evaluation;
			//$this->dsn_mysql=$dsn_mysql;
			//$this->dsn_sqlite=$dsn_sqlite;
			//$this->user=$user;
			//$this->password=$password;
			
			try{
				switch($db){
					case "mysql":
					
					$this->connto_evaluationto_evaluation = new PDO($this->dsn_mysql, $this->user, $this->password);
					// set the PDO error mode to exception
					$this->connto_evaluationto_evaluation->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//echo "connto_evaluationto_evaluationected successfully";
					
					break;
					
					case "sqlite":
					
					$this->connto_evaluationto_evaluation=new PDO($this->dsn_sqlite);
					break;
					
				default : echo "No database connto_evaluationto_evaluationecting"; break;
					
				}
			}
			catch(PDOException $e){
				die('Could not connto_evaluationto_evaluationection to database because'.$e->getmessage());
				
			}
		}
		public function getconnto_evaluationto_evaluationect(){
			return $this->connto_evaluationto_evaluation;
		}
	}


?>

</body>
</html>


