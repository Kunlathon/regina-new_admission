<?php header('Content-Type: text/html; charset=UTF-8'); ?>

<?php
    class SetTime{ //เปิดปิดเวลา
        public $STS_Type,$STS_TimeStart,$STS_TimeEnd;
        public $SetTimeStart_txt,$SetTimeEnd_txt;
        function __construct($STS_Type,$STS_TimeStart,$STS_TimeEnd){
            $this->STS_Type=$STS_Type;
            $this->STS_TimeStart=$STS_TimeStart;
            $this->STS_TimeEnd=$STS_TimeEnd;
    //---------------------------------------------------------------------------
            $SetTimeStart_txt="no_time";
            $SetTimeEnd_txt="no_time";
            $SetTimeServer=date("Y-m-d H:i:s");
    //---------------------------------------------------------------------------
                if(($this->STS_Type=="run_time")){
                    $date_start=date("Y-m-d H:i:s",strtotime($this->STS_TimeStart));
                    $date_end=date("Y-m-d H:i:s",strtotime($this->STS_TimeEnd));
                }else{
                    $date_start="-";
                    $date_end="-";
                }
    //Time zone
                if(($date_start=="-" and $date_end=="-")){
                    $SetTimeStart_txt="no_time";
                    $SetTimeEnd_txt="no_time";
                }elseif(($date_start=="-" or $date_end=="-")){
                    $SetTimeStart_txt="no_time";
                    $SetTimeEnd_txt="no_time";
                }else{
                    $key_date_start=strtotime($date_start);
                    $key_date_end=strtotime($date_end);
                    $key_SetTimeServer=strtotime($SetTimeServer);
    //test_time_start
                    if(($key_SetTimeServer>=$key_date_start)){
                        $SetTimeStart_txt="time_off";
                    }else{
                        $SetTimeStart_txt="time_on";
                    }
    //test_time_start end
    //test_time_end
                    if(($key_SetTimeServer>=$key_date_end)){
                        $SetTimeEnd_txt="time_on";
                    }else{
                        $SetTimeEnd_txt="time_off";
                    }
    //test_time_end end
                }
    //Time zone end
            $this->SetTimeStart_txt=$SetTimeStart_txt;
            $this->SetTimeEnd_txt=$SetTimeEnd_txt;
        }function TxtTimeStart(){
            return $this->SetTimeStart_txt;
        }function TxtTimeEnd(){
            return $this->SetTimeEnd_txt;
        }
    }

    class SetTimeScholarship{ //เปิดปิดเวลาการรับสมัคร
        public $STS_Type,$STS_id,$STS_TimeStart,$STS_TimeEnd;
        public $SetTimeStart_txt,$SetTimeEnd_txt;
        function __construct($STS_Type,$STS_id,$STS_TimeStart,$STS_TimeEnd){
            $this->STS_Type=$STS_Type;
            $this->STS_id=$STS_id;
            $this->STS_TimeStart=$STS_TimeStart;
            $this->STS_TimeEnd=$STS_TimeEnd;
//---------------------------------------------------------------------------
            $SetTimeStart_txt="no_time";
            $SetTimeEnd_txt="no_time";
            $SetTimeServer=date("Y-m-d H:i:s");
//---------------------------------------------------------------------------
            $IPAdder=$_SERVER["REMOTE_ADDR"];
            $link_scholarship=new connected_scholarship($IPAdder);
            $connect_scholarship=$link_scholarship->run_connto_scholarship();

                if(($this->STS_Type=="run_time_db")){
                    $STS_Sql="SELECT `ft_id`, `ft_date_start`, `ft_date_end` 
                              FROM `fund_time` 
                              WHERE `ft_id`='{$this->STS_id}'";
                        if(($STS_Rs=$connect_scholarship->query($STS_Sql))){
                             $STS_Row=$STS_Rs->Fetch(PDO::FETCH_ASSOC);
                                if((is_array($STS_Row) and count($STS_Row))){
                                    $date_start=date("Y-m-d H:i:s",strtotime($STS_Row["ft_date_start"]));
                                    $date_end=date("Y-m-d H:i:s",strtotime($STS_Row["ft_date_end"]));
                                }else{
                                    $date_start="-";
                                    $date_end="-";
                                }
                        }else{
                            $date_start="-";
                            $date_end="-";
                        }                 
                }elseif(($this->STS_Type=="run_time")){
                    $date_start=date("Y-m-d H:i:s",strtotime($this->STS_TimeStart));
                    $date_end=date("Y-m-d H:i:s",strtotime($this->STS_TimeEnd));
                }else{
                    $date_start="-";
                    $date_end="-";
                }
//Time zone
                if(($date_start=="-" and $date_end=="-")){
                    $SetTimeStart_txt="no_time";
                    $SetTimeEnd_txt="no_time";
                }elseif(($date_start=="-" or $date_end=="-")){
                    $SetTimeStart_txt="no_time";
                    $SetTimeEnd_txt="no_time";
                }else{
                    $key_date_start=strtotime($date_start);
                    $key_date_end=strtotime($date_end);
                    $key_SetTimeServer=strtotime($SetTimeServer);
//test_time_start
                    if(($key_SetTimeServer>=$key_date_start)){
                        $SetTimeStart_txt="time_off";
                    }else{
                        $SetTimeStart_txt="time_on";
                    }
//test_time_start end
//test_time_end
                    if(($key_SetTimeServer>=$key_date_end)){
                        $SetTimeEnd_txt="time_on";
                    }else{
                        $SetTimeEnd_txt="time_off";
                    }
//test_time_end end
                }
//Time zone end
            $connect_scholarship=null;
            $this->SetTimeStart_txt=$SetTimeStart_txt;
            $this->SetTimeEnd_txt=$SetTimeEnd_txt;
        }function TxtTimeStart(){
            return $this->SetTimeStart_txt;
        }function TxtTimeEnd(){
            return $this->SetTimeEnd_txt;
        }
    }
