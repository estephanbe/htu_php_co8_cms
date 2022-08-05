<div class="container my-5">
    <h1 class="text-center">News related to "<?= htmlspecialchars($data->tag->name) ?>"</h1>
    <hr>


    <div class="news-list my-5">
        <?php

        foreach ($data->news as $news) { 
            if(empty($news))
                continue;
            ?>

            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($news->post_title) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($news->post_excerpt )?></p>
                    <a href="/single?id=<?= $news->id ?>" class="btn btn-primary">Check News</a>
                </div>
            </div>

        <?php
        }

        ?>
    </div>