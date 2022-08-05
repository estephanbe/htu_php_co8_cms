<div class="container">
    <h1 class="text-center">News List</h1>
    <hr>

    <div class="d-flex w-100 justify-content-end">
        <a href="/admin/news/add" class="btn btn-success">Add News</a>
    </div>

    <table class="table table-hover my-5">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->news as $post) : ?>
                <tr>
                    <td><?= htmlspecialchars($post->post_title) ?></td>
                    <td><?= $post->post_author; ?></td>
                    <td><?= $post->post_status; ?></td>
                    <td><?= $post->created_at; ?></td>
                    <td><?= $post->updated_at; ?></td>
                    <td class="d-flex">
                        <a href="/admin/news/single?id=<?= $post->id ?>" class="mx-1 btn btn-primary btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="/admin/news/edit?id=<?= $post->id ?>" class="btn btn-warning btn-sm mx-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/news/delete" method="post" class="mx-1">
                            <input type="hidden" name="news_id" value="<?= $post->id ?>">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>