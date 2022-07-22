<?php 
/**
 * Home controller class: controlles the workflow of the "/" request in index.php
 */
namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Option;
use Core\Models\User;

class Home extends Controller{
    // Handle the "/" user request.
    // get the needed data from the DB.
    // get the view.

    public function render() : View {
        $option = new Option();
        $testing_option = $option
                                ->where('name', 'not_testing_option')
                                ->all();
        var_dump($testing_option);
        return $this->view('homepage');
    }


}
