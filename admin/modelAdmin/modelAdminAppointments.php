<?php

class modelAdminAppointments{
    public static function getAppointmentsList() {
        $query = "SELECT appointments.id as id, users.name as username, services.name as servicename, masters.name as mastername, dateTime FROM appointments JOIN users ON appointments.user_id = users.id JOIN services ON appointments.service_id = services.id JOIN masters ON appointments.master_id = masters.id ORDER BY `appointments`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

}
?>