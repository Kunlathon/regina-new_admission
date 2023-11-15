<?php
	class conntopdo_project{
		public $id_system;
		function __construct($id_system){
			$this->id_system=$id_system;
				if($this->id_system=="127.0.0.1" or $this->id_system=="localhost" or $this->id_system=="::1"){
					$project_server="localhost";
					$project_username="root";
					$project_password="053282395";
					$project_db="regina_project";
					$project_port=3399;
						try{
							$connto_dataproject_rc=new PDO("mysql:host=$project_server;dbname=$project_db;port=$project_port;charset=utf8",$project_username,$project_password);
							$connto_dataproject_rc->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e){
							echo "Connection failed: ->pdo_project<-";
						}
				}else{
					$project_server="localhost";
					$project_username="Regina@ict2022";
					$project_password="Regina@ict2022";
					$project_db="regina_project";
					$project_port=3306;
						try{
							$connto_dataproject_rc=new PDO("mysql:host=$project_server;dbname=$project_db;port=$project_port;charset=utf8",$project_username,$project_password);
							$connto_dataproject_rc->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e){
							echo "Connection failed: ->pdo_project<-";
						}					
				}
			$this->connto_dataproject_rc=$connto_dataproject_rc;	
		}public function getconnto_connto_dataproject_rc(){
			return $this->connto_dataproject_rc;
		}
	}

?>