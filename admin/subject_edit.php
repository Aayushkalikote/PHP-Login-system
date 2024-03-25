<?php
include_once('conn.php');
$success = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sql = "UPDATE `subjects` SET `name`='$name',`description`='$description' WHERE `id`='$subject_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        session_start();
        $_SESSION['success_msg'] = "Subject Updated Successfully";
        header('location:subjects.php');
    } else {
        $showError = "Failed to send message";
    }
}
if (isset($_GET['id'])) {
    $subject_id = $_GET['id'];
    if (isset($conn)) {
        $sql = "SELECT * FROM `subjects` WHERE `id`='$subject_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row['name'];
                    $description = $row['description'];
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
    

    <div class="card">
        <div class="card-header py-2">
            <h3 class="card-title">Subject Edit</h3>

        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Subject Edit Form</h1>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Subject Name</label>
                                    <input type="text" required name="name" class="form-control" id="name" value="<?php echo $name; ?>" placeholder="Enter Subject">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Description</label>
                                    <textarea type="text" required name="description" class="form-control" id="exampleInputPassword1"><?php echo $description; ?>
                                    </textarea>
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