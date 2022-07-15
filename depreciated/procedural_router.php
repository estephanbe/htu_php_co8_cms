<?php 

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require "./pages/home.php";
        break;
    case '/restaurant':
        require "./pages/restraurant.php";
        break;

    default:
        require "./pages/404.php";
        break;
}
