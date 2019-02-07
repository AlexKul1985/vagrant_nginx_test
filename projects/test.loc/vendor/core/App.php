<?php
namespace core;

class App{

    public function __construct(){
        lib\Router::dispatch();
    
    }

        

}

?>