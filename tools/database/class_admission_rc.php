<?php header('Content-Type: text/html; charset=UTF-8'); ?>




<?php
    class ManageConditionList{
        public $MCL_Type,$MCL_key,$MCL_year,$MCL_CT_no;
        public $MCL_Array,$MCL_Error;
        function __construct($MCL_Type,$MCL_key,$MCL_year,$MCL_CT_no){
            $this->MCL_Type=$MCL_Type;
            $this->MCL_key=$MCL_key;
            $this->MCL_year=$MCL_year;
            $this->MCL_CT_no=$MCL_CT_no;
            $datatime=date("Y-m-d H:i:s");
            $MCL_Error="yes";
            $MCL_Array=Array();
			$mobile=$_SERVER["HTTP_USER_AGENT"]; 
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$AdmissionRegina=new AdmissionRegina($IdAdder);
			$pdo_admission_rc=$AdmissionRegina->CallAdmissionRegina();

                if(($this->MCL_Type=="add")){
                   try{
						$MCL_Sql="INSERT INTO `condition_list` ( `con_list_key`, `con_list_year`, `con_list_ip`, `con_list_mobile`, `CT_no`, `con_list_datetime`) 
								  VALUES ('{$this->MCL_key}', '{$this->MCL_year}', '{$IdAdder}', '{$mobile}', '{$this->MCL_CT_no}', '{$datatime}');";		
						$pdo_admission_rc->exec($MCL_Sql);
						$MCL_Array="-";
						$MCL_Error="no";
				   }catch(PDOException $e){
						$MCL_Array="-";
						$MCL_Error="yes";
				   }
                }elseif(($this->MCL_Type=="read")){
					try{
                        $MCL_Sql="SELECT * FROM `condition_list` ORDER BY `con_list_no` ASC;";
                            if(($MCL_Rs=$pdo_admission_rc->query($MCL_Sql))){
                                while($MCL_Row=$MCL_Rs->Fetch(PDO::FETCH_ASSOC)){
                                    if((is_array($MCL_Row) and count($MCL_Row))){
                                        $MCL_Array[]=$MCL_Row;
                                        $MCL_Error="no";
                                    }else{
                                        $MCL_Array="-";
                                        $MCL_Error="yes";
                                    }
                                }
                            }else{
                                $MCL_Array="-";
                                $MCL_Error="yes";
                            }
					}catch(PDOException $e){
                        $MCL_Array="-";
                        $MCL_Error="yes";						
					}
                }elseif(($this->MCL_Type=="read_id")){
					try{
                        $MCL_Sql="SELECT * FROM `condition_list` WHERE CT_no='{$this->MCL_CT_no}' ORDER BY `con_list_no` ASC;";
                            if(($MCL_Rs=$pdo_admission_rc->query($MCL_Sql))){
                                while($MCL_Row=$MCL_Rs->Fetch(PDO::FETCH_ASSOC)){
                                    if((is_array($MCL_Row) and count($MCL_Row))){
                                        $MCL_Array[]=$MCL_Row;
                                        $MCL_Error="no";
                                    }else{
                                        $MCL_Array="-";
                                        $MCL_Error="yes";
                                    }
                                }
                            }else{
                                $MCL_Array="-";
                                $MCL_Error="yes";
                            }
					}catch(PDOException $e){
                        $MCL_Array="-";
                        $MCL_Error="yes";
					}
                }else{
                    $MCL_Array="-";
                    $MCL_Error="yes";
                }
            $pdo_admission_rc=null;
            $this->MCL_Array=$MCL_Array;
            $this->MCL_Error=$MCL_Error;
        }function RunMclRow(){
            return $this->MCL_Array;
        }function RunMclError(){
            return $this->MCL_Error;
        }
    }
?>




