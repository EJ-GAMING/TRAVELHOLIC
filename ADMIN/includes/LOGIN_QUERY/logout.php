<?php
include '../session.php';

if (isset($_POST['logout'])){
    //session_destroy();
    unset($_SESSION['admin']);
    $_SESSION['status'] = "LOG OUT SUCCESSFULLY!";
    header("location: ../../index.php");
    exit(0);
}

?>