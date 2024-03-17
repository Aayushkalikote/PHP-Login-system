<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href="../logout.php" class="nav-link" title="Logout">
        Logout <i class="fa fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../index.php" class="brand-link">
    <span class="brand-text font-weight-light">Admin Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="<?= $site_url ?>admin/dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="notes_index.php" class="nav-link">
            <i class="nav-icon fas fa-sticky-note nav-icon"></i>
            <p>Notes</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="contacts_index.php" class="nav-link">
            <i class="nav-icon fas fa-question nav-icon"></i>
            <p>Contacts Message</p>
          </a>
        </li>
        <!-- Accounts -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Manage Accounts
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="teachers_index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Teachers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="students_index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Students</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="parents_index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Parents</p>
              </a>
            </li>
            
          </ul>
        </li>

        <!-- Manage Classes -->
        <li class="nav-item has-treeview">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-chalkboard"></i>
            <p>
              Manage Classes
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="sections.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sections</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="classes.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Classes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="courses.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/subjects.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Subects</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/lessons.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lessons</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Class Routine -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
              Manage Class Routines
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/periods.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Periods</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/timetable.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Time Table</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Examination -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Manage Examinations
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/exam-form.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Examination Form</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/admin-card.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Admin card</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/paper-schedule.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Paper Schedule</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/results.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Results</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Attendance -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Manage Attendance
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/attendance.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Attendance</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/leave.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Leave</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Manage Accounts -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-money-check"></i>
            <p>
              Manage Accountings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?= $site_url ?>admin/student-fee.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Student Fee Details</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Study Materials -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-paste"></i>
            <p>
              Study Materials
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/study-materials.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Study Materials</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Event -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>
              Manage Events
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/campus-functions.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Campus Functions</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/webinar-seminar.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Webinar/Seminar</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Communication -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Communications
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/parent-meeting.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Parent's Meetings</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Acadmy Settings -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Acadmy Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>admin/acadamy-settings/basic-information.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Basic Informations</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>



    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">