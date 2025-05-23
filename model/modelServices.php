<?php

class modelServices{
    public static function getAllEngServicesByType($id) {
        $query = "SELECT eng_name as name, price FROM services WHERE service_type_id = $id";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllRusServicesByType($id) {
        $query = "SELECT rus_name as name, price FROM services WHERE service_type_id = $id";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllEngServices() {
        $query = "SELECT id as service_id, eng_name as name, price FROM services";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllRusServices() {
        $query = "SELECT id as service_id, rus_name as name, price FROM services";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}
?>