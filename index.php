<?php
require 'vendor/autoload.php';




reuqire_once("rest/dao/")

Flight::route('/', function(){
  echo "Hello world!";
});

Flight::start();

?>
