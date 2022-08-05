<div class="container my-5">
    <h1 class="text-center">Site Tags</h1>
    <hr>

    <div class="news-list my-5 d-flex justify-content-between">
        <?php

        foreach ($data->tags as $tag) { ?>

            <div class="card my-3" style="width: 14rem;">
                <div class="card-body">
                    <h5 class="card-title text-center"><?= htmlspecialchars($tag->name) ?></h5>
                    <a href="/news_tags?tag_id=<?= $tag->id ?>" class="btn btn-primary">Check Related News</a>
                </div>
            </div>

        <?php
        }

        ?>
    </div>
</div>