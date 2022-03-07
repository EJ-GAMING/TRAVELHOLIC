<?php

include_once '../session.php';

if (isset($_POST['insert'])) {
  
    date_default_timezone_set('Asia/manila');
    //created at -->
    $created = date("Y-m-d");

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['num']);
    $province = mysqli_real_escape_string($conn, $_POST['prov']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $mtm = mysqli_real_escape_string($conn, $_POST['mtm']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, SHA1($_POST['pass']));
    $userid = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        
   //USER IMAGE
   $user_img = $_FILES['photo']['name'];
   $ex_user_img = pathinfo($user_img,PATHINFO_EXTENSION);
   $randomno1=rand(0,100000);
    $rename1= substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
    $newImage=$rename1.'.'.$ex_user_img;



        //Trap Duplicate Municipal

        $mun = mysqli_query($conn, "SELECT * FROM tbl_municipal_tourism WHERE mtm = '$mtm' ");
        if ($row = mysqli_num_rows($mun) >= 1 ) {
            $_SESSION['status'] = "<span class='text-center'>Failed to Insert<br>"."Municipal Already Registered. Please Select Another</span>";
            header("location: ../../municipal_tourism.php");
        }else {
           //trap duplicate entries
    $trap = mysqli_query($conn, "SELECT * FROM tbl_municipal_tourism
    WHERE mt_fname = '$fname' AND mt_lname = '$lname' AND created = '$created' limit 1");
    if (mysqli_num_rows($trap) >=1) {
        $_SESSION['status'] = "Data Already Inserted";
        header("location: ../../municipal_tourism.php");
    }else {
        $a = mysqli_query($conn, "INSERT INTO tbl_municipal_tourism 
        (mt_fname, mt_lname, photo, mt_bday, mt_age, mt_email,
        mt_contact, prov,
        user_id, created, mt_username, mt_password,mtm, mt_gender, mt_region)
        VALUES('$fname','$lname','$newImage','$bday','$age','$email','$phone'
                ,'$province','$userid','$created','$uname','$pass','$mtm','$gender', '$region')");
         move_uploaded_file($_FILES["photo"]["tmp_name"], "../../../photo/municipal/" . $newImage);

         if ($a === true) {
            $_SESSION['status'] = "Data Successfully Inserted";
           header("location: ../../municipal_tourism.php");
         }else{
            $_SESSION['status'] = "Data Failed Inserted";
            header("location: ../../municipal_tourism.php");
         }


    }


        }



    









}


?>