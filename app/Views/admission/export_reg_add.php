<?php
	date_default_timezone_set('Asia/Bangkok');
	include("tools/database/pdo_data.php");
	include("tools/database/class_pdo.php");
	
	include("tools/database/pdo_conndatastu.php");
	include("tools/database/class_pdodatastu.php");
	
	include("tools/database/pdo_admission.php");
	include("tools/database/class_admission.php");
	
	
	$call_Identification=$Identification;
	$call_y=$y;
	$call_year=$year;
	
		function datatimeA($strDate){
	        $strYear = date("Y",strtotime($strDate))+543;
	        $strMonth= date("n",strtotime($strDate));
	        $strDay= date("j",strtotime($strDate));
	        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	        $strMonthThai=$strMonthCut[$strMonth];
	        return "$strDay $strMonthThai $strYear";
	    }
		
		function datatimeB($strDate){
			
				if($strDate==""){//y-m-d
					$datadmy="";
				}else{
					$strYear=substr($strDate,0,4);
					$strMonth=substr($strDate,5,2);
					$strDay=substr($strDate,8,2);
					$datadmy=$strDay."-".$strMonth."-".$strYear;					
				}
	        return $datadmy;
	    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

<!-- Global stylesheets -->
    <link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/material/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->		
<!--Code Print css-->
	<link rel="stylesheet" href="<?php echo base_url();?>/tools/js/print_css_js/css/normalize.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/tools/js/print_css_js/css/paper.css"> 	
<!--Code Print css End-->

<style>
.psrA{
	margin: auto;
	border: 2px solid #73AD21;
}
</style>

		<style>
			@font-face {
                font-family: 'THSarabunNew';
                src: url('<?php echo base_url();?>/tools/font/thsarabunnew-webfont.eot');
                src: url('<?php echo base_url();?>/tools/font/thsarabunnew-webfont.eot?#iefix') format('embedded-opentype'),
                url('<?php echo base_url();?>/tools/font/thsarabunnew-webfont.woff') format('woff'),
                url('<?php echo base_url();?>/tools/font/THSarabunNew.ttf') format('truetype');
			}
			body{
				font-family: "THSarabunNew";
				font-size: 20px;
				color: #032E3B;
			}
            

		</style>
	
		<style>
			@media print {
				
				@page{
					size: A4;
					margin: 1 cm;
				}
				
				button {
					display:none;
				}
				
				#p_echo{
					display:none;
				}
				
				body{
					font-family: "THSarabunNew";
					font-size: 14pt; 
							
				}
			}
			
			body{
				width: 210mm; height: 296mm;
			}
			.printA{
				width: 210mm; height: 296mm;
			}
		</style>
<!--****************************************************************************-->			
    <script type="text/javascript">
        function setScreenHWCookie() {
            $.cookie('sw',screen.width);
                //$.cookie('sh',screen.height);
            return true;
        }
            setScreenHWCookie();
    </script>

    <?php
		$width_system=filter_input(INPUT_COOKIE,'sw');
		if($width_system>=1200){
			$grid="lg";
		}elseif($width_system<=992){
			$grid="md";
		}elseif($width_system<=768){
			$grid="sm";
		}else{
			$grid="xs";
		}
    ?>
<!--****************************************************************************-->
	
<!-- Core JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
<!-- /core JS files -->	
<!--Code Print js-->
	<script src="<?php echo base_url();?>/tools/js/print_css_js/js/html2canvas.js"></script>	
<!--Code Print js End-->	
</head>

