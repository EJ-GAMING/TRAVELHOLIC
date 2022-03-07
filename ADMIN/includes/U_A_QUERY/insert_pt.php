<?php
include_once '../session.php';

if (isset($_POST['insert'])) {
    
    date_default_timezone_set('Asia/manila');
    //created at -->
    $created = date("Y-n-d");

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['num']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $municipal = mysqli_real_escape_string($conn, $_POST['municipal']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, SHA1($_POST['pass']));
    $userid = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);

    //img
    $img = $_FILES['photo']['name'];

       //TRAP DUPLICATE ENTRIES

       $trap = mysqli_query($conn, "SELECT * FROM tbl_provincial_tourism
       WHERE ptfname = '$fname' AND ptlname = '$lname' AND ptprovCode = '$province'
       LIMIT 1");
       if (mysqli_num_rows($trap) >= 1) {
           $_SESSION['status'] = "This User is Already Inserted Thank You!";
           header("location: ../../provincial_tourism.php");
       }else {
        $insert_query = "INSERT INTO tbl_provincial_tourism (uname, pass, img, role_id,ptfname, ptlname, 
        ptage, ptbday, ptgender, ptregCode, ptprovCode, ptcitymunCode, ptbrgyCode, created, user_id, email, phone_num)
        VALUES ('$uname','$pass', '$img', '$role','$fname','$lname','$age','$bday','$gender','$region',
        '$province','$municipal','$brgy','$created','$userid','$email','$num')";
        if (mysqli_query($conn, $insert_query) === true) {
            move_uploaded_file($_FILES["photo"]["tmp_name"], "../../../photo/" . $img);
            $_SESSION['status'] = "Data Successfully Inserted";
           header("location: ../../provincial_tourism.php");
        }else {
            $_SESSION['status'] = "Failed to Insert";
            header("location: ../../provincial_tourism.php");
        }
    }



}else {
    $_SESSION['status'] = "Somethings Wrong";
    header("location: ../../provincial_tourism.php");
}

?>