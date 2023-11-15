<?php error_reporting(error_reporting() & ~E_NOTICE); ?>
<?php

//data_career
  class data_career_sw{
    public $career_key;
    public $dc_key,$dc_txt,$dc_txt2;
    function __construct($career_key){
      $this->career_key=$career_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$data_careerSql="SELECT `dc_key`, `dc_txt`, `dc_txt2` FROM `data_career` WHERE `dc_key`='{$this->career_key}';";
			if($data_careerRs=$pdo_datastu->query($data_careerSql)){
			   $data_careerRow=$data_careerRs->Fetch(PDO::FETCH_ASSOC);
         $dc_key=$data_careerRow["dc_key"];
         $dc_txt=$data_careerRow["dc_txt"];
         $dc_txt2=$data_careerRow["dc_txt2"];
			}else{
         $dc_key=Null;
         $dc_txt=Null;
         $dc_txt2=Null;
			}
			$pdo_datastu=Null;
         $this->dc_key=$dc_key;
         $this->dc_txt=$dc_txt;
         $this->dc_txt2=$dc_txt2;
    }
    function __destruct(){
         $this->dc_key;
         $this->dc_txt;
         $this->dc_txt2;
		}
  }

//data_incom
  class data_incom_sw{
    public $incom_key;
    public $di_key,$di_txt;
    function __construct($incom_key){
      $this->incom_key=$incom_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$data_incomSql="SELECT `di_key`, `di_txt` FROM `data_incom` WHERE `di_key`='{$this->incom_key}';";
			if($data_incomRs=$pdo_datastu->query($data_incomSql)){
			   $data_incomRow=$data_incomRs->Fetch(PDO::FETCH_ASSOC);
         $di_key=$data_incomRow["di_key"];
         $di_txt=$data_incomRow["di_txt"];
			}else{
         $di_key=Null;
         $di_txt=Null;
			}
			$pdo_datastu=Null;
      $this->di_key=$di_key;
      $this->di_txt=$di_txt;
    }
    function __destruct(){
      $this->di_key;
      $this->di_txt;
		}
  }

//data_study
  class data_study_sw{
    public $data_study;
    public $study_id,$study_txt;
    function __construct($data_study){
      $this->data_study=$data_study;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$data_studySql="SELECT `study_id`, `study_txt` FROM `data_study` WHERE `study_id`='{$this->data_study}';";
			if($data_studyRs=$pdo_datastu->query($data_studySql)){
			   $data_studyRow=$data_studyRs->Fetch(PDO::FETCH_ASSOC);
         $study_id=$data_studyRow["study_id"];
         $study_txt=$data_studyRow["study_txt"];
			}else{
         $study_id=Null;
         $study_txt=Null;
			}
			$pdo_datastu=Null;
      $this->study_id=$study_id;
      $this->study_txt=$study_txt;
    }
    function __destruct(){
      $this->study_id;
      $this->study_txt;
		}
  }




//print stu_father
  class stu_father_sw{
    public $stu_key;
    public $father_prefix,$father_fname,$father_sname,$father_prefix_en,$father_fname_en,$father_sname_en,$father_code,$sf_blood,$sf_nation,$sf_sun,$sf_IDReligion,$af_birthday,$father_career,$father_study,$father_careerOther,$father_salary,$father_workplace,$father_wp_pro,$father_wp_tel,$father_phone;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_fatherSql="SELECT  `father_prefix`, `father_fname`, `father_sname`, `father_prefix_en`, `father_fname_en`, `father_sname_en`, `father_code`, `sf_blood`, `sf_nation`, `sf_sun`, `sf_IDReligion`, `af_birthday`, `father_career`, `father_study`, `father_careerOther`, `father_salary`, `father_workplace`, `father_wp_pro`, `father_wp_tel`, `father_phone` FROM `stu_father` WHERE`stu_id`='{$this->stu_key}';";
			if($stu_fatherRs=$pdo_datastu->query($stu_fatherSql)){
			   $stu_fatherRow=$stu_fatherRs->Fetch(PDO::FETCH_ASSOC);
         $father_prefix=$stu_fatherRow["father_prefix"];
         $father_fname=$stu_fatherRow["father_fname"];
         $father_sname=$stu_fatherRow["father_sname"];
         $father_prefix_en=$stu_fatherRow["father_prefix_en"];
         $father_fname_en=$stu_fatherRow["father_fname_en"];
         $father_sname_en=$stu_fatherRow["father_sname_en"];
         $father_code=$stu_fatherRow["father_code"];
         $sf_blood=$stu_fatherRow["sf_blood"];
         $sf_nation=$stu_fatherRow["sf_nation"];
         $sf_sun=$stu_fatherRow["sf_sun"];
         $sf_IDReligion=$stu_fatherRow["sf_IDReligion"];
         $af_birthday=$stu_fatherRow["af_birthday"];
         $father_career=$stu_fatherRow["father_career"];
         $father_study=$stu_fatherRow["father_study"];
         $father_careerOther=$stu_fatherRow["father_careerOther"];
         $father_salary=$stu_fatherRow["father_salary"];
         $father_workplace=$stu_fatherRow["father_workplace"];
         $father_wp_pro=$stu_fatherRow["father_wp_pro"];
         $father_wp_tel=$stu_fatherRow["father_wp_tel"];
         $father_phone=$stu_fatherRow["father_phone"];
			}else{
    	   $father_prefix=Null;
         $father_fname=Null;
         $father_sname=Null;
         $father_prefix_en=Null;
         $father_fname_en=Null;
         $father_sname_en=Null;
         $father_code=Null;
         $sf_blood=Null;
         $sf_nation=Null;
         $sf_sun=Null;
         $sf_IDReligion=Null;
         $af_birthday=Null;
         $father_career=Null;
         $father_study=Null;
         $father_careerOther=Null;
         $father_salary=Null;
         $father_workplace=Null;
         $father_wp_pro=Null;
         $father_wp_tel=Null;
         $father_phone=Null;
			}
			$pdo_datastu=Null;
	       $this->father_prefix=$father_prefix;
         $this->father_fname=$father_fname;
         $this->father_sname=$father_sname;
         $this->father_prefix_en=$father_prefix_en;
         $this->father_fname_en=$father_fname_en;
         $this->father_sname_en=$father_sname_en;
         $this->father_code=$father_code;
         $this->sf_blood=$sf_blood;
         $this->sf_nation=$sf_nation;
         $this->sf_sun=$sf_sun;
         $this->sf_IDReligion=$sf_IDReligion;
         $this->af_birthday=$af_birthday;
         $this->father_career=$father_career;
         $this->father_study=$father_study;
         $this->father_careerOther=$father_careerOther;
         $this->father_salary=$father_salary;
         $this->father_workplace=$father_workplace;
         $this->father_wp_pro=$father_wp_pro;
         $this->father_wp_tel=$father_wp_tel;
         $this->father_phone=$father_phone;
    }
    function __destruct(){
	       $this->father_prefix;
         $this->father_fname;
         $this->father_sname;
         $this->father_prefix_en;
         $this->father_fname_en;
         $this->father_sname_en;
         $this->father_code;
         $this->sf_blood;
         $this->sf_nation;
         $this->sf_sun;
         $this->sf_IDReligion;
         $this->af_birthday;
         $this->father_career;
         $this->father_study;
         $this->father_careerOther;
         $this->father_salary;
         $this->father_workplace;
         $this->father_wp_pro;
         $this->father_wp_tel;
         $this->father_phone;
		}
  }

