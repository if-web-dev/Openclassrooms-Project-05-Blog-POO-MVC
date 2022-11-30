<div class="container main-content">
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
     <!-- Heading Row-->
     <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0 shadow" width=100% src="assets/img/newspaper.jpg" alt="..." />
        </div>
        <div class="col-lg-5">
            <h1 class="font-weight-light"><?= $posts_list[0]['name'] ?> Posts List</h1>
            <p>In this page you find all ours <?= $posts_list[0]['name'] ?> posts</p>
        </div>
    </div>
    <!-- Posts List -->
    <?php foreach ($posts_list as $post) : ?>
        <div class="card my-5 shadow">
            <div class="card-body">
                <h2>
                    <?= $post["title"] ?>
                </h2>
                <h3>
                    <?= $post["chapo"] ?>
                </h3>
                <small>
                    <?= $post["created_at"] ?>
                    <a href="category?id=<?= App\Core\Get::key('id');?>">
                        <?= $post["name"] ?>
                    </a>
                </small>
                <p>
                    <?= $post["excerpt"] ?>
                </p>
                <a>
                    <a href="/post?id=<?= $post["id"] ?>" class="btn btn-outline-secondary">Lire plus</a>
                </a>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Pagination -->
    <nav class="d-flex justify-content-center my-5">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <?php
            for($i=1; $i<=($nbr_of_pages);$i++) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $i ?>">
                        <?php echo $i ;?>
                    </a>
                </li>
            <?php endfor ?>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>