<?php

use Core\Models\User;

function redirect($url){
    header("Location: $url");
}

function check_permission($permission){
    $authorized = false;
    $current_user = new User();
    $current_logged_in_user = $current_user->get_by_id($_SESSION['user']->user_id);
    $permissions = explode(",", $current_logged_in_user->roles);
    if (in_array($permission, $permissions)) {
        $authorized = true;
    }

    return $authorized;
}