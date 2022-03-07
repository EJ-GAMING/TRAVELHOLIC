<?php
include_once '../session.php';

//IMAGE 1 UPDATE

if (isset($_POST['img1'])) {
    
    $ts_id = mysqli_real_escape_string($conn, $_POST['ts_id']);
    $img1 = $_FILES['img1']['name'];


$sql = "UPDATE tbl_ts_info
        INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
        SET img1 = '$img1'
        WHERE tbl_ts_info.tsinfo_id = '$ts_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["img1"]["tmp_name"], "../../../photo/" . $img1);
        $_SESSION['status'] = "Image 1 Successfully Updated";
        header("location: ../../tourist_spot.php");
    }else {
        $_SESSION['status'] = "Error Updating Image 1";
        header("location: ../../tourist_spot.php");
    }

}



//IMAGE 2 UPDATE

if (isset($_POST['img2'])) {
    
    $ts_id = mysqli_real_escape_string($conn, $_POST['ts_id']);
    $img2 = $_FILES['img2']['name'];


$sql = "UPDATE tbl_ts_info
        INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
        SET img2 = '$img2'
        WHERE tbl_ts_info.tsinfo_id = '$ts_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["img2"]["tmp_name"], "../../../photo/" . $img2);
        $_SESSION['status'] = "Image 2 Successfully Updated";
        header("location: ../../tourist_spot.php");
    }else {
        $_SESSION['status'] = "Error Updating Image 2";
        header("location: ../../tourist_spot.php");
    }

}

//IMAGE 3 UPDATE

if (isset($_POST['img3'])) {
    
    $ts_id = mysqli_real_escape_string($conn, $_POST['ts_id']);
    $img3 = $_FILES['img3']['name'];


$sql = "UPDATE tbl_ts_info
        INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
        SET img3 = '$img3'
        WHERE tbl_ts_info.tsinfo_id = '$ts_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["img3"]["tmp_name"], "../../../photo/" . $img3);
        $_SESSION['status'] = "Image 3 Successfully Updated";
        header("location: ../../tourist_spot.php");
    }else {
        $_SESSION['status'] = "Error Updating Image 3";
        header("location: ../../tourist_spot.php");
    }

}




//IMAGE 4 UPDATE

if (isset($_POST['img4'])) {
    
    $ts_id = mysqli_real_escape_string($conn, $_POST['ts_id']);
    $img4 = $_FILES['img4']['name'];


$sql = "UPDATE tbl_ts_info
        INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
        SET img4 = '$img4'
        WHERE tbl_ts_info.tsinfo_id = '$ts_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["img4"]["tmp_name"], "../../../photo/" . $img4);
        $_SESSION['status'] = "Image 4 Successfully Updated";
        header("location: ../../tourist_spot.php");
    }else {
        $_SESSION['status'] = "Error Updating Image 4";
        header("location: ../../tourist_spot.php");
    }

}



?>