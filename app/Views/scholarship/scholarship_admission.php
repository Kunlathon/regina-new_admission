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

	
	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/notifications/bootbox.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<!-- /theme JS files -->

	<!-- /global stylesheets -->
	<!--css code-->

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
	<?php
        $data_yearA="2567";
        $data_yearB="67";
    ?>
<!--****************************************************************************-->		
	<script>
		$(document).ready(function () {
			$("#but_delete").on("click",function(){
				var but_delete=$("#but_delete").val();
					if(but_delete==="but_delete"){
						document.location="<?php echo base_url();?>/scholarship";
					}else{}
			})
		})
	</script>

	<script>
		$(document).ready(function(){
			$("#but_code_key").on("click",function(){
				var data_yearA="<?php echo $data_yearA;?>";
				var data_yearB="<?php echo $data_yearB;?>";
				var code_key=$("#code_key").val();
				var test_yearA=isNaN(data_yearA);
				var test_yearB=isNaN(data_yearB);
					if(data_yearA==="" && data_yearB===""){
						swal({
								title: "พบข้อผิดพลาด",
								text: "ตั้งค่าระบบไม่ถูกต้อง ไม่สามารถดำเนินการได้",
								confirmButtonColor: "#0373FA",
								type: "warning"
							});
					}else if(data_yearA==="" || data_yearB===""){
						swal({
								title: "พบข้อผิดพลาด",
								text: "ตั้งค่าระบบไม่ถูกต้อง ไม่สามารถดำเนินการได้",
								confirmButtonColor: "#0373FA",
								type: "warning"
							});
					}else{
						if(test_yearA===true && test_yearB===true){
							swal({
								title: "พบข้อผิดพลาด",
								text: "ข้อผิดพลาดทางเทคนิด กรุณาติดเจ้าหน้าที่",
								confirmButtonColor: "#0373FA",
								type: "error"
							});
						}else if(test_yearA===true || test_yearB===true){
							swal({
								title: "พบข้อผิดพลาด",
								text: "ข้อผิดพลาดทางเทคนิด กรุณาติดเจ้าหน้าที่",
								confirmButtonColor: "#0373FA",
								type: "error"
							});
						}else if(test_yearA===false && test_yearB===false){
							if(code_key===""){
								document.getElementById("code_key-null").innerHTML=
								'	<div class="form-group has-error has-feedback">'
								+'		<label class="control-label col-<?php echo $grid;?>-5 text-semibold" style="font-size: 18px;">เลขประจำตัวประชาชน 13 หลัก</label>'
								+'		<div class="col-<?php echo $grid;?>-7">'
								+'			<input type="text" name="code_key" id="code_key" class="form-control" style="font-size: 18px;" placeholder="เลขประจำตัวประชาชน 13 หลัก" maxlength="13" minlength="3" value="'+code_key+'">'
								+'			<span class="help-block">กรุณากรอบข้อมูลเพื่อตรวจสอบสิทธิ์</span>'
								+'		</div>'
								+'	</div>';
							}else{
								var count_code_key=code_key.length;
									if(count_code_key>=14){
										document.getElementById("code_key-null").innerHTML=
										'	<div class="form-group has-error has-feedback">'
										+'		<label class="control-label col-<?php echo $grid;?>-5 text-semibold" style="font-size: 18px;">เลขประจำตัวประชาชน 13 หลัก</label>'
										+'		<div class="col-<?php echo $grid;?>-7">'
										+'			<input type="text" name="code_key" id="code_key" class="form-control" style="font-size: 18px;" placeholder="เลขประจำตัวประชาชน 13 หลัก" maxlength="13" minlength="3" value="'+code_key+'">'
										+'			<span class="help-block">กรอบข้อมูล ไม่เกิน 13 ตัวอักษร</span>'
										+'		</div>'
										+'	</div>';
									}else if(count_code_key<=3){
										document.getElementById("code_key-null").innerHTML=
										'	<div class="form-group has-error has-feedback">'
										+'		<label class="control-label col-<?php echo $grid;?>-5 text-semibold" style="font-size: 18px;">เลขประจำตัวประชาชน 13 หลัก</label>'
										+'		<div class="col-<?php echo $grid;?>-7">'
										+'			<input type="text" name="code_key" id="code_key" class="form-control" style="font-size: 18px;" placeholder="เลขประจำตัวประชาชน 13 หลัก" maxlength="13" minlength="3" value="'+code_key+'">'
										+'			<span class="help-block">กรอบข้อมูล อย่างน้อย 3 ตัวอักษร</span>'
										+'		</div>'
										+'	</div>';
									}else{
										
										document.getElementById("code_key-null").innerHTML=
										'<div class="form-group">'
										+'	<label class="control-label col-<?php echo $grid;?>-5" style="font-size: 18px;">เลขประจำตัวประชาชน 13 หลัก</label>'
										+'	<div class="col-<?php echo $grid;?>-7">'
										+'		<input type="text" name="code_key" id="code_key" class="form-control" style="font-size: 18px;" placeholder="เลขประจำตัวประชาชน 13 หลัก" maxlength="13" minlength="3" value="'+code_key+'">'
										+'	</div>'
										+'</div>';

										$.post("<?php echo base_url();?>/scholarship/scholarship_data",{
											data_yearA:data_yearA,
											data_yearB:data_yearB,
											code_key:code_key
										},function (run_sa) {
											if(run_sa!=""){
												$("#RunScholarship").html(run_sa);
											}else{}
										})

									}
							}
						}else{
							swal({
								title: "พบข้อผิดพลาด",
								confirmButtonColor: "#0373FA",
								text: "ข้อผิดพลาดทางเทคนิด กรุณาติดเจ้าหน้าที่",
								type: "error"
							});
						}
					}
			})
		})
	</script>
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
				<h1>สมัครขอรับทุนการศึกษา&nbsp;ปีการศึกษา&nbsp;2557</h1>
				<div style="font-size: 20px;">&nbsp;ทุนการศึกษาสำหรับนักเรียนใหม่รอบทั่วไป</div>
			</div>		
		</div>		
	</div>
		
	<div class="page-container">
		<div class="page-content">
			
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
			    	<div class="panel panel-info">
						<div class="panel-heading">ตรวจสอบสิทธิ์การสมัครทุนสำหรับนักเรียนใหม่รอบทั่วไป</div>
						<div class="panel-body">
