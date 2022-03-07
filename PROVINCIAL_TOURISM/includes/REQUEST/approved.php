<?php
include_once '../session.php';
$tourist_id = $_GET['tourist'];

$appproved = "UPDATE tbl_ts_manager
INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
SET status = 'Arrived'
WHERE pktourist_id = '$tourist_id'";

if (mysqli_query($conn, $appproved) === true) {
    $_SESSION['status'] = "Successfully Approved";
    header("location: ../../pending_req.php");
}else {
    $_SESSION['status'] = "Failed to Approved";
    header("location: ../../pending_req.php");
}
?>