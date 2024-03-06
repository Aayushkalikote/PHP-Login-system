<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <?php
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' . $_SESSION['success_message'] . '</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        unset($_SESSION['success_message']);
    }

    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>' . $_SESSION['error_message'] . '</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        unset($_SESSION['error_message']);
    }
    ?>
    <div class="py-5 shadow" style="background:linear-gradient(-45deg, #3923a7 50%, transparent 50%)">
        <div class="container-fluid my-2">
            <div class="row">
                <div class="col-lg-6 my-auto">
                    <h1 class="display-3 font-weight-bold">Addmission Open for 2024-2025</h1>
                    <p class="py-lg-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro aperiam similique error, <br> iste molestiae dignissimos odit voluptat</p>
                    <a href="" class="btn btn-lg btn-primary">Call to Action</a>
                </div>
                <div class="col-lg-6">
                    <div class="col-lg-8 mx-auto card shadow-lg">
                        <div class="card-body py-5">
                            <h3>Contact Us Form</h3>
                            <form action="contact_us.php" method="post" class="">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" required name="name" class="form-control" id="Username" placeholder="Enter username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <input type="email" required name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Your Message</label>
                                    <textarea type="text" required name="message" class="form-control" id="exampleInputPassword1">
                                </textarea>
                                </div>

                                <button class="btn btn-primary btn-block">Submit Form</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About us -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-5 ">
                    <h2 class="font-weight-bold">About <br> School Management System</h2>
                    <div class="pr-5">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque quidem id ad dolores iusto nobis sunt, atque, eligendi nesciunt ipsa aliquam mollitia nemo magnam quae adipisci libero voluptatum omnis vel. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo dicta ipsum ea sint quisquam sit dignissimos numquam. Velit aliquid necessitatibus id adipisci officiis nobis voluptates maiores consectetur, sunt nisi? Commodi.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quos ab, recusandae repellendus cum quasi totam saepe sit earum tenetur modi vitae explicabo, neque, consequatur aut ipsam dolore magni laudantium?</p>
                    </div>
                    <a href="about_us.php" class="btn btn-secondary">Know More</a>
                </div>
                <div class="col-lg-6" style="background:url(./assets/images/still-life-851328_1280.jpg)">
                </div>
            </div>
        </div>
    </section>
    <style>
        .course-image {
            width: 100%;
            height: 170px !important;
            object-fit: cover;
            object-position: center;
        }
    </style>


    <!-- Teachers -->
    <section class="py-5">
        <div class="text-center mb-5">
            <h2 class="font-weight-bold">Our Teachers</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
        </div>

        <div class="container">
            <div class="row">
                <?php for ($i = 0; $i < 6; $i++) { ?>
                    <div class="col-lg-4 my-5">
                        <div class="card">
                            <div class="col-5 position-absolute" style="top:-50px">
                                <img src="./assets/images/placeholder.jpg" alt="" class="mw-100 border rounded-circle">
                            </div>
                            <div class="card-body pt-5 mt-4">
                                <h5 class="card-title mb-0">Teacher's Name</h5>
                                <p><i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i></p>
                                <p class="card-text">
                                    <b>Courses: </b> 5 <br>
                                    <b>Ratings: </b>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Acheivements -->
    <section class="py-5 text-white" style="background:#3923a7">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pr-5">
                        <h2>Acheivements</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, commodi laboriosam. Ullam aliquam dicta officiis accusamus.</p>

                        <img src="./assets/images/still-life-851328_1280.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-lg-6 my-auto">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="border rounded">
                                    <div class="card-body text-center">
                                        <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                                        <h2 class="my-2 font-weight-bold h1">334</h2>
                                        <hr class="border-warning">
                                        <h4>Graduates</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="border rounded">
                                    <div class="card-body text-center">
                                        <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                                        <h2 class="my-2 font-weight-bold h1">334</h2>
                                        <hr class="border-warning">
                                        <h4>Graduates</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="border rounded">
                                    <div class="card-body text-center">
                                        <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                                        <h2 class="my-2 font-weight-bold h1">334</h2>
                                        <hr class="border-warning">
                                        <h4>Graduates</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="border rounded">
                                    <div class="card-body text-center">
                                        <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                                        <h2 class="my-2 font-weight-bold h1">334</h2>
                                        <hr class="border-warning">
                                        <h4>Graduates</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>