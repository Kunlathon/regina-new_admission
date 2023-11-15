<?php
//+++++++++++++++++++++++++++++++++++++++++++****************

	include("tools/database/pdo_data.php");
	include("tools/database/class_pdo.php");	
	
	include("tools/database/pdo_conndatastu.php");
	include("tools/database/class_pdodatastu.php");

	include("tools/database/database_swip/pdo_data_sw.php");
	include("tools/database/database_swip/class_pdo_sw.php");	
	
	include("tools/database/database_swip/pdo_conndatastu_sw.php");
	include("tools/database/database_swip/class_pdodatastu_sw.php");
	
	include("tools/database/pdo_admission.php");	
	include("tools/database/class_admission.php");
    
    include("tools/js/pay.php");
    include("tools/js/CRC_CCITT.php");
    
    include("tools/js/QRcodefromgoogle/arohamQR.php");
	
	include("tools/database/database_books/pdo_books.php");
	include("tools/database/database_books/class_books.php");
	include("tools/database/function/pay_scb.php");
	
	
//+++++++++++++++++++++++++++++++++++++++++++****************
	
	$set_y_next=substr($user_login,0,2);
	$set_y_txt=$set_y_next-1;
	

	$next_year="25".$set_y_next;
	$txt_year="25".$set_y_txt;
	$next_year_mini=$set_y_next; 
	$txt_year_mini=$set_y_txt;
	$date_time=date("Y-m-d H:i:s");
//---------------------------------------------------	
	$stuID=$user_login;
	$user_card=$user_card;
	$user_level=$user_level;
	$user_plan=$user_plan;	
//---------------------------------------------------	
	//ระดับชั้น
		switch ($user_level){
			case "3":
					$leve_name="อนุบาล 3";
					$leve_ID="3";
					$leve_EnKey="K3";
			break;				
			case "11":
					$leve_name="ประถมศึกษาปีที่ 1";
					$leve_ID="11";	
					$leve_EnKey="P1";
			break;				
			case "31":
					$leve_name="มัธยมศึกษาปีที่ 1";
					$leve_ID="31";
					$leve_EnKey="M1";
			break;
				
			case "41":
					$leve_name="มัธยมศึกษาปีที่ 4";
					$leve_ID="41";
					$leve_EnKey="M4";
			break;
				$leve_name="-";
				$leve_ID="-";
				$leve_EnKey="-";
			default:
					
		}

//ระดับชั้น
//-------------------------------------------------------
		function datethai($strDate){
	        $strYear = date("Y",strtotime($strDate))+543;
	        $strMonth= date("n",strtotime($strDate));
	        $strDay= date("j",strtotime($strDate));
	        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	        $strMonthThai=$strMonthCut[$strMonth];
	        return "$strDay $strMonthThai $strYear";
	    }
//-------------------------------------------------------


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

<!-- Global stylesheets -->
    <!--<link href="<?php //echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/material/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
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
	<!--<script src="<?php //echo base_url();?>/tools/js/print_css_js/js/html2canvas.js"></script>-->	
<!--Code Print js End-->	
</head>


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
										<div><button type="button"  class="btn btn-default" onclick="window.print()"><b>พิมพ์&nbsp;ใบมอบตัวนักเรียนใหม่รอบทั่วไป&nbsp;</b></button></div>
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
  
		
		
		<table style="width: 100%; vertical-align: top;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 20%; font-size: 28px; text-align: center; font-family: THSarabunNew; font-weight: bold;">
						<div><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" style="width: 75px; height: 73px;" alt=""/></div>
						<div>&nbsp;</div>
						<div>
							<table style="width: 100%; font-size: 20px; text-align: left; font-family: THSarabunNew; font-weight: bold; vertical-align: top;" border="1" cellpadding="0" cellspacing="0">
								<tbody>
									<tr>
										<td>
											<div>&nbsp;เลขประจำตัว<input type="text" size="6" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;" readonly="readonly" required="required"/></div>
											<div>&nbsp;สีบ้าน<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;" readonly="readonly" required="required"/></div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td>
					<td style="width: 60%; font-size: 25px; text-align: center; font-family: THSarabunNew; font-weight: bold;">
						<div>ใบมอบตัวนักเรียน&nbsp;ชั้น<?php echo $leve_name;?>&nbsp;ปีการศึกษา&nbsp;<?php echo $next_year;?></b></div>  
						<div>โรงเรียนเรยีนาเชลีวิทยาลัย&nbsp;จังหวัดเชียงใหม่</div>  
						<div>รอบนักเรียนทั่วไป</div>
						
						<div>
							<?php
								$admission_sturcSql="SELECT `rat_IDReg`,`rat_year`,`rat_level`,`rat_plan` 
													 FROM `rc_admission_test` 
													 WHERE `rat_IDReg`='{$stuID}'";
								$admission_sturc=new notrow_admission($admission_sturcSql);
								foreach($admission_sturc->notrow_admission_print() as $rc_key=>$admission_sturcRow){
									$qr_stuid=$admission_sturcRow["rat_IDReg"];
						            $qr_year=$admission_sturcRow["rat_year"];
						            $qr_level=$admission_sturcRow["rat_level"];
						            $qr_plan=$admission_sturcRow["rat_plan"];
									
										if($qr_stuid!=""){ 
											$call_quota=new print_plan($qr_plan); ?>
											
							<center>
							<table  border="1" cellpadding="0" cellspacing="0" aligh="center" style="width: 95%; font-size: 20px; text-align: center; font-family: THSarabunNew; font-weight: bold; vertical-align: top;">
								 <tbody>
									<tr>
										<?php
											if(($leve_ID=="31")){  ?>
										<td><center><div><font color="#F50206"><b>ห้องเรียน <?php echo $call_quota->plan_LName;?></b></font></div></center></td>						
									<?php	}elseif(($leve_ID=="41")){ ?>		
										<td><center><div><font color="#F50206"><b>แผนการเรียน <?php echo $call_quota->plan_LName;?></b></font></div></center></td>						
									<?php	}else{}?>
									</tr>
								</tbody>
							</table>
							</center>											
											
							<?php		}else{
											
										}
										
								}
                            ?>
						</div>
						
					</td>
					<td style="width: 20%; font-size: 28px; text-align: center; font-family: THSarabunNew; font-weight: bold;">
						<div><img class="img-thumbnail" src="<?php echo base_url();?>/tools/img/กรอกรูป.JPG" style="width: 2.50cm; height: 3.25cm;" alt="กรอกรูป"/></div>
					</td>
				
													
				</tr>
			</tbody>
		</table>		
		
	
		
<?php
//*************************************************************************************************	
	$stu_motherSql="SELECT * FROM `stu_mother` WHERE`stu_id`='{$stuID}';";
	$stu_mother=new notrow_datastu_sw($stu_motherSql);
	foreach($stu_mother->datastu_array as $rc_key=>$stu_motherRow){}



	$stu_mother_addressSql="SELECT * FROM `stu_mother_address` WHERE `stu_id`='{$stuID}'";
	$stu_mother_address=new notrow_datastu_sw($stu_mother_addressSql);
	foreach($stu_mother_address->datastu_array as $rc_key=>$stu_mother_addressRow){}	
	
	

	$stu_mother_addwordSql="SELECT * FROM `stu_mother_addword` WHERE `stu_id`='{$stuID}';";
	$stu_mother_addword=new notrow_datastu_sw($stu_mother_addwordSql);
	foreach($stu_mother_addword->datastu_array as $rc_key=>$stu_mother_addwordRow){}	
	
	$mother_wordprovince=new data_Province($stu_mother_addwordRow["mother_wordprovince"]);
	
	$m_np=new stu_prefix($stu_motherRow["mother_prefix"]);
	$myname_m=$m_np->prefix_prefixname." ".$stu_motherRow["mother_fname"]." ".$stu_motherRow["mother_sname"];
	
	$mother_tumbon=new data_Subdistrict($stu_mother_addressRow["mother_tumbon"]);//ตำบล
	$mother_amphur=new data_District($stu_mother_addressRow["mother_amphur"]);///อำเภอ
	$mother_province=new data_Province($stu_mother_addressRow["mother_province"]);///จังหวัด
	
	$data_McareerSql="SELECT `dc_key`, `dc_txt2` FROM `data_career` WHERE `dc_key`='{$stu_motherRow["mother_career"]}'";
	$data_McareerRs=new notrow_datastu_sw($data_McareerSql);
	foreach($data_McareerRs->datastu_array as $rc_key=>$data_McareerRow){
		$Mcareer=$data_McareerRow["dc_txt2"];
	}
	
