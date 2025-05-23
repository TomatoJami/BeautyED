<?php

class modelUsers{
    public static function getAllEngMasters() {
        $query = "SELECT masters.eng_name AS master_name, masters.id as master_id FROM masters" ;
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllRusMasters() {
        $query = "SELECT masters.rus_name AS master_name, masters.id as master_id FROM masters" ;
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}
?>