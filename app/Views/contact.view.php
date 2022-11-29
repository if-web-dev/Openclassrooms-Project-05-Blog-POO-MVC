<!-- Page Content-->
<div class="container px-4 px-lg-5 main-content">
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0 shadow" width=100% src="assets/img/img-contact.jpg" alt="..." />
        </div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">Contact Page</h1>
            <p>Nurse in retraining, I have been coding since 2019, I have gone through various training
                organizations to improve my skills. Notably <a class="text-secondary" href="https://www.studi.com/fr/formation/developpement/bachelor-developpeur-dapplication-java-0"><strong>Studi</strong>®</a>
                and <a class="text-secondary" href="https://openclassrooms.com/fr/paths/500-developpeur-dapplication-php-symfony"><strong>Openclassrooms</strong>®</a>.
                I want to have a fullstack profile affecting both the front end and the backend.</p>
            <a class="btn btn-outline-dark p-3" href="#contactForm">Contact Me</a>
        </div>
    </div>
    <!-- Call to Action-->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">I use in this project PHP with the MVC design pattern. I also use tools such as
                composer and Bootstrap. Want to get in touch? Fill out the form below to send me a message and
                i will get back to you as soon as possible!</p>
        </div>
    </div>
    <!-- Content Row-->
    <div class="row gx-4 gx-lg-5">

        <div class="d-flex col-md-4 mb-5 justify-content-center">
            <div class="card d-flex column shadow" style="width: 18rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="card-img-top bi bi-telephone-fill my-5" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
                <div class="info-contact card-footer py-4">
                    <p class="h6 card-text text-center">Available 24/7 by calling</p>
                    <p class="h6 card-text text-center">Tel: 01.02.03.04.05</p>
                </div>
            </div>
        </div>

        <div class="d-flex col-md-4 mb-5 justify-content-center">
            <div class="card d-flex column shadow" style="width: 18rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class=" card-img-top bi bi-geo-alt-fill my-5" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                </svg>
                <div class="info-contact card-footer py-4">
                    <p class="h6 card-text text-center">Rue Jean Baptiste Martini</p>
                    <p class="h6 card-text text-center">Villefranche-sur-Saone</p>
                </div>
            </div>
        </div>

        <div class="d-flex col-md-4 mb-5 justify-content-center">
            <div class=" card d-flex column shadow" style="width: 18rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="card-img-top bi bi-envelope-fill my-5" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                </svg>
                <div class="info-contact card-footer py-4">
                    <p class="h6 card-text text-center">Contact me on this mail adress</p>
                    <p class="h6 card-text text-center">i.fouhal@hotmail.com</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section Form-->
    <div class="row justify-content-center my-5" id="contactForm">
        <div class="col-lg-8 col-xl-7">
            <h2 class="mb-4 text-center">Send a message</h2>
            <form id="contactForm" method="post">
                <!-- Name input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="name" name="name" type="text" value="" placeholder="Enter your name..." />
                    <label for="name">Full name</label>
                    <div class="invalid-feedback">A name is required.</div>
                </div>
                <!-- Email address input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="email" name="email" type="email" value="" placeholder="name@example.com" />
                    <label for="email">Email address</label>
                    <div class="invalid-feedback">An email is required.</div>
                    <div class="invalid-feedback">Email is not valid.</div>
                </div>
                <!-- Phone number input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="phone" name="tel" type="tel" value="" placeholder="(123) 456-7890" />
                    <label for="phone">Phone number</label>
                    <div class="invalid-feedback">A phone number is required.
                    </div>
                </div>
                <!-- Message input-->
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="message" name="message" type="text" value="" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                    <label for="message">Message</label>
                    <div class="invalid-feedback">A message is required.</div>
                </div>
                <div class="d-flex justify-content-center">
                    <button href="#contactForm" class="btn btn-outline-dark px-5 py-3" id="submitButton" name="submit" type="submit" value="submit">Send</button>
                </div>
            </form>
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
        </div>
    </div>
</div>