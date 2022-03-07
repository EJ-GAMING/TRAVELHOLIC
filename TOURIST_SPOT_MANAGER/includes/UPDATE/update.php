<?php
include_once '../session.php';


if (isset($_POST['update'])) {
  
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, SHA1($_POST['pass']));
    $auth = mysqli_real_escape_string($conn, SHA1($_POST['cur_pass']));
    $cur_pass = mysqli_real_escape_string($conn, $user['pass']);
    $id = mysqli_real_escape_string($conn, $user['tsm_id']);

    if (empty($auth)) {
        $_SESSION['status'] = "Please Insert Current Password";
        header("location: ../../home.php");
    }elseif ($auth !== $cur_pass) {
        $_SESSION['status'] = "Invalid Password";
        header("location: ../../home.php");
    }else {
        $sql = "UPDATE tbl_ts_manager
                SET uname = '$uname', pass = '$pass'
                WHERE tsm_id = '$id'";
                if (mysqli_query($conn, $sql) === true) {
                    $_SESSION['status'] = "Account Successfully Updated";
                    header("location: ../../home.php");
                }
    }


    



}


?>