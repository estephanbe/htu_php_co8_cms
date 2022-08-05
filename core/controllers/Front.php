<?php 
/**
 * Front controller class: controlles the workflow of the public requests in index.php
 */
namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Option;
use Core\Models\Post;
use Core\Models\Tag;
use Core\Models\User;

class Front extends Controller{
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

    public function single(){
        $news = new Post();
        $tag = new Tag();
        $selected_tags = [];
        $selected_news = $news->get_by_id($_GET['id']);
        $user = new User();
        $user_ob = $user->get_by_id($selected_news->post_author);
        $selected_news->post_author = !$user_ob ? "Deleted User" : $user_ob->display_name;
        $this->view = 'single';
        $this->data['item'] = $selected_news;

        foreach($news->get_news_tags($selected_news->id) as $relation){
            $selected_tags[] = $tag->get_by_id($relation->tag_id);
        }

        $this->data['tags'] = $selected_tags;
    }

    public function tags(){
        $tag = new Tag();
        $this->data['tags'] = $tag->get_all();
        $this->view = 'tag_cloud';
    }

    public function news_tags(){
        $news = new Post();
        $tag = new Tag();
        $relations = $news->get_relations_based_on_tag($_GET['tag_id']);
        $news_arr = [];
        foreach ($relations as $relation) {
            $news_arr[] = $news->get_by_id($relation->post_id);
        }

        $this->data['tag'] = $tag->get_by_id($_GET['tag_id']);
        $this->data['news'] = $news_arr;
        $this->view = 'tags_related_news';

    }

    


}