//print stu_father_address
  class stu_father_address_sw{
     public $stu_key;
     public $father_hno,$father_moo,$father_soi,$father_road,$father_tumbon,$father_amphur,$father_province,$father_zipcode;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_father_addressSql="SELECT  `father_hno`, `father_moo`, `father_soi`, `father_road`, `father_tumbon`, `father_amphur`, `father_province`, `father_zipcode` FROM `stu_father_address` WHERE `stu_id`='{$this->stu_key}'";
			if($stu_father_addressRs=$pdo_datastu->query($stu_father_addressSql)){
			   $stu_father_addressRow=$stu_father_addressRs->Fetch(PDO::FETCH_ASSOC);
	       $father_hno=$stu_father_addressRow["father_hno"];
         $father_moo=$stu_father_addressRow["father_moo"];
         $father_soi=$stu_father_addressRow["father_soi"];
         $father_road=$stu_father_addressRow["father_road"];
         $father_tumbon=$stu_father_addressRow["father_tumbon"];
         $father_amphur=$stu_father_addressRow["father_amphur"];
         $father_province=$stu_father_addressRow["father_province"];
         $father_zipcode=$stu_father_addressRow["father_zipcode"];
			}else{
	       $father_hno=Null;
         $father_moo=Null;
         $father_soi=Null;
         $father_road=Null;
         $father_tumbon=Null;
         $father_amphur=Null;
         $father_province=Null;
         $father_zipcode=Null;
			}
			$pdo_datastu=Null;
        $this->father_hno=$father_hno;
        $this->father_moo=$father_moo;
        $this->father_soi=$father_soi;
        $this->father_road=$father_road;
        $this->father_tumbon=$father_tumbon;
        $this->father_amphur=$father_amphur;
        $this->father_province=$father_province;
        $this->father_zipcode=$father_zipcode;
    }
    function __destruct(){
        $this->father_hno;
        $this->father_moo;
        $this->father_soi;
        $this->father_road;
        $this->father_tumbon;
        $this->father_amphur;
        $this->father_province;
        $this->father_zipcode;
		}
    
  }
//print_stu_father_addword
  class stu_father_addword_sw{
    public $stu_key;
    public $father_addwordhno,$father_addwordmoo,$father_addwordsoi,$father_addwordroad,$father_addwordtumbon,$father_addwordamphur,$father_addwordprovince,$father_addwordzipcode,$father_addwordphone;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_father_addwordSql="SELECT `father_addwordhno`, `father_addwordmoo`, `father_addwordsoi`, `father_addwordroad`, `father_addwordtumbon`, `father_addwordamphur`, `father_addwordprovince`, `father_addwordzipcode`, `father_addwordphone` FROM `stu_father_addword` WHERE`stu_id`='{$this->stu_key}';";
			if($stu_father_addwordRs=$pdo_datastu->query($stu_father_addwordSql)){
			   $stu_father_addwordRow=$stu_father_addwordRs->Fetch(PDO::FETCH_ASSOC);
	       $father_addwordhno=$stu_father_addwordRow["father_addwordhno"];
         $father_addwordmoo=$stu_father_addwordRow["father_addwordmoo"];
         $father_addwordsoi=$stu_father_addwordRow["father_addwordsoi"];
         $father_addwordroad=$stu_father_addwordRow["father_addwordroad"];
         $father_addwordtumbon=$stu_father_addwordRow["father_addwordtumbon"];
         $father_addwordamphur=$stu_father_addwordRow["father_addwordamphur"];
         $father_addwordprovince=$stu_father_addwordRow["father_addwordprovince"];
         $father_addwordzipcode=$stu_father_addwordRow["father_addwordzipcode"];
         $father_addwordphone=$stu_father_addwordRow["father_addwordphone"];

			}else{
	       $father_addwordhno=Null;
         $father_addwordmoo=Null;
         $father_addwordsoi=Null;
         $father_addwordroad=Null;
         $father_addwordtumbon=Null;
         $father_addwordamphur=Null;
         $father_addwordprovince=Null;
         $father_addwordzipcode=Null;
         $father_addwordphone=Null;
			}
   			 $pdo_datastu=Null;
         $this->father_addwordhno=$father_addwordhno;
         $this->father_addwordmoo=$father_addwordmoo;
         $this->father_addwordsoi=$father_addwordsoi;
         $this->father_addwordroad=$father_addwordroad;
         $this->father_addwordtumbon=$father_addwordtumbon;
         $this->father_addwordamphur=$father_addwordamphur;
         $this->father_addwordprovince=$father_addwordprovince;
         $this->father_addwordzipcode=$father_addwordzipcode;
         $this->father_addwordphone=$father_addwordphone;
    }
    function __destruct(){
         $this->father_addwordhno;
         $this->father_addwordmoo;
         $this->father_addwordsoi;
         $this->father_addwordroad;
         $this->father_addwordtumbon;
         $this->father_addwordamphur;
         $this->father_addwordprovince;
         $this->father_addwordzipcode;
         $this->father_addwordphone;
		}
  }

