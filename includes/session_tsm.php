<?php

	session_start();//start session if session not start

if( isset($_POST['book'])){
	
	$tsm_id = mysqli_real_escape_string($conn,$_POST['tsm_id']);
    $_SESSION['tsm'] = $tsm_id;
    
    header("location: ../step-1.php");

	


}
?>