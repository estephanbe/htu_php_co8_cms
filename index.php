<?php 
session_start();
// Routing using procedural programming..
// require_once './depreciated/procedural_router.php';

require_once "./config.php";
require_once "./functions.php";

use Core\Router;

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
Router::get('/', 'front.list');
Router::get('/single', 'front.single');
Router::get('/tag_cloud', 'front.tags');
Router::get('/news_tags', 'front.news_tags');


// Adminstrating Routes
Router::get('/admin', 'admin');

Router::get('/admin/news', 'news.list');
Router::get('/admin/news/single', 'news.single');
Router::get('/admin/news/add', 'news.add');
Router::post('/admin/news/store', 'news.store');
Router::get('/admin/news/edit', 'news.edit');
Router::post('/admin/news/update', 'news.update');
Router::post('/admin/news/delete', 'news.delete');

Router::get('/admin/tags', 'tags.list');
Router::get('/admin/tags/single', 'tags.single');
Router::get('/admin/tags/add', 'tags.add');
Router::post('/admin/tags/store', 'tags.store');
Router::get('/admin/tags/edit', 'tags.edit');
Router::post('/admin/tags/update', 'tags.update');
Router::post('/admin/tags/delete', 'tags.delete');

Router::get('/admin/users', 'users.list');
Router::get('/admin/users/single', 'users.single');
Router::get('/admin/users/add', 'users.add');
Router::post('/admin/users/store', 'users.store');
Router::get('/admin/users/edit', 'users.edit');
Router::post('/admin/users/update', 'users.update');
Router::post('/admin/users/delete', 'users.delete');

Router::get('/admin/settings', 'settings.list');
Router::get('/admin/settings/edit', 'settings.edit');
Router::post('/admin/settings/update', 'settings.update');

Router::get('/admin/profile', 'profile.list');
Router::get('/admin/profile/edit', 'profile.edit');
Router::post('/admin/profile/update', 'profile.update');


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

