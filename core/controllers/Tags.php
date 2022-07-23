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

    public function render(): View
    {
        $_SESSION['admin'] = true;
        $tag = new Tag();

        return $this->view('admin.tags', [
            'tags' => $tag->get_all()
        ]);
    }
}
