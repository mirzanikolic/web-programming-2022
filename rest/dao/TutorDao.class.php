<?php

require_once __DIR__.'/BaseDao.class.php';

class TutorDao extends BaseDao{

  public function __construct(){
    parent::__construct('Tutors');
  }

  public function get_by_search($search){
         return $this->query("SELECT * FROM Tutors
                              WHERE LOWER(title)
                              LIKE CONCAT('%', :title, '%')",
                              ["title" => strtolower($search)]);
     }
}

?>
