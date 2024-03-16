<?php include('conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $user_type = 'student';
    $password = $_POST["password"];

    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $check_username_result = mysqli_query($conn, $check_username_query);
    
    if (mysqli_num_rows($check_username_result) > 0) {
        $_SESSION['message'] = "Username already exists. Please choose a different one.";
    } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `users` (`username`, `email`,`password`,`user_type`, `dt`) VALUES ('$username','$email','$hashed_password','$user_type', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                session_start();
                $_SESSION['message']="Student Created Succesfully";
                header('Location:students_index.php');
            }
        
    }
}
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<body>
<div class="card">
        <div class="card-header py-2">
            <h3 class="card-title">Add Student</h3>

        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Students Add Form</h1>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Username</label>
                                    <input type="text" required name="username" class="form-control" id="Username"  placeholder="Enter username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <input type="email" required name="email" class="form-control" id="email"  placeholder="Enter Email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="text" required name="password" class="form-control" id="password"  placeholder="Enter password">
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>