<?php
include_once '../session.php';

if (isset($_POST['img'])) {
    
    $mt_id = mysqli_real_escape_string($conn, $_POST['mt_id']);
    //images
    $profile = $_FILES['mtphoto']['name'];
    $ex_user_img = pathinfo($profile,PATHINFO_EXTENSION);
    $randomno1=rand(0,100000);
    $rename1= substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
    $newImage=$rename1.'.'.$ex_user_img;

    $sql ="UPDATE tbl_municipal_tourism 
    SET photo = '$newImage'
    WHERE pkmt_id = '$mt_id'";
    if (mysqli_query($conn, $sql) === true) {
        move_uploaded_file($_FILES["mtphoto"]["tmp_name"], "../../../photo/municipal/" . $newImage);
        $_SESSION['status'] = "Profile Successfully Updated";
        header("location: ../../municipal_tourism.php");
    }else {
        $_SESSION['status'] = "Profile Failed to Update";
        header("location: ../../municipal_tourism.php");
    }
}

?>