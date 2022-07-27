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
        return $this->view($this->view, $this->data);
    }

    function __destruct()
    {
        self::unset_admin();
    }

    public function list(){
        self::set_admin();
        $news = new Post();
        $all_news = $news->get_all();
        $user = new User();
        
        foreach ($all_news as $key => $value) {
            $current_user = $user->get_by_id($value->post_author);
            $all_news[$key]->post_author = !empty($current_user) ? $current_user->display_name : "delete_user";
        }
        $this->view = 'admin.news.list';
        $this->data['news'] = $all_news;

    }

    public function single(){
        self::set_admin();
        $news = new Post();
        $selected_news = $news->get_by_id($_GET['id']);
        $user = new User();
        $selected_news->post_author = $user->get_by_id($selected_news->post_author)->display_name;
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.news.single';
        $this->data['item'] = $selected_news;
    }

    public function add(){
        self::set_admin();
        $this->view = 'admin.news.add';
    }

    public function store(){
        self::set_admin();
        $news = new Post();
        $news_title = $_POST['title'];
        $news_content = $_POST['content'];
        $news_excerpt = $_POST['excerpt'];
        $news->insert([
            'post_title' => $news_title,
            'post_content' => $news_content,
            'post_excerpt' => $news_excerpt,
            'post_author' => 1,
            'post_status' => 'published'
        ]);
        redirect('/admin/news');
    }

    public function edit(){
        self::set_admin();
        $news = new Post();
        $selected_news = $news->get_by_id($_GET['id']);
        $this->view = 'admin.news.edit';
        $this->data['item'] = $selected_news;
    }

    public function update(){
        self::set_admin();
        $news = new Post();
        $news_title = $_POST['title'];
        $news_content = $_POST['content'];
        $news_excerpt = $_POST['excerpt'];
        $news_id = $_POST['id'];
        $news->update($news_id, [
            'post_title' => $news_title,
            'post_content' => $news_content,
            'post_excerpt' => $news_excerpt,
            'post_author' => 1,
            'post_status' => 'published'
        ]);
        redirect('/admin/news');
    }

    public function delete(){
        self::set_admin();
        $news = new Post();
        $news_id = $_POST['news_id'];
        $news->delete($news_id);

        redirect('/admin/news');
    }
}
