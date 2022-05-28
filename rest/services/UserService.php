<?php

require_once __DIR__.'/BaseService.php';
require_once __DIR__.'/../dao/UserDao.class.php';

class UserService extends BaseService{

  public function __construct(){
    parent::__construct(new UserDao());
  }

  public function get_user_by_email($email){
    return $this->dao->get_user_by_email($email);
  }
/*
  public function register($user){
   try {
     $user = parent::add([
       "name" => $user['name'],
       "password" => md5($user['password']),
       "email" => $user['email'],
       "city" = > $user['city'],
       "added_at" => date(Config::DATE_FORMAT),
       "token" => md5(random_bytes(16))
     ]);
   } catch (\Exception $e) {
         throw $e;
   }
   return $user;
 }
} */
}

?>
