<?php
    header('Content-Type: text/html; charset=UTF-8');

    /*include("tools/database/pdo_data.php");
	include("tools/database/class_pdo.php");	
	
	include("tools/database/pdo_conndatastu.php");
	include("tools/database/class_pdodatastu.php");*/

	include("tools/database/database_swip/pdo_data_sw.php");
	include("tools/database/database_swip/class_pdo_sw.php");	
	
	include("tools/database/database_swip/pdo_conndatastu_sw.php");
	include("tools/database/database_swip/class_pdodatastu_sw.php");
	
	include("tools/database/pdo_admission.php");	
	include("tools/database/class_admission.php");

?>

<?php
//rc_student_admission
    $call_rsa_sql="SELECT * 
                   FROM `rc_student_admission` 
                   WHERE `IDReg`='{$admission_key}'";
    $call_rc_student_admission=new notrow_admission($call_rsa_sql);
        foreach($call_rc_student_admission->notrow_admission_print() as $rc=>$call_rsa_row){
            if((is_array($call_rsa_row) and count($call_rsa_row))){

                $stu_id=$call_rsa_row["IDReg"];

                $rsa_stu_birth=$call_rsa_row["stu_birth"];

                    if((isset($call_rsa_row["stu_birth"]))){
                        $txt_stu_birth=date("d-m-Y",strtotime($call_rsa_row["stu_birth"]));
                    }else{
                        $txt_stu_birth=null;
                    }
                
                $rsa_stu_blood=$call_rsa_row["stu_blood"];
                $rsa_stu_nation=$call_rsa_row["stu_nation"];
                $rsa_stu_sun=$call_rsa_row["stu_sun"];
                $rsa_IDReligion=$call_rsa_row["IDReligion"];
            }else{}
        }
//rc_student_admission end
//rc_student_level
    $call_sl_sql="SELECT *
                  FROM `rc_student_level` 
                  WHERE `IDReg`='{$admission_key}'";
    $call_rc_student_level=new notrow_admission($call_sl_sql);
        foreach($call_rc_student_level->notrow_admission_print() as $rc=>$call_sl_row){
            if((is_array($call_sl_row) and count($call_sl_row))){
                $sl_stu_level=$call_sl_row["stu_level"];
                $sl_stu_oldsch=$call_sl_row["stu_oldsch"];
                $sl_stu_schprovince=$call_sl_row["stu_schprovince"];
                $sl_stu_avg=$call_sl_row["stu_avg"];
            }else{}
        }
//rc_student_level End

//rc_student_family_admission
    $call_sfa_sql="SELECT * 
                   FROM `rc_student_family_admission` 
                   WHERE `IDReg`='{$admission_key}'";
    $call_rc_student_family_admission=new notrow_admission($call_sfa_sql);
        foreach($call_rc_student_family_admission->notrow_admission_print() as $rc=>$call_sfa_row){
            if((is_array($call_sfa_row) and count($call_sfa_row))){
                $sfa_father_prefix=$call_sfa_row["father_prefix"];
                $sfa_father_fname=$call_sfa_row["father_fname"];
                $sta_father_sname=$call_sfa_row["father_sname"];
                $sta_father_prefix_en=$call_sfa_row["father_prefix_en"];
                $sta_father_fname_en=$call_sfa_row["father_fname_en"];
                $sta_father_sname_en=$call_sfa_row["father_sname_en"];
                $sta_father_code=$call_sfa_row["father_code"];
                $sta_father_career=$call_sfa_row["father_career"];
                $sta_father_salary=$call_sfa_row["father_salary"];
                $sta_father_phone=$call_sfa_row["father_phone"];

                $sta_mother_prefix=$call_sfa_row["mother_prefix"];
                $sta_mother_fname=$call_sfa_row["mother_fname"];
                $sta_mother_sname=$call_sfa_row["mother_sname"];
                $sta_mother_prefix_en=$call_sfa_row["mother_prefix_en"];
                $sta_mother_fname_en=$call_sfa_row["_mother_fname_en"];
                $sta_mother_sname_en=$call_sfa_row["mother_sname_en"];
                $sta_mother_code=$call_sfa_row["mother_code"];
                $sta_mother_career=$call_sfa_row["mother_career"];
                $sta_mother_salary=$call_sfa_row["mother_salary"];
                $sta_mother_phone=$call_sfa_row["mother_phone"];

                $sta_parent_prefix=$call_sfa_row["parent_prefix"];
                $sta_parent_fname=$call_sfa_row["parent_fname"];
                $sta_parent_sname=$call_sfa_row["parent_sname"];
                $sta_parent_prefix_en=$call_sfa_row["parent_prefix_en"];
                $sta_parent_fname_en=$call_sfa_row["parent_fname_en"];
                $sta_parent_sname_en=$call_sfa_row["parent_sname_en"];
                $sta_parent_code=$call_sfa_row["parent_code"];
                $sta_parent_phone=$call_sfa_row["parent_phone"];
                $sta_parent_career=$call_sfa_row["parent_career"];
                $sta_parent_salary=$call_sfa_row["parent_salary"];

                $sta_parent_stu=$call_sfa_row["parent_stu"]; 
                $sta_status_fam=$call_sfa_row["status_fam"]; //*
            }else{}
        }
