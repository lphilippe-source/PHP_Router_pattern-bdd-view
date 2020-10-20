<?php
require 'autoload.php';

class PdoConnect extends DbManager{

    public function connectPDO() {
        try
        {
            $_SESSION['driver']='connectPDO';
            $dsn = "mysql:host=".self::HOST.";dbname=".self::DB1.";charset=".self::CHARSET;
            $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $db = new PDO($dsn, self::USER, self::PASS, $options);
            return $db;
        }
        catch(Exception $e){
            error_log($e->getMessage());
            exit('Error connecting to database');
        }    
    }
}
?>