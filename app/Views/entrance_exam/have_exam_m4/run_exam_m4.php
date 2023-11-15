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
					$rc_planA="SELECT `Name` FROM `rc_plan` WHERE `IDPlan`='{$planA}';";
					$rc_planARs=new notrow_admission($rc_planA);
					foreach($rc_planARs->notrow_admission_print() as $rckey=>$rc_planARow){
						if(is_array($rc_planARow) && count($rc_planARow)){
							$plan_nameA=$rc_planARow["Name"];
						}else{
							$plan_nameA="-";
						}
					}	

					$rc_planB="SELECT `Name` FROM `rc_plan` WHERE `IDPlan`='{$planB}';";
					$rc_planBRs=new notrow_admission($rc_planB);
					foreach($rc_planBRs->notrow_admission_print() as $rckey=>$rc_planBRow){
						if(is_array($rc_planBRow) && count($rc_planBRow)){
							$plan_nameB=$rc_planBRow["Name"];
						}else{
							$plan_nameB="-";
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
											$myname="เด็กหญิง&nbsp;".$admissionRow["stu_fname"]."&nbsp;".$admissionRow["stu_sname"];
										}elseif($admissionRow["stu_prefix"]==4){
											$myname="นางสาว&nbsp;".$admissionRow["stu_fname"]."&nbsp;".$admissionRow["stu_sname"];
										}else{
											$myname=$admissionRow["stu_fname"].$admissionRow["stu_sname"];
										}									
								}else{
									$myname="-";
								}
							}
//-------------------------------------------------------------------					
							if($admiss_level==41){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">ประกาศรายชื่อผู้มีสิทธิ์สอบรอบทั่วไป&nbsp;ระดับชั้น&nbsp;ม.4&nbsp;ปีการศึกษา&nbsp;2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp;นักเรียนมีสิทธิ์เข้าสอบคัดเลือกรอบทั่วไป&nbsp;ระดับชั้นมัธยมศึกษาปีที่&nbsp;4&nbsp;ปีการศึกษา&nbsp;2566</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน&nbsp;อันดับที่&nbsp;1</font> <font color="#F20509"><?php echo $plan_nameA;?></font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน&nbsp;อันดับที่&nbsp;2</font> <font color="#F20509"><?php echo $plan_nameB;?></font></div>
									</div>
								</div>
							</div>
						</div>				
					</div>		


				<div class="col-<?php echo $grid;?>-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div style="text-align: center; font-size: 18px">กำหนดการสอบข้อเขียน&nbsp;และการสัมภาษณ์&nbsp;(รอบทั่วไป)</div>
							<div style="text-align: center; font-size: 18px">เพื่อคัดเลือกนักเรียนเข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่&nbsp;4&nbsp;ปีการศึกษา&nbsp;2566</div>
							<div style="text-align: center; font-size: 18px">วันเสาร์&nbsp;ที่&nbsp;12&nbsp;พฤศจิกายน&nbsp;พ.ศ.&nbsp;2565</div>						
						</div>
					</div>
				</div>
			
			
			
				<div class="col-<?php echo $grid;?>-6">
				    <div class="panel panel-success">
						<div class="panel-heading">การเตรียมความพร้อมของผู้เข้าสอบ</div>
						<div class="panel-body">
							<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;อุปกรณ์เครื่องเขียน&nbsp;เช่น&nbsp;ดินสอ&nbsp;2B&nbsp;ยางลบ</div>
							<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;นักเรียนเตรียมผลงานนักเรียน&nbsp;(Portfolio)&nbsp;มาเพื่อประกอบการสัมภาษณ์</div>
							<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;นักเรียนแต่งกายด้วยชุดนักเรียน</div>
							<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ขอความร่วมมือนักเรียนและผู้ปกครองสวมหน้ากากอนามัย&nbsp;เพื่อการแพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา&nbsp;2019&nbsp;(COVID-19)</div>					  
						</div>
					</div>
				</div>
				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-success">
						<div class="panel-heading">ตารางสอบข้อเขียน</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th><div style="text-align: center;">เวลา</div></th>
											<th><div style="text-align: center;">นาที </div></th>
											<th><div style="text-align: center;">วิชา</div></th>
											<th><div style="text-align: center;">สถานที่</div></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><div>08.00&nbsp;-&nbsp;08.10&nbsp;น.</div></td>
											<td><div>30</div></td>
											<td><div>ลงทะเบียน</div></td>
											<td><div style="text-align: center;">ลานแดง</div></td>
										</tr>
										<tr>

											<td>
												<div>08.10&nbsp;-&nbsp;09.00 น.</div>
												<div>09.00&nbsp;-&nbsp;09.50 น.</div>
												<div>09.50&nbsp;–&nbsp;10.10&nbsp;น.</div>
												<div>10.10&nbsp;–&nbsp;11.00&nbsp;น. </div>
												<div>11.00&nbsp;–&nbsp;11.50&nbsp;น.</div>
												<div>11.50&nbsp;-&nbsp;13.00&nbsp;น.</div>
												<div>13.00&nbsp;–&nbsp;15.30&nbsp;น.</div>
											</td>
											<td>
												<div>50</div>
												<div>50</div>
												<div>20</div>
												<div>50</div>
												<div>50</div>
												<div>-</div>
												<div>150</div>
											</td>											
											<td>
												<div>วิชาคณิตศาสตร์</div>
												<div>วิชาบูรณาการวิชาภาษาไทยและสังคมศึกษา</div>
												<div style="text-align: center;">พัก</div>
												<div>วิชาวิทยาศาสตร์</div>
												<div>วิชาภาษาอังกฤษ</div>
												<div style="text-align: center;">พักเที่ยง</div>
												<div>การสัมภาษณ์นักเรียนพร้อมผู้ปกครอง</div>
											</td>
											<td>
												<div style="text-align: center;">ห้องเมริชี</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>						
						</div>
					</div>				
				
				</div>
					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}
						}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	
		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานผลจากระบบ</div>
				<div class="panel-body">เกิดข้อผิดพลาด&nbsp;ไม่สามารถดำเนินการได้</div>
			</div>
		</div>
								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->							
				<?php  }
//-------------------------------------------------------------------				
			}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	
		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานผลจากระบบ</div>
				<div class="panel-body">ข้อมูลเป็นค่าว่าง&nbsp;ไม่สามารถดำเนินการได้</div>
			</div>
		</div>
					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	} ?>



