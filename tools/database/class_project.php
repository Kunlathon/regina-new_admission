<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php
	class stu_project{
		public $sp_level,$sp_plan,$sp_ptsn_key;
		function __construct($sp_level,$sp_plan,$sp_ptsn_key){
			$this->sp_level=$sp_level;
			$this->sp_plan=$sp_plan;
			$this->sp_ptsn_key=$sp_ptsn_key;
//------------------------------------------------------------------------------			
			$project_ip=$_SERVER["REMOTE_ADDR"];
			$connpdo_project=new conntopdo_project($project_ip);
			$conn_project=$connpdo_project->getconnto_connto_dataproject_rc();
//------------------------------------------------------------------------------
				$data_projectSql="select `project_test_stu_new`.`ptsn_key`, `project_test_stu_new`.`ptsn_txtth` ,`project_test_stu_new`.`ptsn_txten`,`project_test_stu_new`.`ptsn_status`
								  from `project_test_stu_new` join `project_test` on(`project_test_stu_new`.`ptsn_key`=`project_test`.`ptsn_key`) 
								  where `project_test`.`pt_level`='{$this->sp_level}' 
								  and `project_test`.`pt_plan`='{$this->sp_plan}' 
								  and `project_test_stu_new`.`ptsn_key`='{$this->sp_ptsn_key}';";
					if($data_projectRs=$conn_project->query($data_projectSql)){
						$data_projectRow=$data_projectRs->Fetch(PDO::FETCH_ASSOC);
							if(is_array($data_projectRow) && count($data_projectRow)){
								$SPprint_ptsn_key=$data_projectRow["ptsn_key"];
								$SPprint_ptsn_txtth=$data_projectRow["ptsn_txtth"];
								$SPprint_ptsn_txten=$data_projectRow["ptsn_txten"];
								$SPprint_ptsn_status=$data_projectRow["ptsn_status"];
							}else{
								$SPprint_ptsn_key=null;
								$SPprint_ptsn_txtth=null;
								$SPprint_ptsn_txten=null;
								$SPprint_ptsn_status=null;								
							}
					}else{
						$SPprint_ptsn_key=null;
						$SPprint_ptsn_txtth=null;
						$SPprint_ptsn_txten=null;
						$SPprint_ptsn_status=null;						
					}
//---------------------------------------------------------					
				if(isset($SPprint_ptsn_key)){
					$this->SPprint_ptsn_key=$SPprint_ptsn_key;
				}else{}
//---------------------------------------------------------					
				if(isset($SPprint_ptsn_txtth)){
					$this->SPprint_ptsn_txtth=$SPprint_ptsn_txtth;
				}else{}
//---------------------------------------------------------					
				if(isset($SPprint_ptsn_txten)){
					$this->SPprint_ptsn_txten=$SPprint_ptsn_txten;
				}else{}
//---------------------------------------------------------					
				if(isset($SPprint_ptsn_status)){
					$this->SPprint_ptsn_status=$SPprint_ptsn_status;
				}else{}
//---------------------------------------------------------
				$conn_project=null;
		}function __destruct(){
//---------------------------------------------------------			
			if(isset($this->SPprint_ptsn_key)){
				$this->SPprint_ptsn_key;
			}else{}
//---------------------------------------------------------			
			if(isset($this->SPprint_ptsn_txtth)){
				$this->SPprint_ptsn_txtth;
			}else{}
//---------------------------------------------------------			
			if(isset($SPprint_ptsn_txten)){
				$this->SPprint_ptsn_txten;
			}else{}
//---------------------------------------------------------			
			if(isset($SPprint_ptsn_status)){
				$this->SPprint_ptsn_status;
			}else{}
//---------------------------------------------------------
		}
	}
?>


