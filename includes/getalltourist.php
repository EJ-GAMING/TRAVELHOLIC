<?php
include_once 'DB/connection.php';


$tsm_id = mysqli_real_escape_string($conn, $_SESSION['tsm_id']);

$query = "SELECT *
FROM tbl_ts_manager
INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id

WHERE tbl_ts_manager.tsm_id = '$tsm_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$slot_num = $row['max_num'];

$date = $_SESSION['b_date'];

$sql1 = "SELECT SUM(com_num) AS total FROM tbl_ts_manager
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
WHERE tbl_ts_manager.tsm_id = '$tsm_id' AND book_date = '$date'";
$query1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($query1) <= 0) {
   $companions = 0;
}else {
    $row1 = mysqli_fetch_assoc($query1);
    $companions = $row1['total'];
}
$_SESSION['total'] = $slot_num - $companions; 

?>