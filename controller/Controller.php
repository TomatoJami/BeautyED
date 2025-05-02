<?php

class Controller {

    public static function StartSite() {
        $arrTypes = modelServiceType::getAllServiceType();
        $arrTypeServices = [];

        foreach ($arrTypes as $type) {
            $id = $type['id'];
            $arrServices[$id] = modelServices::getAllServicesByType($id);
        }
    
        include_once 'view/start.php';
    }

    public static function loginAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $logIn = modelLogin::userAuthentication();
            if ($logIn) {
                include_once('view/start.php');
                return;
            }
            $_SESSION['errorString'] = 'Wrong name or password';
        } else {
            unset($_SESSION['errorString']);
        }
        include_once('view/formLogin.php');
    }

    public static function registerAction() {
        if (isset($_POST['save'])) {
            $test = modelRegister::userRegister();
            if ($test == true) {
                $successMessage = 'Registration successful!';
            } else {
                $errorMessage = 'Registration error or email is already taken';
            }
        }
        include_once('view/formRegister.php');
    }

    public static function logoutAction() {
        modelLogin::userLogout();
        include_once('view/start.php');
    }

    public static function error404() {
        include_once 'view/error404.php';
    }

    public static function accountAction() {
        $arr = modelAppointments::getAllAppointmentsForUser();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_appointment'])) {
            if (isset($_POST['appointment_id'])) {
                $id = $_POST['appointment_id'];
                $result = modelAppointments::deleteAppointment($id);
                header('Location: account');
                exit;
            }
        }
        include_once 'view/account.php';
    }

    public static function accountEditForm() {
        $result = modelAccount::editAccount();
        if (isset($_POST['save'])) {
            if ($result['result']) {
                $successMessage = 'Data changed!';
            } elseif (!empty($result['errorMessage'])) {
                $errorMessage = $result['errorMessage'];
            }
        }
        include_once 'view/accountEditForm.php';
    }   

    public static function accountDeleteForm() { 
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
            $result = modelAccount::deleteAccount();
        }
        include_once 'view/accountDeleteForm.php';
    } 

    public static function appointmentForm() {
        $arrMasters = modelUsers::getAllMasters();
        $arrServices = modelServices::getAllServices();
        if (isset($_POST['save'])) {
            $test = modelAppointments::addAppointment();
        }
        include_once 'view/appointment.php';
    }

    public static function appointmentSuccess() {
        include_once 'view/appointmentSuccess.php';
    }

    public static function avaiableTimes() {
        include_once 'view/getAvaiableTimes.php';
    }

    public static function feedbackForm() {
        if (isset($_POST['save'])) {
            modelReviews::addReview();
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
        $arr = modelReviews::getAllReviews();
        include_once 'view/feedback.php';
    }    
}