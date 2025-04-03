<?php
session_start();
include_once 'inc/Database.php';

include_once 'model/modelLogin.php';
include_once 'model/modelRegister.php';
include_once 'model/modelAccount.php';

include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;
?>