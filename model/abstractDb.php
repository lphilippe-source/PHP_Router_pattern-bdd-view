<?php
require 'autoload.php';

abstract class AbstractDb{

    // protected const HOST = getenv('HOST');
    // protected const DB1 = getenv('DB');
    // protected const USER = getenv('USER');
    // protected const PASS = getenv('PASS');
    protected const CHARSET = 'utf8mb4';

    abstract public function connectPDO();
    abstract public function connectMysqli();
    abstract static public function getDb();
    abstract public function connectDb();

}
?>