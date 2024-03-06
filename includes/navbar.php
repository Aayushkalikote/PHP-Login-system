<header class="main-header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">School Managemnt System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notes.php">Notes</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php
                    session_start();
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        echo '<li class="nav-item">
            <a class="nav-link" href="logout.php">Log Out</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./admin/dashboard.php">Dashboard</a>
        </li>
        ';
                    } else {
                        echo '<li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign Up</a>
        </li>';
                    }
                    ?>
                </ul>

            </div>
        </div>
    </nav>

</header>