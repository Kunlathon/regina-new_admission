<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php
//print_plan->pdo
	class print_plan{
		public $plan;
		function __construct($plan){
			$this->plan=$plan;
			$connpdo_eveluation=new conntopdo_evaluationto("mysql");
			$pdo_eveluation=$connpdo_eveluation->getconnto_evaluationto_evaluationect();
			$plan_sql="SELECT `Name`,`LName` FROM `rc_plan` WHERE `IDPlan`='{$this->plan}'";
			if($plan_rs=$pdo_eveluation->query($plan_sql)){
				$plan_row=$plan_rs->Fetch(PDO::FETCH_ASSOC);
				$plan_Name=$plan_row["Name"];
				$plan_LName=$plan_row["LName"];
			}else{
				$plan_Name="";
				$plan_LName="";
			}
			$pdo_eveluation=Null;
			$this->plan_Name=$plan_Name;
			$this->plan_LName=$plan_LName;
		}
		function __destruct(){
			$this->plan_Name;
			$this->plan_LName;
		}
	}

//print_prefix->pdo
	class print_prefix{
		public $prefix;
		function __construct($prefix){
			$this->prefix=$prefix;
			$connpdo_eveluation=new conntopdo_evaluationto("mysql");
			$pdo_eveluation=$connpdo_eveluation->getconnto_evaluationto_evaluationect();
			$prefix_sql="SELECT `prefixname`,`prefix_SName`,`prefix_EName` FROM `rc_prefix` WHERE `IDPrefix`='{$this->prefix}'";
			if($prefix_rs=$pdo_eveluation->query($prefix_sql)){
				$prefix_row=$prefix_rs->Fetch(PDO::FETCH_ASSOC);
				$prefix_prefixname=$prefix_row["prefixname"];
				$prefix_prefix_SName=$prefix_row["prefix_SName"];
				$prefix_prefix_EName=$prefix_row["prefix_EName"];
			}else{
				$prefix_prefixname="";
				$prefix_prefix_SName="";
				$prefix_prefix_EName="";
			}
			$pdo_eveluation=Null;
			$this->prefix_prefixname=$prefix_prefixname;
			$this->prefix_prefix_SName=$prefix_prefix_SName;
			$this->prefix_prefix_EName=$prefix_prefix_EName;
		}
		function __destruct(){
			$this->prefix_prefixname;
			$this->prefix_prefix_SName;
			$this->prefix_prefix_EName;
		}
	}

