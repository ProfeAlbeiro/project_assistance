<?php
    # Modelos 
    require_once "models/Rol.php";
    require_once "models/User.php";

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
            if ($this->session == 'admin' || $this->session == 'seller') {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $roles = new Rol;
                    $roles = $roles->read_roles();
                    require_once "views/modules/users/user_create.view.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {                
                    $user = new User(
                        $_POST['user_id'],
                        $_POST['rol_code'],                        
                        $_POST['user_name'],                        
                        $_POST['user_email'],                        
                        $_POST['user_phone'],                        
                        $_POST['user_pass'],
                        $_POST['user_state']
                    );
                    $user = $user->create_user();                    
                    header("Location: ?c=Users&a=userRead");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }

        # Usuario: Controlador Consultar
        public function userRead(){
            if ($this->session == 'admin') {
                $state = ['Inactivo', 'Activo'];
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
                    $state = ['Inactivo', 'Activo'];
                    $roles = new User;
                    $roles = $roles->read_roles();
                    $user = new User;                
                    $user = $user->getuser_bycode($_GET['idUser']);                
                    require_once "views/modules/users/user_update.view.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $userUpdate = new User(
                        $_POST['user_id'],
                        $_POST['rol_id'],                        
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
                $user->delete_user($_GET['idUser']);
                header("Location: ?c=Users&a=userRead");
            } else {
                header("Location: ?c=Dashboard");
            }
        }
    }
?>