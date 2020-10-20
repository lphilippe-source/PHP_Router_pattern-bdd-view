<?php
require 'autoload.php';

class MysqliConnect extends DbManager{
    
    public function connectMysqli() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $_SESSION['driver']='connectMysqli';
            $db = new mysqli(self::HOST, self::USER, self::PASS, self::DB1);
            $db->set_charset(self::CHARSET);
            return $db;
        } 
        catch(Exception $e){
            error_log($e->getMessage());
            exit('Error connecting to database');
        }
    }
}
?>