<?php
require_once 'connection.php';


session_start();
if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
    $_SESSION['status'] ="LOGIN FIRST TO START YOUR SESSION";
    header("location: ../index.php");
    exit(0);
   
}
$sql = "SELECT * FROM tbl_admin WHERE id = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();


?>