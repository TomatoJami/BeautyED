<?php

class Controller {
    public static function StartSite() {
        global $t; 
        $lang = $GLOBALS['lang'];
        if ($lang == 'en') {
            $arrTypes = modelServiceType::getAllEngServiceType();
        } else {
            $arrTypes = modelServiceType::getAllRusServiceType();
        }
    
        $arrTypeServices = [];
    
        foreach ($arrTypes as $type) {
            $id = $type['id'];
            if ($lang == 'en') {
                $arrServices[$id] = modelServices::getAllEngServicesByType($id);
            } else {
                $arrServices[$id] = modelServices::getAllRusServicesByType($id);
            }
        }
        include_once 'view/start.php';
    }

    public static function loginAction() {
        global $t;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $logIn = modelLogin::userAuthentication();
            if ($logIn) {
                include_once('view/start.php');
                return;
            }
            $_SESSION['errorString'] = $t['loginFailure'];
        } else {
            unset($_SESSION['errorString']);
        }
        include_once('view/formLogin.php');
    }

    public static function registerAction() {
        global $t;
        if (isset($_POST['save'])) {
            $test = modelRegister::userRegister();
            if ($test == true) {
                $successMessage = $t['regSuccess'];
            } else {
                $errorMessage = $t['regFailure'];
            }
        }
        include_once('view/formRegister.php');
    }

    public static function logoutAction() {
        modelLogin::userLogout();
        include_once('view/start.php');
    }

    public static function error404() {
        global $t;
        include_once 'view/error404.php';
    }

    public static function accountAction() {
        global $t; 
        $lang = $GLOBALS['lang'];
        if ($lang == 'en') {
            $arr = modelAppointments::getAllEngAppointmentsForUser();
        } else {
            $arr = modelAppointments::getAllRusAppointmentsForUser();
        }
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
        global $t; 
        $result = modelAccount::editAccount();
        if (isset($_POST['save'])) {
            if ($result['result']) {
                $successMessage = $t['changeDataSuccess'];
            } elseif (!empty($result['errorMessage'])) {
                $errorMessage = $result['errorMessage'];
            }
        }
        include_once 'view/accountEditForm.php';
    }   

    public static function accountDeleteForm() { 
        global $t; 
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
            $result = modelAccount::deleteAccount();
        }
        include_once 'view/accountDeleteForm.php';
    } 

    public static function appointmentForm() {
        global $t; 
        $lang = $GLOBALS['lang'];
        if ($lang == 'en') {
            $arrMasters = modelUsers::getAllEngMasters();
            $arrServices = modelServices::getAllEngServices();
        } else {
            $arrMasters = modelUsers::getAllRusMasters();
            $arrServices = modelServices::getAllRusServices();
        }
        if (isset($_POST['save'])) {
            $test = modelAppointments::addAppointment();
        }
        include_once 'view/appointment.php';
    }

    public static function appointmentSuccess() {
        global $t;
        include_once 'view/appointmentSuccess.php';
    }

    public static function avaiableTimes() {
        include_once 'view/getAvaiableTimes.php';
    }

    public static function feedbackForm() {
        global $t; 
        if (isset($_POST['save'])) {
            modelReviews::addReview();
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
        $arr = modelReviews::getAllReviews();
        include_once 'view/feedback.php';
    }    
}