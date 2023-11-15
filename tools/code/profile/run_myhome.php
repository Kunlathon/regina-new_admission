<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
			$grid="<?php echo $grid;?>";
		}elseif($width_system<=992){
			$grid="md";
		}elseif($width_system<=768){
			$grid="sm";
		}else{
			$grid="xs";
		}
    ?>	
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<script>
		$(document).ready(function () {
			
			$('.select-size-<?php echo $grid;?>').select2({
			containerCssClass: 'select-<?php echo $grid;?>'
			});
			
		})
	</script>
<!--ที่อยู่ปัจจุบัน-->
	<script>
		$(document).ready(function () {
			$("#stu_province").change(function () {
				var province=$("#stu_province").val();
				
				if(province!=""){
					$.post("<?php echo $toLink;?>/tools/code/profile/add_stu/addstu_city.php",{
						txt_province:province
					},function(dataprovince){
						if(dataprovince!=""){
							$("#stu_amphur").html(dataprovince);
						}
					})
				}
				
			})
		})
	</script>
	<script>
		$(document).ready(function () {
			$("#stu_amphur").change(function () {
				var city=$("#stu_amphur").val();
				
				if(city!=""){
					$.post("<?php echo $toLink;?>/tools/code/profile/add_stu/addstu_amphures.php",{
						txt_city:city
					},function(datacity){
						if(datacity!=""){
							$("#stu_tumbon").html(datacity);
						}
					})
				}
				
			})
		})
	</script>
	<script>
		$(document).ready(function () {
			$("#stu_tumbon").change(function () {
				var zip=$("#stu_tumbon").val();
				
				if(zip!=""){
					$.post("<?php echo $toLink;?>/tools/code/profile/add_stu/addstu_zip.php",{
						txt_zip:zip
					},function(datacity){
						if(datacity!=""){
							$("#stu_zipcode").html(datacity);
						}
					})
				}
				
			})
		})
	</script>
<!--ที่อยู่ปัจจุบัน จบ-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
	error_reporting(error_reporting() & ~E_NOTICE); 
	include("../../database/database_swip/pdo_conndatastu_sw.php");
	include("../../database/database_swip/class_pdodatastu_sw.php");
//-----------------------------------------------------------------------------------------------------	
	include("../../database/pdo_conndatastu.php");
	include("../../database/class_pdodatastu.php");
//-----------------------------------------------------------------------------------------------------	
	include("../../database/pdo_admission.php");	
	include("../../database/class_admission.php");
//-----------------------------------------------------------------------------------------------------	
	$print_home=filter_input(INPUT_POST,'print_home');
	$print_user=filter_input(INPUT_POST,'print_user');
	$stu_address_homeSql="SELECT * FROM `stu_address_home` WHERE `stu_id`='{$print_user}'";
	$stu_address_home=new notrow_datastu_sw($stu_address_homeSql);
	foreach($stu_address_home->datastu_array as $rc_key=>$stu_address_homeRow){}
