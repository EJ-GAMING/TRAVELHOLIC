<?php
include_once '../session.php';


if (isset($_POST['edit'])) {
    $tsm_id = $_POST['tsm_id'];
              
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $fname =mysqli_real_escape_string($conn,  $_POST['fname']);
    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $region =mysqli_real_escape_string($conn, $_POST['region']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $municipal = mysqli_real_escape_string($conn, $_POST['municipal']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $pos = mysqli_real_escape_string($conn, $_POST['pos']);
    $tsn = mysqli_real_escape_string($conn, $_POST['tsn']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
  

                $update_query = "UPDATE tbl_ts_manager
                    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
                    INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
                    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
                    INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
                    SET lname = '$lname', fname = '$fname',
                    bday = '$bday', age = '$age', gender = '$gender',
                    regCode = '$region',
                    brgyCode = '$brgy',citymunCode = '$municipal',provCode = '$province',
                    pos = '$pos', ts_name = '$tsn', phone_num = '$phone', email = '$email'
                    WHERE tbl_ts_manager.tsm_id = '$tsm_id'";

                        if ($update_result = mysqli_query($conn, $update_query) === true) {
                          $_SESSION['status'] = "Data Successfully Updated";
                          header("location: ../../update_account.php");
                        }else {
                          $_SESSION['status'] = "Data Failed to Update";
                          header("location:../../update_account.php");
                        }
                     
                 
                    
}
?>