<div class="container my-5">
    <h1 class="text-center"><?= $data->options->title; ?></h1>
    <p class="text-center"><?= $data->options->slogan; ?></p>
    <hr>


    <div class="news-list my-5">
        <?php

        foreach ($data->news as $news) { ?>

            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $news->post_title ?></h5>
                    <p class="card-text"><?= $news->post_excerpt ?></p>
                    <a href="#" class="btn btn-primary">Check News</a>
                </div>
            </div>

        <?php
        }

        ?>
    </div>



</div>