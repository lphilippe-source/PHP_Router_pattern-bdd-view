<?php
require 'autoload.php';
class Templating {

    static public $defaultAdmin;
    
    //creer une fonction qui genere les views en fonction des evenements
    static function renderView(string $fileName, array $variables): void {
        $variables;
        include $fileName;
    } 
}
?>