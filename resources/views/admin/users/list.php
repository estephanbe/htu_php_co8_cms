<div class="container">
    <h1 class="text-center">Users List</h1>
    <hr>

    <div class="d-flex w-100 justify-content-end">
        <a href="/admin/users/add" class="btn btn-success">Add User</a>
    </div>

    <table class="table table-hover my-5">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Display Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Role</th>
                <th scope="col">Registration Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
           <?php 
           foreach ( $data->users as $user ) : ?>
                <tr>
                    <td><?= $user->username; ?></td>
                    <td><?= $user->display_name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->roles; ?></td>
                    <td><?= $user->registered_at; ?></td>
                    <td class="d-flex">
                        <a href="/admin/users/single?id=<?= $user->id ?>" class="mx-1 btn btn-primary btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="/admin/users/edit?id=<?= $user->id ?>" class="btn btn-warning btn-sm mx-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/users/delete" method="post" class="mx-1">
                            <input type="hidden" name="user_id" value="<?= $user->id ?>">
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