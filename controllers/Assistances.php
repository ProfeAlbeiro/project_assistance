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
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $lastRecord = new Assistance;
                    $lastRecord = $lastRecord->getassistance_last();                        
                    require_once ("views/modules/assistance/assistance_create.view.php");                                        
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Indagar si podemos capturar la fecha y hora del dispositivo y no del servidor.                                         
                    // ¿Cómo mostrar fecha y hora dinámicamente?
                    date_default_timezone_set('America/Bogota');
                    $today = date("Y-m-d");                    
                    $start_time = date("H:i:s");
                    $assistance = new Assistance;
                    // $assistance->setStudentId($_POST['student_id']);                    
                    $assistance = new Assistance(
                        $_POST['student_id'],                        
                        $today,
                        $start_time                        
                    );
                    // Cuando llega a la hora límite (30 minutos), se activa la notificación por correo
                    $time_workday = "05:45:00";
                    $assistance->create_assistance($time_workday);                    
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