//data_sturoom->pdo
	class data_sturoom{
		public $sr_t;
		public $sr_y;
		public $sr_l;
		public $sr_r;
		function __construct($sr_t,$sr_y,$sr_l,$sr_r){
			$this->sr_t=$sr_t;
			$this->sr_y=$sr_y;
			$this->sr_l=$sr_l;
			$this->sr_r=$sr_r; 
			$connpdo_eveluation=new conntopdo_evaluationto("mysql");
			$pdo_eveluation=$connpdo_eveluation->getconnto_evaluationto_evaluationect();
			$printdata_sturoom=array();	
			$sturoom_sql="select `regina_stu_data`.`rsd_studentid`,`regina_stu_data`.`rsd_Identification`,`regina_stu_data`.`rsd_prefix` ,`regina_stu_data`.`rsd_name`
						,`regina_stu_data`.`rsd_surname`,`regina_stu_data`.`rsd_nameEn`,`regina_stu_data`.`rsd_surnameEn` ,`regina_stu_class`.`rsc_year`
						,`regina_stu_class`.`rsc_term`,`regina_stu_class`.`rsc_plan`,`regina_stu_class`.`rsc_class` ,`regina_stu_class`.`rsc_room`
						,`regina_stu_class`.`rsc_num` from `regina_stu_class` join `regina_stu_data` on(`regina_stu_class`.`rsd_studentid`=`regina_stu_data`.`rsd_studentid`) 
						where `regina_stu_class`.`rsc_term`='{$this->sr_t}' 
						and `regina_stu_class`.`rsc_year`='{$this->sr_y}' 
						and `regina_stu_class`.`rsc_class`='{$this->sr_l}' 
						and `regina_stu_class`.`rsc_room`='{$this->sr_r}' 
						ORDER BY `regina_stu_class`.`rsc_num` ASC";
			if($sturoom_rs=$pdo_eveluation->query($sturoom_sql)){
				while($sturoom_row=$sturoom_rs->Fetch(PDO::FETCH_ASSOC)){
					$printdata_sturoom[]=$sturoom_row;
				}
			}else{
				
			}
			$pdo_eveluation=Null;
			$this->printdata_sturoom=$printdata_sturoom;
		}
		function __destruct(){
			$this->printdata_sturoom;
		}
	} 

	class print_level{
		public $level_id;
		function __construct($level_id){
			
			$this->level_id=$level_id;
			$connpdo_evaluation=new conntopdo_evaluationto("mysql");
			$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();
			
			$level_sql="SELECT * FROM `rc_level` WHERE `IDLevel` = '{$this->level_id}'";
			if($level_rs=$pdo_evaluation->query($level_sql)){
				$level_row=$level_rs->Fetch(PDO::FETCH_ASSOC);
				$set_IDLevel=$level_row["IDLevel"];
				$set_PLevel=$level_row["PLevel"];
				$set_Sort_name=$level_row["Sort_name"];
				$set_Sort_name_E=$level_row["Sort_name_E"];
				$set_Sort_name_E2=$level_row["Sort_name_E2"];
				$set_Lname=$level_row["Lname"];
			}else{
				$set_IDLevel="";
				$set_PLevel="";
				$set_Sort_name="";
				$set_Sort_name_E="";
				$set_Sort_name_E2="";
				$set_Lname="";
			}
			$this->set_IDLevel=$set_IDLevel;
			$this->set_PLevel=$set_PLevel;
			$this->set_Sort_name=$set_Sort_name;
			$this->set_Sort_name_E=$set_Sort_name_E;
			$this->set_Sort_name_E2=$set_Sort_name_E2;
			$this->set_Lname=$set_Lname;
			$pdo_evaluation=Null;
		}function __destruct(){
			$this->set_IDLevel;
			$this->set_PLevel;
			$this->set_Sort_name;
			$this->set_Sort_name_E;
			$this->set_Sort_name_E2;
			$this->set_Lname;
		}
	}


//regina_stu_data
	class regina_stu_data{
		public $stu_id;
		
		function __construct($stu_id){
			$this->stu_id=$stu_id;
			$connpdo_evaluation=new conntopdo_evaluationto("mysql");
			$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();
			$regina_stu_dataSql="SELECT `rsd_studentid`, `rsd_Identification`, `rsd_prefix`, `rsd_name`, `rsd_surname`, `rsd_nameEn`, `rsd_surnameEn`,  `rse_student_status`, `rse_studentimg`, `rse_home` 
								 FROM `regina_stu_data` WHERE`rsd_studentid`='{$this->stu_id}'";
			if($regina_stu_dataRs=$pdo_evaluation->query($regina_stu_dataSql)){
				$regina_stu_dataRow=$regina_stu_dataRs->Fetch(PDO::FETCH_ASSOC);
				$rsd_studentid=$regina_stu_dataRow["rsd_studentid"];
				$rsd_Identification=$regina_stu_dataRow["rsd_Identification"];
				$sd_prefix=$regina_stu_dataRow["rsd_prefix"];
				$rsd_name=$regina_stu_dataRow["rsd_name"];
				$rsd_surname=$regina_stu_dataRow["rsd_surname"];
			}else{
				$rsd_studentid="";
				$rsd_Identification="";
				$sd_prefix="";
				$rsd_name="";
				$rsd_surname="";
			}
			$this->rsd_studentid=$rsd_studentid;
			$this->rsd_Identification=$rsd_Identification;
			$this->sd_prefix=$sd_prefix;
			$this->rsd_name=$rsd_name;
			$this->rsd_surname=$rsd_surname;
			$pdo_evaluation=Null;
		}function __destruct(){
			$this->rsd_studentid;
			$this->rsd_Identification;
			$this->sd_prefix;
			$this->rsd_name;
			$this->rsd_surname;
		}
	}




