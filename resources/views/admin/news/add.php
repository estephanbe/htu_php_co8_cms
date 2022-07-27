<div class="container">
    <h1 class="text-center">Add News</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/news/store">
        <div class="mb-3">
            <label for="newsTitle" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="newsTitle">
        </div>
        <div class="mb-3">
            <label for="newsContent" class="form-label">Content:</label>
            <textarea name="content" class="form-control" id="newsContent" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="newsExcerpt" class="form-label">Excerpt:</label>
            <input type="text" name="excerpt" class="form-control" id="newsExcerpt">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/admin/news" class="btn btn-danger my-3">Cancel</a>

</div>