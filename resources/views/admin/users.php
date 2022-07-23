<div class="container">
    <h1 class="text-center">Users List</h1>
    <hr>

    <table class="table table-hover my-5">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Display Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Role</th>
                <th scope="col">Registration Date</th>
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
                </tr>
           <?php endforeach; ?>
        </tbody>
    </table>
</div>