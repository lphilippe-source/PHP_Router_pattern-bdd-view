<?php

// spl_autoload_register(function (string $class): void {
//     $className = lcfirst ($class);
//     require $className.'.php';
// });
// define("M", "model");
// define("V", "views");
// define("C", "controller");

// spl_autoload_register(function($class){
//     $folder = explode('_',$class);
//     require constant((string) $folder[1]).'/'.lcfirst($folder[0]).'.php';
// });


// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

$autoload = (new class{

    const M = 'model';
    const V = 'views';
    const C = 'controller';
    public function __construct(){
        if (session_status() == PHP_SESSION_NONE) session_start();
        spl_autoload_register(array($this,'load'));
    }
    public function load($class): void{
        $folder = explode('_',$class);
        echo $_SERVER['REQUEST_URI'];
        require constant('self::'.$folder[1]).'/'.lcfirst($folder[0]).'.php';
    }
});
?>