<?php
	namespace App\Controllers;
	class EntranceExam extends BaseController{

		public function have_exam_m4(){
			return view('entrance_exam/have_exam_m4/have_exam_m4');
		}
		public function run_exam_m4($rat_year){
			$surrender_rc=array('rat_year'=>$rat_year);
			return view('entrance_exam/have_exam_m4/run_exam_m4',$surrender_rc);
		}
		
		public function have_exam_admission($class_type,$AdmissionYear,$AdmissionY){
			$admission=array('class_type'=>$class_type,'AdmissionYear'=>$AdmissionYear,'AdmissionY'=>$AdmissionY);
			return view('entrance_exam/have_exam_admission/have_exam_admission',$admission);
		}



		public function run_exam_admission($rat_year){
			$surrender_rc=array('rat_year'=>$rat_year);
			return view('entrance_exam/have_exam_admission/run_exam_admission',$surrender_rc);
		}
	}
?>