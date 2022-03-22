<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'dao/ProjectDao.class.php';
require_once '../vendor/autoload.php';

Flight::register('ProjectDao', 'ProjectDao');

//List all users
Flight::route('GET /users', function(){
  Flight::json(Flight::ProjectDao()->getAll());
});

//List one user
Flight::route('GET /users/@id', function($id){
  Flight::json(Flight::ProjectDao()->getOne($id));
});

//Add user
Flight::route('POST /users', function(){
  Flight::json(Flight::ProjectDao()->addUser(Flight::request()->data->getData()));
});

//Update user
Flight::route('PUT /users/@id', function($id){
  $data = Flight::request()->data->getData();
  $data['id'] = $id;
  Flight::json(Flight::todoDao()->update($data));
});

/**
* Delete user
*/
Flight::route('DELETE /users/@id', function($id){
  Flight::todoDao()->delete($id);
  Flight::json(["message" => "deleted"]);
});

Flight::start();

 ?>
