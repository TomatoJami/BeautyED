<?php

class controllerAdmin {
    public static function adminPanel() {
        include_once('viewAdmin/adminPanel.php');
    }

    public static function error404() {
        include_once('viewAdmin/error404.php');
    }

    public static function logoutAction() {
        modelAdmin::userLogout();
        include_once('/BeautyED');
    }

}
?>