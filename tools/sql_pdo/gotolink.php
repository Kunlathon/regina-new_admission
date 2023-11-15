<?php
    class goingtolink{
        public $gotolink;
        function __construct($gotolink){
            $this->gotolink=$gotolink;
            if($this->gotolink=="127.0.0.1" or $this->gotolink=="localhost" or $this->gotolink=="::1"){
                $gotolink="http://localhost:8092/new_admission";
            }else{
                $gotolink="http://www.regina.ac.th/programming/recruit_new_students";
            }
            if(isset($gotolink)){
                $this->gotolink=$gotolink;
            }else{
                //------------------------
            }
        }function Rungotolink(){
            if(isset($this->gotolink)){
                return $this->gotolink;
            }else{
                //------------------------
            }
        }
    }
?>

<?php
 /*   class name_prefix{
        public $birthday;
        function __construct($birthay){
            $this->birthay=$birthay;
            if($this->birthay==null){
                    
            }else{
                
                
            }
            
        
        }
    }
*/
?>