<?php 
include_once('conn.php');
if (isset($_GET['id'])) {
    $note_id = $_GET['id'];
    $sql = "DELETE FROM `notes` WHERE `id`='$note_id'";
    $result = mysqli_query($conn, $sql);
     if ($result == TRUE) {
        session_start();
        $_SESSION['message'] = "Notes Deleted Successfully";
        header('location:notes_index.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

?>