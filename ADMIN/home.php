<?php include_once 'includes/session.php'; 
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
                <div class="row d-flex justify-content-center mt-2">
								<div class="col-8 text-center h4">
									<?php include 'includes/msg.php'; ?>
								</div>
							</div>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><h2>REQUEST</h2>
                                    <p class="text-center h1" id="total">
                                   0
                                    </p>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="pending_req.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><h3>Total Number of Tourist</h3>
                                    <p class="text-center h1">
                                        <?php
                                            
                                    
                                            $approved_query = "SELECT SUM(com_num) as total
                                                FROM tbl_ts_manager
                                                INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
                                                INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
                                                INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
                                                INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
                                                INNER JOIN tbl_tourist_img ON tbl_tourist_info.pktourist_id = tbl_tourist_img.pktourist_id
                                                WHERE status = 'Arrived'  ";
                                                $approved_result = mysqli_query($conn, $approved_query);
                                                $row = mysqli_fetch_assoc($approved_result);

                                                echo $row['total'];
                                        
                                        ?>
                                    </p>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="approved.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body"><h3>TOURIST SPOT</h3>
                                    <p class="text-center h1">

                                        <?php
                                             $total_ts_query = "SELECT * FROM tbl_ts_manager ORDER BY tsm_id";
                                             $total_ts_result = mysqli_query($conn, $total_ts_query);
                                             $row = mysqli_num_rows($total_ts_result);
         
                                             echo $row;
                                        ?>

                                    </p>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tourist_spot.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                <?php
                                        $created = $user['created_at'];
                                        $aveDay = mysqli_query($conn, "SELECT book_date, DATEDIFF(CURDATE(), '$created') AS totDay
                                        FROM tbl_tourist_info
                                           WHERE STATUS = 'Arrived'
                                          
                                           ORDER BY book_date ASC ,tbl_tourist_info.pktourist_id DESC");

                                           $totRow = mysqli_fetch_assoc($aveDay);  
                                           $totDay = $totRow['totDay'];

                                           


                                           $aveDay1 = mysqli_query($conn, "SELECT SUM(com_num) AS totCom, book_date, DATEDIFF(CURDATE(), book_date) AS totDay
                                           FROM tbl_tourist_info
                                              WHERE STATUS = 'Arrived'
                                             
                                              ORDER BY book_date ASC ,tbl_tourist_info.pktourist_id DESC");
   
                                              $totRow1 = mysqli_fetch_assoc($aveDay1);  
                                              $totCom = $totRow1['totCom'];

                                              $average = $totCom / $totDay;

                                             
                                         
                                      ?>
                                    <div class="card-body"><h4 class="text-center">Average Tourist Per Day
                                    </h4>
                                    <p class="text-center h1">
                                     <?php echo round($average, 1)?>
                                    </p>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tourist/perday.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><h4>Average Tourist per Month</h4>
                                    <p class="text-center h1">
                                    <?php
                                           $created = $user['created_at'];
                                           $aveMonth = mysqli_query($conn, "SELECT ROUND(DATEDIFF(CURDATE(), '$created')/7, 0) AS weeks
                                           FROM tbl_ts_manager");
   
                                              $monthRow = mysqli_fetch_assoc($aveMonth);  
                                              $totMonth = $monthRow['weeks'];
   
                                              
   
   
                                              $aveMonth1 = mysqli_query($conn, "SELECT SUM(com_num) AS totCom, book_date, DATEDIFF(CURDATE(), book_date) AS totDay
                                              FROM tbl_tourist_info
                                                 WHERE STATUS = 'Arrived'
                                                
                                                 ORDER BY book_date ASC ,tbl_tourist_info.pktourist_id DESC");
      
                                                 $monthRow1 = mysqli_fetch_assoc($aveMonth1);  
                                                 $totCom = $monthRow1['totCom'];
   
                                                 $average1 = $totCom / $totMonth;
   
                                                echo round($average1, 1);
                                      ?>
                                    </p>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tourist/per_month.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><h4>Average Tourist Per Year</h4>
                                    <p class="text-center h1"> 
                                    <?php
                                        $aveYears = mysqli_query($conn, "SELECT YEAR(book_date) AS totYears
                                        FROM tbl_tourist_info
                                        WHERE STATUS = 'Arrived'
                                        GROUP BY totYears");
                                        
                                        $totalYears = mysqli_num_rows($aveYears);

                                        $aveYears1 = mysqli_query($conn, "SELECT SUM(com_num) AS totalY
                                        FROM tbl_tourist_info
                                        WHERE STATUS = 'Arrived'");
                                        
                                        $rowY = mysqli_fetch_assoc($aveYears1);
                                        $totalY = $rowY['totalY'];

                                        $averageY = $totalY / $totalYears;

                                        echo round($averageY, 1);
                                      ?>
                                    </p>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tourist/per_year.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Total Number of Tourist per Tourist Spot
                                    </div>
                                    <div class="card-body">
                                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                                    </div>
                                    </div>
                                </div>
                            
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Total Number of Tourist per Tourist Spot
                                    </div>
                                    <div class="card-body">
                                    <canvas id="myBarChart" width="100%" height="40"></canvas>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Most Tourist Came From
                                    </div>
                                    <div class="card-body">
                                    <canvas id="tourist_came" width="100%" height="40"></canvas>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       Graph to identify Peak and Off Season
                                    </div>
                                    <div class="card-body">
                                    <canvas id="peak_off" width="100%" height="40"></canvas>

                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                             User Account
                                
                            </div>
                            <div class="card-body">

                                <table id="datatablesSimple" class="table table-bordered table-striped">  
                                    <thead class="bg-success text-white">
                  
                  <th>Lastname</th>
                  <th>Firstname</th>
                  <th>Photo</th>
                  <th>Address</th>
                  <th>Tourist Spot</th>
                
                </thead>
                <tbody class="bg-light">
                  <?php
                   
                    $select_query = "SELECT *
                    FROM tbl_ts_manager
                    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
                    INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
                    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
                    INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
                    INNER JOIN refregion ON tbl_tsm_address.regCode = refregion.regCode
                    INNER JOIN refprovince ON tbl_tsm_address.provCode = refprovince.provCode
                    INNER JOIN refcitymun ON tbl_tsm_address.citymunCode = refcitymun.citymunCode
                    INNER JOIN refbrgy ON tbl_tsm_address.brgyCode = refbrgy.brgyCode";
                    $select_result = mysqli_query($conn, $select_query);
                    $select_result = mysqli_query($conn, $select_query);

                    while($row = mysqli_fetch_assoc($select_result)){

                      ?>
                     
                        <tr>
                          
                          <td><?php echo $row['lname'];?></td>
                          <td><?php echo $row['fname'];?></td>
                          <td class="text-center"><img src="../photo/<?php echo $row['photo'];?>" alt="user Image" height="50px"></td>
                          <td class="text-uppercase"><?php echo $row['brgyDesc'] . ', '. $row['citymunDesc'] .', '. $row['provDesc'] . ', '. $row['regDesc'];?></td>
                          <td><?php echo $row['ts_name'];?></td>
                          
                        </tr>
                      
                      <?php
                  
                    }
                  ?>
                  
                </tbody>
                  </table>
            </div>
                </div>
            
                </div>
                <?php  include_once 'account_modal.php';?>


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
        <?php  include_once 'assets/tourist_came.php';?>
        <?php  include_once 'assets/peakOff_season.php';?>
            
        <script>
function loadDoc() {

  setInterval(function(){

    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("total").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "total/total_request.php", true);
  xhttp.send();


  },1000);
 
}
loadDoc();
</script>
    </body>
</html>
