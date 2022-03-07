<?php
include '../session.php';

if (isset($_POST['logout'])){
    // session_destroy();
    unset($_SESSION['mt']);
    $_SESSION['status'] = "LOG OUT SUCCESSFULLY!";
    header("location: ../../index.php");
    
}

?>