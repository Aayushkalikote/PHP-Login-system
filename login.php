<?php
include_once('includes/header.php');
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('includes/conn.php');
    $username = $_POST["username"];
    $password = $_POST["password"]; 

    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        if (password_verify($password, $hashed_password)) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $row['user_type'];
          
            header('Location: ' . $_SESSION['user_type'] . '/dashboard.php');
            exit; 
        } else {
            $showError = "Invalid Credentials";
        }
    } else {
        $showError = "Invalid Credentials";
    }
}


?>



<body>
    <?php include 'includes/navbar.php'; ?>
    <?php
    if ($login) {
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Logged In  successfully!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($showError) {
        echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>' . $showError . ' </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="py-5 shadow" style="background:linear-gradient(-45deg, #3923a7 50%, transparent 50%)">

        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Login Form</h1>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="username" required name="username" class="form-control" id="Username" placeholder="Enter username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" required name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                                </div>


                                <button type="submit" class="btn btn-primary btn-block">Log IN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'includes/scripts.php'; ?>

</html>