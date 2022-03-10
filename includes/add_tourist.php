<?php
session_start();
include_once 'connection.php';
include ('../phpqrcode/qrlib.php');
if (isset($_POST['book'])) {

  $ts_name = mysqli_real_escape_string($conn, $_POST['ts_name']);
  $tsm_id = mysqli_real_escape_string($conn, $_POST['tsm_id']);
  $com_num = mysqli_real_escape_string($conn, $_POST['com_num']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $date_book = mysqli_real_escape_string($conn, $_POST['date_book']);
  $date_out = mysqli_real_escape_string($conn, $_POST['date_out']);
  $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $bday = mysqli_real_escape_string($conn, $_POST['bday']);
  $contact = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pending = "Pending";

  //address
  $region = mysqli_real_escape_string($conn, $_POST['region']);
  $province = mysqli_real_escape_string($conn, $_POST['province']);
  $municipal = mysqli_real_escape_string($conn, $_POST['municipal']);
  $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
  //IMAGES

  //USER IMAGE
  $user_img = $_FILES['user_img']['name'];
  $ex_user_img = pathinfo($user_img, PATHINFO_EXTENSION);
  $randomno1 = rand(0, 100000);
  $rename1 = $fname.substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
  $newImage = $rename1 . '.' . $ex_user_img;

  //VALID ID
  $valid_id = $_FILES['valid_id']['name'];
  $ex_valid_id = pathinfo($valid_id, PATHINFO_EXTENSION);
  $randomno2 = rand(0, 100000);
  $rename2 = $fname.substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
  $newId = $rename2 . '.' . $ex_valid_id;

  //Vaccination Card
  $vac = $_FILES['vac']['name'];
  $ex_vac = pathinfo($vac, PATHINFO_EXTENSION);
  $randomno3 = rand(0, 100000);
  $rename3 = $fname.substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
  $newVac = $rename3 . '.' . $ex_vac;

  ########################## COMPANIONS VARIABLE ##########################


  $created = date("Y-m-d");

  //companions number

  $com = $_SESSION['com'] - 1;
#################################       QR CODE       ###############################################
$qr_location = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
$tracker = $fname.$qr_location;
$path = '../QR_CODE/';
$file = $path.$qr_location.".png";

$ecc = 'L';
$pixel_size = 10;
$frame_size = 10;








  if ($com >= 1) {

    //TRAP DUPLICATE ENTRIES
    $trap = mysqli_query($conn, "SELECT * FROM tbl_tourist_info WHERE tfname='$fname'
                            AND tlname='$lname' AND created='$created' AND tsm_id = '$tsm_id' LIMIT 1");
    if (mysqli_num_rows($trap) >= 1) {
      $_SESSION['status'] = "You already Booked, You can only Booked once. THANK YOU!";
      header("location: ../step-3.php");
    } else {

      $insert_bookers = "INSERT INTO tbl_tourist_info(tfname, tlname, tage, tbday, tphone_num, tgender, temail, com_num, book_date, tsm_id, tracker, qr_location, status, created, date_out, nationality)
VALUES('$fname','$lname','$age','$bday','$contact','$gender','$email','$com_num','$date_book','$tsm_id','$tracker','$qr_location', '$pending','$created','$date_out', '$nationality')";
      $result = mysqli_query($conn, $insert_bookers);
      $bookers_id = mysqli_insert_id($conn);

      //image

      $insert_img = "INSERT INTO tbl_tourist_img(tphoto,valid_id,vacCard,pktourist_id)
VALUES ('$newImage', '$newId','$newVac', '$bookers_id')";
      $img_result = mysqli_query($conn, $insert_img);
      move_uploaded_file($_FILES["user_img"]["tmp_name"], "../tourist_image/" . $newImage);
      move_uploaded_file($_FILES["valid_id"]["tmp_name"], "../tourist_image/" . $newId);
      move_uploaded_file($_FILES["vac"]["tmp_name"], "../tourist_image/" . $newVac);

      $total = $_SESSION['inc'];
      for ($i = 0; $i < $total; $i++) {

        // COMPAIONS
        $com_fname =  $_POST[$i . 'com_fname'];
        $com_lname =  $_POST[$i . 'com_lname'];
        $com_dob =  $_POST[$i . 'com_dob'];
        $com_age =  $_POST[$i . 'com_age'];
        $com_gender =  $_POST[$i . 'com_gender'];
        $com_phone =  $_POST[$i . 'com_phone'];
        $com_email =  $_POST[$i . 'com_email'];
        $com_region =  $_POST[$i . 'com_region'];
        $com_province =  $_POST[$i . 'com_province'];
        $com_municipal =  $_POST[$i . 'com_municipal'];
        $com_brgy =  $_POST[$i . 'com_brgy'];
        //COM IMAGES

        //COMPANIONS PROFILE
        $com_user_img =  $_FILES[$i . 'com_user_img']['name'];
        $ext_com_img = pathinfo($com_user_img, PATHINFO_EXTENSION);
        $com_randomno1 = rand(0, 100000);
        $com_rename1 = $fname.substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
        $com_newImage = $com_rename1 . '.' . $ext_com_img;
        //COMPANIONS VALID ID
        $com_valid_id =  $_FILES[$i . 'com_valid_id']['name'];
        $ext_com_id = pathinfo($com_valid_id, PATHINFO_EXTENSION);
        $com_randomno2 = rand(0, 100000);
        $com_rename2 = $fname.substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
        $com_newId = $com_rename2 . '.' . $ext_com_id;
        //COMPANION VACCINATION CARD
        $com_vac =  $_FILES[$i . 'com_vac']['name'];
        $ext_com_vac = pathinfo($com_vac, PATHINFO_EXTENSION);
        $com_randomno3 = rand(0, 100000);
        $com_rename3 = $fname.substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
        $com_newVac = $com_rename3 . '.' . $ext_com_vac;


        $insert_com = "INSERT INTO tbl_tourist_com(cfname, clname, cage,
           cgender, cbday, cphone_num, cemail, cvalid_id, cimg,cvacCard, cregion, cprovince
           , cmunicipal, cbrgy, pktourist_id)
          VALUES ('$com_fname', '$com_lname', '$com_age', '$com_gender', '$com_dob'
          , '$com_phone', '$com_email', '$com_newId', '$com_newImage', '$com_newVac', '$com_region', '$com_province'
          , '$com_municipal', '$com_brgy', '$bookers_id')";
        $com_result = mysqli_query($conn, $insert_com);


        move_uploaded_file($_FILES[$i . "com_user_img"]["tmp_name"], "../tourist_image/" . $com_newImage);
        move_uploaded_file($_FILES[$i . "com_valid_id"]["tmp_name"], "../tourist_image/" . $com_newId);
        move_uploaded_file($_FILES[$i . "com_vac"]["tmp_name"], "../tourist_image/" . $com_newVac);
      }

      //address

      $insert_add = "INSERT INTO tbl_tourist_address(tregion, tprovince, tmunicipal, tbrgy, pktourist_id)
                    VALUE ('$region','$province','$municipal', '$brgy', '$bookers_id')";
      $address_result = mysqli_query($conn, $insert_add);

      if ($result && $img_result && $address_result && $com_result === TRUE) {
        QRcode::png($tracker, $file, $ecc, $pixel_size, $frame_size);
        $_SESSION['status'] = "<strong>" . "Successfuly Booked @ " . $ts_name . "!" . "</strong>" . "<br>" . "Please take a Screenshot or Print this E-PASS SLIP as a proof that you booked." . "<br>" . "You will show it to the tourist spot before Entering" . "<br>" . "<h3>" . " Thank you!" . "</h3>";
        $_SESSION['tourist_id'] = $bookers_id;
        header("location: ../ticket.php");
      } else {
        if (mysqli_errno($conn) == 1062) {
          $_SESSION['status'] = "You have Insert Duplicate Please Fill up Again";
          header("location: ../ticket.php");
        } else {
          $_SESSION['status'] = "Failed to Book, Please Try Again Thank you";
          header("location: ../step-3.php");
        }
      }
    }
  } else {

    //TRAP DUPLICATE ENTRIES
    $trap1 = mysqli_query($conn, "SELECT * FROM tbl_tourist_info WHERE tfname='$fname'
AND tlname='$lname' AND created='$created' AND tsm_id = '$tsm_id' LIMIT 1");
    if (mysqli_num_rows($trap1) >= 1) {
      $_SESSION['status'] = "You already Booked, You can only Booked once. THANK YOU!";
      header("location: ../step-3.php");
    } else {
      $_SESSION['status'] = "Success fully Book";
      header("location: ../step-3.php");

      $insert_bookers = "INSERT INTO tbl_tourist_info(tfname, tlname, tage, tbday, tphone_num, tgender, temail, com_num, book_date, tsm_id, tracker, qr_location, status, created, date_out, nationality)
  VALUES('$fname','$lname','$age','$bday','$contact','$gender','$email','$com_num','$date_book','$tsm_id','$tracker','$qr_location', '$pending','$created', '$date_out', '$nationality')";
      $result = mysqli_query($conn, $insert_bookers);
      $bookers_id = mysqli_insert_id($conn);


      //image

      $insert_img = "INSERT INTO tbl_tourist_img(tphoto,valid_id,vacCard,pktourist_id)
                  VALUES ('$newImage', '$newId','$newVac', '$bookers_id')";
      $img_result = mysqli_query($conn, $insert_img);
      move_uploaded_file($_FILES["user_img"]["tmp_name"], "../tourist_image/" . $newImage);
      move_uploaded_file($_FILES["valid_id"]["tmp_name"], "../tourist_image/" . $newId);
      move_uploaded_file($_FILES["vac"]["tmp_name"], "../tourist_image/" . $newVac);


      //address

      $insert_add = "INSERT INTO tbl_tourist_address(tregion, tprovince, tmunicipal, tbrgy, pktourist_id)
                    VALUE ('$region','$province','$municipal', '$brgy', '$bookers_id')";
      $address_result = mysqli_query($conn, $insert_add);



      QRcode::png($tracker, $file, $ecc, $pixel_size, $frame_size);
      $_SESSION['status'] = "<strong>" . "Successfuly Booked @ " . $ts_name . "!" . "</strong>" . "<br>" . "Please take a Screenshot or Print this E-PASS SLIP as a proof that you booked." . "<br>" . "You will show it to the tourist spot before Entering" . "<br>" . "<h3>" . " Thank you!" . "</h3>";
      $_SESSION['tourist_id'] = $bookers_id;
      header("location: ../ticket.php");
    }
  }
}
