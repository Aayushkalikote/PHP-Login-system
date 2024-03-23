<?php
include_once('conn.php');
$success = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $sections_id = $_POST['id'];
    $sql = "UPDATE `sections` SET `name`='$name' WHERE `id`='$sections_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        session_start();
        $_SESSION['message'] = "Sections Updated Successfully";
        header('location:sections.php');
    } else {
        $showError = "Failed to send message";
    }
}
if (isset($_GET['id'])) {
    $sections_id = $_GET['id'];
    if (isset($conn)) {
        $sql = "SELECT * FROM `sections` WHERE `id`='$sections_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row['name'];
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
            <h3 class="card-name">Sections Edit</h3>

        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Sections Edit Form</h1>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text"  name="name" class="form-control" id="Subject" value="<?php echo $name; ?>" placeholder="Enter name">
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