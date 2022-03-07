<?php
include_once '../session.php';

if (isset($_POST['edit'])) {
    
    $tsm_id = mysqli_real_escape_string($conn, $_POST['tsm_id']);
    $photo = $_FILES['photo']['name'];


$sql = "UPDATE tbl_ts_manager
        INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
        SET photo = '$photo'
        WHERE tbl_ts_manager.tsm_id = '$tsm_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../../photo/" . $photo);
        $_SESSION['status'] = "Profile Successfully Updated";
        header("location: ../../update_account.php");
    }else {
        $_SESSION['status'] = "Error Updating Profile";
        header("location: ../../update_account.php");
    }

}

?>