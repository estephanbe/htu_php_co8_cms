<?php 
/**
 * Admin controller class: controlles the workflow of the "/admin" request in index.php
 */
namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Option;

class Admin extends Controller{

    public function render() : View {
        $_SESSION['admin'] = true;

        // get site title
        $option = new Option();
        $title = $option->get_option('site_title');
        $slogan = $option->get_option('site_slogan');

        return $this->view('admin.dashboard' , ['title' => $title, 'slogan' => $slogan]);
    }

}
