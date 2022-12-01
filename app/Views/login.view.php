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
            <div id="login" class="bg-secondary p-3 shadow d-block rounded">
                <h3 class="text-center mb-0 text-white">Welcome</h3>
                <p class="text-center text-white">Sign in by entering the information below</p>
                <form method="POST" class="login-form" id="login-form" action="validationLogin">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control p-2 chars_only" placeholder="E-mail" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control p-2" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn form-control btn-primary rounded submit p-3" name="login_submit" value="login_submit" id="login_form">Get
                            Started</button>
                    </div>
                </form>
                <div class="w-100 text-center mt-4 text">
                    <p class="mb-0 text-white">Don't have an account?</p>
                    <a href="signin" id="signup">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>