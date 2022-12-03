<div class="container">
    <!--Alert Message -->
    <?php
    $session = new App\Core\Session();
    if ($session->existsAttribute("alert")) : ?>
            <div class="alert <?= htmlspecialchars($session->getAttribute("alert")["type"]); ?> mt-5" role="alert">
                <?= htmlspecialchars($session->getAttribute("alert")["message"]); ?>
            </div>
    <?php
    $session->unset("alert");
    endif;
    ?>
     <!-- Heading Row-->
     <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7">
            <img class="img-fluid mb-4 mb-lg-0" width=100% src="assets/img/settings-gears.png" alt="..." />
        </div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">Administration Panel</h1>
            <p>In this page, you can manage Users, posts and comments.</p>
        </div>
    </div>
    <!-- DataTables UserList -->
    <div class="card shadow my-5">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Users List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="dataTable table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Registration date</th>
                            <th class="text-center">Statut</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Registration date</th>
                            <th class="text-center">Statut</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($users_list as $user) : ?>
                            <tr>
                                <td class="align-middle"><?= htmlspecialchars($user["name"])." ".htmlspecialchars($user["firstname"]) ?></td>
                                <td class="align-middle">
                                    <a href="mailto: <?= htmlspecialchars($user["email"]) ?>">
                                    <?= htmlspecialchars($user["email"]) ?>
                                    </a>
                                </td>
                                <td class="align-middle"><?= htmlspecialchars($user["created_at"]) ?></td>
                                <td class="align-middle text-center">
                                    <a href="deleteUser?id=<?= htmlspecialchars($user["id"]) ?>" class="btn btn-outline-danger">
                                        Delete Account
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ; ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--DataTables Posts-->
    <div class="card shadow my-5">
        <div class="card-header py-3 d-flex align-items-center">
            <h4 class="m-0 font-weight-bold text-dark">Posts List</h4>
            <a href="addPost" class="btn btn-primary shadow mx-2">+ Add a Post</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Last update</th>
                            <th>Category</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Last update</th>
                            <th>Category</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($posts_list as $post) :?>
                            <tr>
                                <td class="align-middle">
                                    <a href="post?id=<?= htmlspecialchars($post["id"]) ?>">
                                        <?= htmlspecialchars($post["title"]) ?>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <?= htmlspecialchars($post["created_at"])?>
                                </td>
                                <td class="align-middle">
                                    <?= htmlspecialchars($post["update_at"]) ?>
                                </td>
                                <td class="align-middle">
                                    <?= htmlspecialchars($post["name"]) ?>
                                </td>

                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center">
                                    <a href="updatePost?id=<?= htmlspecialchars($post["id"]) ?>" class="btn btn-outline-warning m-1">Edit Post</a>
                                    <a href="deletePost?id=<?= htmlspecialchars($post["id"]) ?>" class="btn btn-outline-danger m-1">Delete Post</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--DataTables Comments -->
    <div class="card shadow my-5">
        <div class="card-header py-3 d-flex align-items-center">
            <h4 class="m-0 font-weight-bold text-dark">Pending comments list</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="dataTable table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="align-middle">
                            <th>Title Post</th>
                            <th>Date</th>
                            <th>Comment's content</th>
                            <th>Edited by</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title Post</th>
                            <th>Date</th>
                            <th>Comment's content</th>
                            <th>Edited by</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                        foreach($pending_comments_list as $comment) :?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($comment["title"]); ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($comment["created_at"]); ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($comment["content"]); ?>
                                </td>
                                <td class="align-middle">
                                    <a href="mailto: <?= htmlspecialchars($comment["email"]) ?>">
                                    <?= htmlspecialchars($comment["email"]); ?>
                                    </a>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="validateComment?id=<?= htmlspecialchars($comment["id"]) ?>" class="btn btn-outline-success m-1">Validate Comment</a>
                                        <a href="deleteComment?id=<?= htmlspecialchars($comment["id"]) ?>" class="btn btn-outline-danger m-1">Delete Comment</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</div class="my-5">