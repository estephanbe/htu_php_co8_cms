<div class="container">
    <h1 class="text-center">My Profile</h1>
    <hr>

    <div class="d-flex w-100 justify-content-end">
        <a href="/admin/profile/edit" class="btn btn-success">Edit Profile</a>
    </div>

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