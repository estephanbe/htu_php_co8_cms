<?php 
/**
 * Home controller class: controlles the workflow of the "/" request in index.php
 */
namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;

class Home extends Controller{
    // Handle the "/" user request.
    // get the needed data from the DB.
    // get the view.

    public function render() : View {
        return $this->view('homepage');
    }


}
