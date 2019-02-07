<?php
namespace controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserTwo
 *
 * @author user
 */
class UserTwo {
    //put your code here
    private $name;
    private $age;

    private $weight;

    public function __construct($name,$age,$weight){
            $this -> name = $name;
            $this -> weight = $weight;
            $this -> age = $age;
    }
    
    public function getContent(){
        require_once VIEW.'/tmp.php';
    }
    public function render(){
        return $this ->getContent();
    }
}
