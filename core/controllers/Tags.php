<?php

/**
 * Tags controller class: controlles the workflow of the "/admin/tags" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Tag;

class Tags extends Controller
{

    public function __construct()
    {
        $this->authorize(['admin', 'tags_edit']);
    }

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
        $tags = new Tag();
        $all_tags = $tags->get_all();

        $this->view = 'admin.tags.list';
        $this->data['tags'] = $all_tags;

    }

    public function single(){
        self::set_admin();
        $tags = new Tag();
        $selected_tag = $tags->get_by_id($_GET['id']);
        
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.tags.single';
        $this->data['item'] = $selected_tag;
    }

    public function add(){
        self::set_admin();
        $this->view = 'admin.tags.add';
    }

    public function store(){
        self::set_admin();
        $tag = new Tag();
        $tag->insert([
            'name' => $_POST['tag_name'],
        ]);
        redirect('/admin/tags');
    }

    public function edit(){
        self::set_admin();
        $tag = new Tag();
        $this->view = 'admin.tags.edit';
        $this->data['item'] = $tag->get_by_id($_GET['id']);
    }

    public function update(){
        self::set_admin();
        $tag = new Tag();
        $tag->update($_POST['id'], [
            'name' => $_POST['tag_name'],
        ]);
        redirect('/admin/tags');
    }

    public function delete(){
        self::set_admin();
        $tag = new Tag();
        $tag->delete($_POST['tag_id']);

        redirect('/admin/tags');
    }
}
