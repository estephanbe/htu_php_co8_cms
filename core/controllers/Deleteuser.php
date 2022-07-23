<?php

/**
 * Users controller class: controlles the workflow of the "/admin/users" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;



class Deleteuser extends Controller
{

    public function render(): View
    {
        $_SESSION['admin'] = true;
        return $this->view('admin.users');
    }
}
