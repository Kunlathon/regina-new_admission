<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php
	class AdmissionRegina{
		public $IdAdder;
		public $RunAdmissionRegina;
		function __construct($IdAdder){
			$this->IdAdder=$IdAdder;
				switch($this->IdAdder){
				case "::1";
					$CRR_Server="localhost";
					$CRR_Username="root";
					$CRR_Password="053282395";
					$CRR_DB="regina_admission";
					$CRR_Port=3399;
						try{
							$RunAdmissionRegina=new PDO("mysql:host=$CRR_Server;dbname=$CRR_DB;port=$CRR_Port;charset=utf8",$CRR_Username,$CRR_Password);
							$RunAdmissionRegina->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e_rc){
							echo "Connection to The AdmissionRegina db".$e_rc->getMessage();
						}
				break;
				default:
					$CRR_Server="localhost";
					$CRR_Username="Regina@ict2022";
					$CRR_Password="Regina@ict2022";
					$CRR_DB="regina_admission";
					$CRR_Port=3306;
						try{
							$RunAdmissionRegina=new PDO("mysql:host=$CRR_Server;dbname=$CRR_DB;port=$CRR_Port;charset=utf8",$CRR_Username,$CRR_Password);
							$RunAdmissionRegina->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e_rc){
							echo "Connection to The regina_admission db".$e_rc->getMessage();
						}				
				}
			if(isset($RunAdmissionRegina)){
				$this->RunAdmissionRegina=$RunAdmissionRegina;
			}else{}	
		}function CallAdmissionRegina(){
			if(isset($this->RunAdmissionRegina)){
				return $this->RunAdmissionRegina;
			}else{} 
		}
	}
?>