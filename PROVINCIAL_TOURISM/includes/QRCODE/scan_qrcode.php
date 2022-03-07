<?php

include_once '../session.php';

if (isset($_POST['qrcode'])) {
    $prov = $user['ptprovCode'];
   
    $code = mysqli_real_escape_string($conn, $_POST['qrcode']);

    $scan = mysqli_query($conn, "SELECT * FROM tbl_tourist_info 
    INNER JOIN tbl_ts_manager ON tbl_tourist_info.tsm_id = tbl_ts_manager.tsm_id
    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
    INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
    INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
    INNER JOIN refprovince ON tbl_ts_location.tsprovCode = refprovince.provCode
    
    WHERE tracker = '$code' AND tsprovCode = '$prov' LIMIT 1");

    if (mysqli_num_rows($scan) >= 1) {
            $row = mysqli_fetch_assoc($scan);
        if ($row['status'] === "Pending") {
            $tourist_id = $row['pktourist_id'];
            $query_pending = mysqli_query($conn, "UPDATE tbl_tourist_info SET status = 'Arrived' WHERE pktourist_id ='$tourist_id' ");
            if ($query_pending === true) {
                $_SESSION['status'] = "Tourist Successfully Arrived";
                header("location: ../../scan.php");
            }else {
                $_SESSION['status'] = "Unable to Update Tourist Status";
                header("location: ../../scan.php");
            }
           
        }elseif ($row['status'] === "Arrived") {

            $tourist_id = $row['pktourist_id'];
            $query_arrived = mysqli_query($conn, "UPDATE tbl_tourist_info SET status = 'Out' WHERE pktourist_id ='$tourist_id' ");
            if ($query_arrived === true) {
                $_SESSION['status'] = "Tourist Successfully Check Out";
                header("location: ../../scan.php");
            }else {
                $_SESSION['status'] = "Unable to Update Tourist Status";
                header("location: ../../scan.php");
            }

        }else {
            $_SESSION['status'] = "This Tourist Already Check Out";
            header("location: ../../scan.php");
        }
  
    }else {
       
        $_SESSION['status'] = "Tourist has no Data. Please Book First";
        header("location: ../../scan.php");
  
    }
   
  
}

?>