//print stu_mother
  class stu_mother_sw{
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_motherSql="SELECT  `mother_prefix`, `mother_fname`, `mother_sname`, `mother_prefix_en`, `mother_fname_en`, `mother_sname_en`, `mother_code`, `mother_blood`, `mother_nation`, `mother_sun`, `mother_IDReligion`, `mother_birthday`, `mother_career`, `mother_careerOther`, `mother_study`, `mother_salary`, `mother_workplace`, `mother_wp_pro`, `mother_wp_tel`, `mother_phone` FROM `stu_mother` WHERE `stu_id`='{$this->stu_key}';";
			if($stu_motherRs=$pdo_datastu->query($stu_motherSql)){
			    $stu_motherRow=$stu_motherRs->Fetch(PDO::FETCH_ASSOC);
      	  $mother_prefix=$stu_motherRow["mother_prefix"];
          $mother_fname=$stu_motherRow["mother_fname"];
          $mother_sname=$stu_motherRow["mother_sname"];
          $mother_prefix_en=$stu_motherRow["mother_prefix_en"];
          $mother_fname_en=$stu_motherRow["mother_fname_en"];
          $mother_sname_en=$stu_motherRow["mother_sname_en"];
          $mother_code=$stu_motherRow["mother_code"];
          $mother_blood=$stu_motherRow["mother_blood"];
          $mother_nation=$stu_motherRow["mother_nation"];
          $mother_sun=$stu_motherRow["mother_sun"];
          $mother_IDReligion=$stu_motherRow["mother_IDReligion"];
          $mother_birthday=$stu_motherRow["mother_birthday"];
          $mother_career=$stu_motherRow["mother_career"];
          $mother_careerOther=$stu_motherRow["mother_careerOther"];
          $mother_study=$stu_motherRow["mother_study"];
          $mother_salary=$stu_motherRow["mother_salary"];
          $mother_workplace=$stu_motherRow["mother_workplace"];
          $mother_wp_pro=$stu_motherRow["mother_wp_pro"];
          $mother_wp_tel=$stu_motherRow["mother_wp_tel"];
          $mother_phone=$stu_motherRow["mother_phone"];

			}else{
      	  $mother_prefix=Null;
          $mother_fname=Null;
          $mother_sname=Null;
          $mother_prefix_en=Null;
          $mother_fname_en=Null;
          $mother_sname_en=Null;
          $mother_code=Null;
          $mother_blood=Null;
          $mother_nation=Null;
          $mother_sun=Null;
          $mother_IDReligion=Null;
          $mother_birthday=Null;
          $mother_career=Null;
          $mother_careerOther=Null;
          $mother_study=Null;
          $mother_salary=Null;
          $mother_workplace=Null;
          $mother_wp_pro=Null;
          $mother_wp_tel=Null;
          $mother_phone=Null;
			}
			    $pdo_datastu=Null;
      	  $this->mother_prefix=$mother_prefix;
          $this->mother_fname=$mother_fname;
          $this->mother_sname=$mother_sname;
          $this->mother_prefix_en=$mother_prefix_en;
          $this->mother_fname_en=$mother_fname_en;
          $this->mother_sname_en=$mother_sname_en;
          $this->mother_code=$mother_code;
          $this->mother_blood=$mother_blood;
          $this->mother_nation=$mother_nation;
          $this->mother_sun=$mother_sun;
          $this->mother_IDReligion=$mother_IDReligion;
          $this->mother_birthday=$mother_birthday;
          $this->mother_career=$mother_career;
          $this->mother_careerOther=$mother_careerOther;
          $this->mother_study=$mother_study;
          $this->mother_salary=$mother_salary;
          $this->mother_workplace=$mother_workplace;
          $this->mother_wp_pro=$mother_wp_pro;
          $this->mother_wp_tel=$mother_wp_tel;
          $this->mother_phone=$mother_phone;
    }
    function __destruct(){
      	  $this->mother_prefix;
          $this->mother_fname=$mother_fname;
          $this->mother_sname=$mother_sname;
          $this->mother_prefix_en=$mother_prefix_en;
          $this->mother_fname_en=$mother_fname_en;
          $this->mother_sname_en=$mother_sname_en;
          $this->mother_code=$mother_code;
          $this->mother_blood=$mother_blood;
          $this->mother_nation=$mother_nation;
          $this->mother_sun=$mother_sun;
          $this->mother_IDReligion=$mother_IDReligion;
          $this->mother_birthday=$mother_birthday;
          $this->mother_career=$mother_career;
          $this->mother_careerOther=$mother_careerOther;
          $this->mother_study=$mother_study;
          $this->mother_salary=$mother_salary;
          $this->mother_workplace=$mother_workplace;
          $this->mother_wp_pro=$mother_wp_pro;
          $this->mother_wp_tel=$mother_wp_tel;
          $this->mother_phone=$mother_phone;
		}
    
  }

//print stu_mother_address

  class stu_mother_address_sw{
    public $stu_key;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_mother_addressSql="SELECT  `mother_hno`, `mother_moo`, `mother_soi`, `mother_road`, `mother_tumbon`, `mother_amphur`, `mother_province`, `mother_zipcode` FROM `stu_mother_address` WHERE `stu_id`='{$this->stu_key}';";
			if($stu_mother_addressRs=$pdo_datastu->query($stu_mother_addressSql)){
			   $stu_mother_addressRow=$stu_mother_addressRs->Fetch(PDO::FETCH_ASSOC);
          $mother_hno=$stu_mother_addressRow["mother_hno"];
          $mother_moo=$stu_mother_addressRow["mother_moo"];
          $mother_soi=$stu_mother_addressRow["mother_soi"];
          $mother_road=$stu_mother_addressRow["mother_road"];
          $mother_tumbon=$stu_mother_addressRow["mother_tumbon"];
          $mother_amphur=$stu_mother_addressRow["mother_amphur"];
          $mother_province=$stu_mother_addressRow["mother_province"];
          $mother_zipcode=$stu_mother_addressRow["mother_zipcode"];
			}else{
          $mother_hno=Null;
          $mother_moo=Null;
          $mother_soi=Null;
          $mother_road=Null;
          $mother_tumbon=Null;
          $mother_amphur=Null;
          $mother_province=Null;
          $mother_zipcode=Null;
			}
			$pdo_datastu=Null;
          $this->mother_hno=$mother_hno;
          $this->mother_moo=$mother_moo;
          $this->mother_soi=$mother_soi;
          $this->mother_road=$mother_road;
          $this->mother_tumbon=$mother_tumbon;
          $this->mother_amphur=$mother_amphur;
          $this->mother_province=$mother_province;
          $this->mother_zipcode=$mother_zipcode;
    }
    function __destruct(){
          $this->mother_hno;
          $this->mother_moo;
          $this->mother_soi;
          $this->mother_road;
          $this->mother_tumbon;
          $this->mother_amphur;
          $this->mother_province;
          $this->mother_zipcode;

		}
  }

