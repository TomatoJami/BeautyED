<?php

class modelServiceType{
    public static function getAllServiceType() {
        $query = "SELECT id, type FROM service_type";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}
?>