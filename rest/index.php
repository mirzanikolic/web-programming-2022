<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once 'dao/UserDao.class.php';
require_once 'dao/TutorDao.class.php';
require_once 'services/UserService.php';
require_once 'services/TutorService.php';

Flight::register('userService', 'UserService');
Flight::register('tutorService', 'TutorService');

require_once __DIR__.'/routes/userRoutes.php';
require_once __DIR__.'/routes/tutorRoutes.php';

Flight::start();

?>
