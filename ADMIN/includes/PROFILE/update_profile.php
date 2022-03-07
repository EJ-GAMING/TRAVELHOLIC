<?php
include_once '../session.php';

if (isset($_POST['update'])) {

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $user['pass']);
    $password = mysqli_real_escape_string($conn, SHA1($_POST['pass']));
    $id = mysqli_real_escape_string($conn, $user['id']);


    if (empty($password)) {
        $_SESSION['status'] = "Please Insert Password";
        header("location: ../../profile.php");
    }
    elseif ($password != $pass) {
        $_SESSION['status'] = "Invalid Password";
        header("location: ../../profile.php");
    }else {
        $sql ="UPDATE tbl_admin
        SET fname = '$fname', lname = '$lname', email = '$email'
        WHERE id ='$id'";
        if (mysqli_query($conn, $sql) === true) {
            $_SESSION['status'] = "Profile Successfully Updated";
            header("location: ../../profile.php");
        }
    }

    


}



//update images

if (isset($_POST['img'])) {
    $id = mysqli_real_escape_string($conn, $user['id']); 
    $photo = $_FILES['photo']['name'];

    $sql = "UPDATE tbl_admin
            SET photo = '$photo'
            WHERE id = '$id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $photo);
        $_SESSION['status'] = "Profile Picture Successfully Updated";
        header("location: ../../profile.php");
    }else {
        $_SESSION['status'] = "Profile Picture Failed to Update";
        header("location: ../../profile.php");
    }
}


?>