//*************************************************************************************************	
	$stu_fatherSql="SELECT * FROM `stu_father` WHERE `stu_id`='{$stuID}'";
	$stu_father=new notrow_datastu_sw($stu_fatherSql);
	foreach($stu_father->datastu_array as $rc_key=>$stu_fatherRow){}
	
	$stu_father_addwordSql="SELECT * FROM `stu_father_addword` WHERE `stu_id`='{$stuID}'";
	$stu_father_addword=new notrow_datastu_sw($stu_father_addwordSql);
	foreach($stu_father_addword->datastu_array as $rc_key=>$stu_father_addwordRow){}
	
	
	
	$father_addwordprovince=new data_Province($stu_father_addwordRow["father_addwordprovince"]);
	
	
	
	$stu_father_addressSql="SELECT * FROM `stu_father_address` WHERE `stu_id`='{$stuID}';";
	$stu_father_address=new notrow_datastu_sw($stu_father_addressSql);
	foreach($stu_father_address->datastu_array as $rc_key=>$stu_father_addressRow){}
	
	$f_np=new stu_prefix($stu_fatherRow["father_prefix"]);
	$myname_f=$f_np->prefix_prefixname." ".$stu_fatherRow["father_fname"]." ".$stu_fatherRow["father_sname"];
	
	$father_tumbon=new data_Subdistrict($stu_father_addressRow["father_tumbon"]); // ตำบล
	$father_amphur=new data_District($stu_father_addressRow["father_amphur"]); //อำเภอ
	$father_province=new data_Province($stu_father_addressRow["father_province"]); //จังหวัด	
	
	$data_FcareerSql="SELECT `dc_key`, `dc_txt2` FROM `data_career` WHERE `dc_key`='{$stu_fatherRow["father_career"]}'";
	$data_FcareerRs=new notrow_datastu_sw($data_FcareerSql);
	foreach($data_FcareerRs->datastu_array as $rc_key=>$data_FcareerRow){
		$Fcareer=$data_FcareerRow["dc_txt2"];
	}
	
	
	
//*************************************************************************************************	

	$stu_guardianSql="SELECT * FROM `stu_guardian` WHERE `stu_id`='{$stuID}';";
	$stu_guardian=new notrow_datastu_sw($stu_guardianSql);
	foreach($stu_guardian->datastu_array as $rc_key=>$stu_guardianRow){}
	
	$stu_guardian_addressSql="SELECT * FROM `stu_guardian_address` WHERE `stu_id`='{$stuID}'";
	$stu_guardian_address=new notrow_datastu_sw($stu_guardian_addressSql);
	foreach($stu_guardian_address->datastu_array as $rc_key=>$stu_guardian_addressRow){}
	
	$stu_guardian_addwordSql="SELECT * FROM `stu_guardian_addword` WHERE `stu_id`='{$stuID}'";
	$stu_guardian_addword=new notrow_datastu_sw($stu_guardian_addwordSql);
	foreach($stu_guardian_addword->datastu_array as $rc_key=>$stu_guardian_addwordRow){}
	
	$print_parent_status=new data_rely ($stu_guardianRow["parent_status"]);
	
	$g_np=new stu_prefix($stu_guardianRow["parent_prefix"]);
	$myname_g=$g_np->prefix_prefixname." ".$stu_guardianRow["parent_fname"]." ".$stu_guardianRow["parent_sname"];
	
	$parent_tumbon=new data_Subdistrict($stu_guardian_addressRow["parent_tumbon"]);
	$parent_amphur=new data_District($stu_guardian_addressRow["parent_amphur"]);
	$parent_province=new data_Province($stu_guardian_addressRow["parent_province"]);
	
	/*$parent_tumbon=new data_Subdistrict($stu_guardian_addressRow["parent_tumbon"]);// ตำบล
	$parent_amphur=new data_District($stu_guardian_addressRow["parent_amphur"]);//อำเภอ
	$parent_province=new data_Province($stu_guardian_addressRow["parent_province"]);//จังหวัด*/
//*************************************************************************************************	
	$stu_depend_stuSql="SELECT * FROM `depend_stu` WHERE `ds_stuid`='{$stuID}'";
	$stu_depend_stu=new notrow_datastu_sw($stu_depend_stuSql);
	foreach($stu_depend_stu->datastu_array as $rc_key=>$stu_depend_stuRow){}

	$ds_dormitoryTumbon=new data_Subdistrict ($stu_depend_stuRow["ds_dormitoryTumbon"]);
	$ds_dormitoryAmphur=new data_District ($stu_depend_stuRow["ds_dormitoryAmphur"]);
	$ds_dormitoryProvince=new data_Province ($stu_depend_stuRow["ds_dormitoryProvince"]);

//*************************************************************************************************	
	
?>	
		
<?php
	    if($stu_guardianRow["parent_status"]==2){ ?>
		
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า(ผู้ปกครอง)<input type="text" size="50" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $myname_f; ?>" readonly="readonly" required="required">เลขบัตรประชาชน<input type="text" size="19" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_fatherRow["father_code"];?>" readonly="readonly" required="required"></div>
						<div>ที่อยู่ปัจจุบัน&nbsp;เลขที่<input type="text" size="7" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow["father_hno"]; ?>" readonly="readonly" required="required">ชื่อหมู่บ้าน<input type="text" size="26" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow["father_moo_name"];?>" readonly="readonly" required="required">หมู่ที่<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow["father_moo"];?>" readonly="readonly" required="required">ถนน<input type="text" size="27" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow["father_road"];?>" readonly="readonly" required="required"></div>
						<div>ซอย<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow["father_soi"];?>" readonly="readonly" required="required">ตำบล<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $father_tumbon->DISTRICT_NAME; ?>" readonly="readonly" required="required">อำเภอ<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $father_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">จังหวัด<input type="text" size="17" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $father_province->PROVINCE_NAME; ?>" readonly="readonly" required="required">รหัสไปรษณีย์<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow["father_zipcode"];?>" readonly="readonly" required="required"></div>
						<div>โทรศัพท์<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_fatherRow["father_phone"];?>" readonly="readonly" required="required">เกี่ยวข้องกับนักเรียนเป็น<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $print_parent_status->dr_txt;?>" readonly="readonly" required="required">&nbsp;ขอมอบตัวนักเรียนไว้กับผู้บริหารโรงเรียนเรยีนาเชลีวิทยาลัย</div>
					</td>
				</tr>
			</tbody>
		</table>		
		
		
<?php	}elseif($stu_guardianRow["parent_status"]==3){ ?>
	
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า(ผู้ปกครอง)<input type="text" size="50" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $myname_m; ?>" readonly="readonly" required="required">เลขบัตรประชาชน<input type="text" size="19" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_motherRow["mother_code"];?>" readonly="readonly" required="required"></div>
						<div>ที่อยู่ปัจจุบัน&nbsp;เลขที่<input type="text" size="7" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow["mother_hno"]; ?>" readonly="readonly" required="required">ชื่อหมู่บ้าน<input type="text" size="26" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow["mother_moo_name"];?>" readonly="readonly" required="required">หมู่ที่<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow["mother_moo"];?>" readonly="readonly" required="required">ถนน<input type="text" size="27" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow["mother_road"];?>" readonly="readonly" required="required"></div>
						<div>ซอย<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow["mother_soi"];?>" readonly="readonly" required="required">ตำบล<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mother_tumbon->DISTRICT_NAME; ?>" readonly="readonly" required="required">อำเภอ<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mother_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">จังหวัด<input type="text" size="17" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mother_province->PROVINCE_NAME; ?>" readonly="readonly" required="required">รหัสไปรษณีย์<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_depend_stuRow['ds_dormitoryZipcode'];?>" readonly="readonly" required="required"></div>
						<div>โทรศัพท์<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_motherRow['mother_phone'];?>" readonly="readonly" required="required">เกี่ยวข้องกับนักเรียนเป็น<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $print_parent_status->dr_txt;?>" readonly="readonly" required="required">&nbsp;ขอมอบตัวนักเรียนไว้กับผู้บริหารโรงเรียนเรยีนาเชลีวิทยาลัย</div>
					</td>
				</tr>
			</tbody>
		</table>
	
<?php   }elseif($stu_guardianRow["parent_status"]==5){ ?>

		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า(ผู้ปกครอง)<input type="text" size="50" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_depend_stuRow["ds_dormitoryMyName"];?>" readonly="readonly" required="required">เลขบัตรประชาชน<input type="text" size="19" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_guardianRow['parent_code'];?>" readonly="readonly" required="required"></div>
						<div>ที่อยู่ปัจจุบัน&nbsp;เลขที่<input type="text" size="7" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_depend_stuRow['ds_dormitoryHno']; ?>" readonly="readonly" required="required">ชื่อหมู่บ้าน<input type="text" size="26" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_depend_stuRow['ds_dormitoryMoo_name'];?>" readonly="readonly" required="required">หมู่ที่<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_depend_stuRow['ds_dormitoryMoo'];?>" readonly="readonly" required="required">ถนน<input type="text" size="27" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_depend_stuRow["ds_dormitoryRoad"];?>" readonly="readonly" required="required"></div>
						<div>ซอย<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_depend_stuRow['ds_dormitorySoi'];?>" readonly="readonly" required="required">ตำบล<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $ds_dormitoryTumbon->DISTRICT_NAME; ?>" readonly="readonly" required="required">อำเภอ<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $ds_dormitoryAmphur->AMPHUR_NAME;?>" readonly="readonly" required="required">จังหวัด<input type="text" size="17" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $ds_dormitoryProvince->PROVINCE_NAME; ?>" readonly="readonly" required="required">รหัสไปรษณีย์<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_depend_stuRow['ds_dormitoryZipcode'];?>" readonly="readonly" required="required"></div>
						<div>โทรศัพท์<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_depend_stuRow['ds_dormitoryPhone'];?>" readonly="readonly" required="required">เกี่ยวข้องกับนักเรียนเป็น<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $print_parent_status->dr_txt;?>" readonly="readonly" required="required">&nbsp;ขอมอบตัวนักเรียนไว้กับผู้บริหารโรงเรียนเรยีนาเชลีวิทยาลัย</div>
					</td>
				</tr>
			</tbody>
		</table>
	
<?php   }else{ ?>
	
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า(ผู้ปกครอง)<input type="text" size="50" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $myname_g; ?>" readonly="readonly" required="required">เลขบัตรประชาชน<input type="text" size="19" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_guardianRow ['parent_code'];?>" readonly="readonly" required="required"></div>
						<div>ที่อยู่ปัจจุบัน&nbsp;เลขที่<input type="text" size="7" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_guardian_addressRow ['parent_hno']; ?>" readonly="readonly" required="required">ชื่อหมู่บ้าน<input type="text" size="26" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_guardian_addressRow["parent_moo_name"];?>" readonly="readonly" required="required">หมู่ที่<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_guardian_addressRow['parent_moo'];?>" readonly="readonly" required="required">ถนน<input type="text" size="27" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_guardian_addressRow["parent_road"];?>" readonly="readonly" required="required"></div>
						<div>ซอย<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_guardian_addressRow['parent_soi'];?>" readonly="readonly" required="required">ตำบล<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $parent_tumbon->DISTRICT_NAME; ?>" readonly="readonly" required="required">อำเภอ<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $parent_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">จังหวัด<input type="text" size="17" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $parent_province->PROVINCE_NAME;?>" readonly="readonly" required="required">รหัสไปรษณีย์<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_guardian_addressRow['parent_zipcode'];?>" readonly="readonly" required="required"></div>
						<div>โทรศัพท์<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_guardianRow['parent_phone'];?>" readonly="readonly" required="required">เกี่ยวข้องกับนักเรียนเป็น<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $print_parent_status->dr_txt;?>" readonly="readonly" required="required">&nbsp;ขอมอบตัวนักเรียนไว้กับผู้บริหารโรงเรียนเรยีนาเชลีวิทยาลัย</div>
					</td>
				</tr>
			</tbody>
		</table>
	
<?php   } ?>


