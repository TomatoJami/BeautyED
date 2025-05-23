<?php
    $host = explode('?', $_SERVER['REQUEST_URI'])[0];
    $num = substr_count($host, '/');
    $path = explode('/', $host)[$num];
    $path = str_replace('.php', '', $path);
    $logIn = modelLogin::userAuthentication();

    
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
        if ($logIn == true) {
            $response = Controller::accountAction();
        } else {
            $response = Controller::loginAction();
        }
    }

    elseif($path == 'accountEditForm.php' OR $path == 'accountEditForm') {
        if ($logIn == true) {
            $response = Controller::accountEditForm();
        } else {
            $response = Controller::loginAction();
        }
    }

    elseif($path == 'accountDeleteForm.php' OR $path == 'accountDeleteForm') {
        if ($logIn == true) {
            $response = Controller::accountDeleteForm();
        } else {
            $response = Controller::loginAction();
        }
    }

    elseif($path == 'appointment.php' OR $path == 'appointment') {
        if ($logIn == true) {
            $response = Controller::appointmentForm();
        } else {
            $response = Controller::loginAction();
        }
    }
    
        elseif($path == 'appointmentSuccess.php' OR $path == 'appointmentSuccess') {
            $response = Controller::appointmentSuccess();
        }
    
    elseif($path == 'getAvaiableTimes.php' OR $path == 'getAvaiableTimes') {
        $response = Controller::avaiableTimes();
    }

    elseif($path == 'feedback.php' OR $path == 'feedback') {
        $response = Controller::feedbackForm();
    }

    else {
        $response = Controller::error404();
    }
?>