<?php
    class ManageConditionType{
        public $MCT_Type,$MCT_ct_no,$MCT_ct_txt;
        public $MCT_Array,$MCT_Error;
        function __construct($MCT_Type,$MCT_ct_no,$MCT_ct_txt){
            $this->MCT_Type=$MCT_Type;
            $this->MCT_ct_no=$MCT_ct_no;
            $this->MCT_ct_txt=$MCT_ct_txt;
            $MCT_Array=array();
            $MCT_Error="yes";
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$AdmissionRegina=new AdmissionRegina($IdAdder);
			$pdo_admission_rc=$AdmissionRegina->CallAdmissionRegina();
                if(($this->MCT_Type=="read_all")){
					try{
                        $MCT_Sql="SELECT `CT_no`,`CT_txt` 
                                FROM `condition_type` 
                                ORDER BY `CT_no` ASC";
                            if(($MCT_Rs=$pdo_admission_rc->query($MCT_Sql))){
                                while($MCT_Row=$MCT_Rs->Fetch(PDO::FETCH_ASSOC)){
                                    if((is_array($MCT_Row) and count($MCT_Row))){
                                        $MCT_Array[]=$MCT_Row;
                                        $MCT_Error="no";
                                    }else{
                                        $MCT_Array="-";
                                        $MCT_Error="yes";
                                    }
                                }
                            }else{
                                $MCT_Array="-";
                                $MCT_Error="yes";
                            }
					}catch(PDOException $e){
                        $MCT_Array="-";
                        $MCT_Error="yes";
					}

                }elseif(($this->MCT_Type=="read_id")){
					try{
                        $MCT_Sql="SELECT `CT_no`,`CT_txt` 
                                FROM `condition_type`
                                WHERE`CT_no`='{$this->MCT_ct_no}' 
                                ORDER BY `CT_no` ASC;";
                            if(($MCT_Rs=$pdo_admission_rc->query($MCT_Sql))){
                                while($MCT_Row=$MCT_Rs->Fetch(PDO::FETCH_ASSOC)){
                                    if((is_array($MCT_Row) and count($MCT_Row))){
                                        $MCT_Array[]=$MCT_Row;
                                        $MCT_Error="no";
                                    }else{
                                        $MCT_Array="-";
                                        $MCT_Error="yes";
                                    }
                                }
                            }else{
                                $MCT_Array="-";
                                $MCT_Error="yes";
                            }
					}catch(PDOException $e){
                        $MCT_Array="-";
                        $MCT_Error="yes";
					}
                }else{
                    $MCT_Array="-";
                    $MCT_Error="yes";
                }
            $pdo_admission_rc=null;
            $this->MCT_Array=$MCT_Array;
            $this->MCT_Error=$MCT_Error;
        }function RunMctRow(){
            return $this->MCT_Array;
        }function RunMctError(){
            return $this->MCT_Error;
        }
    }
?>

<?php
	class SudAdmissionRc{
		public $SudAc_Type,$SudAc_Nacc,$SudAc_year,$SudAc_y;
		public $admission_array,$admission_error;
		function __construct($SudAc_Type,$SudAc_Nacc,$SudAc_year,$SudAc_y){
			$this->SudAc_Type=$SudAc_Type;
			$this->SudAc_Nacc=$SudAc_Nacc;
			$this->SudAc_year=$SudAc_year;
			$this->SudAc_y=$SudAc_y;

			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$AdmissionRegina=new AdmissionRegina($IdAdder);
			$pdo_admission_rc=$AdmissionRegina->CallAdmissionRegina();

			$admission_array=array();
			$admission_error="yes";

				if(($this->SudAc_Type=="admission")){
					try{
						$admission_sql="SELECT *  
										FROM `rc_student_admission` 
										WHERE `IDReg` 
										LIKE '{$this->SudAc_y}%' 
										AND `IDCard`='{$this->SudAc_Nacc}';";
							if(($admission_rs=$pdo_admission_rc->query($admission_sql))){
								while($admission_row=$admission_rs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($admission_row) && count($admission_row)){
										$admission_array[]=$admission_row;
										$admission_error="no";
									}else{
										$admission_array="-";
										$admission_error="yes";
									}
								}
							}else{
								$admission_array="-";
								$admission_error="yes";
							}
					}catch(PDOException $e){
						$admission_array="-";
						$admission_error="yes";
					}

				}elseif(($this->SudAc_Type=="admission_class")){
					$admission_sql="SELECT *  
									FROM `insert_student_admission` 
									WHERE `IDReg` 
									LIKE '{$this->SudAc_y}%' 
									AND `IDCard`='{$this->SudAc_Nacc}';";
						if(($admission_rs=$pdo_admission_rc->query($admission_sql))){
							while($admission_row=$admission_rs->Fetch(PDO::FETCH_ASSOC)){
								if(is_array($admission_row) && count($admission_row)){
									$admission_array[]=$admission_row;
									$admission_error="no";
								}else{
									$admission_array="-";
									$admission_error="yes";
								}
							}
						}else{
							$admission_array="-";
							$admission_error="yes";
						}
				}else{
					$admission_array="-";
					$admission_error="yes";
				}
			$pdo_admission_rc=null;
			$this->admission_array=$admission_array;
			$this->admission_error=$admission_error;
		}function RunAdmissionRow(){
			return $this->admission_array;
		}function RunAdmissionError(){
			return $this->admission_error;
		}
	}

