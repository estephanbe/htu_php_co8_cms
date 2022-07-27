<div class="container">
    <h1 class="text-center">Website Settings</h1>
    <hr>

    <div class="d-flex w-100 justify-content-end">
        <a href="/admin/settings/edit" class="btn btn-success">Edit Settings</a>
    </div>

    <p>
        <strong>Site Title: </strong> <?= $data->settings->title ?>
    </p>
    <p>
        <strong>Site Slogan: </strong> <?= $data->settings->slogan ?>
    </p>
</div>