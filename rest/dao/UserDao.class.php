<?php

require_once __DIR__.'/BaseDao.class.php';

class UserDao extends BaseDao{

  public function __construct(){
    parent::__construct("Users");
  }

  public function get_user_by_email($email){
  return $this->query_unique("SELECT * FROM Users WHERE email = :email", ['email' => $email]);
}
}

?>
