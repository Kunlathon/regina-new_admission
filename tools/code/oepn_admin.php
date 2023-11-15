<?php
	include("../database/class_admission.php");
	include("../database/class_pdo.php");
	include("../database/class_pdodatastu.php");

	include("../database/pdo_admission.php");
	include("../database/pdo_conndatastu.php");
	include("../database/pdo_data.php");
	
	include("../sql_pdo/gotolink.php");
	$goingtolink=new goingtolink($_SERVER["REMOTE_ADDR"]);
	
	$rat_year="2566";
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
	
		<!-- Global stylesheets -->

	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!--css code-->
<style>
	@font-face {
			font-family: 'surafont_sanukchang';
			src: url('../font/surafont_sanukchang-webfont.eot');
			src: url('../font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
			url('../font/surafont_sanukchang-webfont.woff') format('woff'),
			url('../font/surafont_sanukchang.ttf') format('truetype');
	}

	body{
			font-family: "surafont_sanukchang";
			font-size: 16px;
			color: #032E3B;
		}
		
</style>
	<!-- Core JS files -->
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>


	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	<!-- /theme JS files -->

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
	
</head>

<body>
	
	<?php
		$copy_stuID=filter_input(INPUT_POST,'copy_stuID');
		
		if($copy_stuID==""){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
					<div class="panel panel-info">
						<div class="panel-heading">กำหนดการ....</div>
						<div class="panel-body">
							<div class="row">
								<!--<div class="col-<?php echo $grid;?>-10">
									<li>วันที่&nbsp;26&nbsp;พฤศจิกายน&nbsp;2564&nbsp;ประกาศรายชื่อ&nbsp;เลขที่นั่งสอบ&nbsp;และสถานที่สอบคัดเลือกนักเรียน&nbsp;ห้องเรียน&nbsp;สสวท.</li>
									<li>วันที่&nbsp;27&nbsp;ธันวาคม&nbsp;2564&nbsp;สอบคัดเลือกนักเรียน&nbsp;ห้องเรียน&nbsp;สสวท.&nbsp;เวลา&nbsp;13.00-16.00 น.</li>
									<li>วันที่&nbsp;1&nbsp;ธันวาคม&nbsp;2564&nbsp;ประกาศผลสอบคัดเลือกนักเรียน&nbsp;ห้องเรียน&nbsp;สสวท.&nbsp;ชั้น&nbsp;ม.1&nbsp;และ&nbsp;ม.4&nbsp;แผนการเรียนวิทย์-คณิต</li>
                                    <li>วันที่&nbsp;5&nbsp;ก.พ.&nbsp;2566&nbsp;กรุณานำใบมอบตัวพร้อมกับหลักฐานการชำระเงินนำมายื่นที่โรงเรียนพร้อมวัดตัวตัดชุดนักเรียน</li>
								</div>-->
							</div>
						</div>
					</div>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
				<?php
					$rc_admission_testSql="SELECT * 
										   FROM `rc_admission_test`
										   WHERE `rat_IDCard`='{$copy_stuID}' and `rat_year`='{$rat_year}'";
				  	$rc_admission_test=new notrow_admission($rc_admission_testSql);
					foreach($rc_admission_test->notrow_admission_print() as $rc_key=>$rc_admission_testRow){
						$rat_IDReg=$rc_admission_testRow["rat_IDReg"];
						$rat_IDCard=$rc_admission_testRow["rat_IDCard"];
						$rat_testtxt=$rc_admission_testRow["rat_testtxt"];
						$rat_plan=$rc_admission_testRow["rat_plan"];
						$rat_testStatus=$rc_admission_testRow["rat_testStatus"];
						
						$rc_planA="SELECT `Name` FROM `rc_plan` WHERE `IDPlan`='{$rat_plan}';";
						$rc_planARs=new notrow_admission($rc_planA);
						foreach($rc_planARs->notrow_admission_print() as $rckey=>$rc_planARow){
							$plan_nameA=$rc_planARow["Name"];
						}
						if($rat_IDReg==null or $rat_IDReg==""){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			<?php
					$admission_dataSql="SELECT count(`IDReg`) as `count_admission` 
									    FROM `rc_student_admission` 
										WHERE `IDReg` = '{$rat_IDReg}' 
										AND `IDCard`='{$rat_IDCard}';";
					$admission_data=new notrow_admission($admission_dataSql);
					foreach($admission_data->notrow_admission_print() as $rc_key=>$admission_dataRow){
						$count_admission=$admission_dataRow["count_admission"];
					}
						if($count_admission>=1){ ?>
							<div class="col-<?php echo $grid;?>-6">
								<div class="alert alert-danger">
									<strong>ไม่พบข้อมูล...</strong> 
								</div>			
							</div>							
			<?php		}else{ ?>
							<div class="col-<?php echo $grid;?>-6">
								<div class="panel panel-info">
								<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว ปีการศึกษา 2566</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-<?php echo $grid;?>-12">
											<div>ยังไม่ได้กรอกใบสมัคร กรุณา <a href="http://rc.regina.ac.th/Application/admission2022/">คลิกที่นี้</a></a> เพื่อทำการสมัคร</div>
										</div>
									</div>
								</div>
								</div>				
							</div>														
			<?php		} ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			<?php		}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			<?php
				$admissionSql="select `stu_level`,`stu_prefix`,`stu_fname`,`stu_sname`  from `rc_student_admission` where `IDReg`='{$rat_IDReg}' and `IDCard`='{$copy_stuID}';";
				$admissionRs=new notrow_admission($admissionSql);
					foreach($admissionRs->notrow_admission_print() as $rckey=>$admissionRow){
						if(is_array($admissionRow) && count($admissionRow)){ 
							$admiss_level=$admissionRow["stu_level"];
							if($admissionRow["stu_prefix"]==2){
								$myname="เด็กหญิง&nbsp;".$admissionRow["stu_fname"]."&nbsp;".$admissionRow["stu_sname"];
							}elseif($admissionRow["stu_prefix"]==4){
								$myname="นางสาว&nbsp;".$admissionRow["stu_fname"]."&nbsp;".$admissionRow["stu_sname"];
							}else{
								$myname=$admissionRow["stu_fname"].$admissionRow["stu_sname"];
							}
						}else{}									
					}
								if($rat_testStatus==1){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
				
		<?php
				if($admiss_level==3){ ?>
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว ปีการศึกษา 2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp;เป็นผู้มีสิทธิ์มอบตัวเข้าศึกษา</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน</font> <font color="#F20509"><?php echo $plan_nameA;?></font></div>
									</div>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<form name="oepn_admin" action="<?php echo $goingtolink->Rungotolink();?>/surrender/update" method="post">
											<center><button type="submit" name="user_login" class="btn btn-default" value="<?php echo "$rat_IDReg";?>" style="font-family: surafont_sanukchang; font-size: 26px">ดำเนินการมอบตัว</button></center>
										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>				
		<?php	}elseif($admiss_level==11){ ?>
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว ปีการศึกษา 2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp;เป็นผู้มีสิทธิ์มอบตัวเข้าศึกษา</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน</font> <font color="#F20509"><?php echo $plan_nameA;?></font></div>
									</div>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<form name="oepn_admin" action="<?php echo $goingtolink->Rungotolink();?>/surrender/update" method="post">
											<center><button type="submit" name="user_login" class="btn btn-default" value="<?php echo "$rat_IDReg";?>" style="font-family: surafont_sanukchang; font-size: 26px">ดำเนินการมอบตัว</button></center>
										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>				
		<?php	}elseif($admiss_level==31){ ?>
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว&nbsp;ปีการศึกษา&nbsp;2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">ขอแสดงความยินดี เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp; นักเรียนได้รับสิทธิ์เข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่&nbsp;1&nbsp;ปีการศึกษา&nbsp;2566</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน</font> <font color="#F20509"><?php echo $plan_nameA;?></font></div>
										<div>-&nbsp;<a href="<?php echo $goingtolink->Rungotolink();?>/tools/img/documents/pdf/กำหนดการมอบตัว  ม.1.pdf" target="_blank"><font color="#FF0000"><b>กำหนดการมอบตัว&nbsp;ม.1&nbsp;(ดาวน์โหลด)</b></font></a></div>
									</div>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<form name="oepn_admin" action="<?php echo $goingtolink->Rungotolink();?>/surrender/update" method="post">
											<center><button type="submit" name="user_login" class="btn btn-default" value="<?php echo "$rat_IDReg";?>" style="font-family: surafont_sanukchang; font-size: 26px">ดำเนินการมอบตัว</button></center>
										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>				
		<?php	}elseif($admiss_level==41){ ?>
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว ปีการศึกษา 2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">ขอแสดงความยินดี เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp; นักเรียนได้รับสิทธิ์เข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่&nbsp;4&nbsp;ปีการศึกษา&nbsp;2566</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน</font> <font color="#F20509"><?php echo $plan_nameA;?></font></div>
										<div>-&nbsp;<a href="<?php echo $goingtolink->Rungotolink();?>/tools/img/documents/pdf/กำหนดการมอบตัว ม.4.pdf" target="_blank"><font color="#FF0000"><b>กำหนดการมอบตัว&nbsp;ม.4&nbsp;(ดาวน์โหลด)</b></font></a></div>
									</div>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<form name="oepn_admin" action="<?php echo $goingtolink->Rungotolink();?>/surrender/update" method="post">
											<center><button type="submit" name="user_login" class="btn btn-default" value="<?php echo "$rat_IDReg";?>" style="font-family: surafont_sanukchang; font-size: 26px">ดำเนินการมอบตัว</button></center>
										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>				
		<?php	}else{ ?>
					<div class="col-<?php echo $grid;?>-6">
						<div class="alert alert-danger">
							<strong>ไม่พบข้อมูล...</strong> 
						</div>			
					</div>				
		<?php	} ?>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
				<?php					
								}elseif($rat_testStatus==2){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
				<?php					
								}elseif($rat_testStatus==3){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
				<div class="col-<?php echo $grid;?>-6">
			
				</div>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
				<?php					
								}elseif($rat_testStatus==4){?>
									
				<?php			}elseif($rat_testStatus==5){?>
				
							<?php
									if($admiss_level==31){  ?>
									<div class="col-<?php echo $grid;?>-6">
										<div class="panel panel-info">
											<div class="panel-heading">ประกาศผลผู้มีสิทธิ์สอบรอบทั่วไป ปีการศึกษา 2566</div>
											<div class="panel-body">
												<!--<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<div>-&nbsp;เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp;เป็นผู้มีสิทธิ์เข้าสัมภาษณ์เพื่อศึกษาต่อระดับชั้นมัธยมศึกษาปีที่ 1&nbsp;(รอบทั่วไป)</div>
														<div>-&nbsp;วิธีการสัมภาษณ์&nbsp;:&nbsp;ZOOM&nbsp;Meeting</div>
														<div>-&nbsp;ในวันที่สอบ&nbsp;:&nbsp;วันเสาร์ที่&nbsp;6&nbsp;เดือน&nbsp;พฤศจิกายน&nbsp;พ.ศ.&nbsp;2564&nbsp;เวลา&nbsp;<?php echo $rat_testtxt;?></div>
														<div>-&nbsp;<a href="<?php echo $goingtolink->Rungotolink();?>/tools/img/documents/pdf/ม.1 กำหนดการสอบ นร.ใหม่ ปี 65(รอบทั่วไป).pdf" target="_blank"><font color="#FF0000"><b>รายละเอียดการเข้าสัมภาษณ์ผ่านระบบออนไลน์&nbsp;(ดาวน์โหลด)</b></font></a></div>
													</div>
												</div>-->
											</div>
										</div>				
									</div> 										
							<?php	}elseif($admiss_level==41){ ?>
									<div class="col-<?php echo $grid;?>-6">
										<div class="panel panel-info">
											<div class="panel-heading">ประกาศผลผู้มีสิทธิ์สอบรอบทั่วไป ปีการศึกษา 2566</div>
											<div class="panel-body">
												<!--<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<div>-&nbsp;เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp;เป็นผู้มีสิทธิ์เข้าสอบ เเละสัมภาษณ์เพื่อศึกษาต่อระดับชั้นมัธยมศึกษาปีที่ 4&nbsp;(รอบทั่วไป)</div>
														<div>-&nbsp;<b>ในวันเสาร์ที่&nbsp;6&nbsp;พฤศจิกายน&nbsp;2564</b></div>
														<div>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลา&nbsp;07.30&nbsp;-&nbsp;11.50 น.&nbsp;สอบผ่านระบบออนไลน์</div>
														<div>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลา&nbsp;<?php echo $rat_testtxt;?>&nbsp;เข้าสัมภาษณ์พร้อมผู้ปกครองผ่านระบบออนไลน์</div>
														<div>-&nbsp;<a href="<?php echo $goingtolink->Rungotolink();?>/tools/img/documents/pdf/ม.4 กำหนดการสอบ นร.ใหม่ ปี 65(รอบทั่วไป).pdf" target="_blank"><font color="#FF0000"><b>รายละเอียดการเข้าสัมภาษณ์ผ่านระบบออนไลน์&nbsp;(ดาวน์โหลด)</b></font></a></div>
													</div>
												</div>-->
											</div>
										</div>				
									</div>					
									
							<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
									<div class="col-<?php echo $grid;?>-6">
										<div class="alert alert-danger">
											<strong>ไม่พบข้อมูล...</strong> 
										</div>			
									</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
							<?php	}?>
													
				<?php			}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
									<div class="col-<?php echo $grid;?>-6">
										<div class="alert alert-danger">
											<strong>ไม่พบข้อมูล...</strong> 
										</div>			
									</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->									
				<?php		   }
							?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->							
			<?php		}
					}
				?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
	<?php	}      ?>
</body>
</html>