<?php

class modelAccount{
    public static function editAccount() {
        $result = false;
        if (isset($_POST['save'])) {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                
                $userId = $_SESSION['userId'];

                $db = new Database();

                $sql = "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone' WHERE `id` = $userId";
                
                $item = $db->executeRun($sql);

                if ($item) {
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['phone'] = $phone;

                    $result = true;
                }
            }
        }

        return $result;
    }

    public static function deleteAccount() {
        $result = false;
    
        $id = $_SESSION['userId'];
        
        $sql_appointments = "DELETE FROM `appointments` WHERE `user_id` = $id";
        $sql_reviews = "DELETE FROM `reviews` WHERE `user_id` = $id";
        
        $db = new Database();
        $db->executeRun($sql_appointments);
        $db->executeRun($sql_reviews);
        
        $sql = "DELETE FROM `users` WHERE `id` = $id";
        if ($db->executeRun($sql)) {
            $result = true;
            modelLogin::userLogout();
        }
        
        return $result;
    }

}
?>