//supplementary_subject
	class supplementary_subject{
		public $txt_ss_t;
		public $txt_ss_l;
		public $txt_ss_year;
		
		function __construct($txt_ss_t,$txt_ss_l,$txt_ss_year){
			$this->txt_ss_t=$txt_ss_t;
			$this->txt_ss_l=$txt_ss_l;
			$this->txt_ss_year=$txt_ss_year;
			$subjectarray=array();
			$connpdo_evaluation=new conntopdo_evaluationto("mysql");
			$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();			
			$supplementary_subjectSql="SELECT `ss_id`, `ss_t`, `ss_l`, `ss_year`, `ss_txtth`, `ss_txten`,  `ss_plan`, `ss_rc` 
									   FROM `supplementary_subject` 
									   WHERE `ss_t`='{$this->txt_ss_t}' 
									   AND `ss_l`='{$this->txt_ss_l}' 
									   AND `ss_year`='{$this->txt_ss_year}'";
			if($supplementary_subjectRs=$pdo_evaluation->query($supplementary_subjectSql)){
				while($supplementary_subjectRow=$supplementary_subjectRs->Fetch(PDO::FETCH_ASSOC)){
					$subjectarray[]=$supplementary_subjectRow;
				}
			}else{
				
			}
			$this->subjectarray=$subjectarray;
			$pdo_evaluation=Null;
		}function __destruct(){
			$this->subjectarray;
		}
	}



//insert_evaluation
	class insert_evaluation{
		public $evaluation_sql;
		function __construct($evaluation_sql){
			$this->evaluation_sql=$evaluation_sql;
			
			$connpdo_evaluation=new conntopdo_evaluationto("mysql");
			$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();
						
			$sql=$this->evaluation_sql;
			if($pdo_evaluation->exec($sql)>0){
				$system_insert="yes";
			}else{
				$system_insert="no";
			}
			unset($pdo_evaluation);
			$this->system_insert=$system_insert;
		}
		function __destruct(){
			$this->system_insert;
		}		
		
	}














//supplementary_daysubject
	class supplementary_daysubject{
		public $supplementary_ssid;
		
		function __construct($supplementary_ssid){
			$this->supplementary_ssid=$supplementary_ssid;
			$connpdo_evaluation=new conntopdo_evaluationto("mysql");
			$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();
			$supple_daysubjectSql="SELECT * 
			                       FROM `supplementary_daysubject` WHERE`ss_id`='{$this->supplementary_ssid}'";
			if($supple_daysubjectRs=$pdo_evaluation->query($supple_daysubjectSql)){
				$supple_daysubjectRow=$supple_daysubjectRs->Fetch(PDO::FETCH_ASSOC);
				$sds_key=$supple_daysubjectRow["sds_key"];
				$sds_mon=$supple_daysubjectRow["sd_mon"];
				$sds_tue=$supple_daysubjectRow["sd_tue"];
				$sds_wed=$supple_daysubjectRow["sd_wed"];
				$sds_thu=$supple_daysubjectRow["sd_thu"];
				$sds_frl=$supple_daysubjectRow["sd_frl"];
				$sds_sat=$supple_daysubjectRow["sd_sat"];
				$sds_sun=$supple_daysubjectRow["sd_sun"];
				$sss_id=$supple_daysubjectRow["ss_id"];
			}else{
				$sds_key="";
				$sds_mon="";
				$sds_tue="";
				$sds_wed="";
				$sds_thu="";
				$sds_frl="";
				$sds_sat="";
				$sds_sun="";
				$sss_id="";				
			}
			$this->sds_key=$sds_key;
			$this->sds_mon=$sds_mon;
			$this->sds_tue=$sds_tue;
			$this->sds_wed=$sds_wed;
			$this->sds_thu=$sds_thu;
			$this->sds_frl=$sds_frl;
			$this->sds_sat=$sds_sat;
			$this->sds_sun=$sds_sun;
			$this->sss_id=$sss_id;
			$pdo_evaluation=Null;
		}function __destruct(){
			$this->sds_key;
			$this->sds_mon;
			$this->sds_tue;
			$this->sds_wed;
			$this->sds_thu;
			$this->sds_frl;
			$this->sds_sat;
			$this->sds_sun;
			$this->sss_id;
		}
		
	}