<?php

	$regina_stu_dataSql="SELECT `stu_prefix`,`stu_fname`,`stu_sname`,`stu_fname_e`,`stu_sname_e`,`nickTh`,`nickEn`,`IDCard`,`stu_level`,`stu_plan` 
					     FROM `rc_student_admission` WHERE `IDReg`='{$user_login}';'";
	$regina_stu_data=new notrow_admission($regina_stu_dataSql);
	foreach($regina_stu_data->notrow_admission_print() as $rc_key=>$regina_stu_datarow){
		if($regina_stu_datarow["stu_prefix"]==2){
			$mynameTh="เด็กหญิง ".$regina_stu_datarow["stu_fname"]." ".$regina_stu_datarow["stu_sname"];			
		}elseif($regina_stu_datarow["stu_prefix"]==4){
			$mynameTh="นางสาว ".$regina_stu_datarow["stu_fname"]." ".$regina_stu_datarow["stu_sname"];			
		}else{
			$mynameTh=$regina_stu_datarow["stu_fname"]." ".$regina_stu_datarow["stu_sname"];			
		}
		$mynameEn="Miss ".$regina_stu_datarow["stu_fname_e"]." ".$regina_stu_datarow["stu_sname_e"];
	}





	$data_studentSql="SELECT * FROM `data_student` WHERE `stu_id`='{$stuID}'";
	$data_student=new notrow_datastu_sw($data_studentSql);
	foreach($data_student->datastu_array as $rc_key=>$data_studentrow){}
	
	$stu_addressSql="SELECT * FROM `stu_address` WHERE `stu_id`='{$stuID}'";
	$stu_address=new notrow_datastu_sw($stu_addressSql);
	foreach($stu_address->datastu_array as $rc_key=>$stu_addressRow){}
	
	$stu_nation=new db_country($data_studentrow["stu_nation"]);
	$stu_sun=new  db_country($data_studentrow["stu_sun"]);


	$rc_religionSql="SELECT `Religion` FROM `rc_religion` WHERE `IDReligion`='{$data_studentrow["IDReligion"]}';";
	$rc_religion=new notrow_datastu_sw($rc_religionSql);
	foreach($rc_religion->datastu_array as $rc_key=>$rc_religionRow){
		$Religion=$rc_religionRow["Religion"];
	}

	$stu_tumbon=new data_Subdistrict ($stu_addressRow["stu_tumbon"]); // ตำบล
	$stu_amphur=new data_District ($stu_addressRow["stu_amphur"]); //อำเภอ
	$stu_province=new data_Province($stu_addressRow["stu_province"]); //จังหวัด

	$stu_depend_stuSql="SELECT * FROM `depend_stu` WHERE `ds_stuid`='{$stuID}'";
	$stu_depend_stu=new notrow_datastu_sw($stu_depend_stuSql);
	foreach($stu_depend_stu->datastu_array as $rc_key=>$stu_depend_stuRow){}

