<?php
    require_once "models/College.php";
    require_once "models/Journe.php";
    require_once "models/Grade.php";
    require_once "models/Course.php";
    class Colleges{

        private $session;

        public function __construct(){
            $this->session = $_SESSION['session'];
        }

        public function main(){
            header("Location: ?c=Dashboard");
        }

        # Colegio: Registrar
        public function collegeUpdate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {                    
                    $colleges = new College;
                    $colleges = $colleges->read_college();
                    require_once "views/modules/college/college_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";                    
                    echo "<script>editCollege();</script>";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $college = new College(                        
                        $_POST['college_name'],                        
                        $_POST['college_address'],
                        $_POST['college_phone']
                    );
                    $college->update_college();
                    header("Location: ?c=Colleges&a=collegeRead");                
                }
            } else {                
                header("Location: ?c=Dashboard");
            }
        }        

        # Colegio: Consultar
        public function collegeRead(){
            if ($this->session == 'admin') {
                $colleges = new College;
                $colleges = $colleges->read_college();
                require_once "views/modules/college/college_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Jornada: Registrar
        public function journeCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {                    
                    header("Location: ?c=Colleges&a=journeRead");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {                    
                    $journe = new Journe(
                        null,
                        $_POST['journe_name'],                        
                        $_POST['journe_start_time'],                        
                        $_POST['journe_end_time']
                    );
                    $journe->create_journe();
                    header("Location: ?c=Colleges&a=journeRead");
                }
            } else {                
                header("Location: ?c=Dashboard");
            }
        }

         # Jornada: Consultar
         public function journeRead(){
            if ($this->session == 'admin') {
                $journes = new Journe;
                $journes = $journes->read_journe();
                require_once "views/modules/college/journe_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Jornada: Actualizar
        public function journeUpdate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {                    
                    // $journe = new Journe;
                    // $journe = $journe->getjourne_bycode($_GET['idJourne']);
                    $journes = new Journe;
                    $journes = $journes->read_journe();
                    require_once "views/modules/college/journe_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";                    
                    echo "<script>editJourne();</script>";                
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // $rolUpdate = new User;
                    // $rolUpdate->setRolCode($_POST['rol_code']);
                    // $rolUpdate->setRolName($_POST['rol_name']);
                    // $rolUpdate->update_rol();
                    // require_once "views/modules/users/rol_update.view.php";                
                    // header("Location: ?c=Users&a=rolRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Controlador Eliminar Rol
        public function journeDelete(){
            if ($this->session == 'admin') {
                $rol = new Journe;
                $rol->delete_journe($_GET['idJourne']);
                header("Location: ?c=Colleges&a=journeRead");
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        

        # Grado: Registrar
        public function gradeCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/modules/college/grade_create.view.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {                    
                    $grade = new Grade(
                        123,
                        $_POST['grade_name']                        
                    );
                    print_r($grade);
                    // header("Location: ?c=Dashboard");
                }
            } else {                
                header("Location: ?c=Dashboard");
            }
        }
        
        # Grupo: Registrar
        public function courseCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/modules/college/course_create.view.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {                    
                    $course = new Course(
                        123,
                        $_POST['course_name']
                    );
                    print_r($course);
                    // header("Location: ?c=Dashboard");
                }
            } else {                
                header("Location: ?c=Dashboard");
            }
        }
    }
?>