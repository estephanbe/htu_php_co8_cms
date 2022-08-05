<?php

/**
 * News controller class: controlles the workflow of the "/admin/news" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Post;
use Core\Models\Tag;
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
        $tag = new Tag();
        $selected_tags = [];
        $selected_news = $news->get_by_id($_GET['id']);
        $user = new User();
        $selected_news->post_author = $user->get_by_id($selected_news->post_author)->display_name;
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.news.single';
        $this->data['item'] = $selected_news;

        foreach($news->get_news_tags($selected_news->id) as $relation){
            $selected_tags[] = $tag->get_by_id($relation->tag_id);
        }

        $this->data['tags'] = $selected_tags;
    }

    public function add(){
        self::set_admin();
        $tag = new Tag();
        $this->view = 'admin.news.add';
        $this->data['tags'] = $tag->get_all();
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

        if(!empty($_POST['news_tags'])){
            $news->news_tags($_POST['news_tags']);
        }
        redirect('/admin/news');
    }

    public function edit(){
        self::set_admin();
        $news = new Post();
        $tag = new Tag();
        $selected_tags = [];
        $selected_news = $news->get_by_id($_GET['id']);
        $post_tags = $news->get_news_tags($selected_news->id);

        foreach($post_tags as $relation){
            $selected_tags[] = $tag->get_by_id($relation->tag_id);
        }

        $this->view = 'admin.news.edit';
        $this->data['item'] = $selected_news;
        $this->data['selected_tags'] = $selected_tags;
        $this->data['all_tags'] = $tag->get_all();
    }

    public function update(){
        self::set_admin();
        $news = new Post();
        $news->update($_POST['id'], [
            'post_title' => $_POST['title'],
            'post_content' => $_POST['content'],
            'post_excerpt' => $_POST['excerpt'],
            'post_author' => 1,
            'post_status' => 'published'
        ]);

        // $_POST['news_tags'] -> 2, 7
        // Excute query which gets the current relations. (get_news_tags) => 1, 7
        // Loop through the current relations
            // Each relation has two statuses:
                // 1) The current item relation is in the updated_relations_ids ($_POST['news_tags'])
                    // do nothing.. and remove the id frorm the $_POST['news_tags'].
                // 2) The current item relation is not in the updated_relations_ids
                    // delete from the relations table 
        // the left ids in the $_POST['news_tags'], will be added to the relations_table through a loop.

        if(isset($_POST['news_tags'])){
            $updated_tags_arr = $_POST['news_tags'];
            $current_relations = $news->get_news_tags($_POST['id']);
            foreach ($current_relations as $key => $relation) {
                if(in_array($relation->tag_id, $updated_tags_arr)){
                    unset($updated_tags_arr[$key]);
                } else {
                    $news->delete_relation($relation->id);
                }
            }

            foreach ($updated_tags_arr as $tag_id) {
                $news->add_relation($_POST['id'], $tag_id);
            }
        }
        
        redirect('/admin/news');
    }

    public function delete(){
        self::set_admin();
        $news = new Post();
        $news_id = $_POST['news_id'];

        // foreach ($news->get_news_tags($news_id ) as $relation) {
        //     $news->delete_relation($relation->id);
        // }
        $news->delete_relation_by_post_id($news_id);
        $news->delete($news_id);

        redirect('/admin/news');
    }
}
