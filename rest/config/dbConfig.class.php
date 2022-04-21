<?php

class dbConfig {
  public static function DB_HOST(){
    return dbConfig::get_env("DB_HOST", "db-mysql-fra1-14872-do-user-11405473-0.b.db.ondigitalocean.com");
  }

  public static function DB_USERNAME(){
    return dbConfig::get_env("DB_USERNAME", "doadmin");
  }

  public static function DB_PASSWORD(){
    return dbConfig::get_env("DB_PASSWORD", "AVNS_JbOB5s3UVvWG-ur");
  }

  public static function DB_SCHEMA(){
    return dbConfig::get_env("DB_SCHEMA", "sql11481005");
  }

  public static function DB_PORT(){
    return dbConfig::get_env("DB_PORT", "25060");
  }

  public static function get_env($name, $default){
   return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
  }
}

?>
