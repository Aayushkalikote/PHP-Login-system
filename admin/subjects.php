<?php include('conn.php'); ?>
<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];

  $sql = "INSERT INTO `subjects` (`name`, `description`) VALUES ('$name','$description')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    session_start();
    $_SESSION['success_msg'] = "Subject Created Succesfully";
    header('Location:subjects.php');
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
        <h1 class="m-0 text-dark">Manage Subjects </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Subjects</li>
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
            Add New Subjects
          </h3>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name">Subject Name</label>
              <input type="text" name="name" placeholder="Subject Name" required class="form-control">
            </div>

            <div class="form-group">
              <label for="duration">Subject Description</label>
              <textarea type="text" name="description" id="duration" class="form-control" placeholder="Subject Description" required> </Textarea>
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
            Subjects
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
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count = 1;
                $subject_query = mysqli_query($conn, 'SELECT * FROM subjects');
                while ($subject = mysqli_fetch_object($subject_query)) { ?>
                  <tr>
                    <td><?= $count++ ?></td>
                    <td><?= $subject->name ?></td>
                    <td><?= $subject->description ?></td>
                    <td>
                      <div class="d-flex ">
                        <a href="subject_edit.php?id=<?php echo  $subject->id; ?>" class="nav-link text-primary">
                          Edit
                        </a>
                        <a href="subject_delete.php?id=<?php echo $subject->id; ?>" class="nav-link ml-2 text-danger">
                          Delete <!-- Add ml-2 (margin-left: 0.5rem) class to create gap -->
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
                </toby>
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