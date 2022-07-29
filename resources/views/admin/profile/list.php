<?php

use Core\Models\User;

$user = new User();
$current_user = $user->get_by_id(1);

?>
<div class="container">
    <h1 class="text-center">My Profile</h1>
    <hr>

    <div class="d-flex w-100 justify-content-end">
        <a href="/admin/profile/edit" class="btn btn-success">Edit Profile</a>
    </div>

    <div class="row my-4">
        <div class="col-6">
            <div class="my-3">
                <strong class="d-block">Display Name</strong>
                <?= $data->item->display_name ?>
            </div>
            <div class="my-3">
                <strong class="d-block">Username</strong>
                <?= $data->item->username ?>
            </div>
            <div class="my-3">
                <strong class="d-block">Email</strong>
                <?= $data->item->email ?>
            </div>
            <div class="my-3">
                <strong class="d-block">Registered At</strong>
                <?= $data->item->registered_at ?>
            </div>
        </div>
        <div class="col-6">
            <img src="<?php
                $pp_path = "/resources/photos/";
                echo !empty($current_user->profile_photo_id) ? $pp_path .$current_user->profile_photo_id : $pp_path . "pp-default.jpeg";
            ?>" class="img-thumbnail" alt="profile-image" width="300px" height="300px">
        </div>
    </div>
</div>