<?php

class controllerAdminMasters {
    public static function MastersList() {
        $arr = modelAdminMasters::getMastersList();
        include_once ('viewAdmin/mastersList.php');
    }

    public static function masterEditForm($id) {
        $detail = modelAdminMasters::getMastersDetail($id);
        include_once('viewAdmin/masterEditForm.php');
    }

    public static function masterEditResult($id) {
        $test = modelAdminMasters::getMasterEdit($id);
        include_once('viewAdmin/masterEditForm.php');
    }

    public static function masterDeleteForm($id) {
        $detail = modelAdminMasters::getMastersDetail($id);
        include_once('viewAdmin/masterDeleteForm.php');
    }

    public static function masterDeleteResult($id) {
        $test = modelAdminMasters::getMasterDelete($id);
        include_once('viewAdmin/masterDeleteForm.php');
    }

    public static function masterAddForm() {
        include_once ('viewAdmin/masterAddForm.php');
    }

    public static function masterAddResult() {
        $test = modelAdminMasters::getMasterAdd();
        include_once ('viewAdmin/masterAddForm.php');
    }
}
?>