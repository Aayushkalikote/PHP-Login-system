<?php include('conn.php'); ?>
<?php
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $image = $_FILES["thumbnail"]["name"];
    $today = date('Y-m-d');

    $target_dir = "../dist/uploads/";
    $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["thumbnail"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";

    } else {
      if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
        mysqli_query($conn, "INSERT INTO subjects (`name`,`description`, `date`) VALUES ('$name', '$description', '$today')") or die(mysqli_error($conn));
        $_SESSION['success_msg'] = 'Course has been uploaded successfuly';
        header('Location: courses.php'); exit;
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
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
           
            if(isset($_SESSION['success_msg']))
            {?>
              <div class="col-12">
                <small class="text-success" style="font-size:16px"><?=$_SESSION['success_msg']?></small>
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
              Add New Course
            </h3>
          </div>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Subject Name</label>
                <input type="text" name="name" placeholder="Course Name" required class="form-control">
              </div>
            
              <div class="form-group">
                <label for="duration">Subject Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" placeholder="Course Duration" required>
              </div>
              <div class="form-group">
                <input type="file" name="thumbnail" id="thumbnail" required>
              </div>
              <button name="submit" class="btn btn-success">
                Submit
              </button>
            </form>
          </div>
        </div>
        <!-- /.row -->
        <?php }else{?>
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
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                      $count = 1;
                      $subject_query = mysqli_query($conn, 'SELECT * FROM subjects');
                      while ($subject = mysqli_fetch_object($curse_query)) {?>
                      <tr>
                        <td><?=$count++?></td>
                        <td><?=$subject->name?></td>
                        <td><?=$subject->description?></td>
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