//-----------------------------------------------------------------------------------------------------	
	
		if(isset($print_home)){
			switch($print_home){
				case "A": ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
<?php
//---data
	$print_stu_reg_hno=filter_input(INPUT_POST,"print_stu_reg_hno");
	$print_stu_reg_moo_name=filter_input(INPUT_POST,"print_stu_reg_moo_name");
	$print_stu_reg_moo=filter_input(INPUT_POST,"print_stu_reg_moo");
	$print_stu_reg_soi=filter_input(INPUT_POST,"print_stu_reg_soi");
	$print_stu_reg_road=filter_input(INPUT_POST,"print_stu_reg_road");
	$print_stu_reg_province=filter_input(INPUT_POST,"print_stu_reg_province");
	$print_stu_reg_amphur=filter_input(INPUT_POST,"print_stu_reg_amphur");
	$print_stu_reg_tumbon=filter_input(INPUT_POST,"print_stu_reg_tumbon");
	$print_stu_reg_zipcodecopy=filter_input(INPUT_POST,"print_stu_reg_zipcodecopy");
//---data end
?>							
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<center><font color="#2F03F9" style="font-family: surafont_sanukchang; font-size: 18px"><h4><b>อ้างอิงจากที่อยู่ทะเบียนบ้าน</b></h4></font></center>
					</div>
				</div>
<!--***********************************************************************************************-->
				<input type="hidden" name="stu_hno" id="stu_hno" value="<?php echo $print_stu_reg_hno;?>">
				<input type="hidden" name="stu_moo_name" id="stu_moo_name" value="<?php echo $print_stu_reg_moo_name;?>">
				<input type="hidden" name="stu_moo" id="stu_moo" value="<?php echo $print_stu_reg_moo;?>">
				<input type="hidden" name="stu_soi" id="stu_soi" value="<?php echo $print_stu_reg_soi;?>">
				<input type="hidden" name="stu_road" id="stu_road" value="<?php echo $print_stu_reg_road;?>">
				<input type="hidden" name="stu_province" id="stu_province" value="<?php echo $print_stu_reg_province;?>">
				<input type="hidden" name="stu_amphur" id="stu_amphur" value="<?php echo $print_stu_reg_amphur;?>">
				<input type="hidden" name="stu_tumbon" id="stu_tumbon" value="<?php echo $print_stu_reg_tumbon;?>">
				<input type="hidden" name="stu_zipcodecopy" id="stu_zipcodecopy" value="<?php echo $print_stu_reg_zipcodecopy;?>">
<!--***********************************************************************************************-->			
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php		break;
				case "B": ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->                
                <div class="row">
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">บ้านเลขที่</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" name="stu_hno" id="stu_hno" class="form-control" placeholder="บ้านเลขที่" size="100" maxlength="100" value="<?php echo $stu_addressRow["stu_hno"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
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
										<input type="text" class="form-control" name="stu_moo_name" id="stu_moo_name" placeholder="ชื่อหมู่บ้าน" size="100" maxlength="100" value="<?php echo $stu_addressRow["stu_moo_name"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
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
										<input type="text" class="form-control" name="stu_moo" id="stu_moo" placeholder="หมู่ที่" size="100" maxlength="3" value="<?php echo $stu_addressRow["stu_moo"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
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
										<input type="text" class="form-control" name="stu_soi" id="stu_soi" placeholder="ซอย" size="100" maxlength="100" value="<?php echo $stu_addressRow["stu_soi"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
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
										<input type="text" class="form-control" name="stu_road" id="stu_road" placeholder="ถนน" size="100" maxlength="100" value="<?php echo $stu_addressRow["stu_road"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
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
										<select data-placeholder="จังหวัด..." class="select-size-<?php echo $grid;?>"  id="stu_province" name="stu_province">
											<option></option>
											<optgroup label="จังหวัด">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($stu_addressRow["stu_province"]==$provincesRow["PROVINCE_ID"]){
											$pr_selected="selected";
										}else{
											$pr_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $pr_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
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
										<select data-placeholder="อำเภอ..." class="select-size-<?php echo $grid;?>" name="stu_amphur" id="stu_amphur">
											<option></option>
											<optgroup label="อำเภอ">
											
							<?php
								$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$stu_addressRow["stu_province"]}'";
								$amphuresRs=new row_datastu($amphuresSql);
								foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ 
								if($stu_addressRow["stu_amphur"]==$amphuresRow["AMPHUR_ID"]){
									$sa_selected="selected";
								}else{
									$sa_selected="";
								}
								?>
												<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>" <?php echo $sa_selected;?>><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
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
										<select data-placeholder="ตำบล..." class="select-size-<?php echo $grid;?>" name="stu_tumbon" id="stu_tumbon">
											<option></option>
											<optgroup label="ตำบล">
								<?php
									$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$stu_addressRow["stu_amphur"]}';";
									$districts=new row_datastu($districtsSql);
									foreach($districts->datastu_array as $rc_key=>$districts_print){ 
										if($stu_addressRow["stu_tumbon"]==$districts_print["DISTRICT_ID"]){
											$stum_selected="selected";
										}else{
											$stum_selected="";
										}
									
									?>
											<option value="<?php echo $districts_print["DISTRICT_ID"];?>" <?php echo $stum_selected;?>><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
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
										<div id="stu_zipcode"><input type="text" name="stu_zipcode" id="stu_zipcodecopy" class="form-control" readonly="readonly" placeholder="รหัสไปรษณีย์" size="100" maxlength="6" value="<?php echo $stu_addressRow["stu_zipcode"];?>" style="font-family: surafont_sanukchang; font-size: 18px"></div>
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
				</div>				
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->					
	<?php		break;
				default: ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	}
		}else{
//-----------------------------------------------------------------------------------------------------		
		}	
?>

	
