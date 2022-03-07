<?php
require_once 'connection.php';


session_start();
if(!isset($_SESSION['mt']) || trim($_SESSION['mt']) == ''){
    $_SESSION['status'] ="LOGIN FIRST TO START YOUR SESSION";
    header("location: index.php");
    exit(0);
   
}
$sql = "SELECT * FROM tbl_municipal_tourism
        INNER JOIN refcitymun ON tbl_municipal_tourism.mtm = refcitymun.citymunCode
        
      WHERE pkmt_id = '".$_SESSION['mt']."'";	
      $query = $conn->query($sql);
	$user = $query->fetch_assoc();


?>
