<?php
include_once '../session.php';

if (isset($_POST['edit'])) {

$pt_id = mysqli_real_escape_string($conn, $_POST['pkpt_id']);
$pt_fname =  mysqli_real_escape_string($conn, $_POST['ptfname']);
$pt_lname =  mysqli_real_escape_string($conn, $_POST['ptlname']);
$pt_bday =  mysqli_real_escape_string($conn, $_POST['ptbday']);
$pt_age =  mysqli_real_escape_string($conn, $_POST['ptage']);
$pt_gender =  mysqli_real_escape_string($conn, $_POST['ptgender']);
$email =  mysqli_real_escape_string($conn, $_POST['email']);
$num =  mysqli_real_escape_string($conn, $_POST['num']);
$pt_region =  mysqli_real_escape_string($conn, $_POST['region']);
$pt_brgy =  mysqli_real_escape_string($conn, $_POST['brgy']);
$pt_municipal =  mysqli_real_escape_string($conn, $_POST['municipal']);
$pt_province =  mysqli_real_escape_string($conn, $_POST['province']);
$pt_uname =  mysqli_real_escape_string($conn, $_POST['ptuname']);
$pt_pass =  mysqli_real_escape_string($conn, SHA1($_POST['ptpass']));








$sql = "UPDATE tbl_provincial_tourism 
SET ptfname = '$pt_fname',ptlname = '$pt_lname',ptbday = '$pt_bday',ptage = '$pt_age',ptgender = '$pt_gender',
ptregCode = '$pt_region',ptbrgyCode = '$pt_brgy',ptcitymunCode = '$pt_municipal',ptprovCode = '$pt_province',uname = '$pt_uname',
pass = '$pt_pass', email = '$email', phone_num = '$num'
WHERE pkpt_id = '$pt_id'";

if (mysqli_query($conn, $sql) === true) {

    $_SESSION['status'] = "Data Successfully Updated";
    header("location: ../../provincial_tourism.php");
}else {
    $_SESSION['status'] = "Failed to update";
    header("location: ../../provincial_tourism.php");
}
}






?>