<?php
    require_once "models/User.php";
    class Student extends User{
        # Estudianter: Crear
        public function create_student(){
            try {
                $sql = 'INSERT INTO STUDENTS VALUES (:studentId)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('studentId', $this->getUserId());                
                $stmt->execute();
                return $stmt;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
    }
?>