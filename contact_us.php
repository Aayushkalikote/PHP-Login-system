<?php
include_once('includes/header.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include('includes/conn.php');
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $sql = "INSERT INTO `contact_us`(`name`, `email`, `message`, `dt`) VALUES ('$name', '$email', '$message', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
    
        session_start();
        $_SESSION['success_message'] = "Message sent successfully!";
    
        header('location:index.php');
    }else{
        // Setting error message in session
        session_start();
        $_SESSION['error_message'] = "Failed to send message";
        $showError = "Failed to send message";
    }
}
?>