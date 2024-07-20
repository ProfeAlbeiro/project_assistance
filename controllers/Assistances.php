<?php    
    require_once "models/Assistance.php";
    require_once "models/Notification.php";

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
                    $today = date("Y-m-d");                    
                    $entry_time = date("H:i:s");
                    $attend_id = new Assistance;                    
                    $attend_id = $attend_id->getJournalByStudent($_POST['student_id']);                    
                    
                    $assistance = new Assistance(
                        $_POST['student_id'],
                        $attend_id,                        
                        $today,
                        $entry_time
                    );                    
                    $assistance->create_assistance();
                    
                    // Método que tome una hora y dispare (Opc: Botón) 
                    // el llenado de la no asistencia de ese día

                    $lastRecord = new Assistance;
                    $lastRecord = $lastRecord->getassistance_last();
                    require_once ("views/modules/assistance/assistance_create.view.php");                    
                    if ($attend_id == 2 OR $attend_id == 3) {
                        $notifications = new Notification;
                        $notifications = $notifications->create_notification($lastRecord->getStudentId());                        
                    }                    
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