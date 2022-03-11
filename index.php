<?php
session_start();
include_once 'includes/connection.php';

$query = "SELECT *
FROM tbl_ts_manager
INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id";

$result = mysqli_query($conn, $query);
$rowcount =  mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>TRAVELHOLIC: Online Tourist Booking</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.reboot.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  
</head>
<body>
<?php include_once 'navbar.php'?>

<div class="main">
<div class="row d-flex justify-content-center mt-3">
           <div class="col-md-8 h3 text-center">
              <?php include_once 'includes/msg.php';?>
           </div>
       </div>
    <div class="row">
        <div class="col text-center d-flex justify-content-center h1 p-5">
            <span class="title course-heading"><b>TRAVELHOLIC: ONLINE TOURIST BOOKING</b></span>
        </div>
    </div>
    <!--STEPS IN BOOKING-->
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mb-3">
                <div class="card ">
                    <div class="card-header bg-success h3 text-light">Steps in Booking</div>
                    <div class="card-body bg-light">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                            <a href="tourist_spot.php" style="text-decoration:none;">
                                <div class="card">
                                    <div class="card-header text-center h5 text-dark">Select<br> Tourist Spot  <i class="fa fa-check"></i></div>
                                    <div class="card-body h6 text-dark mb-4">
                                       Tourist Spot
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-header text-center h5 text-dark">Select Date<br> of Booking  <i class="fa fa-calendar"></i></div>
                                    <div class="card-body h6 text-dark mb-4">
                                       Date of Booking
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-header text-center h5 text-dark">Insert Number <br>of Companions  <i class="fa fa-users"></i></div>
                                    <div class="card-body h6 text-dark mb-4">
                                        Number of Companions
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-header text-center h5 text-dark">Fill Up<br> Information  <i class="fa fa-edit"></i></div>
                                    <div class="card-body h6 text-dark mb-4">
                                        Fill Up Information<br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--carousel-->
    <div class="row mb-3">
        <div class="col-md">

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">


  <?php
            for ($i=1; $i <= $rowcount ; $i++) { 
                $row = mysqli_fetch_array($result);

                $_SESSION['tsm_id'] = $row['tsm_id'];
                ?>

<?php
if ($i == 1) {?>
    <div class="carousel-item active">
      <img class="d-block w-100" src="photo/<?php echo $row['img1'] ?>" style="height:600px;" alt="First slide">
      <div class="carousel-caption d-none d-md-block mb-5">
        <h1><strong><?php echo $row['ts_name']?></strong></h1>
        <p class="h5"><?php echo $row['ts_des']?></p>
       
    </div>
    </div>
<?php
}else {?>

<div class="carousel-item">
      <img class="d-block w-100" src="photo/<?php echo $row['img1'] ?>" style="height:600px;" alt="First slide">
      <div class="carousel-caption d-none d-md-block mb-5">
        <h1><strong><?php echo $row['ts_name']?></strong></h1>
        <p class="h5"><?php echo $row['ts_des']?></p>
      
    </div>
    </div>

  
<?php
}
?>
<?php
} 
?>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



        </div>
    </div>
    <div class="container">
    <div class="row mb-5 d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card mb-2 bg-light">
                <div class="card-body text-center h4">
                        Our Tourist Spot
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4 d-flex justify-content-center mb-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/img/swim.jpg" style="height:230px;" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Swimming Holiday</h5>
                        </div>
                </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center mb-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/img/hiking.png" style="height:230px;" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hiking Holiday</h5>
                        </div>
                </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center mb-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/img/bonding.jpg" style="height:230px;" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bonding Holiday</h5>
                        </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex justify-content-center mb-2">
                    <div class="card text-center">
                        <div class="card-body bg-success">
                            <a href="tourist_spot.php" style="text-decoration:none;"><span class="text-light">View All Tourist Spot <i class="fa fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
    <div class="row mb-5">
        <div class="col-md-6">
            <img src="assets/img/mayoyao3.jpg" class="img-thumbnail" style="height:400px; width:100%;">
        </div>
        <div class="col-md-6 mt-5">
            <p class="h1 mt-5 text-center"><strong>Discover New Horizon</strong></p>
            <p>
            <ul class="nav nav-pills mb-3 d-flex justify-content-center h4" id="pills-tab" role="tablist">
                <li class="nav-item ">
                    <a class="btn btn-flat btn-light active mr-3" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><strong>ABOUT US</strong> </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-flat btn-light mr-3" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><strong>WHY CHOOSE US</strong></a>
                 </li>
                <li class="nav-item">
                    <a class="btn btn-flat btn-light" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><strong>OUR MISSION</strong></a>
                </li>
            </ul>
            <div class="tab-content ml-4 d-flex justify-content-center" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">Travelholic is to provide our users with the most high-quality travel plans possible. We love to travel and share the beauties of the world with you.</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">We are proud to provide tours of excellent quality and value for money, allowing you to immerse yourself in the culture of your selected location.</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Our mission is to provide a quick virtual tour and accurate booking to prevent mass gathering in each Tourist Spot.</div>
            </div>
            </p>
        </div>
    </div>
    </div>

    <?php include_once 'footer.php'; ?>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    
</body>
</html>