<?php

/**
 * Users controller class: controlles the workflow of the "/admin/users" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\User as UserModel;


class Users extends Controller
{

    public function render(): View
    {
        $_SESSION['admin'] = true;

        $user = new UserModel();

        return $this->view('admin.users', [
            'users' => $user->get_all()
        ]);
    }
}
