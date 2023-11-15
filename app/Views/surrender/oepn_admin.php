
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
	

<script>
	$(document).ready(function(){
		$(".styled").uniform({
			wrapperClass: "border-warning text-warning-600"
		});
	})
</script>




<!--****************************************************************-->	

<?php
	
	include("tools/database/pdo_admission.php");
	include("tools/database/pdo_conndatastu.php");
	include("tools/database/pdo_data.php");

	
	include("tools/database/class_admission.php");
	include("tools/database/class_pdo.php");
	include("tools/database/class_pdodatastu.php");
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
					
//plan						
					$rc_planA="SELECT `Name` FROM `rc_plan` WHERE `IDPlan`='{$rat_plan}';";
					$rc_planARs=new notrow_admission($rc_planA);
					foreach($rc_planARs->notrow_admission_print() as $rckey=>$rc_planARow){
						if(is_array($rc_planARow) && count($rc_planARow)){
							$plan_nameA=$rc_planARow["Name"];
						}else{
							$plan_nameA="-";
						}
					}					
//plan End					
					
				}
//-------------------------------------------------------------------
						if(($rat_testStatus==null or $rat_testStatus==0)){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานข้อมูลการมอบตัวนักเรียนใหม่รอบทั่วไป</div>
				<div class="panel-body">ไม่พบข้อมูล</div>
			</div>
		</div>
	</div>							
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->							
				<?php	}elseif(($rat_testStatus==1)){
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
							if($admiss_level==3){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว ปีการศึกษา <?php echo $rat_year;?></div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp;เป็นผู้มีสิทธิ์มอบตัวเข้าศึกษา</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน</font> <font color="#F20509"><?php echo $plan_nameA;?></font></div>
									</div>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<form name="oepn_admin_3" id="oepn_admin_3" action="<?php echo base_url();?>/surrender/update" method="post">

<script>
	$(document).ready(function(){
		$("#check_condition").on('click',function(){
			var rat_IDReg="<?php echo $rat_IDReg;?>";
			var check_condition=$("#check_condition").val();
				if(check_condition==="condition1"){
					document.getElementById("user_login-null").innerHTML=
					'<div id="user_login-null">'
					+'	<button type="submit" id="user_login" name="user_login" class="btn btn-default" value="'+rat_IDReg+'" style="font-family: surafont_sanukchang; font-size: 26px" >ดำเนินการมอบตัว</button>'
					+'</div>';
				}else{
					document.getElementById("user_login-null").innerHTML=
					'<div id="user_login-null">'
					+'	<button type="button" id="user_login" name="user_login" class="btn btn-default disabled" value="'+rat_IDReg+'" style="font-family: surafont_sanukchang; font-size: 26px" >ดำเนินการมอบตัว</button>'
					+'</div>';
				}
		})
	})
</script>


											<fieldset class="content-group">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<label class="checkbox-inline">
															<input type="checkbox" name="check_condition" id="check_condition" class="styled" required="required" value="condition1">
															ข้าพเจ้ายินยอมให้ข้อมูลแก่ โรงเรียนเรยีนาเชลีวิทยาลัย จะเก็บรวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้าสำหรับการใช้ในนามโรงเรียนเท่านั้น
														</label>
													</div>
												</div>
											</fieldset>
											<fieldset class="content-group">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<div id="user_login-null">
															<button type="button" id="user_login" name="user_login" class="btn btn-default disabled" value="<?php echo $rat_IDReg;?>" style="font-family: surafont_sanukchang; font-size: 26px" required="required">ดำเนินการมอบตัว</button>
														</div>							
													</div>
												</div>
											</fieldset>

										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>			
					
					

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}elseif($admiss_level==11){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
										<form name="oepn_admin_11" id="oepn_admin_11" action="<?php echo base_url();?>/surrender/update" method="post">

<script>
	$(document).ready(function(){
		$("#check_condition").on('click',function(){
			var rat_IDReg="<?php echo $rat_IDReg;?>";
			var check_condition=$("#check_condition").val();
				if(check_condition==="condition1"){
					document.getElementById("user_login-null").innerHTML=
					'<div id="user_login-null">'
					+'	<button type="submit" id="user_login" name="user_login" class="btn btn-default" value="'+rat_IDReg+'" style="font-family: surafont_sanukchang; font-size: 26px" >ดำเนินการมอบตัว</button>'
					+'</div>';
				}else{
					document.getElementById("user_login-null").innerHTML=
					'<div id="user_login-null">'
					+'	<button type="button" id="user_login" name="user_login" class="btn btn-default disabled" value="'+rat_IDReg+'" style="font-family: surafont_sanukchang; font-size: 26px" >ดำเนินการมอบตัว</button>'
					+'</div>';
				}
		})
	})
</script>

											<fieldset class="content-group">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<label class="checkbox-inline">
															<input type="checkbox" name="check_condition" id="check_condition" class="styled" required="required" value="condition1">
															ข้าพเจ้ายินยอมให้ข้อมูลแก่ โรงเรียนเรยีนาเชลีวิทยาลัย จะเก็บรวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้าสำหรับการใช้ในนามโรงเรียนเท่านั้น
														</label>
													</div>
												</div>
											</fieldset>
											<fieldset class="content-group">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<div id="user_login-null">
															<button type="button" id="user_login" name="user_login" class="btn btn-default disabled" value="<?php echo $rat_IDReg;?>" style="font-family: surafont_sanukchang; font-size: 26px" required="required">ดำเนินการมอบตัว</button>
														</div>							
													</div>
												</div>
											</fieldset>

		

										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>							
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}elseif($admiss_level==31){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว&nbsp;ปีการศึกษา&nbsp;2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">ขอแสดงความยินดี เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp; นักเรียนได้รับสิทธิ์เข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่&nbsp;1&nbsp;ปีการศึกษา&nbsp;2566</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน</font> <font color="#F20509"><?php echo $plan_nameA;?></font></div>
									</div>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<form name="oepn_admin" action="<?php echo base_url();?>/surrender/update" method="post">

<script>
	$(document).ready(function(){
		$("#check_condition").on('click',function(){
			var rat_IDReg="<?php echo $rat_IDReg;?>";
			var check_condition=$("#check_condition").val();
				if(check_condition==="condition1"){
					document.getElementById("user_login-null").innerHTML=
					'<div id="user_login-null">'
					+'	<button type="submit" id="user_login" name="user_login" class="btn btn-default" value="'+rat_IDReg+'" style="font-family: surafont_sanukchang; font-size: 26px" >ดำเนินการมอบตัว</button>'
					+'</div>';
				}else{
					document.getElementById("user_login-null").innerHTML=
					'<div id="user_login-null">'
					+'	<button type="button" id="user_login" name="user_login" class="btn btn-default disabled" value="'+rat_IDReg+'" style="font-family: surafont_sanukchang; font-size: 26px" >ดำเนินการมอบตัว</button>'
					+'</div>';
				}
		})
	})
</script>


											<fieldset class="content-group">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<label class="checkbox-inline">
															<input type="checkbox" name="check_condition" id="check_condition" class="styled" required="required" value="condition1">
															ข้าพเจ้ายินยอมให้ข้อมูลแก่ โรงเรียนเรยีนาเชลีวิทยาลัย จะเก็บรวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้าสำหรับการใช้ในนามโรงเรียนเท่านั้น
														</label>
													</div>
												</div>
											</fieldset>
											<fieldset class="content-group">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<div id="user_login-null">
															<button type="button" id="user_login" name="user_login" class="btn btn-default disabled" value="<?php echo $rat_IDReg;?>" style="font-family: surafont_sanukchang; font-size: 26px" required="required">ดำเนินการมอบตัว</button>
														</div>							
													</div>
												</div>
											</fieldset>

										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}elseif($admiss_level==41){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว ปีการศึกษา 2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">ขอแสดงความยินดี เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp; นักเรียนได้รับสิทธิ์เข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่&nbsp;4&nbsp;ปีการศึกษา&nbsp;2566</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน</font> <font color="#F20509"><?php echo $plan_nameA;?></font></div>
									</div>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<form name="oepn_admin" action="<?php echo base_url();?>/surrender/update" method="post">

<script>
	$(document).ready(function(){
		$("#check_condition").on('click',function(){
			var rat_IDReg="<?php echo $rat_IDReg;?>";
			var check_condition=$("#check_condition").val();
				if(check_condition==="condition1"){
					document.getElementById("user_login-null").innerHTML=
					'<div id="user_login-null">'
					+'	<button type="submit" id="user_login" name="user_login" class="btn btn-default" value="'+rat_IDReg+'" style="font-family: surafont_sanukchang; font-size: 26px" >ดำเนินการมอบตัว</button>'
					+'</div>';
				}else{
					document.getElementById("user_login-null").innerHTML=
					'<div id="user_login-null">'
					+'	<button type="button" id="user_login" name="user_login" class="btn btn-default disabled" value="'+rat_IDReg+'" style="font-family: surafont_sanukchang; font-size: 26px" >ดำเนินการมอบตัว</button>'
					+'</div>';
				}
		})
	})
</script>


											<fieldset class="content-group">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<label class="checkbox-inline">
															<input type="checkbox" name="check_condition" id="check_condition" class="styled" required="required" value="condition1">
															ข้าพเจ้ายินยอมให้ข้อมูลแก่ โรงเรียนเรยีนาเชลีวิทยาลัย จะเก็บรวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้าสำหรับการใช้ในนามโรงเรียนเท่านั้น
														</label>
													</div>
												</div>
											</fieldset>
											<fieldset class="content-group">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<div id="user_login-null">
															<button type="button" id="user_login" name="user_login" class="btn btn-default disabled" value="<?php echo $rat_IDReg;?>" style="font-family: surafont_sanukchang; font-size: 26px" required="required">ดำเนินการมอบตัว</button>
														</div>							
													</div>
												</div>
											</fieldset>

										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานผลจากระบบ</div>
				<div class="panel-body">เกิดข้อผิดพลาด&nbsp;ไม่สามารถดำเนินการได้</div>
			</div>
		</div>
	</div>							
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}
						}elseif($rat_testStatus==6){ 
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
							if($admiss_level==3){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
										<form name="oepn_admin" action="<?php echo base_url();?>/surrender/update" method="post">
											<center><button type="submit" name="user_login" class="btn btn-default" value="<?php echo "$rat_IDReg";?>" style="font-family: surafont_sanukchang; font-size: 26px">ดำเนินการมอบตัว</button></center>
										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}elseif($admiss_level==11){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
										<form name="oepn_admin" action="<?php echo base_url();?>/surrender/update" method="post">
											<center><button type="submit" name="user_login" class="btn btn-default" value="<?php echo "$rat_IDReg";?>" style="font-family: surafont_sanukchang; font-size: 26px">ดำเนินการมอบตัว</button></center>
										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}elseif($admiss_level==31){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว&nbsp;ปีการศึกษา&nbsp;2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">ขอแสดงความยินดี เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp; นักเรียนได้รับสิทธิ์เข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่&nbsp;1&nbsp;ปีการศึกษา&nbsp;2566</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน</font> <font color="#F20509"><?php echo $plan_nameA;?></font></div>
									</div>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<form name="oepn_admin" action="<?php echo base_url();?>/surrender/update" method="post">
											<center><button type="submit" name="user_login" class="btn btn-default" value="<?php echo "$rat_IDReg";?>" style="font-family: surafont_sanukchang; font-size: 26px">ดำเนินการมอบตัว</button></center>
										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}elseif($admiss_level==41){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กรอกใบมอบตัวและพิมพ์ใบมอบตัว ปีการศึกษา 2566</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div><font color="#3401FB">ขอแสดงความยินดี เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp; นักเรียนได้รับสิทธิ์เข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่&nbsp;4&nbsp;ปีการศึกษา&nbsp;2566</font></div>
										<div><font color="#3401FB">สายการเรียน/แผนการเรียน</font> <font color="#F20509"><?php echo $plan_nameA." (ทดลองเรียน)";?></font></div>
									</div>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<form name="oepn_admin" action="<?php echo base_url();?>/surrender/update" method="post">
											<center><button type="submit" name="user_login" class="btn btn-default" value="<?php echo "$rat_IDReg";?>" style="font-family: surafont_sanukchang; font-size: 26px">ดำเนินการมอบตัว</button></center>
										</form>
									</div>
								</div>
							</div>
						</div>				
					</div>								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานผลจากระบบ</div>
				<div class="panel-body">เกิดข้อผิดพลาด&nbsp;ไม่สามารถดำเนินการได้</div>
			</div>
		</div>
	</div>							
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
					<?php	}							
						}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานผลจากระบบ</div>
				<div class="panel-body">เกิดข้อผิดพลาด&nbsp;ไม่สามารถดำเนินการได้</div>
			</div>
		</div>
	</div>							
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->							
				<?php  }
//-------------------------------------------------------------------				
			}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-<?php echo $grid;?>-6">
		    <div class="panel panel-danger">
				<div class="panel-heading">รายงานผลจากระบบ</div>
				<div class="panel-body">ข้อมูลเป็นค่าว่าง&nbsp;ไม่สามารถดำเนินการได้</div>
			</div>
		</div>
	</div>				
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	} ?>
