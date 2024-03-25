<?php 
include_once('conn.php');
if (isset($_GET['id'])) {
    $subject_id = $_GET['id'];
    $sql = "DELETE FROM `subjects` WHERE `id`='$subject_id'";
    $result = mysqli_query($conn, $sql);
     if ($result == TRUE) {
        session_start();
        $_SESSION['success_msg'] = "Subjects Deleted Successfully";
        header('location:subjects.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

?>