<div class="container">
    <h1 class="text-center">Tags List</h1>
    <hr>


    <div class="d-flex w-100 justify-content-end">
        <a href="/admin/tags/add" class="btn btn-success">Add Tag</a>
    </div>

    <table class="table table-hover my-5">
        <thead>
            <tr>
                <th scope="col">Tag Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
           <?php 
           foreach ( $data->tags as $tag ) : ?>
                <tr>
                    <td><?= $tag->name; ?></td>
                    <td class="d-flex">
                        <a href="/admin/tags/single?id=<?= $tag->id ?>" class="mx-1 btn btn-primary btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="/admin/tags/edit?id=<?= $tag->id ?>" class="btn btn-warning btn-sm mx-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/tags/delete" method="post" class="mx-1">
                            <input type="hidden" name="tag_id" value="<?= $tag->id ?>">
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