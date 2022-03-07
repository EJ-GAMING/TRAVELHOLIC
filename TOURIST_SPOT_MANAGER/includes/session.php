<?php
require_once 'connection.php';


session_start();
if(!isset($_SESSION['tsm101']) || trim($_SESSION['tsm101']) == ''){
    $_SESSION['status'] ="LOGIN FIRST TO START YOUR SESSION";
    header("location: index.php");
    exit(0);
   
}
$sql = "SELECT *
FROM tbl_ts_manager
INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
INNER JOIN refregion ON tbl_tsm_address.regCode = refregion.regCode
INNER JOIN refprovince ON tbl_tsm_address.provCode = refprovince.provCode
INNER JOIN refcitymun ON tbl_tsm_address.citymunCode = refcitymun.citymunCode
INNER JOIN refbrgy ON tbl_tsm_address.brgyCode = refbrgy.brgyCode

WHERE tbl_ts_manager.tsm_id = '".$_SESSION['tsm101']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();

    
$sql1 = "SELECT *
FROM tbl_ts_manager
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
INNER JOIN refregion ON tbl_ts_location.tsregCode = refregion.regCode
INNER JOIN refprovince ON tbl_ts_location.tsprovCode = refprovince.provCode
INNER JOIN refcitymun ON tbl_ts_location.tscitymunCode = refcitymun.citymunCode
INNER JOIN refbrgy ON tbl_ts_location.tsbrgyCode = refbrgy.brgyCode

WHERE tbl_ts_info.tsinfo_id = '".$user['tsinfo_id']."'";
	$query1 = $conn->query($sql1);
	$ts = $query1->fetch_assoc();




   

    

?>
