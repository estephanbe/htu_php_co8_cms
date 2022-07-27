<?php

/**
 * Admin controller class: controlles the workflow of the "/admin" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\User;

class Profile extends Controller
{

    public function render(): View
    {
        return $this->view($this->view, $this->data);
    }
    
    function __destruct()
    {
        self::unset_admin();
    }

    public function list(){
        self::set_admin();

        $users = new User();
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.profile.list';
        $this->data['item'] = $users->get_by_id(1); // will hard code it just for now
    }

    public function edit(){
        self::set_admin();

        // get site title
        $user = new User();

        $this->view = 'admin.profile.edit';
        $this->data['item'] = $user->get_by_id(1);
    }

    public function update(){
        self::set_admin();
        $users = new User();
        $users->update(1, [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'display_name' => $_POST['display_name'],
            'roles' => 'admin'
        ]);
        redirect('/admin/profile');
    }
}
