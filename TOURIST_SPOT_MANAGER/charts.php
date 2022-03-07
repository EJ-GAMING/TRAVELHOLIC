<?php include_once 'includes/session.php'; 
 $select_query = "SELECT count(*) as request
 FROM tbl_ts_manager
 INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
 INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
 INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
 INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
 WHERE tbl_ts_manager.tsm_id = '".$_SESSION['tsm101']."' AND status = 'Pending' ";
 
 $select_result = mysqli_query($conn, $select_query);
 $row = mysqli_fetch_assoc($select_result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TRAVELHOLIC: Online Tourbooking</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <?php include_once 'disable_right_click.php'; ?>

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       <?php include 'navbar.php';?>
       <?php include 'sidebar.php';?>

            <div id="layoutSidenav_content">
                <main>
                <div class="row">
								<div class="col-12">
									<?php include 'includes/msg.php'; ?>
								</div>
							</div>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">CHARTS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item">Charts</li>
                        </ol>
                        
                       
                           
                            
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <div class="card mb-4">
                                    <div class="card-header  bg-success text-light">
                                    <h3><i class="fas fa-chart-area me-1"></i>
                                        Number of Tourist per Tourist Spot</h3>                                    
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myAreaChart" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <div class="card mb-4">
                                    <div class="card-header  bg-success text-light">
                                    <h3> <i class="fas fa-chart-bar me-1"></i>
                                        Number of Tourist per Tourist Spot  </h3>                                  
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <div class="card mb-4">
                                    <div class="card-header  bg-success text-light">
                                    <h3> <i class="fas fa-chart-bar me-1"></i>
                                        Most Tourist Came From  </h3>                                  
                                    </div>
                                    <div class="card-body"><canvas id="tourist_came" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <div class="card mb-4">
                                    <div class="card-header  bg-success text-light">
                                    <h3><i class="fas fa-chart-area me-1"></i>
                                        Number of Tourist per Tourist Spot</h3>                                    
                                    </div>
                                    <div class="card-body">
                                        <canvas id="season" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include 'profile_modal.php';?>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; John Anthony Paquiz BSIT 4-2</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>




       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
       
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
     
        <?php  include_once 'assets/bar_chart.php';?>
        <?php  include_once 'assets/area_chart.php';?>
        <?php  include_once 'assets/tourist_came_from.php';?>
        <?php  include_once 'assets/season.php';?>
    </body>
</html>
