<?php

namespace App\Controllers;

class Admission extends BaseController{
    public function index(){
        return view('admission/admission');
    }
	
	public function kindergarten(){
		return view('admission/kindergarten');
	}public function primary(){
		return view('admission/primary');
	}public function secondary1(){
		return view('admission/secondary1');
	}public function secondary4(){
		return view('admission/secondary4');
	}

	public function business_health(){
		return view('admission/business_health');
	}public function culinary_program(){
		return view('admission/culinary_program');
	}
	
	public function export_reg_add($Identification,$y,$year){ //ใบสมัครรอบทั่วไป
		$admission_run=array('Identification'=>$Identification,'y'=>$y,'year'=>$year);
		return view('admission/export_reg_add',$admission_run);
	}
	
	public function print_admission($user_login,$user_card,$user_level,$user_plan){ //มอยตัวนักเรียนรอบทั่วไป
		$admission_run=array('user_login'=>$user_login,'user_card'=>$user_card,'user_level'=>$user_level,'user_plan'=>$user_plan);
		return view('admission/print_admission',$admission_run);
	}
}
?>