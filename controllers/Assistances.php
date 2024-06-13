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
                    // Indagar si podemos capturar la fecha y hora del dispositivo y no del servidor. 
                    date_default_timezone_set('America/Bogota');
                    $fecha = date("Y-m-d");                    
                    $hora = date("H:i:s");
                    require_once ("views/modules/assistance/assistance_create.view.php");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    date_default_timezone_set('America/Bogota');
                    // Cómo mostrar fecha y hora dinámicamente
                    $fecha = date("Y-m-d");                    
                    $hora = date("H:i:s");
                    $assistance = new Assistance(
                        $_POST['estado_id'],
                        $_POST['estudiante_id'],
                        $fecha,
                        $hora                        
                    );                    
                    $assistance->create_assistance();
                    header("Location: ?c=Assistances&a=assistanceCreate");
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