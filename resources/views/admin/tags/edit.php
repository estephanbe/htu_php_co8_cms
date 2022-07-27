<div class="container">
    <h1 class="text-center">Edit Tag</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/tags/update">
        <input type="hidden" name="id" value="<?= $data->item->id ?>">
        <div class="mb-3">
            <label for="tagsTitle" class="form-label">Tag Name:</label>
            <input type="text" name="tag_name" class="form-control" id="tagsTitle" value="<?= $data->item->name ?>">
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>

    <a href="/admin/tags" class="btn btn-danger my-3">Cancel</a>

</div>