<?php
    require_once "models/User.php";
    class Guardian extends User{
        # Acudiente: Crear
        public function create_guardian(){
            try {
                $sql = 'INSERT INTO GUARDIANS VALUES (:guardianId)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('guardianId', $this->getUserId());                
                $stmt->execute();
                return $stmt;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
    }
?>