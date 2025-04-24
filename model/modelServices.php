<?php

class modelServices{
    public static function getAllServicesByType($id) {
        $query = "SELECT name, price FROM services WHERE service_type_id = $id";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllServices() {
        $query = "SELECT id as service_id, name, price FROM services";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}
?>