<?php
include_once('conn.php');
$success = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $notes_id = $_POST['id'];
    $description = $_POST['description'];
    $sql = "UPDATE `notes` SET `subject`='$subject',`description`='$description',`dt`=current_timestamp() WHERE `id`='$notes_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        session_start();
        $_SESSION['message'] = "Notes Updated Successfully";
        header('location:notes_index.php');
    } else {
        $showError = "Failed to send message";
    }
}
if (isset($_GET['id'])) {
    $notes_id = $_GET['id'];
    if (isset($conn)) {
        $sql = "SELECT * FROM `notes` WHERE `id`='$notes_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $subject = $row['subject'];
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
            <h3 class="card-title">Notes Edit</h3>

        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Notes Edit Form</h1>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Subject</label>
                                    <input type="text" required name="subject" class="form-control" id="Subject" value="<?php echo $subject; ?>" placeholder="Enter Subject">
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
</body>

</html>