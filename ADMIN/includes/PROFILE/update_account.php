<?php
include '../session.php';


if(isset($_GET['return'])){
    $return = $_GET['return'];
    
}
else{
    $return = '../../home.php';
}


if (isset($_POST['update'])) {
    $old_pass = mysqli_real_escape_string($conn, ($user['pass']));
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $cur_pass = mysqli_real_escape_string($conn, SHA1($_POST['cur_pass']));
    
    if ($cur_pass !== $old_pass) {
        $_SESSION['status'] = "Invalid Password";
        header("location: ../../home.php");


    }else {
        $profile_query = "UPDATE tbl_admin 
                          SET uname = '$uname', pass = '$pass' WHERE id = '".$user['id']."' ";
        $profile_result = mysqli_query($conn, $profile_query);
        $_SESSION['status'] = "Successfuly Updated";
        header("location: ../../home.php");

    }


}else {
    $_SESSION['status'] = "Somethings Wrong";

}




?>