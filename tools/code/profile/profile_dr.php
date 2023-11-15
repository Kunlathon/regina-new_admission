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
<?php error_reporting(error_reporting() & ~E_NOTICE); ?>
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

<!--ที่อยู่ผุ้ปกครองทำงาน-->
	<script>
		$(document).ready(function () {
			$("#parent_addwordprovince").change(function () {
				var province=$("#parent_addwordprovince").val();
				
				if(province!=""){
					$.post("<?php echo $toLink;?>/tools/code/profile/p_word/pword_city.php",{
						txt_province:province
					},function(dataprovince){
						if(dataprovince!=""){
							$("#parent_addwordamphur").html(dataprovince);
						}
					})
				}
				
			})
		})
	</script>
	<script>
		$(document).ready(function () {
			$("#parent_addwordamphur").change(function () {
				var city=$("#parent_addwordamphur").val();
				
				if(city!=""){
					$.post("<?php echo $toLink;?>/tools/code/profile/p_word/pword_amphures.php",{
						txt_city:city
					},function(datacity){
						if(datacity!=""){
							$("#parent_addwordtumbon").html(datacity);
						}
					})
				}
				
			})
		})
	</script>
	
	<script>
		$(document).ready(function () {
			$("#parent_addwordtumbon").change(function () {
				var zip=$("#parent_addwordtumbon").val();
				
				if(zip!=""){
					$.post("<?php echo $toLink;?>/tools/code/profile/p_word/pword_zip.php",{
						txt_zip:zip
					},function(datacity){
						if(datacity!=""){
							$("#parent_addwordzipcode").html(datacity);
						}
					})
				}
				
			})
		})
	</script>	
	
	
	<!--ที่อยู่ผู้ปกครอง--->

	<script>
		$(document).ready(function () {
			$("#parent_province").change(function () {
				var province=$("#parent_province").val();
				
				if(province!=""){
					$.post("<?php echo $toLink;?>/tools/code/profile/p_add/padd_city.php",{
						txt_province:province
					},function(dataprovince){
						if(dataprovince!=""){
							$("#parent_amphur").html(dataprovince);
						}
					})
				}
				
			})
		})
	</script>
	<script>
		$(document).ready(function () {
			$("#parent_amphur").change(function () {
				var city=$("#parent_amphur").val();
				
				if(city!=""){
					$.post("<?php echo $toLink;?>/tools/code/profile/p_add/padd_amphures.php",{
						txt_city:city
					},function(datacity){
						if(datacity!=""){
							$("#parent_tumbon").html(datacity);
						}
					})
				}
				
			})
		})
	</script>
	
	<script>
		$(document).ready(function () {
			$("#parent_tumbon").change(function () {
				var zip=$("#parent_tumbon").val();
				
				if(zip!=""){
					$.post("<?php echo $toLink;?>/tools/code/profile/p_add/padd_zip.php",{
						txt_zip:zip
					},function(datacity){
						if(datacity!=""){
							$("#parent_zipcode").html(datacity);
						}
					})
				}
				
			})
		})
	</script>
	
	


