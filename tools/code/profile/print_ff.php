<?php
	include("../../../tools/sql_pdo/gotolink.php");
	$goingtolink=new goingtolink($_SERVER['REMOTE_ADDR']);
	$toLink=$goingtolink->Rungotolink();
?>
<style>
	@font-face {
			font-family: 'surafont_sanukchang';
			src: url('<?php echo $toLink;?>/tools/font/surafont_sanukchang-webfont.eot');
			src: url('<?php echo $toLink;?>/tools/font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo $toLink;?>/tools/font/surafont_sanukchang-webfont.woff') format('woff'),
			url('<?php echo $toLink;?>/tools/font/surafont_sanukchang.ttf') format('truetype');
	}
	body{
			font-family: "surafont_sanukchang";
			font-size: 16px;
			color: #032E3B;
		}
</style>
<?php
	include("../../database/database_swip/pdo_conndatastu_sw.php");
	include("../../database/database_swip/class_pdodatastu_sw.php");
	
	include("../../database/pdo_conndatastu.php");
	include("../../database/class_pdodatastu.php");
?>
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
	
	<script>
		$(document).ready(function () {
		// Accessibility labels
			$('.pickadate-accessibility').pickadate({
				labelMonthNext: 'ไปที่เดือนถัดไป',
				labelMonthPrev: 'ไปที่เดือนก่อนหน้า',
				labelMonthSelect: 'เลือกเดือนจากรายการแบบเลื่อนลง',
				labelYearSelect: 'เลือกหนึ่งปีจากรายการแบบเลื่อนลง',
				selectMonths: true,
				selectYears: '200',
				//yearSuffix: year+543, 
				formatSubmit: 'dd-mm-yyyy',
				format:'dd-mm-yyyy',
				today:"วันนี้",
				clear:"ลบ",
				close:"ออก",
				monthsFull: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                weekdaysShort: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤ', 'ศุกร์', 'เสาร์'],
			
			});
		})
	</script>


	<script>
		$(document).ready(function () {
			
			$('.select-size-<?php echo $grid;?>').select2({
			containerCssClass: 'select-<?php echo $grid;?>'
			});
			
		})
	</script>	
	
<?php
	$call_onclikF=filter_input(INPUT_POST,'call_onclikF');
	
?>