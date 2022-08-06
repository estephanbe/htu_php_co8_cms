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
        $this->auth();
        self::set_admin();

        $users = new User();
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.profile.list';
        $this->data['item'] = $users->get_by_id($_SESSION['user']->user_id); // will hard code it just for now
    }

    public function edit(){
        $this->auth();
        self::set_admin();

        // get site title
        $user = new User();

        $this->view = 'admin.profile.edit';
        $this->data['item'] = $user->get_by_id($_SESSION['user']->user_id);
    }

    public function update(){
        $this->auth();
        self::set_admin();
        $users = new User();
        $moved_file = false;
        $file_name = null;
        $file_ext = null;
        if(!empty($_FILES)){
            $file_name = "pp-" . $_POST['username'];
            $file_ext = explode('/', $_FILES['profile_image']['type'])[1];
            $file_dir = dirname(__DIR__, 2) . "/resources/photos/$file_name.$file_ext";
            $moved_file = move_uploaded_file($_FILES['profile_image']['tmp_name'], $file_dir);
        }
        $users->update($_SESSION['user']->user_id, [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'display_name' => $_POST['display_name'],
            'roles' => 'admin',
            'profile_photo_id' => $moved_file ? "$file_name.$file_ext" : null
        ]);
        redirect('/admin/profile');
    }
}
