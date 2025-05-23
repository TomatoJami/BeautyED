<?php

class modelReviews{
    // public static function getAllAppointmentsForUser() {
    //     $id = $_SESSION['userId'];
    //     $query = "SELECT appointments.id AS appointment_id, services.id as service_id, masters.id as master_id, services.name AS service_name, masters.name AS master_name, appointments.dateTime FROM appointments LEFT JOIN services ON appointments.service_id = services.id LEFT JOIN masters ON appointments.master_id = masters.id WHERE appointments.user_id = $id ORDER BY appointments.dateTime DESC;" ;
    //     $db = new Database();
    //     $arr = $db->getAll($query);
    //     return $arr;
    // }

    public static function getAllReviews() {
        $query = "SELECT reviews.id AS review_id, reviews.comment AS comment, users.name AS username FROM reviews LEFT JOIN users ON reviews.user_id = users.id ORDER BY reviews.id DESC;";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function addReview() {
        $test = false;
        if (isset($_POST['save'])) {
            if (isset($_POST['comment'])) {
                $userId = $_SESSION['userId'];
                $comment = $_POST['comment'];

                $db = new Database();
                $db->connect();
    
                $sql = "INSERT INTO `reviews` (`user_id`, `comment`) 
                        VALUES ('$userId', '$comment')";
    
                if ($db->executeRun($sql)) {
                    $test = true;
                } else {
                    echo "Error";
                }
            }
        }
        return $test;
    }
    
}
?>