<form name="form_scholarship_admission" id="form_scholarship_admission" >						
							<div class="row">
								<div class="col-<?php echo $grid;?>-6">
									<fieldset class="content-group">
										<div class="row">
											<div class="col-<?php echo $grid;?>-12">
												<div id="code_key-null">
												<div class="form-group">
													<label class="control-label col-<?php echo $grid;?>-5" style="font-size: 18px;">เลขประจำตัวประชาชน 13 หลัก</label>
													<div class="col-<?php echo $grid;?>-7">
														<input type="text" name="code_key" id="code_key" class="form-control" style="font-size: 18px;" placeholder="เลขประจำตัวประชาชน 13 หลัก" maxlength="13" minlength="3">
													</div>
												</div>
												</div>
											<div>
										</div>
									</fieldset>
								</div>

								<div class="col-<?php echo $grid;?>-6">
									<fieldset class="content-group">
										<div class="row" style="text-align: center;">
											<div class="col-<?php echo $grid;?>-6">
												<button type="button" name="but_code_key" id="but_code_key" class="btn btn-success"><i class="icon-database-refresh position-left"></i> ตรวจสอบสิทธิ์</button>
											</div>
											<div class="col-<?php echo $grid;?>-6">
												<button type="button" name="but_delete" id="but_delete" value="but_delete" class="btn btn-danger"><i class="icon-eraser2 position-left"></i> ยกเลิก</button>
											</div>
										</div>
									</fieldset>							
								</div>
							</div>

							<hr>
</form>							



						</div>
    				</div>
				</div>
			</div>	
			<hr>
			
			<div id="RunScholarship"></div>

		</div>
	</div>
		
<!--js code-->

<!--js code end-->



<!-- Footer -->
		<?php include("tools/ci_wbe/footer.php");?>
<!-- /footer -->
			
</body>
</html>