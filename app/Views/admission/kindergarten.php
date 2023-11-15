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
		include("tools/js_top.php");
	?>
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
				<h1>กิจกรรมการเรียนการสอน ระดับชั้นอนุบาล 3</h1>		
			</div>		
		</div>		
	</div>
		
	<div class="page-container">
		<div class="page-content">
			
			<div class="row">
				<div class="col-<?php echo $grid;?>-8">
					<div><img src="<?php echo base_url();?>/tools/img/admission_img/k3/111-k3.jpg" class="img-rounded" alt="Cinque Terre" width="100%"></div>
					<div><iframe width="100%" height="500" src="https://www.youtube.com/embed/vYIIPwsd4ZI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
				</div>
				<div class="col-<?php echo $grid;?>-4">
					<div><img src="<?php echo base_url();?>/tools/img/admission_img/k3/k3-01-01.png" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> </div>
					<div>กิจกรรมสืบสานวัฒนธรรมไทยล้านนา ระดับชั้นอนุบาล 3</div>
					<div><img src="<?php echo base_url();?>/tools/img/admission_img/k3/k3-01-02.png" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> </div>
					<div>การแสดงศักยภาพของนักเรียนชั้นอนุบาล 3</div>
					<div><img src="<?php echo base_url();?>/tools/img/admission_img/k3/k3-01-03.png" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> </div>
					<div>กิจกรรม “ค่ายนกน้อยใส่ใจรักษ์โลก” นักเรียนชั้นอนุบาล 3</div>
					<div><img src="<?php echo base_url();?>/tools/img/admission_img/k3/k3-01-04.png" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> </div>
					<div>การจัดการเรียนการสอนผ่านกิจกรรมรูปแบบ Project Approach</div>

					<div><img src="<?php echo base_url();?>/tools/img/admission_img/k3/k3-01-06.png" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> </div>
					<div>โครงการ Rc go green ชั้นอนุบาล 3</div>
					<div><img src="<?php echo base_url();?>/tools/img/admission_img/k3/k3-01-07.png" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> </div>
					<div>การแสดงประกอบการเล่าเรื่อง Project Approach</div>						
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-<?php echo $grid;?>-4">
					<div><img src="<?php echo base_url();?>/tools/img/admission_img/k3/k3-01-08.png" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> </div>
					<div>กิจกรรมต่างๆของอนุบาล 3</div>					
				</div>
				<div class="col-<?php echo $grid;?>-4"></div>
				<div class="col-<?php echo $grid;?>-4"></div>
			</div>

		</div>
	</div>
		

<!-- Footer -->
		<?php include("tools/ci_wbe/footer.php");?>
<!-- /footer -->
			
</body>
</html>