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
	$txt_trip=filter_input(INPUT_POST,'txt_trip');
	if($txt_trip==7){ ?>
		<input type="text" name="ds_triptxt" id="ds_triptxtcopy" required="required" class="form-control"  placeholder="อื่น ๆ" size="100" maxlength="100" value="" style="font-family: surafont_sanukchang; font-size: 18px">
<?php	}else{ ?>
		<input type="text" name="ds_triptxt" id="ds_triptxtcopy" readonly="readonly" required="required" class="form-control"  placeholder="อื่น ๆ" size="100" maxlength="100" value="" style="font-family: surafont_sanukchang; font-size: 18px">
<?php	}      ?>