//rc_student_family_admission end

        $Test_data_studentSql="SELECT COUNT(`stu_id`) AS `int_count_ds` FROM `data_student` WHERE `stu_id`='{$stu_id}'";
        $Test_data_student=new notrow_datastu_sw($Test_data_studentSql);
            foreach($Test_data_student->datastu_array as $admiss=>$Test_data_studenRow){
                if((is_array($Test_data_studenRow) and count($Test_data_studenRow))){
                    $int_count_ds=$Test_data_studenRow["int_count_ds"];
                }else{
                    $int_count_ds=0;
                }
            }

            if(($int_count_ds>=1)){

            }else{
 //copy_into data_student
                $into_data_studentSql="INSERT INTO `data_student`(`stu_id`,`stu_birth`,`stu_blood`,`stu_nation`,`stu_sun`,`IDReligion`,`ds_SameSchool`,`ds_OriginalClass`) 
                                    VALUES ('{$stu_id}','{$txt_stu_birth}','{$rsa_stu_blood}','{$rsa_stu_nation}','{$rsa_stu_sun}','{$rsa_IDReligion}','{$sl_stu_oldsch}','{$sl_stu_level}')";
                $into_data_student=new insert_datastu_sw($into_data_studentSql);
                    if(($into_data_student->system_insert=="yes")){
        //*************************************
                    }else{
        //*************************************
                    }	
//copy_into data_student end               
            }


        $Test_stu_fatherSql="SELECT COUNT(`stu_id`) AS `int_count_sf` FROM `stu_father` WHERE `stu_id`='{$stu_id}'";
        $Test_stu_father=new notrow_datastu_sw($Test_stu_fatherSql);
            foreach($Test_stu_father->datastu_array as $admiss=>$Test_stu_fatherRow){
                if((is_array($Test_stu_fatherRow) and count($Test_stu_fatherRow))){
                    $int_count_sf=$Test_stu_fatherRow["int_count_sf"];
                }else{
                    $int_count_sf=0;
                }
            }

            if(($int_count_sf>=1)){

            }else{
        //copy_into_stu_father
                $into_stu_fatherSql="INSERT INTO `stu_father`(`stu_id`,`father_prefix`,`father_fname`,`father_sname`,`father_prefix_en`,`father_fname_en`
                                    ,`father_sname_en`,`father_code`,`father_career`,`father_phone`) 
                                    VALUES ('{$stu_id}','{$sfa_father_prefix}','{$sfa_father_fname}','{$sta_father_sname}','{$sta_father_prefix_en}','{$sta_father_fname_en}','{$sta_father_sname_en}'
                                    ,'{$sta_father_code}','{$sta_mother_career}','{$sta_father_phone}')";
                $into_stu_father=new insert_datastu_sw($into_stu_fatherSql);
                    if(($into_stu_father->system_insert=="yes")){
        //*************************************
                    }else{
        //*************************************
                    }
        //copy_into_stu_father end
            }



        $Test_stu_motherSql="SELECT COUNT(`stu_id`) AS `int_count_sm` FROM `stu_mother` WHERE stu_id='{$stu_id}'";
        $Test_stu_mother=new notrow_datastu_sw($Test_stu_motherSql);
        foreach($Test_stu_mother->datastu_array as $admiss=>$Test_stu_motherRow){
            if((is_array($Test_stu_motherRow) and count($Test_stu_motherRow))){
                $int_count_sm=$Test_stu_motherRow["int_count_sm"];
            }else{
                $int_count_sm=0;
            }
        }

        if(($int_count_sm>=1)){

        }else{
    //copy_into_stu_mother
            $into_stu_motherSql="INSERT INTO `stu_mother`(`stu_id`,`mother_prefix`,`mother_fname`,`mother_sname`,`mother_prefix_en`,`mother_fname_en`
                                ,`mother_sname_en`,`mother_code`,`mother_career`,`mother_phone`) 
                                VALUES ('{$stu_id}','{$sta_mother_prefix}','{$sta_mother_fname}','{$sta_mother_sname}','{$sta_mother_prefix_en}','{$sta_mother_fname_en}'
                                ,'{$sta_mother_sname_en}','{$sta_mother_code}','{$sta_mother_career}','{$sta_mother_phone}')";
            $into_stu_mother=new insert_datastu_sw($into_stu_motherSql);
                if(($into_stu_mother->system_insert=="yes")){
    //*************************************
                }else{
    //*************************************
                }
    //copy_into_stu_mother end            
        }



        $Test_depend_stuSql="SELECT COUNT(`ds_stuid`) AS `int_count_ds` FROM `depend_stu` WHERE `ds_stuid`='{$stu_id}'";
        $Test_depend_stu=new notrow_datastu_sw($Test_depend_stuSql);
            foreach($Test_depend_stu->datastu_array as $admiss=>$Test_depend_stuRow){
                if((is_array($Test_depend_stuRow) and count($Test_depend_stuRow))){
                    $int_count_ds=$Test_depend_stuRow["int_count_ds"];
                }else{
                    $int_count_ds=0;
                }
            }

            if(($int_count_ds>=1)){

            }else{
        //copy_into_depend_stu
                $into_depend_stuSql="INSERT INTO `depend_stu`(`ds_stuid`,`ds_FMstatus`) 
                                    VALUES ('{$stu_id}','{$sta_status_fam}')";
                $into_depend_stu=new insert_datastu_sw($into_depend_stuSql);
                    if(($into_depend_stu->system_insert=="yes")){
        //*************************************
                    }else{
        //*************************************
                    }
        //copy_into_depend_stu end
            }



            $Test_stu_guardianSql="SELECT COUNT(`stu_id`) AS `int_count_sq` FROM `stu_guardian` WHERE `stu_id`='{$stu_id}'";
            $Test_stu_guardian=new notrow_datastu_sw($Test_stu_guardianSql);
                foreach($Test_stu_guardian->datastu_array as $admiss=>$Test_stu_guardianRow){
                    if((is_array($Test_stu_guardianRow) and count($Test_stu_guardianRow))){
                        $int_count_sq=$Test_stu_guardianRow["int_count_sq"];
                    }else{
                        $int_count_sq=0;
                    }
                }

            if(($int_count_sq>=1)){

            }else{

                $Print_data_relySql="SELECT * 
                                     FROM `data_rely` 
                                     WHERE `dr_key`='{$sta_parent_stu}' 
                                     OR `dr_txt`='{$sta_parent_stu}'";
                $Print_data_rely=new notrow_datastu_sw($Print_data_relySql);
                    foreach($Print_data_rely->datastu_array as $admiss=>$Data_RelyRow){
                        if((is_array($Data_RelyRow) and count($Data_RelyRow))){
                            $Rely_Key=$Data_RelyRow["dr_key"];
                        }else{
                            $Rely_Key=0;
                        }
                    }

                    if(($Rely_Key==2)){
                        $into_stu_guardianSql="INSERT INTO `stu_guardian`(`stu_id`,`parent_status`) VALUES ('{$stu_id}','2')";
                        $into_stu_guardian=new insert_datastu_sw($into_stu_guardianSql);
                            if(($into_stu_guardian->system_insert=="yes")){
        //*************************************
                            }else{
        //*************************************
                            }
                    }elseif(($Rely_Key==3)){
                        $into_stu_guardianSql="INSERT INTO `stu_guardian`(`stu_id`,`parent_status`) VALUES ('{$stu_id}','3')";
                        $into_stu_guardian=new insert_datastu_sw($into_stu_guardianSql);
                            if(($into_stu_guardian->system_insert=="yes")){
        //*************************************
                            }else{
        //*************************************
                            }
                    }elseif(($Rely_Key==1 OR $Rely_Key==0 OR $Rely_Key=="")){

                    }else{

                        $txt_rely_sql="SELECT `dr_key` 
                                       FROM `data_rely` 
                                       WHERE `dr_txt`='{$sta_parent_stu}'";
                        $txt_rely=new notrow_datastu_sw($txt_rely_sql);
                            foreach($txt_rely->datastu_array as $admiss=>$txt_rely_row){
                                if((is_array($txt_rely_row) and count($txt_rely_row))){
                                    if(($txt_rely_row["dr_key"]!=null)){
                                        $dr_key=$txt_rely_row["dr_key"];
                                    }else{
                                        $dr_key=$sta_parent_stu;
                                    }
                                }else{
                                    $dr_key=$sta_parent_stu;
                                }
                            }



                        $into_stu_guardianSql="INSERT INTO `stu_guardian`(`stu_id`,`parent_prefix`,`parent_fname`,`parent_sname`,`parent_prefix_en`
                                             ,`parent_fname_en`,`parent_sname_en`,`parent_code`,`parent_phone`,`parent_status`)
                                              VALUES ('{$stu_id}','{$sta_parent_prefix}','{$sta_parent_fname}','{$sta_parent_sname}','{$sta_parent_prefix_en}','{$sta_parent_fname_en}','{$sta_parent_sname_en}','{$sta_parent_code}','{$sta_parent_phone}','{$dr_key}')";
                        $into_stu_guardian=new insert_datastu_sw($into_stu_guardianSql);
                            if(($into_stu_guardian->system_insert=="yes")){
        //*************************************
                            }else{
        //*************************************
                            }
                    }
             
            }
    echo "yes";
?>





