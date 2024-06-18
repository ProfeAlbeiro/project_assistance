<?php
    
    require_once "models/Assistance.php";

    class Assistances{
        private $session;
        public function __construct(){            
            $this->session = $_SESSION['session'];
        }
        public function main(){
            header("Location: ?c=Dashboard");            
        }
        
        // Controlador Crear Asistencia
        public function assistanceCreate(){
            if ($this->session == 'admin') {
                date_default_timezone_set('America/Bogota');
                // Cómo mostrar fecha y hora dinámicamente
                $date = date("Y-m-d");                    
                $start_time = date("H:i:s");
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    // Indagar si podemos capturar la fecha y hora del dispositivo y no del servidor.                                         
                    $lastRecord = new Assistance;
                    $lastRecord = $lastRecord->getassistance_last();                        
                    require_once ("views/modules/assistance/assistance_create.view.php");                                        
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {                    
                    $assistance = new Assistance(
                        $_POST['student_id'],
                        $_POST['assistance_attends'],
                        $date,
                        $start_time                        
                    );
                    $assistance->create_assistance();                    
                    $lastRecord = new Assistance;
                    $lastRecord = $lastRecord->getassistance_last();                    
                    require_once ("views/modules/assistance/assistance_create.view.php");
                    // header("Location: ?c=Assistances&a=assistanceCreate");
                }                
            } else {
                header("Location: ?c=Dashboard");
            }            
        }

        // Controlador Consultar Asistencias
        public function assistanceRead(){
            if ($this->session == 'admin') {
                $assistances = new Assistance;
                $assistances = $assistances->read_assistance();                                
                require_once "views/modules/assistance/assistance_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }
    }

?>