<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/dao/UserDao.class.php';
require_once __DIR__.'/dao/TutorDao.class.php';
require_once __DIR__.'/services/UserService.php';
require_once __DIR__.'/services/TutorService.php';

Flight::register('userDao', 'UserDao');
Flight::register('tutorDao', 'TutorDao');
Flight::register('userService', 'UserService');
Flight::register('tutorService', 'TutorService');

require_once __DIR__.'/routes/userRoutes.php';
require_once __DIR__.'/routes/tutorRoutes.php';

Flight::start();

?>
