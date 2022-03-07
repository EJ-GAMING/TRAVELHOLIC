<?php include_once '../includes/session.php'; 
$tourist_id=$_GET['view'];
$view_query = "SELECT *
FROM tbl_tourist_info
INNER JOIN tbl_tourist_img ON tbl_tourist_info.pktourist_id = tbl_tourist_img.pktourist_id
INNER JOIN tbl_tourist_address ON tbl_tourist_info.pktourist_id = tbl_tourist_address.pktourist_id
INNER JOIN refregion ON tbl_tourist_address.tregion = refregion.regCode
INNER JOIN refprovince ON tbl_tourist_address.tprovince = refprovince.provCode
INNER JOIN refcitymun ON tbl_tourist_address.tmunicipal = refcitymun.citymunCode
INNER JOIN refbrgy ON tbl_tourist_address.tbrgy = refbrgy.brgyCode
INNER JOIN tbl_ts_manager ON tbl_tourist_info.tsm_id = tbl_ts_manager.tsm_id
InNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id 
 WHERE tbl_tourist_info.pktourist_id = '$tourist_id'";
 $view_result = mysqli_query($conn, $view_query);
 $view = mysqli_fetch_assoc($view_result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include_once '../disable_right_click.php'; ?>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
        <title>TRAVELHOLIC: Online Tourbooking</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/bootstrap.css"/>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once 'navbar.php';?>
        <?php include_once 'sidebar.php';?>

            <div id="layoutSidenav_content">
                <main>
                <div class="row">
								<div class="col-12">
									<?php include '../includes/msg.php'; ?>
								</div>
							</div>
                    <div class="container-fluid px-4">
                    <h1 class="mt-3">Tourist Information</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tourist Information</li>
                        </ol>
                        <div class="row mb-2">
                            <div class="col">
                                <a href="perday.php" class="btn btn-flat"><i class="fa fa-arrow-left fa-2x"></i></a>
                            </div>
                        </div>
                    <?php include_once 'tourist_info_content.php'; ?>
                        
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
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
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>    
    

    </body>
</html>