<?php

	$rc_student_admissionSql="SELECT * FROM `rc_student_admission` 
						      WHERE `IDReg` LIKE '{$call_y}%' and `IDCard`='{$call_Identification}'";
	$rc_student_admissionRs=new notrow_admission($rc_student_admissionSql);
	foreach($rc_student_admissionRs->notrow_admission_print() as $admin=>$rc_student_admissionRow){
			
		$stu_prefix=$rc_student_admissionRow["stu_prefix"];
		$stu_txt=new printstu_prefix($stu_prefix);
	
		$stunameTh=$stu_txt->prefix_prefix_SName." ".$rc_student_admissionRow["stu_fname"]." ".$rc_student_admissionRow["stu_sname"];
		$stunameEn="Miss ".$rc_student_admissionRow["stu_fname_e"]." ".$rc_student_admissionRow["stu_sname_e"];

		$nickEn=strtolower($rc_student_admissionRow["nickEn"]);
		$nickEn=ucwords($rc_student_admissionRow["nickEn"]);

		$stu_birth=$rc_student_admissionRow["stu_birth"];
		$stu_birth=date("Y-m-d",strtotime($stu_birth));
		//$stu_birth=datatimeB($stu_birth);	
		
		$dateprint=date("Y-m-d");
		$dateprint=datatimeA($dateprint);
		
		$stu_birth=datatimeA($stu_birth);

		$stu_nation=new db_country($rc_student_admissionRow["stu_nation"]);
		$stu_sun=new db_country($rc_student_admissionRow["stu_sun"]);

		$call_IDReligion=new rc_religion($rc_student_admissionRow["IDReligion"]);
		 


	}
	
	$rc_student_family_admissionSql="SELECT * FROM `rc_student_family_admission` WHERE `IDReg`='{$rc_student_admissionRow["IDReg"]}'";
	$rc_student_family_admissionRs=new notrow_admission($rc_student_family_admissionSql);
	foreach($rc_student_family_admissionRs->notrow_admission_print() as $admin=>$rc_student_family_admissionRow){
		$father_prefix=new printstu_prefix($rc_student_family_admissionRow["father_prefix"]);   
		$mother_prefix=new printstu_prefix($rc_student_family_admissionRow["mother_prefix"]);  
		$parent_prefix=new printstu_prefix($rc_student_family_admissionRow["parent_prefix"]);  
		
		
	}
		
	
	$rc_student_levelSql="SELECT * FROM `rc_student_level` WHERE `IDReg`='{$rc_student_admissionRow["IDReg"]}'";
	$rc_student_levelRs=new notrow_admission($rc_student_levelSql);
	foreach($rc_student_levelRs->notrow_admission_print() as $admin=>$rc_student_levelRow){
		
		if($rc_student_levelRow["stu_level"]==2){
			$callto_level="อนุบาล 2";			
		}else{
			$data_class=new call_level($rc_student_levelRow["stu_level"]);			
			$callto_level=$data_class->Lname;
		}
		

		
		
	}
	
	
	switch($rc_student_admissionRow["stu_level"]){
		case 3:
			$txt_plan="อนุบาล";
			$txt_level="อนุบาล 3";
			$plan_idA="0";
			$plan_idB="99";
			break;
		case 11:
			$txt_plan="ประถมศึกษา";
			$txt_level="ประถมศึกษาปีที่ 1";
			$plan_idA="1";
			$plan_idB="99";
			break;				
		case 31:
			$txt_plan="มัธยมศึกษาตอนต้น";
			$txt_level="มัธยมศึกษาปีที่ 1";
			$plan_idA="2";
			$plan_idB="99";
			break;	
		default:
			$txt_plan="";
			$txt_level="มัธยมศึกษาปีที่ 4";
			$plan_idA="";
			$plan_idB="";
	}
	
	
?>

