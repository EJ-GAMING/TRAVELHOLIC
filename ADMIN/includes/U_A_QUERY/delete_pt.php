<?php
include_once '../session.php';

$pt_id = $_POST['pt_id'];

if (isset($_POST['del'])) {


    $delete_query = "DELETE from tbl_provincial_tourism
                     WHERE pkpt_id = '$pt_id'";


    if (mysqli_query($conn, $delete_query) === true) {
        $_SESSION['status'] = "Data Successfully Deleted";
       header("location: ../../provincial_tourism.php");
    }else {
        $_SESSION['status'] = "Information failed to delete";
        header("location: ../../provincial_tourism.php");
    }

}


?>