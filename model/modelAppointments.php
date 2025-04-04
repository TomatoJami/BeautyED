<?php

class modelAppointments{
    public static function getAllAppointmentsForUser() {
        $id = $_SESSION['userId'];
        $query = "SELECT appointments.id AS appointment_id, services.name AS service_name, statuses.name AS status_name, appointments.dateTime FROM appointments LEFT JOIN services ON appointments.service_id = services.id LEFT JOIN statuses ON appointments.status_id = statuses.id WHERE appointments.user_id = $id ORDER BY appointments.dateTime DESC;" ;
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function deleteAppointment($id) {
        $result = false;
           
        $sql = "DELETE FROM `appointments` WHERE `id` = $id";
        
        $db = new Database();
    
        if ($db->executeRun($sql)) {
            $result = true;
        }
        
        return $result;
    }
}
?>