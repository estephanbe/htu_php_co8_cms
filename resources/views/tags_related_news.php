<div class="container my-5">
    <h1 class="text-center">News related to "<?= $data->tag->name; ?>"</h1>
    <hr>


    <div class="news-list my-5">
        <?php

        foreach ($data->news as $news) { ?>

            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $news->post_title ?></h5>
                    <p class="card-text"><?= $news->post_excerpt ?></p>
                    <a href="/single?id=<?= $news->id ?>" class="btn btn-primary">Check News</a>
                </div>
            </div>

        <?php
        }

        ?>
    </div>