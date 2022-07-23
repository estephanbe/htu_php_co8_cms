<?php 
/**
 * Admin controller class: controlles the workflow of the "/admin" request in index.php
 */
namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;

class Admin extends Controller{

    public function render() : View {
        $_SESSION['admin'] = true;
        return $this->view('admin.dashboard');
    }

}
