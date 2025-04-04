<?php

class modelAccount{
    public static function editAccount() {
        $result = false;
        $errorMessage = '';
    
        if (isset($_POST['save'])) {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                
                $userId = $_SESSION['userId'];
                $db = new Database();
    
                $checkEmailSql = "SELECT COUNT(*) as count FROM `users` WHERE `email` = :email AND `id` != :userId";
                $stmt = $db->connect()->prepare($checkEmailSql);
                $stmt->execute(['email' => $email, 'userId' => $userId]);
                $emailCheckResult = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($emailCheckResult && $emailCheckResult['count'] > 0) {
                    $errorMessage = 'This email is already taken!';
                } else {
                    $sql = "UPDATE `users` SET `name` = :name, `email` = :email, `phone` = :phone WHERE `id` = :userId";
                    $stmt = $db->connect()->prepare($sql);
                    $item = $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'userId' => $userId]);
    
                    if ($item) {
                        $_SESSION['name'] = $name;
                        $_SESSION['email'] = $email;
                        $_SESSION['phone'] = $phone;
                        $result = true;
                    }
                }
            }
        }
    
        return ['result' => $result, 'errorMessage' => $errorMessage];
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