?>		

		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อนักเรียนภาษาไทย<input type="text" size="50" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mynameTh;?>" readonly="readonly" required="required"><b>เลขบัตรประชาชน</b><input type="text" size="18" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $regina_stu_datarow['IDCard'];?>" readonly="readonly" required="required"></div>
						<div>ชื่อนักเรียนภาษาอังกฤษ</b><input type="text" size="43" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mynameEn;?>" readonly="readonly" required="required">วัน/เดือน/ปี เกิด<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo datethai($data_studentrow['stu_birth']);?>" readonly="readonly" required="required">หมู่เลือด<input type="text" size="2" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $data_studentrow['stu_blood'];?>" readonly="readonly" required="required"></div>
						<div>เชื่อชาติ<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_nation->nation_name_th;?>" readonly="readonly" required="required">สัญชาติ<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_sun->nation_name_th;?>" readonly="readonly" required="required">ศาสนา<input type="text" size="17" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $Religion;?>" readonly="readonly" required="required">ที่อยู่ปัจจุบัน เลขที่<input type="text" size="6" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_addressRow['stu_hno'];?>" readonly="readonly" required="required"></div>
						<div>ชื่อหมู่บ้าน<input type="text" size="26" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_addressRow['stu_moo_name'];?>" readonly="readonly" required="required">หมู่ที่<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_addressRow['stu_moo'];?>" readonly="readonly" required="required">ถนน<input type="text" size="30" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_addressRow['stu_road'];?>" readonly="readonly" required="required">ซอย<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_addressRow['stu_soi'];?>" readonly="readonly" required="required"></div>
						<div>ตำบล<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_tumbon->DISTRICT_NAME;?>" readonly="readonly" required="required">อำเภอ<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">จังหวัด<input type="text" size="14" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_province->PROVINCE_NAME;?>" readonly="readonly" required="required">รหัสไปรษณีย์<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_addressRow["stu_zipcode"];?>" readonly="readonly" required="required">โทรศัพท์<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $data_studentrow["stu_phone"];?>" readonly="readonly" required="required"></div>
					</td>
				</tr>
			</tbody>
		</table>


		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อบิดา<input type="text" size="37" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $myname_f;?>" readonly="readonly" required="required">เลขบัตรประชาชน<input type="text" size="13" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_fatherRow['father_code'];?>" readonly="readonly" required="required">อาชีพ<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $Fcareer;?>" readonly="readonly" required="required"></div>
						<div>สถานที่ทำงาน<input type="text" size="34" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_fatherRow['father_workplace'];?>" readonly="readonly" required="required">จังหวัด<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $father_addwordprovince->PROVINCE_NAME;?>" readonly="readonly" required="required">โทรศัพท์ที่ทำงาน<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_fatherRow['father_wp_tel'];?>" readonly="readonly" required="required"></div>
						<div>ที่อยู่ปัจจุบัน เลขที่<input type="text" size="6" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow['father_hno'];?>" readonly="readonly" required="required">ชื่อหมู่บ้าน<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow['father_moo_name'];?>" readonly="readonly" required="required">หมู่ที่<input type="text" size="3" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow['father_moo'];?>" readonly="readonly" required="required">ถนน<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow["father_road"];?>" readonly="readonly" required="required">ซอย<input type="text" size="8" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow['father_soi'];?>" readonly="readonly" required="required"></div>						
						<div>ตำบล<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $father_tumbon->DISTRICT_NAME;?>" readonly="readonly" required="required">อำเภอ<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $father_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">จังหวัด<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $father_province->PROVINCE_NAME;?>" readonly="readonly" required="required">รหัสไปรษณีย์<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_father_addressRow['father_zipcode'];?>" readonly="readonly" required="required">โทรศัพท์<input type="text" size="9" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_fatherRow['father_phone'];?>" readonly="readonly" required="required"></div>
					</td>
				</tr>
			</tbody>					
		</table>		
		
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อมารดา<input type="text" size="35" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $myname_m;?>" readonly="readonly" required="required">เลขบัตรประชาชน<input type="text" size="13" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_motherRow['mother_code'];?>" readonly="readonly" required="required">อาชีพ<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $Mcareer;?>" readonly="readonly" required="required"></div>
						<div>สถานที่ทำงาน<input type="text" size="34" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_motherRow['mother_workplace'];?>" readonly="readonly" required="required">จังหวัด<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mother_addwordprovince->PROVINCE_NAME;?>" readonly="readonly" required="required">โทรศัพท์ที่ทำงาน<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_motherRow['mother_wp_tel'];?>" readonly="readonly" required="required"></div>
						<div>ที่อยู่ปัจจุบัน เลขที่<input type="text" size="6" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow['mother_hno'];?>" readonly="readonly" required="required">ชื่อหมู่บ้าน<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow['mother_moo_name'];?>" readonly="readonly" required="required">หมู่ที่<input type="text" size="3" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow['mother_moo'];?>" readonly="readonly" required="required">ถนน<input type="text" size="20" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow["mother_road"];?>" readonly="readonly" required="required">ซอย<input type="text" size="8" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow['mother_soi'];?>" readonly="readonly" required="required"></div>						
						<div>ตำบล<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mother_tumbon->DISTRICT_NAME;?>" readonly="readonly" required="required">อำเภอ<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mother_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">จังหวัด<input type="text" size="15" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mother_province->PROVINCE_NAME;?>" readonly="readonly" required="required">รหัสไปรษณีย์<input type="text" size="5" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_mother_addressRow['mother_zipcode'];?>" readonly="readonly" required="required">โทรศัพท์<input type="text" size="9" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $stu_motherRow['mother_phone'];?>" readonly="readonly" required="required"></div>
					</td>
				</tr>
			</tbody>					
		</table>		
		
		<div>&nbsp;</div>
		<center><table style="width: 60%; vertical-align: top; font-size: 20px; font-family: THSarabunNew; font-weight: bold;" border="1" cellpadding="0" cellspacing="0">
		  <tbody>
			<tr>
			  <td><div><center><b>สถานภาพบิดา-มารดา</b></center></div></td>
			  
			<?php 	if(($stu_depend_stuRow['ds_FMstatus']=='1')) { ?>
				<td>
				<center><div>
				&nbsp;<font style="font-family: THSarabunNew; font-size: 20px"><img src="<?php echo base_url();?>/tools/img/f.JPG" width="13" height="13" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
				</div></center>
				<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
			  </td>
				
		<?php		}elseif(($stu_depend_stuRow['ds_FMstatus']=='2')) { ?>
				<td>
				<center><div>
				&nbsp;<font style="font-family: THSarabunNew; font-size: 20px"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/f.JPG" width="13" height="13" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
				</div></center>
				<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
			  </td>			
		<?php		}elseif(($stu_depend_stuRow['ds_FMstatus']=='3')) { ?>
				<td>
				<center><div>
				&nbsp;<font style="font-family: THSarabunNew; font-size: 20px"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/f.JPG" width="13" height="13" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
				</div></center>
				<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
			  </td>			
		<?php		}elseif(($stu_depend_stuRow['ds_FMstatus']=='4')) { ?>
				<td>
				<center><div>
				&nbsp;<font style="font-family: THSarabunNew; font-size: 20px"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
				</div></center>
				<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/f.JPG" width="13" height="13" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
			  </td>			
		<?php		}elseif(($stu_depend_stuRow['ds_FMstatus']=='5')) { ?>
				<td>
				<center><div>
				&nbsp;<font style="font-family: THSarabunNew; font-size: 20px"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
				</div></center>
				<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/f.JPG" width="13" height="13" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
			  </td>		
		<?php		}else{ ?>
				<td>
				<center><div>
				&nbsp;<font style="font-family: THSarabunNew; font-size: 20px"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
				</div></center>
				<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 20px;"><img src="<?php echo base_url();?>/tools/img/t.JPG" width="13" height="13" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
			  </td>				
		<?php		} ?>	
			</tr>
		  </tbody>
		</table></center>	
		<br>
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้ามีความประสงค์ที่จะให้บุตรสาวศึกษาต่อที่โรงเรียนเรยีนาเชลีวิทยาลัย และยินดีให้ความร่วมมือกับทางโรงเรียนในการส่งเสริม สนับสนุน ดูแลบุตรสาวทั้งด้านการเรียน ความประพฤติให้ปฏิบัติอยู่ในกฎระเบียบของโรงเรียน พร้อมกันนี้ข้าพเจ้าได้ชำระเงินยืนยันการมอบตัวนักเรียนเรียบร้อยแล้ว หากบุตรสาวของข้าพเจ้าสละสิทธิ์ไม่ว่ากรณีใดๆ ข้าพเจ้ายินดีมอบเงินทั้งหมดให้กับทางโรงเรียนเพื่อ สนับสนุนการศึกษาของโรงเรียนต่อไป</div>
					</td>
				</tr>
			</tbody>					
		</table>		
			
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 50%">
						
						<table style="vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="1" cellpadding="0" cellspacing="0">
				
							<tbody>
								<tr>
									<td>
										<div id="fontA"><center><b>เอกสารประกอบการมอบตัวนักเรียน</b></center></div>
										<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;รูปถ่าย ขนาด 1.5 นิ้ว จำนวน 1 ใบ</div>
										<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;สำเนาบัตรประชาชนนักเรียน 1 ฉบับ (ยกเว้น อ3 และ ป1)&nbsp;&nbsp;</div>
										<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;สำเนาบัตรประชาชนบิดา มารดา หรือ ผู้ปกครอง 1 ฉบับ&nbsp;&nbsp;</div>
										<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;สำเนาทะเบียนบ้านบิดา 1 ฉบับ และมารดา 1 ฉบับ&nbsp;&nbsp;</div>
										<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;สำเนาการเปลี่ยนชื่อ-สกุล ของนักเรียน บิดา มารดา (ถ้ามี)&nbsp;&nbsp;</div>									
									</td>
								</tr>
							</tbody>
				
						</table>
					
            
					</td>
					<td style="width: 50%">
						<p><center><div>ลงชื่อ.............................................ผู้ปกครอง</div>
								   <div>(....................................................)</div></center></p>
						<p><center><div>ลงชื่อ.............................................ผู้รับเอกสาร</div>
								   <div>(.....................................................)</div>
								   <div>วันที่...........เดือน.....................พ.ศ............</div>
						</center></p>
					</td>
				</tr>        
			</tbody>
		</table>
  
	</section>
	
	
	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php $key_key=filter_input(INPUT_GET,'key_key');
		
		switch ($key_key){
			case "12": ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++-->	  
						<?php
								$su_IPSTSql="SELECT count(`IDGifted`) as `count_g` FROM `rc_student_gifted` 
											 WHERE `IDReg`='{$stuID}' 
											 and `IDCard`='{$regina_stu_datarow['IDCard']}'";
								$su_IPST=new notrow_admission($su_IPSTSql);
								foreach($su_IPST->notrow_admission_print() as $rc_key=>$su_IPSTRow){
									$count_g=$su_IPSTRow["count_g"];
									if($count_g>=1){
										//echo"ff";
									}else{
										
										$count_IPSTSql="SELECT count(`IDGifted`) as `count_gifted` FROM `rc_student_gifted` WHERE `IDGifted` LIKE '%6412%'";
										$count_IPST=new notrow_admission($count_IPSTSql);
										foreach($count_IPST->notrow_admission_print() as $rc_key=>$count_IPSTRow){
											$count_gifted=$count_IPSTRow["count_gifted"];
											$count_gifted=$count_gifted+1;
											
												if($count_gifted<=9){
													$IDGifted="641200".$count_gifted;
												}elseif($count_gifted<=99){
													$IDGifted="64120".$count_gifted;
												}else{
													$IDGifted="6412".$count_gifted;
												}
												

													$cr_IPSTSql="SELECT count(`IDGifted`) as `cr_gifted` FROM `rc_student_gifted` WHERE `IDGifted` = '{$IDGifted}'";
													$cr_IPST=new notrow_admission($cr_IPSTSql);
													foreach($cr_IPST->notrow_admission_print() as $rc_key=>$cr_IPSTRow){
														$cr_gifted=$cr_IPSTRow["cr_gifted"];
													}
													
													while($cr_gifted>=1){
														
														$IDGifted=$IDGifted+1;
														$cr_IPSTSql="SELECT count(`IDGifted`) as `cr_gifted` FROM `rc_student_gifted` WHERE `IDGifted` = '{$IDGifted}'";
														$cr_IPST=new notrow_admission($cr_IPSTSql);
														foreach($cr_IPST->notrow_admission_print() as $rc_key=>$cr_IPSTRow){
															$cr_gifted=$cr_IPSTRow["cr_gifted"];
														}	
														
													}
												
												$IPST_intoSql="INSERT INTO `rc_student_gifted` (`IDGifted`, `IDReg`, `IDCard`) VALUES ('{$IDGifted}', '{$stuID}', '{$regina_stu_datarow['IDCard']}');";
												$IPST_into=new insert_admission($IPST_intoSql);
												if($IPST_into->into_insert_admission()=="yes"){
													//echo "A";  //*****************************************
												}else{
													//echo "B";//*****************************************
												}	
											
										}
										
										
									}
								
								}
						?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++-->		
<?php		break;				
			case "13": ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++-->	
						<?php
								if($user_plan==3){
									
									$su_IPSTSql="SELECT count(`IDGifted`) as `count_g` FROM `rc_student_gifted` 
												 WHERE `IDReg`='{$stuID}' 
												 and `IDCard`='{$regina_stu_datarow['IDCard']}'";
									$su_IPST=new notrow_admission($su_IPSTSql);
									foreach($su_IPST->notrow_admission_print() as $rc_key=>$su_IPSTRow){
										$count_g=$su_IPSTRow["count_g"];
										if($count_g>=1){
											//**********************************************************
										}else{
											
											$count_IPSTSql="SELECT count(`IDGifted`) as `count_gifted` FROM `rc_student_gifted` WHERE `IDGifted` LIKE '%6613%'";
											$count_IPST=new notrow_admission($count_IPSTSql);
											foreach($count_IPST->notrow_admission_print() as $rc_key=>$count_IPSTRow){
												$count_gifted=$count_IPSTRow["count_gifted"];
												$count_gifted=$count_gifted+1;
												
													if($count_gifted<=9){
														$IDGifted="661300".$count_gifted;
													}elseif($count_gifted<=99){
														$IDGifted="66130".$count_gifted;
													}else{
														$IDGifted="6613".$count_gifted;
													}
													
													
													$cr_IPSTSql="SELECT count(`IDGifted`) as `cr_gifted` FROM `rc_student_gifted` WHERE `IDGifted` = '{$IDGifted}'";
													$cr_IPST=new notrow_admission($cr_IPSTSql);
													foreach($cr_IPST->notrow_admission_print() as $rc_key=>$cr_IPSTRow){
														$cr_gifted=$cr_IPSTRow["cr_gifted"];
													}
													
													while($cr_gifted>=1){
														
														$IDGifted=$IDGifted+1;
														$cr_IPSTSql="SELECT count(`IDGifted`) as `cr_gifted` FROM `rc_student_gifted` WHERE `IDGifted` = '{$IDGifted}'";
														$cr_IPST=new notrow_admission($cr_IPSTSql);
														foreach($cr_IPST->notrow_admission_print() as $rc_key=>$cr_IPSTRow){
															$cr_gifted=$cr_IPSTRow["cr_gifted"];
														}	
														
													}
													
													
																
												$IPST_intoSql="INSERT INTO `rc_student_gifted` (`IDGifted`, `IDReg`, `IDCard`) VALUES ('{$IDGifted}', '{$stuID}', '{$regina_stu_datarow['IDCard']}');";
												$IPST_into=new insert_admission($IPST_intoSql);
												if($IPST_into->into_insert_admission()=="yes"){
													//*****************************************
												}else{
													//*****************************************
												}
												
											}					
											
										}
									}
									
								}else{
									
									
								}
						?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++-->		 					
<?php		break;				
			default:
				$IPST_intoSql="DELETE FROM `rc_student_gifted` WHERE `IDReg`='{$stuID}' and `IDCard`='{$regina_stu_datarow['IDCard']}';";
				$IPST_into=new insert_admission($IPST_intoSql);
				if($IPST_into->into_insert_admission()=="yes"){
					//*****************************************
				}else{
					//*****************************************
				}	
		}   ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	
