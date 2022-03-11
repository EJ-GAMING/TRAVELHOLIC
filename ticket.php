<?php
include_once 'includes/connection.php';

session_start();//start session if session not start

if(isset($_SESSION['tourist_id'])){
    $tourist_id = $_SESSION['tourist_id'];
    $query = "SELECT *
    FROM tbl_tourist_info
    INNER JOIN tbl_tourist_img ON tbl_tourist_info.pktourist_id = tbl_tourist_img.pktourist_id
    INNER JOIN tbl_tourist_address ON tbl_tourist_info.pktourist_id = tbl_tourist_address.pktourist_id
    INNER JOIN tbl_ts_manager ON tbl_tourist_info.tsm_id = tbl_ts_manager.tsm_id
    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
    INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
    INNER JOIN refregion ON tbl_tourist_address.tregion = refregion.regCode
    INNER JOIN refprovince ON tbl_tourist_address.tprovince = refprovince.provCode
    INNER JOIN refcitymun ON tbl_tourist_address.tmunicipal = refcitymun.citymunCode
    INNER JOIN refbrgy ON tbl_tourist_address.tbrgy = refbrgy.brgyCode

    WHERE tbl_tourist_info.pktourist_id = '$tourist_id'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.reboot.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script type="text/javascript"> 
function disableselect(e){  
return false  
}  

function reEnable(){  
return true  
}  

//if IE4+  
document.onselectstart=new Function ("return false")  
document.oncontextmenu=new Function ("return false")  
//if NS6  
if (window.sidebar){  
document.onmousedown=disableselect  
document.onclick=reEnable  
}
</script>
    <title>TRAVELHOLIC: Online Tourist Booking</title>
</head>
<body class="bg-light">

    
<?php include_once 'navbar.php'?>

    <div class="container mb-5">

        <div class="row d-flex justify-content-center">
            <div class="col-md-10 pt-5 mt-5">
                <div class="row mb-3">
                    <div class="col-md">
                        <?php include_once 'includes/msg.php';?>
                    </div>
                </div>
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-success rounded-left">
                        <div class="card-block text-center text-white mt-5">
                            <img src="tourist_image/<?php echo $row['tphoto']?>" style="height:150px;">
                            <h2 class="font-weight-bold mt-4"><?php echo $row['tfname'].' '.$row['tlname']?></h2>
                            <img src="QR_CODE/<?php echo $row['qr_location']?>.png" height="200px" width="200px">
                            <p><i>Valid till: <b><?php echo $row['book_date'] ?></b></i></p>
                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h2 class="mt-3 text-center">E-SLIP PASS</h2>
                        <h2 class="mt-3 text-center"><?php echo $row['ts_name']?></h2>
                        <hr class="bg-success mt-0">

                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Email:</p>
                                <h6 class="text-muted"><?php echo $row['temail']?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Phone:</p>
                                <h6 class="text-muted"><?php echo $row['tphone_num']?></h6>
                            </div>
                        </div>
                       
                        <div class="row mt-3">
                        <div class="col-sm-6">
                                <p class="font-weight-bold">Pax</p>
                                <h6 class="text-muted"><?php echo $row['com_num']?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Address</p>
                                <h6 class="text-muted text-capitalize"><?php echo $row['brgyDesc'].", ".$row['citymunDesc'].", ".$row['provDesc']?></h6>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <p class="font-weight-bold">Date You Book</p>
                                <h6 class="text-muted"><?php echo $row['created']?></h6>
                            </div>
                            <div class="col-md-6">
                            <p class="font-weight-bold">Date Booked</p>
                                <h6 class="text-muted"><?php echo $row['book_date']?></h6>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md">
                                <strong>NOTE: </strong><i>"If you cancel your booked just Call/Message us thru <b><?php echo $row['phone_num'] ?></b> or 
                                        <strong><?php echo $row['email']?></strong> to cancel your Booking. THANK YOU!"</i>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md d-flex justify-content-md-end">
                                <input type="submit" onclick="window.print()" class="btn btn-flat btn-info mr-3" value="Print"/>
                                <a href="index.php" class="btn btn-flat btn-success mr-3">Ok</a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
       
                
               
    </div>
    

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</body>
</html>

<?php
}else{
	echo "<script>alert('Please Select tourist Spot and Date'); location.href='step-1.php';</script>";
}//end if else isset
?>