<?php 
/**
 * Controller class: parent class of controller classes
 */
namespace Core\Base;

abstract class Controller {

    public $view;
    public $data = [];

    abstract public function render() : View;

    protected function view($view, $data = []) {
        return new View($view, $data);
    }

    public static function set_admin(){
        $_SESSION['admin'] = true;
    }

    public static function unset_admin(){
        unset($_SESSION['admin']);
    }

}