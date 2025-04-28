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

    public static function getAvaiableTimes() {
        if (isset($_GET['master_id']) && isset($_GET['date'])) {
            $master_id = intval($_GET['master_id']);
            $date = $_GET['date'];
    
            $db = new Database();
            $db->connect();
    
            $sql = "SELECT DATE_FORMAT(dateTime, '%H:%i') as time FROM appointments WHERE master_id = $master_id AND DATE(dateTime) = '$date'";
            $bookedTimes = $db->getAll($sql);
    
            $booked = array_map(function($row) {
                return $row['time'];
            }, $bookedTimes);
    
            $booked = array_unique($booked);
    
            $start_hour = 10;
            $end_hour = 19;
            $allTimes = [];
    
            for ($hour = $start_hour; $hour <= $end_hour; $hour++) {
                foreach ([0, 30] as $minute) {
                    $time = sprintf("%02d:%02d", $hour, $minute);
                    $allTimes[] = $time;
                }
            }
    
            $availableTimes = array_diff($allTimes, $booked);
    
            echo json_encode(array_values($availableTimes));
            exit();
        }
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
    
                $currentDateTime = date('Y-m-d H:i:s');
                if ($dateTime < $currentDateTime) {
                    echo "<script>alert('The selected appointment time is in the past. Please choose a future time.'); window.history.back();</script>";
                    exit();
                }
    
                $db = new Database();
                $db->connect();
    
                $sqlCheck = "SELECT COUNT(*) AS cnt FROM `appointments` WHERE `master_id` = '$master_id' AND `dateTime` = '$dateTime'";
                $result = $db->getOne($sqlCheck);
    
                if ($result['cnt'] > 0) {
                    echo "<script>alert('Master is already booked for this time. Please choose another time.'); window.history.back();</script>";
                    exit();
                }
    
                $sql = "INSERT INTO `appointments` (`user_id`, `service_id`, `master_id`, `dateTime`) 
                        VALUES ('$userId', '$service_id', '$master_id', '$dateTime')";
    
                if ($db->executeRun($sql)) {
                    $test = true;
                    header("Location: appointmentSuccess.php");
                    exit();
                } else {
                    echo "Error";
                }
            }
        }
        return $test;
    }
    
}
?>