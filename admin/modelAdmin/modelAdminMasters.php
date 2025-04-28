<?php

class modelAdminMasters{
    public static function getMastersList() {
        $query = "SELECT masters.id as id, masters.name as name FROM masters ORDER BY `masters`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}
?>