<?php

ini_set('display_errors','1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Router {

   const DEFAULT_CONTROLLER = 'index';
   const DEFAULT_ACTION = 'index';
   const USER_CONTROLLER = 'user';

   public static function run(){
      
      $url = $_SERVER['REQUEST_URI'];

      $route = array('controller' => Router::DEFAULT_CONTROLLER,
                     'action' => Router::DEFAULT_ACTION,
                     'user' => Router::USER_CONTROLLER

                  );

      $url = explode('/', $url);
      $url = array_filter($url);

      if(count($url) > 1){
         $route['controller'] = $url[1];
         $route['action'] = $url[2];
      } else if(count($url) > 0){
         $route['controller'] = $url[1];
      }
   $controllerClass = $route['controller'] . 'Controller';
   $controllerPath = APPLICATION_PATH . '/controllers/' . $controllerClass . '.php';  

   if(!is_file($controllerPath)) throw new Exception("Не знайдено контроллер");

   require $controllerPath;

   if(!class_exists($controllerClass)) throw new Exception("Не знайдено клас");
   $controllerObject = new $controllerClass();
   $actionName = $route['action'] . 'Action';

   if(!method_exists($controllerObject, $actionName)) throw new Exception("Не знайдено метод");

   $controllerObject->$actionName();

   }
}


?>


