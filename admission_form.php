<?php
include_once('includes/header.php');
include_once('includes/conn.php');

$success = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $sql = "INSERT INTO `notes`(`subject`,`description`,`dt`) VALUES ('$subject','$description', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $success = true;
    } else {
        $showError = "Failed to send message";
    }
}
?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <?php
    if ($success) {
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Your Message Sent successfully!</strong> 
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


    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Admission Form</h1>
                        <form method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Student Name</label>
                                <input type="text" required name="student_name" class="form-control" id="Username" placeholder="Enter Student">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Student Email</label>
                                <input type="email" required name="student_email" class="form-control" id="Email" placeholder="Enter Student Email">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Student phone Number</label>
                                <input type="email" required name="student_number" class="form-control" id="Email" placeholder="Enter Student Number">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Course</label>

                                <select type="text" required name="course" class="form-control" id="exampleInputPassword1">
                                    <?php
                                    $curse_query = mysqli_query($conn, 'SELECT * FROM courses');
                                    while ($course = mysqli_fetch_object($curse_query)) {
                                        echo '<option value="' . $course->id . '">' . $course->name ?? 'hello' . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'includes/scripts.php'; ?>

</html>