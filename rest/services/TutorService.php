<?php

require_once __DIR__.'/BaseService.php';
require_once __DIR__.'/../dao/TutorDao.class.php';

class TutorService extends BaseService{

  public function __construct(){
    parent::__construct(new TutorDao());
  }
}

?>
