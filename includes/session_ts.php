<?php
session_start();
include_once 'DB/connection.php';
include_once 'getalltourist.php';

if (isset($_POST['next'])) {
   
    $ts_name = mysqli_real_escape_string($conn,$_POST['tsm_id']);
    $dept = mysqli_real_escape_string($conn,$_POST['book_date']);
    $slot = $_POST['available_slot'];
    $com = mysqli_real_escape_string($conn,$_POST['com']);
    
    $total = $com + 1;
    if (isset($_POST['box'])) {
        if ($com <= -1) {
            $_SESSION['status'] = "Please insert total number of companions";
            header("location: ../step-2.php");
        }
        elseif ($com > $slot) {
            $_SESSION['status'] = "Total number of companions is higher that Available Slot";
            header("location: ../step-2.php");
        }
        else {
            $_SESSION['comp'] = $total;
            header("location: ../step-3.php");
        }
    }else {
        $_SESSION['status'] = "Please Agree in the terms and Condition";
        header("location: ../step-2.php");
       
    }
   

}

?>