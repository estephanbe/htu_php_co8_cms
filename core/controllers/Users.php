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
        $this->auth(); 
        $this->authorize('admin');
        self::set_admin();
        $users = new User();
        $all_users = $users->get_all();

        $this->view = 'admin.users.list';
        $this->data['users'] = $all_users;
    }

    public function single(){
        $this->auth(); 
        $this->authorize('admin');
        self::set_admin();
        $users = new User();
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.users.single';
        $this->data['item'] = $users->get_by_id($_GET['id']);
    }

    public function add(){
        $this->auth(); 
        $this->authorize('admin');
        self::set_admin();
        $this->view = 'admin.users.add';
    }

    public function store(){
        $this->auth(); 
        $this->authorize('admin');
        self::set_admin();
        $users = new User();
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $users->insert([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $hashed_password,
            'display_name' => $_POST['display_name'],
            'roles' => 'admin'
        ]);
        redirect('/admin/users');
    }

    public function edit(){
        $this->auth(); 
        $this->authorize('admin');
        self::set_admin();
        $users = new User();
        $this->view = 'admin.users.edit';
        $this->data['item'] = $users->get_by_id($_GET['id']);
    }

    public function update(){
        $this->auth(); 
        $this->authorize('admin');
        self::set_admin();
        $users = new User();
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $users->update($_POST['id'], [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $hashed_password,
            'display_name' => $_POST['display_name'],
            'roles' => 'admin'
        ]);
        redirect('/admin/users');
    }

    public function delete(){
        $this->auth(); 
        $this->authorize('admin');
        self::set_admin();
        $users = new User();
        $users->delete($_POST['user_id']);

        redirect('/admin/users');
    }
}
