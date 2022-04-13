<?php
//Routes for users

//List all users
Flight::route('GET /users', function(){
  Flight::json(Flight::userService()->get_all());
});

//List one user
Flight::route('GET /users/@id', function($id){
  Flight::json(Flight::userService()->get_by_id($id));
});

//Add user
Flight::route('POST /users', function(){
  Flight::json(Flight::userService()->add(Flight::request()->data->getData()));
});

//Update user
Flight::route('PUT /users/@id', function($id){
  $data = Flight::request()->data->getData();
  $data['id'] = $id;
  Flight::json(Flight::userService()->update($data));
});

//Delete user
Flight::route('DELETE /users/@id', function($id){
  Flight::userService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

 ?>