//print_supplementary_day
	class supplementary_day{
		
		function __construct(){
			//$supple_arrayday=array();
			$connpdo_evaluation=new conntopdo_evaluationto("mysql");
			$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();
			$supplementary_daySql="SELECT `sd_key`, `sd_mon`, `sd_tue`, `sd_wed`, `sd_thu`, `sd_frl`, `sd_sat`, `sd_sun` FROM `supplementary_day`";
			if($supplementary_dayRs=$pdo_evaluation->query($supplementary_daySql)){
				$supplementary_dayRow=$supplementary_dayRs->Fetch(PDO::FETCH_ASSOC);
				$sd_key=$supplementary_dayRow["sd_key"];
				$sd_mon=$supplementary_dayRow["sd_mon"];
				$sd_tue=$supplementary_dayRow["sd_tue"];
				$sd_wed=$supplementary_dayRow["sd_wed"];
				$sd_thu=$supplementary_dayRow["sd_thu"];
				$sd_frl=$supplementary_dayRow["sd_frl"];
				$sd_sat=$supplementary_dayRow["sd_sat"];
				$sd_sun=$supplementary_dayRow["sd_sun"];
			}else{
				$sd_key="";
				$sd_mon="";
				$sd_tue="";
				$sd_wed="";
				$sd_thu="";
				$sd_frl="";
				$sd_sat="";
				$sd_sun="";
			}
				$this->sd_key=$sd_key;
				$this->sd_mon=$sd_mon;
				$this->sd_tue=$sd_tue;
				$this->sd_wed=$sd_wed;
				$this->sd_thu=$sd_thu;
				$this->sd_frl=$sd_frl;
				$this->sd_sat=$sd_sat;
				$this->sd_sun=$sd_sun;
				$pdo_evaluation=Null;
		}function __destruct(){
			$this->sd_key;
			$this->sd_mon;
			$this->sd_tue;
			$this->sd_wed;
			$this->sd_thu;
			$this->sd_frl;
			$this->sd_sat;
			$this->sd_sun;
		}
	}




//stu_level
	class stu_levelpdo{
		public $stu_id;
		public $stu_year;
		public $stu_term;
		
		function __construct($stu_id,$stu_year,$stu_term){
			$this->stu_id=$stu_id;
			$this->stu_year=$stu_year;
			$this->stu_term=$stu_term;
			$connpdo_evaluation=new conntopdo_evaluationto("mysql");
			$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();
			$stu_levelsql="select `regina_stu_class`.`rsd_studentid`,`rc_level`.`IDLevel`,`rc_level`.`Sort_name`,`rc_level`.`Lname`
						 ,`rc_plan`.`Name`as `planname`,`regina_stu_class`.`rsc_room`,`regina_stu_class`.`rsc_num`,`regina_stu_class`.`rsc_plan`
						   from `regina_stu_class` join `rc_level` on(`rc_level`.`IDLevel`=`regina_stu_class`.`rsc_class`)
						   join `rc_plan` on(`regina_stu_class`.`rsc_plan`=`rc_plan`.`IDPlan`)
						   where `regina_stu_class`.`rsc_year`='{$this->stu_year}'
						   and `regina_stu_class`.`rsc_term`='{$this->stu_term}'
						   and `regina_stu_class`.`rsd_studentid`='{$this->stu_id}'";
			if($stu_levelRs=$pdo_evaluation->query($stu_levelsql)){
				$stu_levelRow=$stu_levelRs->Fetch(PDO::FETCH_ASSOC);
				$this->rsd_studentid=$stu_levelRow["rsd_studentid"];
				$this->IDLevel=$stu_levelRow["IDLevel"];
				$this->Sort_name=$stu_levelRow["Sort_name"];
				$this->Lname=$stu_levelRow["Lname"];
				$this->planname=$stu_levelRow["planname"];
				$this->rsc_room=$stu_levelRow["rsc_room"];
				$this->rsc_num=$stu_levelRow["rsc_num"];
				$this->rc_plan=$stu_levelRow["rsc_plan"];				
			}else{
				$this->rsd_studentid="";
				$this->IDLevel="";
				$this->Sort_name="";
				$this->Lname="";
				$this->planname="";
				$this->rsc_room="";
				$this->rsc_num="";
				$this->rc_plan="";
			}
			$pdo_evaluation=Null;
		}	function __destruct(){
			$this->rsd_studentid;
			$this->IDLevel;
			$this->Sort_name;
			$this->Lname;
			$this->planname;
			$this->rsc_room;
			$this->rsc_num;
			$this->rc_plan;			
		}
			
	}

