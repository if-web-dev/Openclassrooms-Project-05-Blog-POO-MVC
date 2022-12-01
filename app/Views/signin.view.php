<!-- Page Content -->
<div class="container main-content">
    <div class="d-flex flex-column justify-content-center align-items-center h-100">
        <!-- Alert Message -->
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
        <!-- Login Section Form-->
        <div class="col-md-6 col-lg-4">
            <!-- Signin Section Form-->
            <div id="signin" class="login-wrap bg-secondary p-3 shadow rounded">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url(assets/img/header-logo-login.png);"></div>
                <h3 class="text-center mb-0 text-white">Welcome</h3>
                <p class="text-center text-white">Create an account by entering the information below</p>
                <form method="POST" action="validationLogin">
                    <!-- Name input-->
                    <div class="form-group mb-3">
                        <div class="icon d-flex align-items-center justify-content-center"></div>
                        <input type="text" name="name" id="signin-name" class="form-control" placeholder="Name">
                    </div>
                    <!-- Firstname input-->
                    <div class="form-group mb-3">
                        <div class="icon d-flex align-items-center justify-content-center"></div>
                        <input type="text" name="firstname" id="signin-firstname" class="form-control" placeholder="Firstname">
                    </div>
                    <!-- Email input-->
                    <div class="form-group mb-3">
                        <div class="icon d-flex align-items-center justify-content-center"></div>
                        <input type="email" name="email" id="signin-email" class="form-control" placeholder="Email">
                    </div>
                    <!-- Password input-->
                    <div class="form-group mb-3">
                        <div class="icon d-flex align-items-center justify-content-center"></div>
                        <input type="password" name="password" id="signin-password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signin_submit" class="btn form-control btn-primary rounded submit p-3" id="signin_form">Get
                            Started</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>