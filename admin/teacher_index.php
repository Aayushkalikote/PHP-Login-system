<?php include('conn.php');
$sql = "SELECT * FROM `users` WHERE `user_type` = 'teacher'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<body>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>' . $_SESSION['message'] . '</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        unset($_SESSION['message']);
    }
    ?>

    <div class="card">
        <div class="card-header py-2">
            <h3 class="card-title">Teacher list</h3>
            <div class="card-tools">
                <a href="teachers_add.php" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New Teachers</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive bg-white">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($rows)) :
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <th scope="row"><?= $row["id"] ?></th>
                                    <td><?= $row["username"] ?></td>
                                    <td><?= $row["email"] ?></td>
                                    <td>
                                        <div class="d-flex ">
                                            <a href="notes_edit.php?id=<?php echo $row['id']; ?>" class="nav-link">
                                                Edit
                                            </a>
                                            <a href="notes_delete.php?id=<?php echo $row['id']; ?>" class="nav-link ml-2">
                                                Delete <!-- Add ml-2 (margin-left: 0.5rem) class to create gap -->
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