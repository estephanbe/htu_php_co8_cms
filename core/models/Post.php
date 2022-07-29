<?php
/**
 * Post Class: Model class to manage the website news
 */

namespace Core\Models;

use Core\Base\Collection;
use Core\Base\Model;

class Post extends Model
{
    function news_tags($tags_id_arr){
        foreach($tags_id_arr as $tag_id){
            $tag_id = (int) $tag_id;
            $sql = "INSERT INTO posts_tags (post_id, tag_id) VALUES ($this->last_insert_id, $tag_id)";
            $this->connection->query($sql);
        }
    }

    function get_news_tags($news_id){
        $query = "SELECT * FROM posts_tags WHERE post_id=$news_id";
        $collection = new Collection($this->connection, $query);
        return $collection->data;
    }

    function get_relations_based_on_tag($tag_id){
        $query = "SELECT * FROM posts_tags WHERE tag_id=$tag_id";
        $collection = new Collection($this->connection, $query);
        return $collection->data;
    }

    function delete_relation($relation_id){
        $query = "DELETE FROM posts_tags WHERE id=$relation_id";
        return $this->connection->query($query);
    }

    function delete_relation_by_post_id($post_id){
        $query = "DELETE FROM posts_tags WHERE post_id=$post_id";
        return $this->connection->query($query);
    }

    function add_relation($news_id, $tag_id){
        $news_id = (int) $news_id;
        $tag_id = (int) $tag_id;
        $sql = "INSERT INTO posts_tags (post_id, tag_id) VALUES ($news_id, $tag_id)";
        return $this->connection->query($sql);
    }
}

