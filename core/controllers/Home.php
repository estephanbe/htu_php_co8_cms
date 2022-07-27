<?php 
/**
 * Home controller class: controlles the workflow of the "/" request in index.php
 */
namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Option;
use Core\Models\Post;

class Home extends Controller{
    // Handle the "/" user request.
    // get the needed data from the DB.
    // get the view.

    public function render() : View {
        return $this->view($this->view, $this->data);
    }

    public function list(){
        $option = new Option();
        $news = new Post();

        $this->view = 'homepage';
        $this->data['options'] = (object) [
            'title' => $option->get_option('site_title'),
            'slogan' => $option->get_option('site_slogan')
        ];
        $this->data['news'] = $news->get_all();
    }

    


}
