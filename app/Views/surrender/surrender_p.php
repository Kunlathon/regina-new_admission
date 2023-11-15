<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>รับสมัครนักเรียนใหม่&nbsp;โรงเรียนเรยีนาเชลีวิทยาลัย&nbsp;จังหวัดเชียงใหม่</title>
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
				position: relative;
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
<!--****************************************************************************-->			
    <script type="text/javascript">
        function setScreenHWCookie() {
            $.cookie('sw',screen.width);
                //$.cookie('sh',screen.height);
            return true;
        }
            setScreenHWCookie();
    </script>
<!--****************************************************************************-->
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
<!--****************************************************************************-->
<script>
	$(document).ready(function (){
		$("#button_cilk").click(function(){
			var stu_id=$("#stu_id").val();
			if(stu_id!=""){
				$.post("<?php echo base_url();?>/Surrender/oepn_admin/<?php echo $admission_year;?>",{
					copy_stuID:stu_id
				},function (data){
					if(data !=""){
						$("#show_admiss").html(data)
					}
				})
			}else{
				document.getElementById("stu_id-null").innerHTML=
				'<div class="form-group has-error has-feedback">'
				+'	<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">เลขบัตรประจำตัวประชาชนของนักเรียน</b></label>'
				+'	<div class="col-<?php echo $grid;?>-6">'
				+'		<div class="input-group">'
				+'			<input type="text" name="stu_id" id="stu_id"  maxlength="13" minlength="5" value="'+stu_id+'" class="form-control" required="required" size="100" style="font-family: surafont_sanukchang; font-size: 26px">'
				+'				<div class="form-control-feedback">'
				+'					<i class="icon-cancel-circle2"></i>'
				+'				</div>'
				+'		</div>'
				+'		<span class="help-block">กรุณากรอกข้อมูล เลขบัตรประจำตัวประชาชนของนักเรียน</span>'
				+'	</div>'
				+'</div>';
			}
		})
	})
</script>	
<!--****************************************************************************-->		
<!--****************************************************************************-->		
<!--****************************************************************************-->		
</head>

<body class="col-<?php echo $grid;?>-12" style="background-color: #00CCFF;">

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<?php include("tools/ci_wbe/menu.php");?>
		</div>		
	</div>
	
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">	
			<div class="jumbotron text-center">
				<h1>มอบตัวนักเรียนใหม่รอบทั่วไป&nbsp;ปีการศึกษา&nbsp;<?php echo $admission_year;?></h1>
				<div style="font-size: 20px;">ระดับชั้นอนุบาล&nbsp;3&nbsp;และ&nbsp;ชั้นประถมศึกษา&nbsp;1&nbsp;</div>
			</div>		
		</div>		
	</div>
		
	<div class="page-container">
		<div class="page-content">
			
		
			<div class="row">
				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-info">
						<div class="panel-heading">ตรวจสอบรายชื่อผู้มีสิทธิ์มอบตัว&nbsp;ปีการศึกษา&nbsp;<?php echo $admission_year;?></div>
						<div class="panel-body">
							<div class="row">
								<div class="col-<?php echo $grid;?>-10">
									<fieldset class="content-group">
										<div id="stu_id-null">
										<div class="form-group">
											<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">เลขบัตรประจำตัวประชาชนของนักเรียน</b></label>
											<div class="col-<?php echo $grid;?>-6">
												<div class="input-group">
													<input type="text" name="stu_id" id="stu_id"  maxlength="13" minlength="5"  class="form-control" required="required" size="100" style="font-family: surafont_sanukchang; font-size: 26px">
												</div>
											</div>
										</div>
										</div>
									</fieldset>					
								</div>
								<div class="col-<?php echo $grid;?>-2">
									<button type="submit" id="button_cilk" name="button_cilk" class="btn btn-primary" style="font-family: surafont_sanukchang; font-size: 16px">ตรวจสอบ</button>
								</div>
							</div>
						</div>
					</div>				
				</div>
				
				<div id="show_admiss">
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กำหนดการรับสมัครนักเรียน&nbsp;ปีการศึกษา&nbsp;<?php echo $admission_year;?></div>
							<div class="panel-body">

								<button class="panel panel-body" onclick="window.open('<?php echo base_url();?>/document/กำหนดการแจกผู้ปกครอง.pdf', '_blank')">
									<div class="media no-margin">
										<div class="media-right media-middle">
										<i class="icon-file-download2 icon-2x text-blue-400"></i>
										</div>										
										<div class="media-body">
											<h3 class="no-margin text-semibold">ดาวน์โหลดเอกสาร&nbsp;กำหนดการรับสมัครนักเรียน&nbsp;ปีการศึกษา&nbsp;<?php echo $admission_year;?></h3>
										</div>
									</div>
								</button>

							</div>
						</div>
					</div>
				</div>			
			
			</div>
			


		</div>
	</div>
		

<!-- Footer -->
		<?php include("tools/ci_wbe/footer.php");?>
<!-- /footer -->
			
</body>
</html>