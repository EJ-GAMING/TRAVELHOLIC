<?php
include_once '../session.php';
//delete Approved
if (isset($_POST['del'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id']);

$decline_query = "DELETE FROM tbl_tourist_info
                    WHERE pktourist_id = '$id'";
if (mysqli_query($conn, $decline_query) === true) {
    $_SESSION['status'] = "Record Successfully Deleted";
    header("location: ../../approved.php");
}

}


//Delete Request
if (isset($_POST['del_req'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id']);

$decline_query = "DELETE FROM tbl_tourist_info
                    WHERE pktourist_id = '$id'";
if (mysqli_query($conn, $decline_query) === true) {
    $_SESSION['status'] = "Record Successfully Deleted";
    header("location: ../../pending_req.php");
}

}



?>