?>

<?php
	class RowReginaClass{
		public $RRC_year;
		public $ReginaClassArray;
		function __construct($RRC_year){
			$this->RRC_year=$RRC_year;

			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$AdmissionRegina=new AdmissionRegina($IdAdder);
			$pdo_admission_rc=$AdmissionRegina->CallAdmissionRegina();
			$ReginaClassArray=array();
			$ReginaClassSql="SELECT * FROM `regina_class` WHERE `rc_yaer`='{$this->RRC_year}'";
				if($ReginaClassRs=$pdo_admission_rc->query($ReginaClassSql)){
					while($ReginaClassRow=$ReginaClassRs->Fetch(PDO::FETCH_ASSOC)){
						$ReginaClassArray[]=$ReginaClassRow;
					}
				}else{
					$ReginaClassArray=null;
				}
			if(isset($ReginaClassArray)){
				$this->ReginaClassArray=$ReginaClassArray;
				$pdo_admission_rc=null;
			}else{
				$pdo_admission_rc=null;
			}
		}function RunRowReginaClass(){
			if(isset($this->ReginaClassArray)){
				return $this->ReginaClassArray;
			}else{}
		}
	}
?>

<?php
	class PrintStudentAdmission{
		public $PSA_IDReg,$PSA_IDCard;

		public $IDReg,$IDCard,$prefix,$fnameTh,$snameTh,$fnameEn,$snameEn,$prefixTxt,$level;

		function __construct($PSA_IDReg,$PSA_IDCard){
			$this->PSA_IDReg=$PSA_IDReg;
			$this->PSA_IDCard=$PSA_IDCard;
			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$AdmissionRegina=new AdmissionRegina($IdAdder);
			$pdo_admission_rc=$AdmissionRegina->CallAdmissionRegina();
			
			$InsertAdmissionSql="SELECT `IDReg`,`IDCard`,`stu_prefix`,`stu_fname`,`stu_sname`,`stu_fname_e`,`stu_sname_e`,`stu_level` 
								 FROM `insert_student_admission` 
								 WHERE `IDReg`='{$this->PSA_IDReg}' AND `IDCard`='{$this->PSA_IDCard}'";
			
				if($InsertAdmissionRs=$pdo_admission_rc->query($InsertAdmissionSql)){
					$InsertAdmissionRow=$InsertAdmissionRs->Fetch(PDO::FETCH_ASSOC);
						if(is_array($InsertAdmissionRow) && count($InsertAdmissionRow)){
							$IDReg=$InsertAdmissionRow["IDReg"];
							$IDCard=$InsertAdmissionRow["IDCard"];
							$prefix=$InsertAdmissionRow["stu_prefix"];
								if($prefix==2){
									$prefixTxt="เด็กหญิง";
								}elseif($prefix==4){
									$prefixTxt="นางสาว";
								}else{
									$prefixTxt=null;
								}							
							$fnameTh=$InsertAdmissionRow["stu_fname"];
							$snameTh=$InsertAdmissionRow["stu_sname"];
							$fnameEn=$InsertAdmissionRow["stu_fname_e"];
							$snameEn=$InsertAdmissionRow["stu_sname_e"];
							$level=$InsertAdmissionRow["stu_level"];
						}else{
							$IDReg=null;
							$IDCard=null;
							$prefix=null;
							$fnameTh=null;
							$snameTh=null;
							$fnameEn=null;
							$snameEn=null;
							$level=null;							
						}
				}else{
					$IDReg=null;
					$IDCard=null;
					$prefix=null;
					$fnameTh=null;
					$snameTh=null;
					$fnameEn=null;
					$snameEn=null;
					$level=null;					
				}
				
				if($IDReg==null and $IDCard==null){
					
					$CallsAdmissionSql="SELECT `IDReg`,`IDCard`,`stu_prefix`,`stu_fname`,`stu_sname`,`stu_fname_e`,`stu_sname_e`,`stu_level` 
									    FROM `rc_student_admission` 
										WHERE `IDReg`='{$this->PSA_IDReg}' AND `IDCard`='{$this->PSA_IDCard}'";
						if($CallsAdmissionRs=$pdo_admission_rc->query($CallsAdmissionSql)){
							$CallsAdmissionRow=$CallsAdmissionRs->Fetch(PDO::FETCH_ASSOC);
								if(is_array($CallsAdmissionRow) && count($CallsAdmissionRow)){
									$IDReg=$CallsAdmissionRow["IDReg"];
									$IDCard=$CallsAdmissionRow["IDCard"];
									$prefix=$CallsAdmissionRow["stu_prefix"];
									
										if($prefix==2){
											$prefixTxt="เด็กหญิง";
										}elseif($prefix==4){
											$prefixTxt="นางสาว";
										}else{
											$prefixTxt=null;
										}
									
									$fnameTh=$CallsAdmissionRow["stu_fname"];
									$snameTh=$CallsAdmissionRow["stu_sname"];
									$fnameEn=$CallsAdmissionRow["stu_fname_e"];
									$snameEn=$CallsAdmissionRow["stu_sname_e"];
									$level=$CallsAdmissionRow["stu_level"];
								}else{
									$IDReg=null;
									$IDCard=null;
									$prefix=null;
									$fnameTh=null;
									$snameTh=null;
									$fnameEn=null;
									$snameEn=null;	
									$prefixTxt=null;
									$level=null;
								}
						}else{
							$IDReg=null;
							$IDCard=null;
							$prefix=null;
							$fnameTh=null;
							$snameTh=null;
							$fnameEn=null;
							$snameEn=null;
							$prefixTxt=null;
							$level=null;							
						}
						
					if($IDReg==null and $IDCard==null){
						$RcAdmissionSql="SELECT `IDReg`, `IDCard`, `stu_prefix`, `stu_fname`, `stu_sname`, `stu_fname_e`, `stu_sname_e`, `stu_level`, `stu_plan` 
										 FROM `student_rc` 
										 WHERE `IDReg`='{$this->PSA_IDReg}' AND `IDCard`='{$this->PSA_IDCard}'";
							if($RcAdmissionRs=$pdo_admission_rc->query($RcAdmissionSql)){
								$RcAdmissionRow=$RcAdmissionRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($RcAdmissionRow) && count($RcAdmissionRow)){
										$IDReg=$RcAdmissionRow["IDReg"];
										$IDCard=$RcAdmissionRow["IDCard"];
										$prefix=$RcAdmissionRow["stu_prefix"];
										
											if($prefix==2){
												$prefixTxt="เด็กหญิง";
											}elseif($prefix==4){
												$prefixTxt="นางสาว";
											}else{
												$prefixTxt=null;
											}
										
										$fnameTh=$RcAdmissionRow["stu_fname"];
										$snameTh=$RcAdmissionRow["stu_sname"];
										$fnameEn=$RcAdmissionRow["stu_fname_e"];
										$snameEn=$RcAdmissionRow["stu_sname_e"];
										$level=$RcAdmissionRow["stu_level"];
									}else{
										$IDReg=null;
										$IDCard=null;
										$prefix=null;
										$fnameTh=null;
										$snameTh=null;
										$fnameEn=null;
										$snameEn=null;	
										$prefixTxt=null;
										$level=null;
									}
							}else{
								$IDReg=null;
								$IDCard=null;
								$prefix=null;
								$fnameTh=null;
								$snameTh=null;
								$fnameEn=null;
								$snameEn=null;
								$prefixTxt=null;
								$level=null;
							}						
					}else{}	
						
						
				}else{}
				
				if(isset($IDReg,$IDCard)){
					$this->IDReg=$IDReg;
					$this->IDCard=$IDCard;
					$this->prefix=$prefix;
					$this->fnameTh=$fnameTh;
					$this->snameTh=$snameTh;
					$this->fnameEn=$fnameEn;
					$this->snameEn=$snameEn;
					$this->prefixTxt=$prefixTxt;
					$this->level=$level;
					$pdo_admission_rc=null;
				}else{
					$pdo_admission_rc=null;
				}
		}function __destruct(){
			if(isset($this->IDReg,$this->IDCard)){
				$this->IDReg;
				$this->IDCard;
				$this->prefix;
				$this->fnameTh;
				$this->snameTh;
				$this->fnameEn;
				$this->snameEn;
				$this->prefixTxt;
				$this->level;
			}else{}
		}
	}
