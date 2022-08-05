<div class="container my-5">
    <h1 class="text-center"><?= htmlspecialchars($data->item->post_title) ?></h1>
    <hr>

    <div class="my-3">
        <strong class="d-block">Author</strong>
        <?= $data->item->post_author ?>
    </div>
    <div class="my-3">
        <strong class="d-block">Created At</strong>
        <?= $data->item->created_at ?>
    </div>
    <div class="my-3">
        <strong class="d-block">Content</strong>
        <?= htmlspecialchars($data->item->post_content) ?>
    </div>
    <?php
    if (!empty($data->tags)) { ?>
        <div class="my-3">
            <strong class="d-block">Tags:</strong>
            <?php
            $tags = '';
            foreach ($data->tags as $tag) {
                $tags .= htmlspecialchars($tag->name) . ", ";
            }
            echo rtrim($tags, ', ');
            ?>
        </div>
    <?php
    }
    ?>
</div>