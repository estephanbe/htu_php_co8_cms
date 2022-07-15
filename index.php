<?php 

// Routing using procedural programming..
// require_once './depreciated/procedural_router.php';

require_once "./config.php";

use Core\Helpers\Date;
use Core\Router;
use Core\Menu;

spl_autoload_register(function($class_name){

    // $class_name = Core\Router
    $file_path = __DIR__; // /Applications/MAMP/htdocs/htucms

    $class_name = explode('\\', $class_name);
    // array (size=2)
    //     0 => string 'Core' (length=4)
    //     1 => string 'Router' (length=6)

    foreach($class_name as $key => $value){
        // if $key == last_key in $class_name, don't strtolower. 
        if($key != array_key_last($class_name)){
            $class_name[$key] = strtolower($value);
        }
        $file_path .= '/' . $class_name[$key];
    }

    $file_path .= '.php';
    // /Applications/MAMP/htdocs/htucms/core/Router.php

    require_once $file_path;
});

Router::get('/', 'home');
Router::get('/restaurant', 'restaurant');
Router::post('/create_user', 'create_user');

var_dump(Router::$get_routes);
var_dump(Router::$post_routes);


// /home => pages/home.php METHOD:get
// /restaurant => pages/restaurant.php
// /klasjflasjlkl => pages/404.php
