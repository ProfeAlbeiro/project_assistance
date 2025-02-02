<?php

    class Journe{
        private $journe_id;
        private $journe_name;
        private $journe_start_time;
        private $journe_end_time;
        private $journe_min_before;
        private $journe_min_after;
        private $journe_min_nonattend;

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

        public function __construct7($journe_id,$journe_name,$journe_start_time,$journe_end_time,$journe_min_before,$journe_min_after,$journe_min_nonattend){
            $this->journe_id = $journe_id;
            $this->journe_name = $journe_name;
            $this->journe_start_time = $journe_start_time;
            $this->journe_end_time = $journe_end_time;
            $this->journe_min_before = $journe_min_before;
            $this->journe_min_after = $journe_min_after;
            $this->journe_min_nonattend = $journe_min_nonattend;
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
        # Jornada: Minutos antes        
        public function setJourneMinBefore($journe_min_before){
            $this->journe_min_before = $journe_min_before;
        }
        public function getJourneMinBefore(){
            return $this->journe_min_before;
        }
        # Jornada: Minutos después        
        public function setJourneMinAfter($journe_min_after){
            $this->journe_min_after = $journe_min_after;
        }
        public function getJourneMinAfter(){
            return $this->journe_min_after;
        }
        # Jornada: Minutos No asiste        
        public function setJourneMinNonAttend($journe_min_nonattend){
            $this->journe_min_nonattend = $journe_min_nonattend;
        }
        public function getJourneMinNonAttend(){
            return $this->journe_min_nonattend;
        }

        # Jornada: Crear
        public function create_journe(){
            try {
                $sql = 'INSERT INTO JOURNES VALUES (
                            :journeId,
                            :journeName,
                            :journeStartTime,
                            :journeEndTime,
                            :journeMinBefore,
                            :journeMinAfter,
                            :journeMinNonAttend
                        )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('journeId', $this->getJourneId());
                $stmt->bindValue('journeName', $this->getJourneName());
                $stmt->bindValue('journeStartTime', $this->getJourneStartTime());
                $stmt->bindValue('journeEndTime', $this->getJourneEndTime());
                $stmt->bindValue('journeMinBefore', $this->getJourneMinBefore());
                $stmt->bindValue('journeMinAfter', $this->getJourneMinAfter());
                $stmt->bindValue('journeMinNonAttend', $this->getJourneMinNonAttend());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Jornada: Consultar
        public function read_journe(){
            try {
                $journeList = [];
                $sql = 'SELECT * FROM JOURNES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $journe) {
                    $journeObj = new Journe(                        
                        $journe['journe_id'],                        
                        $journe['journe_name'],                        
                        $journe['journe_start_time'],
                        $journe['journe_end_time'],
                        $journe['journe_min_before'],
                        $journe['journe_min_after'],
                        $journe['journe_min_nonattend']
                    );
                    array_push($journeList, $journeObj);
                }
                return $journeList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Jornada: Obtener Registro
        public function getjourne_bycode($journe_id){
            try {
                $sql = 'SELECT * FROM JOURNES
                        WHERE journe_id=:journeId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('journeId', $journe_id);
                $stmt->execute();
                $journeDb = $stmt->fetch();
                $journe = new Journe(                    
                    $journeDb['journe_id'],                    
                    $journeDb['journe_name'],                    
                    $journeDb['journe_start_time'],
                    $journeDb['journe_end_time'],
                    $journeDb['journe_min_before'],
                    $journeDb['journe_min_after'],
                    $journeDb['journe_min_nonattend']
                );
                return $journe;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }        

        # Jornada: Actualizar
        public function update_journe(){
            try {
                $sql = 'UPDATE JOURNES SET                            
                            journe_id = :journeId,
                            journe_name = :journeName,                            
                            journe_start_time = :journeStartTime,                            
                            journe_end_time = :journeEndTime,
                            journe_min_before = :journeMinBefore,
                            journe_min_after = :journeMinAfter,
                            journe_min_nonattend = :journeMinNonAttend
                        WHERE journe_id = :journeId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('journeId', $this->getJourneId());                
                $stmt->bindValue('journeName', $this->getJourneName());                
                $stmt->bindValue('journeStartTime', $this->getJourneStartTime());                
                $stmt->bindValue('journeEndTime', $this->getJourneEndTime());                
                $stmt->bindValue('journeMinBefore', $this->getJourneMinBefore());                
                $stmt->bindValue('journeMinAfter', $this->getJourneMinAfter());                
                $stmt->bindValue('journeMinNonAttend', $this->getJourneMinNonAttend());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Jornada: Eliminar
        public function delete_journe($id_journe){
            try {
                $sql = 'DELETE FROM JOURNES WHERE journe_id = :journeId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('journeId', $id_journe);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>