//print stu_mother_addword
  class stu_mother_addword_sw{
    public $stu_key;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_mother_addwordSql="SELECT `mother_wordhno`, `mother_wordmoo`, `mother_wordsoi`, `mother_wordroad`, `mother_wordtumbon`, `mother_wordamphur`, `mother_wordprovince`, `mother_wordzipcode` FROM `stu_mother_addword` WHERE `stu_id`='{$this->stu_key}'";
			if($stu_mother_addwordRs=$pdo_datastu->query($stu_mother_addwordSql)){
			   $stu_mother_addwordRow=$stu_mother_addwordRs->Fetch(PDO::FETCH_ASSOC);
         $mother_wordhno=$stu_mother_addwordRow["mother_wordhno"];
         $mother_wordmoo=$stu_mother_addwordRow["mother_wordmoo"];
         $mother_wordsoi=$stu_mother_addwordRow["mother_wordsoi"];
         $mother_wordroad=$stu_mother_addwordRow["mother_wordroad"];
         $mother_wordtumbon=$stu_mother_addwordRow["mother_wordtumbon"];
         $mother_wordamphur=$stu_mother_addwordRow["mother_wordamphur"];
         $mother_wordprovince=$stu_mother_addwordRow["mother_wordprovince"];
         $mother_wordzipcode=$stu_mother_addwordRow["mother_wordzipcode"];
			}else{
         $mother_wordhno=Null;
         $mother_wordmoo=Null;
         $mother_wordsoi=Null;
         $mother_wordroad=Null;
         $mother_wordtumbon=Null;
         $mother_wordamphur=Null;
         $mother_wordprovince=Null;
         $mother_wordzipcode=Null;
			}
			$pdo_datastu=Null;
         $this->mother_wordhno=$mother_wordhno;
         $this->mother_wordmoo=$mother_wordmoo;
         $this->mother_wordsoi=$mother_wordsoi;
         $this->mother_wordroad=$mother_wordroad;
         $this->mother_wordtumbon=$mother_wordtumbon;
         $this->mother_wordamphur=$mother_wordamphur;
         $this->mother_wordprovince=$mother_wordprovince;
         $this->mother_wordzipcode=$mother_wordzipcode;
    }function __destruct(){
         $this->mother_wordhno;
         $this->mother_wordmoo;
         $this->mother_wordsoi;
         $this->mother_wordroad;
         $this->mother_wordtumbon;
         $this->mother_wordamphur;
         $this->mother_wordprovince;
         $this->mother_wordzipcode;

		}
  }


//print stu_guardian
  class stu_guardian_sw{
     public $stu_key;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_guardianSql="SELECT  `parent_prefix`, `parent_fname`, `parent_sname`, `parent_prefix_en`, `parent_fname_en`, `parent_sname_en`, `parent_code`, `guardian_birthday`, `parent_phone`, `parent_blood`, `parent_nation`, `parent_sun`, `parent_IDReligion`, `parent_birthday`, `parent_career`, `parent_careerOther`, `parent_study`, `parent_salary`, `parent_workplace`, `parent_family`, `parent_wp_pro`, `parent_wp_tel`, `parent_status` FROM `stu_guardian` WHERE `stu_id`='{$this->stu_key}';";
			if($stu_guardianRs=$pdo_datastu->query($stu_guardianSql)){
			   $stu_guardianRow=$stu_guardianRs->Fetch(PDO::FETCH_ASSOC);
	       $parent_prefix=$stu_guardianRow["parent_prefix"];
         $parent_fname=$stu_guardianRow["parent_fname"];
         $parent_sname=$stu_guardianRow["parent_sname"];
         $parent_prefix_en=$stu_guardianRow["parent_prefix_en"];
         $parent_fname_en=$stu_guardianRow["parent_fname_en"];
         $parent_sname_en=$stu_guardianRow["parent_sname_en"];
         $parent_code=$stu_guardianRow["parent_code"];
         $guardian_birthday=$stu_guardianRow["guardian_birthday"];
         $parent_phone=$stu_guardianRow["parent_phone"];
         $parent_blood=$stu_guardianRow["parent_blood"];
         $parent_nation=$stu_guardianRow["parent_nation"];
         $parent_sun=$stu_guardianRow["parent_sun"];
         $parent_IDReligion=$stu_guardianRow["parent_IDReligion"];
         $parent_birthday=$stu_guardianRow["parent_birthday"];
         $parent_career=$stu_guardianRow["parent_career"];
         $parent_careerOther=$stu_guardianRow["parent_careerOther"];
         $parent_study=$stu_guardianRow["parent_study"];
         $parent_salary=$stu_guardianRow["parent_salary"];
         $parent_workplace=$stu_guardianRow["parent_workplace"];
         $parent_family=$stu_guardianRow["parent_family"];
         $parent_wp_pro=$stu_guardianRow["parent_wp_pro"];
         $parent_wp_tel=$stu_guardianRow["parent_wp_tel"];
         $parent_status=$stu_guardianRow["parent_status"];

			}else{

	       $parent_prefix=Null;
         $parent_fname=Null;
         $parent_sname=Null;
         $parent_prefix_en=Null;
         $parent_fname_en=Null;
         $parent_sname_en=Null;
         $parent_code=Null;
         $guardian_birthday=Null;
         $parent_phone=Null;
         $parent_blood=Null;
         $parent_nation=Null;
         $parent_sun=Null;
         $parent_IDReligion=Null;
         $parent_birthday=Null;
         $parent_career=Null;
         $parent_careerOther=Null;
         $parent_study=Null;
         $parent_salary=Null;
         $parent_workplace=Null;
         $parent_family=Null;
         $parent_wp_pro=Null;
         $parent_wp_tel=Null;
         $parent_status=Null;
			}
			$pdo_datastu=Null;

	       $this->parent_prefix=$parent_prefix;
         $this->parent_fname=$parent_fname;
         $this->parent_sname=$parent_sname;
         $this->parent_prefix_en=$parent_prefix_en;
         $this->parent_fname_en=$parent_fname_en;
         $this->parent_sname_en=$parent_sname_en;
         $this->parent_code=$parent_code;
         $this->guardian_birthday=$guardian_birthday;
         $this->parent_phone=$parent_phone;
         $this->parent_blood=$parent_blood;
         $this->parent_nation=$parent_nation;
         $this->parent_sun=$parent_sun;
         $this->parent_IDReligion=$parent_IDReligion;
         $this->parent_birthday=$parent_birthday;
         $this->parent_career=$parent_career;
         $this->parent_careerOther=$parent_careerOther;
         $this->parent_study=$parent_study;
         $this->parent_salary=$parent_salary;
         $this->parent_workplace=$parent_workplace;
         $this->parent_family=$parent_family;
         $this->parent_wp_pro=$parent_wp_pro;
         $this->parent_wp_tel=$parent_wp_tel;
         $this->parent_status=$parent_status;

    }
    function __destruct(){
      
	       $this->parent_prefix;
         $this->parent_fname;
         $this->parent_sname;
         $this->parent_prefix_en;
         $this->parent_fname_en;
         $this->parent_sname_en;
         $this->parent_code;
         $this->guardian_birthday;
         $this->parent_phone;
         $this->parent_blood;
         $this->parent_nation;
         $this->parent_sun;
         $this->parent_IDReligion;
         $this->parent_birthday;
         $this->parent_career;
         $this->parent_careerOther;
         $this->parent_study;
         $this->parent_salary;
         $this->parent_workplace;
         $this->parent_family;
         $this->parent_wp_pro;
         $this->parent_wp_tel;
         $this->parent_status;
         
		}
    
  }

