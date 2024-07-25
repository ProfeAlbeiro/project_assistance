<?php
    ob_start();
    session_start();
    date_default_timezone_set('America/Bogota');
    require_once "models/DataBase.php";
    require_once "models/Email.php";
    $controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : "Login";
    $route_controller = "controllers/" . $controller . ".php";
    if (file_exists($route_controller)) {
        $view = $controller;
        require_once $route_controller;
        $controller = new $controller;
        $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
        require_once "models/College.php";
        $collegeData = new College();
        $collegeData = $collegeData->getcollege_bycode(1);
        $_SESSION['collegeName'] = $collegeData->getCollegeName();
        if ($view === 'Landing' || $view === 'Login') {
            require_once "views/company/header.view.php";
            call_user_func(array($controller, $action));
            require_once "views/company/footer.view.php";
        } elseif (!empty($_SESSION['session'])) {
            require_once "models/User.php";
            $profile = unserialize($_SESSION['profile']);
            $session = $_SESSION['session'];
            require_once "views/roles/".$session."/header.view.php";
            call_user_func(array($controller, $action));
            require_once "views/roles/".$session."/footer.view.php";
        } else {
            header("Location:?");
        }
    } else {
        header("Location:?");
    }
    ob_end_flush();
?>