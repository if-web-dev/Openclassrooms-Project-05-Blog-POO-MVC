<div class="container main-content">
    <!-- Alert Message -->
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
            <h1 class="font-weight-light">Posts List</h1>
            <p>In this page you find all ours posts with all categories</p>
        </div>
    </div>
    <!-- Posts List -->
    <div class="card my-5 shadow">
        <div class="card-body">
            <h2>

            </h2>
            <h3>

            </h3>
            <small>

                <a href="">

                </a>
            </small>
            <p>

            </p>
            <a>
                <a href="/post?id=" class="btn btn-outline-secondary">Lire plus</a>
            </a>
        </div>
    </div>

    <!--Pagination -->
    <nav class="d-flex justify-content-center my-5">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item">
                <a class="page-link" href="?page=">
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>