<?php
	include("../../database/database_swip/pdo_conndatastu_sw.php");
	include("../../database/database_swip/class_pdodatastu_sw.php");
	
	include("../../database/pdo_conndatastu.php");
	include("../../database/class_pdodatastu.php");
	$txt_parent=filter_input(INPUT_POST,'txt_parent');
	$txt_stuid=filter_input(INPUT_POST,'txt_stuid');
		if($txt_parent==1){ ?>
<!--********************************************************-->	
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<center><font color="#2F03F9" style="font-family: surafont_sanukchang; font-size: 18px"><h4><b>ข้อมูลอ้างอิงจาก บิดา และ มารดา</b></h4></font></center>
		</div>
	</div>
	<input type="hidden" value="1" id="parent_status">
<!--********************************************************-->		
	<?php		
		}elseif($txt_parent==2){ ?>
<!--********************************************************-->		
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<center><font color="#2F03F9" style="font-family: surafont_sanukchang; font-size: 18px"><h4><b>ข้อมูลอ้างอิงจาก บิดา</b></h4></font></center>
		</div>
	</div>
	<input type="hidden" value="2" id="parent_status">
<!--********************************************************-->		
	<?php
		}elseif($txt_parent==3){ ?>
<!--********************************************************-->		
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<center><font color="#2F03F9" style="font-family: surafont_sanukchang; font-size: 18px"><h4><b>ข้อมูลอ้างอิงจาก มารดา</b></h4></font></center>
		</div>
	</div>
	<input type="hidden" value="3" id="parent_status">
<!--********************************************************-->		
	<?php
		}elseif($txt_parent==5){ ?>
<!--********************************************************-->	
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<center><font color="#2F03F9" style="font-family: surafont_sanukchang; font-size: 18px"><h4><b>ข้อมูลอ้างอิงจาก ข้อมูลเจ้าของหอพัก</b></h4></font></center>
		</div>
	</div>	
	<input type="hidden" value="5" id="parent_status">
<!--********************************************************-->		
	<?php
		}else{ ?>
		
<?php

	$stu_guardianSql="SELECT * FROM `stu_guardian` WHERE `stu_id`='{$txt_stuid}';";
	$stu_guardian=new notrow_datastu_sw($stu_guardianSql);
	foreach($stu_guardian->datastu_array as $rc_key=>$stu_guardianRow){}
	
	$stu_guardian_addressSql="SELECT * FROM `stu_guardian_address` WHERE `stu_id`='{$txt_stuid}'";
	$stu_guardian_address=new notrow_datastu_sw($stu_guardian_addressSql);
	foreach($stu_guardian_address->datastu_array as $rc_key=>$stu_guardian_addressRow){}
	
	$stu_guardian_addwordSql="SELECT * FROM `stu_guardian_addword` WHERE `stu_id`='{$txt_stuid}'";
	$stu_guardian_addword=new notrow_datastu_sw($stu_guardian_addwordSql);
	foreach($stu_guardian_addword->datastu_array as $rc_key=>$stu_guardian_addwordRow){}
	
?>		
		
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<select name="parent_prefix" id="parent_prefix" data-placeholder="คำนำหน้า.." class="select-size-<?php echo $grid;?>" style="font-family: surafont_sanukchang; font-size: 18px">
										<option></option>
										<optgroup label="คำนำหน้า..">
							<?php
								$npthailSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
											 FROM `rc_prefix` 
											 WHERE `IDPrefix`!='1' and `IDPrefix`!='2'  and `IDPrefix`!='7' and `IDPrefix`!='8'and `IDPrefix`!='9'";
								$npthail=new row_datastu($npthailSql);
								foreach($npthail->datastu_array as $rc_key=>$npthailRow){ 
									if($stu_guardianRow["parent_prefix"]==$npthailRow["IDPrefix"]){
										$pprefix_selected="selected";
									}else{
										$pprefix_selected="";
									}
								
								?>
											<option value="<?php echo $npthailRow["IDPrefix"]?>" <?php echo $pprefix_selected;?>><?php echo $npthailRow["prefixname"]?></option>
											
						<?php	}?>					
					
										</optgroup>
									</select>
								</div>
							</div>
                        </fieldset>						
								
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อ</b></label>							
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ชื่อ (ภาษาไทย)" size="100" name="parent_fname" id="parent_fname" value="<?php echo $stu_guardianRow["parent_fname"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">นามสกุล</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="นามสกุล (ภาษาไทย)" size="100" name="parent_sname" id="parent_sname" value="<?php echo $stu_guardianRow["parent_sname"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>				
		
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า (ภาษาอังกฤษ)</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<select name="parent_prefix_en" id="parent_prefix_en"  data-placeholder="คำนำหน้าภาษา(ภาษาอังกฤษ).." class="select-size-<?php echo $grid;?>" style="font-family: surafont_sanukchang; font-size: 18px">
										<option></option>
										<optgroup label="คำนำหน้าภาษา(ภาษาอังกฤษ)...">
							<?php
								$npthailSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
											 FROM `rc_prefix` 
											 WHERE  `IDPrefix`='7' or `IDPrefix`='8' or `IDPrefix`='9'";
								$npthail=new row_datastu($npthailSql);
								foreach($npthail->datastu_array as $rc_key=>$npthailRow){ 
									if($stu_guardianRow["parent_prefix_en"]==$npthailRow["IDPrefix"]){
										$ppe_selected="selected";
									}else{
										$ppe_selected="";
									}
								?>
											<option value="<?php echo $npthailRow["IDPrefix"]?>" <?php echo $ppe_selected;?>><?php echo $npthailRow["prefixname"]?></option>
											
						<?php	}?>					
					
										</optgroup>
									</select>
								</div>
							</div>
                        </fieldset>						
			
					</div>				
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อ (ภาษาอังกฤษ)</b></label>							
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ชื่อ (ภาษาอังกฤษ)" size="100" name="parent_fname_en" id="parent_fname_en" value="<?php echo $stu_guardianRow["parent_fname_en"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">นามสกุล (ภาษาอังกฤษ)</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="นามสกุล (ภาษาอังกฤษ)" size="100" name="parent_sname_en" id="parent_sname_en" value="<?php echo $stu_guardianRow["parent_sname_en"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">เลขประจำตัวประชาชน </b></label>							
								<div class="col-<?php echo $grid;?>-6">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน" size="100" name="parent_code" id="parent_code" value="<?php echo $stu_guardianRow["parent_code"];?>" maxlength="13" style="font-family: surafont_sanukchang; font-size: 18px"> 
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-5">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">วัน/เดือน/ปี เกิด ค.ศ. </b></label>
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text" class="form-control pickadate-accessibility" placeholder="คลิกเลือก วัน/เดือน/ปี เกิด" size="100" name="guardian_birthday" id="guardian_birthday" value="<?php echo $stu_guardianRow["guardian_birthday"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">กรุ๊ปเลือด</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select data-placeholder="กรุ๊ปเลือด..." class="select-size-<?php echo $grid;?>" name="parent_blood" id="parent_blood" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
						<?php
							if($stu_guardianRow["parent_blood"]=="A"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A" selected="selected">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}elseif($stu_guardianRow["parent_blood"]=="B"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B" selected="selected">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}elseif($stu_guardianRow["parent_blood"]=="O"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O" selected="selected">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}elseif($stu_guardianRow["parent_blood"]=="AB"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB" selected="selected">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}else{ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}   ?>
										</select>
								</div>
							</div>
                        </fieldset>						
			
					</div>					
				</div>				
				<div class="row">
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">เชื้อชาติ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="เชื้อชาติ..." class="select-size-<?php echo $grid;?>" name="parent_nation" id="parent_nation" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
											<optgroup label="เชื้อชาติ">
						<?php
								if($stu_guardianRow["parent_nation"]=="188"){ ?>
												<option value="188" selected="selected">(ภาษาไทย) / Thailand</option>
						<?php	}else{ ?>
												<option value="188">(ภาษาไทย) / Thailand</option>
						<?php	}      ?>				
						
							<?php
								$stusun_stu="SELECT `id`,`country_name_th`,`country_name_en` FROM `db_country`where `id`!='188' order by convert ( `country_name_th` using tis620) asc";
								$stusun_sturs=new row_datastu($stusun_stu);
								foreach($stusun_sturs->datastu_array as $rc_key=>$stusun_sturow){ 
									if($stu_guardianRow["parent_nation"]==$stusun_sturow["id"]){
										$stu_selected="selected";
									}else{
										$stu_selected="";
									}
								?>
											<option value="<?php echo $stusun_sturow["id"] ;?>" <?php echo $stu_selected;?>><?php echo $stusun_sturow["country_name_th"]." / ".$stusun_sturow["country_name_en"];?></option>
							<?php		 } ?>						
						
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
					
								
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">สัญชาติ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="สัญชาติ..." class="select-size-<?php echo $grid;?>" name="parent_sun" id="parent_sun" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
											<optgroup label="สัญชาติ">

						<?php
								if($stu_guardianRow["parent_sun"]=="188"){ ?>
												<option value="188" selected="selected">(ภาษาไทย) / Thailand</option>
						<?php	}else{ ?>
												<option value="188">(ภาษาไทย) / Thailand</option>
						<?php	}      ?>				
						
							<?php
								$stusun_stu="SELECT `id`,`country_name_th`,`country_name_en` FROM `db_country`where `id`!='188' order by convert ( `country_name_th` using tis620) asc";
								$stusun_sturs=new row_datastu($stusun_stu);
								foreach($stusun_sturs->datastu_array as $rc_key=>$stusun_sturow){ 
									if($stu_guardianRow["parent_sun"]==$stusun_sturow["id"]){
										$stu_selected="selected";
									}else{
										$stu_selected="";
									}
								?>
											<option value="<?php echo $stusun_sturow["id"] ;?>" <?php echo $stu_selected;?>><?php echo $stusun_sturow["country_name_th"]." / ".$stusun_sturow["country_name_en"];?></option>
							<?php		 } ?>

											</optgroup>	
										</select>
								</div>
							</div>
                        </fieldset>						
														
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ศาสนา</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="ศาสนา..." class="select-size-<?php echo $grid;?>" name="parent_IDReligion" id="parent_IDReligion" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
											<optgroup label="ศาสนา">
							<?php
								$ReligionSql="SELECT `IDReligion`,`Religion` FROM `rc_religion`";
								$Religion=new row_datastu($ReligionSql);
								foreach($Religion->datastu_array as $rc_key=>$Religion_print){ 
								if($stu_guardianRow["parent_IDReligion"]==$Religion_print["IDReligion"]){
									$stu_Religion="selected";
								}else{
									$stu_Religion="";
								}
								?>
											<option value="<?php echo $Religion_print["IDReligion"];?>" <?php echo $stu_Religion;?>><?php echo $Religion_print["Religion"];?></option>
							<?php	} ?>					

											</optgroup>	
										</select>
								</div>
							</div>
                        </fieldset>						
			
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">เบอร์โทรศัทพ์</b></label>							
								<div class="col-<?php echo $grid;?>-6">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เบอร์โทรศัทพ์" size="100" name="parent_phone" id="parent_phone" value="<?php echo $stu_guardianRow["parent_phone"];?>" data-masked-input="9999999999" maxlength="10" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>
				

				
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อาชีพ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="อาชีพ..." class="select-size-<?php echo $grid;?>" name="parent_career" id="parent_career" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
					<?php
						$data_careerSql="SELECT `dc_key`, `dc_txt` FROM `data_career` ORDER BY `data_career`.`dc_key` ASC";
						$data_career=new row_datastu($data_careerSql);
						foreach($data_career->datastu_array as $rc_key=>$data_careerRow){
								if($stu_guardianRow["parent_career"]==$data_careerRow["dc_key"]){
									$pc_selected="selected";
								}else{
									$pc_selected="";
								}
							?>
												<option value="<?php echo $data_careerRow["dc_key"];?>" <?php echo $pc_selected;?>><?php echo $data_careerRow["dc_txt"];?></option>
					<?php	}   ?>	
										</select>
								</div>
							</div>
                        </fieldset>						
														
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">ช่วงรายได้ - เดือน</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select data-placeholder="ช่วงรายได้..." class="select-size-<?php echo $grid;?>" name="parent_salary" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
					<?php
						$data_incomSql="SELECT `di_key`, `di_txt` FROM `data_incom` ORDER BY `data_incom`.`di_key` ASC";
						$data_incom=new row_datastu($data_incomSql);
						foreach($data_incom->datastu_array as $rc_key=>$data_incomRow){ 
							if($stu_guardianRow["parent_salary"]==$data_incomRow["di_key"]){
								$ps_selected="selected";
							}else{
								$ps_selected="";
							}
						?>
												<option value="<?php echo $data_incomRow["di_key"];?>" <?php echo $ps_selected;?>><?php echo $data_incomRow["di_txt"];?></option>
					<?php	}   ?>
										</select>
								</div>
							</div>
                        </fieldset>						
				
					</div>
					<!--<div class="col-<?php //echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php //echo $grid;?>-4">รายได้/เดือน</label>							
								<div class="col-<?php //echo $grid;?>-7">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Left addon" size="100">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>-->
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">วุฒิการศึกษา</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select data-placeholder="วุฒิการศึกษา..." class="select-size-<?php echo $grid;?>" name="parent_study" id="parent_study" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
										<?php
						$data_studySql="SELECT `study_id`, `study_txt` FROM `data_study` ORDER BY `data_study`.`study_id` ASC";
						$data_study=new row_datastu($data_studySql);
						foreach($data_study->datastu_array as $rc_key=>$data_studyRow){ 
							if($stu_guardianRow["parent_study"]==$data_studyRow["study_id"]){
								$study_selected="selected";
							}else{
								$study_selected="";
							}
						?>
												<option value="<?php echo $data_studyRow["study_id"];?>" <?php echo $study_selected;?>><?php echo $data_studyRow["study_txt"];?></option>
					<?php	}   ?>	
										</select>
								</div>
							</div>
                        </fieldset>						
													
					</div>
				</div>

				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">สถานที่ทำงาน </b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="สถานที่ทำงาน" size="100" maxlength="100" name="parent_workplace" id="parent_workplace" value="<?php echo $stu_guardianRow["parent_workplace"];?>" style="font-family: surafont_sanukchang; font-size: 18px"> 
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">ตำแหน่ง</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ตำแหน่ง" size="100" maxlength="100" name="parent_wp_pro" id="parent_wp_pro" value="<?php echo $stu_guardianRow["parent_wp_pro"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>				
				
				<hr><hr><p><h4><u><b style="color: #0000FF">ที่อยู่ที่ทำงาน</b></u></h4></p><hr>		
                
                <div class="row">
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">เลขที่ </b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เลขที่" size="100" maxlength="10" name="parent_addwordhno" id="parent_addwordhno" value="<?php echo $stu_guardian_addwordRow["parent_addwordhno"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>                    
                    </div>
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อหมู่บ้าน</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ชื่อหมู่บ้าน" size="100" maxlength="100" name="parent_addwordmoo_name" id="parent_addwordmoo_name" value="<?php echo $stu_guardian_addwordRow["parent_addwordmoo_name"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>                    
                    </div>
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">หมู่ที่ </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="หมู่ที่" size="100" maxlength="3" name="parent_addwordmoo" id="parent_addwordmoo" value="<?php echo $stu_guardian_addwordRow["parent_addwordmoo"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>                    
                    </div>
                </div>
                
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ซอย </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ซอย" size="100" maxlength="50" name="parent_addwordsoi" id="parent_addwordsoi" value="<?php echo $stu_guardian_addwordRow["parent_addwordsoi"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ถนน </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ถนน" size="100" maxlength="100" name="parent_addwordroad" id="parent_addwordroad" value="<?php echo $stu_guardian_addwordRow["parent_addwordroad"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
				</div>				
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">จังหวัด</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="จังหวัด..." class="select-size-<?php echo $grid;?>" name="parent_addwordprovince" id="parent_addwordprovince" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
											<optgroup label="จังหวัด">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($stu_guardian_addwordRow["parent_addwordprovince"]==$provincesRow["PROVINCE_ID"]){
											$pap_selected="selected";
										}else{
											$pap_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $pap_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
								<?php	} ?>			 
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
													
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อำเภอ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="อำเภอ..." class="select-size-<?php echo $grid;?>" name="parent_addwordamphur" id="parent_addwordamphur" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
											<optgroup label="อำเภอ">
											
							<?php
								$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$stu_guardian_addwordRow["parent_addwordprovince"]}'";
								$amphuresRs=new row_datastu($amphuresSql);
								foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ 
								if($stu_guardian_addwordRow["parent_addwordamphur"]==$amphuresRow["AMPHUR_ID"]){
									$pad_selected="selected";
								}else{
									$pad_selected="";
								}
								?>
												<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>" <?php echo $pad_selected;?>><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
						<?php	}   ?>				
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
													
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ตำบล</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="ตำบล..." class="select-size-<?php echo $grid;?>" name="parent_addwordtumbon" id="parent_addwordtumbon" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
											<optgroup label="ตำบล">
								<?php
									$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$stu_guardian_addwordRow["parent_addwordamphur"]}';";
									$districts=new row_datastu($districtsSql);
									foreach($districts->datastu_array as $rc_key=>$districts_print){ 
										if($stu_guardian_addwordRow["parent_addwordtumbon"]==$districts_print["DISTRICT_ID"]){
											$pat_selected="selected";
										}else{
											$pat_selected="";
										}
									
									?>
											<option value="<?php echo $districts_print["DISTRICT_ID"];?>" <?php echo $pat_selected;?>><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
							<?php	} ?>

											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
												
					</div>

					
				</div>
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">รหัสไปรษณีย์ </b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<div id="parent_addwordzipcode"><input type="text" name="parent_addwordzipcode" id="parent_addwordzipcodecopy" class="form-control" readonly="readonly" placeholder="รหัสไปรษณีย์" size="100" maxlength="6" value="<?php echo $stu_guardian_addwordRow["parent_addwordzipcode"];?>" style="font-family: surafont_sanukchang; font-size: 18px"></div>
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>				
				
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">เบอร์โทรศัทพ์ที่ทำงาน </b></label>							
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เบอร์โทรศัทพ์ที่ทำงาน" size="100" name="parent_wp_tel" id="parent_wp_tel" value="<?php echo $stu_guardianRow["parent_wp_tel"];?>" data-masked-input="999999999999999" maxlength="15" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>				
				<hr><hr><p><h4><u><b style="color: #0000FF">ที่อยู่ ผู้ปกครอง</b></u></h4></p><hr>
                     
                <div class="row">
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">บ้านเลขที่</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="บ้านเลขที่" size="100" maxlength="10" name="parent_hno" id="parent_hno" value="<?php echo $stu_guardian_addressRow["parent_hno"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>                    
                    </div>
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อหมู่บ้าน</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ชื่อหมู่บ้าน" size="100" maxlength="100"  name="parent_moo_name" id="parent_moo_name" value="<?php echo $stu_guardian_addressRow["parent_moo_name"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>                    
                    </div>
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">หมู่ที่</b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="หมู่ที่" size="100" maxlength="3"  name="parent_moo" id="parent_moo" value="<?php echo $stu_guardian_addressRow["parent_moo"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>                    
                    </div>
                </div>
                
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ซอย</b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ซอย" size="100" maxlength="50"  name="parent_soi" id="parent_soi" value="<?php echo $stu_guardian_addressRow["parent_soi"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ถนน</b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ถนน" size="100" maxlength="100"  name="parent_road" id="parent_road" value="<?php echo $stu_guardian_addressRow["parent_road"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>							
					</div>
				</div>

				<div class="row">
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">จังหวัด</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="จังหวัด..." class="select-size-<?php echo $grid;?>" name="parent_province" id="parent_province" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
											<optgroup label="จังหวัด">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($stu_guardian_addressRow["parent_province"]==$provincesRow["PROVINCE_ID"]){
											$pp_selected="selected";
										}else{
											$pp_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $pp_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
								<?php	} ?>			 
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
													
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อำเภอ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="อำเภอ..." class="select-size-<?php echo $grid;?>" name="parent_amphur" id="parent_amphur" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
											<optgroup label="อำเภอ">
											
							<?php
								$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$stu_guardian_addressRow["parent_province"]}'";
								$amphuresRs=new row_datastu($amphuresSql);
								foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ 
								if($stu_guardian_addressRow["parent_amphur"]==$amphuresRow["AMPHUR_ID"]){
									$pa_selected="selected";
								}else{
									$pa_selected="";
								}
								?>
												<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>" <?php echo $pa_selected;?>><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
						<?php	}   ?>				
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
												
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ตำบล</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="ตำบล..." class="select-size-<?php echo $grid;?>" name="parent_tumbon" id="parent_tumbon" style="font-family: surafont_sanukchang; font-size: 18px">
											<option></option>
											<optgroup label="ตำบล">
								<?php
									$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$stu_guardian_addressRow["parent_amphur"]}';";
									$districts=new row_datastu($districtsSql);
									foreach($districts->datastu_array as $rc_key=>$districts_print){ 
										if($stu_guardian_addressRow["parent_tumbon"]==$districts_print["DISTRICT_ID"]){
											$pt_selected="selected";
										}else{
											$pt_selected="";
										}
									
									?>
											<option value="<?php echo $districts_print["DISTRICT_ID"];?>" <?php echo $pt_selected;?>><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
							<?php	} ?>

											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
							
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">รหัสไปรษณีย์</b></label>
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<div id="parent_zipcode"><input type="text" name="parent_zipcode" id="parent_zipcodecopy"  class="form-control" readonly="readonly" placeholder="รหัสไปรษณีย์" size="100" maxlength="6" value="<?php echo $stu_guardian_addressRow["parent_zipcode"];?>" style="font-family: surafont_sanukchang; font-size: 18px"></div>
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					
				</div><hr>		
<!--**********************************************************-->		
		
<?php	}      ?>

