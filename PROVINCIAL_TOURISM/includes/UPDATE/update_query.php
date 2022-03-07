<?php

include_once '../session.php';

if (isset($_POST['update'])) {
   
    $pt_id = mysqli_real_escape_string($conn, $_POST['pt_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $num = mysqli_real_escape_string($conn, $_POST['num']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $municipal = mysqli_real_escape_string($conn, $_POST['municipal']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);



    $update_query = "UPDATE tbl_provincial_tourism
                     SET ptfname = '$fname', ptlname = '$lname', ptage = '$age', ptbday = '$bday', ptgender = '$gender',
                     email = '$email', phone_num = '$num',
                     ptregCode = '$region', ptbrgyCode = '$brgy', ptcitymunCode = '$municipal', ptprovCode = '$province'
                    
                     WHERE pkpt_id = '$pt_id'";
    if (mysqli_query($conn, $update_query) === true) {

        $_SESSION['status'] = "Data Successfully Updated";
        header("location: ../../update_account.php");

    }else {
        $_SESSION['status'] = "Data Successfully Updated";
        header("location: ../../update_account.php");
    }
   
}

?>