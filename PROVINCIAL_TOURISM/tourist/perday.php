<?php include_once '../includes/session.php'; 
?>
 <!DOCTYPE html>
<html lang="en">
    <head>
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
        <link rel="stylesheet" href="../css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap.reboot.min.css">
    <?php include_once '../disable_right_click.php'; ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php include_once 'navbar.php';?>
    <?php include_once 'sidebar.php';?>

            <div id="layoutSidenav_content">
                <main>
                
                    <div class="container-fluid px-4">
                    <h1 class="mt-3">List of Tourist In Current Day</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Account</li>
                        </ol>
                       



                            <div class="row">
                                <div class="col-md d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                       
                                                <input type="date" name="date" id="txt_day" class="form-control col-md-2">    
                                        
                                           <button type="submit" class="btn btn-primary btn-flat" id="btn_search">Search</button>
                                       
                                </div>
                            </div>

                                <table class="table table-bordered table-striped" id="table-data">
                                    <thead class="bg-success text-white">
                  
                  <th>Fullname</th>
                  <th>Photo</th>
                  <th>Pax</th>
                  <th>Tourist Spot</th>
                  <th>Tools</th>
                </thead>
                <tbody class="bg-light">
                  <?php
                   
                    $select_query = "SELECT *
                    FROM tbl_ts_manager
                    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
                    INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
                    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
                    INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
                    INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
                    INNER JOIN tbl_tourist_img ON tbl_tourist_info.pktourist_id = tbl_tourist_img.pktourist_id
                 
                    WHERE STATUS = 'Approved' AND book_date = CURDATE()
                    ORDER BY tbl_tourist_info.pktourist_id DESC";
                    $select_result = mysqli_query($conn, $select_query);

                    while($row = mysqli_fetch_assoc($select_result)){

                      ?>
                     
                        <tr>
                          
                          <td><?php echo $row['tfname']. ' '. $row['tlname'];?></td>
                          <td><?php echo $row['book_date']?></td>
                          <td><?php echo $row['com_num'];?></td>
                          <td><?php echo $row['ts_name'];?></td>
                          <td>
                          <a href="perday_info.php?view=<?php echo $row['pktourist_id']; ?>" class="btn btn-success btn-sm btn-flat text-white">
                            <i class="fas fa-search me-1"></i>View</a>
                          </td>
                        </tr>
                        
                      <?php
                  
                }
              ?>
              
            </tbody>
              </table>
                     

                      
           
          <?php  include_once '../profile_modal.php';?>

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
        <script src="../js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
   
      
        <script>
		  $(document).ready(function(){
            $("#btn_search").click(function(){
                var search =$("#txt_day").val();
                $.ajax({
                    url:'query_day.php',
                    method:'POST',
                    data:{query:search},
                    success:function(response){
                        $("#table-data").html(response);
                    }

                });
            });
        });
	</script>
    </body>
</html>