<?php
		if($key_key==12 or $key_key==13){ ?>
		
		
	<section class="sheet padding-10mm imgA">

		<table  style="width: 100%; vertical-align: top; font-size: 22px; font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 50%;">
						<div style="text-align: left;">เลขประจำตัวผู้เข้าสอบ<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $qtt_id;?>" readonly="readonly" required="required"></div>
					</td>
					<td style="width: 50%;">
						<div style="text-align: right;">สำหรับเจ้าหน้าที่</div>
					</td>
				</tr>
			</tbody>		
		</table>

		<table  style="width: 100%; vertical-align: top; font-size: 21px; font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<center>
							<div><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" style="width: 65px; height: 63px;" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"/></div>
							<div>ใบสมัครสอบคัดเลือกนักเรียนห้องเรียน วิทยาศาสตร์-คณิตศาสตร์ (สสวท.) </div>
							<div>ระดับชั้น<?php echo $leve_name;?> ปีการศึกษา <?php echo $next_year;?></div>
							<div>โรงเรียนเรยีนาเชลีวิทยาลัย  จังหวัดเชียงใหม่</div>
						</center>
					</td>
				</tr>
			</tbody>
		</table>
	
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div align="right"><img class="img-thumbnail" src="<?php echo base_url();?>/tools/img/กรอกรูป.JPG" alt="กรอกรูป"  style="width: 2.50cm; height: 3.25cm; text-align: right;"/></div>
					</td>
				</tr>
			</tbody>
		</table>
	
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			  <tbody>
				<tr>
				  <td>
					<div>ข้าพเจ้า<input type="text" size="102" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mynameTh;?>" readonly="readonly" required="required"></div>
					<div>เลขประจำตัวนักเรียน<input type="text" size="30" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $regina_stu_datarow["rsd_studentid"];?>" readonly="readonly" required="required">เลขประจำตัวประชาชน<input type="text" size="36" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $regina_stu_datarow['rsd_Identification'];?>" readonly="readonly" required="required"></div>  
				  </td>
				</tr>
			  </tbody>
		</table>
	
<?php
if($key_key==12){ ?>
		<br>
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<center>
							<div>มีความประสงค์สมัครสอบคัดเลือกห้องเรียน วิทยาศาสตร์-คณิตศาสตร์ (สสวท.) ระดับชั้นมัธยมศึกษาปีที่ 1  ปีการศึกษา <?php echo $next_year;?></div>
							<div>และจะปฏิบัติตามระเบียบและข้อปฎบัติในการสอบทุกประการ</div>
						</center>
					</td>
				</tr>
			</tbody>
		</table>
				

<?php }else{ ?>
		<br>
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<center>
							<div>มีความประสงค์สมัครสอบคัดเลือกห้องเรียน วิทยาศาสตร์-คณิตศาสตร์ (สสวท.) ระดับชั้นมัธยมศึกษาปีที่ 4  ปีการศึกษา <?php echo $next_year;?></div>
							<div>และจะปฏิบัติตามระเบียบและข้อปฎบัติในการสอบทุกประการ</div>
						</center>
					</td>
				</tr>
			</tbody>
		</table>
		
<?php }      ?>	

	<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td><center><div>ข้าพเจ้าขอรับรองว่า ข้อความดังกล่าวทั้งหมดในใบสมัครนี้เป็นจริงทุกประการ และจะนำใบสมัครมาแสดงต่อเจ้าหน้าที่ในวันสอบ</div></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td>
			<center>
				<div>ลงชื่อ<input type="text" size="30" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: center; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="<?php //echo $mynameTh;?>" readonly="readonly" required="required"></div>
				<div>วันที่<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: center; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="<?php //echo datethai($date_time);?>" readonly="readonly" required="required"></div>
				<div>ผู้สมัคร</div>
			</center>
		  </td>
		  <td>
			<center>
			<div>ลงชื่อ................................................</div>
			<div>(.....................................................)</div>
			<div>เจ้าหน้าที่รับสมัคร</div></center>		
		  </td>
		</tr>
	  </tbody>
	</table>

	<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td>
					<div>----------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
				</td>
			</tr>
		</tbody>	
	</table>

		<table  style="width: 100%; vertical-align: top; font-size: 22px; font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 50%;">
						<div style="text-align: left;">เลขประจำตัวผู้เข้าสอบ<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $qtt_id;?>" readonly="readonly" required="required"></div>
					</td>
					<td style="width: 50%;">
						<div style="text-align: right;">สำหรับนักเรียน</div>
					</td>
				</tr>
			</tbody>		
		</table>

		<table  style="width: 100%; vertical-align: top; font-size: 21px; font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<center>
							<div><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" style="width: 65px; height: 63px;" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"/></div>
							<div>ใบสมัครสอบคัดเลือกนักเรียนห้องเรียน วิทยาศาสตร์-คณิตศาสตร์ (สสวท.) </div>
							<div>ระดับชั้น<?php echo $leve_name;?> ปีการศึกษา <?php echo $next_year;?></div>
							<div>โรงเรียนเรยีนาเชลีวิทยาลัย  จังหวัดเชียงใหม่</div>
						</center>
					</td>
				</tr>
			</tbody>
		</table>
	
		<!--<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div align="right"><img class="img-thumbnail" src="<?php echo base_url();?>/tools/img/กรอกรูป.JPG" alt="กรอกรูป"  style="width: 2.50cm; height: 3.25cm; text-align: right;"/></div>
					</td>
				</tr>
			</tbody>
		</table>-->
	
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			  <tbody>
				<tr>
				  <td>
					<div>ข้าพเจ้า<input type="text" size="102" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mynameTh;?>" readonly="readonly" required="required"></div>
					<div>เลขประจำตัวนักเรียน<input type="text" size="30" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $regina_stu_datarow["rsd_studentid"];?>" readonly="readonly" required="required">เลขประจำตัวประชาชน<input type="text" size="36" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $regina_stu_datarow['rsd_Identification'];?>" readonly="readonly" required="required"></div>  
				  </td>
				</tr>
			  </tbody>
		</table>
	
<?php
if($key_key==12){ ?>
		<br>
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<center>
							<div>มีความประสงค์สมัครสอบคัดเลือกห้องเรียน วิทยาศาสตร์-คณิตศาสตร์ (สสวท.) ระดับชั้นมัธยมศึกษาปีที่ 1  ปีการศึกษา <?php echo $next_year;?></div>
							<div>และจะปฏิบัติตามระเบียบและข้อปฎบัติในการสอบทุกประการ</div>
						</center>
					</td>
				</tr>
			</tbody>
		</table>
		
		<!--<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="1" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td colspan="3">
						<div><b><u><center>กำหนดการรับสมัคร</center></u></b></div>
					</td>
				</tr>
			</tbody>
		</table>
		
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="1" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 20%;"><div><center>วัน/เดือน/ปี</center></div></td>
					<td style="width: 60%;"><div><center>รายการ</center></div></td>
					<td style="width: 20%;"><div><center>สถานที่</center></div></td>
				</tr>
				<tr>
					<td style="width: 20%;">
						<div>20 ส.ค. - 3 ก.ย. 2564</div>
					</td>
					<td style="width: 60%;">
						<div>สมัครสอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
					</td>
					<td style="width: 20%;">
						<div>www.regina.ac.th</div>
					</td>
				</tr>
				<tr>
					<td style="width: 20%;">
						<div>26 พ.ย. 2564</div>
					</td>
					<td style="width: 60%;">
						<div>ตรวจสอบรายชื่อ เลขที่นั่งสอบ และสถานที่สอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
					</td>
					<td style="width: 20%;">
						<div>www.regina.ac.th</div>
					</td>
				</tr>
				<tr>
					<td style="width: 20%;">
						<div>27 พ.ย. 2564</div>
						<div>เวลา 13.00 - 16.00 น.</div>
					</td>
					<td style="width: 60%;">
						<div>สอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
						<div><u>เนื้อหาที่สอบ</u>&nbsp;ความรู้วิชาคณิตศาสตร์ วิทยาศาสตร์ ภาษาอังกฤษ และความถนัดทางการเรียน (มิติสัมพันธ์)</div>
						<div>ระดับชั้นประถมศึกษาปีที่ 4-5 และประถมศึกษาปีที่ 6 (เฉพาะภาคเรียนที่ 1)</div>
					</td>
					<td style="width: 20%;">
						<div>ตามประกาศ</div>
					</td>
				</tr>	
				<tr>
					<td style="width: 20%;">
						<div>1 ธ.ค. 2564</div>
					</td>
					<td style="width: 60%;">
						<div>ประกาศผลสอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
					</td>
					<td style="width: 20%;">
						<div>www.regina.ac.th</div>
					</td>
				</tr>				
				<tr>
					<td style="width: 20%;">
						<div><b><u>เนื้อหาที่สอบ</u></b></div>
					</td>
					<td style="width: 60%;">
						<div>ความรู้วิชาคณิตศาสตร์ วิทยาศาสตร์ ภาษาอังกฤษ และความถนัดทางการเรียน (มิติสัมพันธ์)</div>
						<div>ระดับชั้นประถมศึกษาปีที่ 4-5 และประถมศึกษาปีที่ 6 (เฉพาะภาคเรียนที่ 1)</div>
					</td>
					<td style="width: 20%;">
						<div></div>
					</td>
				</tr>				
			</tbody>
		</table>-->				

<?php }else{ ?>
		<br>
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<center>
							<div>มีความประสงค์สมัครสอบคัดเลือกห้องเรียน วิทยาศาสตร์-คณิตศาสตร์ (สสวท.) ระดับชั้นมัธยมศึกษาปีที่ 4  ปีการศึกษา<?php echo $next_year;?></div>
							<div>และจะปฏิบัติตามระเบียบและข้อปฎบัติในการสอบทุกประการ</div>
						</center>
					</td>
				</tr>
			</tbody>
		</table>
		
		<!--<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="1" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td colspan="3">
						<div><b><u><center>กำหนดการรับสมัคร</center></u></b></div>
					</td>
				</tr>
			</tbody>
		</table>
		
		<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="1" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 20%;"><div><center>วัน/เดือน/ปี</center></div></td>
					<td style="width: 60%;"><div><center>รายการ</center></div></td>
					<td style="width: 20%;"><div><center>สถานที่</center></div></td>
				</tr>
				<tr>
					<td style="width: 20%;">
						<div>20 ส.ค. - 3 ก.ย. 2564</div>
					</td>
					<td style="width: 60%;">
						<div>สมัครสอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
					</td>
					<td style="width: 20%;">
						<div>www.regina.ac.th</div>
					</td>
				</tr>
				<tr>
					<td style="width: 20%;">
						<div>26 พ.ย. 2564</div>
					</td>
					<td style="width: 60%;">
						<div>ตรวจสอบรายชื่อ เลขที่นั่งสอบ และสถานที่สอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
					</td>
					<td style="width: 20%;">
						<div>www.regina.ac.th</div>
					</td>
				</tr>
				<tr>
					<td style="width: 20%;">
						<div>27 พ.ย. 2564</div>
						<div>เวลา 13.00 - 16.00 น.</div>
					</td>
					<td style="width: 60%;">
						<div>สอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
						<div><u>เนื้อหาที่สอบ</u>&nbsp;ความรู้วิชาคณิตศาสตร์ วิทยาศาสตร์ ภาษาอังกฤษ และความถนัดทางการเรียน (มิติสัมพันธ์)</div>
						<div>ระดับชั้นมัธยมศึกษาปีที่ 4-5 และมัธยมศึกษาปีที่ 6 (เฉพาะภาคเรียนที่ 1)</div>
					</td>
					<td style="width: 20%;">
						<div>ตามประกาศ</div>
					</td>
				</tr>	
				<tr>
					<td style="width: 20%;">
						<div>1 ธ.ค. 2564</div>
					</td>
					<td style="width: 60%;">
						<div>ประกาศผลสอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
					</td>
					<td style="width: 20%;">
						<div>www.regina.ac.th</div>
					</td>
				</tr>				
				<tr>
					<td style="width: 20%;">
						<div><b><u>เนื้อหาที่สอบ</u></b></div>
					</td>
					<td style="width: 60%;">
						<div>ความรู้วิชาคณิตศาสตร์ วิทยาศาสตร์ ภาษาอังกฤษ และความถนัดทางการเรียน (มิติสัมพันธ์)</div>
						<div>ระดับชั้นมัธยมศึกษาปีที่ 1-3 (เฉพาะภาคเรียนที่ 1)</div>
					</td>
					<td style="width: 20%;">
						<div></div>
					</td>
				</tr>				
			</tbody>
		</table>-->	
<?php }      ?>	
	
	<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td><center><div>ข้าพเจ้าขอรับรองว่า ข้อความดังกล่าวทั้งหมดในใบสมัครนี้เป็นจริงทุกประการ และจะนำใบสมัครมาแสดงต่อเจ้าหน้าที่ในวันสอบ</div></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td>
			<center>
				<div>ลงชื่อ<input type="text" size="30" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: center; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="<?php //echo $mynameTh;?>" readonly="readonly" required="required"></div>
				<div>วันที่<input type="text" size="10" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: center; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="<?php //echo datethai($date_time);?>" readonly="readonly" required="required"></div>
				<div>ผู้สมัคร</div>
			</center>
		  </td>
		  <td>
			<center>
			<div>ลงชื่อ................................................</div>
			<div>(.....................................................)</div>
			<div>เจ้าหน้าที่รับสมัคร</div></center>		
		  </td>
		</tr>
	  </tbody>
	</table>


	
	</section>
		
		
<?php	}else{} ?>	
	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
	<section class="sheet padding-10mm printA">

	    <table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <div>
                            <center><div><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" style="width: 75px; height: 73px;" alt=""/></div></center>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>	
	
        <table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th>
                        <div align="center">รายการค่ามอบตัวนักเรียนใหม่ ปีการศึกษา <?php echo $next_year;?></div>
                        <div>ชื่อ - สกุล<input type="text" size="54" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $mynameTh;?>" readonly="readonly" required="required">&nbsp;เลขประจำตัวผู้สมัคร<input type="text" size="25" style="font-family: THSarabunNew; font-size: 20px; border:0px; text-align: left; border:0px; border-bottom:#000 1px dotted; font-weight: lighter;" value="&nbsp;<?php echo $user_login;?>" readonly="readonly" required="required"></div>
                    </th>                  
                </tr>
            </tbody>
        </table>
	
        <table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="1" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th style="width: 46px;"><div>ลำดับ</div></th>
                    <th style="width: 446px;"><div>รายการ</div></th>
                    <th style="width: 246px;"><div>ราคา</div></th>
                </tr>
                <tr>
                    
                        <td style="width: 10%;">
                        
            <?php
                $countA=0;
                $datapayASql="select `surrender_fee_list`.`sfl_no`,`surrender_fee_list`.`sfl_txt`,`surrender_fee_list`.`sfl_price`  
                              from `surrender_fee` 
                              right join `surrender_fee_list` on (`surrender_fee`.`sf_no`=`surrender_fee_list`.`sf_no`) 
                              where `surrender_fee`.`sf_year`='{$qr_year}' 
                              and `surrender_fee`.`sf_class`='{$qr_level}' 
                              and `surrender_fee`.`sf_plan`='{$qr_plan}'
							  and `surrender_fee_list`.`sfl_price` != '0.00' ORDER BY `surrender_fee_list`.`sfl_no` ASC";
                $datapayA=new row_admission($datapayASql);
                foreach($datapayA->row_admission_print() as $rc=>$datapayARow){
                    $countA=$countA+1;?>
                    <?php
                            if($datapayBRow["sfl_price"]=="0.00"){ ?>
                            
                    <?php   }else{ ?>
                    
                            <div align="center"><?php echo $countA;?></div>
                            
                    <?php   }?>                       
                    
                            
            <?php    } ?>            
                        
                        
                        </td>
                        <td style="width: 70%;">
                        
            <?php
                $datapayBSql="select `surrender_fee_list`.`sfl_no`,`surrender_fee_list`.`sfl_txt`,`surrender_fee_list`.`sfl_price`  
                              from `surrender_fee` 
                              right join `surrender_fee_list` on (`surrender_fee`.`sf_no`=`surrender_fee_list`.`sf_no`) 
                              where `surrender_fee`.`sf_year`='{$qr_year}' 
                              and `surrender_fee`.`sf_class`='{$qr_level}' 
                              and `surrender_fee`.`sf_plan`='{$qr_plan}' and `surrender_fee_list`.`sfl_price` != '0.00' ORDER BY `surrender_fee_list`.`sfl_no` ASC";
                $datapayB=new row_admission($datapayBSql);
                foreach($datapayB->row_admission_print() as $rc=>$datapayBRow){ ?>
                    <?php
                            if($datapayBRow["sfl_price"]=="0.00"){ ?>
                            
                    <?php   }else{ ?>
                            <div>&nbsp;<?php echo $datapayBRow["sfl_txt"];?></div>
                    <?php   }?>        
                            
                            
            <?php    } ?>            
                        
                        </td>
                        <td style="width: 20%;">
            <?php
                $sumpay=0;
                $datapayCSql="select `surrender_fee_list`.`sfl_no`,`surrender_fee_list`.`sfl_txt`,`surrender_fee_list`.`sfl_price`  
                              from `surrender_fee` 
                              right join `surrender_fee_list` on (`surrender_fee`.`sf_no`=`surrender_fee_list`.`sf_no`) 
                              where `surrender_fee`.`sf_year`='{$qr_year}' 
                              and `surrender_fee`.`sf_class`='{$qr_level}' 
                              and `surrender_fee`.`sf_plan`='{$qr_plan}' and `surrender_fee_list`.`sfl_price` != '0.00' ORDER BY `surrender_fee_list`.`sfl_no` ASC";
                $datapayC=new row_admission($datapayCSql);
                foreach($datapayC->row_admission_print() as $rc=>$datapayCRow){ 
                    $sumpay=$sumpay+$datapayCRow["sfl_price"];
                ?>
                    <?php
                            if($datapayBRow["sfl_price"]=="0.00"){ ?>
                            
                    <?php   }else{ ?>
                            <div align="right"><?php echo number_format($datapayCRow["sfl_price"], 2, '.', ',');?>&nbsp;&nbsp;&nbsp;</div>                            
                    <?php   }?>                               
                            

                            
            <?php    } ?>                        
                        </td>
                    
                </tr> 
                 
                <tr>
                    <td></td>
                    <td>
						<?php $bathformat=new bathformat(number_format($sumpay, 2, '.', ','));?>
                        <div><center><?php echo $bathformat->run_pay();?> </center></div>
                    </td>
                    <td>
                        <div align="right"><?php echo number_format($sumpay, 2, '.', ',');?>&nbsp;&nbsp;&nbsp;</div>
                    </td>
                </tr>
                
            </tbody>
        </table>	

        <?php
            $payqrcode01="099400043439110";
            $payqrcode02=$qr_stuid;
            $payqrcode03="ADMISSION".$qr_year.$qr_level.$qr_plan;
            $payqrcode04="ACADEMIC".$qr_year;
            $payqrcode05=number_format($sumpay, 2, '.', '');
            //$payqrcode05=number_format(1, 2, '.', '');
            
            //$TqRcTag=new TqRcTag($payqrcode01,$payqrcode02,$payqrcode03,$payqrcode04,$payqrcode05);
            
            // $TqRcTag="|09940004343911014875TUITIONFEES102564775000";
            
            /*$imgqrcode=new arohamQR();
            $imgqrcode_txt=$TqRcTag->RunTqRcTag();
            $imgqrcode_txt='|099400043439110%0D14875%0DTUITIONFEES102564%0D775000';
            $imgqrcode->text($imgqrcode_txt);*/
            
            $pay=str_replace('.','', $payqrcode05);
           
            
            
                        
        ?>
        <br><br>
        <table style="width: 100%; vertical-align: top; font-size: 20px;font-family: THSarabunNew; font-weight: bold;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td style="width: 30%;">
                        <div>
                            <center><img src="https://chart.googleapis.com/chart?cht=qr&chl=%7C<?php echo $payqrcode01;?>%0D<?php echo $payqrcode02;?>%0D<?php echo $payqrcode03;?>%0D<?php echo $pay;?>&chs=140x140&choe=UTF-8&chld=L|2" class="Qr code <?php echo $payqrcode01;?>" width="140" class="img-thumbnail"/></center>   
                        </div>
                        <div>Biller&nbsp;ID&nbsp;:&nbsp;<?php echo $payqrcode01;?></div>
                        <div>Ref.1&nbsp;:&nbsp;<?php echo $payqrcode02;?></div>
                        <div>Ref.2&nbsp;:&nbsp;<?php echo $payqrcode03;?></div>   
                    </td>
                    <td style="width: 70%;">
                        <div><b>วิธีการชำระ</b></div>
                        <div>1&nbsp;.&nbsp;ทำการสแกน&nbsp;QR&nbsp;Code&nbsp;ที่ปรากฏในระบบ&nbsp;ด้วยแอปพลิเคชัน Mobile&nbsp;Banking&nbsp;ของท่าน</div>
                        <div>2&nbsp;.&nbsp;ตรวจสอบข้อมูลที่ปรากฏใน&nbsp;Mobile&nbsp;Banking&nbsp;ให้ถูกต้องก่อนชำระเงิน</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ตรวจสอบเลขประจำตัวผู้สมัครให้ถูกต้อง</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ตรวจสอบจำนวนเงินให้ถูกต้อง</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ตรวจสอบชื่อผู้รับเงินต้องเป็น&nbsp;โรงเรียนเรยีนาเชลีวิทยาลัย&nbsp;หรือ&nbsp;REGINA&nbsp;COELI&nbsp;COLLEGE&nbsp;SCHOOL&nbsp;เท่านั้น</div>
                        <div>3&nbsp;.&nbsp;สำหรับหลักฐานการชำระเงินให้ท่านเก็บไว้เป็นหลักฐาน</div>
                        <div>4&nbsp;.&nbsp;ทางโรงเรียนจะทำการตรวจสอบรายการและยืนยันการชำระเงินของท่าน </div>
                        <div>5&nbsp;.&nbsp;การชำระเงินจะเสร็จสมบูรณ์&nbsp;เมื่อทางโรงเรียนได้ตรวจสอบการชำระเงินของท่านเรียบร้อยแล้ว</div>
                        <div>6&nbsp;.&nbsp;หากต้องการใบเสร็จรับเงิน&nbsp;ติดต่อขอรับได้ที่ห้องการเงินของโรงเรียน</div>
                        <div>7&nbsp;.&nbsp;กรณีต้องการสอบถามเพิ่มเติ่ม&nbsp;กรณาติดต่อ&nbsp;053-282395&nbsp;ต่อ&nbsp;0</div>
                    </td>
                    
                <tr>
            <tbody>
        </table>	
	
	</section>
	
	<?php
			if(($leve_ID==11 or $leve_ID==31 or $leve_ID==41)){ ?>
			
	<section class="sheet padding-10mm printA">
	
		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" style="width: 65px; height: 69px;" alt=""/></td>
					<td>
						<center>
							<div style="font-style:bold; font-size: 25px;"><b>ใบแทนใบเสร็จรับเงิน&nbsp;ค่าหนังสือเรียน&nbsp;ปีการศึกษา&nbsp;<?php echo $next_year;?>&nbsp;</b></div>
							<div style="font-style:bold; font-size: 25px;"><b>โรงเรียนเรยีนาเชลีวิทยาลัย&nbsp;จังหวัดเชียงใหม่&nbsp;</b></div>			
						</center>
					</td>
					<td>
						<div style="font-style:bold; font-size: 20px;"><font color="#FA0408"><b>สำหรับโรงเรียน</b></font></div>
						<div style="font-style:bold; font-size: 20px; float:right;"><b>เลขที่</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="10" value="<?php echo $user_login;?>"></div>
					</td>
				</tr>
			</tbody>
		</table><br>
		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div style="font-style:bold; font-size: 20px;"><b>เลขประจำตัวผู้สมัคร</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="10" value="<?php echo $user_login;?>"><b>ชื่อ-สกุล</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="45" value="<?php echo $mynameTh;?>"><b>ชั้น</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="20" value="<?php echo $leve_name;?>"></div>
						<div style="font-style:bold; font-size: 20px;"><b>ห้อง</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="5" value="-"><b>แผนการเรียน</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="60" value="<?php echo $call_quota->plan_LName;?>"></div>
					</td>
				</tr>
			</tbody>
		</table>	
		<table style="width: 740px; font-size: 20px;" border="1" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th style="width: 46px;"><div><center>ลำดับ</center></div></th>
					<th style="width: 546px;"><div><center>รายการ</center></div></th>
					<th style="width: 146px;"><div><center>จำนวนเงิน</center></div></th>
				</tr>
			</thead>
			<thead>
			
			<?php
					$book_Count=1;
					$book_Sumpay=0;
					$DataBooks=new PrintStoreBooks($next_year,$user_level,$user_plan);
					foreach($DataBooks->PrintStoreBooksRun() as $rc_books=>$DataBooksRow){	?>
					
				<tr>
					<td style="width:  46px;"><div style="float:center;"><center><?php echo $book_Count;?></center></div></td>
					<td style="width: 546px;"><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $DataBooksRow["RSD_Txt"];?></div></td>
					<td style="width: 146px;"><div style="float:center;"><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($DataBooksRow["RSD_Price"], 2, '.', ',');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></center></div></td>
					
				</tr>	
				
			<?php	$book_Count=$book_Count+1;
					$book_Sumpay=$book_Sumpay+$DataBooksRow["RSD_Price"];
					}  ?>
			
			</thead>
		</table>		
<?php
    //$class=$data_stu->IDLevel;
    $class_ex=$leve_EnKey;
    $txt_billerId="099400043439110";
    $txt_ref1=strtoupper($user_login."L".$class_ex);
    $txt_ref2=strtoupper("RCBOOKS10Y".$next_year);
    $txt_amount=number_format($book_Sumpay, 2, '.', '');                                                   
    $txt_width="104";
    $payQRCode=new QRCode_scb($txt_billerId,$txt_ref1,$txt_ref2,$txt_amount,$txt_width);
?>  		
		<br>
		<table style="width: 740px; font-size: 20px;" border="0" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<td style="width: 370px;">
					    <div><img src="<?php echo $payQRCode->call_QRCode_scb();?>" class="img-thumbnail" alt="<?php echo $txt_billerId.$txt_ref1.$txt_ref2.$txt_amount.$txt_width;?>" width="104" height="104"></div>
						<div><b>BillerID&nbsp;:&nbsp;</b><?php echo $txt_billerId;?></div>
						<div><b>ref1&nbsp;:&nbsp;</b><?php echo $txt_ref1;?></div>
						<div><b>ref2&nbsp;:&nbsp;</b><?php echo $txt_ref2;?></div>
						<div><b>จำนวนเงิน&nbsp;:&nbsp;</b><?php echo number_format($book_Sumpay, 2, '.', ',');?></div>
					</td>
					<td style="width: 370px;">
						<div><b>ช่องทางการชำระเงิน</b></div>
						<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินสด</div>
						<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินโอน&nbsp;(QR&nbsp;Code)</div>
						<div>&nbsp;</div>
						<div><b>ลงชื่อผู้จ่ายเงิน(ตัวบรรจง)</b>......................................................</div>
						<div><b>โทรศัพท์</b>..............................................................</div>
						<div></div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ลงชื่อผู้รับเงิน</b>..........................................</div>
					</td>
				</tr>
			<thead>
		</table>		
		
		<table style="width: 740px; font-size: 20px;" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td><center>-------------------------------------------------------------------------ฉีกตามรอยปะ--------------------------------------------------------------------</center></td>
			<tr>
		</table>

		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" style="width: 65px; height: 69px;" alt=""/></td>
					<td>
						<center>
							<div style="font-style:bold; font-size: 25px;"><b>ใบแทนใบเสร็จรับเงิน&nbsp;ค่าหนังสือเรียน&nbsp;ปีการศึกษา&nbsp;<?php echo $next_year;?>&nbsp;</b></div>
							<div style="font-style:bold; font-size: 25px;"><b>โรงเรียนเรยีนาเชลีวิทยาลัย&nbsp;จังหวัดเชียงใหม่&nbsp;</b></div>			
						</center>
					</td>
					<td>
						<div style="font-style:bold; font-size: 20px;"><font color="#FA0408"><b>สำหรับแลกรับหนังสือ</b></font></div>
					    <div style="font-style:bold; font-size: 20px; float:right;"><b>เลขที่</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="10" value="<?php echo $user_login;?>"></div>
					</td>
				</tr>
			</tbody>
		</table><br>	

		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div style="font-style:bold; font-size: 20px;"><b>เลขประจำตัวผู้สมัคร</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="10" value="<?php echo $user_login;?>"><b>ชื่อ-สกุล</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="45" value="<?php echo $mynameTh;?>"><b>ชั้น</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="20" value="<?php echo $leve_name;?>"></div>
						<div style="font-style:bold; font-size: 20px;"><b>ห้อง</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="5" value="-"><b>แผนการเรียน</b><input type="text" readonly="readonly" required="required" style="font-family: THSarabunNew;font-size: 20px; text-align: center; border:0px; text-align: center; border:0px;" size="60" value="<?php echo $call_quota->plan_LName;?>"></div>
					</td>
				</tr>
			</tbody>
		</table>
		
		<table style="width: 740px; font-size: 20px;" border="1" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th style="width:  46px;"><div><center>ลำดับ</center></div></th>
					<th style="width: 546px;"><div><center>รายการ</center></div></th>
					<th style="width: 146px;"><div><center>จำนวนเงิน</center></div></th>
				</tr>
			</thead>
			<thead>
			
			<?php
					$book_Count=1;
					$book_Sumpay=0;
					$DataBooks=new PrintStoreBooks($next_year,$user_level,$user_plan);
					foreach($DataBooks->PrintStoreBooksRun() as $rc_books=>$DataBooksRow){	?>
					
				<tr>
					<td style="width:  46px;"><div style="float:center;"><center><?php echo $book_Count;?></center></div></td>
					<td style="width: 546px;"><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $DataBooksRow["RSD_Txt"];?></div></td>
					<td style="width: 146px;"><div style="float:center;"><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($DataBooksRow["RSD_Price"], 2, '.', ',');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></center></div></td>
				</tr>	
				
			<?php	$book_Count=$book_Count+1;
					$book_Sumpay=$book_Sumpay+$DataBooksRow["RSD_Price"];
					}  ?>			

			</thead>
		</table>		
		
	
		<br>
		<table style="width: 740px; font-size: 20px;" border="0" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<td style="width: 370px;"></td>
					<td style="width: 370px;">
						<div><b>ช่องทางการชำระเงิน</b></div>
						<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินสด</div>
						<div>&nbsp;<img src="<?php echo base_url();?>/tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินโอน&nbsp;(QR&nbsp;Code)</div>
						<div>&nbsp;</div>
						<div><b>ลงชื่อผู้จ่ายเงิน(ตัวบรรจง)</b>......................................................</div>
						<div><b>โทรศัพท์</b>..............................................................</div>
						<div></div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ลงชื่อผู้รับเงิน</b>..........................................</div>
					</td>
				</tr>
			<thead>
		</table>				
	
	</section>			
			
			
	<?php	}else{} ?>
	
	

	
   
</body>
</html>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			










