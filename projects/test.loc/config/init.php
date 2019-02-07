<?php
   require_once "../vendor/autoload.php";
   require_once "helpers.php";
   require_once "routers.php";
   require_once "paths.php";

   $dotenv = Dotenv\Dotenv::create(dirname(__DIR__));
   $dotenv->load();

  

?>