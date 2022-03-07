<?php
session_start();
include_once '../connection.php';

if (isset($_POST['next'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "SELECT * FROM tbl_ts_manager
            INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
            WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_num_rows($result) <= 0) {
        $_SESSION['status'] = 'Sorry you have no Record';
        header("location: ../../forget_password.php");
        exit();
            
    }else {
        while ($fetch = mysqli_fetch_assoc($result)) {
            $_SESSION['email'] = $fetch['email'];
            $_SESSION['fullname'] = $fetch['fname']. ", ". $fetch['lname'];
            header("location: ../../fp_uniqueID.php");
        }
        
        }
    
   

}

?>