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
        # Colegio: Crear
        public function collegeUpdate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $college = new College;
                    $college = $college->getcollege_bycode(1);
                    $colleges = new College;
                    $colleges = $colleges->read_college();
                    require_once "views/modules/college/college_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";                    
                    echo "<script>loadModalUpdate();</script>";
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
        public function journeCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/modules/college/journe_create.view.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {                    
                    $journe = new Journe(
                        123,
                        $_POST['journe_name'],                        
                        $_POST['journe_start_time'],                        
                        $_POST['journe_end_time']
                    );
                    print_r($journe);
                    // header("Location: ?c=Dashboard");
                }
            } else {                
                header("Location: ?c=Dashboard");
            }
        }
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