?>

<?php
    // fund_set ตั้งค่าระบบ
    class manage_fund_set{
        public $MFS_type,$MFS_fe_key,$MFS_fe_y,$MFS_fe_year,$MFS_fe_save;
        public $MFS_array,$MFS_Error;
        function __construct($MFS_type,$MFS_fe_key,$MFS_fe_y,$MFS_fe_year,$MFS_fe_save){
            $this->MFS_type=$MFS_type;
            $this->MFS_fe_key=$MFS_fe_key;
            $this->MFS_fe_y=$MFS_fe_y;
            $this->MFS_fe_year=$MFS_fe_year;
            $this->MFS_fe_save=$MFS_fe_save;
            $TheTime=date("Y-m-d H:i:s");
            $MFS_array=array();
            $MFS_Error="Error";
            $IPAdder=$_SERVER["REMOTE_ADDR"];
            $link_scholarship=new connected_scholarship($IPAdder);
            $connect_scholarship=$link_scholarship->run_connto_scholarship();
                if(($this->MFS_type=="read")){
                    $MFS_Sql="SELECT * 
                              FROM `fund_set` 
                              WHERE `fe_y`='{$this->MFS_fe_y}' 
                              AND `fe_year`='{$this->MFS_fe_year}'";
                        if(($MFS_Rs=$connect_scholarship->query($MFS_Sql))){
                            $MFS_Row=$MFS_Rs->Fetch(PDO::FETCH_ASSOC);
                                if((is_array($MFS_Row) && count($MFS_Row))){
                                    $MFS_array[]=$MFS_Row;
                                    $MFS_Error="NoError";
                                }else{
                                    $MFS_array="-";
                                    $MFS_Error="Error";
                                }
                        }else{
                            $MFS_array="-";
                            $MFS_Error="Error";
                        }
                }else{
                    $MFS_array="-";
                    $MFS_Error="Error_Null";
                }
            $connect_scholarship=null;
            $this->MFS_array=$MFS_array;
            $this->MFS_Error=$MFS_Error;
        }function Print_fund_set(){
            return $this->MFS_array;
        }function Error_fund_set(){
            return $this->MFS_Error;
        }
    }
?>


<?php
    class test_applicant{//แยกผู้สมัครทุน
        public $TA_fta_id,$TA_key;
        public $applicant_txt;
        function __construct($TA_fta_id,$TA_key){
            $this->TA_fta_id=$TA_fta_id;            
            $this->TA_key=$TA_key;
            $applicant_txt="null";
                if(($this->TA_fta_id=="S001")){
                    if(($this->TA_key>=31 && $this->TA_key<=33)){
                        $applicant_txt="yes";
                    }else{
                        $applicant_txt="no";
                    }
                }elseif(($this->TA_fta_id=="S002")){
                    if(($this->TA_key>=41 && $this->TA_key<=43)){
                        $applicant_txt="yes";
                    }else{
                        $applicant_txt="no";
                    }
                }elseif(($this->TA_fta_id=="S003")){
                    if(($this->TA_key>=3 && $this->TA_key<=43)){
                        $applicant_txt="yes";
                    }else{
                        $applicant_txt="no";
                    }
                }elseif(($this->TA_fta_id=="S004")){
                    if(($this->TA_key==31)){
                        $applicant_txt="yes";
                    }else{
                        $applicant_txt="no";
                    }
                }elseif(($this->TA_fta_id=="S005")){
                    if(($this->TA_key==41)){
                        $applicant_txt="yes";
                    }else{
                        $applicant_txt="no";
                    }
                }else{
                    $applicant_txt="null";
                }
            $this->applicant_txt=$applicant_txt;
        }function CallTestApplicant(){
            return $this->applicant_txt;
        }
    }
?>

<?php
    class PrintScholarshipList{
        public $PSL_Type;
        public $PSL_Array,$PSL_Error;
        function __construct($PSL_Type){
            $this->PSL_Type=$PSL_Type;
            $PSL_Array=array();
            $PSL_Error="YES";
            $IPAdder=$_SERVER["REMOTE_ADDR"];
            $link_scholarship=new connected_scholarship($IPAdder);
            $connect_scholarship=$link_scholarship->run_connto_scholarship();

                if(($this->PSL_Type=="read")){

                    $PSL_Sql="SELECT * 
                              FROM `fund_list` 
                              RIGHT JOIN `fund_group` 
                              ON (`fund_list`.`fl_id`=`fund_group`.`fund_list_fl_id`)
                              WHERE `fund_list`.`fl_status`=1";
                    if(($PSL_Rs=$connect_scholarship->query($PSL_Sql))){
                        while($PSL_Row=$PSL_Rs->Fetch(PDO::FETCH_ASSOC)){
                            if((is_array($PSL_Row) && count($PSL_Row))){
                                $PSL_Array[]=$PSL_Row;
                                $PSL_Error="NO";
                            }else{
                                $PSL_Array="-";
                                $PSL_Error="YES";
                            }
                        }
                    }else{
                        $PSL_Array="-";
                        $PSL_Error="YES";
                    }
                }else{
                    $PSL_Array="-";
                    $PSL_Error="YES";
                }

            $this->PSL_Array=$PSL_Array;
            $this->PSL_Error=$PSL_Error;
            $connect_scholarship=null;

        }function Call_PSL_Row(){
            return $this->PSL_Array;
        }function Call_PSL_Txt(){
            return $this->PSL_Error;
        }
    }
?>