?>


<?php
	class PrintReginaClass{
		public $PRC_key,$PRC_year;
		public $PRC_IDReg,$PRC_IDCard,$PRC_IDstu,$PRC_level,$PRC_plan,$PRC_home;
		function __construct($PRC_key,$PRC_year){
			$this->PRC_key=$PRC_key;
			$this->PRC_year=$PRC_year;
			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$AdmissionRegina=new AdmissionRegina($IdAdder);
			$pdo_admission_rc=$AdmissionRegina->CallAdmissionRegina();
			
			$PrintReginaClassSql="SELECT `rc_IDReg`,`rc_IDCard`,`rc_IDstu`,`rc_level`,`rc_plan`,`rc_home` 
								  FROM `regina_class` 
								  WHERE `rc_IDstu`='{$this->PRC_key}' 
								  AND `rc_yaer`='{$this->PRC_year}';";
				if($PrintReginaClassRs=$pdo_admission_rc->query($PrintReginaClassSql)){
					$PrintReginaClassRow=$PrintReginaClassRs->Fetch(PDO::FETCH_ASSOC);
						if(is_array($PrintReginaClassRow) && count($PrintReginaClassRow)){
							$PRC_IDReg=$PrintReginaClassRow["rc_IDReg"];
							$PRC_IDCard=$PrintReginaClassRow["rc_IDCard"];
							$PRC_IDstu=$PrintReginaClassRow["rc_IDstu"];
							$PRC_level=$PrintReginaClassRow["rc_level"];
							$PRC_plan=$PrintReginaClassRow["rc_plan"];
							$PRC_home=$PrintReginaClassRow["rc_home"];
						}else{
							$PRC_IDReg=null;
							$PRC_IDCard=null;
							$PRC_IDstu=null;
							$PRC_level=null;
							$PRC_plan=null;
							$PRC_home=null;
						}
				}else{
					$PRC_IDReg=null;
					$PRC_IDCard=null;
					$PRC_IDstu=null;
					$PRC_level=null;
					$PRC_plan=null;
					$PRC_home=null;					
				}
			
			if(isset($PRC_IDReg,$PRC_IDCard,$PRC_IDstu)){
				$this->PRC_IDReg=$PRC_IDReg;
				$this->PRC_IDCard=$PRC_IDCard;
				$this->PRC_IDstu=$PRC_IDstu;
				$this->PRC_level=$PRC_level;
				$this->PRC_plan=$PRC_plan;
				$this->PRC_home=$PRC_home;
				$pdo_admission_rc=null;
			}else{
				$pdo_admission_rc=null;
			}
		}function __destruct(){
			if(isset($this->PRC_IDReg,$this->PRC_IDCard,$this->PRC_IDstu)){
				$this->PRC_IDReg;
				$this->PRC_IDCard;
				$this->PRC_IDstu;
				$this->PRC_level;
				$this->PRC_plan;
				$this->PRC_home;
			}else{}
		}
	}
?>

