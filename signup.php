<?php
include_once('includes/header.php');
$showAlert=false;
$showError=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include('includes/conn.php');
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["cpassword"];

    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $check_username_result = mysqli_query($conn, $check_username_query);

    if (mysqli_num_rows($check_username_result) > 0) {
        $showError = "Username already exists. Please choose a different one.";
    } else {
        if ($password == $confirmPassword) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hashed_password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
}
?>



<body>
<?php include 'includes/navbar.php'; ?>

<?php
    if($showAlert){
    echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>User Signed Up successfully!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if($showError){
    echo'
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$showError.' </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Sign Up Form</h1>
                        <form method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="username" required name="username" class="form-control" id="Username" placeholder="Enter username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" required name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                <input type="password" required name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                            </div>

                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>