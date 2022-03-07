<?php
include_once '../session.php';


if (isset($_POST['update'])) {
  
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, SHA1($_POST['pass']));
    $auth = mysqli_real_escape_string($conn, SHA1($_POST['cur_pass']));
    $cur_pass = mysqli_real_escape_string($conn, $user['mt_password']);
    $id = mysqli_real_escape_string($conn, $user['pkmt_id']);
    
    
    if (empty($auth)) {
        $_SESSION['status'] = "Please Insert Current Password";
        header("location: ../../home.php");
    }elseif ($auth !== $cur_pass) {
        $_SESSION['status'] = "Invalid Password";
        header("location: ../../home.php");
    }else {
        $sql = "UPDATE tbl_municipal_tourism
                SET mt_username = '$uname', mt_password  = '$pass'
                WHERE pkmt_id = '$id'";
                if (mysqli_query($conn, $sql) === true) {
                    $_SESSION['status'] = "Account Successfully Updated";
                    header("location: ../../home.php");
                }
    }


    



}


?>