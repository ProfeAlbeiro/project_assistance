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
        public function AssistanceCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {                    
                    require_once ("views/modules/assistance/assistance_create.view.php");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $assistance = new Assistance(
                        $_POST['estado_id'],
                        $_POST['estudiante_id'],
                        $_POST['asistencia_fecha'],
                        $_POST['asistencia_hora_inicio']
                    );
                    print_r($assistance);
                    // $assistance->create_assistance();
                    // header("Location: ?c=Users&a=rolRead");
                }                
            } else {
                header("Location: ?c=Dashboard");
            }            
        }
    }

?>