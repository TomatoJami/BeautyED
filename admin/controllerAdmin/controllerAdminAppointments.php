<?php

class controllerAdminAppointments {
    public static function AppointmentsList() {
        $arr = modelAdminAppointments::getAppointmentsList();
        include_once ('viewAdmin/appointmentsList.php');
    }

    public static function appointmentEditForm($id) {
        $arr_users = modelAdminAppointments::getUsersList();
        $arr_services = modelAdminAppointments::getServicesList();
        $arr_masters = modelAdminAppointments::getMastersList();
        $detail = modelAdminAppointments::getAppointmentsDetail($id);
        include_once('viewAdmin/appointmentEditForm.php');
    }

    public static function appointmentEditResult($id) {
        $test = modelAdminAppointments::getAppointmentEdit($id);
        include_once('viewAdmin/appointmentEditForm.php');
    }

    public static function appointmentDeleteForm($id) {
        $arr_users = modelAdminAppointments::getUsersList();
        $arr_services = modelAdminAppointments::getServicesList();
        $arr_masters = modelAdminAppointments::getMastersList();
        $detail = modelAdminAppointments::getAppointmentsDetail($id);
        include_once('viewAdmin/appointmentDeleteForm.php');
    }

    public static function appointmentDeleteResult($id) {
        $test = modelAdminAppointments::getAppointmentDelete($id);
        include_once('viewAdmin/appointmentDeleteForm.php');
    }

    public static function appointmentAddForm() {
        $arr_users = modelAdminAppointments::getUsersList();
        $arr_services = modelAdminAppointments::getServicesList();
        $arr_masters = modelAdminAppointments::getMastersList();
        include_once ('viewAdmin/appointmentAddForm.php');
    }

    public static function appointmentAddResult() {
        $test = modelAdminAppointments::getAppointmentAdd();
        include_once ('viewAdmin/appointmentAddForm.php');
    }

}
?>