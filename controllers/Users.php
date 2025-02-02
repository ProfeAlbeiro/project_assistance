<?php
    # Modelos
    require_once "models/Rol.php";
    require_once "models/User.php";
    require_once "models/Student.php";
    require_once "models/Guardian.php";
    require_once "models/Teacher.php";

    class Users{

        # Constructor: Captura la sesión
        public function __construct(){
            $this->session = $_SESSION['session'];
        }

        # Principal: Envía al Dashboard
        public function main(){
            header("Location: ?c=Dashboard");
        }

        # Rol: Controlador Crear
        public function rolCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/modules/users/rol_create.view.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $rol = new Rol(
                        null,
                        $_POST['rol_name']
                    );
                    $rol->create_rol();
                    header("Location: ?c=Users&a=rolRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Rol: Controlador Consultar
        public function rolRead(){
            if ($this->session == 'admin') {
                $roles = new Rol;
                $roles = $roles->read_roles();
                require_once "views/modules/users/rol_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Rol: Controlador Actualizar
        public function rolUpdate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $rolId = new Rol;
                    $rolId = $rolId->getrol_bycode($_GET['idrol']);
                    $roles = new Rol;
                    $roles = $roles->read_roles();
                    require_once "views/modules/users/rol_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";
                    echo "<script>editRegister('editRol');</script>";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $rolUpdate = new Rol(
                        $_POST['rol_code'],
                        $_POST['rol_name']
                    );
                    $rolUpdate->update_rol();
                    header("Location: ?c=Users&a=rolRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Rol: Controlador Eliminar
        public function rolDelete(){
            if ($this->session == 'admin') {
                $rol = new Rol;
                $rol->delete_rol($_GET['idrol']);
                header("Location: ?c=Users&a=rolRead");
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Usuario: Controlador Crear
        public function userCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    header("Location: ?c=Users&a=userRead");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user = new User(
                        null,
                        $_POST['rol_code'],
                        $_POST['user_id'],
                        $_POST['user_name'],
                        $_POST['user_email'],
                        $_POST['user_phone'],
                        $_POST['user_pass'],
                        $_POST['user_state']
                    );
                    $user->create_user();
                    header("Location: ?c=Users&a=userRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Usuario: Controlador Consultar
        public function userRead(){
            if ($this->session == 'admin') {
                $roles = new Rol;
                $roles = $roles->read_roles_not();
                $state = ['Pendiente', 'Activo'];
                $users = new User;
                $users = $users->read_users();
                require_once "views/modules/users/user_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Usuario: Controlador Actualizar
        public function userUpdate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $state = ['Pendiente', 'Activo'];
                    $userId = new User;
                    $userId = $userId->getuser_bycode($_GET['iduser']);
                    $roles = new Rol;
                    $roles = $roles->read_roles_not();
                    $users = new User;
                    $users = $users->read_users();
                    require_once "views/modules/users/user_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";
                    echo "<script>editRegister('editUser');</script>";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $userUpdate = new User(
                        $_POST['user_code'],
                        $_POST['rol_id'],
                        $_POST['user_id'],
                        $_POST['user_name'],
                        $_POST['user_email'],
                        $_POST['user_phone'],
                        $_POST['user_pass'],
                        $_POST['user_state']
                    );
                    $userUpdate->update_user();
                    header("Location: ?c=Users&a=userRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Usuario: Controlador Eliminar
        public function userDelete(){
            if ($this->session == 'admin') {
                $user = new User;
                $user->delete_user($_GET['iduser']);
                header("Location: ?c=Users&a=userRead");
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Estudiante: Controlador Crear
        public function studentCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    header("Location: ?c=Users&a=studentRead");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $student = new Student(
                        null,
                        2,
                        $_POST['user_id'],
                        $_POST['user_name'],
                        $_POST['user_email'],
                        $_POST['user_phone'],
                        $_POST['user_pass'],
                        $_POST['user_state']
                    );
                    $student->create_user();
                    $student->create_student();
                    header("Location: ?c=Users&a=studentRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Estudiante: Controlador Consultar
        public function studentRead(){
            if ($this->session == 'admin') {
                $state = ['Pendiente', 'Activo'];
                $students = new Student;
                $students = $students->read_users();
                require_once "views/modules/users/student_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Estudiante: Controlador Actualizar
        public function studentUpdate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $state = ['Pendiente', 'Activo'];
                    $studentId = new Student;
                    $studentId = $studentId->getuser_bycode($_GET['idstudent']);
                    $students = new Student;
                    $students = $students->read_users();
                    require_once "views/modules/users/student_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";
                    echo "<script>editRegister('editStudent');</script>";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $studentUpdate = new Student(
                        $_POST['user_code'],
                        2,
                        $_POST['user_id'],
                        $_POST['user_name'],
                        $_POST['user_email'],
                        $_POST['user_phone'],
                        $_POST['user_pass'],
                        $_POST['user_state']
                    );
                    $studentUpdate->update_user();
                    header("Location: ?c=Users&a=studentRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Estudiante: Controlador Eliminar
        public function studentDelete(){
            if ($this->session == 'admin') {
                $user = new User;
                $user->delete_user($_GET['idstudent']);
                header("Location: ?c=Users&a=studentRead");
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Parentesco: Controlador Crear
        public function guardianTypeCreate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    header("Location: ?c=Users&a=guardianTypeRead");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $guardian_type = new Guardian(
                        null,
                        $_POST['guardian_type_name']
                    );
                    $guardian_type->create_guardian_type();
                    header("Location: ?c=Users&a=guardianTypeRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Parentesco: Controlador Consultar
        public function guardianTypeRead(){
            if ($this->session == 'admin') {
                $guardiansType = new Guardian;
                $guardiansType = $guardiansType->read_guardian_type();
                require_once "views/modules/users/guardian_type_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Parentesco: Controlador Actualizar
        public function guardianTypeUpdate(){
            if ($this->session == 'admin') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $state = ['Pendiente', 'Activo'];
                    $guardianTypeId = new Guardian;
                    $guardianTypeId = $guardianTypeId->getguardiantype_bycode($_GET['idguardian']);
                    $guardiansType = new Guardian;
                    $guardiansType = $guardiansType->read_guardian_type();
                    require_once "views/modules/users/guardian_type_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";
                    echo "<script>editRegister('editGuardianType');</script>";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $guardianUpdate = new Guardian(
                        $_POST['guardian_type_id'],
                        $_POST['guardian_type_name']
                    );
                    $guardianUpdate->update_guardian_type();
                    header("Location: ?c=Users&a=guardianTypeRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Parentesco: Controlador Eliminar
        public function guardianTypeDelete(){
            if ($this->session == 'admin') {
                $guardian_type = new Guardian;
                $guardian_type->delete_guardianType($_GET['idguardiantype']);
                header("Location: ?c=Users&a=guardianTypeRead");
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Acudiente: Controlador Crear
        public function guardianCreate(){
            if ($this->session == 'admin') {                
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $state = ['Pendiente', 'Activo'];                    
                    $studentId = new Student;
                    $studentId = $studentId->getuser_bycode($_GET['code_student']);
                    $guardianId = $_GET['id_guardian'];
                    $guardiansType = new Guardian;
                    $guardiansType = $guardiansType->read_guardian_type();
                    $students = new Student;
                    $students = $students->read_users();
                    $guardians = new Guardian;
                    $guardians = $guardians->read_users();
                    require_once "views/modules/users/student_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";                    
                    echo "<script>editRegister('createGuardian');</script>";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $guardian = new Guardian(
                        null,
                        3,
                        $_POST['guardian_type_name'],
                        $_POST['user_id'],
                        $_POST['user_name'],
                        $_POST['user_email'],
                        $_POST['user_phone'],
                        $_POST['user_pass'],
                        $_POST['user_state']
                    );
                    $guardian->create_user();
                    $guardian->create_guardian();
                    $guardian->create_guardian_student($_POST['student_id'], $_POST['user_id']);
                    header("Location: ?c=Users&a=studentRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Acudiente: Controlador Consultar
        public function guardianRead(){
            if ($this->session == 'admin') {
                $state = ['Pendiente', 'Activo'];
                $guardians = new Guardian;
                $guardians = $guardians->read_users();
                require_once "views/modules/users/guardian_read.view.php";
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Acudiente: Controlador Consultar Id del Acudiente
        public function guardianReadById(){
            if ($this->session == 'admin') {                                
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $state = ['Pendiente', 'Activo'];
                    $studentId = new Student;
                    $studentId = $studentId->getuser_bycode($_GET['idstudent']);
                    $students = new Student;
                    $students = $students->read_users();
                    require_once "views/modules/users/student_read.view.php";
                    echo "<script src='assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>";
                    echo "<script src='assets/dashboard/js/scripts.js'></script>";
                    echo "<script>editRegister('readGuardianById');</script>";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $guardian = new Guardian;
                    $guardian_exist = $guardian->getguardian_exist($_POST['guardian_id']);
                    if ($guardian_exist) {                                                
                        $guardian->create_guardian_student($_POST['student_id'], $_POST['guardian_id']);
                        header("Location: ?c=Users&a=studentRead");
                    } else {
                        header("Location: ?c=Users&a=guardianCreate&code_student=".$_POST['student_code']."&id_guardian=".$_POST['guardian_id']); 
                    }
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }
                
        # Acudiente: Controlador Eliminar
        public function guardianDelete(){
            if ($this->session == 'admin') {
                $user = new Guardian;
                $user->delete_user($_GET['idguardian']);
                header("Location: ?c=Users&a=guardianRead");
            } else {
                header("Location: ?c=Dashboard");
            }
        }
    }
?>