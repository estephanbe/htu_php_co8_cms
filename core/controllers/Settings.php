<?php

/**
 * Admin controller class: controlles the workflow of the "/admin" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Option;


class Settings extends Controller
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
        $this->authorize('admin');
        self::set_admin();

        // get site title
        $option = new Option();

        $this->view = 'admin.settings.list';
        $this->data['settings'] = (object) [
            'title' => $option->get_option('site_title'),
            'slogan' => $option->get_option('site_slogan')
        ];
    }

    public function edit(){
        $this->authorize('admin');
        self::set_admin();

        // get site title
        $option = new Option();

        $this->view = 'admin.settings.edit';
        $this->data['settings'] = (object) [
            'title' => $option->get_option('site_title'),
            'slogan' => $option->get_option('site_slogan')
        ];
    }

    public function update(){
        $this->authorize('admin');
        $option = new Option();
        $options = $_POST;
        $site_title = $option->get_option_object('site_title');
        $site_slogan = $option->get_option_object('site_slogan');

        $option->update($site_title->id, ['value' => $options['siteTitle']]);
        $option->update($site_slogan->id, ['value' => $options['siteSlogan']]);

        redirect('/admin/settings');
    }
}
