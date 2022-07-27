<div class="container">
    <h1 class="text-center">Edit News</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/news/update">
        <input type="hidden" name="id" value="<?= $data->item->id ?>">
        <div class="mb-3">
            <label for="newsTitle" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="newsTitle" value="<?= $data->item->post_title ?>">
        </div>
        <div class="mb-3">
            <label for="newsContent" class="form-label">Content:</label>
            <textarea name="content" class="form-control" id="newsContent" rows="10">
                <?= $data->item->post_content ?>
            </textarea>
        </div>
        <div class="mb-3">
            <label for="newsExcerpt" class="form-label">Excerpt:</label>
            <input type="text" name="excerpt" class="form-control" id="newsExcerpt" value="<?= $data->item->post_excerpt ?>">
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>

    <a href="/admin/news" class="btn btn-danger my-3">Cancel</a>

</div>