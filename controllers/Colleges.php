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

        # Colegio: Actualizar
        public function collegeUpdate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $colleges = new College;
                    $colleges = $colleges->read_college();
                    require_once "views/modules/college/college_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";
                    echo "<script>editCollege('editCollege');</script>";
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
                    $journeId = new Journe;
                    $journeId = $journeId->getjourne_bycode($_GET['idjourne']);
                    $journes = new Journe;
                    $journes = $journes->read_journe();
                    require_once "views/modules/college/journe_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";
                    echo "<script>editCollege('editJourne');</script>";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $journe = new Journe(
                        $_POST['journe_id'],
                        $_POST['journe_name'],
                        $_POST['journe_start_time'],
                        $_POST['journe_end_time']
                    );
                    $journe->update_journe();
                    header("Location: ?c=Colleges&a=journeRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Jornada: Eliminar
        public function journeDelete(){
            if ($this->session == 'admin') {
                $journe = new Journe;
                $journe->delete_journe($_GET['idjourne']);
                header("Location: ?c=Colleges&a=journeRead");
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Grado: Registrar
        public function gradeCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    header("Location: ?c=Colleges&a=gradeRead");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $grade = new Grade(
                        $_POST['grade_id'],
                        $_POST['grade_name'],
                    );
                    $grade->create_grade();
                    header("Location: ?c=Colleges&a=gradeRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Grado: Consultar
        public function gradeRead(){
            if ($this->session == 'admin') {
                $end_grade = new Grade;
                $end_grade = $end_grade->getgrade_endbycode();
                $gradeCode = $end_grade != 0 ? $end_grade + 1 : (is_null($end_grade) ? 0 : 1);
                $grades = new Grade;
                $grades = $grades->read_grade();
                require_once "views/modules/college/grade_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Grado: Actualizar
        public function gradeUpdate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $gradeId = new Grade;
                    $gradeId = $gradeId->getgrade_bycode($_GET['idgrade']);
                    $grades = new Grade;
                    $grades = $grades->read_grade();
                    require_once "views/modules/college/grade_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";
                    echo "<script>editCollege('editGrade');</script>";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $journe = new Grade(
                        $_POST['grade_id'],
                        $_POST['grade_name']
                    );
                    $journe->update_grade();
                    header("Location: ?c=Colleges&a=gradeRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Grado: Eliminar
        public function gradeDelete(){
            if ($this->session == 'admin') {
                $grade = new Grade;
                $grade->delete_grade($_GET['idgrade']);
                header("Location: ?c=Colleges&a=gradeRead");
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Curso: Registrar
        public function courseCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    header("Location: ?c=Colleges&a=courseRead");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $course = new Course(
                        null,
                        $_POST['course_name']
                    );
                    $course->create_course();
                    header("Location: ?c=Colleges&a=courseRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Curso: Consultar
        public function courseRead(){
            if ($this->session == 'admin') {
                $courses = new Course;
                $courses = $courses->read_course();
                require_once "views/modules/college/course_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }
    }
?>