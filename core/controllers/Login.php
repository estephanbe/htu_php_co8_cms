<?php

/**
 * Login controller class: controlles the workflow of the "/login" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\User;

class Login extends Controller
{

    public function render(): View
    {
        return $this->view($this->view, $this->data);
    }

    function __destruct()
    {
        self::unset_admin();
    }

    public function form(){
        $this->view = 'login';
    }

    public function authenticate(){
        var_dump($_POST);
        die;
    }
}
