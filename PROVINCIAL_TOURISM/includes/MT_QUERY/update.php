<?php
include_once '../session.php';

if (isset($_POST['update'])) {
   

    $mt_id = mysqli_real_escape_string($conn, $_POST['pkmt_id']);
    $mt_fname =  mysqli_real_escape_string($conn, $_POST['mt_fname']);
    $mt_lname =  mysqli_real_escape_string($conn, $_POST['mt_lname']);
    $mt_bday =  mysqli_real_escape_string($conn, $_POST['mt_bday']);
    $mt_age =  mysqli_real_escape_string($conn, $_POST['mt_age']);
    $mt_gender =  mysqli_real_escape_string($conn, $_POST['mt_gender']);
    $mt_email =  mysqli_real_escape_string($conn, $_POST['mt_email']);
    $mt_contact =  mysqli_real_escape_string($conn, $_POST['mt_contact']);
   
    $mt_province =  mysqli_real_escape_string($conn, $_POST['prov']);
    $mt_uname =  mysqli_real_escape_string($conn, $_POST['mt_uname']);
    $mt_pass =  mysqli_real_escape_string($conn, SHA1($_POST['mt_pass']));
    $mtm =  mysqli_real_escape_string($conn, $_POST['mtm']);

    $update = mysqli_query($conn, "UPDATE tbl_municipal_tourism
    SET mt_username = '$mt_uname',mt_password = '$mt_pass',mtm = '$mtm',mt_fname = '$mt_fname'
    ,mt_lname = '$mt_lname',mt_bday = '$mt_bday',mt_gender = '$mt_gender',mt_age = '$mt_age'
    ,mt_email = '$mt_email',mt_contact = '$mt_contact'
    
    WHERE pkmt_id ='$mt_id' ");

    if ($update === true) {
       $_SESSION['status'] = "Data Successfully Updated";
       header("location: ../../municipal_tourism.php");
    }
    else {
        $_SESSION['status'] = "Data Failed to Updated";
        header("location: ../../municipal_tourism.php");
    }


}


?>