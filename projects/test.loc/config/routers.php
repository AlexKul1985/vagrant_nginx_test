<?php
use core\lib\Router;

Router::add('^\/(\w+)\/(\w+)\/?$');
Router::add('^\/(\w+)\/?$',["action" => "index"]);
Router::add('^\/(\w+)\/(\w+\/?)+$',["controller" => "main","action" => "index"]);
Router::add('^\/?$');
Router::add('^\/about\/?$',["controller" => "main","action" => "about"]);
Router::add('^\/category\/?$',["controller" => "main","action" => "category"]);








?>