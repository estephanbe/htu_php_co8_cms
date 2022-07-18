<?php 
/**
 * Router Class: this class is used to define our routes and to redirect traffic to the selected route
 */
namespace Core;

use Core\Helpers\Tests;

class Router {

    use Tests;

    public static $get_routes = [];
    public static $post_routes = [];

    public static function redirect(){

        $request = $_SERVER['REQUEST_URI'];
        $routes = [];

        switch ($_SERVER['REQUEST_METHOD']){
            case "GET":
                $routes = self::$get_routes;
                break;
            case "POST":
                $routes = self::$post_routes;
                break;
        }

        if( empty($routes) || !array_key_exists($request, $routes)){
            http_response_code(404);
            die("Page is not existed");
        }

        $controller_namespace = "Core\\Controllers\\"; // define the class namespace. 
        $controller_name = $controller_namespace . ucfirst(strtolower($routes[$request])); // Concatinate name space with the class controller name. but before that, lowercase the class name, and convert the first letter to uppercase. 
        $controller = new $controller_name; // create new instance of the requested class. 
        $controller->render();
    }
    
    public static function get($route, $controller){
        self::$get_routes[$route] = $controller;
    }

    public static function post($route, $controller){
        self::$post_routes[$route] = $controller;
    }

}