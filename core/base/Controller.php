<?php 
/**
 * Controller class: parent class of controller classes
 */
namespace Core\Base;

abstract class Controller {
    abstract public function render() : View;

    protected function view($view, $data = []) {
        return new View($view, $data);
    }

}