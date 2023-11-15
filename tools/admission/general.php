<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
//------------------------------------------------------------------------------------
	include("tools/sql_pdo/gotolink.php");
	$goingtolink=new goingtolink($_SERVER['REMOTE_ADDR']);
	$AdmissionLink=$goingtolink->Rungotolink();
//------------------------------------------------------------------------------------
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>รับสมัครนักเรียนออนไลน์&nbsp;รอบทั่วไป&nbsp;ระดับชั้น&nbsp;อนุบาล&nbsp;3&nbsp;,&nbsp;ประถมศึกษาปีที่&nbsp;1&nbsp;,&nbsp;มัธยมศึกษาปีที่&nbsp;1&nbsp;และ&nbsp;มัธยมศึกษาปีที่&nbsp;4</title>
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="shortcut icon" type="image/png">
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="apple-touch-icon">
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="apple-touch-icon" sizes="72x72">
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="apple-touch-icon" sizes="114x114">
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="apple-touch-icon" sizes="144x144">
	
	<!-- Global stylesheets -->
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	
	<!--css code-->
	<style>
		@font-face {
				font-family: 'surafont_sanukchang';
				src: url('<?php echo base_url();?>/tools/font/surafont_sanukchang-webfont.eot');
				src: url('<?php echo base_url();?>/tools/font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
				url('<?php echo base_url();?>/tools/font/surafont_sanukchang-webfont.woff') format('woff'),
				url('<?php echo base_url();?>/tools/font/surafont_sanukchang.ttf') format('truetype');
		}

		body{
				font-family: "surafont_sanukchang";
				font-size: 16px;
				color: #032E3B;
			}
		
	</style>
	
	<!-- Core JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>

	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
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
	<?php
		include("tools/js_top.php");
	?>	
<!--****************************************************************************-->	
	<script>
		$(document).ready(function (){
			$("#button_cilk").click(function(){
				var stu_id=$("#stu_id").val();
				if(stu_id!=""){
					$.post("code/oepn_admin.php",{
						copy_stuID:stu_id
					},function (data){
						if(data !=""){
							$("#show_admiss").html(data)
						}
					})
				}
				
			})
		})
	</script>
<!--****************************************************************************-->	
</head>

<body class="col-<?php echo $grid;?>-12">


	<div class="page-container">
		<div class="page-content">
		
		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<img src="<?php echo base_url();?>/tools/img/640821_101.jpg" alt="Cinque Terre" usemap="#Map" class="img-thumbnail" style="width: 100%;" >
			</div>
		</div>


		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<div class="panel panel-info">
					<div class="panel-heading">สมัครเรียน ผ่านระบบออนไลน์</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-<?php echo $grid;?>-6">
								<center>
									<a data-toggle="modal" data-target="#myModal1">
										<img src="img/k3.jpeg" class="img-thumbnail" alt="Kindergarten 3" width="295" height="193">
										<div id="fontB">ระดับชั้นอนุบาล 3 Kindergarten 3</div>
										<div></div>									
									</a>
									<div>
										<a href="schedule.php?schedule=k3">
											<img src="<?php echo base_url();?>/tools/img/cota212-01.jpg" class="img-thumbnail" alt="Kindergarten 3" width="160" height="193">
										</a>
									</div>
								</center>
							</div>
							<div class="col-<?php echo $grid;?>-6">
								<center>
									<a data-toggle="modal" data-target="#myModal2">
										<img src="img/p1.jpeg" class="img-thumbnail" alt="Primary 1" width="295" height="193">
										<div id="fontB">ระดับชั้นประถมศึกษาปีที่ 1 Primary 1</div>
										<div></div>									
									</a>
									<div>
										<a href="schedule.php?schedule=p1">
											<img src="<?php echo base_url();?>/tools/img/cota212-01.jpg" class="img-thumbnail" alt="Kindergarten 3" width="160" height="193">
										</a>
									</div>
								</center>							
							</div>
						</div><hr>
						<div class="row">
							<div class="col-<?php echo $grid;?>-6">
								<center>
									<a data-toggle="modal" data-target="#myModal3">
										<img src="img/m1.jpeg" class="img-thumbnail" alt="Secondary 1" width="295" height="193">
										<div id="fontB">ระดับชั้นมัธยมศึกษาปีที่ 1 Secondary 1</div>
										<div></div>									
									</a>
									<div>
										<a href="schedule.php?schedule=m1">
											<img src="<?php echo base_url();?>/tools/img/cota212-01.jpg" class="img-thumbnail" alt="Kindergarten 3" width="160" height="193">
										</a>
									</div>
								</center>							
							</div>
							<div class="col-<?php echo $grid;?>-6">
								<center>
									<a data-toggle="modal" data-target="#myModal4">
										<img src="<?php echo base_url();?>/tools/img/m4.jpeg" class="img-thumbnail" alt="Secondary 4" width="295" height="193">
										<div id="fontB">ระดับชั้นมัธยมศึกษาปีที่ 4 Secondary 4</div>
										<div></div> 									
									</a>
									<div>
										<a href="schedule.php?schedule=m4">
											<img src="<?php echo base_url();?>/tools/img/cota212-01.jpg" class="img-thumbnail" alt="Kindergarten 3" width="160" height="193">
										</a>
									</div>									
								</center>							
							</div>
						</div>
					
					</div>
				</div>						
			</div>
		</div>
<div id="myModal1" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
					<div>สมัครเรียน ปีการศึกษา 2565</div>
					<div>ระดับชั้น อนุบาล 3</div>
				 </h4>
			</div>
			<div class="modal-body">
				<form method="post" action="apply.php" name="Kindergarten3">
					<div class="row">
						<div class="col-<?php echo $grid;?>-6">กรอกเลขประจำตัวประชาชนนักเรียน</div>
						<div class="col-<?php echo $grid;?>-6"><input type="text" name="copy_Identification" class="form-control" maxlength="13" minlength="5" style="font-family: surafont_sanukchang; font-size: 26px"></div>
					</div><hr>
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<center><button type="submit" name="copy_level" value="3" class="btn btn-success">ดำเนินการสมัคร</button></center>
						</div>
					</div>	
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
			</div>
		</div>

	</div>
</div>		
		
<div id="myModal2" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
					<div>สมัครเรียน ปีการศึกษา 2565</div>
					<div>ระดับชั้น ประถมศึกษาปีที่ 1</div>
				</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="apply.php" name="Primary1">
					<div class="row">
						<div class="col-<?php echo $grid;?>-6">กรอกเลขประจำตัวประชาชนนักเรียน</div>
						<div class="col-<?php echo $grid;?>-6"><input type="text" name="copy_Identification" class="form-control" maxlength="13" minlength="5" style="font-family: surafont_sanukchang; font-size: 26px"></div>
					</div><hr>
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<center><button type="submit" name="copy_level" value="11" class="btn btn-success">ดำเนินการสมัคร</button></center>
						</div>
					</div>	
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
			</div>
		</div>

	</div>
</div>		
		
<div id="myModal3" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
					<div>สมัครเรียน ปีการศึกษา 2565</div>
					<div> ระดับชั้น มัธยมศึกษาปีที่ 1</div>
				</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="apply.php" name="Secondary1">
					<div class="row">
						<div class="col-<?php echo $grid;?>-6">กรอกเลขประจำตัวประชาชนนักเรียน</div>
						<div class="col-<?php echo $grid;?>-6"><input type="text" name="copy_Identification" class="form-control" maxlength="13" minlength="5" style="font-family: surafont_sanukchang; font-size: 26px"></div>
					</div><hr>
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<center><button type="submit" name="copy_level" value="31" class="btn btn-success">ดำเนินการสมัคร</button></center>
						</div>
					</div>	
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
			</div>
		</div>

	</div>
</div>		
		
<div id="myModal4" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
					<div>สมัครเรียน ปีการศึกษา 2565</div>
					<div>ระดับชั้น มัธยมศึกษาปีที่ 4</div>
				</h4>
			</div>
			<div class="modal-body">
				
				<form method="post" action="apply.php" name="Secondary4">
					<div class="row">
						<div class="col-<?php echo $grid;?>-6">กรอกเลขประจำตัวประชาชนนักเรียน</div>
						<div class="col-<?php echo $grid;?>-6"><input type="text" name="copy_Identification" class="form-control" maxlength="13" minlength="5" style="font-family: surafont_sanukchang; font-size: 26px"></div>
					</div><hr>
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<center><button type="submit" name="copy_level" value="41" class="btn btn-success">ดำเนินการสมัคร</button></center>
						</div>
					</div>	
				</form>				
				
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
			</div>
		</div>

	</div>
</div>				

					<?php
						echo $AdmissionLink;
					?>
					
					
		</div>
	</div>	

	<div class="page-container">
		<div class="page-content">
<!-- Footer -->
			<?php
				include("tools/footer.php");
			?>
<!-- /footer -->
		</div>
	</div





</body>
</html>






