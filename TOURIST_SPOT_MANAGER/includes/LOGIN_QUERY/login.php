<?php
include '../connection.php';
session_start();

if(isset($_POST['btn_login'])){
    
    $username = mysqli_real_escape_string($conn, $_POST['txt_user']);
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
        $login_query =" SELECT * 
                    FROM tbl_ts_manager
                    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
                    INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
                    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
                    WHERE tbl_ts_manager.uname = '$username' and pass = '$pass' limit 1";
        $login_result = mysqli_query($conn, $login_query);

        if (mysqli_num_rows($login_result) < 1) {
            $_SESSION['status'] = "INVALID USERNAME OR PASSWORD";
            header("location: ../../index.php");
        }
        else{
            $row = mysqli_fetch_assoc($login_result);
            if(mysqli_num_rows($login_result) > 0){
            	$_SESSION['tsm101'] = $row['tsm_id'];
                $_SESSION['status'] = "SUCCESSFULLY LOGIN";
                header("location: ../../home.php");
			}	
			else{
				$_SESSION['status'] = 'Incorrect password';
			}
           
        }

    }
  

       

    

  

   
  
}else {
    $_SESSION['status'] = "Access Denied";
    header("location: http://localhost/capstone/TOURIST_SPOT_MANAGER/index.php");
}


?>