<?php
	class data_project{
		public $dp_key,$dp_year;
		function __construct($dp_key,$dp_year){
			$this->dp_key=$dp_key;
			$this->dp_year=$dp_year;
//------------------------------------------------------------------------------			
			$project_ip=$_SERVER["REMOTE_ADDR"];
			$connpdo_project=new conntopdo_project($project_ip);
			$conn_project=$connpdo_project->getconnto_connto_dataproject_rc();
//------------------------------------------------------------------------------
			$data_projectSql="SELECT `sn_key`, `sn_number`, `sn_year`, `sn_plan`, `sn_level`, `sn_pn`, `sn_nameTH`, `sn_surnameTH`, `sn_pnEH`, `sn_nameEH`, `sn_surnameEH`, `sn_datetime` 
							  FROM `stu_new` WHERE `sn_number`='{$this->dp_key}' and `sn_year`='{$this->dp_year}'";
				if($data_projectRs=$conn_project->query($data_projectSql)){
					$data_projectRow=$data_projectRs->Fetch(PDO::FETCH_ASSOC);
						if(is_array($data_projectRow) && count($data_projectRow)){
							$dpro_user=$data_projectRow["sn_key"];
							$dpro_key=$data_projectRow["sn_number"];
							$dpro_plan=$data_projectRow["sn_plan"];
							$dpro_level=$data_projectRow["sn_level"];
						}else{
							$dpro_user=null;
							$dpro_key=null;
							$dpro_plan=null;
							$dpro_level=null;							
						}
				}else{
					$dpro_user=null;
					$dpro_key=null;
					$dpro_plan=null;
					$dpro_level=null;
				}
//---------------------------------------------------------				
			if(isset($dpro_user)){
				$this->dpro_user=$dpro_user;
			}else{}
//---------------------------------------------------------								
			if(isset($dpro_key)){
				$this->dpro_key=$dpro_key;
			}else{}
//---------------------------------------------------------				
			if(isset($dpro_plan)){
				$this->dpro_plan=$dpro_plan;
			}else{}
//---------------------------------------------------------			
			if(isset($dpro_level)){
				$this->dpro_level=$dpro_level;
			}else{}
//---------------------------------------------------------
			$conn_project=null;
		}function __destruct(){
//---------------------------------------------------------				
			if(isset($this->dpro_user)){
				$this->dpro_user;
			}else{}
//---------------------------------------------------------								
			if(isset($this->dpro_key)){
				$this->dpro_key;
			}else{}
//---------------------------------------------------------				
			if(isset($this->dpro_plan)){
				$this->dpro_plan;
			}else{}
//---------------------------------------------------------			
			if(isset($this->dpro_level)){
				$this->dpro_level;
			}else{}
//---------------------------------------------------------			
		}
	}
?>



