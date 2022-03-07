<?php
include_once '../session.php';

if (isset($_POST['update'])) {
   
    $ts_id = mysqli_real_escape_string($conn, $_POST['tsinfo_id'] ) ;
    $ts_name = mysqli_real_escape_string($conn, $_POST['ts_name'] ) ;
    $ts_des = mysqli_real_escape_string($conn, $_POST['ts_des'] ) ;
    $ts_region = mysqli_real_escape_string($conn, $_POST['ts_region'] ) ;
    $ts_brgy = mysqli_real_escape_string($conn, $_POST['ts_brgy'] ) ;
    $ts_municipal = mysqli_real_escape_string($conn, $_POST['ts_municipal']) ;
    $ts_province = mysqli_real_escape_string($conn, $_POST['ts_province']) ;
    $ts_act =  mysqli_real_escape_string($conn, $_POST['ts_act']) ;
    $ts_guidelines = mysqli_real_escape_string($conn, $_POST['ts_guide']);
    $ts_max_num = mysqli_real_escape_string($conn, $_POST['ts_max_num']);


    $update_query = "UPDATE tbl_ts_info
     INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
     INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
     INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
     SET ts_name = '$ts_name', ts_des = '$ts_des', tsregCode = '$ts_region', tsbrgyCode = '$ts_brgy',
     tscitymunCode = '$ts_municipal', tsprovCode = '$ts_province', act = '$ts_act', guide = '$ts_guidelines',
     max_num = '$ts_max_num'
     WHERE tbl_ts_info.tsinfo_id = '$ts_id'";
            
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result === true) {
       
    $_SESSION['status'] = "Data Successfully Update";
    header("location: ../../tourist_spot.php"); 

    }
    else {
        
    $_SESSION['status'] = "Data Failed to Update";
    header("location: ../../tourist_spot.php"); 

    }
   




}

?>