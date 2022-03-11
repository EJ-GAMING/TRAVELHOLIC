<?php
include_once '../connection.php';
session_start();

if (isset($_POST['btn_login'])) {
    $username = mysqli_real_escape_string($conn,$_POST['txt_user']);
    $pass = mysqli_real_escape_string($conn, SHA1($_POST['txt_pass']));

    if(empty($username)){
        $_SESSION['status'] = "EMAIL IS REQUIRED";
        header("location: ../../index.php");
        exit();
       }
    elseif(empty($pass)){
        $_SESSION['status'] = "PASSWORD IS REQUIRED";
        header("location: ../../index.php");
        exit();
       }
       else{
        $login_query ="SELECT * 
                    FROM tbl_municipal_tourism
                    WHERE mt_username = '$username' and mt_password = '$pass' limit 1";
        $login_result = mysqli_query($conn, $login_query);
        $row = mysqli_fetch_assoc($login_result);
        $email = $row['mt_username'];
        $passw = $row['mt_password'];

        if ($username !== $row['mt_username']) {
            $_SESSION['status'] = "INVALID USERNAME & PASSWORD";
            header("location: ../../index.php");
        }
        elseif ($username === $email && $pass === $passw) {
                $_SESSION['mt'] = $row['pkmt_id'];
                $_SESSION['status'] = "SUCCESSFULLY LOGIN";
                header("location: ../../home.php");
        }
		else{
				$_SESSION['status'] = 'INVALID PASSWORD';
                header("location: ../../index.php");
            }
        }
    
}else {
    $_SESSION['status'] = "Access Denied";
    header("location: ../../index.php");
}

?>