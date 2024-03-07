<?php
session_Start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE)
  {
    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin')
    {
      $user_type = $_SESSION['user_type'];
      header('Location: /practise/'.$user_type.'/dashboard.php');
    }
}
  else 
  {
    header('Location: ../login.php');
  }
?>
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">



  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="wrapper">


<?php include 'scripts.php'; ?>