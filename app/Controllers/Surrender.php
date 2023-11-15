<?php
	namespace App\Controllers;
	class Surrender extends BaseController{
		
		public function oepn_admin($rat_year){
			$surrender_rc=array('rat_year'=>$rat_year);
			return view('surrender/oepn_admin',$surrender_rc);
		}
		
		public function surrender_p($rat_year){
			$surrender_rc=array('admission_year'=>$rat_year);
			return view('surrender/surrender_p',$surrender_rc);
		}public function surrender_m($rat_year){
			$surrender_rc=array('admission_year'=>$rat_year);
			return view('surrender/surrender_m',$surrender_rc);
		}
		
		public function update(){
			return view('surrender/update');
		}

		public function load_update($admission_key){
			$lu_row=array('admission_key'=>$admission_key);
			return view('surrender/load_update',$lu_row);
		}
				
	}
?>