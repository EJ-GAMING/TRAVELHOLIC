<?php
session_start();
include_once '../connection.php';
    

        if (isset($_POST['update'])) {
            $id = mysqli_real_escape_string($conn, $_POST['user_id']);
            $uname = mysqli_real_escape_string($conn, $_POST['uname']);
            $pass1 = mysqli_real_escape_string($conn, SHA1($_POST['pass1']));
          

           
                $select = mysqli_query($conn, "SELECT * FROM tbl_ts_manager WHERE user_id = '$id'");

                if (mysqli_num_rows($select) <= 0) {
                    $_SESSION['status'] = 'Sorry Failed to Update Your Account';
                    header("location: ../../change_pass.php");
                }else {
                        $sql = mysqli_query($conn, "UPDATE tbl_ts_manager
                        SET uname = '$uname', pass = '$pass1'
                        WHERE user_id = '$id'");

                         $_SESSION['status'] = 'Account Successfully Update Please Login Now';
                         header("location: ../../index.php");
               
                }
            
                

          
                
               
           
        }



?>