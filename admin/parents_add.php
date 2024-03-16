<?php include_once('conn.php');

$student_sql = "SELECT * FROM `users` WHERE `user_type` = 'student'";
$student_result = mysqli_query($conn, $student_sql);
$students = mysqli_fetch_all($student_result, MYSQLI_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $user_type = 'parent';
    $password = $_POST["password"];

    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $check_username_result = mysqli_query($conn, $check_username_query);

    if (mysqli_num_rows($check_username_result) > 0) {
        $_SESSION['message'] = "Username already exists. Please choose a different one.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_parent_sql = "INSERT INTO `users` (`username`, `email`,`password`,`user_type`, `dt`) VALUES ('$username','$email','$hashed_password','$user_type', current_timestamp())";
        $insert_parent_result = mysqli_query($conn, $insert_parent_sql);

        if ($insert_parent_result) {
            $parent_id = mysqli_insert_id($conn);

            $student_id = $_POST["student_id"];
            $insert_relation_sql = "INSERT INTO `parent_student_relation` (`parent_id`, `student_id`) VALUES ('$parent_id', '$student_id')";
            $insert_relation_result = mysqli_query($conn, $insert_relation_sql);

            if ($insert_relation_result) {
                session_start();
                $_SESSION['message'] = "Parent Created Successfully";
                header('Location: parents_index.php');
            } else {
                $_SESSION['message'] = "Failed to create relation. Please try again.";
            }
        } else {
            $_SESSION['message'] = "Failed to create parent. Please try again.";
        }
    }
}
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<body>
    <div class="card">
        <div class="card-header py-2">
            <h3 class="card-title">Add Parent</h3>

        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Parents Add Form</h1>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Username</label>
                                    <input type="text" required name="username" class="form-control" id="Username" placeholder="Enter username">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Student</label>
                                    <select name="student_id" class="form-control" id="student_id">
                                        <option value="" selected>Select Student</option>
                                        <?php foreach ($students as $student) { ?>
                                            <option value="<?= $student["id"] ?>"><?= $student["username"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="email" required name="email" class="form-control" id="email" placeholder="Enter Email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="text" required name="password" class="form-control" id="password" placeholder="Enter password">
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