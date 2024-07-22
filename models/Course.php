<?php

    class Course{
        private $course_id;
        private $course_name;        

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

        public function __construct2($course_id,$course_name){
            $this->course_id = $course_id;
            $this->course_name = $course_name;            
        }

        # Grupo: Id
        public function setCourseId($course_id){
            $this->course_id = $course_id;
        }
        public function getCourseId(){
            return $this->course_id;
        }        
        # Grupo: Nombre
        public function setCourseName($course_name){
            $this->course_name = $course_name;
        }
        public function getCourseName(){
            return $this->course_name;
        }
    }

?>