<?php
	class verify_ipst{
		public $uesr_id,$user_level,$user_plan,$user_test,$user_year;
		function __construct($uesr_id,$user_level,$user_plan,$user_test,$user_year){
			$this->uesr_id=$uesr_id;
			$this->user_level=$user_level;
			$this->user_plan=$user_plan;
			$this->user_test=$user_test;
			$this->user_year=$user_year;
//------------------------------------------------------------------------------			
			$project_ip=$_SERVER["REMOTE_ADDR"];
			$connpdo_project=new conntopdo_project($project_ip);
			$conn_project=$connpdo_project->getconnto_connto_dataproject_rc();
//------------------------------------------------------------------------------			
//class stu_project
			$stu_project=new stu_project($this->user_level,$this->user_plan,$this->user_test);
//class stu_project End			
				if($stu_project->SPprint_ptsn_status=="ON"){
					$test_projectSql="select `stu_new`.`sn_key`,`stu_new`.`sn_number`,`stu_new`.`sn_plan`,`stu_new`.`sn_level`,`stu_new`.`sn_pn`,`stu_new`.`sn_nameTH`,`stu_new`.`sn_surnameTH`,`stu_new_has_project_test`.`stu_new_sn_key`,`stu_new_has_project_test`.`project_test_pt_key`,`stu_new_has_project_test`.`project_test_ptsn_key`,`stu_new_has_project_test`.`project_status_ps_no`
                                      from `stu_new` join `stu_new_has_project_test` on(`stu_new`.`sn_key`=`stu_new_has_project_test`.`stu_new_sn_key`) 
									  where `stu_new`.`sn_number`='{$this->uesr_id}' 
					                  and `stu_new`.`sn_year`='{$this->user_year}' 
					                  and `stu_new`.`sn_plan`='{$this->user_plan}' 
                                      and `stu_new`.`sn_level`='{$this->user_level}'
                                      and `stu_new_has_project_test`.`stu_new_sn_year`='{$this->user_year}'
                                      and `stu_new_has_project_test`.`project_test_ptsn_key`='{$this->user_test}'";
					if($test_projectRs=$conn_project->query($test_projectSql)){
						$test_projectRow=$test_projectRs->Fetch(PDO::FETCH_ASSOC);
						if(is_array($test_projectRow) && count($test_projectRow)){
//-----------------------------------------------------------------------------------------------------------------------------							
							if($test_projectRow["sn_pn"]==2){
								$vi_nameTh="เด็กหญิง&nbsp;".$test_projectRow["sn_nameTH"]."&nbsp;".$test_projectRow["sn_surnameTH"];
							}elseif($test_projectRow["sn_pn"]==4){
								$vi_nameTh="นางสาว&nbsp;".$test_projectRow["sn_nameTH"]."&nbsp;".$test_projectRow["sn_surnameTH"];
							}else{
								$vi_nameTh=$test_projectRow["sn_nameTH"]."&nbsp;".$test_projectRow["sn_surnameTH"];
							}
//-----------------------------------------------------------------------------------------------------------------------------
							$vi_sn_key=$test_projectRow["sn_key"];
							$vi_sn_number=$test_projectRow["sn_number"];
							$vi_stu_new_sn_key=$test_projectRow["stu_new_sn_key"];
							$vi_project_test_ptsn_key=$test_projectRow["project_test_ptsn_key"];
							$vi_project_status_ps_no=$test_projectRow["project_status_ps_no"];
						}else{
							$vi_nameTh=null;
							$vi_sn_key=null;
							$vi_sn_number=null;
							$vi_stu_new_sn_key=null;
							$vi_project_test_ptsn_key=null;
							$vi_project_status_ps_no=null;
						}
					}else{
						$vi_nameTh=null;
						$vi_sn_key=null;
						$vi_sn_number=null;
						$vi_stu_new_sn_key=null;
						$vi_project_test_ptsn_key=null;
						$vi_project_status_ps_no=null;						
					}			  		  
				}elseif($stu_project->SPprint_ptsn_status=="OFF"){
					$vi_nameTh=null;
					$vi_sn_key=null;
					$vi_sn_number=null;
					$vi_stu_new_sn_key=null;
					$vi_project_test_ptsn_key=null;
					$vi_project_status_ps_no=null;			
				}else{
					$vi_nameTh=null;
					$vi_sn_key=null;
					$vi_sn_number=null;
					$vi_stu_new_sn_key=null;
					$vi_project_test_ptsn_key=null;
					$vi_project_status_ps_no=null;					
				}
//---------------------------------------------------------					
			if(isset($vi_nameTh)){
				$this->vi_nameTh=$vi_nameTh;
			}else{}
//---------------------------------------------------------	
			if(isset($vi_sn_key)){
				$this->vi_sn_key=$vi_sn_key;
			}else{}
//---------------------------------------------------------					
			if(isset($vi_sn_number)){
				$this->vi_sn_number=$vi_sn_number;
			}else{}
//---------------------------------------------------------					
			if(isset($vi_stu_new_sn_key)){
				$this->vi_stu_new_sn_key=$vi_stu_new_sn_key;
			}else{}
//---------------------------------------------------------					
			if(isset($vi_project_test_ptsn_key)){
				$this->vi_project_test_ptsn_key=$vi_project_test_ptsn_key;
			}else{}
//---------------------------------------------------------				
			if(isset($vi_project_status_ps_no)){
				$this->vi_project_status_ps_no=$vi_project_status_ps_no;
			}else{}
//---------------------------------------------------------	
			$conn_project=null;		
		}function __destruct(){
//---------------------------------------------------------					
			if(isset($this->vi_nameTh)){
				$this->vi_nameTh;
			}else{}
//---------------------------------------------------------	
			if(isset($this->vi_sn_key)){
				$this->vi_sn_key;
			}else{}
//---------------------------------------------------------					
			if(isset($this->vi_sn_number)){
				$this->vi_sn_number;
			}else{}
//---------------------------------------------------------					
			if(isset($this->vi_stu_new_sn_key)){
				$this->vi_stu_new_sn_key;
			}else{}
//---------------------------------------------------------					
			if(isset($this->vi_project_test_ptsn_key)){
				$this->vi_project_test_ptsn_key;
			}else{}
//---------------------------------------------------------				
			if(isset($this->vi_project_status_ps_no)){
				$this->vi_project_status_ps_no;
			}else{}
//---------------------------------------------------------				
		}
	}
?>