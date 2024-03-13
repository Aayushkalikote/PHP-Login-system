<?php include('conn.php');
$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<body>
<?php
if (isset($_SESSION['message'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>' . $_SESSION['message'] . '</strong>
    </div>';
    unset($_SESSION['message']);
}
?>

    <div class="card">
        <div class="card-header py-2">
            <h3 class="card-title">Notes list</h3>
            <div class="card-tools">
              <a href="../notes.php" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New Notes</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive bg-white">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date/Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($rows)) :
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <th scope="row"><?= $row["id"] ?></th>
                                    <td><?= $row["subject"] ?></td>
                                    <td><?= $row["description"] ?></td>
                                    <td><?= $row["dt"] ?></td>
                                    <td>
                                        <div class="d-flex ">
                                            <a href="notes_edit.php?id=<?php echo $row['id']; ?>" class="nav-link text-primary">
                                                Edit
                                            </a>
                                            <a href="notes_delete.php?id=<?php echo $row['id'];?>" class="nav-link ml-2 text-danger">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else : ?>
                            <tr>
                                <td colspan="5">No data found</td>
                            </tr>
                        <?php endif; ?>

                        <?php
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        ?>
                    </tbody>


                </table>
            </div>

        </div>
    </div>

</body>

</html>