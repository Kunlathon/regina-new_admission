<?php
//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
//set
    header('Content-Type: text/html; charset=UTF-8'); 
    $InputScholarshipAdmission=\Config\Services::request();
//set end  
//include
	include("tools/database/pdo_admission_rc.php");
	include("tools/database/class_admission_rc.php");


    $form_condition_save=\Config\Services::request();

    $check_login=$form_condition_save->getPost('check_login');
    $check_condition=$form_condition_save->getPost('check_condition');
    $check_year=$form_condition_save->getPost('check_year');

    $SaveCondition=new ManageConditionList("add",$check_login,$check_year,$check_condition);
    echo  $check_login."<br>".$check_condition."<br>".$check_year;
?>