<?php

/**
 * Users controller class: controlles the workflow of the "/admin/users" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\User;


class Users extends Controller
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
        $all_users = $users->get_all();

        $this->view = 'admin.users.list';
        $this->data['users'] = $all_users;
    }

    public function single(){
        self::set_admin();
        $users = new User();
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.users.single';
        $this->data['item'] = $users->get_by_id($_GET['id']);
    }

    public function add(){
        self::set_admin();
        $this->view = 'admin.users.add';
    }

    public function store(){
        self::set_admin();
        $users = new User();
        $users->insert([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'display_name' => $_POST['display_name'],
            'roles' => 'admin'
        ]);
        redirect('/admin/users');
    }

    public function edit(){
        self::set_admin();
        $users = new User();
        $this->view = 'admin.users.edit';
        $this->data['item'] = $users->get_by_id($_GET['id']);
    }

    public function update(){
        self::set_admin();
        $users = new User();
        $users->update($_POST['id'], [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'display_name' => $_POST['display_name'],
            'roles' => 'admin'
        ]);
        redirect('/admin/users');
    }

    public function delete(){
        self::set_admin();
        $users = new User();
        $users->delete($_POST['user_id']);

        redirect('/admin/users');
    }
}
