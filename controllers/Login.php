<?php
require_once "models/User.php";
class Login{
    // Controlador Principal
    public function main() {
        $collegeName = new College();
        $collegeName = $collegeName->getcollege_bycode(1);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (empty($_SESSION['session'])) {
                $message = "";
                require_once "views/company/login.view.php";
            } else {
                header("Location:?c=Dashboard");
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {            
            $profile = new User(
                $_POST['user_id'],
                $_POST['user_pass']
            );            
            $profile = $profile->login();
            $message = "";            
            if ($profile) {
                $active = $profile->getUserState();
                if ($active != 0) {                    
                    $_SESSION['session'] = $profile->getRolName();
                    $_SESSION['profile'] = serialize($profile);
                    header("Location:?c=Dashboard");
                } else {
                    $message = "El Usuario NO está activo";
                    require_once "views/company/login.view.php";
                }
            } else {
                $message = "Credenciales Incorrectas ó el Usuario NO Existe";
                require_once "views/company/login.view.php";
            }
        }
    }
}
