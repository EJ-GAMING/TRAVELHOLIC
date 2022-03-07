<?php
include_once '../session.php';

if (isset($_POST['img'])) {
    
    $pt_id = mysqli_real_escape_string($conn, $_POST['pt_id']);
    $profile = $_FILES['ptphoto']['name'];

    $sql ="UPDATE tbl_provincial_tourism 
    SET img = '$profile'
    WHERE pkpt_id = '$pt_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["ptphoto"]["tmp_name"], "../../../photo/" . $profile);
        $_SESSION['status'] = "Profile Successfully Updated";
        header("location: ../../provincial_tourism.php");
    }else {
        $_SESSION['status'] = "Error in Updating Profile";
        header("location: ../../provincial_tourism.php");
    }
}

?>