//print stu_guardian_addword
  class stu_guardian_addword_sw{
    public $stu_key;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_guardian_addwordSql="SELECT `parent_addwordhno`, `parent_addwordmoo`, `parent_addwordsoi`, `parent_addwordroad`, `parent_addwordtumbon`, `parent_addwordamphur`, `parent_addwordprovince`, `parent_addwordzipcode`, `parent_addwordstu` FROM `stu_guardian_addword` WHERE `stu_id`='{$this->stu_key}';";
			if($stu_guardian_addwordRs=$pdo_datastu->query($stu_guardian_addwordSql)){
			   $stu_guardian_addwordRow=$stu_guardian_addwordRs->Fetch(PDO::FETCH_ASSOC);
    
          $parent_addwordhno=$stu_guardian_addwordRow["parent_addwordhno"];
          $parent_addwordmoo=$stu_guardian_addwordRow["parent_addwordmoo"];
          $parent_addwordsoi=$stu_guardian_addwordRow["parent_addwordsoi"];
          $parent_addwordroad=$stu_guardian_addwordRow["parent_addwordroad"];
          $parent_addwordtumbon=$stu_guardian_addwordRow["parent_addwordtumbon"];
          $parent_addwordamphur=$stu_guardian_addwordRow["parent_addwordamphur"];
          $parent_addwordprovince=$stu_guardian_addwordRow["parent_addwordprovince"];
          $parent_addwordzipcode=$stu_guardian_addwordRow["parent_addwordzipcode"];
          $parent_addwordstu=$stu_guardian_addwordRow["parent_addwordstu"];

			}else{
          $parent_addwordhno=Null;
          $parent_addwordmoo=Null;
          $parent_addwordsoi=Null;
          $parent_addwordroad=Null;
          $parent_addwordtumbon=Null;
          $parent_addwordamphur=Null;
          $parent_addwordprovince=Null;
          $parent_addwordzipcode=Null;
          $parent_addwordstu=Null;
			}
			$pdo_datastu=Null;
          $this->parent_addwordhno=$parent_addwordhno;
          $this->parent_addwordmoo=$parent_addwordmoo;
          $this->parent_addwordsoi=$parent_addwordsoi;
          $this->parent_addwordroad=$parent_addwordroad;
          $this->parent_addwordtumbon=$parent_addwordtumbon;
          $this->parent_addwordamphur=$parent_addwordamphur;
          $this->parent_addwordprovince=$parent_addwordprovince;
          $this->parent_addwordzipcode=$parent_addwordzipcode;
          $this->parent_addwordstu=$parent_addwordstu;
    }function __destruct(){
          $this->parent_addwordhno;
          $this->parent_addwordmoo;
          $this->parent_addwordsoi;
          $this->parent_addwordroad;
          $this->parent_addwordtumbon;
          $this->parent_addwordamphur;
          $this->parent_addwordprovince;
          $this->parent_addwordzipcode;
          $this->parent_addwordstu;

		}
    
  }



//print stu_guardian_address
  class stu_guardian_address_sw{
    public $stu_key;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$data_studentSql="SELECT `stu_id`, `parent_hno`, `parent_moo`, `parent_soi`, `parent_road`, `parent_tumbon`, `parent_amphur`, `parent_province`, `parent_zipcode`, `parent_stu` FROM `stu_guardian_address` WHERE `stu_id`='{$this->stu_key}';";
			if($data_studentRs=$pdo_datastu->query($data_studentSql)){
			   $data_studentRow=$data_studentRs->Fetch(PDO::FETCH_ASSOC);
         $parent_hno=$data_studentRow["parent_hno"];
         $parent_moo=$data_studentRow["parent_moo"];
         $parent_soi=$data_studentRow["parent_soi"];
         $parent_road=$data_studentRow["parent_road"];
         $parent_tumbon=$data_studentRow["parent_tumbon"];
         $parent_amphur=$data_studentRow["parent_amphur"];
         $parent_province=$data_studentRow["parent_province"];
         $parent_zipcode=$data_studentRow["parent_zipcode"];
         $parent_stu=$data_studentRow["parent_stu"];

			}else{
         $parent_hno=Null;
         $parent_moo=Null;
         $parent_soi=Null;
         $parent_road=Null;
         $parent_tumbon=Null;
         $parent_amphur=Null;
         $parent_province=Null;
         $parent_zipcode=Null;
         $parent_stu=Null;
			}
			$pdo_datastu=Null;
         $this->parent_hno=$parent_hno;
         $this->parent_moo=$parent_moo;
         $this->parent_soi=$parent_soi;
         $this->parent_road=$parent_road;
         $this->parent_tumbon=$parent_tumbon;
         $this->parent_amphur=$parent_amphur;
         $this->parent_province=$parent_province;
         $this->parent_zipcode=$parent_zipcode;
         $this->parent_stu=$parent_stu;
    }function __destruct(){
         $this->parent_hno;
         $this->parent_moo;
         $this->parent_soi;
         $this->parent_road;
         $this->parent_tumbon;
         $this->parent_amphur;
         $this->parent_province;
         $this->parent_zipcode;
         $this->parent_stu;
		}
    
  }









