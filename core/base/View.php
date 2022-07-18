<?php 
/**
 * View class: gets php templates from /resources/views and pass arguments. 
 */
namespace Core\Base;

class View {

    function __construct($view)
    {
        $views_path = dirname(__DIR__, 2) . "/resources/views";
        require_once $views_path . "/" . $view . ".php";
    }

}