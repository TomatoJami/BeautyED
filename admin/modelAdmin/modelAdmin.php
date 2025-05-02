<?php

class modelAdmin{
    public static function userLogout() {
        unset($_SESSION['sessionId']);
        unset($_SESSION['userId']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['phone']);
        unset($_SESSION['role']);
        session_destroy();
        header("Location: /BeautyED");
        exit();
        return ;
    }

}
?>