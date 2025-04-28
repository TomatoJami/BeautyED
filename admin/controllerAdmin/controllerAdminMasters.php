<?php

class controllerAdminMasters {
    public static function MastersList() {
        $arr = modelAdminMasters::getMastersList();
        include_once ('viewAdmin/MastersList.php');
    }

}
?>