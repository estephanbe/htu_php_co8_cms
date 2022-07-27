<div class="container">
    <h1 class="text-center">Edit Settings</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/settings/update">
        <div class="mb-3">
            <label for="siteTitle" class="form-label">Site Title:</label>
            <input type="text" name="siteTitle" class="form-control" id="siteTitle" value="<?= $data->settings->title ?>">
        </div>
        <div class="mb-3">
            <label for="siteSlogan" class="form-label">Site Slogan:</label>
            <input type="text" name="siteSlogan" class="form-control" id="siteSlogan" value="<?= $data->settings->slogan ?>">
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>

    <a href="/admin/settings" class="btn btn-danger my-3">Cancel</a>

</div>