//stu_level End


//rc_advisor
	class rc_advisor{
		public $txt_YearEdu;
		public $txt_IDLevel;
		public $txt_Room;
		function __construct($txt_YearEdu,$txt_IDLevel,$txt_Room){
			$this->txt_YearEdu=$txt_YearEdu;
			$this->txt_IDLevel=$txt_IDLevel;
			$this->txt_Room=$txt_Room;
			$advisor_array=array();
			$connpdo_evaluation=new conntopdo_evaluationto("mysql");
			$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();			
			$advisor_sql="select `rc_person`.`IDTeacher`,`rc_prefix`.`prefixname`,`rc_person`.`FName`,`rc_person`.`SName` ,`rc_level`.`IDLevel`
						  from `rc_advisor` 
						  join `rc_level` on (`rc_advisor`.`IDLevel`=`rc_level`.`IDLevel`) 
						  join `rc_person` on (`rc_person`.`IDTeacher`=`rc_advisor`.`IDPerson`) 
						  join `rc_prefix` on (`rc_person`.`IDPrefix`=`rc_prefix`.`IDPrefix`) 
						  where `rc_advisor`.`YearEdu`='{$this->txt_YearEdu}' 
						  and `rc_advisor`.`IDLevel`='{$this->txt_IDLevel}' 
						  and `rc_advisor`.`Room`='{$this->txt_Room}' 
						  ORDER BY `rc_advisor`.`Status` DESC";
						  
			if($advisor_rs=$pdo_evaluation->query($advisor_sql)){
				while($advisor_row=$advisor_rs->Fetch(PDO::FETCH_ASSOC)){
					$advisor_array[]=$advisor_row;
				}
			}else{
				
			}
			$pdo_evaluation=Null;
			$this->advisor_array=$advisor_array;
		}function __destruct(){
			$this->advisor_array;
		}
	}


			class notrow_evaluation{
			public $txt_evaluation;
			function __construct($txt_evaluation){
				$this->txt_evaluation=$txt_evaluation;
				$evaluation_array=array();
				$connpdo_evaluation=new conntopdo_evaluationto("mysql");
				$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();
				$evaluation_sql=$this->txt_evaluation;
					if($evaluation_rs=$pdo_evaluation->query($evaluation_sql)){
						$evaluation_row=$evaluation_rs->Fetch(PDO::FETCH_ASSOC);
						$evaluation_array[]=$evaluation_row;
					}else{
				
					}
						$pdo_evaluation=Null;
						$this->evaluation_array=$evaluation_array;				
				}function __destruct(){
					$this->evaluation_array;
			}
		}			
		
		class row_evaluation{
			public $txt_evaluation;
			function __construct($txt_evaluation){
				$this->txt_evaluation=$txt_evaluation;
				$evaluation_array=array();
				$connpdo_evaluation=new conntopdo_evaluationto("mysql");
				$pdo_evaluation=$connpdo_evaluation->getconnto_evaluationto_evaluationect();
				$evaluation_sql=$this->txt_evaluation;
					if($evaluation_rs=$pdo_evaluation->query($evaluation_sql)){
						while($evaluation_row=$evaluation_rs->Fetch(PDO::FETCH_ASSOC)){
							$evaluation_array[]=$evaluation_row;							
						}
					}else{
				
					}
						$pdo_evaluation=Null;
						$this->evaluation_array=$evaluation_array;				
				}function __destruct(){
					$this->evaluation_array;
			}
		}
?>