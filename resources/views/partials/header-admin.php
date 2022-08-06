<?php

use Core\Models\User;

$user = new User();
$current_user = $user->get_by_id($_SESSION['user']->user_id);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTU News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Admin Panel</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="/" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Homepage</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <?php if(check_permission('admin') || check_permission('news_edit')): ?>
                            <li class="nav-item">
                                <a href="/admin/news" class="nav-link px-0">News</a>
                            </li>
                        <?php endif; ?>
                        <?php if(check_permission('admin') || check_permission('tags_edit')): ?>
                            <li class="nav-item">
                                <a href="/admin/tags" class="nav-link px-0">Tags</a>
                            </li>
                        <?php endif; ?>
                        <?php if(check_permission('admin')): ?>
                            <li class="nav-item">
                                <a href="/admin/users" class="nav-link px-0">Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/settings" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Settings</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <hr>
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php
                                            $pp_path = "/resources/photos/";
                                            echo !empty($current_user->profile_photo_id) ? $pp_path . $current_user->profile_photo_id : $pp_path . "pp-default.jpeg";
                                            ?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1"><?= $current_user->username ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="/admin/profile">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="POST" class="dropdown-item">
                                        <button type="submit" class="btn btn-outline-light">Sign out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
            <div class="col py-3">