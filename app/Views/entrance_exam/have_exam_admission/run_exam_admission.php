<!--****************************************************************-->
    <script type="text/javascript">
        function setScreenHWCookie() {
            $.cookie('sw',screen.width);
                //$.cookie('sh',screen.height);
            return true;
        }
            setScreenHWCookie();
    </script>
<!--****************************************************************-->
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
<!--****************************************************************-->	
<?php
	include("tools/database/class_admission.php");
	include("tools/database/class_pdo.php");
	include("tools/database/class_pdodatastu.php");

	include("tools/database/pdo_admission.php");
	include("tools/database/pdo_conndatastu.php");
	include("tools/database/pdo_data.php");
?>
	<?php
		$copy_stuID=filter_input(INPUT_POST,'copy_stuID');
			if(isset($copy_stuID,$rat_year)){
				
				$rc_admission_testSql="SELECT * FROM `rc_admission_test`
								       WHERE `rat_IDCard`='{$copy_stuID}' AND `rat_year`='{$rat_year}'";
				$rc_admission_test=new notrow_admission($rc_admission_testSql);
				foreach($rc_admission_test->notrow_admission_print() as $rc_key=>$rc_admission_testRow){
					if(isset($rc_admission_testRow["rat_IDReg"])){
						$rat_IDReg=$rc_admission_testRow["rat_IDReg"];
					}else{
						$rat_IDReg="-";
					}
					if(isset($rc_admission_testRow["rat_IDCard"])){
						$rat_IDCard=$rc_admission_testRow["rat_IDCard"];
					}else{
						$rat_IDCard="-";
					}
					if(isset($rc_admission_testRow["rat_testtxt"])){
						$rat_testtxt=$rc_admission_testRow["rat_testtxt"];
					}else{
						$rat_testtxt="-";
					}
					if(isset($rc_admission_testRow["rat_plan"])){
						$rat_plan=$rc_admission_testRow["rat_plan"];
					}else{
						$rat_plan="-";
					}	
					if(isset($rc_admission_testRow["rat_testStatus"])){
						$rat_testStatus=$rc_admission_testRow["rat_testStatus"];
					}else{
						$rat_testStatus="-";
					}
					
					if((isset($rc_admission_testRow["rat_testtxt"]))){
						$rat_testtxt=$rc_admission_testRow["rat_testtxt"];
					}else{
						$rat_testtxt="";
					}
				
					
					
//level plan
					$level_PlanSql="SELECT `stu_plan1`,`stu_plan2` FROM `rc_student_level` WHERE `IDReg`='{$rat_IDReg}'";
					$level_PlanRs=new notrow_admission($level_PlanSql);
					foreach($level_PlanRs->notrow_admission_print() as $rckey=>$level_PlanRow){
						if(is_array($level_PlanRow) && count($level_PlanRow)){
							$planA=$level_PlanRow["stu_plan1"];
							$planB=$level_PlanRow["stu_plan2"];
						}else{
							$planA="-";
							$planB="-";
						}
					}
//level plan End					
					
//plan						
					$rc_planA="SELECT `Name`,`LName` FROM `rc_plan` WHERE `IDPlan`='{$planA}';";
					$rc_planARs=new notrow_admission($rc_planA);
					foreach($rc_planARs->notrow_admission_print() as $rckey=>$rc_planARow){
						if(is_array($rc_planARow) && count($rc_planARow)){
							$plan_nameAN=$rc_planARow["Name"];
							$plan_nameAL=$rc_planARow["LName"];
						}else{
							$plan_nameAN=null;							
							$plan_nameAL=null;
						}
					}	

					$rc_planB="SELECT `Name`,`LName` FROM `rc_plan` WHERE `IDPlan`='{$planB}';";
					$rc_planBRs=new notrow_admission($rc_planB);
					foreach($rc_planBRs->notrow_admission_print() as $rckey=>$rc_planBRow){
						if(is_array($rc_planBRow) && count($rc_planBRow)){
							$plan_nameBN=$rc_planBRow["Name"];
							$paln_nameBL=$rc_planBRow["LName"];
						}else{
							$plan_nameBN=null;
							$paln_nameBL=null;
						}
					}					
//plan End						
					
					
				}
//-------------------------------------------------------------------
						if($rat_testStatus==null or $rat_testStatus==0){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	
		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานข้อมูลการมอบตัวนักเรียนใหม่รอบทั่วไป</div>
				<div class="panel-body">ไม่พบข้อมูล</div>
			</div>
		</div>
							
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->							
				<?php	}elseif($rat_testStatus==5){
//-------------------------------------------------------------------							
							$admissionSql="select `stu_level`,`stu_prefix`,`stu_fname`,`stu_sname`  from `rc_student_admission` where `IDReg`='{$rat_IDReg}' and `IDCard`='{$copy_stuID}';";
							$admissionRs=new notrow_admission($admissionSql);
							foreach($admissionRs->notrow_admission_print() as $rckey=>$admissionRow){
								if(is_array($admissionRow) && count($admissionRow)){
									$admiss_level=$admissionRow["stu_level"];
										if($admissionRow["stu_prefix"]==2){
											$myname="เด็กหญิง ".$admissionRow["stu_fname"]." ".$admissionRow["stu_sname"];
										}elseif($admissionRow["stu_prefix"]==4){
											$myname="นางสาว ".$admissionRow["stu_fname"]." ".$admissionRow["stu_sname"];
										}else{
											$myname=$admissionRow["stu_fname"].$admissionRow["stu_sname"];
										}									
								}else{
									$myname="-";
								}
							}
//-------------------------------------------------------------------					
							if(($admiss_level==41)){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">ประกาศรายชื่อผู้มีสิทธิ์สอบรอบทั่วไป ระดับชั้น ม.4 ปีการศึกษา 2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">เป็นเลขประจำตัวผู้สมัคร <?php echo $rat_IDReg;?> <?php echo $myname;?> นักเรียนมีสิทธิ์เข้าสอบคัดเลือกรอบทั่วไป ระดับชั้นมัธยมศึกษาปีที่ 4 ปีการศึกษา <?php echo $rat_year;?></font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน อันดับที่ 1</font> <font color="#F20509"><?php echo $plan_nameAL;?></font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน อันดับที่ 2</font> <font color="#F20509"><?php echo $paln_nameBL;?></font></div>
									</div>
								</div>
							</div>
						</div>				
					</div>		


					<div class="col-<?php echo $grid;?>-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div style="text-align: center; font-size: 20px;">กำหนดการสอบข้อเขียน และการสัมภาษณ์</div>
								<div style="text-align: center; font-size: 20px">เพื่อคัดเลือกนักเรียนเข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่ 4 ปีการศึกษา <?php echo $rat_year;?></div>
								<div style="text-align: center; font-size: 40px; font-weight: bold; color: #3401FB;">วันเสาร์ ที่ 7 ตุลาคม พ.ศ. 2566</div>						
							</div>
						</div>
					</div>


				<div class="col-<?php echo $grid;?>-6">
				    <div class="panel panel-success">
						<div class="panel-heading">การเตรียมความพร้อมของผู้เข้าสอบ</div>
						<div class="panel-body">
							<div>     - อุปกรณ์เครื่องเขียน เช่น ดินสอ 2B ยางลบ</div>
							<div>     - นักเรียนเตรียมผลงานนักเรียน (Portfolio) มาเพื่อประกอบการสัมภาษณ์ (ถ้ามี)</div>
							<div>     - นักเรียนแต่งกายด้วยชุดนักเรียน</div>
							<div>	  - ควรมาถึงสถานที่ก่อนเวลาอย่างน้อย 15 นาที</div>
							<div>     - ขอความร่วมมือนักเรียนและผู้ปกครองสวมหน้ากากอนามัย </div>					  
						</div>
					</div>
				</div>
				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-success">
						<div class="panel-heading">ตารางสอบข้อเขียน</div>
						<div class="panel-body">
							<div class="table-responsive">

	<?php
			if(($planA==14)){	?>

								<table class="table table-bordered">
									<tr>
										<td>เวลา</td>
										<td>นาที</td>
										<td>วิชา</td>
										<td>สถานที่</td>
									</tr>
									<tr>
										<td colspan="4">ช่วงเช้า</td>
									</tr>
									<tr>
										<td>08.00 - 08.30 น.</td>
										<td>30</td>
										<td>ลงทะเบียน</td>
										<td>ลานแดง</td>
									</tr>
									<tr>
										<td>08.30 – 09.10 น. </td>
										<td>40</td>
										<td> วิชา คณิตศาสตร์ </td>
										<td rowspan="5">ห้องเมริชี</td>
									</tr>
									<tr>
										<td>09.10 - 09.50 น. </td>
										<td>40</td>
										<td>วิชา ภาษาอังกฤษ</td>
										<td rowspan="5">ห้องเมริชี</td>
									</tr>
									<tr>
										<td>09.50 - 10.00 น. </td>
										<td>10</td>
										<td>พัก</td>
									</tr>
										<tr>
										<td>10.00 – 10.40 น. </td>
										<td>40</td>
										<td> วิชา วิทยาศาสตร์ </td>
									</tr>
									<tr>
										<td colspan="4">ช่วงบ่าย</td>
									</tr>
										<tr>
										<td>11.00 – 12.00 น.</td>
										<td>&nbsp;</td>
										<td>การสัมภาษณ์นักเรียนพร้อมผู้ปกครอง</td>
										<td>ห้องอัญจลา</td>
									</tr>
								</table>

	<?php	}else{ ?>
							<table class="table table-bordered">
									<tr>
										<th style="text-align: center;">เวลา</th>
										<th style="text-align: center;">นาที</th>
										<th style="text-align: center;">วิชา</th>
										<th style="text-align: center;">สถานที่</th>
									</tr>
									<tr>
										<td colspan="4">ช่วงเช้า</td>
									</tr>
									<tr>
										<td>08.00 - 08.30 น.</td>
										<td>30</td>
										<td>ลงทะเบียน</td>
										<td style="text-align: center;">ลานแดง</td>
									</tr>
									<tr>
										<td>08.30 – 09.10 น.</td>
										<td>40</td>
										<td>วิชา คณิตศาสตร์</td>
										<td rowspan="5" style="text-align: center;">ห้องเมริชี</td>
									</tr>
									<tr>
										<td>09.10 - 09.50 น.</td>
										<td>40</td>
										<td>วิชา บูรณาการวิชาภาษาไทยและสังคมศึกษา</td>
									</tr>
										<tr>
										<td>09.50 - 10.10 น.</td>
										<td>20</td>
										<td>พัก</td>
									</tr>
										<tr>
										<td>10.10 – 10.50 น.</td>
										<td>40</td>
										<td>วิชา วิทยาศาสตร์</td>
									</tr>
										<tr>
										<td>10.50 - 11.30 น.</td>
										<td>40</td>
										<td>วิชา ภาษาอังกฤษ</td>
									</tr>
										<tr>
										<td colspan="4">ช่วงบ่าย</td>
									</tr>
										<tr>
										<td>13.00 – 15.00 น.</td>
										<td>&nbsp;</td>
										<td>การสัมภาษณ์นักเรียนพร้อมผู้ปกครอง</td>
										<td style="text-align: center;">ห้องอัญจลา</td>
									</tr>
								</table>
	<?php	} ?>




							</div>						
						</div>
					</div>				
				
				</div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}elseif(($admiss_level==3)){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="show_admiss">

				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-info">
						<div class="panel-heading">ประกาศรายชื่อผู้มีสิทธิ์เข้าสัมภาษณ์ ระดับชั้น อ.3 ปีการศึกษา <?php echo $rat_year;?></div>
						<div class="panel-body">
							<div class="row" style="font-size: 25px;">
								<div class="col-<?php echo $grid;?>-12">
									<div style="color: #3401FB;">เลขประจำตัวผู้สมัคร <?php echo $rat_IDReg;?> <b><?php echo $myname;?></b> นักเรียนมีสิทธิ์เข้าสัมภาษณ์</div>
									<div style="color: #3401FB;">ระดับชั้นอนุบาล 3 ปีการศึกษา <?php echo $rat_year;?></div>
									<div style="color: #3401FB;"><?php echo $rat_testtxt;?></div>
								</div>
							</div>
							<div class="row" style="font-size: 25px;" >
								<div class="col-<?php echo $grid;?>-12">
									<div style="color: #000000; font-weight: bold; text-decoration: underline;">ขั้นตอนการสัมภาษณ์</div>
								</div>
								<div class="col-<?php echo $grid;?>-12">
									<ul style="color: #000000; font-weight: bold;">
										<li>ลงทะเบียนรับบัตรคิวสัมภาษณ์ ณ ห้องประชุมอัญจลา อาคารอนุรักษ์ ชั้น 2</li>
										<li>ยื่นใบสมัครพร้อมหลักฐาน ณ จุดลงทะเบียน</li>
										<li>นักเรียนเข้าสัมภาษณ์พร้อมผู้ปกครอง</li>
									</ul>
								</div>
							</div>
						</div>
					</div>				
				</div>		


				<div class="col-<?php echo $grid;?>-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div style="text-align: center; font-size: 20px;">กำหนดการเข้าสัมภาษณ์</div>
							<div style="text-align: center; font-size: 40px; font-weight: bold; color: #3401FB;">วันเสาร์ ที่ 7 ตุลาคม พ.ศ. 2566</div>						
						</div>
					</div>
				</div>
			
			
			
				<div class="col-<?php echo $grid;?>-6">
				    <div class="panel panel-success">
						<div class="panel-heading">การเตรียมความพร้อมของผู้เข้าสัมภาษณ์</div>
						<div class="panel-body">
							<div>     - บิดา มารดา หรือ ผู้ปกครองเข้าสัมภาษณ์พร้อมกับนักเรียน</div>
							<div>     - การแต่งกาย นักเรียนสวมชุดโรงเรียนเดิม</div>
							<div>     - ขอความร่วมมือนักเรียนและผู้ปกครองสวมหน้ากากอนามัย</div>				  
						</div>
					</div>
				</div>
				<div class="col-<?php echo $grid;?>-6">
				<div class="panel panel-success">
						<div class="panel-heading">การเตรียมเอกสารของผู้เข้าสัมภาษณ์</div>
						<div class="panel-body">
							<div>     - ใบสมัคร</div>
							<div>     - รูปถ่าย 1.5 นิ้ว จำนวน 2 ใบ</div>
							<div>     - สำเนาสูจิบัตร จำนวน 1 ฉบับ</div>
							<div>     - สำเนาทะเบียนบ้าน 1 ฉบับ</div>
							<div>     - สำเนาบัตรประชาชน ของบิดา มารดา หรือ ผู้ปกครอง จำนวน 1 ฉบับ</div>
							<div>     - สำเนาทะเบียนบ้าน ของบิดา มารดา หรือ ผู้ปกครอง จำนวน 1 ฉบับ</div>
							<div>     - สำเนาการเปลี่ยนชื่อ-สกุล ของนักเรียน บิดา มารดา (ถ้ามี)</div>
							<div>     - หนังสือรับรองการเป็นนักเรียนจากสถานศึกษา หรือ สำเนา</div>
							<div>     - เอกสารแสดงผลการเรียน หรือ หนังสือรับรองผลการเรียน</div>					  
						</div>
					</div>			
				</div>

</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<?php   }elseif(($admiss_level==11)){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="show_admiss">

				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-info">
						<div class="panel-heading">ประกาศรายชื่อผู้มีสิทธิ์เข้าสัมภาษณ์ ระดับชั้น ป.1 ปีการศึกษา <?php echo $rat_year;?></div>
						<div class="panel-body">
							<div class="row" style="font-size: 25px;">
								<div class="col-<?php echo $grid;?>-12">
									<div style="color: #3401FB;">เลขประจำตัวผู้สมัคร <?php echo $rat_IDReg;?> <b><?php echo $myname;?></b> นักเรียนมีสิทธิ์เข้าสัมภาษณ์</div>
									<div style="color: #3401FB;">ระดับชั้นประถมศึกษาปีที่ 1 ปีการศึกษา <?php echo $rat_year;?></div>
									<div style="color: #3401FB;"><?php echo $rat_testtxt;?></div>
								</div>
							</div>
							<div class="row" style="font-size: 25px;" >
								<div class="col-<?php echo $grid;?>-12">
									<div style="color: #000000; font-weight: bold; text-decoration: underline;">ขั้นตอนการสัมภาษณ์</div>
								</div>
								<div class="col-<?php echo $grid;?>-12">
									<ul style="color: #000000; font-weight: bold;">
										<li>ลงทะเบียนรับบัตรคิวสัมภาษณ์ ณ ห้องประชุมอัญจลา อาคารอนุรักษ์ ชั้น 2</li>
										<li>ยื่นใบสมัครพร้อมหลักฐาน ณ จุดลงทะเบียน</li>
										<li>นักเรียนเข้าสัมภาษณ์พร้อมผู้ปกครอง</li>
									</ul>
								</div>
							</div>
						</div>
					</div>				
				</div>
			
				<div class="col-<?php echo $grid;?>-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div style="text-align: center; font-size: 20px; font-weight: bold; ">กำหนดการเข้าสัมภาษณ์</div>
							<div style="text-align: center; font-size: 40px; font-weight: bold; color: #3401FB;">วันเสาร์ ที่ 7 ตุลาคม พ.ศ. 2566</div>					
						</div>
					</div>
				</div>
			
				<div class="col-<?php echo $grid;?>-6">
				    <div class="panel panel-success">
						<div class="panel-heading">การเตรียมความพร้อมของผู้เข้าสัมภาษณ์</div>
						<div class="panel-body">
							<div>     - บิดา มารดา หรือ ผู้ปกครองเข้าสัมภาษณ์พร้อมกับนักเรียน</div>
							<div>     - การแต่งกาย นักเรียนสวมชุดโรงเรียนเดิม</div>
							<div>     - ขอความร่วมมือนักเรียนและผู้ปกครองสวมหน้ากากอนามัย</div>				  
						</div>
					</div>
				</div>
				<div class="col-<?php echo $grid;?>-6">
				<div class="panel panel-success">
						<div class="panel-heading">การเตรียมเอกสารของผู้เข้าสัมภาษณ์</div>
						<div class="panel-body">
							<div>     - ใบสมัคร</div>
							<div>     - รูปถ่าย 1.5 นิ้ว จำนวน 2 ใบ</div>
							<div>     - สำเนาสูจิบัตร จำนวน 1 ฉบับ</div>
							<div>     - สำเนาทะเบียนบ้าน 1 ฉบับ</div>
							<div>     - สำเนาบัตรประชาชน ของบิดา มารดา หรือ ผู้ปกครอง จำนวน 1 ฉบับ</div>
							<div>     - สำเนาทะเบียนบ้าน ของบิดา มารดา หรือ ผู้ปกครอง จำนวน 1 ฉบับ</div>
							<div>     - สำเนาการเปลี่ยนชื่อ-สกุล ของนักเรียน บิดา มารดา (ถ้ามี)</div>
							<div>     - หนังสือรับรองการเป็นนักเรียนจากสถานศึกษา หรือ สำเนา</div>
							<div>     - เอกสารแสดงผลการเรียน หรือ หนังสือรับรองผลการเรียน</div>					  
						</div>
					</div>			
				</div>

</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<?php   }elseif(($admiss_level==31)){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-info">
						<div class="panel-heading">ประกาศรายชื่อผู้มีสิทธิ์สอบรอบทั่วไป ระดับชั้น ม.1 ปีการศึกษา <?php echo $rat_year;?></div>
						<div class="panel-body">
							<div class="row">
								<div class="col-<?php echo $grid;?>-12">
									<div><font color="#3401FB">เป็นเลขประจำตัวผู้สมัคร <?php echo $rat_IDReg;?> <?php echo $myname;?> นักเรียนมีสิทธิ์เข้าสอบคัดเลือกรอบทั่วไป ระดับชั้นมัธยมศึกษาปีที่ 1 ปีการศึกษา <?php echo $rat_year;?></font></div>
									<div><font color="#3401FB">สายการเรียน/แผนการเรียน อันดับที่ 1</font> <font color="#F20509"><?php echo $plan_nameAN;?></font></div>
									<div><font color="#3401FB">สายการเรียน/แผนการเรียน อันดับที่ 2</font> <font color="#F20509"><?php echo $plan_nameBN;?></font></div>
								</div>
							</div>
						</div>
					</div>				
				</div>		


				<div class="col-<?php echo $grid;?>-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div style="text-align: center; font-size: 20px;">กำหนดการสอบข้อเขียน และการสัมภาษณ์</div>
							<div style="text-align: center; font-size: 20px">เพื่อคัดเลือกนักเรียนเข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่ 1 ปีการศึกษา <?php echo $rat_year;?></div>
							<div style="text-align: center; font-size: 40px; font-weight: bold; color: #3401FB;">วันเสาร์ ที่ 7 ตุลาคม พ.ศ. 2566</div>						
						</div>
					</div>
				</div>

			
				<div class="col-<?php echo $grid;?>-6">
				    <div class="panel panel-success">
						<div class="panel-heading">การเตรียมความพร้อมของผู้เข้าสอบ</div>
						<div class="panel-body">
							<div>     - อุปกรณ์เครื่องเขียน เช่น ดินสอ 2B ยางลบ</div>
							<div>     - นักเรียนเตรียมผลงานนักเรียน (Portfolio) มาเพื่อประกอบการสัมภาษณ์ (ถ้ามี)</div>
							<div>     - นักเรียนแต่งกายด้วยชุดนักเรียน</div>
							<div>	  - ควรมาถึงสถานที่ก่อนเวลาอย่างน้อย 15 นาที</div>
							<div>     - ขอความร่วมมือนักเรียนและผู้ปกครองสวมหน้ากากอนามัย</div>					  
						</div>
					</div>
				</div>
				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-success">
						<div class="panel-heading">ตารางสอบข้อเขียน</div>
						<div class="panel-body">
							<div class="table-responsive">

	<?php
			if(($planA==13)){	?>

								<table class="table table-bordered">
									<tr>
										<td>เวลา</td>
										<td>นาที</td>
										<td>วิชา</td>
										<td>สถานที่</td>
									</tr>
									<tr>
										<td colspan="4">ช่วงเช้า</td>
									</tr>
									<tr>
										<td>08.00 - 08.30 น.</td>
										<td>30</td>
										<td>ลงทะเบียน</td>
										<td>ลานแดง</td>
									</tr>
									<tr>
										<td>08.30 – 09.10 น. </td>
										<td>40</td>
										<td> วิชา คณิตศาสตร์ </td>
										<td rowspan="5">ห้องเมริชี</td>
									</tr>
									<tr>
										<td>09.10 - 09.50 น. </td>
										<td>40</td>
										<td>วิชา ภาษาอังกฤษ</td>
										<td rowspan="5">ห้องเมริชี</td>
									</tr>
									<tr>
										<td>09.50 - 10.00 น. </td>
										<td>10</td>
										<td>พัก</td>
									</tr>
										<tr>
										<td>10.00 – 10.40 น. </td>
										<td>40</td>
										<td> วิชา วิทยาศาสตร์ </td>
									</tr>
									<tr>
										<td colspan="4">ช่วงบ่าย</td>
									</tr>
										<tr>
										<td>11.00 – 12.00 น.</td>
										<td>&nbsp;</td>
										<td>การสัมภาษณ์นักเรียนพร้อมผู้ปกครอง</td>
										<td>ห้องอัญจลา</td>
									</tr>
								</table>

	<?php	}else{	?>

								<table class="table table-bordered">
									<tr>
										<th style="text-align: center;">เวลา</th>
										<th style="text-align: center;">นาที</th>
										<th style="text-align: center;">วิชา</th>
										<th style="text-align: center;">สถานที่</th>
									</tr>
									<tr>
										<td colspan="4">ช่วงเช้า</td>
									</tr>
									<tr>
										<td>08.00 - 08.30 น.</td>
										<td>30</td>
										<td>ลงทะเบียน</td>
										<td style="text-align: center;">ลานแดง</td>
									</tr>
									<tr>
										<td>08.30 – 09.10 น.</td>
										<td>40</td>
										<td>วิชา คณิตศาสตร์</td>
										<td rowspan="5" style="text-align: center;">ห้องเมริชี</td>
									</tr>
									<tr>
										<td>09.10 - 09.50 น.</td>
										<td>40</td>
										<td>วิชา บูรณาการวิชาภาษาไทยและสังคมศึกษา</td>
									</tr>
										<tr>
										<td>09.50 - 10.10 น.</td>
										<td>20</td>
										<td>พัก</td>
									</tr>
										<tr>
										<td>10.10 – 10.50 น.</td>
										<td>40</td>
										<td>วิชา วิทยาศาสตร์</td>
									</tr>
										<tr>
										<td>10.50 - 11.30 น.</td>
										<td>40</td>
										<td>วิชา ภาษาอังกฤษ</td>
									</tr>
										<tr>
										<td colspan="4">ช่วงบ่าย</td>
									</tr>
										<tr>
										<td>13.00 – 15.00 น.</td>
										<td>&nbsp;</td>
										<td>การสัมภาษณ์นักเรียนพร้อมผู้ปกครอง</td>
										<td style="text-align: center;">ห้องอัญจลา</td>
									</tr>
								</table>

	<?php   }?>



							</div>						
						</div>
					</div>				
				
				</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<?php   }else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="show_admiss">


				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-danger">
						<div class="panel-heading">รายงานผลจากระบบ</div>
						<div class="panel-body">ระดัยชั้น ไม่ได้อยู่ในส่วนของการรับสมัครนักเรียนรอบทั่วไป</div>
					</div>
				</div>


</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}

						}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="show_admiss">
	

		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานผลจากระบบ</div>
				<div class="panel-body">เกิดข้อผิดพลาด ไม่สามารถดำเนินการได้</div>
			</div>
		</div>
					

</div>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->							
				<?php  }
//-------------------------------------------------------------------				
			}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="show_admiss">
	

		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานผลจากระบบ</div>
				<div class="panel-body">ข้อมูลเป็นค่าว่าง ไม่สามารถดำเนินการได้</div>
			</div>
		</div>
					
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	} ?>



