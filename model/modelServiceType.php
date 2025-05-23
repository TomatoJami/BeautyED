<?php

class modelServiceType{
    public static function getAllEngServiceType() {
        $query = "SELECT id, eng_type as type FROM service_type";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllRusServiceType() {
        $query = "SELECT id, rus_type as type FROM service_type";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}
?>