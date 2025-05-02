<?php

class modelAdminMasters{
    public static function getMastersList() {
        $query = "SELECT masters.id as id, masters.name as name FROM masters ORDER BY `masters`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getMastersDetail($id) {
        $query = "SELECT masters.name as name, masters.id as id FROM masters WHERE masters.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }

    public static function getMasterEdit($id) {
        $test = false;
        if(isset($_POST['save'])) {
            if (isset($_POST['name'])) {
                $name = $_POST['name'];

                $sql="UPDATE `masters` SET `name` = '$name' WHERE `masters`.`id` = ".$id;

                $db = new Database();
                $item = $db->executeRun($sql);
                if($item == true) {
                    $test = true;
                }
            }
        }
        return $test;
    }

    public static function getMasterDelete($id) {
        $test = false;
        $sql_appointments = "DELETE FROM `appointments` WHERE `master_id` = $id";
        $db = new Database();
        $db->executeRun($sql_appointments);
        $sql_masters = "DELETE FROM `masters` WHERE `id` = $id";
        if ($db->executeRun($sql_masters)) {
            $test = true;
        }
        return $test;
    }

    public static function getMasterAdd() {
        $test = false;
        if (isset($_POST['save'])) {
            if (isset($_POST['name'])) {

                $name = $_POST['name'];

                $sql = "INSERT INTO `masters` (`id`, `name`) VALUES(NULL, '$name')";

                $db = new Database();
                $item = $db->executeRun($sql);

                if ($item == true) {
                    $test=true;
                }
            }
        }
        return $test;
    }
}
?>