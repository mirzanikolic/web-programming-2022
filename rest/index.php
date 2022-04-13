<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../vendor/autoload.php';
require_once 'dao/UserDao.class.php';

require_once 'services/UserService.php';

Flight::register('userService', 'UserService');

require_once __DIR__.'/routes/userRoutes.php';

Flight::start();

?>
