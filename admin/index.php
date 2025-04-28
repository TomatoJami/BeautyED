<?php
session_start();
require_once '../inc/database.php';

include_once ("modelAdmin/modelAdmin.php");
include_once ("modelAdmin/modelAdminServices.php");
include_once ("modelAdmin/modelAdminMasters.php");
include_once ("modelAdmin/modelAdminAppointments.php");

include_once ("controllerAdmin/controllerAdmin.php");
include_once ("controllerAdmin/controllerAdminServices.php");
include_once ("controllerAdmin/controllerAdminMasters.php");
include_once ("controllerAdmin/controllerAdminAppointments.php");

include('routeAdmin/routingAdmin.php');

echo $response;
?>