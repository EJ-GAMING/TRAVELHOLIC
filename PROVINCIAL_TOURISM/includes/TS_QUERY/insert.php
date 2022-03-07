<?php
include_once '../session.php';

    if (isset($_POST['add'])){

        $ts_name = mysqli_real_escape_string($conn, $_POST['ts_name'] ) ;
        $ts_des = mysqli_real_escape_string($conn, $_POST['ts_des'] ) ;
        $ts_region = mysqli_real_escape_string($conn, $_POST['ts_region'] ) ;
        $ts_brgy = mysqli_real_escape_string($conn, $_POST['ts_brgy'] ) ;
        $ts_municipal = mysqli_real_escape_string($conn, $_POST['ts_municipal']) ;
        $ts_province = mysqli_real_escape_string($conn, $_POST['ts_province']) ;
        $ts_act =  mysqli_real_escape_string($conn, $_POST['ts_act']) ;
        $ts_guidelines = mysqli_real_escape_string($conn, $_POST['ts_guide']);
        $ts_max_num = mysqli_real_escape_string($conn, $_POST['ts_max_num']);
        $ts_status = mysqli_real_escape_string($conn, $_POST['status']);

        //IMAGES HERE
        $img1 = $_FILES["img1"]["name"];
        $img2 = $_FILES["img2"]["name"];
        $img3 = $_FILES["img3"]["name"];
        $img4 = $_FILES["img4"]["name"];

        // TRAP DUPLICATE ENTRIES
        
        $trap = mysqli_query($conn, "SELECT * FROM tbl_ts_info
        WHERE ts_name = '$ts_name' LIMIT 1");

        if (mysqli_num_rows($trap) >= 1) {
            $_SESSION['status'] = "Tourist Spot Already Inserted";
            header("location: ../../tourist_spot.php"); 
        }else {
            $ts_query = "INSERT INTO tbl_ts_info(ts_name, ts_des)
            VALUES ('$ts_name','$ts_des')";
            $ts_result = mysqli_query($conn, $ts_query);
    
            $pkts_id = mysqli_insert_id($conn);
    
    
            //location
            $location_query = "INSERT INTO tbl_ts_location (tsregCode, tsprovCode, tscitymunCode, tsbrgyCode, tsinfo_id)
            VALUES ('$ts_region','$ts_province','$ts_municipal','$ts_brgy','$pkts_id')";
            $location_result = mysqli_query($conn, $location_query);
          
    
    
            //activities and Guidelines
            $act_guide_query = "INSERT INTO tbl_ts_act_guide (act, guide, max_num, tsinfo_id, ts_status)
            VALUES ('$ts_act','$ts_guidelines', '$ts_max_num','$pkts_id', '$ts_status')";
            $act_guide_result = mysqli_query($conn, $act_guide_query);
            
    
            
            //images
            $img_query = "INSERT INTO tbl_ts_img (img1, img2, img3, img4, tsinfo_id) VALUES ('$img1','$img2','$img3','$img4','$pkts_id')";
    
            if (mysqli_query($conn, $img_query) === true) {
    
                move_uploaded_file($_FILES["img1"]["tmp_name"], "../../../photo/" . $img1);
                move_uploaded_file($_FILES["img2"]["tmp_name"], "../../../photo/" . $img2);
                move_uploaded_file($_FILES["img3"]["tmp_name"], "../../../photo/" . $img3);
                move_uploaded_file($_FILES["img4"]["tmp_name"], "../../../photo/" . $img4);
            }
    
            $_SESSION['status'] = "Data Successfully Inserted";
                header("location: ../../tourist_spot.php"); 
    
    
        }
   
   
        
      

        
       
    }
?>