<?php
    $host = explode('?', $_SERVER['REQUEST_URI'])[0];
    $num = substr_count($host, '/');
    $path = explode('/', $host)[$num];

    if ($path == '' OR $path == 'index' OR $path == 'index.php') {
        $response = Controller::StartSite();
    }

    elseif($path == 'login.php' OR $path == 'login') {
        $response = Controller::loginAction();
    }

    elseif($path == 'logout.php' OR $path == 'logout') {
        $response = Controller::logoutAction();
    }

    else {
        $response = Controller::error404();
    }
?>