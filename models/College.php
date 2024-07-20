<?php

    class College{
        private $college_id;
        private $college_name;
        private $college_address;
        private $college_phone;

        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function __construct0(){}

        public function __construct4($college_id,$college_name,$college_address,$college_phone){
            $this->college_id = $college_id;
            $this->college_name = $college_name;
            $this->college_address = $college_address;
            $this->college_phone = $college_phone;
        }

        # Código
        public function setCollegeId($college_id){
            $this->college_id = $college_id;
        }
        public function getCollegeId(){
            return $this->college_id;
        }
        # Nombre
        public function setCollegeName($college_name){
            $this->college_name = $college_name;
        }
        public function getCollegeName(){
            return $this->college_name;
        }
        # Dirección
        public function setCollegeAddress($college_address){
            $this->college_address = $college_address;
        }
        public function getCollegeAddress(){
            return $this->college_address;
        }
        # Dirección
        public function setCollegePhone($college_phone){
            $this->college_phone = $college_phone;
        }
        public function getCollegePhone(){
            return $this->college_phone;
        }
    }

?>