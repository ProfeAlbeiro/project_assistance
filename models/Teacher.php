<?php
    require_once "models/User.php";
    class Teacher extends User{
        # Profesor: Crear
        public function create_teacher(){
            try {
                $sql = 'INSERT INTO TEACHERS VALUES (:teacherId)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('teacherId', $this->getUserId());                
                $stmt->execute();
                return $stmt;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
    }
?>