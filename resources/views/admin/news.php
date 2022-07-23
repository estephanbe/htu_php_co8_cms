<div class="container">
    <h1 class="text-center">News List</h1>
    <hr>

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
           <?php foreach ( $data->news as $post ) : ?>
                <tr>
                    <td><?= $post->post_title; ?></td>
                    <td><?= $post->post_author; ?></td>
                    <td><?= $post->post_status; ?></td>
                    <td><?= $post->created_at; ?></td>
                    <td><?= $post->updated_at; ?></td>
                    <td>
                        <a href=""><i class="fa-solid fa-eye"></i></a>
                        <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="/admin/new/delete"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
           <?php endforeach; ?>
        </tbody>
    </table>
</div>