<?php
session_start();
include_once '../connection.php';

if (isset($_POST['next'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "SELECT * FROM tbl_municipal_tourism WHERE mt_email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_num_rows($result) <= 0) {
        $_SESSION['status'] = 'Sorry you have no Record';
        header("location: ../../forget_password.php");
        exit();
            
    }else {
        while ($fetch = mysqli_fetch_assoc($result)) {
            $_SESSION['email'] = $fetch['mt_email'];
            $_SESSION['fullname'] = $fetch['mt_fname']. ", ". $fetch['mt_lname'] ;
            header("location: ../../fp_uniqueID.php");
        }
        
        }
    
   

}

?>