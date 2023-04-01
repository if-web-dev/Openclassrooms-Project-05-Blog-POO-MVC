 <!-- Responsive navbar-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container px-5">
        
         <a class="navbar-brand" href="home">
            <img src="assets/img/if-logo.png" height="60" alt="..." />
            IF-WEB-DEV
        </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                 <li class="nav-item"><a class="nav-link active" aria-current="page" href="home">Home</a></li>
                <?php 
                 $session = new App\Core\SESSION();
                 if ($session->getAttribute("profile") ? $session->getAttribute("profile")["is_admin"] : false) : ?>
                    <li class="nav-item"><a class="nav-link" href="admin">Admin</a></li>
                <?php endif ; ?>
                 <li class="nav-item"><a class="nav-link" href="postslist">Postslist</a></li>
                 <li class="nav-item"><a class="nav-link" href="pageCv">About me</a></li>
                 <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
                <?php 
                 $session = new App\Core\SESSION();
                 if ($session->existsAttribute("profile")) : ?>
                    <li class="nav-item"><a class="nav-link" href="logout">Logout</a></li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
                <?php endif; ?>
             </ul>
         </div>
     </div>
 </nav>