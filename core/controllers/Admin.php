<?php

/**
 * Admin controller class: controlles the workflow of the "/admin" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Post;
use Core\Models\Option;
use Core\Models\Tag;
use Core\Models\User;

class Admin extends Controller
{

    public function render(): View
    {
        if(!$this->auth()){
            redirect('/login');
        }
        self::set_admin();

        // get site title
        $option = new Option();
        $title = $option->get_option('site_title');
        $slogan = $option->get_option('site_slogan');

        // admin dashboard to show the flowing:
        // How many users in our data base.
        $user = new User();
        $users_count = count($user->get_all());
        // How many News in our database.
        $news = new Post();
        $news_count = count($news->get_all());
        // How many tags in our database.
        $tag = new Tag();
        $tags_count = count($tag->get_all());
        // How many news was published per user who has id=1
        // SELECT * FROM posts WHERE author_id=1;
        $news_of_user1 = $news->where('post_author', 1)->count();

        return $this->view('admin.dashboard', [
            'title' => $title,
            'slogan' => $slogan,
            'users_count' => $users_count,
            'tags_count' => $tags_count,
            'news_count' => $news_count,
            'admin_posts' => $news_of_user1
        ]);
    }

    function __destruct()
    {
        self::unset_admin();
    }
}
