<div class="container text-left">
    <h1 class="text-center"><?= $data->item->display_name ?></h1>
    <hr>
    <div class="my-5 d-flex justify-content-end">
        <a href="/admin/users" class="mx-1 btn btn-primary btn-sm">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <a href="/admin/users/edit?id=<?= $data->item->id ?>" class="btn btn-warning btn-sm mx-1">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <form action="/admin/users/delete" method="post" class="mx-1">
            <input type="hidden" name="user_id" value="<?= $data->item->id ?>">
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
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