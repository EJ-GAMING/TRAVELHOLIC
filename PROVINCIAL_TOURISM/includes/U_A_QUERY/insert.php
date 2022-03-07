<?php
include_once '../session.php';





	if(ISSET($_POST['save'])){
        
       

        

        date_default_timezone_set('Asia/manila');
    //created at -->
    $created = date("Y-n-d");

       $lname = mysqli_real_escape_string($conn, $_POST['lname']);
       $fname = mysqli_real_escape_string($conn, $_POST['fname']);
       $bday = mysqli_real_escape_string($conn, $_POST['bday']);
       $age = mysqli_real_escape_string($conn, $_POST['age']);
       $gender = mysqli_real_escape_string($conn, $_POST['gender']);
       $region = mysqli_real_escape_string($conn, $_POST['region']);
       $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
       $municipal = mysqli_real_escape_string($conn, $_POST['municipal']);
       $province = mysqli_real_escape_string($conn, $_POST['province']);
       $pos = mysqli_real_escape_string($conn, $_POST['pos']);
       $tsn = mysqli_real_escape_string($conn, $_POST['tsn']);
       $role = mysqli_real_escape_string($conn, $_POST['role']);
       $phone = mysqli_real_escape_string($conn, $_POST['phone']);
       $email = mysqli_real_escape_string($conn, $_POST['email']);
       $uname = mysqli_real_escape_string($conn, $_POST['uname']);
       $pass = mysqli_real_escape_string($conn, SHA1($_POST['pass']));
       $user_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
       //IMAGE
       $user_img = $_FILES['user_img']['name'];



        //TRAP DUPLICATE ENTRIES

        $trap = mysqli_query($conn, "SELECT * FROM tbl_ts_manager
        INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
        INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
        WHERE fname ='$fname' AND lname = '$lname' AND tsinfo_id = '$tsn'");
        if (mysqli_num_rows($trap) >= 1) {
            $_SESSION['status'] = "This User is Already Inserted Thank You!";
            header("location: ../../user_account.php");
        }else {
            $user_account_query = "INSERT INTO tbl_ts_manager (uname, pass, role_id, created_at, user_id)
            VALUES ('$uname','$pass','$role', '$created', '$user_id')";
            $user_account_result = mysqli_query($conn, $user_account_query);
            $pktsm_id = mysqli_insert_id($conn);
     
     
           
                    
            $address_query = "INSERT INTO tbl_tsm_address (regCode, provCode, citymunCode, brgyCode, tsm_id)
            VALUES ('$region','$province','$municipal','$brgy', '$pktsm_id')";
            $address_result = mysqli_query($conn, $address_query);
           
           
            
     
     
            $manage_query = "INSERT INTO tbl_tsm_tomanage (pos, tsm_id, tsinfo_id)
            VALUES ('$pos','$pktsm_id', '$tsn')";
            $manage_result = mysqli_query($conn, $manage_query);
          
     
     
     
     
            $user_info_query = "INSERT INTO tbl_tsm_info (lname, fname, bday, age, gender, photo, tsm_id, phone_num, email)
            VALUES ('$lname','$fname','$bday','$age','$gender','$user_img', '$pktsm_id','$phone', '$email')";
            $user_info_result = mysqli_query($conn, $user_info_query);
            move_uploaded_file($_FILES["user_img"]["tmp_name"], "../../../photo/" . $user_img);
     
            $_SESSION['status'] = "Data Successfully Inserted";
            header("location: ../../user_account.php");
     
     
        }
       

      


    }


?>
