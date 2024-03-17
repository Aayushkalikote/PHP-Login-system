<?php include('../includes/conn.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
       <a href="students_index.php" style="text-decoration: none;">
      <div class="col-12 col-sm-6 col-md-3">
       
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>

            <?php
            if (isset($conn)) {
              $sql = "SELECT COUNT(*) as total_students FROM `users` WHERE `user_type` = 'student'";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $total_students = $row['total_students'];

                echo '
    <div class="info-box-content">
        <span class="info-box-text">Total Students</span>
        <span class="info-box-number">' . $total_students . '</span>
    </div>';
              } else {
                echo "Error: " . mysqli_error($conn);
              }
            } else {
              echo "Error: Database connection not established.";
            }
            ?>

         
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
      </div>


      <!-- fix for small devices only -->
      <div class="col-12 col-sm-6 col-md-3">
      <a href="notes_index.php" style="text-decoration: none;">
          <div class="info-box mb-3">
        
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-sticky-note nav-icon"></i></span>

            <?php
            if (isset($conn)) {
              $sql = "SELECT COUNT(*) as total_notes FROM `notes`";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $total_notes = $row['total_notes'];

                echo '
              <div class="info-box-content">
                <span class="info-box-text">Total Notes</span>
              <span class="info-box-number">' . $total_notes . '</span>
             </div>';
              } else {
                echo "Error: " . mysqli_error($conn);
              }
            } else {
              echo "Error: Database connection not established.";
            }
            ?>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <a href="contacts_index.php" style="text-decoration: none;">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-question"></i></span>

          <?php
            if (isset($conn)) {
              $sql = "SELECT COUNT(*) as total_contacts FROM `contact_us`";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $total_contacts = $row['total_contacts'];

                echo '
              <div class="info-box-content">
                <span class="info-box-text">Total Query</span>
              <span class="info-box-number">' . $total_contacts . '</span>
             </div>';
              } else {
                echo "Error: " . mysqli_error($conn);
              }
            } else {
              echo "Error: Database connection not established.";
            }
            ?>
          <!-- /.info-box-content -->
        </div>
        </a>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php') ?>