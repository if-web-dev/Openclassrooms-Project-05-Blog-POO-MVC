
<!-- Page Content-->
<div class="container px-4 px-lg-5 main-content">
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
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0 shadow" src="assets/img/img-home.png" alt="..." /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">Home Page</h1>
            <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components.</p>
            <a class="btn btn-outline-dark p-3" href="#!">Call to Action!</a>
        </div>
    </div>
    <!-- Call to Action-->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
            <h2 class="text-white m-0">Discover Code with Isaac's blog !</h2>
            <h3>Here is the catégories of the blog.</h3>
        </div>
    </div>
    <!-- Content Row-->
    <div class="row gx-4 gx-lg-5">
        <?php foreach($categories as $categorie) :?>
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="category?id=<?= $categorie["id"] ?>">
                    <img class="rounded shadow" src="assets/img/catégories/<?= $categorie["name"] ?>.png" width=100% alt="...">
                </a>
            </div>
        <?php endforeach ;?>         
        </div>
    </div>
</div>