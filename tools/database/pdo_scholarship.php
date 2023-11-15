<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php
	class connected_scholarship{
		public $id_scholarship;
		public $connto_scholarship;
		function __construct($id_scholarship){
			$this->id_scholarship=$id_scholarship;
			switch($this->id_scholarship){
				case "127.0.0.1" or "localhost" or "::1";
					$scholarship_server="localhost";
					$scholarship_username="root";
					$scholarship_password="053282395";
					$scholarship_db="admission_scholarship";
					$scholarship_post=3399;
						try{
							$connto_scholarship=new PDO("mysql:host=$scholarship_server;dbname=$scholarship_db;port=$scholarship_post;charset=utf8",$scholarship_username,$scholarship_password);
							$connto_scholarship->exec("set names utf8");
							$connto_scholarship->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e){
							echo "Connection Failed: ->pdo_scholarship<-".$e->getMessage();
						}				
				break;
				default;
					$scholarship_server="localhost";
					$scholarship_username="Regina@ict2022";
					$scholarship_password="Regina@ict2022";
					$scholarship_db="admission_scholarship";
					$scholarship_post=3306;
						try{
							$connto_scholarship=new PDO("mysql:host=$scholarship_server;dbname=$scholarship_db;port=$scholarship_post;charset=utf8",$scholarship_username,$scholarship_password);
							$connto_scholarship->exec("set names utf8");
							$connto_scholarship->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e){
							echo "Connection Failed: ->pdo_scholarship<-".$e->getMessage();
						}				
			}
			$this->connto_scholarship=$connto_scholarship;	
		}public function run_connto_scholarship(){
			return $this->connto_scholarship;
		}
	}
?>