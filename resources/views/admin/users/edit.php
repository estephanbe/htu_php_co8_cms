<div class="container">
    <h1 class="text-center">Edit users</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/users/update">
        <input type="hidden" name="id" value="<?= $data->item->id ?>">
        <div class="mb-3">
            <label for="usersUsername" class="form-label">Username:</label>
            <input type="text" name="username" class="form-control" id="usersUsername" value="<?= $data->item->username ?>">
        </div>
        <div class="mb-3">
            <label for="usersEmail" class="form-label">Email:</label>
            <input type="text" name="email" class="form-control" id="usersEmail" value="<?= $data->item->email ?>">
        </div>
        <div class="mb-3">
            <label for="usersPassword" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="usersPassword">
        </div>
        <div class="mb-3">
            <label for="usersDisplayName" class="form-label">Display Name:</label>
            <input type="text" name="display_name" class="form-control" id="usersDisplayName" value="<?= $data->item->display_name ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="/admin/users" class="btn btn-danger my-3">Cancel</a>

</div>