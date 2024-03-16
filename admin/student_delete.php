<?php 
include_once('conn.php');
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `id`='$student_id'";
    $result = mysqli_query($conn, $sql);
     if ($result == TRUE) {
        session_start();
        $_SESSION['message'] = "Student Deleted Successfully";
        header('location:students_index.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

?>