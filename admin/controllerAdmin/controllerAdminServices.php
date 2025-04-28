<?php

class controllerAdminServices {
    public static function servicesList() {
        $arr = modelAdminServices::getServicesList();
        include_once ('viewAdmin/servicesList.php');
    }

    public static function serviceEditForm($id) {
        $arr = modelAdminServices::getServiceTypesList();
        $detail = modelAdminServices::getServicesDetail($id);
        include_once('viewAdmin/serviceEditForm.php');
    }

    public static function serviceEditResult($id) {
        $test = modelAdminServices::getServiceEdit($id);
        include_once('viewAdmin/serviceEditForm.php');
    }

    public static function serviceDeleteForm($id) {
        $arr = modelAdminServices::getServiceTypesList();
        $detail = modelAdminServices::getServicesDetail($id);
        include_once('viewAdmin/serviceDeleteForm.php');
    }

    public static function serviceDeleteResult($id) {
        $test = modelAdminServices::getServiceDelete($id);
        include_once('viewAdmin/ServiceDeleteForm.php');
    }

    public static function serviceAddForm() {
        $arr = modelAdminServices::getServiceTypesList();
        include_once ('viewAdmin/serviceAddForm.php');
    }

    public static function serviceAddResult() {
        $test = modelAdminServices::getServiceAdd();
        include_once ('viewAdmin/serviceAddForm.php');
    }
}
?>