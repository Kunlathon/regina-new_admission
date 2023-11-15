<?php
//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
//set
    header("cache-Control: max-age=0; no-cache; must-revalidate");
    $InputScholarshipAdmission=\Config\Services::request();
//set end  
//include
	include("tools/database/pdo_admission_rc.php");
	include("tools/database/class_admission_rc.php");

	include("tools/database/pdo_scholarship.php");
    include("tools/database/class_scholarship.php");

//include end
//input
    $data_yearA=$InputScholarshipAdmission->getPost("data_yearA");
    $data_yearB=$InputScholarshipAdmission->getPost("data_yearB");
    $code_key=$InputScholarshipAdmission->getPost("code_key");
//input end
?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

	<?php
		$PrintStuAdmissiom=new SudAdmissionRc("admission",$code_key,$data_yearA,$data_yearB);
			if(($PrintStuAdmissiom->RunAdmissionError()=="no")){	?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
;;;
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php	}else{	?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="row">
        <div class="col-<?php echo $grid;?>-12">
			<div class="alert alert-dark">
    			<strong>ไม่พบข้อมูลนักเรียน ในฐานข้อมูลสมัครนักเรียนใหม่ รอบทั่วไป ปีการศึกษา <?php echo $data_yearA;?></a>.
  			</div>
        </div>
    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php	}	?>