<body onload="window.print()">
	<div id="p_echo">
		<div class="container psrA">
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<div class="table-responsive">
						<table class="table" align="center">
							<thead>
								<tr>
									<th style="width: 20%">
										<div><button type="button"  class="btn btn-default" onclick="window.print()"><b>พิมพ์&nbsp;ใบสมัครนักเรียนใหม่รอบทั่วไป&nbsp;</b></button></div>
									</th>
								</tr>
								<tr>
									<th style="width: 20%">
										<div><font color="#F70105"><b>ระบบการพิมพ์ &nbsp;รองรับ&nbsp;เว็บเบราว์เซอร์ &nbsp;Google&nbsp;Chrome&nbsp;และ &nbsp;Microsoft&nbsp;Edge&nbsp;เท่านั้น<b></font></div>
									</th>								
								</tr>
							</thead>						
						</table>
						<table class="table" align="center">
							<thead>
								<tr>
									<th style="width: 20%"><div>ขนาดกระดาษ</div></th>
									<th style="width: 20%"><div>แนวกระดาษ</div></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><div>A4&nbsp;:&nbsp;210mm&nbsp;X&nbsp;296mm</div></td>
									<td><div>แนวตั้ง</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>		
			</div>		
		</div>
	</div>

    <section class="sheet padding-10mm printA">

        <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td style="width: 25%;">
                        <div><center><div><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"   style="width: 85px; height: 89px;"/></div></center></div>
						<div>
							<table style="width: 100%;" border="1"  cellpadding="0" cellspacing="0">
								<tbody>
									<tr>
										<td><div>&nbsp;เลขที่ใบสมัคร&nbsp;<?php echo $rc_student_admissionRow["IDReg"];?>&nbsp;<b></b></div></td>
									</tr>
								</tbody>
							</table>
						</div>
                    </td>
                    <td style="width: 73%;">
						<div style="font-family: THSarabunNew; font-size: 22px; text-align: center;"><b>ใบสมัครเพื่อเข้าศึกษาต่อชั้น <?php echo $txt_level;?> ปีการศึกษา <?php echo $call_year;?></b></div> 
						<div style="font-family: THSarabunNew; font-size: 22px; text-align: center;"><b>โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่</b></div>
						<div>
							<?php
								if(($rc_student_admissionRow["stu_level"]>=41)){
									$row_p1=new print_planAdmission($rc_student_levelRow["stu_plan1"]);
									$row_p2=new print_planAdmission($rc_student_levelRow["stu_plan2"]);
								?>					
							<center>
								<table style="width: 90%; font-family: THSarabunNew; font-size: 22px; text-align: center;" border="1" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<div>แผนการเรียน</div>
												<div>&nbsp;&nbsp;อันดับ&nbsp;1&nbsp;<?php echo $row_p1->plan_LName;?></div>  
												<div>&nbsp;&nbsp;อันดับ&nbsp;2&nbsp;<?php echo $row_p2->plan_LName;?></div>  
											</td>
										</tr>
									</tbody>
								</table>
							<center>
						<?php	}elseif(($rc_student_admissionRow["stu_level"]>=31)){ 
									$row_p1=new print_planAdmission($rc_student_levelRow["stu_plan1"]);
									//$row_p2=new print_planAdmission($rc_student_levelRow["stu_plan2"]);
								?>					
							<center>
								<table style="width: 90%; font-family: THSarabunNew; font-size: 22px; text-align: center;" border="1" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<div>ห้องเรียน&nbsp;/&nbsp;แผนการเรียน</div>
												<div>&nbsp;&nbsp;&nbsp;ห้องเรียน&nbsp;<?php echo $row_p1->plan_LName;?></div> 
											</td>
										</tr>
									</tbody>
								</table>
							<center>
						<?php   }else{
									//**************************************************
								}
						?>
						</div>						
                    </td>
                    <td style="width: 5%;">
                        <div><img src="<?php echo base_url();?>/tools/img/กรอกรูป.JPG" style="width: 3.00cm; height: 4.00cm" alt="กรอกรูป"/></div>
                    </td>					
                </tr>
            </tbody>		
		</table>
		
		<table style="width: 100%; font-family: THSarabunNew; font-size: 22px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>1.&nbsp;ข้อมูลนักเรียน</div>
						<div>ชื่อ-สกุล&nbsp;ภาษาไทย<input type="text" size="35" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stunameTh;?>" readonly="readonly" required="required">ชื่อ-สกุล ภาษาอังกฤษ<input type="text" size="32" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stunameEn;?>" readonly="readonly" required="required"></div>
						<div>ชื่อเล่น&nbsp;(ภาษาไทย)<input type="text" size="35" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_admissionRow["nickTh"];?>" readonly="readonly" required="required">ชื่อเล่น&nbsp;(ภาษาอังกฤษ)<input type="text" size="32" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $nickEn;?>" readonly="readonly" required="required"></div>
						<div>เลขบัตรประชาชน<input type="text" size="13" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_admissionRow["IDCard"];?>" readonly="readonly" required="required">วัน/เดือน/ปี&nbsp;เกิด<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_birth;?>" readonly="readonly" required="required">เชื้อชาติ<input type="text" size="14" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_nation->nation_name_th;?>" readonly="readonly" required="required">สัญชาติ<input type="text" size="14" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_sun->nation_name_th;?>" readonly="readonly" required="required"></div>
						<div>ศาสนา<input type="text" size="11" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $call_IDReligion->Religion;?>" readonly="readonly" required="required">ที่อยู่ปัจจุบัน&nbsp;บ้านเลขที่<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_admissionRow['stu_hno'];?>" readonly="readonly" required="required">หมู่ที่<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_admissionRow['stu_moo'];?>" readonly="readonly" required="required">ซอย<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_admissionRow['stu_soi'];?>" readonly="readonly" required="required"></div>
	
	<?php
		$District=new data_District($rc_student_admissionRow["stu_amphur"]);//อำเภอ
		$Province=new data_Province($rc_student_admissionRow["stu_province"]);//จังหวัด
		$Subdistrict=new data_Subdistrict($rc_student_admissionRow["stu_tumbon"]);//ตำบล
	?>					
						
						
						<div>ถนน<input type="text" size="40" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_admissionRow["stu_road"];?>" readonly="readonly" required="required">ตำบล<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $Subdistrict->DISTRICT_NAME;?>" readonly="readonly" required="required">อำเภอ<input type="text" size="25" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $District->AMPHUR_NAME;?>" readonly="readonly" required="required"></div>
						<div>จังหวัด<input type="text" size="30" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $Province->PROVINCE_NAME;?>" readonly="readonly" required="required">รหัสไปรษณีย์<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_admissionRow['stu_zipcode'];?>" readonly="readonly" required="required">ปัจจุบันกำลังศึกษาอยู่ในระดับชั้น<input type="text" size="17" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $callto_level;?>" readonly="readonly" required="required"></div>
						
						<div>โรงเรียน<input type="text" size="35" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_levelRow["stu_oldsch"];?>" readonly="readonly" required="required">จังหวัด<input type="text" size="30" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_levelRow["stu_schprovince"];?>" readonly="readonly" required="required">เกรดเฉลี่ยสะสม<input type="text" size="7" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_levelRow["stu_avg"];?>" readonly="readonly" required="required"></div>
						
					</td>
				</tr>
			</tbody>
		</table>
		<br>
		<table style="width: 100%; font-family: THSarabunNew; font-size: 22px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>2.&nbsp;ข้อมูลบิดา-มารดา-ผู้ปกครอง</div>
						<div>ชื่อ-สกุลบิดา<input type="text" size="37" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $father_prefix->prefix_prefix_SName.'&nbsp;'.$rc_student_family_admissionRow['father_fname'].'&nbsp;'.$rc_student_family_admissionRow['father_sname']?>" readonly="readonly" required="required">เบอร์โทรศัพท์<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow['father_tel'];?>" readonly="readonly" required="required">เลขบัตรประชาชน<input type="text" size="13" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow['father_code'];?>" readonly="readonly" required="required"></div>		
						<div>Email&nbsp;Address<input type="text" size="40" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow["father_email"];?>" readonly="readonly" required="required"></div>
					
						<div>ชื่อ-สกุลมารดา<input type="text" size="35" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mother_prefix->prefix_prefix_SName.'&nbsp;'.$rc_student_family_admissionRow['mother_fname'].'&nbsp;'.$rc_student_family_admissionRow['mother_sname'];?>" readonly="readonly" required="required">เบอร์โทรศัพท์<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow['mother_tel'];?>" readonly="readonly" required="required">เลขบัตรประชาชน<input type="text" size="13" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow['mother_code'];?>" readonly="readonly" required="required"></div>		
						<div>Email&nbsp;Address<input type="text" size="40" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow['mother_email'];?>" readonly="readonly" required="required"></div>
				

						<div>ชื่อ-สกุลผู้ปกครอง<input type="text" size="32" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $parent_prefix->prefix_prefix_SName.'&nbsp;'.$rc_student_family_admissionRow['parent_fname'].'&nbsp;'.$rc_student_family_admissionRow['parent_sname'];?>" readonly="readonly" required="required">ความสัมพันธ์<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow['parent_stu'];?>" readonly="readonly" required="required">เบอร์โทรศัพท์<input type="text" size="13" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow['parent_phone'];?>" readonly="readonly" required="required"></div>		
						<div>เลขบัตรประชาชน<input type="text" size="13" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow["parent_code"];?>" readonly="readonly" required="required">Email&nbsp;Address<input type="text" size="40" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $rc_student_family_admissionRow['parent_email'];?>" readonly="readonly" required="required"></div>				
					
					</td>
				</tr>
			</tbody>
		</table>
		<br>
		<table style="width: 100%; font-family: THSarabunNew; font-size: 22px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>3.&nbsp;ข้าพเจ้าจะปฏิบัติตามระเบียบการรับสมัครนักเรียนเพื่อเข้าศึกษาต่อชั้น&nbsp;<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $txt_level;?>" readonly="readonly" required="required">&nbsp;ประจำปีการศึกษา&nbsp;<input type="text" size="6" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $call_year;?>" readonly="readonly" required="required">&nbsp;ของโรงเรียนเรยีนาเชลีวิทยาลัยทุกประการ&nbsp;และได้แนบเอกสารประกอบการสมัครเรียนมาพร้อมกับใบสมัครนี้โดยครบถ้วนแล้ว</div>
					</td>
				</tr>
			</tbody>
		</table>	

		<br>
		<table style="width: 100%; font-family: THSarabunNew; font-size: 22px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 45%;">
						<table style="width: 100%; font-family: THSarabunNew; font-size: 16px;" border="1" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td>
										<div><center><b>เอกสารประกอบการสมัครเรียน&nbsp;มีดังนี้</b></center></div>
										<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="10" height="10" alt=""/>&nbsp;รูปถ่ายนักเรียน ขนาด 1.5 นิ้ว จำนวน 1 ใบ (ถ่ายไว้ไม่เกิน 6 เดือน)&nbsp;</div>
										<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="10" height="10" alt=""/>&nbsp;สำเนาสูติบัตรนักเรียน จำนวน 1 ฉบับ&nbsp;</div>
										<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="10" height="10" alt=""/>&nbsp;สำเนาทะเบียนบ้านนักเรียน จำนวน 1 ฉบับ&nbsp;</div>
										<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="10" height="10" alt=""/>&nbsp;สำเนาใบเปลี่ยนชื่อ-สกุล นักเรียน (ถ้ามี)&nbsp;</div>
										<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="10" height="10" alt=""/>&nbsp;หนังสือรับรองการเป็นนักเรียนจากสถานศึกษา</div>
										<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หรือสำเนาเอกสารแสดงผลการเรียน&nbsp;หรือหนังสือรับรองผลการเรียน&nbsp;</div>
										<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="10" height="10" alt=""/>&nbsp;กรณีโควตาภายนอก&nbsp;ใบรับรองนักเรียนโควตาโรงเรียนเรยีนาเชลีวิทยาลัย&nbsp;</div>									
									</td>
								</tr>
							</tbody>
						</table> 
					</td>
					<td style="width: 30%;">
						<center>
							<div>ลงชื่อ<input type="text" size="22" style="font-family: THSarabunNew; font-size: 19px; border:0px; text-align: center; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $parent_prefix->prefix_prefix_SName.'&nbsp;'.$rc_student_family_admissionRow['parent_fname'].'&nbsp;'.$rc_student_family_admissionRow['parent_sname'];?>" readonly="readonly" required="required">ผู้ปกครอง</div>
							<div>วันที่<input type="text" size="20" style="font-family: THSarabunNew; font-size: 19px; border:0px; text-align: center; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $dateprint;?>" readonly="readonly" required="required"></div>
							<br>
							<div>&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ<input type="text" size="20" style="font-family: THSarabunNew; font-size: 19px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;" readonly="readonly" required="required">ผู้ตรวจเอกสาร</div>
						</center>	
							<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<input type="text" size="20" style="font-family: THSarabunNew; font-size: 19px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;" readonly="readonly" required="required">)</div>
						
						
					</td>					
				</tr>				
			</tbody>
		</table> 	

    </section>
	
   
</body>
</html>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			










