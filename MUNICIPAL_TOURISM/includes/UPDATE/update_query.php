<?php

include_once '../session.php';

if (isset($_POST['update'])) {
   
    $mt_id = mysqli_real_escape_string($conn, $_POST['mt_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $mtm = mysqli_real_escape_string($conn, $_POST['mtm']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $municipal = mysqli_real_escape_string($conn, $_POST['municipal']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);



    $update_query = "UPDATE tbl_municipal_tourism
                     SET mt_fname = '$fname', mt_lname = '$lname', mt_age = '$age', mt_bday = '$bday', mt_gender = '$gender',
                     mt_email = '$email', mt_contact = '$contact', mtm = '$mtm',
                     mt_region = '$region', mt_brgy = '$brgy', mt_municipal = '$municipal', mt_province = '$province'
                    
                     WHERE pkmt_id = '$mt_id'";
    if (mysqli_query($conn, $update_query) === true) {

        $_SESSION['status'] = "Data Successfully Updated";
        header("location: ../../update_account.php");

    }else {
        $_SESSION['status'] = "Data Successfully Updated";
        header("location: ../../update_account.php");
    }
   
}

?>