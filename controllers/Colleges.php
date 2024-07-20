<?php
    require_once "models/College.php";
    class Colleges{
        private $session;
        public function __construct(){
            $this->session = $_SESSION['session'];
        }
        public function main(){
            header("Location: ?c=Dashboard");
        }
        public function collegeCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/modules/college/college_create.view.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $college = new College(
                        null,
                        $_POST['college_name'],                        
                        $_POST['college_address'],                        
                        $_POST['college_phone']                        
                    );
                    header("Location: ?c=Dashboard");
                }
            } else {                
                header("Location: ?c=Dashboard");
            }


        }
    }
?>