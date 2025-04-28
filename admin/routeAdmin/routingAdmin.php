<?php
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

            elseif($path == 'serviceDeleteResult.php' OR $path == 'serviceDeleteResult') {
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

    elseif($path == 'appointmentsList.php' OR $path == 'appointmentsList') {
        $response = controllerAdminAppointments::appointmentsList();
    }

    else {
        $response = controllerAdmin::error404();
    }

?>