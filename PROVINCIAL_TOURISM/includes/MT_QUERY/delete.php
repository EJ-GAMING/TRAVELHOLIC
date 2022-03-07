<?php
include_once '../session.php';

$mt_id = $_POST['mt_id'];

if (isset($_POST['del'])) {


    $delete_query = "DELETE from tbl_municipal_tourism
                     WHERE pkmt_id = '$mt_id'";


    if (mysqli_query($conn, $delete_query) === true) {
        $_SESSION['status'] = "Data Successfully Deleted";
       header("location: ../../municipal_tourism.php");
    }else {
        $_SESSION['status'] = "Information failed to delete";
        header("location: ../../municipal_tourism.php");
    }

}


?>