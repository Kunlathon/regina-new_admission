<?php
	namespace App\Controllers;
	class Scholarship extends BaseController{
		public function index(){
			return view('scholarship/scholarship_admission');
		}
		public function scholarship_data(){
			return view('scholarship/scholarship_data');
		}
	}
?>