<?php
include_once '../session.php';

if (isset($_POST['img1'])) {
    
    $tsinfo_id = mysqli_real_escape_string($conn, $_POST['tsinfo_id']);
    $img1 = $_FILES['photo']['name'];

    $sql ="UPDATE tbl_ts_img
    SET img1 = '$img1'
    WHERE tsinfo_id = '$tsinfo_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../../photo/" . $img1);
        $_SESSION['status'] = "Image 1 Successfully Updated";
        header("location: ../../tourist_spot.php");
    }else {
        $_SESSION['status'] = "Error in Updating Profile";
        header("location: ../../tourist_spot.php");
    }
}

//img2
if (isset($_POST['img2'])) {
    
    $tsinfo_id = mysqli_real_escape_string($conn, $_POST['tsinfo_id']);
    $img2 = $_FILES['photo']['name'];

    $sql ="UPDATE tbl_ts_img
    SET img2 = '$img2'
    WHERE tsinfo_id = '$tsinfo_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../../photo/" . $img2);
        $_SESSION['status'] = "Image 2 Successfully Updated";
        header("location: ../../tourist_spot.php");
    }else {
        $_SESSION['status'] = "Error in Updating Image 2";
        header("location: ../../tourist_spot.php");
    }
}


//img3
if (isset($_POST['img3'])) {
    
    $tsinfo_id = mysqli_real_escape_string($conn, $_POST['tsinfo_id']);
    $img3 = $_FILES['photo']['name'];

    $sql ="UPDATE tbl_ts_img
    SET img3 = '$img3'
    WHERE tsinfo_id = '$tsinfo_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../../photo/" . $img3);
        $_SESSION['status'] = "Image 3 Successfully Updated";
        header("location: ../../tourist_spot.php");
    }else {
        $_SESSION['status'] = "Error in Updating Image 3";
        header("location: ../../tourist_spot.php");
    }
}



//img4
if (isset($_POST['img4'])) {
    
    $tsinfo_id = mysqli_real_escape_string($conn, $_POST['tsinfo_id']);
    $img4 = $_FILES['photo']['name'];

    $sql ="UPDATE tbl_ts_img
    SET img4 = '$img4'
    WHERE tsinfo_id = '$tsinfo_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../../photo/" . $img4);
        $_SESSION['status'] = "Image 4 Successfully Updated";
        header("location: ../../tourist_spot.php");
    }else {
        $_SESSION['status'] = "Error in Updating Image 4";
        header("location: ../../tourist_spot.php");
    }
}


?>