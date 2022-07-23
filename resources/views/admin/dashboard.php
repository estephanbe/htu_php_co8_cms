<div class="container">
    <h1 class="text-center"><?= $data->title; ?></h1>
    <p class="text-center"><?= $data->slogan; ?></p>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of Users:</h5>
                    <p class="card-text"><?= $data->users_count ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Numbre of News Posts</h5>
                    <p class="card-text"><?= $data->news_count ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of Tags</h5>
                    <p class="card-text"><?= $data->tags_count ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of News Posts for The Adminstrator</h5>
                    <p class="card-text"><?= $data->admin_posts ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

