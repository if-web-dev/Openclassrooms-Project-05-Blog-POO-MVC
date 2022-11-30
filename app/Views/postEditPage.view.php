<div class="container">
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
    <h1 class="my-5 text-center">Update a post</h1>
    <!-- Create an Article -->
    <div class="card shadow my-5">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Update a Post</h5>
        </div>
        <div class="card-body">
            <div class="row justify-content-center mb-5">
                <div>
                    <form method="post" action="postProcessing?id=<?= $dataPostDB["id"] ?>">
                        <!-- Category input-->
                        <div class="my-4">
                            <select class="form-control form-control-lg" name="category" id="category">
                                <?php foreach ($dataCategoryDB as $data) : ?>
                                    <option <?= ($dataPostDB["id_category"] == $data["id"]) ? "selected" : "" ?> value="<?= $data["id"] ?>">
                                        <?= $data["name"] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">A category is required.</div>
                        </div>
                        <!-- title input-->
                        <div class="my-4">
                            <input class="form-control form-control-lg" id="title" name="title" type="text" value="<?= $dataPostDB["title"] ?>" />
                            <div class="invalid-feedback">A title is required.</div>
                        </div>
                        <!-- Chapo input-->
                        <div class="my-4">
                            <input class="form-control form-control-lg" id="chapo" name="chapo" type="text" value="<?= $dataPostDB["chapo"] ?>" />
                            <div class="invalid-feedback">A chapo is required.</div>
                        </div>
                        <!-- Content input-->
                        <div class="my-4">
                            <textarea class="form-control form-control-lg" id="content" name="content" type="text" style="height: 10rem"><?= $dataPostDB["content"] ?></textarea>
                            <div class="invalid-feedback">An article is required.</div>
                        </div>
                        <input type="hidden" id="id" name="id" value="<?= $dataPostDB["id"] ?>">
                        <button class="btn btn-outline-secondary py-3" id="submitButton" name="submitEditPost" type="submit" value="submit">Modifie this Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>