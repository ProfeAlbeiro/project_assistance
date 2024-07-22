<?php

    class Grade{
        private $grade_id;
        private $grade_name;        

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

        public function __construct2($grade_id,$grade_name){
            $this->grade_id = $grade_id;
            $this->grade_name = $grade_name;            
        }

        # Grado: Id
        public function setGradeId($grade_id){
            $this->grade_id = $grade_id;
        }
        public function getGradeId(){
            return $this->grade_id;
        }        
        # Grado: Nombre
        public function setGradeName($grade_name){
            $this->grade_name = $grade_name;
        }
        public function getGradeName(){
            return $this->grade_name;
        }
    }

?>