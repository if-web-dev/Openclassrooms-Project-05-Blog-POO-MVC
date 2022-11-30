<div class="container main-content d-flex flex-column">
    <?php
        $session = new App\Core\Session();
        if ($session->existsAttribute("alert")) : ?>
                <div class="alert <?= $session->getAttribute("alert")["type"]; ?> mt-5" role="alert">
                    <?= $session->getAttribute("alert")["message"]; ?>
                </div>
        <?php
        $session->unset("alert");
        endif;
    ?>

    <div class="card m-3 my-5 shadow">
        <div class="card-body">
            <h2>
                <?= $post["title"] ?>
            </h2>
            <h3>
                <?= $post["chapo"] ?>
            </h3>
            <small class="my-3">
                <?= $post["created_at"] ?>
                <?= $post["name"] ?>
            </small>
            <p class="my-3">
                <?= $post["content"] ?>
            </p>
        </div>
        <div class="p-3">
            <hr class="my-5">
            <h4 class="mb40 font500">Comments</h4>
            <div class="media mx-3 mb40">
                <?php foreach($comments as $comment):?>
                    <div class="media-body mx-3">
                        <h5 class="mt-0 font400 clearfix">
                            <?= $comment["name"] ?>
                            <?= $comment["firstname"] ?>
                        </h5>
                        <p>
                            <?= $comment["content"]?>
                        </p>
                    </div>
                <?php endforeach; ?> 
            </div>
            <?php
            $session = new App\Core\Session();
            if ($session->existsAttribute("profile")) : ?>
                <hr class="my-5">
                <h4 class="mb40 font500">Post a comment</h4>
                <form method="post" action="recordComment?id=<?= App\Core\Get::key("id")?>" >
                    <div class="form-group my-2">
                        <textarea class="form-control" rows="5" name="comment">
                        </textarea>
                    </div>
                    <div class="my-2">
                        <button type="submit" class="btn btn-outline-dark btn-lg">Submit</button>
                    </div>
                </form>   
            <?php endif; ?>
        </div>
    </div>
</div>