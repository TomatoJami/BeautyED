<?php

class modelAdminAppointments{
    public static function getAppointmentsList() {
        $query = "SELECT appointments.id as id, users.name as username, services.name as servicename, masters.name as mastername, dateTime FROM appointments JOIN users ON appointments.user_id = users.id JOIN services ON appointments.service_id = services.id JOIN masters ON appointments.master_id = masters.id ORDER BY `appointments`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getUsersList() {
        $sql = "SELECT users.id as user_id, users.name as username FROM users ORDER BY users.name ASC";
        $db = new Database();
        $rows = $db->getAll($sql);
        return $rows;
    }

    public static function getServicesList() {
        $sql = "SELECT services.id as service_id, services.name as service FROM services ORDER BY services.name ASC";
        $db = new Database();
        $rows = $db->getAll($sql);
        return $rows;
    }

    public static function getMastersList() {
        $sql = "SELECT masters.id as master_id, masters.name as master FROM masters ORDER BY masters.name ASC";
        $db = new Database();
        $rows = $db->getAll($sql);
        return $rows;
    }

    public static function getAppointmentsDetail($id) {
        $query = " SELECT appointments.id as id, users.name as username, services.name as service_name, masters.name as master_name, appointments.dateTime as dateTime, appointments.user_id as user_id, appointments.service_id as service_id, appointments.master_id as master_id FROM appointments JOIN users ON users.id = appointments.user_id JOIN services ON services.id = appointments.service_id JOIN masters on masters.id = appointments.master_id WHERE appointments.id=".$id;
        // SELECT appointments.id as id, users.name as username, services.name as service_name, masters.name as master_name, appointments.dateTime as dateTime FROM appointments
        // JOIN users ON users.id = appointments.user_id
        // JOIN services ON services.id = appointments.service_id
        // JOIN masters on masters.id = appointments.master_id
        // WHERE appointments.id = 10
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }

    public static function getAppointmentEdit($id) {
        $test = false;
        if(isset($_POST['save'])) {
            if (isset($_POST['idService']) && isset($_POST['idMaster']) && isset($_POST['dateTime'])) {
                $idService = $_POST['idService'];
                $idMaster = $_POST['idMaster'];
                $dateTime = $_POST['dateTime'];

                $sql="UPDATE `appointments` SET `service_id` = '$idService', `master_id` = '$idMaster', `dateTime` = '$dateTime' WHERE `appointments`.`id` = ".$id;

                $db = new Database();
                $item = $db->executeRun($sql);
                if($item == true) {
                    $test = true;
                }
            }
        }
        return $test;
    }

    public static function getAppointmentDelete($id) {
        $test = false;
        $db = new Database();
        $sql = "DELETE FROM `appointments` WHERE `id` = $id";
        if ($db->executeRun($sql)) {
            $test = true;
        }
        return $test;
    }

    public static function getAppointmentAdd() {
        $test = false;
        if (isset($_POST['save'])) {
            if (isset($_POST['idUser']) && isset($_POST['idService']) && isset($_POST['idMaster']) && isset($_POST['date']) && isset($_POST['time'])) {
                $idUser= $_POST['idUser'];
                $idService = $_POST['idService'];
                $idMaster = $_POST['idMaster'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $dateTime = $date . ' ' . $time . ':00'; 

                $sql = "INSERT INTO `appointments` (`id`, `user_id`, `service_id`, `master_id`, `dateTime`) VALUES(NULL, '$idUser', '$idService', '$idMaster', '$dateTime')";

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