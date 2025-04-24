<?php

class modelUsers{
    public static function getAllMasters() {
        $query = "SELECT masters.name AS master_name, masters.id as master_id FROM masters" ;
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}
?>