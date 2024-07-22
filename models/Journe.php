<?php

    class Journe{
        private $journe_id;
        private $journe_name;
        private $journe_start_time;
        private $journe_end_time;

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

        public function __construct4($journe_id,$journe_name,$journe_start_time,$journe_end_time){
            $this->journe_id = $journe_id;
            $this->journe_name = $journe_name;
            $this->journe_start_time = $journe_start_time;
            $this->journe_end_time = $journe_end_time;
        }

        # Jornada: Id
        public function setJourneId($journe_id){
            $this->journe_id = $journe_id;
        }
        public function getJourneId(){
            return $this->journe_id;
        }        
        # Jornada: Nombre
        public function setJourneName($journe_name){
            $this->journe_name = $journe_name;
        }
        public function getJourneName(){
            return $this->journe_name;
        }        
        # Jornada: Hora Inicio
        public function setJourneStartTime($journe_start_time){
            $this->journe_start_time = $journe_start_time;
        }
        public function getJourneStartTime(){
            return $this->journe_start_time;
        }        
        # Jornada: Hora Inicio
        public function setJourneEndTime($journe_end_time){
            $this->journe_end_time = $journe_end_time;
        }
        public function getJourneEndTime(){
            return $this->journe_end_time;
        }        
    }

?>