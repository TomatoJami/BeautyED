<?php

class modelAdminMasters{
    public static function getMastersList() {
        $query = "SELECT masters.id as id, masters.eng_name as name FROM masters ORDER BY `masters`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getMastersDetail($id) {
        $query = "SELECT masters.eng_name as eng_name, masters.rus_name as rus_name, masters.id as id FROM masters WHERE masters.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }

    public static function getMasterEdit($id) {
        $test = false;
        if(isset($_POST['save'])) {
            if (isset($_POST['eng_name']) && isset($_POST['rus_name'])) {
                $eng_name = $_POST['eng_name'];
                $rus_name = $_POST['rus_name'];

                $sql="UPDATE `masters` SET `eng_name` = '$eng_name', `rus_name` = '$rus_name' WHERE `masters`.`id` = ".$id;

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
            if (isset($_POST['eng_name']) && isset($_POST['rus_name'])) {
                $eng_name = $_POST['eng_name'];
                $rus_name = $_POST['rus_name'];

                $sql = "INSERT INTO `masters` (`id`, `eng_name`, `rus_name`) VALUES(NULL, '$eng_name', '$rus_name')";

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