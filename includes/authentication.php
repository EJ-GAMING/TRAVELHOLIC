<?php
session_start();

include_once 'connection.php';
if (!isset($_SESSION['tsm_id']) || trim($_SESSION['tsm_id']) == '') {
    $_SESSION['status'] = "Book First To Access that page."."<strong>"."THANK YOU!"."</strong>";
    header("location: ../index.php");
    exit();
}

$query = "SELECT *
FROM tbl_ts_manager
INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_ts_manager.tsm_id = tbl_ts_info.tsm_id
INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id

WHERE tbl_ts_manager.tsm_id = '".$_SESSION['tsm_id']."'";

$result = mysqli_query($conn, $query);
$ts = mysqli_fetch_assoc($result);
?>