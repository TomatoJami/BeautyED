<?php

class modelAppointments{
    public static function getAllAppointmentsForUser() {
        $id = $_SESSION['userId'];
        $query = "SELECT appointments.id AS appointment_id, services.id as service_id, masters.id as master_id, services.name AS service_name, masters.name AS master_name, appointments.dateTime FROM appointments LEFT JOIN services ON appointments.service_id = services.id LEFT JOIN masters ON appointments.master_id = masters.id WHERE appointments.user_id = $id ORDER BY appointments.dateTime DESC;" ;
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

    public static function addAppointment() {
        $test = false;
        if (isset($_POST['save'])) {
            if (isset($_POST['master_id']) && isset($_POST['appointment_date']) && isset($_POST['appointment_time']) && isset($_POST['service_id'])) {
    
                $userId = $_SESSION['userId'];
                $service_id = $_POST['service_id'];
                $master_id = $_POST['master_id'];
                $date = $_POST['appointment_date'];
                $time = $_POST['appointment_time'];
                $dateTime = $date . ' ' . $time . ':00'; 
    
                $db = new Database();
                $db->connect();
    
                $sql = "INSERT INTO `appointments` (`user_id`, `service_id`, `master_id`, `dateTime`) 
                        VALUES ('$userId', '$service_id', '$master_id', '$dateTime')";

                if ($db->executeRun($sql)) {
                    $test = true;
                    header("Location: appointmentSuccess.php");
                    exit();
                } else {
                    echo "Ошибка выполнения запроса.";
                }
            }
        }
        return $test;
    }
    
}
?>