<?php

/**
 * News controller class: controlles the workflow of the "/admin/news" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Post;
use Core\Models\User;

class News extends Controller
{

    public function render(): View
    {
        $_SESSION['admin'] = true;
        $news = new Post();
        $all_news = $news->get_all();
        $user = new User();
        
        foreach ($all_news as $key => $value) {
            $all_news[$key]->post_author = $user->get_by_id($value->post_author)->display_name;
        }

        return $this->view('admin.news', ['news' => $all_news]);
    }
}
