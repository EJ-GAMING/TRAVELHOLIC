<?php

include_once '../session.php';

if (isset($_POST['undo'])) {
   
    $id = mysqli_real_escape_string($conn, $_POST['id']);

$undo = "UPDATE tbl_tourist_info
SET status = 'Pending'
WHERE pktourist_id = '$id'";

if (mysqli_query($conn, $undo) === true) {
    $_SESSION['status'] = "Successfully Undo the Record";
    header("location: ../../approved.php");
}else {
    $_SESSION['status'] = "Failed to Undo the Record";
    header("location: ../../approved.php");
}
}

?>