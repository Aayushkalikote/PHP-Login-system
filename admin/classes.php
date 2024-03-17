<?php include('conn.php'); ?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    $sql = "INSERT INTO `classes` (`name`) VALUES ('$name')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        session_start();
        $_SESSION['success_msg'] = "CLass Created Succesfully";
        header('Location:classes.php');
    }
}

?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Classes </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Classes</li>
                </ol>
            </div><!-- /.col -->
            <?php

            if (isset($_SESSION['success_msg'])) { ?>
                <div class="col-12">
                    <small class="text-success" style="font-size:16px"><?= $_SESSION['success_msg'] ?></small>
                </div>
            <?php
                unset($_SESSION['success_msg']);
            }
            ?>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php
        if (isset($_REQUEST['action'])) { ?>
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header py-2">
                    <h3 class="card-title">
                        Add Classes
                    </h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Classes Name</label>
                            <input type="text" name="name" placeholder="Classes Name" required class="form-control">
                        </div>

                        <button name="submit" class="btn btn-success">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        <?php } else { ?>
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header py-2">
                    <h3 class="card-title">
                    Classes
                    </h3>
                    <div class="card-tools">
                        <a href="?action=add-new" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-white">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Class Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $class_query = mysqli_query($conn, 'SELECT * FROM classes');

                                if (mysqli_num_rows($class_query) > 0) {
                                    while ($class = mysqli_fetch_object($class_query)) {
                                ?>
                                        <tr>
                                            <td><?= $count++ ?></td>
                                            <td><?= $class->name ?></td>
                                            <td>
                                                <div class="d-flex ">
                                                    <a href="classes_edit.php?id=<?php echo $class->id; ?>" class="nav-link text-primary">
                                                        Edit
                                                    </a>
                                                    <a href="classes_delete.php?id=<?php echo $class->id; ?>" class="nav-link ml-2 text-danger">
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    // If no records found, display "No data found" message
                                    ?>
                                    <tr>
                                        <td colspan="2">No data found</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        <?php } ?>
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php') ?>