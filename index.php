<?php 
session_start();
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

// Register Routes

// Public Routes
Router::get('/', 'home');


// Adminstrating Routes
Router::get('/admin', 'admin');
Router::get('/admin/news', 'news');
Router::get('/admin/tags', 'tags');
Router::get('/admin/users', 'users');

Router::post('/admin/new/delete', 'deleteuser');

Router::redirect();


// MVC Explained:
    // M: Model
    // V: View
    // C: Controller
// Display student (User) marks average

// Regullar 
    // We create one class:
        // it gets data from data base
        // it gets the average of the students marks (sum(student_marks/quantity));
        // it displays the student marks. 
// MVC design pattern
    // We create three classes:
        // Controller class: use Model class to get student marks
        // Model class: gets student marks. 
        // Controller class: calculate the average.
        // Contorller class: use View class to display the average.
        // View class: display the average.

// Singlton design pattern
    // I create one instence of the DB (connection) and I keep getting data based on this connection. 

