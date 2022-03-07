<?php
include_once '../session.php';

if (isset($_POST['img'])) {
    
    $tsm_id = mysqli_real_escape_string($conn, $_POST['tsm_id']);
    $profile = $_FILES['photo']['name'];

    $sql ="UPDATE tbl_ts_manager
    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
    SET photo = '$profile'
    WHERE tbl_ts_manager.tsm_id = '$tsm_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../../photo/" . $profile);
        $_SESSION['status'] = "Profile Successfully Updated";
        header("location: ../../user_account.php");
    }else {
        $_SESSION['status'] = "Error in Updating Profile";
        header("location: ../../user_account.php");
    }
}

?>