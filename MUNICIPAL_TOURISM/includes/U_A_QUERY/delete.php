<?php

include_once '../session.php';

$id = $_POST['id'];

if (isset($_POST['delete'])) {


    $delete_query = "DELETE from tbl_ts_manager
                     WHERE tbl_ts_manager.tsm_id = '$id'";


    if (mysqli_query($conn, $delete_query) === true) {
        $_SESSION['status'] = "Data Successfully Deleted";
       header("location: ../../user_account.php");
    }else {
        $_SESSION['status'] = "Information failed to delete";
        header("location: ../../user_account.php");
    }

}


?>