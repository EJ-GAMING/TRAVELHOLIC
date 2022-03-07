<?php
include '../session.php';

if (isset($_POST['logout'])){
    // session_destroy();
    unset($_SESSION['tsm101']);
    $_SESSION['status'] = "LOG OUT SUCCESSFULLY!";
    header("location: ../../index.php");
   
}

?>