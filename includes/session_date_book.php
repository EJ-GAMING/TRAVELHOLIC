<?php

	session_start();//start session if session not start
	

if( isset($_POST['next'])){
		

    $today = date("Y-m-d");
	$tsm_id = $_POST['ts_id'];
	$book_date = $_POST['date_book'];
	$book_out = $_POST['date_out'];

	if (empty($book_date)) {
		$_SESSION['status'] = "Please Select Date to Book";
        header("location: ../step-1.php");
	}
	if($today > $book_date){
		$_SESSION['status'] = "Date Invalid Please Select Another";
        header("location: ../step-1.php");
	}elseif ($today > $book_out) {
		$_SESSION['status'] = "Date Invalid Please Select Another";
        header("location: ../step-1.php");
	}
	else {
        $_SESSION['tsm_id'] = $tsm_id;
        $_SESSION['b_date'] = $book_date;
		$_SESSION['b_out'] = $book_out;
        header("location: ../step-2.php");
    }
	


}
?>