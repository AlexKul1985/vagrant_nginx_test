<?php
namespace core\base;

class Controller{
    public $view;
    public $route;
    public function __construct($route){
        $this -> route = $route;
        // print_r($route);
        // echo "<br>";

    }
    
}


?>