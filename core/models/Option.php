<?php
/**
 * Options Class: Moadel class to manage the website options
 */

namespace Core\Models;

use Core\Base\Model;

class Option extends Model
{

    function get_options(){
        $sql = "SELECT * FROM options";
        $result = $this->connection->query($sql);
        var_dump($result);
    }
}

