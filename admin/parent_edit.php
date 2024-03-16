<?php
include_once('conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $parent_id = $_POST['id'];
    $email = $_POST['email'];

    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username' AND `id` != '$parent_id'";
    $check_username_result = mysqli_query($conn, $check_username_query);
    if (mysqli_num_rows($check_username_result) > 0) {
        session_start();
        $_SESSION['error_message'] = "Username already exists. Please choose a different one.";
    } else {
        $sql = "UPDATE `users` SET `username`='$username',`email`='$email',`dt`=current_timestamp() WHERE `id`='$teacher_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            session_start();
            $_SESSION['message'] = "Student Details Updated Successfully";
            header('location:students_index.php');
            exit();
        } else {
            session_start();
            $_SESSION['error_message'] = "Failed to update teacher details";
        }
    }
}

if (isset($_GET['id'])) {
    $parent_id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id`='$parent_id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $parent_data = mysqli_fetch_assoc($result);
        $username = $parent_data['username'];
        $email = $parent_data['email'];

        // Fetch related students
        $sql_students = "SELECT * FROM `users` WHERE `id` IN (SELECT `student_id` FROM `parent_student_relation` WHERE `parent_id`='$parent_id')";
        $result_students = mysqli_query($conn, $sql_students);

        if ($result_students && mysqli_num_rows($result_students) > 0) {
            while ($row_student = mysqli_fetch_assoc($result_students)) {

                $student_username = $row_student['username'];
               
            }
        } else {
            echo "No related Student found.";
        }
    } else {
        echo "No records found for the parent.";
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
            <h3 class="card-title">Parents Edit</h3>
            <div class="breadcrumb-container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="teachers_index.php">Parents</a></li>
                    <li class="breadcrumb-item active">Parents Edit</li>
                </ol>
            </div>
        </div>

        <div class="card-body">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Parents Edit Form</h1>
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
                                <div class="mb-3">
                                    <label for="name" class="form-label">Student</label>
                                    <select name="student_id" class="form-control" id="student_id">
                                        <?php foreach ($students as $student) { ?>
                                            <option value="<?= $student["id"] ?>" <?php if ($student["id"] == $selected_student_id) echo "selected"; ?>>
                                                <?= $student["username"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-block btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>