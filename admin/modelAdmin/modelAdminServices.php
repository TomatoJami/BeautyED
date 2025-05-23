<?php

class modelAdminServices{
    public static function getServicesList() {
        $query = "SELECT services.id as id, services.eng_name as name, services.eng_description as description, services.price as price, service_type.eng_type as type FROM services JOIN service_type ON services.service_type_id = service_type.id ORDER BY `services`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getServiceTypesList() {
        $sql = "SELECT * FROM service_type ORDER BY service_type.eng_type ASC";
        $db = new Database();
        $rows = $db->getAll($sql);
        return $rows;
    }

    public static function getServicesDetail($id) {
        $query = "SELECT services.eng_name as eng_name, services.rus_name as rus_name, services.eng_description as eng_description, services.rus_description as rus_description, services.price as price, service_type.eng_type as type, service_type.id as service_type_id FROM services, service_type WHERE services.service_type_id = service_type.id AND services.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }

    public static function getServiceEdit($id) {
        $test = false;
        if(isset($_POST['save'])) {
            if (isset($_POST['eng_name']) && isset($_POST['rus_name']) && isset($_POST['eng_description']) && isset($_POST['rus_description']) && isset($_POST['price']) && isset($_POST['idServiceType'])) {
                $eng_name = $_POST['eng_name'];
                $rus_name = $_POST['rus_name'];
                $eng_description = $_POST['eng_description'];
                $rus_description = $_POST['rus_description'];
                $price = $_POST['price'];
                $idServiceType = $_POST['idServiceType'];

                $sql="UPDATE `services` SET `eng_name` = '$eng_name', `rus_name` = '$rus_name', `eng_description` = '$eng_description', `rus_description` = '$rus_description', `price` = '$price', `service_type_id` = '$idServiceType' WHERE `services`.`id` = ".$id;

                $db = new Database();
                $item = $db->executeRun($sql);
                if($item == true) {
                    $test = true;
                }
            }
        }
        return $test;
    }

    public static function getServiceDelete($id) {
        $test = false;
        $db = new Database();
        $sql = "DELETE FROM `services` WHERE `id` = $id";
        if ($db->executeRun($sql)) {
            $test = true;
        }
        return $test;
    }

    public static function getServiceAdd() {
        $test = false;
        if (isset($_POST['save'])) {
            if (isset($_POST['eng_name']) && isset($_POST['rus_name']) && isset($_POST['eng_description']) && isset($_POST['rus_description']) && isset($_POST['price']) && isset($_POST['idServiceType'])) {

                $eng_name = $_POST['eng_name'];
                $rus_name = $_POST['rus_name'];
                $eng_description = $_POST['eng_description'];
                $rus_description = $_POST['rus_description'];
                $price = $_POST['price'];
                $idServiceType=$_POST['idServiceType'];

                $sql = "INSERT INTO `services` (`id`, `eng_name`, `rus_name`, `eng_description`, `rus_description`, `price`, `service_type_id`) VALUES(NULL, '$eng_name', '$rus_name', '$eng_description', '$rus_description', '$price', '$idServiceType')";

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