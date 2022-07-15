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
    
    public static function get($route, $page){
        var_dump(self::test_file_exists("./pages/$page.php"));
        self::$get_routes[$route] = "./pages/$page.php";
    }

    public static function post($route, $page){
        var_dump(self::test_file_exists("./pages/$page.php"));
        self::$post_routes[$route] = "./pages/$page.php";
    }

}