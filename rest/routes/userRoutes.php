<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

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
  Flight::json(Flight::userService()->update($id, $data));
});

//Delete user
Flight::route('DELETE /users/@id', function($id){
  Flight::userService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

//Login user
Flight::route('POST /users/login', function(){
  $login = Flight::request()->data->getData();
  $user = Flight::userDao()->get_user_by_email($login['email']);
  if(isset($user['id'])){
    if($user['password'] == $login['password']){
      $jwt = JWT::encode($user, Config::JWT_SECRET(), 'HS256');
      Flight::json(["token" => $jwt]);
    }
    else{
      Flight::json(["message" => "Password incorrect"], 404);
    }
  }else{
    Flight::json(["message" => "User doesn't exist"], 404);
  }
  });

 ?>
