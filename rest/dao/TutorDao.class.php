<?php

require_once __DIR__.'/BaseDao.class.php';

class TutorDao extends BaseDao{

  public function __construct(){
    parent::__construct('Tutors');
  }
}

?>
