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

        public function __construct3($college_name,$college_address,$college_phone){            
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

        # Obtener Datos del Colegio
        public function getcollege_bycode($college_id){
            try {
                $sql = 'SELECT * FROM COLLEGE
                        WHERE college_id=:collegeId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('collegeId', $college_id);
                $stmt->execute();
                $userDb = $stmt->fetch();
                $user = new College(                    
                    $userDb['college_name'],                    
                    $userDb['college_address'],
                    $userDb['college_phone']
                );
                return $user;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Consultar Datos del Colegio
        public function read_college(){
            try {
                $collegeList = [];
                $sql = 'SELECT * FROM COLLEGE';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $college) {
                    $collegeObj = new College(                        
                        $college['college_name'],                        
                        $college['college_address'],
                        $college['college_phone']
                    );
                    array_push($collegeList, $collegeObj);
                }
                return $collegeList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Actualizar Datos del Colegio
        public function update_college(){
            try {
                $sql = 'UPDATE COLLEGE SET                            
                            college_name = :collegeName,                            
                            college_address = :collegeAddress,                            
                            college_phone = :collegePhone
                        WHERE college_id = 1';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('collegeName', $this->getCollegeName());                
                $stmt->bindValue('collegeAddress', $this->getCollegeAddress());                
                $stmt->bindValue('collegePhone', $this->getCollegePhone());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>