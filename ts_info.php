
    <?php
    session_start();
    
        include_once 'includes/connection.php';
        $tsinfo_id = $_GET['ts_id'];
        $query = "SELECT *
        FROM tbl_ts_manager
        INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
        INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
        INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
        INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
        INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
        INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
        INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
        INNER JOIN refregion ON tbl_tsm_address.regCode = refregion.regCode
        INNER JOIN refprovince ON tbl_tsm_address.provCode = refprovince.provCode
        INNER JOIN refcitymun ON tbl_tsm_address.citymunCode = refcitymun.citymunCode
        INNER JOIN refbrgy ON tbl_tsm_address.brgyCode = refbrgy.brgyCode
        
        WHERE tbl_ts_info.tsinfo_id = '$tsinfo_id'";
  
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if (isset($tsinfo_id)) {
        ?> 
       
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>TRAVELHOLIC: Online Tourist Booking</title>
    <script src="js/adapter.min.js"></script>
    <script src="js/vue.min.js"></script>
    <script src="js/instascan.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.reboot.min.css">
    <link rel="stylesheet" href="css/tsinfo.css"/>
    <link rel="stylesheet" href="css/rate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>


<style>
.carousel-item img{
    margin:auto;
}
.carousel-control-prev-icon, .carousel-control-next-icon {
    outline: black;
    
}
.card {
     background-color: #EDEBE6;
     padding: 20px;
     margin-top: 20px;
  }
  </style>

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
</head>
<body class="bg-light">
<?php include_once 'navbar.php'?>

<div class="main">
<div class="row d-flex justify-content-center mt-3">
           <div class="col-md-8 h3 text-center">
              <?php include_once 'includes/msg.php';?>
           </div>
       </div>
<div class="row mb-3">
  <div class="leftcolumn">
    <div class="card bg-white">
      <p>
    <a href="tourist_spot.php" class="text-dark"><i class="fa fa-arrow-left fa-2x"></i></a></p>
    <h2><?php echo $row['ts_name'] ?></h2>
    <h5><?php echo $row['ts_des'] ?></h5>
    <!--carousel-->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="photo/<?php echo $row['img1'] ?>" height="524px" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="photo/<?php echo $row['img2'] ?>" height="524px" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="photo/<?php echo $row['img3'] ?>" height="524px" alt="First slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--end of carousel-->
<form action="includes/session_tsm.php" method="post">
  <input type="hidden" name="tsm_id" value="<?php echo $row['tsm_id']?>">
<h3><strong>Tourist Spot Activities:</strong></h3>
      <p><i><?php echo $row['act'] ?></i></p>
      <h3><strong>Tourist Spot Guidelines</strong></h3>
      <p><i><?php echo $row['guide']?></i></p>
      <p><h3>NOTE:</h3><i>"User image and Valid ID is Required upon Booking. Thank You!"</i></p>
      <h3><strong>Available Slot Today:</strong></h3>
      <p><i><h5>
        <?php 
          $id = $row['tsm_id'];
          $slot = mysqli_query($conn, "SELECT max_num
          FROM tbl_ts_info
          INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
          WHERE tbl_ts_info.tsinfo_id = '$tsinfo_id'");
            $a = mysqli_fetch_assoc($slot);
            $b = $a['max_num'];
          
          $booked = mysqli_query($conn, "SELECT SUM(com_num) AS booked
          FROM tbl_tourist_info
          WHERE tsm_id = '$id' AND book_date = CURDATE()");
          $a1 = mysqli_fetch_assoc($booked);
          $b1 = $a1['booked'];

          if (mysqli_num_rows($booked) >= 1) {
           echo $b - $b1;
          }else {
            echo '0';
          }


        ?>
      </h5></i></p>      




      <p><input type="submit" class="btn btn-flat btn-primary" name="book" value="Book Now">
      <a href="" data-bs-toggle="modal" class="btn btn-flat  btn-success " data-bs-target="#rate"><i class="fa fa-star"></i>Rate</a>

</p>
</form>
    </div>
   
  </div>
  <div class="rightcolumn">
  <div class="card bg-white">
      <?php 
      $sql = "SELECT * FROM tbl_ts_manager
      INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
      INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
      INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
      INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
      INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
      INNER JOIN refregion ON tbl_ts_location.tsregCode = refregion.regCode
      INNER JOIN refprovince ON tbl_ts_location.tsprovCode = refprovince.provCode
      INNER JOIN refcitymun ON tbl_ts_location.tscitymunCode = refcitymun.citymunCode
      INNER JOIN refbrgy ON tbl_ts_location.tsbrgyCode = refbrgy.brgyCode
      
      WHERE tbl_ts_info.tsinfo_id = '$tsinfo_id'";
      $result1 = mysqli_query($conn, $sql);
      $row1 = mysqli_fetch_assoc($result1);
      ?>
      <h3>Tourist Spot Location</h3>
      <p><i class="fa fa-address-card"></i><?php echo ' '. $row1['brgyDesc']. ', '.$row1['citymunDesc']. ', '. $row1['provDesc']. ', '.$row1['regDescr']?></p>
    </div>
    <div class="card bg-white">
      <h3>Popular Post</h3>
      <img src="photo/<?php echo $row['img1'] ?>" height="100px"></img>
<br>
<img src="photo/<?php echo $row['img2'] ?>" height="100px"></img>
<br>
<img src="photo/<?php echo $row['img3'] ?>" height="100px"></img><br>
<img src="photo/<?php echo $row['img4'] ?>" height="100px">

    </div>
    <div class="card bg-white">
      <h2>Tourist Manager</h2>
      <div class="col d-flex justify-content-center">
        <img src="photo/<?php echo $row['photo'] ?>" height="100px">
      </div>
      <p><?php echo 'Mngr.'. ' ' .$row['fname']. ' '. $row['lname']?></p>
      <p><i class="fa fa-address-card"></i> <?php echo $row['brgyDesc']. ', ' .$row['citymunDesc']. ', ' .$row['provDesc']. ', ' .$row['regDescr']?></p>
    </div>
   
  </div>
</div>
<?php
include_once 'footer.php';
?>
   <?php include_once 'rate_modal.php'; ?>
</div>
</div>
<script src="js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
   

</body>
</html>
<?php

}else {
  $_SESSION['status'] = "Select Tourist Spot";
  header("location: ../index.php");
}

?>


