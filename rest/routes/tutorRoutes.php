<?php

//list all Tutors
Flight::route('GET /tutors', function(){
  Flight::json(Flight::tutorService()->get_all());
});

//List one tutor
Flight::route('GET /tutors/@id', function($id){
  Flight::json(Flight::tutorService()->get_by_id($id));
});

//Add tutor
Flight::route('POST /tutors', function(){
    Flight::json(Flight::tutorService()->add(Flight::request()->data->getData()));
});

//Update tutor
Flight::route('PUT /tutors/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::tutorService()->update($id, $data));
});

//Delete tutor
Flight::route('DELETE /tutors/@id', function($id){
  Flight::tutorService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

 ?>