//print data_student
  class data_student_sw{
    public $stu_key;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$data_studentSql="SELECT `stu_id`, `stu_birth`, `stu_blood`, `stu_nation`, `stu_sun`, `IDReligion`, `stu_phone`, `stu_brethren`, `stu_brethreS`, `stu_child`, `stu_physical`, `breed_add`, `breed_district`, `breed_city`, `breed_province`, `ds_SameSchool`, `ds_OriginalClass`,`ds_ProvinceSchool` FROM `data_student` WHERE`stu_id`='{$this->stu_key}';";
			if($data_studentRs=$pdo_datastu->query($data_studentSql)){
			   $data_studentRow=$data_studentRs->Fetch(PDO::FETCH_ASSOC);
			   $stu_birth=$data_studentRow["stu_birth"];
         $stu_blood=$data_studentRow["stu_blood"];
         $stu_nation=$data_studentRow["stu_nation"];
         $stu_sun=$data_studentRow["stu_sun"];
         $IDReligion=$data_studentRow["IDReligion"];
         $stu_phone=$data_studentRow["stu_phone"];
         $stu_brethren=$data_studentRow["stu_brethren"];
         $stu_brethreS=$data_studentRow["stu_brethreS"];
         $stu_child=$data_studentRow["stu_child"];
         $stu_physical=$data_studentRow["stu_physical"];
         $breed_add=$data_studentRow["breed_add"];
         $breed_district=$data_studentRow["breed_district"];
         $breed_city=$data_studentRow["breed_city"];
         $breed_province=$data_studentRow["breed_province"];
         $ds_SameSchool=$data_studentRow["ds_SameSchool"];
         $ds_OriginalClass=$data_studentRow["ds_OriginalClass"];
         $ds_ProvinceSchool=$data_studentRow["ds_ProvinceSchool"];

			}else{
			   $stu_birth=Null;
         $stu_blood=Null;
         $stu_nation=Null;
         $stu_sun=Null;
         $IDReligion=Null;
         $stu_phone=Null;
         $stu_brethren=Null;
         $stu_brethreS=Null;
         $stu_child=Null;
         $stu_physical=Null;
         $breed_add=Null;
         $breed_district=Null;
         $breed_city=Null;
         $breed_province=Null;
         $ds_SameSchool=Null;
         $ds_OriginalClass=Null;
         $ds_ProvinceSchool=Null;
			}
			$pdo_datastu=Null;
			    $this->stu_birth=$stu_birth;
			    $this->stu_blood=$stu_blood;
			    $this->stu_nation=$stu_nation;
			    $this->stu_sun=$stu_sun;
			    $this->IDReligion=$IDReligion;
			    $this->stu_phone=$stu_phone;
			    $this->stu_brethren=$stu_brethren;
			    $this->stu_brethreS=$stu_brethreS;
			    $this->stu_child=$stu_child;
			    $this->stu_physical=$stu_physical;
			    $this->breed_add=$breed_add;
			    $this->breed_district=$breed_district;
			    $this->breed_city=$breed_city;
			    $this->breed_province=$breed_province;
			    $this->ds_SameSchool=$ds_SameSchool;
          $this->ds_OriginalClass=$ds_OriginalClass;
          $this->ds_ProvinceSchool=$ds_ProvinceSchool;

    }
    function __destruct(){ 
			    $this->stu_birth;
			    $this->stu_blood;
			    $this->stu_nation;
			    $this->stu_sun;
			    $this->IDReligion;
			    $this->stu_phone;
			    $this->stu_brethren;
			    $this->stu_brethreS;
			    $this->stu_child;
			    $this->stu_physical;
			    $this->breed_add;
			    $this->breed_district;
			    $this->breed_city;
			    $this->breed_province;
			    $this->ds_SameSchool;
          $this->ds_OriginalClass;
          $this->ds_ProvinceSchool;
		}
  }
  
  
  
