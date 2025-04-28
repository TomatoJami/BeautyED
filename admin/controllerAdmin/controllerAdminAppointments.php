<?php

class controllerAdminAppointments {
    public static function AppointmentsList() {
        $arr = modelAdminAppointments::getAppointmentsList();
        include_once ('viewAdmin/appointmentsList.php');
    }

}
?>