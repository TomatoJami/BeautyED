<?php
session_start();
include_once 'inc/Database.php';
include_once 'inc/lang.php';

include_once 'model/modelLogin.php';
include_once 'model/modelRegister.php';
include_once 'model/modelAccount.php';
include_once 'model/modelAppointments.php';
include_once 'model/modelServiceType.php';
include_once 'model/modelServices.php';
include_once 'model/modelUsers.php';
include_once 'model/modelReviews.php';

include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;
?>