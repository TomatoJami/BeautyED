<?php

class Controller {

    public static function StartSite() {
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

    public static function logoutAction() {
        modelLogin::userLogout();
        include_once('view/start.php');
    }

    public static function error404() {
        include_once 'view/error404.php';
    }
}