<?php
/**
 * Options Class: Moadel class to manage the website options
 */

namespace Core\Models;

use Core\Base\Model;

class Option extends Model
{

    function get_option($option_name){
        $option_name = $this->where('name', $option_name)->first();
        return !empty($option_name) ? $option_name->value : null ;
    }
}

