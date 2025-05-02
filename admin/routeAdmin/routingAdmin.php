<?php

    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header('Location: /BeautyED/');
        exit();
    }

    $host = explode('?', $_SERVER['REQUEST_URI'])[0];
    $host = str_replace('/BeautyED', '', $host);
    $num = substr_count($host, '/');
    $path = explode('/', $host)[$num];
    $path = str_replace('.php', '', $path);

    if ($path == '' OR $path == 'index' OR $path == 'index.php') {
        $response = controllerAdmin::adminPanel();
    }

    elseif($path == 'logout.php' OR $path == 'logout') {
        $response = controllerAdmin::logoutAction();
    }

    elseif($path == 'servicesList.php' OR $path == 'servicesList') {
        $response = controllerAdminServices::servicesList();
    }

        elseif($path == 'serviceEdit.php' OR $path == 'serviceEdit' && isset($_GET['id'])) {
            $response = controllerAdminServices::serviceEditForm($_GET['id']);
        }

            elseif($path == 'serviceEditResult.php' OR $path == 'serviceEditResult' && isset($_GET['id'])) {
                $response = controllerAdminServices::serviceEditResult($_GET['id']);
            }

        elseif($path == 'serviceDelete.php' OR $path == 'serviceDelete' && isset($_GET['id'])) {
            $response = controllerAdminServices::serviceDeleteForm($_GET['id']);
        }

            elseif($path == 'serviceDeleteResult.php' OR $path == 'serviceDeleteResult' && isset($_GET['id'])) {
                $response = controllerAdminServices::serviceDeleteResult($_GET['id']);
            }

        elseif($path == 'serviceAdd.php' OR $path == 'serviceAdd') {
            $response = controllerAdminServices::serviceAddForm();
        }

            elseif($path == 'serviceAddResult.php' OR $path == 'serviceAddResult') {
                $response = controllerAdminServices::serviceAddResult();
            }
        
    elseif($path == 'mastersList.php' OR $path == 'mastersList') {
        $response = controllerAdminMasters::mastersList();
    }

        elseif($path == 'masterEdit.php' OR $path == 'masterEdit' && isset($_GET['id'])) {
            $response = controllerAdminMasters::masterEditForm($_GET['id']);
        }

            elseif($path == 'masterEditResult.php' OR $path == 'masterEditResult' && isset($_GET['id'])) {
                $response = controllerAdminMasters::masterEditResult($_GET['id']);
            }

        elseif($path == 'masterDelete.php' OR $path == 'masterDelete' && isset($_GET['id'])) {
            $response = controllerAdminMasters::masterDeleteForm($_GET['id']);
        }

            elseif($path == 'masterDeleteResult.php' OR $path == 'masterDeleteResult' && isset($_GET['id'])) {
                $response = controllerAdminMasters::masterDeleteResult($_GET['id']);
            }

        elseif($path == 'masterAdd.php' OR $path == 'masterAdd') {
            $response = controllerAdminMasters::masterAddForm();
        }

            elseif($path == 'masterAddResult.php' OR $path == 'masterAddResult') {
                $response = controllerAdminMasters::masterAddResult();
            }

    elseif($path == 'appointmentsList.php' OR $path == 'appointmentsList') {
        $response = controllerAdminAppointments::appointmentsList();
    }

        elseif($path == 'appointmentEdit.php' OR $path == 'appointmentEdit' && isset($_GET['id'])) {
            $response = controllerAdminAppointments::appointmentEditForm($_GET['id']);
        }

            elseif($path == 'appointmentEditResult.php' OR $path == 'appointmentEditResult' && isset($_GET['id'])) {
                $response = controllerAdminAppointments::appointmentEditResult($_GET['id']);
            }

        elseif($path == 'appointmentDelete.php' OR $path == 'appointmentDelete' && isset($_GET['id'])) {
            $response = controllerAdminAppointments::appointmentDeleteForm($_GET['id']);
        }

            elseif($path == 'appointmentDeleteResult.php' OR $path == 'appointmentDeleteResult' && isset($_GET['id'])) {
                $response = controllerAdminAppointments::appointmentDeleteResult($_GET['id']);
            }   

        elseif($path == 'appointmentAdd.php' OR $path == 'appointmentAdd') {
            $response = controllerAdminAppointments::appointmentAddForm();
        }

            elseif($path == 'appointmentAddResult.php' OR $path == 'appointmentAddResult') {
                $response = controllerAdminAppointments::appointmentAddResult();
            }

    else {
        $response = controllerAdmin::error404();
    }

?>