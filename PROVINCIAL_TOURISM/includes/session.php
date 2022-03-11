<?php
include_once "connection.php";


session_start();
if(!isset($_SESSION['pt']) || trim($_SESSION['pt']) == ''){
    $_SESSION['status'] ="LOGIN FIRST TO START YOUR SESSION";
    header("location: index.php");
    exit(0);
   
}
$sql = "SELECT * FROM tbl_provincial_tourism 
        INNER JOIN refregion ON tbl_provincial_tourism.ptregCode = refregion.regCode
        INNER JOIN refprovince ON tbl_provincial_tourism.ptprovCode = refprovince.provCode
        INNER JOIN refcitymun ON tbl_provincial_tourism.ptcitymunCode = refcitymun.citymunCode
        INNER JOIN refbrgy ON tbl_provincial_tourism.ptbrgyCode = refbrgy.brgyCode
      WHERE pkpt_id = '".$_SESSION['pt']."'";	
      $query = $conn->query($sql);
	$user = $query->fetch_assoc();


?>
