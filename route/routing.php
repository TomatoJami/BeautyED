<?php
    $host = explode('?', $_SERVER['REQUEST_URI'])[0];
    $num = substr_count($host, '/');
    $path = explode('/', $host)[$num];
    $path = str_replace('.php', '', $path);

    if ($path == '' OR $path == 'index' OR $path == 'index.php') {
        $response = Controller::StartSite();
    }

    elseif($path == 'login.php' OR $path == 'login') {
        $response = Controller::loginAction();
    }

    elseif($path == 'register.php' OR $path == 'register') {
        $response = Controller::registerAction();
    }

    elseif($path == 'logout.php' OR $path == 'logout') {
        $response = Controller::logoutAction();
    }

    elseif($path == 'account.php' OR $path == 'account') {
        $response = Controller::accountAction();
    }

    elseif($path == 'accountEditForm.php' OR $path == 'accountEditForm') {
        $response = Controller::accountEditForm();
    }

    elseif($path == 'accountDeleteForm.php' OR $path == 'accountDeleteForm') {
        $response = Controller::accountDeleteForm();
    }

    elseif($path == 'appointment.php' OR $path == 'appointment') {
        $response = Controller::appointmentForm();
    }
    
        elseif($path == 'appointmentSuccess.php' OR $path == 'appointmentSuccess') {
            $response = Controller::appointmentSuccess();
        }
    
    elseif($path == 'getAvaiableTimes.php' OR $path == 'getAvaiableTimes') {
        $response = Controller::avaiableTimes();
    }

    else {
        $response = Controller::error404();
    }
?>