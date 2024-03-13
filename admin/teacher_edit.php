<?php
include_once('conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $teacher_id = $_POST['id'];
    $email = $_POST['email'];

    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username' AND `id` != '$teacher_id'";
    $check_username_result = mysqli_query($conn, $check_username_query);
    if (mysqli_num_rows($check_username_result) > 0) {
        session_start();
        $_SESSION['error_message'] = "Username already exists. Please choose a different one.";
    } else {
        $sql = "UPDATE `users` SET `username`='$username',`email`='$email',`dt`=current_timestamp() WHERE `id`='$teacher_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            session_start();
            $_SESSION['message'] = "Teacher Details Updated Successfully";
            header('location:teachers_index.php');
            exit();
        } else {
            session_start();
            $_SESSION['error_message'] = "Failed to update teacher details";
        }
    }
}

if (isset($_GET['id'])) {
    $teacher_id = $_GET['id'];
    if (isset($conn)) {
        $sql = "SELECT * FROM `users` WHERE `id`='$teacher_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $username = $row['username'];
                    $email = $row['email'];
                    $id = $row['id'];
                }
            } else {
                echo "No records found.";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Database connection not established.";
    }
}
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<body>

    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>' . $_SESSION['error_message'] . '</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        unset($_SESSION['error_message']); // unset error message after displaying it
    }
    ?>
    <div class="card">
        <div class="card-header py-2 d-flex justify-content-between align-items-center">
            <h3 class="card-title">Teachers Edit</h3>
            <div class="breadcrumb-container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="teachers_index.php">Teachers</a></li>
                    <li class="breadcrumb-item active">Teache Edit</li>
                </ol>
            </div>
        </div>

        <div class="card-body">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Teachers Edit Form</h1>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Username</label>
                                    <input type="text" required name="username" class="form-control" id="Subject" value="<?php echo $username; ?>" placeholder="Enter Subject">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <input type="email" required name="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="Enter Email">
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
