<?php
    namespace core\lib;

    class Router{
        private static $routes = [];
        private static $route = [];
        
       


        public static function add($pattern,$route = []){
            self::$routes[$pattern] = $route;
        }

        public static function dispatch(){
            $url = $_SERVER["REQUEST_URI"];
            if(self::match($url)){
               
                $controller = ucfirst(self::$route["controller"])."Controller";
                
                $controller = "controllers\\".self::$route["prefix"]."".$controller;
               
                if(class_exists($controller)){
                    $object = new $controller(self::$route);
                    $action = "action".ucfirst(self::$route["action"]);
                    if(method_exists($object, $action)){
                        
                        $object -> $action();
                    }
                }
            }
            else{
                echo "NO".PHP_EOL;
            }

        }

        
        private static function match($url){
          
            $url = rtrim(self::removeQueryString($url),"/");
           
           
            if(!empty(self::$routes)){
                
                foreach (self::$routes as $pattern => $route) {
                  
                  
                    if(preg_match("/{$pattern}/i",$url,$match)){
                        
                        debug($match);
                        $controller = "main";
                        $action = "index";
                        $prefix = "";
                        if(isset($route["controller"])){
                            $controller = $route["controller"];
                        }
                        else if(isset($match[1])){
                            $controller = $match[1];
                        }
                        
                        
                        $route["controller"] = $controller;
                        
                        if(isset($route["action"])){
                            $action = $route["action"];
                        }
                        else if(isset($match[2])){
                            $action = $match[2];
                        }

                       
                        $route["action"] = $action;

                        if(isset($route['prefix'])){
                            $prefix .= "\\";
                        }

                        $route["prefix"] = $prefix;

                        
                        
                        
                        
                        self::$route = $route;
                        
                        return true;
                    }
                    

                    
                }
                
            }
            return false;

        }
        private static function removeQueryString($url){

            $arr = explode("/",$url,2);
            if(($pos = strpos($arr[1],"?",0)) === false){
                
                return $url;
            }
            
            $url = substr($url,0,$pos+1);
            
            return $url;
        }

        
            
        




    }

?>