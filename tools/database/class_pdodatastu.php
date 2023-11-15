


<?php
	class data_rely{
		public $txt_rely;
		public $dr_key,$dr_txt;
		function __construct($txt_rely){
			$this->txt_rely=$txt_rely;
			$connpdo_datastu=new conntopdo_datastuto("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$relySql="SELECT `dr_key`, `dr_txt` FROM `data_rely` WHERE`dr_key`='{$this->txt_rely}'";
				if($relyRs=$pdo_datastu->query($relySql)){
					$relyRow=$relyRs->Fetch(PDO::FETCH_ASSOC);
					$dr_key=$relyRow["dr_key"];
					$dr_txt=$relyRow["dr_txt"];
				}else{
					$dr_key="";
					$dr_txt="";
				}
					$pdo_datastu=Null;
					$this->dr_key=$dr_key;
					$this->dr_txt=$dr_txt;
		}function __destruct(){
			$this->dr_key;
			$this->dr_txt;
		}
	}

?>




<?php
	class rc_religion{
		public $txt_religion;
		function __construct($txt_religion){
		$this->txt_religion=$txt_religion;
		$connpdo_datastu=new conntopdo_datastuto("mysql");
		$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
		$religionSql="SELECT `IDReligion`,`Religion` FROM `rc_religion` WHERE `IDReligion`='{$this->txt_religion}'";
			if($religionRs=$pdo_datastu->query($religionSql)){
				$religionRow=$religionRs->Fetch(PDO::FETCH_ASSOC);
				$IDReligion=$religionRow["IDReligion"];
				$Religion=$religionRow["Religion"];
			}else{
				$IDReligion="";
				$Religion="";
			}
			$pdo_datastu=Null;
			$this->IDReligion=$IDReligion;
			$this->Religion=$Religion;
		}function __destruct(){
			$this->IDReligion;
			$this->Religion;
		}	
	}
	


?>


<?php
	class db_country{
		public $txt_set;
		function __construct($txt_set){
			$this->txt_set=$txt_set;
			$evaluation_array=array();
			$connpdo_datastu=new conntopdo_datastuto("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$countrySql="SELECT `nation_name_th` FROM `db_country` WHERE `id`='{$this->txt_set}'";
				if($countryRs=$pdo_datastu->query($countrySql)){
					$countryRow=$countryRs->Fetch(PDO::FETCH_ASSOC);
					$nation_name_th=$countryRow["nation_name_th"];
				}else{
					$nation_name_th="";
				}
					$pdo_datastu=Null;
					$this->nation_name_th=$nation_name_th;
		}function __destruct(){
			$this->nation_name_th;
		}			
	}
?>


<?php
//Subdistrict ตำบล
	class data_Subdistrict{
		public $key_Subdistrict;
		function __construct($key_Subdistrict){
			$this->key_Subdistrict=$key_Subdistrict;
			$connpdo_datastu=new conntopdo_datastuto("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$SubdistrictSql="SELECT `DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `DISTRICT_ID`='{$this->key_Subdistrict}'";
			if($SubdistrictRs=$pdo_datastu->query($SubdistrictSql)){
				$SubdistrictRow=$SubdistrictRs->Fetch(PDO::FETCH_ASSOC);
				$DISTRICT_NAME=$SubdistrictRow["DISTRICT_NAME"];
				$DISTRICT_NAME_ENG=$SubdistrictRow["DISTRICT_NAME_ENG"];
			}else{
				
			}
			$pdo_datastu=Null;
				$this->DISTRICT_NAME=$DISTRICT_NAME;
				$this->DISTRICT_NAME_ENG=$DISTRICT_NAME_ENG;
		}function __destruct(){
				$this->DISTRICT_NAME;
				$this->DISTRICT_NAME_ENG;			
		}
		
	}
//Subdistrict

//District อำเภอ
	class data_District{
		public $key_District;
		function __construct($key_District){
			$this->key_District=$key_District;
			$connpdo_datastu=new conntopdo_datastuto("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$DistrictSql="SELECT `AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `AMPHUR_ID`='{$this->key_District}'";
			if($DistrictRs=$pdo_datastu->query($DistrictSql)){
				$DistrictRow=$DistrictRs->Fetch(PDO::FETCH_ASSOC);
				$AMPHUR_NAME=$DistrictRow["AMPHUR_NAME"];
				$AMPHUR_NAME_ENG=$DistrictRow["AMPHUR_NAME_ENG"];
			}else{
				
			}
			$pdo_datastu=Null;
				$this->AMPHUR_NAME=$AMPHUR_NAME;
				$this->AMPHUR_NAME_ENG=$AMPHUR_NAME_ENG;
		}function __destruct(){
				$this->AMPHUR_NAME;
				$this->AMPHUR_NAME_ENG;		
		}
		
	}
//District

//Province จังหวัด
	class data_Province{
		public $key_Province;
		public $PROVINCE_NAME,$PROVINCE_NAME_ENG;
		function __construct($key_Province){
			$this->key_Province=$key_Province;
			$connpdo_datastu=new conntopdo_datastuto("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$ProvinceSql="SELECT `PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces`WHERE`PROVINCE_ID`='{$this->key_Province}'";
			if($ProvinceRs=$pdo_datastu->query($ProvinceSql)){
				$ProvinceRow=$ProvinceRs->Fetch(PDO::FETCH_ASSOC);
				$PROVINCE_NAME=$ProvinceRow["PROVINCE_NAME"];
				$PROVINCE_NAME_ENG=$ProvinceRow["PROVINCE_NAME_ENG"];
			}else{
				
			}
			$pdo_datastu=Null;
			$this->PROVINCE_NAME=$PROVINCE_NAME;
			$this->PROVINCE_NAME_ENG=$PROVINCE_NAME_ENG;
		}function __destruct(){
			$this->PROVINCE_NAME;
			$this->PROVINCE_NAME_ENG;
		}
		
	}
//Province

?>




<?php


//insert_evaluation
	class insert_datastu{
		public $evaluation_sql;
		public $system_insert;
		function __construct($evaluation_sql){
			$this->evaluation_sql=$evaluation_sql;
			
			$connpdo_datastu=new conntopdo_datastuto("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
						
			$sql=$this->evaluation_sql;
			if($pdo_datastu->exec($sql)>0){
				$system_insert="yes";
			}else{
				$system_insert="no";
			}
			unset($pdo_datastu);
			$this->system_insert=$system_insert;
		}
		function __destruct(){
			$this->system_insert;
		}		
		
	}


	class  dateofbirth{
		public $birthdate;
		function __construct($birthdate){
			$this->birthdate=$birthdate;
			$today = date('d-m-Y');
			list($bday,$bmonth,$byear) = explode('-',$this->birthdate);
			list($tday,$tmonth,$tyear) = explode('-',$today);
				if($byear < 1970){
					$yearad = 1970 - $byear;
					$byear = 1970;
				}else{
					$yearad = 0;
				}
			$mbirth = mktime(0,0,0, $bmonth,$bday,$byear);
			$mtoday = mktime(0,0,0, $tmonth,$tday,$tyear);
			
			$mage = ($mtoday - $mbirth);
			$wyear = (date('Y', $mage)-1970+$yearad);
			$wmonth = (date('m', $mage)-1);
			$wday = (date('d', $mage)-1);
			
			$ystr = ($wyear > 1 ? " ปี" : " ปี");
			$mstr = ($wmonth > 1 ? " เดือน" : " เดือน");
			$dstr = ($wday > 1 ? " วัน" : " วัน");
			
			if($wyear > 0 && $wmonth > 0 && $wday > 0) {
				$agestr = $wyear.$ystr." ".$wmonth.$mstr." ".$wday.$dstr;
			}else if($wyear == 0 && $wmonth == 0 && $wday > 0) {
				$agestr = $wday.$dstr;
				//$wyear=0;
				//$wmonth=0;
			}else if($wyear > 0 && $wmonth > 0 && $wday == 0) {
				$agestr = $wyear.$ystr." ".$wmonth.$mstr;
				//$wday=0;
			}else if($wyear == 0 && $wmonth > 0 && $wday > 0) {
				$agestr = $wmonth.$mstr." ".$wday.$dstr;
				//$wyear=0;
			}else if($wyear > 0 && $wmonth == 0 && $wday > 0) {
				$agestr = $wyear.$ystr." ".$wday.$dstr;
				//$wmonth=0;
			}else if($wyear == 0 && $wmonth > 0 && $wday == 0) {
				$agestr = $wmonth.$mstr;
				//$wyear=0;
				//$wday=0;
			}else {
				$agestr ="";
				//$wyear="";
				//$wmonth="";
				//$wday="";
			}
			$this->wyear=$wyear;
			$this->wmonth=$wmonth;
			$this->wday=$wday;
			$this->ystr=$ystr;
			$this->agestr=$agestr;
		}function __destruct(){
			$this->wyear;
			$this->wmonth;
			$this->wday;
			$this->ystr;
			$this->agestr;			
		}
	} 

	class income{
		public $txt_income;
		function __construct($txt_income){
			$this->txt_income=$txt_income;
			if($this->txt_income==1){
				$print_income="ต่ำกว่า 15,000";
			}elseif($this->txt_income==2){
				$print_income="15,001-30,000";
			}elseif($this->txt_income==3){
				$print_income="30,001-50,000";
			}elseif($this->txt_income==4){
				$print_income="มากกว่า 50,000";
			}elseif($this->txt_income==5){
				$print_income="ไม่มีรายได้";
			}else{
				$print_income="";
			}
			$this->print_income=$print_income;
		}function __destruct(){
			$this->print_income;
		}
	}

		class notrow_datastu{
			public $txt_datastu;
			function __construct($txt_datastu){
				$this->txt_datastu=$txt_datastu;
				$datastu_array=array();
				$connpdo_datastu=new conntopdo_datastuto("mysql");
				$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
				$datastu_sql=$this->txt_datastu;
					if($datastu_rs=$pdo_datastu->query($datastu_sql)){
						$datastu_row=$datastu_rs->Fetch(PDO::FETCH_ASSOC);
						$datastu_array[]=$datastu_row;
					}else{
				
					}
						$pdo_datastu=Null;
						$this->datastu_array=$datastu_array;				
				}function __destruct(){
					$this->datastu_array;
			}
		}		
		
			class  row_datastu{
			public $txt_datastu;
			function __construct($txt_datastu){
				$this->txt_datastu=$txt_datastu;
				$datastu_array=array();
				$connpdo_datastu=new conntopdo_datastuto("mysql");
				$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
				$datastu_sql=$this->txt_datastu;
					if($datastu_rs=$pdo_datastu->query($datastu_sql)){
						while($datastu_row=$datastu_rs->Fetch(PDO::FETCH_ASSOC)){
							$datastu_array[]=$datastu_row;
						}  
					}else{
				
					}
						$pdo_datastu=Null;
						$this->datastu_array=$datastu_array;				
				}function __destruct(){
					$this->datastu_array;
			}
		}
?>