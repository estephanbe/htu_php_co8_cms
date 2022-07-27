<div class="container">
    <h1 class="text-center">Add Tag</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/tags/store">
        <div class="mb-3">
            <label for="tagsName" class="form-label">Tag Name:</label>
            <input type="text" name="tag_name" class="form-control" id="tagsName">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/admin/tags" class="btn btn-danger my-3">Cancel</a>

</div>