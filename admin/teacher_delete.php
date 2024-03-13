<?php 
include_once('conn.php');
if (isset($_GET['id'])) {
    $teacher_id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `id`='$teacher_id'";
    $result = mysqli_query($conn, $sql);
     if ($result == TRUE) {
        session_start();
        $_SESSION['message'] = "Teacher Deleted Successfully";
        header('location:teachers_index.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

?>