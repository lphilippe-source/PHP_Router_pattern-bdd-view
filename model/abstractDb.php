<?php
require $_SERVER['PWD'].'/autoload.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
abstract class AbstractDb_M{

    
    protected const CHARSET = 'utf8mb4';

    abstract public function connectPDO();
    abstract public function connectMysqli();
    abstract static public function getDb();
    abstract public function connectDb();

}
?>