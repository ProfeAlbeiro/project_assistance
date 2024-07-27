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

        # Grado: Registrar
        public function create_grade(){
            try {
                $sql = 'INSERT INTO GRADES VALUES (
                            :gradeId,
                            :gradeName                            
                        )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('gradeId', $this->getGradeId());
                $stmt->bindValue('gradeName', $this->getGradeName());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Grado: Consultar
        public function read_grade(){
            try {
                $gradeList = [];
                $sql = 'SELECT * FROM GRADES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $grade) {
                    $gradeObj = new Grade(                        
                        $grade['grade_id'],
                        $grade['grade_name']
                    );
                    array_push($gradeList, $gradeObj);
                }
                return $gradeList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Grado: Obtener Último Registro
        public function getgrade_endbycode(){            
            $sql = 'SELECT * FROM GRADES
                    ORDER BY grade_id DESC LIMIT 1';
            $stmt = $this->dbh->prepare($sql);                
            $stmt->execute();
            $gradeDb = $stmt->fetch();
            $gradeCode = isset($gradeDb['grade_id']) ? $gradeDb['grade_id'] : null;
            return $gradeCode;            
        }

        # Grado: Obtener Registro
        public function getgrade_bycode($grade_id){
            try {
                $sql = 'SELECT * FROM GRADES
                        WHERE grade_id=:gradeId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('gradeId', $grade_id);
                $stmt->execute();
                $gradeDb = $stmt->fetch();
                $grade = new Grade(
                    $gradeDb['grade_id'],                    
                    $gradeDb['grade_name']                    
                );
                return $grade;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Grado: Actualizar
        public function update_grade(){
            try {
                $sql = 'UPDATE GRADES SET
                            grade_id = :gradeId,
                            grade_name = :gradeName                            
                        WHERE grade_id = :gradeId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('gradeId', $this->getGradeId());                
                $stmt->bindValue('gradeName', $this->getGradeName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Grado: Eliminar
        public function delete_grade($id_grade){
            try {
                $sql = 'DELETE FROM GRADES WHERE grade_id = :gradeId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('gradeId', $id_grade);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>