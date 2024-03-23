<?php 
include_once('conn.php');
if (isset($_GET['id'])) {
    $section_id = $_GET['id'];
    $sql = "DELETE FROM `sections` WHERE `id`='$section_id'";
    $result = mysqli_query($conn, $sql);
     if ($result == TRUE) {
        session_start();
        $_SESSION['message'] = "Sectinos Deleted Successfully";
        header('location:sections.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

?>