//depend_stu
  class depend_stu_sw{
    public $stu_key;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$depend_stuSql="SELECT  `ds_status`, `ds_dormitoryName`, `ds_dormitoryHno`, `ds_dormitoryMoo`, `ds_dormitorySoi`, `ds_dormitoryRoad`, `ds_dormitoryTumbon`, `ds_dormitoryAmphur`, `ds_dormitoryProvince`, `ds_dormitoryZipcode`, `ds_dormitoryPhone`, `ds_dormitoryMyName`, `ds_FoodAllergies`, `ds_CongenitalDisease`, `ds_DrugAllergy`, `ds_trip`, `ds_triptxt`, `ds_FMstatus`, `ds_allergic` FROM `depend_stu` WHERE`ds_stuid`='{$this->stu_key}';";
			if($depend_stuRs=$pdo_datastu->query($depend_stuSql)){
			   $depend_stuRow=$depend_stuRs->Fetch(PDO::FETCH_ASSOC);
			    $ds_status=$depend_stuRow["ds_status"];
          $ds_dormitoryName=$depend_stuRow["ds_dormitoryName"];
          $ds_dormitoryHno=$depend_stuRow["ds_dormitoryHno"];
          $ds_dormitoryMoo=$depend_stuRow["ds_dormitoryMoo"];
          $ds_dormitorySoi=$depend_stuRow["ds_dormitorySoi"];
          $ds_dormitoryRoad=$depend_stuRow["ds_dormitoryRoad"];
          $ds_dormitoryTumbon=$depend_stuRow["ds_dormitoryTumbon"];
          $ds_dormitoryAmphur=$depend_stuRow["ds_dormitoryAmphur"];
          $ds_dormitoryProvince=$depend_stuRow["ds_dormitoryProvince"];
          $ds_dormitoryZipcode=$depend_stuRow["ds_dormitoryZipcode"];
          $ds_dormitoryPhone=$depend_stuRow["ds_dormitoryPhone"];
          $ds_dormitoryMyName=$depend_stuRow["ds_dormitoryMyName"];
          $ds_FoodAllergies=$depend_stuRow["ds_FoodAllergies"];
          $ds_CongenitalDisease=$depend_stuRow["ds_CongenitalDisease"];
          $ds_DrugAllergy=$depend_stuRow["ds_DrugAllergy"];
          $ds_trip=$depend_stuRow["ds_trip"];
          $ds_triptxt=$depend_stuRow["ds_triptxt"];
          $ds_FMstatus=$depend_stuRow["ds_FMstatus"];
          $ds_allergic=$depend_stuRow["ds_allergic"];

			}else{
			    $ds_status=Null;
          $ds_dormitoryName=Null;
          $ds_dormitoryHno=Null;
          $ds_dormitoryMoo=Null;
          $ds_dormitorySoi=Null;
          $ds_dormitoryRoad=Null;
          $ds_dormitoryTumbon=Null;
          $ds_dormitoryAmphur=Null;
          $ds_dormitoryProvince=Null;
          $ds_dormitoryZipcode=Null;
          $ds_dormitoryPhone=Null;
          $ds_dormitoryMyName=Null;
          $ds_FoodAllergies=Null;
          $ds_CongenitalDisease=Null;
          $ds_DrugAllergy=Null;
          $ds_trip=Null;
          $ds_triptxt=Null;
          $ds_FMstatus=Null;
          $ds_allergic=Null;
			}
			$pdo_datastu=Null;
          $this->ds_status=$ds_status;
          $this->ds_dormitoryName=$ds_dormitoryName;
          $this->ds_dormitoryHno=$ds_dormitoryHno;
          $this->ds_dormitoryMoo=$ds_dormitoryMoo;
          $this->ds_dormitorySoi=$ds_dormitorySoi;
          $this->ds_dormitoryRoad=$ds_dormitoryRoad;
          $this->ds_dormitoryTumbon=$ds_dormitoryTumbon;
          $this->ds_dormitoryAmphur=$ds_dormitoryAmphur;
          $this->ds_dormitoryProvince=$ds_dormitoryProvince;
          $this->ds_dormitoryZipcode=$ds_dormitoryZipcode;
          $this->ds_dormitoryPhone=$ds_dormitoryPhone;
          $this->ds_dormitoryMyName=$ds_dormitoryMyName;
          $this->ds_FoodAllergies=$ds_FoodAllergies;
          $this->ds_CongenitalDisease=$ds_CongenitalDisease;
          $this->ds_DrugAllergy=$ds_DrugAllergy;
          $this->ds_trip=$ds_trip;
          $this->ds_triptxt=$ds_triptxt;
          $this->ds_FMstatus=$ds_FMstatus;
          $this->ds_allergic=$ds_allergic;
                                                                                                    
    }
    function __destruct(){
          $this->ds_status;
          $this->ds_dormitoryName;
          $this->ds_dormitoryHno;
          $this->ds_dormitoryMoo;
          $this->ds_dormitorySoi;
          $this->ds_dormitoryRoad;
          $this->ds_dormitoryTumbon;
          $this->ds_dormitoryAmphur;
          $this->ds_dormitoryProvince;
          $this->ds_dormitoryZipcode;
          $this->ds_dormitoryPhone;
          $this->ds_dormitoryMyName;
          $this->ds_FoodAllergies;
          $this->ds_CongenitalDisease;
          $this->ds_DrugAllergy;
          $this->ds_trip;
          $this->ds_triptxt;
          $this->ds_FMstatus;
          $this->ds_allergic;
		}
    
  }

//data_gohome
class data_gohome_sw{
  public $txt_gohome;
  public $dgh_id,$dgh_txt;
      function __construct($txt_gohome){
      $this->txt_gohome=$txt_gohome;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$data_gohomeSql="SELECT `dgh_id`, `dgh_txt` FROM `data_gohome` WHERE`dgh_id`='{$this->txt_gohome}'";
			if($data_gohomeRs=$pdo_datastu->query($data_gohomeSql)){
			   $data_gohomeRow=$data_gohomeRs->Fetch(PDO::FETCH_ASSOC);
         $dgh_id=$data_gohomeRow["dgh_id"];
         $dgh_txt=$data_gohomeRow["dgh_txt"];
			}else{
         $dgh_id=Null;
         $dgh_txt=Null;
      }
      $pdo_datastu=Null;
      $this->dgh_id=$dgh_id;
      $this->dgh_txt=$dgh_txt;
      }function __destruct(){
        $this->dgh_id;
        $this->dgh_txt;
		  }
}



//data_family

class data_family_sw{
  public $txt_family;
      function __construct($txt_family){
      $this->txt_family=$txt_family;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$data_familySql="SELECT `family_key`,`family_txt` FROM `data_family` WHERE `family_key`='{$this->txt_family}';";
			if($data_familyRs=$pdo_datastu->query($data_familySql)){
			   $data_familyRow=$data_familyRs->Fetch(PDO::FETCH_ASSOC);
         $family_key=$data_familyRow["family_key"];
         $family_txt=$data_familyRow["family_txt"];

			}else{
         $family_key=Null;
         $family_txt=Null;
      }
      $pdo_datastu=Null;
      $this->family_key=$family_key;
      $this->family_txt=$family_txt;
      }function __destruct(){
      $this->family_key;
      $this->family_txt;
		  }
}





//stu_address
  class stu_address_sw{
    public $stu_key;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_addressSql="SELECT  `stu_hno`, `stu_moo`, `stu_soi`, `stu_road`, `stu_tumbon`, `stu_amphur`, `stu_province`, `stu_zipcode` FROM `stu_address` WHERE `stu_id`='{$this->stu_key}'";
			if($stu_addressRs=$pdo_datastu->query($stu_addressSql)){
			   $stu_addressRow=$stu_addressRs->Fetch(PDO::FETCH_ASSOC);
	        $stu_hno=$stu_addressRow["stu_hno"];
          $stu_moo=$stu_addressRow["stu_moo"];
          $stu_soi=$stu_addressRow["stu_soi"];
          $stu_road=$stu_addressRow["stu_road"];
          $stu_tumbon=$stu_addressRow["stu_tumbon"];
          $stu_amphur=$stu_addressRow["stu_amphur"];
          $stu_province=$stu_addressRow["stu_province"];
          $stu_zipcode=$stu_addressRow["stu_zipcode"];
			}else{
	        $stu_hno=Null;
          $stu_moo=Null;
          $stu_soi=Null;
          $stu_road=Null;
          $stu_tumbon=Null;
          $stu_amphur=Null;
          $stu_province=Null;
          $stu_zipcode=Null;

      }
      $pdo_datastu=Null;
          $this->stu_hno=$stu_hno;
          $this->stu_moo=$stu_moo;
          $this->stu_soi=$stu_soi;
          $this->stu_road=$stu_road;
          $this->stu_tumbon=$stu_tumbon;
          $this->stu_amphur=$stu_amphur;
          $this->stu_province=$stu_province;
          $this->stu_zipcode=$stu_zipcode;
        
     } function __destruct(){
          $this->stu_hno;
          $this->stu_moo;
          $this->stu_soi;
          $this->stu_road;
          $this->stu_tumbon;
          $this->stu_amphur;
          $this->stu_province;
          $this->stu_zipcode;
		  }
    }


