<div class="container">
    <h1 class="text-center">Tags List</h1>
    <hr>

    <table class="table table-hover my-5">
        <thead>
            <tr>
                <th scope="col">Tag Name</th>
            </tr>
        </thead>
        <tbody>
           <?php 
           foreach ( $data->tags as $tag ) : ?>
                <tr>
                    <td><?= $tag->name; ?></td>
                </tr>
           <?php endforeach; ?>
        </tbody>
    </table>
</div>