<?php
include_once '../session.php';


if (isset($_POST['update'])) {
  
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, SHA1($_POST['pass']));
    $auth = mysqli_real_escape_string($conn, SHA1($_POST['cur_pass']));
    $cur_pass = mysqli_real_escape_string($conn, $user['pass']);
    $id = mysqli_real_escape_string($conn, $user['pkpt_id']);

    if (empty($auth)) {
        $_SESSION['status'] = "Please Insert Current Password";
        header("location: ../../home.php");
    }elseif ($auth !== $cur_pass) {
        $_SESSION['status'] = "Invalid Password";
        header("location: ../../home.php");
    }else {
        $sql = "UPDATE tbl_provincial_tourism
                SET uname = '$uname', pass = '$pass'
                WHERE pkpt_id = '$id'";
                if (mysqli_query($conn, $sql) === true) {
                    $_SESSION['status'] = "Account Successfully Updated";
                    header("location: ../../home.php");
                }
    }


    



}


?>