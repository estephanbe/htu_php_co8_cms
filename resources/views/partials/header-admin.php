<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTU News - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Homepage</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i>News</a>
                            <ul class="collapse nav flex-column ms-1" id="news_admin_menu_item" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="/admin/news/add" class="nav-link px-0">Add</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#tags_admin_menu_item" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i>Tags</a>
                            <ul class="collapse nav flex-column ms-1" id="tags_admin_menu_item" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0">Add</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#users_admin_menu_item" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i>Users</a>
                            <ul class="collapse nav flex-column ms-1" id="users_admin_menu_item" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0">Add</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Settings</span>
                            </a>
                        </li>
                        <hr>
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">profile</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div>
                </div>
            </div>
            <div class="col py-3">