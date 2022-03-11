<?php
session_start();
include_once 'DB/connection.php';


if(isset($_POST['rating'])){
    
    $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $tsm_id = mysqli_real_escape_string($conn, $_POST['tsm_id']);
    $tsinfo_id = mysqli_real_escape_string($conn, $_POST['tsinfo_id']);
    
    $bookers_rating = mysqli_query($conn, "SELECT * FROM tbl_rating WHERE booker_id = '$book_id' LIMIT 1");
    if (mysqli_num_rows($bookers_rating) >= 1) {
        $_SESSION['status'] = "You've Already Rated this tourist spot. Thank You";
        header("location: ../ts_info.php?ts_id=$tsinfo_id");
    }else {
           
    $bookers_query = mysqli_query($conn, "SELECT * FROM tbl_tourist_info where tracker = '$book_id' AND tsm_id = '$tsm_id' AND (status = 'Arrived'OR status = 'Out')");
    if (mysqli_num_rows($bookers_query) === 1) {
        $rate_query = "INSERT INTO tbl_rating (rate, tsm_id, booker_id) VALUES ('$rate', '$tsm_id', '$book_id')";
        $rate_result = mysqli_query($conn, $rate_query);
        $_SESSION['status'] = "Successfully Rate";
        header("location: ../ts_info.php?ts_id=$tsinfo_id");
    }else{
        $_SESSION['status'] = "SORRY ONLY TOURIST WHO VISITED THIS TOURIST SPOT CAN RATE THIS TOURIST SPOT";
        header("location: ../ts_info.php?ts_id=$tsinfo_id");
    }
        
    }

    

  


}




?>