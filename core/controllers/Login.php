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

        $errors = ['unauthenticated_user'];
        if(isset($_POST['email']) && isset($_POST['password'])){
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $user = new User();
                $auth_user = $user->where("email", $_POST['email'])->first();
                if(!empty($auth_user)){
                    if($this->check_password($auth_user, $_POST['password'])){
                        unset($_SESSION['errors']);
                        $_SESSION['user'] = (object) [
                            'username' => $auth_user->username,
                            'display_name' => $auth_user->display_name,
                            'user_id' => $auth_user->id,
                            'logged' => true
                        ];
                        if(isset($_POST['remember_me'])){
                            setcookie('logged_in_user', $auth_user->id);
                        }
                        header("Location: /admin");
                        return;
                    }
                    
                }
            }
        }
        unset($_SESSION['user']);
        $_SESSION['errors'] = $errors;
        redirect('/login');
    }

    private function check_password($auth_user, $password){
        $password_check = false;
        // check if the stored password is same as the provided password
        if(password_verify($password, $auth_user->password)){
            $password_check = true;
        }
        return $password_check;
    }

    public function logout(){
        unset($_SESSION['user']);
        setcookie("logged_in_user", "", time() - 3600);
        header("Location: /login");
        return;
    }
}
