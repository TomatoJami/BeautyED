<?php
class modelRegister {
    public static function userRegister() {
        $test = false;
        if (isset($_POST['save'])) {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])) {

                $name = $_POST['name'];
                $email = strtolower($_POST['email']);
                $phone = $_POST['phone'];
                $PASS = $_POST['password'];
                $password = password_hash($PASS, PASSWORD_DEFAULT);

                $db = new Database();
                $checkEmail = $db->getOne("SELECT * FROM `users` WHERE `email` = '$email'");

                if ($checkEmail) {
                    return false;
                }

                $sql = "INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `PASS`) 
                        VALUES (NULL, '$name', '$email', '$phone', '$password', 'customer', '$PASS')";
                
                $item = $db->executeRun($sql);

                if ($item !== false) {
                    $test = true;
                }
            }
        }
        return $test;
    }
}