//stu_address_home

  class stu_address_home_sw{
    public $stu_key;
    function __construct($stu_key){
      $this->stu_key=$stu_key;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$stu_address_homeSql="SELECT  `stu_reg_hno`, `stu_reg_moo`, `stu_reg_soi`, `stu_reg_road`, `stu_reg_tumbon`, `stu_reg_amphur`, `stu_reg_province`, `stu_reg_zipcode` FROM `stu_address_home` WHERE `stu_id`='{$this->stu_key}';";
			if($stu_address_homeRs=$pdo_datastu->query($stu_address_homeSql)){
			   $stu_address_homeRow=$stu_address_homeRs->Fetch(PDO::FETCH_ASSOC);
         $stu_reg_hno=$stu_address_homeRow["stu_reg_hno"];
         $stu_reg_moo=$stu_address_homeRow["stu_reg_moo"];
	       $stu_reg_soi=$stu_address_homeRow["stu_reg_soi"];
	       $stu_reg_road=$stu_address_homeRow["stu_reg_road"];
         $stu_reg_tumbon=$stu_address_homeRow["stu_reg_tumbon"];
         $stu_reg_amphur=$stu_address_homeRow["stu_reg_amphur"];
         $stu_reg_province=$stu_address_homeRow["stu_reg_province"];
         $stu_reg_zipcode=$stu_address_homeRow["stu_reg_zipcode"];
			}else{
         $stu_reg_hno=Null;
         $stu_reg_moo=Null;
	       $stu_reg_soi=Null;
	       $stu_reg_road=Null;
         $stu_reg_tumbon=Null;
         $stu_reg_amphur=Null;
         $stu_reg_province=Null;
         $stu_reg_zipcode=Null;
      }
      $pdo_datastu=Null;
        $this->stu_reg_hno=$stu_reg_hno;
        $this->stu_reg_moo=$stu_reg_moo;
        $this->stu_reg_soi=$stu_reg_soi;
        $this->stu_reg_road=$stu_reg_road;
        $this->stu_reg_tumbon=$stu_reg_tumbon;
        $this->stu_reg_amphur=$stu_reg_amphur;
        $this->stu_reg_province=$stu_reg_province;
        $this->stu_reg_zipcode=$stu_reg_zipcode;
        
     } function __destruct(){
        $this->stu_reg_hno;
        $this->stu_reg_moo;
        $this->stu_reg_soi;
        $this->stu_reg_road;
        $this->stu_reg_tumbon;
        $this->stu_reg_amphur;
        $this->stu_reg_province;
        $this->stu_reg_zipcode;
		  }
    }

class data_disabled_sw{
  public $txt_disablrd;
      function __construct($txt_disablrd){
      $this->txt_disablrd=$txt_disablrd;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
			$data_disabledSql="SELECT `disabled_txt` FROM `data_disabled` WHERE `disabled_id`='{$this->txt_disablrd}';";
			if($data_disabledRs=$pdo_datastu->query($data_disabledSql)){
			   $data_disabledRow=$data_disabledRs->Fetch(PDO::FETCH_ASSOC);
         $disabled_txt=$data_disabledRow["disabled_txt"];
			}else{
         $disabled_txt=Null;
      }
      $pdo_datastu=Null;
      
        $this->disabled_txt=$disabled_txt;
      }function __destruct(){
        $this->disabled_txt;
		  }
}


  class rc_religion_sw{
    public $txt_religion;
    function __construct($txt_religion){
      $this->txt_religion=$txt_religion;
      $connpdo_datastu=new conntopdo_datastuto_sw("mysql");
			$pdo_datastu=$connpdo_datastu->getconnto_datastuto_datastuect();
      $religionSql="SELECT `Religion` FROM `rc_religion` WHERE `IDReligion`='{$this->txt_religion}';";
      if($religionRs=$pdo_datastu->query($religionSql)){
         $religionRow=$religionRs->Fetch(PDO::FETCH_ASSOC);
         $Religion=$religionRow["Religion"];
      }else{
         $Religion=Null;
      }
         $pdo_datastu=Null;
         $this->Religion=$Religion;
    }
      function __destruct(){
         $this->Religion;
      }
  }








	class stu_prefix_sw{
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
?>


<?php
	class data_rely_sw{
		public $txt_rely;
		function __construct($txt_rely){
			$this->txt_rely=$txt_rely;
			$connpdo_datastu=new conntopdo_datastuto_sw("mysql");
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
	class db_country_sw{
		public $txt_set;
		function __construct($txt_set){
			$this->txt_set=$txt_set;
			$evaluation_array=array();
			$connpdo_datastu=new conntopdo_datastuto_sw("mysql");
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
	class data_Subdistrict_sw{
		public $key_Subdistrict;
		function __construct($key_Subdistrict){
			$this->key_Subdistrict=$key_Subdistrict;
			$connpdo_datastu=new conntopdo_datastuto_sw("mysql");
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
	class data_District_sw{
		public $key_District;
		function __construct($key_District){
			$this->key_District=$key_District;
			$connpdo_datastu=new conntopdo_datastuto_sw("mysql");
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
	class data_Province_sw{
		public $key_Province;
    public $PROVINCE_NAME,$PROVINCE_NAME_ENG;
		function __construct($key_Province){
			$this->key_Province=$key_Province;
			$connpdo_datastu=new conntopdo_datastuto_sw("mysql");
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
	class insert_datastu_sw{
		public $evaluation_sql;
		function __construct($evaluation_sql){
			$this->evaluation_sql=$evaluation_sql;
			
			$connpdo_datastu=new conntopdo_datastuto_sw("mysql");
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


	class  dateofbirth_sw{
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

	class income_sw{
		public $txt_income;
    public $print_income;
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

		class notrow_datastu_sw{
			public $txt_datastu;
      public $datastu_array;
			function __construct($txt_datastu){
				$this->txt_datastu=$txt_datastu;
				$datastu_array=array();
				$connpdo_datastu=new conntopdo_datastuto_sw("mysql");
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
		
			class  row_datastu_sw{
			public $txt_datastu;
      public $datastu_array;
			function __construct($txt_datastu){
				$this->txt_datastu=$txt_datastu;
				$datastu_array=array();
				$connpdo_datastu=new conntopdo_datastuto_sw("mysql");
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